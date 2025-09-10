// FUNCIÓN CORREGIDA - Solo que no muesytra los datos en el PDF
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

    // Paso 1: Recargar datos del servidor
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

    // Paso 2: Preparar PDF
    this.actualizarHorarioPDF();
    pdfElement = document.getElementById('horario-pdf');
    
    if (!pdfElement) {
      throw new Error('Elemento PDF no encontrado');
    }

    // Paso 3: SOLUCIÓN MEJORADA - Clonar el elemento PDF y trabajar con la copia
    const pdfClone = pdfElement.cloneNode(true);
    pdfClone.id = 'horario-pdf-clone';
    
    // Crear contenedor temporal fuera de la vista
    const tempContainer = document.createElement('div');
    tempContainer.style.cssText = `
      position: fixed;
      top: -9999px;
      left: -9999px;
      width: 1200px;
      height: 800px;
      background: white;
      z-index: -1;
      visibility: hidden;
      opacity: 0;
    `;
    
    // Aplicar estilos limpios al clon
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
      opacity: 1 !important;
    `;

    // Limpiar estilos problemáticos en el clon
    const cloneElements = pdfClone.querySelectorAll('*');
    cloneElements.forEach(el => {
      el.style.animation = 'none';
      el.style.transition = 'none';
      el.style.transform = 'none';
      el.style.boxShadow = 'none';
      el.style.borderRadius = '0';
    });

    // Agregar el contenedor temporal al body (no afecta la vista)
    tempContainer.appendChild(pdfClone);
    document.body.appendChild(tempContainer);

    // Paso 4: Esperar renderizado del clon
    await new Promise(resolve => setTimeout(resolve, 1000));

    // Paso 5: Configuración optimizada para html2pdf
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
    
    // Paso 6: Generar PDF desde el clon (NO afecta la vista principal)
    console.log('Iniciando conversión a PDF...');
    await html2pdf().set(opt).from(pdfClone).save();
    
    console.log('PDF generado exitosamente');
    
    // Paso 7: Limpiar el contenedor temporal
    document.body.removeChild(tempContainer);
    
    // Ocultar overlay
    this.hidePDFLoadingOverlay();
    
    notificationManager.show('success', 'PDF descargado', 
      `Horario de ${this.getGradeName(CURRENT_GRADO_ID)} descargado exitosamente.`,
      'El archivo incluye todas las clases guardadas con un diseño profesional.');

  } catch (error) {
    console.error('Error generando PDF:', error);
    
    // Limpiar en caso de error
    const tempContainer = document.getElementById('horario-pdf-clone')?.parentElement;
    if (tempContainer && tempContainer.parentElement) {
      tempContainer.parentElement.removeChild(tempContainer);
    }
    
    this.hidePDFLoadingOverlay();
    notificationManager.show('error', 'Error al generar PDF', 
      'No se pudo generar el archivo PDF. ' + error.message,
      'Intenta nuevamente o contacta al soporte técnico.');
  }
}




//CODIGO ORIGINAL CON EL ERROR QUE NO ME GUSTA PERO MUESTRA LOS DATOS

// FUNCIÓN CORREGIDA - Mantiene modal pero genera PDF correctamente
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

      // Referencias a elementos principales
      const scheduleContainer = document.querySelector('.schedule-container');
      const actionBar = document.querySelector('.action-bar');
      const sidebar = document.querySelector('.sidebar');
      const controlBar = document.querySelector('.control-bar');
      const appHeader = document.querySelector('.app-header');
      let pdfElement = null;

      try {
        console.log('Iniciando generación de PDF');
        
        // Mostrar overlay de carga (esto funcionaba bien)
        this.showPDFLoadingOverlay();

        // Paso 1: Recargar datos del servidor
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

        // Paso 2: Preparar PDF
        this.actualizarHorarioPDF();
        pdfElement = document.getElementById('horario-pdf');
        
        if (!pdfElement) {
          throw new Error('Elemento PDF no encontrado');
        }

        // Paso 3: SOLUCIÓN CORREGIDA - Ocultar elementos pero mantener PDF visible
        // Guardar estados originales
        const originalStates = new Map();
        
        [scheduleContainer, actionBar, sidebar, controlBar, appHeader].forEach(element => {
          if (element) {
            originalStates.set(element, {
              display: element.style.display,
              visibility: element.style.visibility
            });
            element.style.display = 'none';
          }
        });

        // Mostrar solo el PDF con estilos simples
        pdfElement.style.cssText = `
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

        // Limpiar estilos problemáticos en el PDF
        const pdfElements = pdfElement.querySelectorAll('*');
        pdfElements.forEach(el => {
          el.style.animation = 'none';
          el.style.transition = 'none';
          el.style.transform = 'none';
          el.style.boxShadow = 'none';
          el.style.borderRadius = '0';
        });

        // Paso 4: Esperar renderizado
        await new Promise(resolve => setTimeout(resolve, 10000));

        // Paso 5: Configuración optimizada para html2pdf
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
        
        // Paso 6: Generar PDF
        console.log('Iniciando conversión a PDF...');
        await html2pdf().set(opt).from(pdfElement).save();
        
        console.log('PDF generado exitosamente');
        
        // Paso 7: CRÍTICO - Restaurar estados originales INMEDIATAMENTE
        originalStates.forEach((state, element) => {
          if (element) {
            element.style.display = state.display;
            element.style.visibility = state.visibility;
          }
        });

        // Ocultar PDF
        pdfElement.style.cssText = 'display: none !important;';
        
        // Ocultar overlay
        this.hidePDFLoadingOverlay();
        
        notificationManager.show('success', 'PDF descargado', 
          `Horario de ${this.getGradeName(CURRENT_GRADO_ID)} descargado exitosamente.`,
          'El archivo incluye todas las clases guardadas con un diseño profesional.');

      } catch (error) {
        console.error('Error generando PDF:', error);
        
        // Restaurar en caso de error
        if (scheduleContainer) scheduleContainer.style.display = '';
        if (actionBar) actionBar.style.display = '';
        if (sidebar) sidebar.style.display = '';
        if (controlBar) controlBar.style.display = '';
        if (appHeader) appHeader.style.display = '';
        if (pdfElement) pdfElement.style.cssText = 'display: none !important;';
        
        this.hidePDFLoadingOverlay();
        notificationManager.show('error', 'Error al generar PDF', 
          'No se pudo generar el archivo PDF. ' + error.message,
          'Intenta nuevamente o contacta al soporte técnico.');
      }
    }