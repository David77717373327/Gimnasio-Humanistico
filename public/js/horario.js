document.addEventListener('DOMContentLoaded', () => {
  // Datos seguros desde Blade
  const CSRF = window.Laravel.csrfToken;
  let CURRENT_GRADO_ID = window.Laravel.currentGradoId;
  const diasMap = {1:'Lunes',2:'Martes',3:'Miércoles',4:'Jueves',5:'Viernes'};

  // Lista de profesores para el modal
  const PROFESORES = window.Laravel.profesores;
  
  // Lista de asignaturas para referencia
  const ASIGNATURAS = window.Laravel.asignaturas;

  // Array para almacenar horarios pendientes de guardar
  let pendingHorarios = [];
  let savedHorarios = [];
  let existingHorarios = []; // Variable para horarios existentes

  // Selector de grado mejorado
  const gradoSelect = document.getElementById('gradoSelect');
  gradoSelect.addEventListener('change', function() {
    CURRENT_GRADO_ID = this.value;
    
    if(CURRENT_GRADO_ID) {
      mostrarIndicadorCarga(true);
      cargarHorarioExistente(CURRENT_GRADO_ID);
    } else {
      limpiarHorario();
      ocultarIndicadores();
    }
  });

  // Funciones para indicadores de estado
  function mostrarIndicadorCarga(mostrar) {
    const indicator = document.getElementById('loading-indicator');
    if(mostrar) {
      indicator.classList.remove('d-none');
    } else {
      indicator.classList.add('d-none');
    }
  }

  function mostrarEstadoHorarios(count) {
    const statusDiv = document.getElementById('horarios-status');
    const countSpan = document.getElementById('horarios-count');
    
    if(count > 0) {
      countSpan.textContent = count;
      statusDiv.classList.remove('d-none');
      statusDiv.querySelector('.alert').className = 'alert alert-success';
      statusDiv.querySelector('strong').innerHTML = '✅ Horarios cargados:';
    } else {
      statusDiv.classList.add('d-none');
    }
  }

  function ocultarIndicadores() {
    document.getElementById('loading-indicator').classList.add('d-none');
    document.getElementById('horarios-status').classList.add('d-none');
  }

  // Modal de profesor mejorado
  function openProfesorModal(prefillId = null) {
    const modal = new bootstrap.Modal(document.getElementById('modal-profesor'));
    const select = document.getElementById('modal-profesor-select');
    const okBtn = document.getElementById('modal-profesor-ok');
    
    // Poblar select
    select.innerHTML = '<option value="">-- Selecciona un profesor --</option>';
    PROFESORES.forEach(p => {
      const option = document.createElement('option');
      option.value = p.id;
      option.textContent = p.name;
      if(prefillId && String(prefillId) === String(p.id)) option.selected = true;
      select.appendChild(option);
    });
    
    modal.show();
    
    return new Promise((resolve) => {
      function cleanup(value) {
        modal.hide();
        okBtn.removeEventListener('click', handleOk);
        resolve(value);
      }
      
      function handleOk() {
        cleanup(select.value || null);
      }
      
      okBtn.addEventListener('click', handleOk);
      
      document.getElementById('modal-profesor').addEventListener('hidden.bs.modal', function handler() {
        this.removeEventListener('hidden.bs.modal', handler);
        cleanup(null);
      });
    });
  }

  // Función mejorada para mostrar mensajes al usuario
  function mostrarMensaje(tipo, titulo, mensaje, sugerencia = null) {
    const iconos = {
      success: '✅',
      error: '❌', 
      warning: '⚠️',
      info: 'ℹ️'
    };

    const colores = {
      success: 'success',
      error: 'danger',
      warning: 'warning', 
      info: 'info'
    };

    let contenido = `
      <div class="alert alert-${colores[tipo]} alert-dismissible fade show" role="alert">
        <div class="d-flex">
          <div class="flex-shrink-0" style="font-size: 1.2em; margin-right: 0.5rem;">
            ${iconos[tipo]}
          </div>
          <div class="flex-grow-1">
            <strong>${titulo}</strong><br>
            ${mensaje}
            ${sugerencia ? `<br><small class="text-muted"><em>💡 ${sugerencia}</em></small>` : ''}
          </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    `;

    // Buscar contenedor de mensajes o crear uno
    let container = document.getElementById('mensajes-container');
    if (!container) {
      container = document.createElement('div');
      container.id = 'mensajes-container';
      container.className = 'position-fixed';
      container.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 400px;';
      document.body.appendChild(container);
    }

    const alertElement = document.createElement('div');
    alertElement.innerHTML = contenido;
    container.appendChild(alertElement.firstElementChild);

    // Auto-remover después de 8 segundos para mensajes no críticos
    if (tipo !== 'error') {
      setTimeout(() => {
        const alert = container.querySelector('.alert');
        if (alert) {
          alert.classList.remove('show');
          setTimeout(() => alert.remove(), 150);
        }
      }, 8000);
    }
  }

  // Modal de confirmación inteligente
  function mostrarModalConfirmacion(titulo, mensaje, opciones = {}) {
    return new Promise((resolve) => {
      const modalHtml = `
        <div class="modal fade" id="modal-confirmacion-dinamico" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">${titulo}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                ${mensaje}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-action="cancelar">
                  ${opciones.cancelText || 'Cancelar'}
                </button>
                ${opciones.showReplace ? `
                  <button type="button" class="btn btn-warning" data-action="reemplazar">
                    🔄 Reemplazar
                  </button>
                ` : ''}
                <button type="button" class="btn btn-primary" data-action="continuar">
                  ${opciones.confirmText || 'Continuar'}
                </button>
              </div>
            </div>
          </div>
        </div>
      `;

      // Remover modal anterior si existe
      const existingModal = document.getElementById('modal-confirmacion-dinamico');
      if (existingModal) existingModal.remove();

      // Crear nuevo modal
      document.body.insertAdjacentHTML('beforeend', modalHtml);
      const modalElement = document.getElementById('modal-confirmacion-dinamico');
      const modal = new bootstrap.Modal(modalElement);

      // Event listeners
      modalElement.addEventListener('click', function(e) {
        if (e.target.hasAttribute('data-action')) {
          const action = e.target.getAttribute('data-action');
          modal.hide();
          modalElement.addEventListener('hidden.bs.modal', () => modalElement.remove());
          resolve(action);
        }
      });

      modal.show();
    });
  }

  // Inicializar drag & drop
  document.querySelectorAll('.draggable').forEach(el => {
    el.addEventListener('dragstart', ev => {
      ev.dataTransfer.setData('text/plain', JSON.stringify({
        type: el.dataset.type,
        id: el.dataset.id,
        text: el.dataset.text || el.querySelector('.chip-text')?.textContent.trim()
      }));
    });
  });

  // Dropzones mejorados
  document.querySelectorAll('.dropzone').forEach(zone => {
    zone.addEventListener('dragover', ev => {
      if(zone.classList.contains('locked')) return;
      ev.preventDefault();
      zone.classList.add('dragover');
    });
    
    zone.addEventListener('dragleave', () => zone.classList.remove('dragover'));

    zone.addEventListener('drop', async ev => {
      if(!CURRENT_GRADO_ID) {
        mostrarMensaje('error', 'Selecciona un grado', 'Primero debes seleccionar un grado antes de asignar horarios.');
        return;
      }
      
      ev.preventDefault();
      zone.classList.remove('dragover');

      const raw = ev.dataTransfer.getData('text/plain') || '{}';
      let data;
      try { data = JSON.parse(raw); } catch { return; }
      if(!data || !data.id) return;

      // Manejar celda ocupada con mejor UX
      if(zone.classList.contains('locked')) {
        const gradoNombre = getGradoName(CURRENT_GRADO_ID);
        const dia = diasMap[Number(zone.dataset.dia)];
        const hora = zone.dataset.inicio;
        
        const accion = await mostrarModalConfirmacion(
          'Casilla ocupada',
          `<p><strong>${gradoNombre}</strong> ya tiene un horario asignado para <strong>${dia}</strong> a las <strong>${hora}</strong>.</p>
           <p>¿Qué deseas hacer?</p>`,
          {
            cancelText: 'Cancelar',
            confirmText: '➕ Agregar aquí',
            showReplace: true
          }
        );

        if (accion === 'cancelar') return;
        
        if (accion === 'reemplazar') {
          const horaInicio = zone.dataset.inicio;
          removeFromArrays(dia, horaInicio);
          clearCell(zone);
        } else if (accion !== 'continuar') {
          return;
        }
      }

      // Verificar duplicados en pendientes
      const dia = diasMap[Number(zone.dataset.dia)];
      const horaInicio = zone.dataset.inicio;
      const existeEnPendientes = pendingHorarios.some(h => 
        h.dia === dia && h.hora_inicio === horaInicio
      );
      
      if(existeEnPendientes) {
        const accion = await mostrarModalConfirmacion(
          'Horario pendiente',
          'Ya tienes un horario pendiente para esta franja. ¿Deseas reemplazarlo?',
          { confirmText: '🔄 Reemplazar' }
        );
        
        if(accion !== 'continuar') return;
        removeFromArrays(dia, horaInicio);
      }

      // Manejo de asignatura y profesor
      const existingAsignaturaId = zone.dataset.asignaturaId ?? null;
      const existingProfesorId = zone.dataset.userId ?? null;

      let asignaturaId = existingAsignaturaId;
      let profesorId = existingProfesorId;

      if(data.type === 'asignatura') {
        asignaturaId = data.id;
      } else if(data.type === 'profesor') {
        profesorId = data.id;
      }

      // Si falta profesor, pedir selección
      if(!profesorId) {
        profesorId = await openProfesorModal();
        if(!profesorId) {
          mostrarMensaje('warning', 'Profesor requerido', 'Debes seleccionar un profesor para completar este horario.');
          return;
        }
      }

      // Crear objeto horario para array pendiente
      const horarioData = {
        grado_id: CURRENT_GRADO_ID,
        asignatura_id: asignaturaId,
        user_id: profesorId,
        dia: dia,
        hora_inicio: horaInicio,
        hora_fin: zone.dataset.fin,
        zone: zone,
        isUpdate: !!zone.dataset.horarioId,
        horarioId: zone.dataset.horarioId || null
      };

      // Agregar a pendientes
      addToPending(horarioData);

      // Render visual
      renderSlot(zone, {
        asignaturaId: asignaturaId,
        profesorId: profesorId,
        asignaturaText: data.type === 'asignatura' ? data.text : getAsignaturaName(asignaturaId),
        profesorText: getProfesosName(profesorId),
        isExisting: false
      });

      lockCell(zone);
    });
  });

  function addToPending(horarioData) {
    // Remover si ya existe uno para la misma celda
    const key = `${horarioData.dia}-${horarioData.hora_inicio}`;
    pendingHorarios = pendingHorarios.filter(h => `${h.dia}-${h.hora_inicio}` !== key);
    
    // Agregar nuevo
    pendingHorarios.push(horarioData);
    
    // Marcar como pendiente
    setTimeout(() => {
      horarioData.zone.querySelector('.slot-card')?.classList.add('pending');
    }, 10);
    
    updateSaveButtonState();
  }

  function updateSaveButtonState() {
    const saveBtn = document.getElementById('guardarTodo');
    if(pendingHorarios.length > 0) {
      saveBtn.textContent = `💾 Guardar (${pendingHorarios.length})`;
      saveBtn.classList.remove('btn-secondary');
      saveBtn.classList.add('btn-primary');
      saveBtn.disabled = false;
    } else {
      saveBtn.textContent = '💾 Guardar Horario';
      saveBtn.classList.remove('btn-primary');
      saveBtn.classList.add('btn-secondary');
    }
  }

  function renderSlot(zone, info) {
    // Guardar meta data
    if(info.asignaturaId) zone.dataset.asignaturaId = info.asignaturaId;
    if(info.profesorId) zone.dataset.userId = info.profesorId;

    zone.innerHTML = '';
    const card = document.createElement('div');
    card.className = `slot-card ${info.isExisting ? 'existing saved' : 'pending'}`;

    // Título principal
    const title = document.createElement('div');
    title.className = 'slot-title';
    title.textContent = info.asignaturaText || 'Asignatura';

    // Subtítulo
    const subtitle = document.createElement('div');
    subtitle.className = 'slot-subtitle';
    subtitle.textContent = `🧑‍🏫 ${info.profesorText || 'Profesor'}`;

    // Botones de acción
    const actions = document.createElement('div');
    actions.className = 'slot-actions';
    
    const deleteBtn = document.createElement('button');
    deleteBtn.className = 'slot-btn';
    deleteBtn.innerHTML = '🗑';
    deleteBtn.title = 'Eliminar';
    deleteBtn.onclick = () => removeSlot(zone);

    actions.appendChild(deleteBtn);

    // Badge de estado
    const badge = document.createElement('div');
    badge.className = 'lock-badge';
    badge.innerHTML = info.isExisting ? '✅ Guardado' : '⏳ Pendiente';

    card.appendChild(title);
    card.appendChild(subtitle);
    card.appendChild(actions);
    card.appendChild(badge);

    zone.appendChild(card);
  }

  // Nueva función para remover de arrays
  function removeFromArrays(dia, horaInicio) {
    const key = `${dia}-${horaInicio}`;
    
    // Remover de pendientes
    pendingHorarios = pendingHorarios.filter(h => `${h.dia}-${h.hora_inicio}` !== key);
    
    // Remover de guardados
    savedHorarios = savedHorarios.filter(h => `${h.dia}-${h.hora_inicio}` !== key);
    
    // Remover de existentes
    existingHorarios = existingHorarios.filter(h => `${h.dia}-${h.hora_inicio}` !== key);
    
    updateSaveButtonState();
  }

  // Función mejorada para remover slots
  async function removeSlot(zone) {
    const hasExistingHorario = zone.dataset.horarioId;
    
    const accion = await mostrarModalConfirmacion(
      'Confirmar eliminación',
      hasExistingHorario ? 
        '¿Eliminar esta asignación? Se eliminará permanentemente de la base de datos.' :
        '¿Eliminar esta asignación pendiente?',
      { 
        confirmText: hasExistingHorario ? '🗑️ Eliminar permanentemente' : '🗑️ Eliminar',
        cancelText: 'Cancelar'
      }
    );

    if(accion !== 'continuar') return;
    
    // Si es un horario ya guardado, eliminarlo de la base de datos
    if(hasExistingHorario) {
      try {
        const response = await fetch(`/admin/horarios/${zone.dataset.horarioId}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': CSRF,
            'X-Requested-With': 'XMLHttpRequest'
          }
        });
        
        if(!response.ok) {
          mostrarMensaje('error', 'Error al eliminar', 'No se pudo conectar con el servidor para eliminar el horario.');
          return;
        }
        
        const result = await response.json();
        if(!result.success) {
          mostrarMensaje('error', 'Error al eliminar', result.error || 'No se pudo eliminar el horario.');
          return;
        }
        
      } catch(error) {
        console.error('Error eliminando horario:', error);
        mostrarMensaje('error', 'Error de conexión', 'No se pudo conectar con el servidor.');
        return;
      }
    }
    
    // Remover de arrays locales
    const dia = diasMap[Number(zone.dataset.dia)];
    const horaInicio = zone.dataset.inicio;
    removeFromArrays(dia, horaInicio);
    
    // Limpiar UI
    clearCell(zone);
    updateSaveButtonState();
    
    // Actualizar contador de horarios
    const totalHorarios = existingHorarios.length + savedHorarios.length;
    mostrarEstadoHorarios(totalHorarios);
    
    mostrarMensaje('success', 'Eliminado correctamente', 
      hasExistingHorario ? 'El horario ha sido eliminado de la base de datos.' : 'Asignación eliminada.');
  }

  function lockCell(zone) { 
    zone.classList.add('locked'); 
  }
  
  function clearCell(zone) {
    zone.classList.remove('locked', 'has-existing');
    delete zone.dataset.asignaturaId;
    delete zone.dataset.userId;
    delete zone.dataset.horarioId;
    zone.innerHTML = '<div class="slot-placeholder">Arrastra aquí</div>';
  }

  function getAsignaturaName(id) {
    return ASIGNATURAS[id] || 'Asignatura';
  }

  function getProfesosName(id) {
    const profesor = PROFESORES.find(p => String(p.id) === String(id));
    return profesor?.name || 'Profesor';
  }

  function getGradoName(id) {
    return window.Laravel.grados[id] || 'Grado';
  }

  // Botón guardar todo mejorado
  document.getElementById('guardarTodo').addEventListener('click', function() {
    if(pendingHorarios.length === 0) {
      mostrarMensaje('info', 'Sin cambios', 'No hay cambios pendientes para guardar.');
      return;
    }

    // Mostrar modal de confirmación
    const modal = new bootstrap.Modal(document.getElementById('modal-confirm-save'));
    const summary = document.getElementById('save-summary');
    
    summary.innerHTML = '';
    pendingHorarios.forEach(h => {
      const li = document.createElement('li');
      li.innerHTML = `<strong>${h.dia} ${h.hora_inicio}-${h.hora_fin}:</strong> ${getAsignaturaName(h.asignatura_id)} con ${getProfesosName(h.user_id)}`;
      summary.appendChild(li);
    });

    modal.show();
  });

  // Confirmar guardado mejorado
  document.getElementById('confirm-save-btn').addEventListener('click', async function() {
    const modal = bootstrap.Modal.getInstance(document.getElementById('modal-confirm-save'));
    modal.hide();
    
    await guardarTodosPendientes();
  });

  async function guardarTodosPendientes() {
    if(pendingHorarios.length === 0) return;

    // Mostrar loading
    const saveBtn = document.getElementById('guardarTodo');
    const originalText = saveBtn.textContent;
    saveBtn.innerHTML = '<span class="spinner"></span> Guardando...';
    saveBtn.disabled = true;

    let errores = 0;
    let exitosos = 0;
    let advertencias = [];

    for(const horario of pendingHorarios) {
      try {
        const resultado = await guardarHorario(horario);
        if(resultado.success) {
          exitosos++;
          // Marcar como guardado
          const card = horario.zone.querySelector('.slot-card');
          if(card) {
            card.classList.remove('pending');
            card.classList.add('saved');
            const badge = card.querySelector('.lock-badge');
            if(badge) badge.innerHTML = '✅ Guardado';
          }
          savedHorarios.push(horario);

          // Agregar advertencias si las hay
          if(resultado.advertencias && resultado.advertencias.length > 0) {
            advertencias.push(...resultado.advertencias);
          }
        } else {
          errores++;
          // Marcar como error
          const card = horario.zone.querySelector('.slot-card');
          if(card) {
            card.classList.remove('pending');
            card.classList.add('error');
            const badge = card.querySelector('.lock-badge');
            if(badge) badge.innerHTML = '❌ Error';
          }
        }
      } catch(error) {
        console.error('Error guardando horario:', error);
        errores++;
      }
    }

    // Limpiar pendientes exitosos
    pendingHorarios = pendingHorarios.filter(h => {
      const card = h.zone.querySelector('.slot-card');
      return card && card.classList.contains('error');
    });

    // Restaurar botón
    saveBtn.disabled = false;
    updateSaveButtonState();
    
    // Actualizar contador
    const totalHorarios = existingHorarios.length + savedHorarios.length;
    mostrarEstadoHorarios(totalHorarios);

    // Mostrar resultado
    if(errores === 0) {
      let mensaje = `Horario guardado exitosamente! ${exitosos} registros guardados.`;
      let tipo = 'success';
      let titulo = 'Guardado exitoso';
      
      if(advertencias.length > 0) {
        mensaje += ` Se detectaron ${advertencias.length} situaciones que requieren tu atención.`;
        tipo = 'warning';
        titulo = 'Guardado con advertencias';
      }
      
      mostrarMensaje(tipo, titulo, mensaje, 
        advertencias.length > 0 ? 'Revisa los horarios marcados con advertencia.' : null);
    } else {
      mostrarMensaje('error', 'Guardado incompleto', 
        `${exitosos} horarios guardados correctamente, pero ${errores} fallaron.`,
        'Revisa los horarios marcados en rojo e intenta guardarlos nuevamente.');
    }
  }

  // Función mejorada de guardado con mejor manejo de respuestas
  async function guardarHorario(horarioData) {
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
      
      if(horarioData.isUpdate && horarioData.horarioId) {
        url = `/admin/horarios/${horarioData.horarioId}`;
        method = 'PUT';
        payload._method = 'PUT';
      } else {
        url = window.Laravel.routes.horarios_store;
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

      if(!response.ok) {
        if(response.status === 409) {
          const errorData = await response.json();
          mostrarMensaje('error', 'Conflicto de horario', 
            errorData.error || 'Horario duplicado',
            errorData.sugerencia || 'Verifica los horarios existentes');
          return { success: false, error: errorData.error };
        }
        throw new Error(`HTTP ${response.status}`);
      }

      const json = await response.json();
      
      // Si el horario se guardó, almacenar el ID para futuras actualizaciones
      if(json.success && json.horario && json.horario.id) {
        horarioData.zone.dataset.horarioId = json.horario.id;
      }

      return {
        success: !!json.success,
        advertencias: json.advertencias || [],
        error: json.error || null
      };

    } catch(error) {
      console.error('Error en fetch:', error);
      mostrarMensaje('error', 'Error de conexión', 
        `No se pudo guardar el horario: ${error.message}`,
        'Verifica tu conexión a internet e intenta nuevamente');
      return { success: false, error: error.message };
    }
  }

  // FUNCIÓN MEJORADA: Cargar horario existente
  async function cargarHorarioExistente(gradoId) {
    try {
      limpiarHorario();
      
      const response = await fetch(`${window.Laravel.routes.horarios_index}?grado_id=${gradoId}&format=json`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      });
      
      mostrarIndicadorCarga(false);
      
      if(response.ok) {
        const horarios = await response.json();
        if(horarios && horarios.length > 0) {
          cargarHorariosEnTabla(horarios);
          mostrarEstadoHorarios(horarios.length);
          
          mostrarMensaje('success', 'Horarios cargados', 
            `Se encontraron ${horarios.length} clases programadas para ${getGradoName(gradoId)}.`,
            'Puedes agregar nuevas clases o modificar las existentes.');
        } else {
          mostrarEstadoHorarios(0);
          mostrarMensaje('info', 'Sin horarios', 
            `No se encontraron horarios para ${getGradoName(gradoId)}.`,
            'Comienza arrastrando asignaturas y profesores a las casillas.');
        }
      } else {
        mostrarMensaje('warning', 'Error al cargar', 
          'No se pudieron cargar los horarios existentes.',
          'Verifica tu conexión e intenta cambiar de grado nuevamente.');
      }
    } catch(error) {
      console.error('Error cargando horarios:', error);
      mostrarIndicadorCarga(false);
      mostrarMensaje('error', 'Error de conexión', 
        'No se pudieron cargar los horarios existentes.',
        'Verifica tu conexión a internet.');
    }
  }

  function cargarHorariosEnTabla(horarios) {
    const invDias = {'Lunes':1,'Martes':2,'Miércoles':3,'Jueves':4,'Viernes':5};
    
    // Limpiar horarios existentes almacenados
    existingHorarios = [];
    savedHorarios = [];
    
    horarios.forEach(h => {
      const diaNum = invDias[h.dia];
      if(!diaNum) return;
      
      const selector = `.dropzone[data-dia="${diaNum}"][data-inicio="${h.hora_inicio}"]`;
      const zone = document.querySelector(selector);
      
      if(zone && !zone.classList.contains('locked')) {
        // Almacenar ID del horario existente para futuras operaciones
        zone.dataset.horarioId = h.id;
        
        // Marcar zona como que tiene horario existente
        zone.classList.add('has-existing');
        
        renderSlot(zone, {
          asignaturaId: h.asignatura_id,
          profesorId: h.user_id,
          asignaturaText: h.asignatura?.nombre || getAsignaturaName(h.asignatura_id),
          profesorText: h.user?.name || getProfesosName(h.user_id),
          isExisting: true
        });
        
        lockCell(zone);
        
        // Agregar a horarios existentes
        existingHorarios.push({...h, zone: zone});
      }
    });

    // Actualizar PDF con horarios existentes
    actualizarHorarioPDF();
  }

  function limpiarHorario() {
    document.querySelectorAll('.dropzone').forEach(clearCell);
    pendingHorarios = [];
    savedHorarios = [];
    existingHorarios = [];
    updateSaveButtonState();
    limpiarHorarioPDF();
  }

  // FUNCIONES PARA PDF MEJORADO
  function actualizarHorarioPDF() {
    // Actualizar nombre del grado en PDF
    const pdfGradoNombre = document.getElementById('pdf-grado-nombre');
    if(pdfGradoNombre && CURRENT_GRADO_ID) {
      pdfGradoNombre.textContent = `Grado: ${getGradoName(CURRENT_GRADO_ID)}`;
    }

    // Limpiar tabla PDF primero
    limpiarHorarioPDF();
    
    const invDias = {'Lunes':1,'Martes':2,'Miércoles':3,'Jueves':4,'Viernes':5};
    const todosLosHorarios = [...existingHorarios, ...savedHorarios];
    const coloresAsignaturas = {};
    let colorIndex = 1;
    
    todosLosHorarios.forEach(horario => {
      const diaNum = invDias[horario.dia];
      if(!diaNum) return;
      
      // Asignar color a la asignatura si no tiene uno
      const asignaturaId = horario.asignatura_id;
      if(!coloresAsignaturas[asignaturaId]) {
        coloresAsignaturas[asignaturaId] = colorIndex;
        colorIndex = (colorIndex % 6) + 1; // Rotar entre 6 colores
      }
      
      const selector = `.pdf-clase-cell[data-pdf-dia="${diaNum}"][data-pdf-inicio="${horario.hora_inicio}"]`;
      const pdfCell = document.querySelector(selector);
      
      if(pdfCell) {
        const asignaturaTexto = horario.asignatura?.nombre || getAsignaturaName(horario.asignatura_id);
        const profesorTexto = horario.user?.name || getProfesosName(horario.user_id);
        
        pdfCell.innerHTML = `
          <div class="pdf-clase-ocupada color-${coloresAsignaturas[asignaturaId]}">
            <span class="pdf-asignatura">${asignaturaTexto}</span>
            <span class="pdf-profesor">👨‍🏫 ${profesorTexto}</span>
          </div>
        `;
      }
    });
  }

  function limpiarHorarioPDF() {
    document.querySelectorAll('.pdf-clase-cell').forEach(cell => {
      cell.innerHTML = `
        <div class="pdf-clase-vacia">
          <span class="pdf-placeholder">Libre</span>
        </div>
      `;
    });
  }

  // Botones adicionales mejorados
  document.getElementById('resetHorario').onclick = async () => {
    const totalHorarios = existingHorarios.length + savedHorarios.length + pendingHorarios.length;
    
    const accion = await mostrarModalConfirmacion(
      'Reiniciar horario',
      `¿Reiniciar todo el horario? Se limpiarán ${totalHorarios} clases programadas.<br><strong>⚠️ Los horarios guardados en la base de datos NO se eliminarán.</strong>`,
      { confirmText: '🔄 Reiniciar vista' }
    );
    
    if(accion === 'continuar') {
      limpiarHorario();
      ocultarIndicadores();
      mostrarMensaje('info', 'Vista reiniciada', 
        'El horario ha sido reiniciado. Selecciona un grado para cargar sus horarios.');
    }
  };

  // FUNCIÓN MEJORADA: Descargar PDF
  document.getElementById('downloadHorario').onclick = async () => {
    if(!CURRENT_GRADO_ID) {
      mostrarMensaje('warning', 'Selecciona un grado', 'Debes seleccionar un grado para descargar su horario.');
      return;
    }

    // Verificar si hay horarios para mostrar
    const totalHorarios = existingHorarios.length + savedHorarios.length;
    if(totalHorarios === 0) {
      mostrarMensaje('warning', 'Sin horarios', 
        'No hay clases programadas para descargar.',
        'Agrega algunas clases antes de generar el PDF.');
      return;
    }

    if(pendingHorarios.length > 0) {
      const accion = await mostrarModalConfirmacion(
        'Cambios pendientes',
        `Tienes ${pendingHorarios.length} cambios sin guardar. ¿Deseas continuar con la descarga?<br><em>Los cambios pendientes NO aparecerán en el PDF.</em>`,
        { 
          confirmText: '📥 Descargar sin cambios pendientes',
          cancelText: 'Cancelar'
        }
      );
      
      if(accion !== 'continuar') return;
    }

    try {
      mostrarMensaje('info', 'Generando PDF', 'Se está preparando tu horario escolar...');
      
      // Actualizar PDF con datos actuales
      actualizarHorarioPDF();
      
      // Ocultar editor y mostrar PDF
      document.getElementById('horario-editor').classList.add('d-none');
      document.getElementById('editor-help').classList.add('d-none');
      document.getElementById('horario-pdf').classList.remove('d-none');
      
      // Generar PDF con configuración mejorada
      const element = document.getElementById('horario-pdf');
      const opt = {
        margin: [0.5, 0.5, 0.5, 0.5],
        filename: `Horario_${getGradoName(CURRENT_GRADO_ID)}_${new Date().toISOString().split('T')[0]}.pdf`,
        image: { type: 'jpeg', quality: 0.95 },
        html2canvas: { 
          scale: 2,
          useCORS: true,
          allowTaint: true,
          backgroundColor: '#ffffff'
        },
        jsPDF: { 
          unit: 'in', 
          format: 'letter', 
          orientation: 'landscape',
          compress: true
        }
      };
      
      await html2pdf().set(opt).from(element).save();
      
      // Restaurar vista de editor
      document.getElementById('horario-pdf').classList.add('d-none');
      document.getElementById('horario-editor').classList.remove('d-none');
      document.getElementById('editor-help').classList.remove('d-none');
      
      mostrarMensaje('success', 'PDF descargado', 
        `Horario de ${getGradoName(CURRENT_GRADO_ID)} descargado exitosamente.`,
        'El archivo incluye todas las clases guardadas con un diseño profesional.');
      
    } catch(error) {
      console.error('Error generando PDF:', error);
      
      // Asegurar que la vista vuelva al editor
      document.getElementById('horario-pdf').classList.add('d-none');
      document.getElementById('horario-editor').classList.remove('d-none');
      document.getElementById('editor-help').classList.remove('d-none');
      
      mostrarMensaje('error', 'Error al generar PDF', 
        'No se pudo generar el archivo PDF.',
        'Intenta nuevamente o contacta al soporte técnico.');
    }
  };

  // Cargar horario inicial si hay grado seleccionado
  if(CURRENT_GRADO_ID) {
    mostrarIndicadorCarga(true);
    setTimeout(() => {
      cargarHorarioExistente(CURRENT_GRADO_ID);
    }, 500); // Pequeño delay para mejor UX
  }

  // Inicializar estado del botón
  updateSaveButtonState();

  // Funciones auxiliares para actualizar PDF en tiempo real
  function actualizarPDFEnTiempoReal() {
    if(CURRENT_GRADO_ID) {
      actualizarHorarioPDF();
    }
  }

  // Listener para cambios en horarios (para actualizar PDF automáticamente)
  const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if(mutation.type === 'childList' && mutation.target.classList.contains('dropzone')) {
        // Pequeño delay para asegurar que el cambio se completó
        setTimeout(actualizarPDFEnTiempoReal, 100);
      }
    });
  });

  // Observar cambios en todas las dropzones
  document.querySelectorAll('.dropzone').forEach(zone => {
    observer.observe(zone, { childList: true, subtree: true });
  });

  // Mensaje de bienvenida mejorado
  if(!localStorage.getItem('horario_welcome_shown_v2')) {
    setTimeout(() => {
      if(existingHorarios.length === 0) {
        mostrarMensaje('info', '¡Bienvenido al editor de horarios!', 
          'Arrastra asignaturas y profesores a las casillas para crear horarios. Los horarios existentes se cargan automáticamente.',
          'Selecciona un grado para comenzar o ver horarios existentes.');
      }
      localStorage.setItem('horario_welcome_shown_v2', 'true');
    }, 1500);
  }

  // Funciones de utilidad adicionales
  window.horarioUtils = {
    exportarDatos: function() {
      const datos = {
        grado: CURRENT_GRADO_ID ? getGradoName(CURRENT_GRADO_ID) : null,
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
    }
  };
});