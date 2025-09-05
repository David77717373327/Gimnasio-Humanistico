/**
 * ========================================
 * ENTERPRISE SCHEDULE SYSTEM - JavaScript
 * Sistema de Horarios Académicos Empresarial
 * Conectado con Base de Datos Laravel
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
    const diasMap = {1:'Lunes',2:'Martes',3:'Miércoles',4:'Jueves',5:'Viernes'};
    const invDiasMap = {'Lunes':1,'Martes':2,'Miércoles':3,'Jueves':4,'Viernes':5};

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

            this.container.insertAdjacentElement('afterbegin', notification);
            this.notifications.set(id, notification);

            // Auto-remover notificaciones no críticas
            if (type !== 'error' && duration > 0) {
                setTimeout(() => this.close(id), duration);
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
                // Crear modal dinámico
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

                // Remover modal anterior si existe
                const existingModal = document.getElementById('dynamicModal');
                if (existingModal) existingModal.remove();

                // Crear nuevo modal
                document.body.insertAdjacentHTML('beforeend', modalHtml);
                const modalElement = document.getElementById('dynamicModal');
                this.activeModal = new bootstrap.Modal(modalElement);

                // Manejar resolución
                this.modalResolve = resolve;

                // Event listeners para botones de acción
                modalElement.addEventListener('click', (e) => {
                    if (e.target.hasAttribute('data-action')) {
                        const action = e.target.getAttribute('data-action');
                        this.resolve(action);
                    }
                });

                // Auto-limpiar al cerrar
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
            
            // Poblar select con profesores reales
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
            this.init();
        }

        init() {
            this.setupEventListeners();
            this.setupDragAndDrop();
            this.updateCounters();
            
            // Cargar horario inicial si hay grado seleccionado
            if (CURRENT_GRADO_ID) {
                this.showLoadingStatus();
                setTimeout(() => {
                    this.loadExistingSchedules(CURRENT_GRADO_ID);
                }, 500);
            }
        }

        setupEventListeners() {
            // Selector de grado
            gradoSelect.addEventListener('change', (e) => {
                this.handleGradeChange(e.target.value);
            });

            // Botones de acción
            saveBtn.addEventListener('click', () => {
                this.showSaveConfirmation();
            });

            resetBtn.addEventListener('click', () => {
                this.showResetConfirmation();
            });

            downloadBtn.addEventListener('click', () => {
                this.downloadPDF();
            });

            // Atajos de teclado
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
            // Setup draggable items
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

            // Setup drop zones
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
            
            // Cargar horarios existentes desde la base de datos
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

        async handleDrop(e, cell) {
            if (!CURRENT_GRADO_ID) {
                notificationManager.show('warning', 'Selecciona un grado', 
                    'Primero debes seleccionar un grado antes de asignar horarios.');
                return;
            }

            const data = JSON.parse(e.dataTransfer.getData('text/plain') || '{}');
            if (!data || !data.id) return;

            // Verificar si la celda está ocupada
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

            // Verificar duplicados en pendientes
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

            // Obtener IDs actuales
            let asignaturaId = cell.dataset.asignaturaId;
            let profesorId = cell.dataset.userId;

            if (data.type === 'asignatura') {
                asignaturaId = data.id;
            } else if (data.type === 'profesor') {
                profesorId = data.id;
            }

            // Si falta profesor, solicitarlo
            if (!profesorId) {
                profesorId = await modalManager.showTeacherSelection();
                if (!profesorId) {
                    notificationManager.show('warning', 'Profesor requerido', 
                        'Debes seleccionar un profesor para completar este horario.');
                    return;
                }
            }

            // Crear objeto horario
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
            // Almacenar metadatos
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
                    
                    existingHorarios.push({...h, hora_inicio: horaInicioNormalizada, cell: cell});
                }
            });
            
            this.updatePDFSchedule();
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

            const originalText = saveBtnText.textContent;
            saveBtn.disabled = true;
            saveBtnText.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...';

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

            // Limpiar exitosos de pendientes
            pendingHorarios = pendingHorarios.filter(s => {
                const slot = s.cell.querySelector('.class-slot');
                return slot && slot.classList.contains('error');
            });

            saveBtn.disabled = false;
            saveBtnText.textContent = originalText;
            this.updateCounters();

            // Mostrar resultados
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
            const cell = btnElement.closest('.schedule-cell');
            const slot = cell.querySelector('.class-slot');
            const isExisting = slot.classList.contains('existing');
            
            const subjectName = this.getAsignaturaName(cell.dataset.asignaturaId);
            const teacherName = this.getProfessorName(cell.dataset.userId);
            
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

            notificationManager.show('success', 'Eliminado correctamente', 
                isExisting ? 'El horario ha sido eliminado de la base de datos.' : 'Asignación eliminada.');
        }

        editSchedule(btnElement) {
            const cell = btnElement.closest('.schedule-cell');
            const subjectName = this.getAsignaturaName(cell.dataset.asignaturaId);
            const teacherName = this.getProfessorName(cell.dataset.userId);
            
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

        async downloadPDF() {
            if (!CURRENT_GRADO_ID) {
                notificationManager.show('warning', 'Selecciona un grado', 'Debes seleccionar un grado para descargar su horario.');
                return;
            }

            const totalSchedules = existingHorarios.length + savedHorarios.length;
            if (totalSchedules === 0) {
                notificationManager.show('warning', 'Sin horarios', 
                    'No hay clases programadas para descargar.',
                    'Agrega algunas clases antes de generar el PDF.');
                return;
            }

            if (pendingHorarios.length > 0) {
                const action = await modalManager.show(
                    'Cambios pendientes',
                    `Tienes ${pendingHorarios.length} cambios sin guardar. El PDF solo incluirá datos guardados.<br><em>¿Guardar ahora o continuar sin ellos?</em>`,
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

            try {
                notificationManager.show('info', 'Generando PDF', 'Se está preparando tu horario escolar...');

                // Recargar horarios desde servidor para PDF
                const response = await fetch(`${ROUTES.horarios_index}?grado_id=${CURRENT_GRADO_ID}&format=json`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });

                if (response.ok) {
                    const horarios = await response.json();
                    this.clearSchedule();
                    this.loadSchedulesIntoTable(horarios);
                }

                // Actualizar PDF
                this.updatePDFSchedule();

                // Mostrar vista PDF temporalmente
                const editorView = document.getElementById('horario-editor') || document.querySelector('.schedule-table-wrapper');
                const pdfView = document.getElementById('horario-pdf');
                
                if (editorView) editorView.style.display = 'none';
                if (pdfView) pdfView.style.display = 'block';

                const element = pdfView || document.querySelector('.schedule-container');
                const opt = {
                    margin: [0.5, 0.5, 0.5, 0.5],
                    filename: `Horario_${this.getGradeName(CURRENT_GRADO_ID)}_${new Date().toISOString().split('T')[0]}.pdf`,
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

                // Restaurar vista
                if (pdfView) pdfView.style.display = 'none';
                if (editorView) editorView.style.display = 'block';

                notificationManager.show('success', 'PDF descargado', 
                    `Horario de ${this.getGradeName(CURRENT_GRADO_ID)} descargado exitosamente.`,
                    'El archivo incluye todas las clases guardadas con un diseño profesional.');
                
            } catch (error) {
                console.error('Error generando PDF:', error);
                notificationManager.show('error', 'Error al generar PDF', 
                    'No se pudo generar el archivo PDF.',
                    'Intenta nuevamente o contacta al soporte técnico.');
            }
        }

        updateCounters() {
            const pendingCount = pendingHorarios.length;
            const savedCount = savedHorarios.length + existingHorarios.length;

            document.getElementById('pendingCount').textContent = pendingCount;
            document.getElementById('savedCount').textContent = savedCount;
            scheduleCounter.innerHTML = `<span class="badge bg-light text-dark">${savedCount + pendingCount} clases programadas</span>`;

            if (pendingCount > 0) {
                saveBtn.disabled = false;
                saveBtn.classList.remove('secondary');
                saveBtn.classList.add('primary');
                saveBtnText.textContent = `Guardar ${pendingCount} cambio${pendingCount > 1 ? 's' : ''}`;
            } else {
                saveBtn.disabled = true;
                saveBtn.classList.remove('primary');
                saveBtn.classList.add('secondary');
                saveBtnText.textContent = 'Guardar Cambios';
            }
        }

        showLoadingStatus() {
            loadingStatus.classList.remove('d-none');
            scheduleStatus.classList.add('d-none');
        }

        hideLoadingStatus() {
            loadingStatus.classList.add('d-none');
        }

        showScheduleStatus() {
            const totalSchedules = existingHorarios.length + savedHorarios.length;
            const gradeName = this.getGradeName(CURRENT_GRADO_ID);

            scheduleStatus.innerHTML = `
                <i class="fas fa-info-circle"></i>
                <span>${gradeName}: ${totalSchedules} clases programadas</span>
                <div class="info-extra small mt-2"></div>
            `;

            const infoExtra = scheduleStatus.querySelector('.info-extra');
            
            if (totalSchedules > 0) {
                scheduleStatus.classList.remove('status-info');
                scheduleStatus.classList.add('status-success');
                infoExtra.innerHTML = `
                    <i class="fas fa-info-circle me-1"></i>
                    Los horarios existentes se muestran con borde verde. 
                    Puedes agregar nuevos horarios o modificar los existentes.
                `;
            } else {
                scheduleStatus.classList.remove('status-success');
                scheduleStatus.classList.add('status-info');
                infoExtra.innerHTML = `
                    <i class="fas fa-plus-circle me-1"></i>
                    No hay horarios asignados. Comienza arrastrando asignaturas y profesores a las casillas.
                `;
            }

            scheduleStatus.classList.remove('d-none');
        }

        hideStatus() {
            scheduleStatus.classList.add('d-none');
            loadingStatus.classList.add('d-none');
        }

        clearSchedule() {
            document.querySelectorAll('.dropzone').forEach(cell => {
                this.clearCell(cell);
            });
            pendingHorarios = [];
            savedHorarios = [];
            existingHorarios = [];
            this.updateCounters();
        }

        resetSchedule() {
            this.clearSchedule();
            CURRENT_GRADO_ID = null;
            gradoSelect.value = '';
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

        updatePDFSchedule() {
            if (!document.getElementById('horario-pdf')) return;

            const pdfGradoNombre = document.getElementById('pdf-grado-nombre');
            if (pdfGradoNombre && CURRENT_GRADO_ID) {
                const gradoName = this.getGradeName(CURRENT_GRADO_ID);
                pdfGradoNombre.textContent = `Grado: ${gradoName}`;
            }

            // Limpiar tabla PDF
            document.querySelectorAll('.pdf-clase-cell').forEach(cell => {
                cell.innerHTML = `
                    <div class="pdf-clase-vacia">
                        <span class="pdf-placeholder">Libre</span>
                    </div>
                `;
            });

            // Llenar con datos actuales
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
        if (!e.target.closest('.schedule-cell, .resource-chip')) {
            e.preventDefault();
        }
    });

    document.addEventListener('drop', (e) => {
        if (!e.target.closest('.schedule-cell')) {
            e.preventDefault();
        }
    });

    // Observer para actualizaciones automáticas del PDF
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList' && mutation.target.classList.contains('dropzone')) {
                setTimeout(() => {
                    if (CURRENT_GRADO_ID) {
                        scheduleManager.updatePDFSchedule();
                    }
                }, 100);
            }
        });
    });

    // Observar cambios en todas las dropzones
    document.querySelectorAll('.dropzone').forEach(zone => {
        observer.observe(zone, { childList: true, subtree: true });
    });

    // Funciones utilitarias globales para debugging
    window.horarioUtils = {
        exportarDatos: function() {
            const datos = {
                grado: CURRENT_GRADO_ID ? scheduleManager.getGradeName(CURRENT_GRADO_ID) : null,
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

        limpiarNotificaciones: function() {
            notificationManager.closeAll();
        },

        simularError: function() {
            notificationManager.show('error', 'Error de prueba', 'Esta es una notificación de error para probar el sistema.');
        }
    };

    console.log('🚀 Sistema de Horarios Empresarial inicializado correctamente');
    console.log('📊 Usa window.horarioUtils para funciones de debugging');
});



@extends('layouts.master')

@section('content')

<style>
/* ========================================
   ESTILOS ENCAPSULADOS PARA HORARIOS
   Solo afectan elementos dentro de .enterprise-schedule-system
   ======================================== */

