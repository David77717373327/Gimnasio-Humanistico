<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Horarios Empresarial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header empresarial -->
    <div class="app-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="app-title">
                        <i class="fas fa-calendar-alt"></i>
                        Sistema de Horarios
                    </h1>
                    <div class="app-subtitle">Gestión profesional de horarios académicos</div>
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
                        <option value="1">1° Grado</option>
                        <option value="2">2° Grado</option>
                        <option value="3">3° Grado</option>
                        <option value="4">4° Grado</option>
                        <option value="5">5° Grado</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <div id="statusContainer">
                        <div id="loadingStatus" class="status-indicator status-loading d-none">
                            <div class="loading-spinner"></div>
                            <span>Cargando horarios...</span>
                        </div>
                        <div id="scheduleStatus" class="status-indicator status-info d-none">
                            <i class="fas fa-info-circle"></i>
                            <span>Seleccione un grado para comenzar</span>
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
                            <div class="resource-chip subject" draggable="true" data-type="asignatura" data-id="1" data-text="Matemáticas">
                                <div class="chip-icon">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <span class="text-truncate">Matemáticas</span>
                            </div>
                            <div class="resource-chip subject" draggable="true" data-type="asignatura" data-id="2" data-text="Español">
                                <div class="chip-icon">
                                    <i class="fas fa-spell-check"></i>
                                </div>
                                <span class="text-truncate">Español</span>
                            </div>
                            <div class="resource-chip subject" draggable="true" data-type="asignatura" data-id="3" data-text="Ciencias">
                                <div class="chip-icon">
                                    <i class="fas fa-microscope"></i>
                                </div>
                                <span class="text-truncate">Ciencias</span>
                            </div>
                            <div class="resource-chip subject" draggable="true" data-type="asignatura" data-id="4" data-text="Historia">
                                <div class="chip-icon">
                                    <i class="fas fa-landmark"></i>
                                </div>
                                <span class="text-truncate">Historia</span>
                            </div>
                            <div class="resource-chip subject" draggable="true" data-type="asignatura" data-id="5" data-text="Arte">
                                <div class="chip-icon">
                                    <i class="fas fa-palette"></i>
                                </div>
                                <span class="text-truncate">Arte</span>
                            </div>
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
                            <div class="resource-chip teacher" draggable="true" data-type="profesor" data-id="1" data-text="Prof. García">
                                <div class="chip-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="text-truncate">Prof. García</span>
                            </div>
                            <div class="resource-chip teacher" draggable="true" data-type="profesor" data-id="2" data-text="Prof. López">
                                <div class="chip-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="text-truncate">Prof. López</span>
                            </div>
                            <div class="resource-chip teacher" draggable="true" data-type="profesor" data-id="3" data-text="Prof. Martínez">
                                <div class="chip-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="text-truncate">Prof. Martínez</span>
                            </div>
                            <div class="resource-chip teacher" draggable="true" data-type="profesor" data-id="4" data-text="Prof. Rodríguez">
                                <div class="chip-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="text-truncate">Prof. Rodríguez</span>
                            </div>
                            <div class="resource-chip teacher" draggable="true" data-type="profesor" data-id="5" data-text="Prof. Hernández">
                                <div class="chip-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="text-truncate">Prof. Hernández</span>
                            </div>
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
                                    <th>Lunes</th>
                                    <th>Martes</th>
                                    <th>Miércoles</th>
                                    <th>Jueves</th>
                                    <th>Viernes</th>
                                </tr>
                            </thead>
                            <tbody id="scheduleBody">
                                <!-- 7:00 - 8:00 -->
                                <tr>
                                    <td class="time-cell">
                                        <div class="fw-bold">07:00</div>
                                        <small class="text-muted">08:00</small>
                                    </td>
                                    <td class="schedule-cell" data-dia="1" data-inicio="07:00" data-fin="08:00">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Lunes</div>
                                            <div class="placeholder-time">07:00</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="2" data-inicio="07:00" data-fin="08:00">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Martes</div>
                                            <div class="placeholder-time">07:00</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="3" data-inicio="07:00" data-fin="08:00">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Miércoles</div>
                                            <div class="placeholder-time">07:00</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="4" data-inicio="07:00" data-fin="08:00">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Jueves</div>
                                            <div class="placeholder-time">07:00</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="5" data-inicio="07:00" data-fin="08:00">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Viernes</div>
                                            <div class="placeholder-time">07:00</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- 8:00 - 9:00 -->
                                <tr>
                                    <td class="time-cell">
                                        <div class="fw-bold">08:00</div>
                                        <small class="text-muted">09:00</small>
                                    </td>
                                    <td class="schedule-cell" data-dia="1" data-inicio="08:00" data-fin="09:00">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Lunes</div>
                                            <div class="placeholder-time">08:00</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="2" data-inicio="08:00" data-fin="09:00">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Martes</div>
                                            <div class="placeholder-time">08:00</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="3" data-inicio="08:00" data-fin="09:00">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Miércoles</div>
                                            <div class="placeholder-time">08:00</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="4" data-inicio="08:00" data-fin="09:00">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Jueves</div>
                                            <div class="placeholder-time">08:00</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="5" data-inicio="08:00" data-fin="09:00">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Viernes</div>
                                            <div class="placeholder-time">08:00</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- 9:00 - 9:30 DESCANSO -->
                                <tr class="break-row">
                                    <td class="time-cell">
                                        <div class="fw-bold text-warning">09:00</div>
                                        <small class="text-muted">09:30</small>
                                    </td>
                                    <td colspan="5">
                                        <div class="break-indicator">
                                            <i class="fas fa-coffee"></i>
                                            <span>Descanso</span>
                                        </div>
                                    </td>
                                </tr>

                                <!-- 9:30 - 10:30 -->
                                <tr>
                                    <td class="time-cell">
                                        <div class="fw-bold">09:30</div>
                                        <small class="text-muted">10:30</small>
                                    </td>
                                    <td class="schedule-cell" data-dia="1" data-inicio="09:30" data-fin="10:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Lunes</div>
                                            <div class="placeholder-time">09:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="2" data-inicio="09:30" data-fin="10:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Martes</div>
                                            <div class="placeholder-time">09:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="3" data-inicio="09:30" data-fin="10:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Miércoles</div>
                                            <div class="placeholder-time">09:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="4" data-inicio="09:30" data-fin="10:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Jueves</div>
                                            <div class="placeholder-time">09:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="5" data-inicio="09:30" data-fin="10:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Viernes</div>
                                            <div class="placeholder-time">09:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- 10:30 - 11:30 -->
                                <tr>
                                    <td class="time-cell">
                                        <div class="fw-bold">10:30</div>
                                        <small class="text-muted">11:30</small>
                                    </td>
                                    <td class="schedule-cell" data-dia="1" data-inicio="10:30" data-fin="11:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Lunes</div>
                                            <div class="placeholder-time">10:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="2" data-inicio="10:30" data-fin="11:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Martes</div>
                                            <div class="placeholder-time">10:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="3" data-inicio="10:30" data-fin="11:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Miércoles</div>
                                            <div class="placeholder-time">10:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="4" data-inicio="10:30" data-fin="11:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Jueves</div>
                                            <div class="placeholder-time">10:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="5" data-inicio="10:30" data-fin="11:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Viernes</div>
                                            <div class="placeholder-time">10:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- 11:30 - 12:30 -->
                                <tr>
                                    <td class="time-cell">
                                        <div class="fw-bold">11:30</div>
                                        <small class="text-muted">12:30</small>
                                    </td>
                                    <td class="schedule-cell" data-dia="1" data-inicio="11:30" data-fin="12:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Lunes</div>
                                            <div class="placeholder-time">11:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="2" data-inicio="11:30" data-fin="12:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Martes</div>
                                            <div class="placeholder-time">11:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="3" data-inicio="11:30" data-fin="12:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Miércoles</div>
                                            <div class="placeholder-time">11:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="4" data-inicio="11:30" data-fin="12:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Jueves</div>
                                            <div class="placeholder-time">11:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                    <td class="schedule-cell" data-dia="5" data-inicio="11:30" data-fin="12:30">
                                        <div class="slot-placeholder">
                                            <div class="placeholder-day">Viernes</div>
                                            <div class="placeholder-time">11:30</div>
                                            <div class="placeholder-action">Arrastra aquí</div>
                                        </div>
                                    </td>
                                </tr>
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
            </div>
        </div>
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
                    <select id="teacherSelect" class="form-select">
                        <option value="">Seleccione un profesor</option>
                        <option value="1">Prof. García</option>
                        <option value="2">Prof. López</option>
                        <option value="3">Prof. Martínez</option>
                        <option value="4">Prof. Rodríguez</option>
                        <option value="5">Prof. Hernández</option>
                    </select>
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

    <!-- Modal de confirmación -->
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    
    <script>
        // Sistema de gestión de horarios empresarial
        class EnterpriseScheduleManager {
            constructor() {
                this.currentGrade = null;
                this.pendingSchedules = [];
                this.savedSchedules = [];
                this.existingSchedules = [];
                this.subjects = {
                    1: 'Matemáticas',
                    2: 'Español', 
                    3: 'Ciencias',
                    4: 'Historia',
                    5: 'Arte'
                };
                this.teachers = {
                    1: 'Prof. García',
                    2: 'Prof. López',
                    3: 'Martínez',
                    4: 'Prof. Rodríguez',
                    5: 'Prof. Hernández'
                };
                this.grades = {
                    1: '1° Grado',
                    2: '2° Grado', 
                    3: '3° Grado',
                    4: '4° Grado',
                    5: '5° Grado'
                };
                
                this.init();
            }

            init() {
                this.setupEventListeners();
                this.setupDragAndDrop();
                this.updateCounters();
            }

            setupEventListeners() {
                // Selector de grado
                document.getElementById('gradoSelect').addEventListener('change', (e) => {
                    this.handleGradeChange(e.target.value);
                });

                // Botones de acción
                document.getElementById('saveBtn').addEventListener('click', () => {
                    this.showSaveConfirmation();
                });

                document.getElementById('resetBtn').addEventListener('click', () => {
                    this.showResetConfirmation();
                });

                document.getElementById('downloadBtn').addEventListener('click', () => {
                    this.downloadPDF();
                });

                // Modal de profesor
                document.getElementById('confirmTeacher').addEventListener('click', () => {
                    this.confirmTeacherSelection();
                });

                // Confirmación de acciones
                document.getElementById('confirmAction').addEventListener('click', () => {
                    this.executeConfirmedAction();
                });
            }

            setupDragAndDrop() {
                // Setup draggable items
                document.querySelectorAll('.resource-chip').forEach(chip => {
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
                document.querySelectorAll('.schedule-cell').forEach(cell => {
                    cell.addEventListener('dragover', (e) => {
                        e.preventDefault();
                        cell.classList.add('dragover');
                    });

                    cell.addEventListener('dragleave', () => {
                        cell.classList.remove('dragover');
                    });

                    cell.addEventListener('drop', (e) => {
                        e.preventDefault();
                        cell.classList.remove('dragover');
                        document.body.classList.remove('dragging');
                        this.handleDrop(e, cell);
                    });
                });
            }

            handleGradeChange(gradeId) {
                if (!gradeId) {
                    this.currentGrade = null;
                    this.clearSchedule();
                    this.hideStatus();
                    return;
                }

                this.currentGrade = gradeId;
                this.showLoadingStatus();
                
                // Simular carga de datos existentes
                setTimeout(() => {
                    this.loadExistingSchedules();
                    this.hideLoadingStatus();
                    this.showScheduleStatus();
                }, 1000);
            }

            async handleDrop(e, cell) {
                if (!this.currentGrade) {
                    this.showNotification('warning', 'Selecciona un grado', 'Primero debes seleccionar un grado antes de asignar horarios.');
                    return;
                }

                const data = JSON.parse(e.dataTransfer.getData('text/plain'));
                
                // Check if cell is occupied
                if (cell.classList.contains('occupied')) {
                    const action = await this.showOccupiedCellModal(cell, data);
                    if (action === 'cancel') return;
                    if (action === 'replace') {
                        this.clearCell(cell);
                    }
                }

                await this.assignToCell(cell, data);
            }

            async assignToCell(cell, data) {
                const dia = this.getDayName(cell.dataset.dia);
                const horaInicio = cell.dataset.inicio;
                const horaFin = cell.dataset.fin;

                let subjectId = cell.dataset.asignaturaId;
                let teacherId = cell.dataset.userId;

                if (data.type === 'asignatura') {
                    subjectId = data.id;
                } else if (data.type === 'profesor') {
                    teacherId = data.id;
                }

                // If teacher is missing, prompt for selection
                if (!teacherId) {
                    teacherId = await this.promptTeacherSelection();
                    if (!teacherId) {
                        this.showNotification('warning', 'Profesor requerido', 'Debes seleccionar un profesor para completar este horario.');
                        return;
                    }
                }

                const scheduleData = {
                    gradeId: this.currentGrade,
                    subjectId: subjectId,
                    teacherId: teacherId,
                    day: dia,
                    startTime: horaInicio,
                    endTime: horaFin,
                    cell: cell,
                    isUpdate: !!cell.dataset.horarioId,
                    scheduleId: cell.dataset.horarioId || null
                };

                this.addToPending(scheduleData);
                this.renderScheduleSlot(cell, {
                    subjectId: subjectId,
                    teacherId: teacherId,
                    subjectText: this.subjects[subjectId],
                    teacherText: this.teachers[teacherId],
                    isExisting: false
                });

                cell.classList.add('occupied');
                this.updateCounters();
            }

            renderScheduleSlot(cell, info) {
                // Store metadata
                if (info.subjectId) cell.dataset.asignaturaId = info.subjectId;
                if (info.teacherId) cell.dataset.userId = info.teacherId;

                const slotHtml = `
                    <div class="class-slot ${info.isExisting ? 'existing' : 'pending'}">
                        <div class="slot-status ${info.isExisting ? 'existing' : 'pending'}"></div>
                        <div class="slot-content">
                            <div class="slot-subject">${info.subjectText || 'Asignatura'}</div>
                            <div class="slot-teacher">${info.teacherText || 'Profesor'}</div>
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

            addToPending(scheduleData) {
                const key = `${scheduleData.day}-${scheduleData.startTime}`;
                this.pendingSchedules = this.pendingSchedules.filter(s => `${s.day}-${s.startTime}` !== key);
                this.pendingSchedules.push(scheduleData);
                this.updateCounters();
            }

            updateCounters() {
                const pendingCount = this.pendingSchedules.length;
                const savedCount = this.savedSchedules.length + this.existingSchedules.length;

                document.getElementById('pendingCount').textContent = pendingCount;
                document.getElementById('savedCount').textContent = savedCount;
                document.getElementById('scheduleCounter').innerHTML = `
                    <span class="badge bg-light text-dark">${savedCount + pendingCount} clases programadas</span>
                `;

                const saveBtn = document.getElementById('saveBtn');
                const saveBtnText = document.getElementById('saveBtnText');
                
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

            showNotification(type, title, message, suggestion = null) {
                const container = document.getElementById('notificationContainer');
                const notificationId = Date.now();
                
                const icons = {
                    success: 'fas fa-check-circle',
                    error: 'fas fa-exclamation-circle',
                    warning: 'fas fa-exclamation-triangle',
                    info: 'fas fa-info-circle'
                };

                const notificationHtml = `
                    <div class="notification ${type}" id="notification-${notificationId}">
                        <div class="notification-header">
                            <div class="notification-icon">
                                <i class="${icons[type]}"></i>
                            </div>
                            <div class="notification-content">
                                <div class="notification-title">${title}</div>
                                <div class="notification-message">${message}</div>
                                ${suggestion ? `<div class="notification-suggestion">${suggestion}</div>` : ''}
                            </div>
                            <button class="notification-close" onclick="scheduleManager.closeNotification(${notificationId})">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        ${type !== 'error' ? '<div class="notification-progress"><div class="notification-progress-bar"></div></div>' : ''}
                    </div>
                `;

                container.insertAdjacentHTML('afterbegin', notificationHtml);

                // Auto remove non-error notifications
                if (type !== 'error') {
                    setTimeout(() => {
                        this.closeNotification(notificationId);
                    }, 5000);
                }
            }

            closeNotification(id) {
                const notification = document.getElementById(`notification-${id}`);
                if (notification) {
                    notification.style.animation = 'slideOutRight 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards';
                    setTimeout(() => notification.remove(), 300);
                }
            }

            async promptTeacherSelection() {
                return new Promise((resolve) => {
                    const modal = new bootstrap.Modal(document.getElementById('teacherModal'));
                    const select = document.getElementById('teacherSelect');
                    const confirmBtn = document.getElementById('confirmTeacher');
                    
                    select.value = '';
                    modal.show();
                    
                    this.teacherSelectionResolve = resolve;
                });
            }

            confirmTeacherSelection() {
                const select = document.getElementById('teacherSelect');
                const modal = bootstrap.Modal.getInstance(document.getElementById('teacherModal'));
                
                if (this.teacherSelectionResolve) {
                    this.teacherSelectionResolve(select.value || null);
                    this.teacherSelectionResolve = null;
                }
                
                modal.hide();
            }

            async showOccupiedCellModal(cell, data) {
                return new Promise((resolve) => {
                    const currentSubject = this.subjects[cell.dataset.asignaturaId];
                    const currentTeacher = this.teachers[cell.dataset.userId];
                    const day = this.getDayName(cell.dataset.dia);
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
                        <button type="button" class="btn-enterprise secondary" onclick="scheduleManager.resolveModal('cancel')">
                            Cancelar
                        </button>
                        <button type="button" class="btn-enterprise warning" onclick="scheduleManager.resolveModal('replace')">
                            <i class="fas fa-exchange-alt"></i>
                            Reemplazar
                        </button>
                        <button type="button" class="btn-enterprise primary" onclick="scheduleManager.resolveModal('continue')">
                            <i class="fas fa-plus"></i>
                            Mantener y agregar
                        </button>
                    `;

                    this.showModal('Casilla ocupada', modalBody, modalFooter);
                    this.modalResolve = resolve;
                });
            }

            showSaveConfirmation() {
                if (this.pendingSchedules.length === 0) {
                    this.showNotification('info', 'Sin cambios', 'No hay cambios pendientes para guardar.');
                    return;
                }

                const scheduleList = this.pendingSchedules.map(s => 
                    `<li><strong>${s.day} ${s.startTime}-${s.endTime}:</strong> ${this.subjects[s.subjectId]} con ${this.teachers[s.teacherId]}</li>`
                ).join('');

                const modalBody = `
                    <p>¿Confirmas que deseas guardar los siguientes horarios?</p>
                    <div class="alert alert-info">
                        <h6><i class="fas fa-list me-2"></i>Cambios a guardar (${this.pendingSchedules.length}):</h6>
                        <ul class="mb-0 small">${scheduleList}</ul>
                    </div>
                    <p class="text-muted small">Esta acción guardará permanentemente los horarios en la base de datos.</p>
                `;

                const modalFooter = `
                    <button type="button" class="btn-enterprise secondary" onclick="scheduleManager.resolveModal('cancel')">
                        Cancelar
                    </button>
                    <button type="button" class="btn-enterprise success" onclick="scheduleManager.resolveModal('save')">
                        <i class="fas fa-save"></i>
                        Guardar todo
                    </button>
                `;

                this.showModal('Confirmar guardado', modalBody, modalFooter);
                this.modalResolve = (action) => {
                    if (action === 'save') {
                        this.saveAllPending();
                    }
                };
            }

            showResetConfirmation() {
                const totalSchedules = this.existingSchedules.length + this.savedSchedules.length + this.pendingSchedules.length;
                
                const modalBody = `
                    <div class="alert alert-warning">
                        <h6><i class="fas fa-exclamation-triangle me-2"></i>¿Reiniciar horario?</h6>
                        <p class="mb-2">Se limpiarán <strong>${totalSchedules} clases programadas</strong>.</p>
                        <p class="mb-0"><strong>Nota:</strong> Los horarios guardados en la base de datos NO se eliminarán.</p>
                    </div>
                    <p>Esta acción solo reiniciará la vista actual. Podrás volver a cargar los datos seleccionando el grado nuevamente.</p>
                `;

                const modalFooter = `
                    <button type="button" class="btn-enterprise secondary" onclick="scheduleManager.resolveModal('cancel')">
                        Cancelar
                    </button>
                    <button type="button" class="btn-enterprise warning" onclick="scheduleManager.resolveModal('reset')">
                        <i class="fas fa-undo"></i>
                        Reiniciar vista
                    </button>
                `;

                this.showModal('Confirmar reinicio', modalBody, modalFooter);
                this.modalResolve = (action) => {
                    if (action === 'reset') {
                        this.resetSchedule();
                    }
                };
            }

            showModal(title, body, footer) {
                document.getElementById('confirmModalTitle').textContent = title;
                document.getElementById('confirmModalBody').innerHTML = body;
                document.getElementById('confirmModalFooter').innerHTML = footer;
                
                const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
                modal.show();
            }

            resolveModal(action) {
                const modal = bootstrap.Modal.getInstance(document.getElementById('confirmModal'));
                modal.hide();
                
                if (this.modalResolve) {
                    this.modalResolve(action);
                    this.modalResolve = null;
                }
            }

            async saveAllPending() {
                if (this.pendingSchedules.length === 0) return;

                const saveBtn = document.getElementById('saveBtn');
                const saveBtnText = document.getElementById('saveBtnText');
                const originalText = saveBtnText.textContent;
                
                saveBtn.disabled = true;
                saveBtnText.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...';

                let successful = 0;
                let errors = 0;

                for (const schedule of this.pendingSchedules) {
                    try {
                        const result = await this.saveSchedule(schedule);
                        if (result.success) {
                            successful++;
                            this.markAsExisting(schedule);
                        } else {
                            errors++;
                            this.markAsError(schedule);
                        }
                    } catch (error) {
                        console.error('Error saving schedule:', error);
                        errors++;
                        this.markAsError(schedule);
                    }
                }

                // Clean up successful saves from pending
                this.pendingSchedules = this.pendingSchedules.filter(s => {
                    const cell = s.cell;
                    return cell.querySelector('.class-slot').classList.contains('error');
                });

                saveBtn.disabled = false;
                saveBtnText.textContent = originalText;
                this.updateCounters();

                // Show results
                if (errors === 0) {
                    this.showNotification('success', 'Guardado exitoso', 
                        `Se guardaron ${successful} horarios correctamente.`,
                        'Los horarios se han sincronizado con la base de datos.');
                } else if (successful > 0) {
                    this.showNotification('warning', 'Guardado parcial', 
                        `${successful} horarios guardados, ${errors} fallaron.`,
                        'Revisa los horarios marcados en rojo e intenta guardarlos nuevamente.');
                } else {
                    this.showNotification('error', 'Error al guardar', 
                        'No se pudieron guardar los horarios.',
                        'Verifica tu conexión e intenta nuevamente.');
                }
            }

            async saveSchedule(scheduleData) {
                // Simulated API call
                return new Promise((resolve) => {
                    setTimeout(() => {
                        // 90% success rate for demo
                        const success = Math.random() > 0.1;
                        resolve({
                            success: success,
                            error: success ? null : 'Error de conexión simulado'
                        });
                    }, Math.random() * 1000 + 500);
                });
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
                this.savedSchedules.push(schedule);
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
                
                const subjectName = this.subjects[cell.dataset.asignaturaId];
                const teacherName = this.teachers[cell.dataset.userId];
                
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
                    <button type="button" class="btn-enterprise secondary" onclick="scheduleManager.resolveModal('cancel')">
                        Cancelar
                    </button>
                    <button type="button" class="btn-enterprise danger" onclick="scheduleManager.resolveModal('delete')">
                        <i class="fas fa-trash"></i>
                        ${isExisting ? 'Eliminar permanentemente' : 'Eliminar'}
                    </button>
                `;

                this.showModal('Confirmar eliminación', modalBody, modalFooter);
                this.modalResolve = async (action) => {
                    if (action === 'delete') {
                        await this.executeRemoval(cell, isExisting);
                    }
                };
            }

            async executeRemoval(cell, isExisting) {
                if (isExisting) {
                    // Simulate API deletion
                    try {
                        const result = await this.deleteSchedule(cell.dataset.horarioId);
                        if (!result.success) {
                            this.showNotification('error', 'Error al eliminar', 'No se pudo eliminar el horario de la base de datos.');
                            return;
                        }
                    } catch (error) {
                        this.showNotification('error', 'Error de conexión', 'No se pudo conectar con el servidor.');
                        return;
                    }
                }

                // Remove from arrays
                const day = this.getDayName(cell.dataset.dia);
                const startTime = cell.dataset.inicio;
                this.removeFromArrays(day, startTime);

                // Clear cell
                this.clearCell(cell);
                this.updateCounters();

                this.showNotification('success', 'Eliminado correctamente', 
                    isExisting ? 'El horario ha sido eliminado de la base de datos.' : 'Asignación eliminada.');
            }

            async deleteSchedule(scheduleId) {
                // Simulated API call
                return new Promise((resolve) => {
                    setTimeout(() => {
                        resolve({ success: true });
                    }, 500);
                });
            }

            editSchedule(btnElement) {
                const cell = btnElement.closest('.schedule-cell');
                const subjectName = this.subjects[cell.dataset.asignaturaId];
                const teacherName = this.teachers[cell.dataset.userId];
                
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
                    <button type="button" class="btn-enterprise secondary" onclick="scheduleManager.resolveModal('cancel')">
                        Cancelar
                    </button>
                    <button type="button" class="btn-enterprise primary" onclick="scheduleManager.resolveModal('edit')">
                        <i class="fas fa-edit"></i>
                        Activar edición
                    </button>
                `;

                this.showModal('Editar horario', modalBody, modalFooter);
                this.modalResolve = (action) => {
                    if (action === 'edit') {
                        this.enableEditMode(cell);
                    }
                };
            }

            enableEditMode(cell) {
                cell.classList.add('editing');
                cell.classList.remove('occupied');
                
                const slot = cell.querySelector('.class-slot');
                if (slot) {
                    slot.style.opacity = '0.7';
                }

                this.showNotification('info', 'Modo edición activado', 
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

            removeFromArrays(day, startTime) {
                const key = `${day}-${startTime}`;
                this.pendingSchedules = this.pendingSchedules.filter(s => `${s.day}-${s.startTime}` !== key);
                this.savedSchedules = this.savedSchedules.filter(s => `${s.day}-${s.startTime}` !== key);
                this.existingSchedules = this.existingSchedules.filter(s => `${s.day}-${s.startTime}` !== key);
            }

            clearCell(cell) {
                cell.classList.remove('occupied', 'editing');
                delete cell.dataset.asignaturaId;
                delete cell.dataset.userId;
                delete cell.dataset.horarioId;

                const day = this.getDayName(cell.dataset.dia);
                const time = cell.dataset.inicio;

                cell.innerHTML = `
                    <div class="slot-placeholder">
                        <div class="placeholder-day">${day}</div>
                        <div class="placeholder-time">${time}</div>
                        <div class="placeholder-action">Arrastra aquí</div>
                    </div>
                `;
            }

            loadExistingSchedules() {
                // Simulate loading existing schedules for the selected grade
                const mockExistingSchedules = [
                    {
                        id: 1,
                        day: 'Lunes',
                        startTime: '08:00',
                        endTime: '09:00',
                        subjectId: '1',
                        teacherId: '1'
                    },
                    {
                        id: 2,
                        day: 'Martes',
                        startTime: '09:30',
                        endTime: '10:30',
                        subjectId: '2',
                        teacherId: '2'
                    }
                ];

                this.clearSchedule();
                this.existingSchedules = [];

                mockExistingSchedules.forEach(schedule => {
                    const cell = document.querySelector(
                        `.schedule-cell[data-dia="${this.getDayNumber(schedule.day)}"][data-inicio="${schedule.startTime}"]`
                    );

                    if (cell) {
                        cell.dataset.horarioId = schedule.id;
                        this.renderScheduleSlot(cell, {
                            subjectId: schedule.subjectId,
                            teacherId: schedule.teacherId,
                            subjectText: this.subjects[schedule.subjectId],
                            teacherText: this.teachers[schedule.teacherId],
                            isExisting: true
                        });
                        cell.classList.add('occupied');
                        this.existingSchedules.push(schedule);
                    }
                });

                this.updateCounters();
            }

            clearSchedule() {
                document.querySelectorAll('.schedule-cell').forEach(cell => {
                    this.clearCell(cell);
                });
                this.pendingSchedules = [];
                this.savedSchedules = [];
                this.existingSchedules = [];
                this.updateCounters();
            }

            resetSchedule() {
                this.clearSchedule();
                this.currentGrade = null;
                document.getElementById('gradoSelect').value = '';
                this.hideStatus();
                this.showNotification('info', 'Vista reiniciada', 'El horario ha sido reiniciado. Selecciona un grado para cargar sus horarios.');
            }

            downloadPDF() {
                if (!this.currentGrade) {
                    this.showNotification('warning', 'Selecciona un grado', 'Debes seleccionar un grado para descargar su horario.');
                    return;
                }

                const totalSchedules = this.existingSchedules.length + this.savedSchedules.length;
                if (totalSchedules === 0) {
                    this.showNotification('warning', 'Sin horarios', 
                        'No hay clases programadas para descargar.',
                        'Agrega algunas clases antes de generar el PDF.');
                    return;
                }

                if (this.pendingSchedules.length > 0) {
                    this.showNotification('warning', 'Cambios pendientes', 
                        `Tienes ${this.pendingSchedules.length} cambios sin guardar. El PDF solo incluirá datos guardados.`,
                        'Guarda los cambios primero para incluirlos en el PDF.');
                }

                // Simulate PDF generation
                this.showNotification('info', 'Generando PDF', 'Se está preparando tu horario escolar...');
                
                setTimeout(() => {
                    this.showNotification('success', 'PDF generado', 
                        `Horario de ${this.grades[this.currentGrade]} listo para descargar.`,
                        'El archivo incluye todas las clases guardadas con un diseño profesional.');
                }, 2000);
            }

            showLoadingStatus() {
                document.getElementById('loadingStatus').classList.remove('d-none');
                document.getElementById('scheduleStatus').classList.add('d-none');
            }

            hideLoadingStatus() {
                document.getElementById('loadingStatus').classList.add('d-none');
            }

            showScheduleStatus() {
                const statusEl = document.getElementById('scheduleStatus');
                const totalSchedules = this.existingSchedules.length + this.savedSchedules.length;
                const gradeName = this.grades[this.currentGrade];

                statusEl.innerHTML = `
                    <i class="fas fa-info-circle"></i>
                    <span>${gradeName}: ${totalSchedules} clases programadas</span>
                `;
                statusEl.classList.remove('d-none');

                if (totalSchedules > 0) {
                    statusEl.classList.remove('status-info');
                    statusEl.classList.add('status-success');
                } else {
                    statusEl.classList.remove('status-success');
                    statusEl.classList.add('status-info');
                }
            }

            hideStatus() {
                document.getElementById('scheduleStatus').classList.add('d-none');
                document.getElementById('loadingStatus').classList.add('d-none');
            }

            getDayName(dayNumber) {
                const days = {
                    1: 'Lunes',
                    2: 'Martes',
                    3: 'Miércoles',
                    4: 'Jueves',
                    5: 'Viernes'
                };
                return days[dayNumber] || 'Día';
            }

            getDayNumber(dayName) {
                const days = {
                    'Lunes': 1,
                    'Martes': 2,
                    'Miércoles': 3,
                    'Jueves': 4,
                    'Viernes': 5
                };
                return days[dayName] || 1;
            }
        }

        // Help function
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
                            <li><span class="badge" style="background: var(--success-color)">Verde</span> Guardado</li>
                            <li><span class="badge" style="background: var(--warning-color)">Naranja</span> Pendiente</li>
                            <li><span class="badge" style="background: var(--error-color)">Rojo</span> Error</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <h6><i class="fas fa-keyboard me-2"></i>Atajos útiles</h6>
                        <ul class="list-unstyled small">
                            <li><kbd>Ctrl + S</kbd> Guardar</li>
                            <li><kbd>Esc</kbd> Cancelar acción</li>
                            <li><kbd>Delete</kbd> Eliminar selección</li>
                        </ul>
                    </div>
                </div>
            `;

            const modalFooter = `
                <button type="button" class="btn-enterprise primary" data-bs-dismiss="modal">
                    <i class="fas fa-check"></i>
                    Entendido
                </button>
            `;

            scheduleManager.showModal('Ayuda del sistema', modalBody, modalFooter);
        }

        // Global animation styles for slide out
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideOutRight {
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Initialize the schedule manager
        const scheduleManager = new EnterpriseScheduleManager();

        // Keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.key === 's') {
                e.preventDefault();
                scheduleManager.showSaveConfirmation();
            }
            if (e.key === 'Escape') {
                // Close topmost modal or notification
                const modal = document.querySelector('.modal.show');
                if (modal) {
                    bootstrap.Modal.getInstance(modal).hide();
                }
            }
        });

        // Prevent default drag behaviors on non-draggable elements
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
    </script>
</body>
</html>