/**
 * ========================================
 * ENTERPRISE SCHEDULE SYSTEM - JavaScript CORREGIDO
 * Sistema de Horarios Académicos Empresarial
 * Conectado con Base de Datos Laravel
 * SOLUCIÓN PARA PROBLEMAS DE PDF
 * ========================================
 */

document.addEventListener('DOMContentLoaded', () => {
  // Configuración desde Laravel
  const CSRF = window.Laravel.csrfToken;

  let CURRENT_GRADO_ID = window.Laravel.currentGradoId;
  const PROFESORES = window.Laravel.profesores;
  const ASIGNATURAS = window.Laravel.asignaturas;
  const GRADOS = window.Laravel.grados;
  const ROUTES = window.Laravel.routes;

  // Mapeo de días
  const diasMap = { 1: 'Lunes', 2: 'Martes', 3: 'Miércoles', 4: 'Jueves', 5: 'Viernes' };
  const invDiasMap = { 'Lunes': 1, 'Martes': 2, 'Miércoles': 3, 'Jueves': 4, 'Viernes': 5 };

  // Arrays para manejo de datos
  let pendingHorarios = [];
  let savedHorarios = [];
  let existingHorarios = [];

  // Elementos DOM principales
  const gradoSelect = document.getElementById('gradoSelect');
  const loadingStatus = document.getElementById('loadingStatus');
  const scheduleStatus = document.getElementById('scheduleStatus');
  const scheduleCounter = document.getElementById('scheduleCounter');
  const pendingCount = document.getElementById('pendingCount');
  const savedCount = document.getElementById('savedCount');
  const saveBtn = document.getElementById('saveBtn');
  const saveBtnText = document.getElementById('saveBtnText');
  const resetBtn = document.getElementById('resetBtn');
  const downloadBtn = document.getElementById('downloadBtn');

  // ========================================
  // SISTEMA DE GESTIÓN DE ESTILOS PARA PDF
  // ========================================
  class PDFStyleManager {
    constructor() {
      this.originalStyles = new Map();
      this.pdfStyleSheet = null;
      this.problematicSelectors = [
        // Selectores que causan problemas en PDF
        '.enterprise-schedule-system .schedule-table',
        '.enterprise-schedule-system .schedule-cell',
        '.enterprise-schedule-system .class-slot',
        '.enterprise-schedule-system .app-header',
        '.enterprise-schedule-system .sidebar',
        '.enterprise-schedule-system .action-bar',
        '.enterprise-schedule-system .control-bar',
        // Animaciones y transiciones que pueden romper el PDF
        '*[class*="animation"]',
        '*[class*="transition"]',
        '.enterprise-schedule-system *'
      ];
    }

    // Crear hoja de estilos específica para PDF
    createPDFStyles() {
      const pdfStyles = `
        /* ESTILOS ESPECÍFICOS PARA PDF - NO AFECTAN LA VISTA NORMAL */
        .pdf-mode {
          font-family: 'Arial', sans-serif !important;
          background: white !important;
          color: black !important;
        }
        
        .pdf-mode * {
          animation: none !important;
          transition: none !important;
          transform: none !important;
          box-shadow: none !important;
          border-radius: 0 !important;
          background-attachment: scroll !important;
        }
        
        .pdf-mode .schedule-table {
          border-collapse: collapse !important;
          width: 100% !important;
          margin: 0 !important;
          padding: 0 !important;
        }
        
        .pdf-mode .schedule-table th,
        .pdf-mode .schedule-table td {
          border: 1px solid #000 !important;
          padding: 8px !important;
          text-align: center !important;
          font-size: 12px !important;
          line-height: 1.2 !important;
        }
        
        .pdf-mode .class-slot {
          background: #f0f0f0 !important;
          border: 1px solid #ccc !important;
          padding: 4px !important;
          margin: 0 !important;
          display: block !important;
          position: static !important;
        }
        
        .pdf-mode .slot-actions,
        .pdf-mode .slot-status {
          display: none !important;
        }
        
        .pdf-mode .app-header,
        .pdf-mode .sidebar,
        .pdf-mode .action-bar,
        .pdf-mode .control-bar {
          display: none !important;
        }
        
        .pdf-mode .notification-container {
          display: none !important;
        }
        
        /* Forzar visibilidad del contenido del PDF */
        .pdf-mode #horario-pdf {
          display: block !important;
          visibility: visible !important;
          opacity: 1 !important;
          position: static !important;
          width: 100% !important;
          height: auto !important;
        }
      `;

      // Crear elemento style si no existe
      if (!this.pdfStyleSheet) {
        this.pdfStyleSheet = document.createElement('style');
        this.pdfStyleSheet.id = 'pdf-styles';
        this.pdfStyleSheet.textContent = pdfStyles;
      }
      
      return this.pdfStyleSheet;
    }

    // Preparar documento para PDF
    preparePDFMode(element) {
      console.log('Preparando modo PDF...');
      
      // Agregar estilos PDF
      const pdfStyles = this.createPDFStyles();
      if (!document.head.contains(pdfStyles)) {
        document.head.appendChild(pdfStyles);
      }
      
      // Agregar clase PDF al elemento principal
      const mainContainer = document.querySelector('.enterprise-schedule-system');
      if (mainContainer) {
        mainContainer.classList.add('pdf-mode');
      }
      
      if (element) {
        element.classList.add('pdf-mode');
      }
      
      // Ocultar elementos problemáticos
      this.hideProblematicElements();
      
      // Forzar recalculo de estilos
      document.body.offsetHeight;
      
      console.log('Modo PDF preparado');
    }

    // Restaurar estilos normales
    restoreNormalMode() {
      console.log('Restaurando modo normal...');
      
      const mainContainer = document.querySelector('.enterprise-schedule-system');
      if (mainContainer) {
        mainContainer.classList.remove('pdf-mode');
      }
      
      const pdfElement = document.getElementById('horario-pdf');
      if (pdfElement) {
        pdfElement.classList.remove('pdf-mode');
      }
      
      // Mostrar elementos ocultos
      this.showHiddenElements();
      
      // Remover estilos PDF
      if (this.pdfStyleSheet && document.head.contains(this.pdfStyleSheet)) {
        document.head.removeChild(this.pdfStyleSheet);
      }
      
      console.log('Modo normal restaurado');
    }

    hideProblematicElements() {
      const elementsToHide = [
        '.app-header',
        '.sidebar',
        '.control-bar',
        '.action-bar',
        '.notification-container',
        '.modal',
        '.schedule-container' // Ocultar el editor durante PDF
      ];
      
      elementsToHide.forEach(selector => {
        const elements = document.querySelectorAll(selector);
        elements.forEach(el => {
          if (!el.dataset.originalDisplay) {
            el.dataset.originalDisplay = getComputedStyle(el).display;
          }
          el.style.display = 'none';
        });
      });
    }

    showHiddenElements() {
      const elements = document.querySelectorAll('[data-original-display]');
      elements.forEach(el => {
        el.style.display = el.dataset.originalDisplay || '';
        delete el.dataset.originalDisplay;
      });
      
      // Asegurar que el contenedor del editor esté visible
      const scheduleContainer = document.querySelector('.schedule-container');
      if (scheduleContainer) {
        scheduleContainer.style.display = '';
        scheduleContainer.classList.remove('d-none');
      }
    }
  }

  // ========================================
  // SISTEMA DE NOTIFICACIONES EMPRESARIALES
  // ========================================
  class NotificationManager {
    constructor() {
      this.container = document.getElementById('notificationContainer');
      this.notifications = new Map();
    }

    show(type, title, message, suggestion = null, duration = 5000) {
      const id = Date.now() + Math.random();

      const icons = {
        success: 'fas fa-check-circle',
        error: 'fas fa-exclamation-circle',
        warning: 'fas fa-exclamation-triangle',
        info: 'fas fa-info-circle'
      };

      const notification = document.createElement('div');
      notification.className = `notification ${type}`;
      notification.id = `notification-${id}`;

      notification.innerHTML = `
                <div class="notification-header">
                    <div class="notification-icon">
                        <i class="${icons[type]}"></i>
                    </div>
                    <div class="notification-content">
                        <div class="notification-title">${title}</div>
                        <div class="notification-message">${message}</div>
                        ${suggestion ? `<div class="notification-suggestion">💡 ${suggestion}</div>` : ''}
                    </div>
                    <button class="notification-close" onclick="notificationManager.close(${id})">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                ${type !== 'error' ? '<div class="notification-progress"><div class="notification-progress-bar"></div></div>' : ''}
            `;

      if (this.container) {
        this.container.insertAdjacentElement('afterbegin', notification);
        this.notifications.set(id, notification);

        if (type !== 'error' && duration > 0) {
          setTimeout(() => this.close(id), duration);
        }
      }

      return id;
    }

    close(id) {
      const notification = this.notifications.get(id);
      if (notification) {
        notification.style.animation = 'slideOutRight 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards';
        setTimeout(() => {
          notification.remove();
          this.notifications.delete(id);
        }, 300);
      }
    }

    closeAll() {
      this.notifications.forEach((notification, id) => {
        this.close(id);
      });
    }
  }

  // ========================================
  // SISTEMA DE MODALES EMPRESARIALES
  // ========================================
  class ModalManager {
    constructor() {
      this.activeModal = null;
      this.modalResolve = null;
    }

    show(title, body, footer, size = '') {
      return new Promise((resolve) => {
        const modalHtml = `
                    <div class="modal fade enterprise-modal" id="dynamicModal" tabindex="-1">
                        <div class="modal-dialog ${size}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">${title}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">${body}</div>
                                <div class="modal-footer">${footer}</div>
                            </div>
                        </div>
                    </div>
                `;

        const existingModal = document.getElementById('dynamicModal');
        if (existingModal) existingModal.remove();

        document.body.insertAdjacentHTML('beforeend', modalHtml);
        const modalElement = document.getElementById('dynamicModal');
        this.activeModal = new bootstrap.Modal(modalElement);

        this.modalResolve = resolve;

        modalElement.addEventListener('click', (e) => {
          if (e.target.hasAttribute('data-action')) {
            const action = e.target.getAttribute('data-action');
            this.resolve(action);
          }
        });

        modalElement.addEventListener('hidden.bs.modal', () => {
          modalElement.remove();
          if (this.modalResolve) {
            this.resolve('cancel');
          }
        });

        this.activeModal.show();
      });
    }

    resolve(action) {
      if (this.activeModal) {
        this.activeModal.hide();
        this.activeModal = null;
      }

      if (this.modalResolve) {
        const resolve = this.modalResolve;
        this.modalResolve = null;
        resolve(action);
      }
    }

    showTeacherSelection(prefillId = null) {
      const modal = new bootstrap.Modal(document.getElementById('teacherModal'));
      const select = document.getElementById('teacherSelect');

      select.innerHTML = '<option value="">Seleccione un profesor</option>';
      PROFESORES.forEach(p => {
        const option = document.createElement('option');
        option.value = p.id;
        option.textContent = p.name;
        if (prefillId && String(prefillId) === String(p.id)) {
          option.selected = true;
        }
        select.appendChild(option);
      });

      modal.show();

      return new Promise((resolve) => {
        const confirmBtn = document.getElementById('confirmTeacher');

        function cleanup(value) {
          modal.hide();
          confirmBtn.removeEventListener('click', handleConfirm);
          resolve(value);
        }

        function handleConfirm() {
          cleanup(select.value || null);
        }

        confirmBtn.addEventListener('click', handleConfirm);

        document.getElementById('teacherModal').addEventListener('hidden.bs.modal', function handler() {
          this.removeEventListener('hidden.bs.modal', handler);
          cleanup(null);
        });
      });
    }
  }

  // ========================================
  // GESTOR PRINCIPAL DEL SISTEMA
  // ========================================
  class EnterpriseScheduleManager {
    constructor() {
      this.pdfStyleManager = new PDFStyleManager();
      this.init();
    }

    init() {
      this.setupEventListeners();
      this.setupDragAndDrop();
      this.updateCounters();

      if (CURRENT_GRADO_ID) {
        this.showLoadingStatus();
        setTimeout(() => {
          this.loadExistingSchedules(CURRENT_GRADO_ID);
        }, 500);
      }
    }

    setupEventListeners() {
      if (gradoSelect) {
        gradoSelect.addEventListener('change', (e) => {
          this.handleGradeChange(e.target.value);
        });
      }

      if (saveBtn) {
        saveBtn.addEventListener('click', () => {
          this.showSaveConfirmation();
        });
      }

      if (resetBtn) {
        resetBtn.addEventListener('click', () => {
          this.showResetConfirmation();
        });
      }

      if (downloadBtn) {
        downloadBtn.addEventListener('click', () => {
          this.downloadPDF();
        });
      }

      document.addEventListener('keydown', (e) => {
        if (e.ctrlKey && e.key === 's') {
          e.preventDefault();
          if (pendingHorarios.length > 0) {
            this.showSaveConfirmation();
          }
        }
        if (e.key === 'Escape') {
          const modal = document.querySelector('.modal.show');
          if (modal) {
            bootstrap.Modal.getInstance(modal)?.hide();
          }
        }
      });
    }

    setupDragAndDrop() {
      document.querySelectorAll('.draggable').forEach(chip => {
        chip.addEventListener('dragstart', (e) => {
          document.body.classList.add('dragging');
          const data = {
            type: e.target.dataset.type,
            id: e.target.dataset.id,
            text: e.target.dataset.text
          };
          e.dataTransfer.setData('text/plain', JSON.stringify(data));
        });

        chip.addEventListener('dragend', () => {
          document.body.classList.remove('dragging');
        });
      });

      document.querySelectorAll('.dropzone').forEach(cell => {
        cell.addEventListener('dragover', (e) => {
          if (!cell.classList.contains('occupied') || cell.classList.contains('editing')) {
            e.preventDefault();
            cell.classList.add('dragover');
          }
        });

        cell.addEventListener('dragleave', () => {
          cell.classList.remove('dragover');
        });

        cell.addEventListener('drop', async (e) => {
          e.preventDefault();
          cell.classList.remove('dragover');
          document.body.classList.remove('dragging');
          await this.handleDrop(e, cell);
        });
      });
    }

    async handleGradeChange(gradeId) {
      if (!gradeId) {
        CURRENT_GRADO_ID = null;
        this.clearSchedule();
        this.hideStatus();
        return;
      }

      CURRENT_GRADO_ID = gradeId;
      this.showLoadingStatus();

      try {
        await this.loadExistingSchedules(gradeId);
        this.hideLoadingStatus();
        this.showScheduleStatus();
      } catch (error) {
        this.hideLoadingStatus();
        notificationManager.show('error', 'Error al cargar',
          'No se pudieron cargar los horarios existentes.',
          'Verifica tu conexión e intenta cambiar de grado nuevamente.');
      }
    }





    // SOLUCIÓN HÍBRIDA FINAL - Basada en tu código que funciona pero sin dañar la vista
async downloadPDF() {
  console.log('Iniciando descarga de PDF con CURRENT_GRADO_ID:', CURRENT_GRADO_ID);

  if (!CURRENT_GRADO_ID) {
    notificationManager.show('warning', 'Selecciona un grado', 'Debes seleccionar un grado para descargar su horario.');
    return;
  }

  if (pendingHorarios.length > 0) {
    const action = await modalManager.show(
      'Cambios pendientes',
      `Tienes ${pendingHorarios.length} cambios sin guardar. El PDF solo incluirá datos guardados en el servidor.<br><em>¿Guardar ahora o continuar sin ellos?</em>`,
      `<button type="button" class="btn-enterprise secondary" data-action="cancel">Cancelar</button>
       <button type="button" class="btn-enterprise warning" data-action="save">💾 Guardar y descargar</button>
       <button type="button" class="btn-enterprise primary" data-action="continue">📥 Descargar sin guardar</button>`
    );
    
    if (action === 'save') {
      await this.saveAllPending();
    } else if (action !== 'continue') {
      return;
    }
  }

  const totalHorarios = existingHorarios.length + savedHorarios.length;
  if (totalHorarios === 0) {
    notificationManager.show('warning', 'Sin horarios', 
      'No hay clases programadas para descargar.',
      'Agrega algunas clases antes de generar el PDF.');
    return;
  }

  let pdfElement = null;

  try {
    console.log('Iniciando generación de PDF');
    
    // Mostrar overlay de carga
    this.showPDFLoadingOverlay();

    // Paso 1: Recargar datos del servidor (igual que tu código)
    const response = await fetch(`${ROUTES.horarios_index}?grado_id=${CURRENT_GRADO_ID}&format=json`, {
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    });

    if (response.ok) {
      const horarios = await response.json();
      this.clearSchedule();
      this.loadSchedulesIntoTable(horarios);
    } else {
      throw new Error('No se pudieron cargar los horarios');
    }

    // Paso 2: Preparar PDF (igual que tu código)
    this.actualizarHorarioPDF();
    pdfElement = document.getElementById('horario-pdf');
    
    if (!pdfElement) {
      throw new Error('Elemento PDF no encontrado');
    }

    // Paso 3: NUEVA ESTRATEGIA - Crear capa de renderizado invisible
    // En lugar de ocultar elementos existentes, crear un entorno aislado
    
    // Crear contenedor de renderizado invisible
    const renderContainer = document.createElement('div');
    renderContainer.id = 'pdf-render-container';
    renderContainer.style.cssText = `
      position: fixed;
      top: 0;
      left: -100vw;
      width: 100vw;
      height: 100vh;
      background: white;
      z-index: -1000;
      visibility: hidden;
      opacity: 0;
      overflow: hidden;
    `;

    // Clonar el PDF y colocarlo en el contenedor invisible
    const pdfClone = pdfElement.cloneNode(true);
    pdfClone.id = 'pdf-clone-for-render';
    
    // Aplicar los mismos estilos que funcionan en tu código original
    pdfClone.style.cssText = `
      display: block !important;
      visibility: visible !important;
      position: relative !important;
      background: white !important;
      font-family: Arial, sans-serif !important;
      color: black !important;
      width: 100% !important;
      margin: 0 !important;
      padding: 20px !important;
    `;

    // Limpiar estilos problemáticos (igual que tu código)
    const pdfElements = pdfClone.querySelectorAll('*');
    pdfElements.forEach(el => {
      el.style.animation = 'none';
      el.style.transition = 'none';
      el.style.transform = 'none';
      el.style.boxShadow = 'none';
      el.style.borderRadius = '0';
    });

    // CLAVE: Copiar el innerHTML actualizado del PDF original
    pdfClone.innerHTML = pdfElement.innerHTML;

    // Agregar el clon al contenedor invisible
    renderContainer.appendChild(pdfClone);
    document.body.appendChild(renderContainer);

    // Paso 4: Hacer visible SOLO para html2pdf de manera imperceptible
    // Mover temporalmente a posición visible pero fuera del viewport
    renderContainer.style.left = '0';
    renderContainer.style.top = '-200vh'; // Muy arriba, fuera de vista
    renderContainer.style.visibility = 'visible';
    renderContainer.style.opacity = '1';

    // Paso 5: Esperar renderizado (reducir tiempo a 2 segundos)
    await new Promise(resolve => setTimeout(resolve, 2000));

    // Paso 6: Configuración html2pdf (igual que tu código pero apuntando al clon)
    const opt = {
      margin: [10, 10, 10, 10],
      filename: `Horario_${this.getGradeName(CURRENT_GRADO_ID)}_${new Date().toISOString().split('T')[0]}.pdf`,
      image: { 
        type: 'jpeg', 
        quality: 0.95 
      },
      html2canvas: { 
        scale: 2,
        useCORS: true,
        allowTaint: false,
        backgroundColor: '#ffffff',
        logging: false,
        width: 1200,
        height: 800,
        scrollX: 0,
        scrollY: 0
      },
      jsPDF: { 
        unit: 'mm', 
        format: 'a4', 
        orientation: 'landscape',
        compress: true
      }
    };
    
    // Paso 7: Generar PDF desde el clon (la vista principal nunca se afecta)
    console.log('Iniciando conversión a PDF...');
    await html2pdf().set(opt).from(pdfClone).save();
    
    console.log('PDF generado exitosamente');
    
    // Paso 8: Limpiar contenedor invisible
    document.body.removeChild(renderContainer);
    
    // Ocultar overlay
    this.hidePDFLoadingOverlay();
    
    notificationManager.show('success', 'PDF descargado', 
      `Horario de ${this.getGradeName(CURRENT_GRADO_ID)} descargado exitosamente.`,
      'El archivo incluye todas las clases guardadas con un diseño profesional.');

  } catch (error) {
    console.error('Error generando PDF:', error);
    
    // Limpiar en caso de error
    const renderContainer = document.getElementById('pdf-render-container');
    if (renderContainer) {
      document.body.removeChild(renderContainer);
    }
    
    this.hidePDFLoadingOverlay();
    notificationManager.show('error', 'Error al generar PDF', 
      'No se pudo generar el archivo PDF. ' + error.message,
      'Intenta nuevamente o contacta al soporte técnico.');
  }
}




    

    // Modal profesional con fondo transparente - versión compatible
    showPDFLoadingOverlay() {
      const overlay = document.createElement('div');
      overlay.id = 'pdf-loading-overlay';
      overlay.innerHTML = `
        <div style="
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: rgba(0, 0, 0, 0.5);
          z-index: 9999;
          display: flex;
          align-items: center;
          justify-content: center;
          font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
        ">
          <div style="
            background: white;
            padding: 3rem 2.5rem;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.25), 0 8px 20px rgba(0,0,0,0.15);
            text-align: center;
            max-width: 380px;
            border: 1px solid rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
          ">
            <div style="
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 4px;
              background: linear-gradient(90deg, #3498db, #2ecc71, #3498db);
              background-size: 200% 100%;
              animation: shimmer 2s linear infinite;
            "></div>
            
            <div style="
              width: 60px;
              height: 60px;
              border: 4px solid #ecf0f1;
              border-top: 4px solid #3498db;
              border-radius: 50%;
              animation: spin 1s linear infinite;
              margin: 0 auto 1.5rem;
            "></div>
            
            <h3 style="
              margin: 0 0 0.75rem; 
              color: #2c3e50;
              font-size: 1.5rem;
              font-weight: 600;
              letter-spacing: -0.5px;
            ">Generando PDF</h3>
            
            <p style="
              margin: 0 0 1rem; 
              color: #34495e; 
              font-size: 1rem;
              line-height: 1.4;
            ">Preparando tu horario académico...</p>
            
            <div style="
              display: flex;
              align-items: center;
              justify-content: center;
              gap: 0.5rem;
              font-size: 0.85rem;
              color: #7f8c8d;
            ">
              <div style="
                width: 6px;
                height: 6px;
                background: #3498db;
                border-radius: 50%;
                animation: pulse 1.5s ease-in-out infinite;
              "></div>
              <span>Procesando datos del sistema</span>
            </div>
          </div>
        </div>
        
        <style>
          @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
          }
          
          @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
          }
          
          @keyframes pulse {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
          }
        </style>
      `;
      document.body.appendChild(overlay);
    }

    hidePDFLoadingOverlay() {
      const overlay = document.getElementById('pdf-loading-overlay');
      if (overlay) {
        overlay.style.opacity = '0';
        setTimeout(() => {
          if (overlay.parentNode) {
            overlay.parentNode.removeChild(overlay);
          }
        }, 300);
      }
    }

    actualizarHorarioPDF() {
      console.log('Iniciando actualizarHorarioPDF con CURRENT_GRADO_ID:', CURRENT_GRADO_ID);
      
      const pdfGradoNombre = document.getElementById('pdf-grado-nombre');
      if (pdfGradoNombre && CURRENT_GRADO_ID) {
        const gradoName = this.getGradeName(CURRENT_GRADO_ID);
        pdfGradoNombre.textContent = `Grado: ${gradoName}`;
      }

      this.limpiarHorarioPDF();

      const todosLosHorarios = [...existingHorarios, ...savedHorarios];
      const coloresAsignaturas = {};
      let colorIndex = 1;

      todosLosHorarios.forEach(horario => {
        const diaNum = invDiasMap[horario.dia];
        if (!diaNum) return;

        const horaInicioNormalizada = horario.hora_inicio.substring(0, 5);
        const asignaturaId = horario.asignatura_id;
        
        if (!coloresAsignaturas[asignaturaId]) {
          coloresAsignaturas[asignaturaId] = colorIndex;
          colorIndex = (colorIndex % 6) + 1;
        }

        const selector = `.pdf-clase-cell[data-pdf-dia="${diaNum}"][data-pdf-inicio="${horaInicioNormalizada}"]`;
        const pdfCell = document.querySelector(selector);

        if (pdfCell) {
          const asignaturaTexto = horario.asignatura?.nombre || this.getAsignaturaName(horario.asignatura_id);
          const profesorTexto = horario.user?.name || this.getProfessorName(horario.user_id);

          pdfCell.innerHTML = `
            <div class="pdf-clase-ocupada color-${coloresAsignaturas[asignaturaId]}">
              <span class="pdf-asignatura">${asignaturaTexto}</span>
              <span class="pdf-profesor">${profesorTexto}</span>
            </div>
          `;
        }
      });
    }

    limpiarHorarioPDF() {
      document.querySelectorAll('.pdf-clase-cell').forEach(cell => {
        cell.innerHTML = `
          <div class="pdf-clase-vacia">
            <span class="pdf-placeholder">Libre</span>
          </div>
        `;
      });
    }

    async handleDrop(e, cell) {
      if (!CURRENT_GRADO_ID) {
        notificationManager.show('warning', 'Selecciona un grado',
          'Primero debes seleccionar un grado antes de asignar horarios.');
        return;
      }

      const data = JSON.parse(e.dataTransfer.getData('text/plain') || '{}');
      if (!data || !data.id) return;

      if (cell.classList.contains('occupied') && !cell.classList.contains('editing')) {
        const action = await this.showOccupiedCellModal(cell, data);
        if (action === 'cancel') return;
        if (action === 'replace') {
          this.clearCell(cell);
        }
      }

      await this.assignToCell(cell, data);
    }

    async assignToCell(cell, data) {
      const dia = diasMap[Number(cell.dataset.dia)];
      const horaInicio = cell.dataset.inicio;
      const horaFin = cell.dataset.fin;

      const existeEnPendientes = pendingHorarios.some(h =>
        h.dia === dia && h.hora_inicio === horaInicio
      );

      if (existeEnPendientes) {
        const action = await modalManager.show(
          'Horario pendiente',
          'Ya tienes un horario pendiente para esta franja. ¿Deseas reemplazarlo?',
          `<button type="button" class="btn-enterprise secondary" data-action="cancel">Cancelar</button>
           <button type="button" class="btn-enterprise warning" data-action="replace">🔄 Reemplazar</button>`
        );

        if (action !== 'replace') return;
        this.removeFromArrays(dia, horaInicio);
      }

      let asignaturaId = cell.dataset.asignaturaId;
      let profesorId = cell.dataset.userId;

      if (data.type === 'asignatura') {
        asignaturaId = data.id;
      } else if (data.type === 'profesor') {
        profesorId = data.id;
      }

      if (!profesorId) {
        profesorId = await modalManager.showTeacherSelection();
        if (!profesorId) {
          notificationManager.show('warning', 'Profesor requerido',
            'Debes seleccionar un profesor para completar este horario.');
          return;
        }
      }

      const horarioData = {
        grado_id: CURRENT_GRADO_ID,
        asignatura_id: asignaturaId,
        user_id: profesorId,
        dia: dia,
        hora_inicio: horaInicio,
        hora_fin: horaFin,
        cell: cell,
        isUpdate: !!cell.dataset.horarioId,
        horarioId: cell.dataset.horarioId || null
      };

      this.addToPending(horarioData);
      this.renderScheduleSlot(cell, {
        asignaturaId: asignaturaId,
        profesorId: profesorId,
        asignaturaText: data.type === 'asignatura' ? data.text : this.getAsignaturaName(asignaturaId),
        profesorText: this.getProfessorName(profesorId),
        isExisting: false
      });

      cell.classList.add('occupied');
      this.updateCounters();
    }

    renderScheduleSlot(cell, info) {
      if (info.asignaturaId) cell.dataset.asignaturaId = info.asignaturaId;
      if (info.profesorId) cell.dataset.userId = info.profesorId;

      const slotHtml = `
        <div class="class-slot ${info.isExisting ? 'existing' : 'pending'}">
          <div class="slot-status ${info.isExisting ? 'existing' : 'pending'}"></div>
          <div class="slot-content">
            <div class="slot-subject">${info.asignaturaText || 'Asignatura'}</div>
            <div class="slot-teacher">${info.profesorText || 'Profesor'}</div>
          </div>
          <div class="slot-actions">
            ${info.isExisting ? `
              <button class="slot-btn" onclick="scheduleManager.editSchedule(this)" title="Editar">
                <i class="fas fa-edit"></i>
              </button>
            ` : ''}
            <button class="slot-btn" onclick="scheduleManager.removeSchedule(this)" title="Eliminar">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      `;

      cell.innerHTML = slotHtml;
    }

    addToPending(horarioData) {
      const key = `${horarioData.dia}-${horarioData.hora_inicio}`;
      pendingHorarios = pendingHorarios.filter(h => `${h.dia}-${h.hora_inicio}` !== key);
      pendingHorarios.push(horarioData);

      setTimeout(() => {
        const slot = horarioData.cell.querySelector('.class-slot');
        if (slot) slot.classList.add('pending');
      }, 10);

      this.updateCounters();
    }

    async loadExistingSchedules(gradoId) {
      try {
        const response = await fetch(`${ROUTES.horarios_index}?grado_id=${gradoId}&format=json`, {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });

        const gradoNombre = this.getGradeName(gradoId);

        if (response.ok) {
          const horarios = await response.json();
          this.clearSchedule();

          if (horarios && horarios.length > 0) {
            this.loadSchedulesIntoTable(horarios);
            notificationManager.show('success', 'Horarios cargados',
              `Se encontraron ${horarios.length} clases programadas para ${gradoNombre}.`,
              'Las casillas con borde verde son horarios existentes.');
          } else {
            notificationManager.show('info', 'Grado sin horarios',
              `${gradoNombre} no tiene horarios asignados.`,
              'Comienza arrastrando asignaturas y profesores a las casillas.');
          }
        } else {
          throw new Error(`HTTP ${response.status}`);
        }
      } catch (error) {
        console.error('Error cargando horarios:', error);
        throw error;
      }
    }

    loadSchedulesIntoTable(horarios) {
      existingHorarios = [];
      savedHorarios = [];

      horarios.forEach(h => {
        const diaNum = invDiasMap[h.dia];
        const horaInicioNormalizada = h.hora_inicio.substring(0, 5);

        if (!diaNum) {
          console.warn(`Día inválido: ${h.dia}`);
          return;
        }

        const selector = `.dropzone[data-dia="${diaNum}"][data-inicio="${horaInicioNormalizada}"]`;
        const cell = document.querySelector(selector);

        if (cell && !cell.classList.contains('occupied')) {
          cell.dataset.horarioId = h.id;
          cell.classList.add('occupied', 'has-existing');

          this.renderScheduleSlot(cell, {
            asignaturaId: h.asignatura_id,
            profesorId: h.user_id,
            asignaturaText: h.asignatura?.nombre || this.getAsignaturaName(h.asignatura_id),
            profesorText: h.user?.name || this.getProfessorName(h.user_id),
            isExisting: true
          });

          existingHorarios.push({ ...h, hora_inicio: horaInicioNormalizada, cell: cell });
        }
      });

      this.actualizarHorarioPDF();
      this.updateCounters();
    }

    async showOccupiedCellModal(cell, data) {
      const currentSubject = this.getAsignaturaName(cell.dataset.asignaturaId);
      const currentTeacher = this.getProfessorName(cell.dataset.userId);
      const day = diasMap[Number(cell.dataset.dia)];
      const time = cell.dataset.inicio;

      const modalBody = `
        <div class="alert alert-warning">
          <h6><i class="fas fa-exclamation-triangle me-2"></i>Casilla ocupada</h6>
          <p class="mb-2">Ya existe una clase programada para <strong>${day}</strong> a las <strong>${time}</strong>:</p>
          <div class="bg-light p-2 rounded">
            <small>
              <strong>Asignatura:</strong> ${currentSubject}<br>
              <strong>Profesor:</strong> ${currentTeacher}
            </small>
          </div>
        </div>
        <p>¿Qué deseas hacer?</p>
      `;

      const modalFooter = `
        <button type="button" class="btn-enterprise secondary" data-action="cancel">
          Cancelar
        </button>
        <button type="button" class="btn-enterprise warning" data-action="replace">
          <i class="fas fa-exchange-alt"></i>
          Reemplazar
        </button>
        <button type="button" class="btn-enterprise primary" data-action="continue">
          <i class="fas fa-plus"></i>
          Mantener y agregar
        </button>
      `;

      return await modalManager.show('Casilla ocupada', modalBody, modalFooter);
    }

    async showSaveConfirmation() {
      if (pendingHorarios.length === 0) {
        notificationManager.show('info', 'Sin cambios', 'No hay cambios pendientes para guardar.');
        return;
      }

      const scheduleList = pendingHorarios.map(s =>
        `<li><strong>${s.dia} ${s.hora_inicio}-${s.hora_fin}:</strong> ${this.getAsignaturaName(s.asignatura_id)} con ${this.getProfessorName(s.user_id)}</li>`
      ).join('');

      const modalBody = `
        <p>¿Confirmas que deseas guardar los siguientes horarios?</p>
        <div class="alert alert-info">
          <h6><i class="fas fa-list me-2"></i>Cambios a guardar (${pendingHorarios.length}):</h6>
          <ul class="mb-0 small">${scheduleList}</ul>
        </div>
        <p class="text-muted small">Esta acción guardará permanentemente los horarios en la base de datos.</p>
      `;

      const modalFooter = `
        <button type="button" class="btn-enterprise secondary" data-action="cancel">
          Cancelar
        </button>
        <button type="button" class="btn-enterprise success" data-action="save">
          <i class="fas fa-save"></i>
          Guardar todo
        </button>
      `;

      const action = await modalManager.show('Confirmar guardado', modalBody, modalFooter);

      if (action === 'save') {
        await this.saveAllPending();
      }
    }

    async showResetConfirmation() {
      const totalSchedules = existingHorarios.length + savedHorarios.length + pendingHorarios.length;

      const modalBody = `
        <div class="alert alert-warning">
          <h6><i class="fas fa-exclamation-triangle me-2"></i>¿Reiniciar horario?</h6>
          <p class="mb-2">Se limpiarán <strong>${totalSchedules} clases programadas</strong>.</p>
          <p class="mb-0"><strong>Nota:</strong> Los horarios guardados en la base de datos NO se eliminarán.</p>
        </div>
        <p>Esta acción solo reiniciará la vista actual. Podrás volver a cargar los datos seleccionando el grado nuevamente.</p>
      `;

      const modalFooter = `
        <button type="button" class="btn-enterprise secondary" data-action="cancel">
          Cancelar
        </button>
        <button type="button" class="btn-enterprise warning" data-action="reset">
          <i class="fas fa-undo"></i>
          Reiniciar vista
        </button>
      `;

      const action = await modalManager.show('Confirmar reinicio', modalBody, modalFooter);

      if (action === 'reset') {
        this.resetSchedule();
      }
    }

    async saveAllPending() {
      if (pendingHorarios.length === 0) return;

      const originalText = saveBtnText?.textContent || 'Guardar Cambios';
      if (saveBtn) saveBtn.disabled = true;
      if (saveBtnText) saveBtnText.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...';

      let successful = 0;
      let errors = 0;

      for (const horario of pendingHorarios) {
        try {
          const result = await this.saveSchedule(horario);
          if (result.success) {
            successful++;
            this.markAsExisting(horario);
          } else {
            errors++;
            this.markAsError(horario);
          }
        } catch (error) {
          console.error('Error saving schedule:', error);
          errors++;
          this.markAsError(horario);
        }
      }

      pendingHorarios = pendingHorarios.filter(s => {
        const slot = s.cell.querySelector('.class-slot');
        return slot && slot.classList.contains('error');
      });

      if (saveBtn) saveBtn.disabled = false;
      if (saveBtnText) saveBtnText.textContent = originalText;
      this.updateCounters();

      this.actualizarHorarioPDF();

      if (errors === 0) {
        notificationManager.show('success', 'Guardado exitoso',
          `Se guardaron ${successful} horarios correctamente.`,
          'Los horarios se han sincronizado con la base de datos.');
      } else if (successful > 0) {
        notificationManager.show('warning', 'Guardado parcial',
          `${successful} horarios guardados, ${errors} fallaron.`,
          'Revisa los horarios marcados en rojo e intenta guardarlos nuevamente.');
      } else {
        notificationManager.show('error', 'Error al guardar',
          'No se pudieron guardar los horarios.',
          'Verifica tu conexión e intenta nuevamente.');
      }
    }

    async saveSchedule(horarioData) {
      const payload = {
        grado_id: horarioData.grado_id,
        asignatura_id: horarioData.asignatura_id,
        user_id: horarioData.user_id,
        dia: horarioData.dia,
        hora_inicio: horarioData.hora_inicio,
        hora_fin: horarioData.hora_fin,
        _token: CSRF
      };

      try {
        let url, method;

        if (horarioData.isUpdate && horarioData.horarioId) {
          url = `/admin/horarios/${horarioData.horarioId}`;
          method = 'PUT';
          payload._method = 'PUT';
        } else {
          url = ROUTES.horarios_store;
          method = 'POST';
        }

        const response = await fetch(url, {
          method: method,
          headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: JSON.stringify(payload)
        });

        if (!response.ok) {
          if (response.status === 409) {
            const errorData = await response.json();
            return { success: false, error: errorData.error };
          }
          throw new Error(`HTTP ${response.status}`);
        }

        const json = await response.json();

        if (json.success && json.horario && json.horario.id) {
          horarioData.cell.dataset.horarioId = json.horario.id;
          horarioData.hora_inicio = json.horario.hora_inicio.substring(0, 5);
        }

        return {
          success: !!json.success,
          error: json.error || null
        };

      } catch (error) {
        console.error('Error en fetch:', error);
        return { success: false, error: error.message };
      }
    }

    markAsExisting(schedule) {
      const slot = schedule.cell.querySelector('.class-slot');
      if (slot) {
        slot.classList.remove('pending');
        slot.classList.add('existing');
        const status = slot.querySelector('.slot-status');
        if (status) {
          status.classList.remove('pending');
          status.classList.add('existing');
        }
      }
      savedHorarios.push(schedule);
    }

    markAsError(schedule) {
      const slot = schedule.cell.querySelector('.class-slot');
      if (slot) {
        slot.classList.remove('pending');
        slot.classList.add('error');
        const status = slot.querySelector('.slot-status');
        if (status) {
          status.classList.remove('pending');
          status.classList.add('error');
        }
      }
    }

    async removeSchedule(btnElement) {
      const cell = btnElement.closest('.dropzone');
      const slot = cell?.querySelector('.class-slot');
      const isExisting = slot?.classList.contains('existing');

      const subjectName = this.getAsignaturaName(cell?.dataset.asignaturaId);
      const teacherName = this.getProfessorName(cell?.dataset.userId);

      const modalBody = `
        <div class="alert alert-${isExisting ? 'danger' : 'warning'}">
          <h6><i class="fas fa-trash me-2"></i>¿Eliminar horario?</h6>
          <p class="mb-2">Se eliminará la siguiente clase:</p>
          <div class="bg-light p-2 rounded">
            <small>
              <strong>Asignatura:</strong> ${subjectName}<br>
              <strong>Profesor:</strong> ${teacherName}
            </small>
          </div>
          ${isExisting ? '<p class="mb-0 mt-2"><strong>⚠️ Esta acción eliminará permanentemente el horario de la base de datos.</strong></p>' : ''}
        </div>
      `;

      const modalFooter = `
        <button type="button" class="btn-enterprise secondary" data-action="cancel">
          Cancelar
        </button>
        <button type="button" class="btn-enterprise danger" data-action="delete">
          <i class="fas fa-trash"></i>
          ${isExisting ? 'Eliminar permanentemente' : 'Eliminar'}
        </button>
      `;

      const action = await modalManager.show('Confirmar eliminación', modalBody, modalFooter);

      if (action === 'delete') {
        await this.executeRemoval(cell, isExisting);
      }
    }

    async executeRemoval(cell, isExisting) {
      if (isExisting) {
        try {
          const response = await fetch(`/admin/horarios/${cell.dataset.horarioId}`, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': CSRF,
              'X-Requested-With': 'XMLHttpRequest'
            }
          });

          if (!response.ok) {
            notificationManager.show('error', 'Error al eliminar', 'No se pudo eliminar el horario de la base de datos.');
            return;
          }
        } catch (error) {
          notificationManager.show('error', 'Error de conexión', 'No se pudo conectar con el servidor.');
          return;
        }
      }

      const dia = diasMap[Number(cell.dataset.dia)];
      const horaInicio = cell.dataset.inicio;
      this.removeFromArrays(dia, horaInicio);
      this.clearCell(cell);
      this.updateCounters();

      this.actualizarHorarioPDF();

      notificationManager.show('success', 'Eliminado correctamente',
        isExisting ? 'El horario ha sido eliminado de la base de datos.' : 'Asignación eliminada.');
    }

    editSchedule(btnElement) {
      const cell = btnElement.closest('.dropzone');
      const subjectName = this.getAsignaturaName(cell?.dataset.asignaturaId);
      const teacherName = this.getProfessorName(cell?.dataset.userId);

      const modalBody = `
        <div class="alert alert-info">
          <h6><i class="fas fa-edit me-2"></i>Editar horario</h6>
          <p class="mb-2">Horario actual:</p>
          <div class="bg-light p-2 rounded">
            <small>
              <strong>Asignatura:</strong> ${subjectName}<br>
              <strong>Profesor:</strong> ${teacherName}
            </small>
          </div>
        </div>
        <p>Para modificar este horario, arrastra una nueva asignatura o profesor sobre esta casilla.</p>
        <p class="text-muted small">El modo de edición se activará por 30 segundos.</p>
      `;

      const modalFooter = `
        <button type="button" class="btn-enterprise secondary" data-action="cancel">
          Cancelar
        </button>
        <button type="button" class="btn-enterprise primary" data-action="edit">
          <i class="fas fa-edit"></i>
          Activar edición
        </button>
      `;

      modalManager.show('Editar horario', modalBody, modalFooter).then(action => {
        if (action === 'edit') {
          this.enableEditMode(cell);
        }
      });
    }

    enableEditMode(cell) {
      cell.classList.add('editing');
      cell.classList.remove('occupied');

      const slot = cell.querySelector('.class-slot');
      if (slot) {
        slot.style.opacity = '0.7';
      }

      notificationManager.show('info', 'Modo edición activado',
        'Ahora puedes arrastrar una nueva asignatura o profesor sobre esta casilla.',
        'La edición se cancelará automáticamente en 30 segundos.');

      setTimeout(() => {
        cell.classList.remove('editing');
        cell.classList.add('occupied');
        if (slot) {
          slot.style.opacity = '1';
        }
      }, 30000);
    }

    updateCounters() {
      const pendingCountVal = pendingHorarios.length;
      const savedCountVal = savedHorarios.length + existingHorarios.length;

      if (pendingCount) pendingCount.textContent = pendingCountVal;
      if (savedCount) savedCount.textContent = savedCountVal;

      if (scheduleCounter) {
        scheduleCounter.innerHTML = `<span class="badge bg-light text-dark">${savedCountVal + pendingCountVal} clases programadas</span>`;
      }

      if (pendingCountVal > 0) {
        if (saveBtn) {
          saveBtn.disabled = false;
          saveBtn.classList.remove('secondary');
          saveBtn.classList.add('primary');
        }
        if (saveBtnText) {
          saveBtnText.textContent = `Guardar ${pendingCountVal} cambio${pendingCountVal > 1 ? 's' : ''}`;
        }
      } else {
        if (saveBtn) {
          saveBtn.disabled = true;
          saveBtn.classList.remove('primary');
          saveBtn.classList.add('secondary');
        }
        if (saveBtnText) {
          saveBtnText.textContent = 'Guardar Cambios';
        }
      }
    }

    showLoadingStatus() {
      if (loadingStatus) loadingStatus.classList.remove('d-none');
      if (scheduleStatus) scheduleStatus.classList.add('d-none');
    }

    hideLoadingStatus() {
      if (loadingStatus) loadingStatus.classList.add('d-none');
    }

    showScheduleStatus() {
      const totalSchedules = existingHorarios.length + savedHorarios.length;
      const gradeName = this.getGradeName(CURRENT_GRADO_ID);

      if (scheduleStatus) {
        scheduleStatus.innerHTML = `
          <i class="fas fa-info-circle"></i>
          <span>${gradeName}: ${totalSchedules} clases programadas</span>
          <div class="info-extra small mt-2"></div>
        `;

        const infoExtra = scheduleStatus.querySelector('.info-extra');

        if (totalSchedules > 0) {
          scheduleStatus.classList.remove('status-info');
          scheduleStatus.classList.add('status-success');
          if (infoExtra) {
            infoExtra.innerHTML = `
              <i class="fas fa-info-circle me-1"></i>
              Los horarios existentes se muestran con borde verde. 
              Puedes agregar nuevos horarios o modificar los existentes.
            `;
          }
        } else {
          scheduleStatus.classList.remove('status-success');
          scheduleStatus.classList.add('status-info');
          if (infoExtra) {
            infoExtra.innerHTML = `
              <i class="fas fa-plus-circle me-1"></i>
              No hay horarios asignados. Comienza arrastrando asignaturas y profesores a las casillas.
            `;
          }
        }

        scheduleStatus.classList.remove('d-none');
      }
    }

    hideStatus() {
      if (scheduleStatus) scheduleStatus.classList.add('d-none');
      if (loadingStatus) loadingStatus.classList.add('d-none');
    }

    clearSchedule() {
      document.querySelectorAll('.dropzone').forEach(cell => {
        this.clearCell(cell);
      });
      pendingHorarios = [];
      savedHorarios = [];
      existingHorarios = [];
      this.updateCounters();
      this.limpiarHorarioPDF();
    }

    resetSchedule() {
      this.clearSchedule();
      CURRENT_GRADO_ID = null;
      if (gradoSelect) gradoSelect.value = '';
      this.hideStatus();
      notificationManager.show('info', 'Vista reiniciada', 'El horario ha sido reiniciado. Selecciona un grado para cargar sus horarios.');
    }

    clearCell(cell) {
      cell.classList.remove('occupied', 'has-existing', 'editing');
      delete cell.dataset.asignaturaId;
      delete cell.dataset.userId;
      delete cell.dataset.horarioId;

      const day = diasMap[Number(cell.dataset.dia)] || 'Día';
      const time = cell.dataset.inicio || 'Hora';

      cell.innerHTML = `
        <div class="slot-placeholder">
          <div class="placeholder-day">${day}</div>
          <div class="placeholder-time">${time}</div>
          <div class="placeholder-action">Arrastra aquí</div>
        </div>
      `;
    }

    removeFromArrays(dia, horaInicio) {
      const key = `${dia}-${horaInicio}`;
      pendingHorarios = pendingHorarios.filter(h => `${h.dia}-${h.hora_inicio}` !== key);
      savedHorarios = savedHorarios.filter(h => `${h.dia}-${h.hora_inicio}` !== key);
      existingHorarios = existingHorarios.filter(h => `${h.dia}-${h.hora_inicio}` !== key);
    }

    // Métodos utilitarios
    getAsignaturaName(id) {
      return ASIGNATURAS[id] || 'Asignatura';
    }

    getProfessorName(id) {
      const profesor = PROFESORES.find(p => String(p.id) === String(id));
      return profesor?.name || 'Profesor';
    }

    getGradeName(id) {
      return GRADOS[id] || 'Grado';
    }

    showModal(title, body, footer, size = '') {
      return modalManager.show(title, body, footer, size);
    }
  }

  // ========================================
  // INICIALIZACIÓN DEL SISTEMA
  // ========================================

  // Instanciar gestores globales
  window.notificationManager = new NotificationManager();
  window.modalManager = new ModalManager();
  window.scheduleManager = new EnterpriseScheduleManager();

  // Prevenir comportamientos de arrastre por defecto
  document.addEventListener('dragover', (e) => {
    if (!e.target.closest('.dropzone, .resource-chip')) {
      e.preventDefault();
    }
  });

  document.addEventListener('drop', (e) => {
    if (!e.target.closest('.dropzone')) {
      e.preventDefault();
    }
  });

  // Observer para actualizaciones automáticas del PDF
  const observer = new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
      if (mutation.type === 'childList' && mutation.target.classList.contains('dropzone')) {
        setTimeout(() => {
          if (CURRENT_GRADO_ID && window.scheduleManager) {
            window.scheduleManager.actualizarHorarioPDF();
          }
        }, 100);
      }
    });
  });

  // Observer para todas las dropzones
  document.querySelectorAll('.dropzone').forEach(zone => {
    observer.observe(zone, { childList: true, subtree: true });
  });

  // ========================================
  // UTILIDADES ADICIONALES PARA DEBUGGING
  // ========================================
  window.horarioUtils = {
    exportarDatos: function() {
      const datos = {
        grado: CURRENT_GRADO_ID ? window.scheduleManager.getGradeName(CURRENT_GRADO_ID) : null,
        existentes: existingHorarios.length,
        guardados: savedHorarios.length,
        pendientes: pendingHorarios.length,
        total: existingHorarios.length + savedHorarios.length + pendingHorarios.length
      };
      console.table(datos);
      return datos;
    },
    
    verificarEstado: function() {
      return {
        gradoSeleccionado: !!CURRENT_GRADO_ID,
        horariosExistentes: existingHorarios.length,
        cambiosPendientes: pendingHorarios.length,
        puedeGuardar: pendingHorarios.length > 0,
        puedeDescargarPDF: (existingHorarios.length + savedHorarios.length) > 0
      };
    },

    // Funciones para debugging de PDF
    testPDFStyles: function() {
      const manager = window.scheduleManager.pdfStyleManager;
      const pdfElement = document.getElementById('horario-pdf');
      
      if (pdfElement) {
        manager.preparePDFMode(pdfElement);
        pdfElement.classList.remove('d-none');
        
        console.log('Modo PDF activado para testing');
        
        setTimeout(() => {
          manager.restoreNormalMode();
          pdfElement.classList.add('d-none');
          console.log('Modo PDF desactivado');
        }, 5000);
      }
    },

    limpiarEstilosPDF: function() {
      const pdfStyles = document.getElementById('pdf-styles');
      if (pdfStyles) {
        pdfStyles.remove();
        console.log('Estilos PDF removidos');
      }
      
      const mainContainer = document.querySelector('.enterprise-schedule-system');
      if (mainContainer) {
        mainContainer.classList.remove('pdf-mode');
        console.log('Clase pdf-mode removida');
      }
    },

    verificarElementoPDF: function() {
      const pdfElement = document.getElementById('horario-pdf');
      if (pdfElement) {
        console.log('Elemento PDF encontrado');
        console.log('Classes:', pdfElement.className);
        console.log('Display:', getComputedStyle(pdfElement).display);
        console.log('Visibility:', getComputedStyle(pdfElement).visibility);
        return true;
      } else {
        console.error('Elemento PDF NO encontrado');
        return false;
      }
    }
  };

  console.log('Sistema de Horarios Empresarial inicializado con gestión de estilos PDF');
  console.log('Utilidades disponibles en window.horarioUtils');
});