/* Variables CSS */
:root {
    --primary-color: #2c3e50;
    --secondary-color: #34495e;
    --accent-color: #3498db;
    --success-color: #27ae60;
    --warning-color: #f39c12;
    --error-color: #e74c3c;
    --info-color: #17a2b8;
    --light-bg: #ecf0f1;
    --dark-text: #2c3e50;
    --light-text: #7f8c8d;
    --border-color: #bdc3c7;
    --shadow: 0 2px 10px rgba(0,0,0,0.1);
    --shadow-hover: 0 4px 20px rgba(0,0,0,0.15);
    --border-radius: 8px;
    --border-radius-lg: 12px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* IMPORTANTE: Encapsular todo dentro de .enterprise-schedule-system */
.enterprise-schedule-system {
    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: var(--light-bg);
    min-height: 100vh;
    position: relative;
    box-sizing: border-box;
}

.enterprise-schedule-system *,
.enterprise-schedule-system *::before,
.enterprise-schedule-system *::after {
    box-sizing: border-box;
}

/* Header empresarial */
.enterprise-schedule-system .app-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 1.5rem 0;
    box-shadow: var(--shadow);
    position: relative;
    overflow: hidden;
    margin: -1rem -1rem 0 -1rem; /* Compensar el padding del container padre */
}

.enterprise-schedule-system .app-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.05"><polygon points="30 0 60 30 30 60 0 30"/></g></g></svg>') repeat;
    opacity: 0.1;
    z-index: 1;
}

.enterprise-schedule-system .app-header .container-fluid,
.enterprise-schedule-system .app-header .row,
.enterprise-schedule-system .app-header .col,
.enterprise-schedule-system .app-header .col-auto {
    position: relative;
    z-index: 2;
}

.enterprise-schedule-system .app-title {
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.enterprise-schedule-system .app-title i {
    font-size: 1.8rem;
    color: var(--accent-color);
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
}

.enterprise-schedule-system .app-subtitle {
    font-size: 0.95rem;
    opacity: 0.8;
    margin-top: 0.25rem;
    font-weight: 400;
}

/* Botones empresariales */
.enterprise-schedule-system .btn-enterprise {
    border: none;
    border-radius: var(--border-radius);
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    font-size: 0.9rem;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.enterprise-schedule-system .btn-enterprise::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: var(--transition);
    z-index: 1;
}

.enterprise-schedule-system .btn-enterprise:hover::before {
    left: 100%;
}

.enterprise-schedule-system .btn-enterprise:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover);
}

.enterprise-schedule-system .btn-enterprise.primary {
    background: linear-gradient(135deg, var(--accent-color), #2980b9);
    color: white;
}

.enterprise-schedule-system .btn-enterprise.secondary {
    background: linear-gradient(135deg, #95a5a6, #7f8c8d);
    color: white;
}

.enterprise-schedule-system .btn-enterprise.success {
    background: linear-gradient(135deg, var(--success-color), #229954);
    color: white;
}

.enterprise-schedule-system .btn-enterprise.warning {
    background: linear-gradient(135deg, var(--warning-color), #e67e22);
    color: white;
}

.enterprise-schedule-system .btn-enterprise.danger {
    background: linear-gradient(135deg, var(--error-color), #c0392b);
    color: white;
}

.enterprise-schedule-system .btn-enterprise.info {
    background: linear-gradient(135deg, var(--info-color), #138496);
    color: white;
}

.enterprise-schedule-system .btn-enterprise:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
    box-shadow: none !important;
}

/* Barra de control */
.enterprise-schedule-system .control-bar {
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow);
    border: 1px solid rgba(0,0,0,0.08);
}

.enterprise-schedule-system .grade-selector {
    background: white;
    border: 2px solid var(--border-color);
    border-radius: var(--border-radius);
    padding: 0.75rem 1rem;
    font-size: 1rem;
    font-weight: 500;
    transition: var(--transition);
}

.enterprise-schedule-system .grade-selector:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    outline: none;
}

/* Indicadores de estado */
.enterprise-schedule-system .status-indicator {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.5rem;
    border-radius: var(--border-radius);
    font-weight: 500;
    border: 1px solid transparent;
    transition: var(--transition);
}

.enterprise-schedule-system .status-loading {
    background: linear-gradient(135deg, #e8f4f8, #d4edda);
    border-color: rgba(23, 162, 184, 0.3);
    color: var(--info-color);
}

.enterprise-schedule-system .status-success {
    background: linear-gradient(135deg, #d4edda, #c3e6cb);
    border-color: rgba(39, 174, 96, 0.3);
    color: var(--success-color);
}

.enterprise-schedule-system .status-info {
    background: linear-gradient(135deg, #d1ecf1, #bee5eb);
    border-color: rgba(23, 162, 184, 0.3);
    color: var(--info-color);
}

.enterprise-schedule-system .loading-spinner {
    width: 20px;
    height: 20px;
    border: 2px solid var(--info-color);
    border-top: 2px solid transparent;
    border-radius: 50%;
    animation: schedule-spin 1s linear infinite;
}

@keyframes schedule-spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.enterprise-schedule-system .info-extra {
    margin-top: 0.5rem;
    opacity: 0.8;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Layout principal */
.enterprise-schedule-system .main-layout {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 2rem;
    align-items: start;
}

@media (max-width: 1200px) {
    .enterprise-schedule-system .main-layout {
        grid-template-columns: 280px 1fr;
        gap: 1.5rem;
    }
}

@media (max-width: 992px) {
    .enterprise-schedule-system .main-layout {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
}

/* Sidebar */
.enterprise-schedule-system .sidebar {
    position: sticky;
    top: 2rem;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.enterprise-schedule-system .enterprise-card {
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid rgba(0,0,0,0.08);
    overflow: hidden;
    transition: var(--transition);
}

.enterprise-schedule-system .enterprise-card:hover {
    box-shadow: var(--shadow-hover);
    transform: translateY(-2px);
}

.enterprise-schedule-system .sidebar-section .card-body {
    padding: 1.5rem;
}

.enterprise-schedule-system .sidebar-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--dark-text);
    margin: 0 0 1.25rem 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid var(--light-bg);
}

.enterprise-schedule-system .sidebar-title i {
    font-size: 1.2rem;
    color: var(--accent-color);
}

/* Chips de recursos */
.enterprise-schedule-system .resource-chip {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.875rem 1rem;
    background: var(--light-bg);
    border: 2px solid transparent;
    border-radius: var(--border-radius);
    margin-bottom: 0.75rem;
    cursor: grab;
    transition: var(--transition);
    font-weight: 500;
    color: var(--dark-text);
    position: relative;
    overflow: hidden;
}

.enterprise-schedule-system .resource-chip::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.6), transparent);
    transition: var(--transition);
    z-index: 1;
}

.enterprise-schedule-system .resource-chip:hover::before {
    left: 100%;
}

.enterprise-schedule-system .resource-chip:hover {
    background: white;
    border-color: var(--accent-color);
    transform: translateX(5px);
    box-shadow: var(--shadow);
}

.enterprise-schedule-system .resource-chip:active {
    cursor: grabbing;
    transform: scale(0.98);
}

.enterprise-schedule-system .resource-chip.subject {
    border-left: 4px solid var(--success-color);
}

.enterprise-schedule-system .resource-chip.teacher {
    border-left: 4px solid var(--warning-color);
}

.enterprise-schedule-system .chip-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background: rgba(52, 152, 219, 0.1);
    border-radius: 50%;
    color: var(--accent-color);
    position: relative;
    z-index: 2;
}

.enterprise-schedule-system .resource-chip.subject .chip-icon {
    background: rgba(39, 174, 96, 0.1);
    color: var(--success-color);
}

.enterprise-schedule-system .resource-chip.teacher .chip-icon {
    background: rgba(243, 156, 18, 0.1);
    color: var(--warning-color);
}

/* Área de horarios */
.enterprise-schedule-system .schedule-area {
    position: relative;
}

.enterprise-schedule-system .schedule-container {
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid rgba(0,0,0,0.08);
    overflow: hidden;
}

.enterprise-schedule-system .schedule-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.enterprise-schedule-system .schedule-header h2 {
    color: var(--dark-text);
    font-weight: 700;
    font-size: 1.5rem;
    margin: 0;
}

.enterprise-schedule-system .schedule-header small {
    color: var(--light-text);
    font-size: 0.9rem;
    display: block;
    margin-top: 0.25rem;
}

.enterprise-schedule-system .schedule-table-wrapper {
    padding: 0;
    overflow-x: auto;
    background: white;
}

.enterprise-schedule-system .schedule-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin: 0;
    background: white;
}

.enterprise-schedule-system .schedule-table th {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 1rem;
    text-align: center;
    font-weight: 600;
    font-size: 0.95rem;
    border: none;
    position: sticky;
    top: 0;
    z-index: 10;
}

.enterprise-schedule-system .time-cell {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-right: 1px solid var(--border-color);
    padding: 1rem;
    text-align: center;
    font-weight: 600;
    color: var(--dark-text);
    min-width: 120px;
    position: sticky;
    left: 0;
    z-index: 5;
}

.enterprise-schedule-system .schedule-cell {
    padding: 0.5rem;
    border: 1px solid var(--border-color);
    border-top: none;
    border-left: none;
    vertical-align: middle;
    text-align: center;
    min-height: 80px;
    height: 80px;
    position: relative;
    background: white;
    transition: var(--transition);
}

.enterprise-schedule-system .schedule-cell:hover {
    background: rgba(52, 152, 219, 0.02);
}

.enterprise-schedule-system .schedule-cell.dragover {
    background: rgba(52, 152, 219, 0.1);
    border-color: var(--accent-color);
    box-shadow: inset 0 0 0 2px var(--accent-color);
}

.enterprise-schedule-system .schedule-cell.occupied {
    background: rgba(39, 174, 96, 0.02);
}

.enterprise-schedule-system .schedule-cell.editing {
    background: rgba(243, 156, 18, 0.1);
    border-color: var(--warning-color);
    animation: schedule-pulse 2s infinite;
}

@keyframes schedule-pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

/* Placeholders de slots */
.enterprise-schedule-system .slot-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: var(--light-text);
    font-size: 0.8rem;
    opacity: 0.7;
    transition: var(--transition);
}

.enterprise-schedule-system .schedule-cell:hover .slot-placeholder {
    opacity: 1;
    color: var(--accent-color);
}

.enterprise-schedule-system .placeholder-day {
    font-weight: 600;
    font-size: 0.75rem;
    margin-bottom: 2px;
}

.enterprise-schedule-system .placeholder-time {
    font-weight: 500;
    font-size: 0.7rem;
    margin-bottom: 4px;
}

.enterprise-schedule-system .placeholder-action {
    font-size: 0.65rem;
    font-style: italic;
}

/* Slots de clases ocupadas */
.enterprise-schedule-system .class-slot {
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 0.5rem;
    border-radius: 6px;
    background: white;
    border: 2px solid transparent;
    transition: var(--transition);
    min-height: 70px;
}

.enterprise-schedule-system .class-slot.existing {
    background: linear-gradient(135deg, #d4edda, #c3e6cb);
    border-color: var(--success-color);
    border-left: 4px solid var(--success-color);
}

.enterprise-schedule-system .class-slot.pending {
    background: linear-gradient(135deg, #fff3cd, #ffeaa7);
    border-color: var(--warning-color);
    border-left: 4px solid var(--warning-color);
}

.enterprise-schedule-system .class-slot.error {
    background: linear-gradient(135deg, #f8d7da, #f5c6cb);
    border-color: var(--error-color);
    border-left: 4px solid var(--error-color);
}

.enterprise-schedule-system .slot-status {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    z-index: 3;
}

.enterprise-schedule-system .slot-status.existing {
    background: var(--success-color);
    box-shadow: 0 0 0 2px rgba(39, 174, 96, 0.3);
}

.enterprise-schedule-system .slot-status.pending {
    background: var(--warning-color);
    box-shadow: 0 0 0 2px rgba(243, 156, 18, 0.3);
    animation: schedule-blink 2s infinite;
}

.enterprise-schedule-system .slot-status.error {
    background: var(--error-color);
    box-shadow: 0 0 0 2px rgba(231, 76, 60, 0.3);
}

@keyframes schedule-blink {
    0%, 50% { opacity: 1; }
    51%, 100% { opacity: 0.5; }
}

.enterprise-schedule-system .slot-content {
    text-align: center;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 2px;
}

.enterprise-schedule-system .slot-subject {
    font-weight: 600;
    font-size: 0.8rem;
    color: var(--dark-text);
    line-height: 1.2;
}

.enterprise-schedule-system .slot-teacher {
    font-size: 0.7rem;
    color: var(--light-text);
    font-weight: 500;
    line-height: 1.1;
}

.enterprise-schedule-system .slot-actions {
    position: absolute;
    top: 2px;
    left: 2px;
    display: flex;
    gap: 2px;
    opacity: 0;
    transition: var(--transition);
}

.enterprise-schedule-system .class-slot:hover .slot-actions {
    opacity: 1;
}

.enterprise-schedule-system .slot-btn {
    width: 20px;
    height: 20px;
    border: none;
    border-radius: 50%;
    background: rgba(0,0,0,0.6);
    color: white;
    font-size: 0.6rem;
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    justify-content: center;
}

.enterprise-schedule-system .slot-btn:hover {
    background: var(--error-color);
    transform: scale(1.1);
}

/* Filas de descanso */
.enterprise-schedule-system .break-row td {
    background: linear-gradient(135deg, #fff8e1, #ffecb3);
    border-color: rgba(243, 156, 18, 0.3);
}

.enterprise-schedule-system .break-indicator {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    padding: 1rem;
    color: var(--warning-color);
    font-weight: 600;
    font-size: 0.95rem;
}

.enterprise-schedule-system .break-indicator i {
    font-size: 1.1rem;
}

/* Barra de acciones flotante */
.enterprise-schedule-system .action-bar {
    position: fixed;
    bottom: 2rem;
    left: 2rem;
    right: 2rem;
    background: white;
    border-radius: var(--border-radius-lg);
    padding: 1rem 1.5rem;
    box-shadow: 0 4px 25px rgba(0,0,0,0.15);
    border: 1px solid rgba(0,0,0,0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    z-index: 1000;
    backdrop-filter: blur(10px);
}

.enterprise-schedule-system .action-bar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: white;
    opacity: 0.95;
    border-radius: var(--border-radius-lg);
    z-index: -1;
}

/* Notificaciones */
.notification-container {
    position: fixed;
    top: 2rem;
    right: 2rem;
    z-index: 1050;
    max-width: 400px;
}

.notification {
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-hover);
    margin-bottom: 1rem;
    overflow: hidden;
    animation: slideInRight 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border-left: 4px solid var(--accent-color);
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOutRight {
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

.notification.success {
    border-left-color: var(--success-color);
}

.notification.warning {
    border-left-color: var(--warning-color);
}

.notification.error {
    border-left-color: var(--error-color);
}

.notification.info {
    border-left-color: var(--info-color);
}

.notification-header {
    padding: 1rem 1.5rem;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.notification-icon {
    flex-shrink: 0;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.notification.success .notification-icon {
    color: var(--success-color);
}

.notification.warning .notification-icon {
    color: var(--warning-color);
}

.notification.error .notification-icon {
    color: var(--error-color);
}

.notification.info .notification-icon {
    color: var(--info-color);
}

.notification-content {
    flex-grow: 1;
}

.notification-title {
    font-weight: 600;
    font-size: 0.95rem;
    color: var(--dark-text);
    margin-bottom: 0.25rem;
}

.notification-message {
    font-size: 0.85rem;
    color: var(--light-text);
    line-height: 1.4;
}

.notification-suggestion {
    font-size: 0.8rem;
    color: var(--light-text);
    font-style: italic;
    margin-top: 0.5rem;
    padding-top: 0.5rem;
    border-top: 1px solid rgba(0,0,0,0.1);
}

.notification-close {
    flex-shrink: 0;
    width: 24px;
    height: 24px;
    border: none;
    background: none;
    color: var(--light-text);
    cursor: pointer;
    border-radius: 50%;
    transition: var(--transition);
    display: flex;
    align-items: center;
    justify-content: center;
}

.notification-close:hover {
    background: rgba(0,0,0,0.1);
    color: var(--dark-text);
}

.notification-progress {
    height: 3px;
    background: rgba(0,0,0,0.1);
    position: relative;
    overflow: hidden;
}

.notification-progress-bar {
    height: 100%;
    background: var(--accent-color);
    width: 100%;
    animation: progressBar 5s linear forwards;
}

.notification.success .notification-progress-bar {
    background: var(--success-color);
}

.notification.warning .notification-progress-bar {
    background: var(--warning-color);
}

.notification.error .notification-progress-bar {
    background: var(--error-color);
}

@keyframes progressBar {
    from { width: 100%; }
    to { width: 0%; }
}

/* Modales empresariales */
.enterprise-modal .modal-content {
    border: none;
    border-radius: var(--border-radius-lg);
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    overflow: hidden;
}

.enterprise-modal .modal-header {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 1.5rem;
    border-bottom: none;
}

.enterprise-modal .modal-title {
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.enterprise-modal .btn-close {
    filter: invert(1);
    opacity: 0.8;
}

.enterprise-modal .btn-close:hover {
    opacity: 1;
}

.enterprise-modal .modal-body {
    padding: 1.5rem;
    color: var(--dark-text);
}

.enterprise-modal .modal-footer {
    padding: 1rem 1.5rem;
    background: var(--light-bg);
    border-top: 1px solid var(--border-color);
}

/* Efectos de arrastre */
.enterprise-schedule-system.dragging {
    user-select: none;
}

.enterprise-schedule-system.dragging .schedule-cell {
    transition: all 0.1s ease;
}

.enterprise-schedule-system.dragging .schedule-cell:not(.dragover) {
    opacity: 0.7;
}

.enterprise-schedule-system.dragging .resource-chip {
    opacity: 0.5;
}

/* Badges y chips adicionales */
.enterprise-schedule-system .badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: 500;
    font-size: 0.8rem;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

/* Utilidades dentro del contenedor */
.enterprise-schedule-system .d-none {
    display: none !important;
}

.enterprise-schedule-system .d-flex {
    display: flex !important;
}

.enterprise-schedule-system .align-items-center {
    align-items: center !important;
}

.enterprise-schedule-system .justify-content-between {
    justify-content: space-between !important;
}

.enterprise-schedule-system .gap-2 {
    gap: 0.5rem !important;
}

.enterprise-schedule-system .gap-3 {
    gap: 1rem !important;
}

.enterprise-schedule-system .text-muted {
    color: var(--light-text) !important;
}

.enterprise-schedule-system .text-truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.enterprise-schedule-system .fw-bold {
    font-weight: 700 !important;
}

.enterprise-schedule-system .small {
    font-size: 0.875rem;
}

/* Responsive design */
@media (max-width: 768px) {
    .enterprise-schedule-system .app-title {
        font-size: 1.5rem;
    }
    
    .enterprise-schedule-system .control-bar {
        padding: 1.5rem;
    }
    
    .enterprise-schedule-system .main-layout {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .enterprise-schedule-system .sidebar {
        position: static;
    }
    
    .enterprise-schedule-system .schedule-table-wrapper {
        overflow-x: auto;
    }
    
    .enterprise-schedule-system .schedule-table {
        min-width: 700px;
    }
    
    .enterprise-schedule-system .action-bar {
        left: 1rem;
        right: 1rem;
        bottom: 1rem;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .notification-container {
        left: 1rem;
        right: 1rem;
        max-width: none;
    }
}

/* Estado vacío */
.enterprise-schedule-system .empty-state {
    text-align: center;
    padding: 3rem 2rem;
    color: var(--light-text);
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid rgba(0,0,0,0.08);
}

.enterprise-schedule-system .empty-state-icon {
    font-size: 4rem;
    color: var(--accent-color);
    margin-bottom: 1.5rem;
    opacity: 0.6;
}

.enterprise-schedule-system .empty-state-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--dark-text);
    margin-bottom: 1rem;
}

.enterprise-schedule-system .empty-state-description {
    font-size: 1rem;
    line-height: 1.6;
    max-width: 500px;
    margin: 0 auto;
}

/* Scrollbar personalizada solo dentro del sistema */
.enterprise-schedule-system ::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.enterprise-schedule-system ::-webkit-scrollbar-track {
    background: var(--light-bg);
    border-radius: 4px;
}

.enterprise-schedule-system ::-webkit-scrollbar-thumb {
    background: var(--border-color);
    border-radius: 4px;
}

.enterprise-schedule-system ::-webkit-scrollbar-thumb:hover {
    background: var(--light-text);
}
</style>

<div class="enterprise-schedule-system">
    <!-- Header empresarial -->
    <div class="app-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="app-title">
                        <i class="fas fa-calendar-alt"></i>
                        Sistema de Horarios Académicos
                    </h1>
                    <div class="app-subtitle">Gestión profesional de horarios escolares</div>
                </div>
                <div class="col-auto">
                    <button class="btn-enterprise secondary" onclick="showHelp()">
                        <i class="fas fa-question-circle"></i>
                        Ayuda
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="container-fluid py-4">
        <!-- Barra de control -->
        <div class="control-bar">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <label class="form-label fw-bold mb-2">Seleccionar Grado</label>
                    <select id="gradoSelect" class="grade-selector form-select">
                        <option value="">Seleccione un grado</option>
                        @foreach($grados as $grado)
                            <option value="{{ $grado->id }}" {{ ($grados->first()?->id == $grado->id) ? 'selected' : '' }}>
                                {{ $grado->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8">
                    <div id="statusContainer">
                        <div id="loadingStatus" class="status-indicator status-loading d-none">
                            <div class="loading-spinner"></div>
                            <span>Cargando horarios existentes y verificando asignaciones...</span>
                        </div>
                        <div id="scheduleStatus" class="status-indicator status-info d-none">
                            <i class="fas fa-info-circle"></i>
                            <span>Seleccione un grado para comenzar</span>
                            <div class="info-extra small mt-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Layout principal -->
        <div class="main-layout">
            <!-- Sidebar con recursos -->
            <div class="sidebar">
                <!-- Asignaturas -->
                <div class="enterprise-card sidebar-section">
                    <div class="card-body">
                        <h3 class="sidebar-title">
                            <i class="fas fa-book"></i>
                            Asignaturas
                        </h3>
                        <div id="subjectsList">
                            @foreach($asignaturas as $asignatura)
                                <div class="resource-chip subject draggable" 
                                     draggable="true" 
                                     data-type="asignatura" 
                                     data-id="{{ $asignatura->id }}" 
                                     data-text="{{ e($asignatura->nombre) }}">
                                    <div class="chip-icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <span class="text-truncate">{{ $asignatura->nombre }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Profesores -->
                <div class="enterprise-card sidebar-section">
                    <div class="card-body">
                        <h3 class="sidebar-title">
                            <i class="fas fa-chalkboard-teacher"></i>
                            Profesores
                        </h3>
                        <div id="teachersList">
                            @foreach($profesores as $profesor)
                                <div class="resource-chip teacher draggable" 
                                     draggable="true" 
                                     data-type="profesor" 
                                     data-id="{{ $profesor->id }}" 
                                     data-text="{{ e($profesor->name) }}">
                                    <div class="chip-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-truncate">{{ $profesor->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Área principal de horarios -->
            <div class="schedule-area">
                <div class="schedule-container">
                    <div class="schedule-header">
                        <div>
                            <h2 class="m-0">Horario Semanal</h2>
                            <small class="opacity-75">Arrastra las asignaturas y profesores para crear el horario</small>
                        </div>
                        <div id="scheduleCounter" class="d-flex align-items-center gap-2">
                            <span class="badge bg-light text-dark">0 clases programadas</span>
                        </div>
                    </div>
                    
                    <div class="schedule-table-wrapper">
                        <table class="schedule-table">
                            <thead>
                                <tr>
                                    <th style="width: 120px;">Hora</th>
                                    <th data-dia="1">Lunes</th>
                                    <th data-dia="2">Martes</th>
                                    <th data-dia="3">Miércoles</th>
                                    <th data-dia="4">Jueves</th>
                                    <th data-dia="5">Viernes</th>
                                </tr>
                            </thead>
                            <tbody id="scheduleBody">
                                @php
                                    $inicio = 7; $fin = 13;
                                @endphp

                                @for ($h = $inicio; $h < $fin; $h++)
                                    <tr>
                                        <td class="time-cell">
                                            <div class="fw-bold">{{ sprintf('%02d:00', $h) }}</div>
                                            <small class="text-muted">{{ sprintf('%02d:00', $h+1) }}</small>
                                        </td>
                                        @for ($d = 1; $d <= 5; $d++)
                                            <td class="schedule-cell dropzone" 
                                                data-dia="{{ $d }}" 
                                                data-inicio="{{ sprintf('%02d:00', $h) }}" 
                                                data-fin="{{ sprintf('%02d:00', $h+1) }}">
                                                <div class="slot-placeholder">
                                                    <div class="placeholder-day">{{ ['Lunes','Martes','Miércoles','Jueves','Viernes'][$d-1] }}</div>
                                                    <div class="placeholder-time">{{ sprintf('%02d:00', $h) }}</div>
                                                    <div class="placeholder-action">Arrastra aquí</div>
                                                </div>
                                            </td>
                                        @endfor
                                    </tr>

                                    @if ($h == 9)
                                        <tr class="break-row">
                                            <td class="time-cell">
                                                <div class="fw-bold text-warning">09:00</div>
                                                <small class="text-muted">09:30</small>
                                            </td>
                                            <td colspan="5">
                                                <div class="break-indicator">
                                                    <i class="fas fa-coffee"></i>
                                                    <span>Descanso — 09:00 a 09:30</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Estado vacío -->
                <div id="emptyState" class="empty-state d-none">
                    <div class="empty-state-icon">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <h3 class="empty-state-title">Comienza creando tu horario</h3>
                    <p class="empty-state-description">
                        Selecciona un grado y arrastra las asignaturas y profesores desde el panel lateral 
                        hacia las casillas del horario para programar las clases.
                    </p>
                </div>
            </div>
        </div>

        <!-- Barra de acciones flotante -->
        <div class="action-bar">
            <div class="d-flex align-items-center gap-3">
                <div id="pendingCounter" class="text-muted small">
                    <i class="fas fa-clock"></i>
                    <span id="pendingCount">0</span> cambios pendientes
                </div>
                <div id="savedCounter" class="text-muted small">
                    <i class="fas fa-check-circle"></i>
                    <span id="savedCount">0</span> clases guardadas
                </div>
            </div>
            <div class="d-flex gap-2">
                <button id="resetBtn" class="btn-enterprise secondary">
                    <i class="fas fa-undo"></i>
                    Reiniciar
                </button>
                <button id="saveBtn" class="btn-enterprise primary" disabled>
                    <i class="fas fa-save"></i>
                    <span id="saveBtnText">Guardar Cambios</span>
                </button>
                <button id="downloadBtn" class="btn-enterprise success">
                    <i class="fas fa-download"></i>
                    Descargar PDF
                </button>
                <a href="{{ route('admin.horarios.index') }}" class="btn-enterprise info">
                    <i class="fas fa-list"></i>
                    Ver Horarios
                </a>
            </div>
        </div>
    </div>
    <!-- Incluir vista PDF (oculta por defecto) -->
    @include('admin.horarios.horarios-pdf')
</div>

<!-- Contenedor de notificaciones -->
<div id="notificationContainer" class="notification-container"></div>

<!-- Modal de selección de profesor -->
<div class="modal fade enterprise-modal" id="teacherModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-chalkboard-teacher me-2"></i>
                    Seleccionar Profesor
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted small mb-3">Selecciona el profesor que impartirá esta clase:</p>
                <select id="teacherSelect" class="form-select"></select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-enterprise secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" id="confirmTeacher" class="btn-enterprise primary">
                    <i class="fas fa-check"></i>
                    Confirmar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmación universal -->
<div class="modal fade enterprise-modal" id="confirmModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalTitle">Confirmar acción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="confirmModalBody">
                <!-- Contenido dinámico -->
            </div>
            <div class="modal-footer" id="confirmModalFooter">
                <button type="button" class="btn-enterprise secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" id="confirmAction" class="btn-enterprise primary">
                    Confirmar
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/horarios.css') }}">
<link rel="stylesheet" href="{{ asset('css/horarios-pdf.css') }}">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="{{ asset('js/horario.js') }}"></script>
<script>
    // Configuración global de Laravel
    window.Laravel = {
        csrfToken: @json(csrf_token()),
        currentGradoId: @json(optional($grados->first())->id ?? null),
        profesores: @json($profesores->map(function($p){ return ['id'=>$p->id,'name'=>$p->name]; })->toArray()),
        asignaturas: @json($asignaturas->mapWithKeys(function($a){ return [$a->id => $a->nombre]; })->toArray()),
        grados: @json($grados->pluck('nombre', 'id')),
        routes: {
            horarios_index: @json(route('admin.horarios.index')),
            horarios_store: @json(route('admin.horarios.store'))
        }
    };

    // Inicializar el sistema cuando el DOM esté listo
    document.addEventListener('DOMContentLoaded', function() {
        // El JavaScript completo se incluirá desde el archivo horario.js original
        console.log('Sistema de Horarios Empresarial inicializado');
        console.log('Datos de Laravel cargados:', window.Laravel);
        
        // Agregar clase al body para indicar arrastre cuando sea necesario
        document.addEventListener('dragstart', function(e) {
            if (e.target.closest('.enterprise-schedule-system .draggable')) {
                document.querySelector('.enterprise-schedule-system').classList.add('dragging');
            }
        });
        
        document.addEventListener('dragend', function() {
            document.querySelector('.enterprise-schedule-system')?.classList.remove('dragging');
        });
    });

    // Función de ayuda global
    function showHelp() {
        const modalBody = `
            <div class="row g-3">
                <div class="col-12">
                    <h6><i class="fas fa-mouse-pointer me-2"></i>Cómo usar el sistema</h6>
                    <ol class="small">
                        <li>Selecciona un grado usando el selector superior</li>
                        <li>Arrastra asignaturas y profesores desde el panel lateral hacia las casillas del horario</li>
                        <li>Si faltan datos, el sistema te pedirá completar la información</li>
                        <li>Usa "Guardar Cambios" para sincronizar con la base de datos</li>
                        <li>Descarga el horario en PDF cuando esté completo</li>
                    </ol>
                </div>
                <div class="col-6">
                    <h6><i class="fas fa-palette me-2"></i>Códigos de color</h6>
                    <ul class="list-unstyled small">
                        <li><span class="badge" style="background: #28a745">Verde</span> Guardado</li>
                        <li><span class="badge" style="background: #ffc107; color: #000">Naranja</span> Pendiente</li>
                        <li><span class="badge" style="background: #dc3545">Rojo</span> Error</li>
                    </ul>
                </div>
                <div class="col-6">
                    <h6><i class="fas fa-info-circle me-2"></i>Información adicional</h6>
                    <ul class="list-unstyled small">
                        <li>• Los datos se sincronizan en tiempo real</li>
                        <li>• Los cambios se guardan permanentemente</li>
                        <li>• El PDF incluye solo datos guardados</li>
                    </ul>
                </div>
            </div>
        `;

        // Crear y mostrar modal de ayuda
        const helpModal = new bootstrap.Modal(document.createElement('div'));
        // Implementar lógica del modal aquí...
        
        alert('Sistema de Ayuda - ' + modalBody.replace(/<[^>]*>/g, ''));
    }
</script>
@endpush


