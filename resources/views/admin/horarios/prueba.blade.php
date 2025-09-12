<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Horarios - Estilos Mejorados</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
/* Variables CSS */
:root {
  --primary-green: #1B5E3F;
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
    /* NUEVO: Agregar padding bottom para la barra flotante */
    padding-bottom: 100px;
}

.enterprise-schedule-system *,
.enterprise-schedule-system *::before,
.enterprise-schedule-system *::after {
    box-sizing: border-box;
}

/* Header empresarial */
.enterprise-schedule-system .app-header {
    background: linear-gradient(135deg, var(--accent-color) 0%, var(--secondary-color) 100%);
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
    color: var(--primary-green);
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

/* NUEVO: Botones más compactos para la barra flotante */
.enterprise-schedule-system .btn-enterprise.compact {
    padding: 0.5rem 1rem;
    font-size: 0.8rem;
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
    grid-template-columns: 300px 1fr; /* REDUCIDO: Menos espacio para sidebar */
    gap: 1.5rem; /* REDUCIDO: Gap menor */
    align-items: start;
}

@media (max-width: 1200px) {
    .enterprise-schedule-system .main-layout {
        grid-template-columns: 260px 1fr; /* REDUCIDO */
        gap: 1.25rem;
    }
}

@media (max-width: 992px) {
    .enterprise-schedule-system .main-layout {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
}

/* MEJORADO: Sidebar con altura fija y scroll interno */
.enterprise-schedule-system .sidebar {
    position: sticky;
    top: 2rem;
    display: flex;
    flex-direction: column;
    gap: 1rem; /* REDUCIDO: Gap menor entre secciones */
    /* NUEVO: Altura máxima para controlar el crecimiento */
    max-height: calc(100vh - 4rem);
    overflow: hidden;
}

.enterprise-schedule-system .enterprise-card {
    background: white;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow);
    border: 1px solid rgba(0,0,0,0.08);
    overflow: hidden;
    transition: var(--transition);
    /* NUEVO: Flex para controlar altura interna */
    display: flex;
    flex-direction: column;
}

.enterprise-schedule-system .enterprise-card:hover {
    box-shadow: var(--shadow-hover);
    transform: translateY(-1px); /* REDUCIDO: Menos movimiento */
}

/* MEJORADO: Card body con scroll interno cuando sea necesario */
.enterprise-schedule-system .sidebar-section .card-body {
    padding: 1rem; /* REDUCIDO: Padding menor */
    display: flex;
    flex-direction: column;
    /* NUEVO: Altura máxima y scroll interno */
    max-height: 400px;
    overflow: hidden;
}

.enterprise-schedule-system .sidebar-title {
    font-size: 1rem; /* REDUCIDO: Título más pequeño */
    font-weight: 700;
    color: var(--dark-text);
    margin: 0 0 0.75rem 0; /* REDUCIDO: Margen menor */
    display: flex;
    align-items: center;
    gap: 0.5rem; /* REDUCIDO */
    padding-bottom: 0.5rem; /* REDUCIDO */
    border-bottom: 2px solid var(--light-bg);
    flex-shrink: 0; /* No se encoge */
}

.enterprise-schedule-system .sidebar-title i {
    font-size: 1rem; /* REDUCIDO */
    color: var(--accent-color);
}

/* NUEVO: Contenedor con scroll para los items */
.enterprise-schedule-system #subjectsList,
.enterprise-schedule-system #teachersList {
    flex: 1;
    overflow-y: auto;
    padding-right: 0.25rem;
    /* Scroll más suave */
    scroll-behavior: smooth;
}

/* MEJORADO: Resource chips más compactos */
.enterprise-schedule-system .resource-chip {
    display: flex;
    align-items: center;
    gap: 0.5rem; /* REDUCIDO */
    padding: 0.5rem 0.75rem; /* REDUCIDO: Padding más compacto */
    background: var(--light-bg);
    border: 2px solid transparent;
    border-radius: var(--border-radius);
    margin-bottom: 0.5rem; /* REDUCIDO */
    cursor: grab;
    transition: var(--transition);
    font-weight: 500;
    font-size: 0.85rem; /* NUEVO: Texto más pequeño */
    color: var(--dark-text);
    position: relative;
    overflow: hidden;
    /* NUEVO: Altura fija para consistency */
    min-height: 40px;
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
    transform: translateX(3px); /* REDUCIDO: Menos movimiento */
    box-shadow: var(--shadow);
}

.enterprise-schedule-system .resource-chip:active {
    cursor: grabbing;
    transform: scale(0.98);
}

.enterprise-schedule-system .resource-chip.subject {
    border-left: 3px solid var(--success-color); /* REDUCIDO */
}

.enterprise-schedule-system .resource-chip.teacher {
    border-left: 3px solid var(--warning-color); /* REDUCIDO */
}

/* MEJORADO: Iconos más pequeños */
.enterprise-schedule-system .chip-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 28px; /* REDUCIDO */
    height: 28px; /* REDUCIDO */
    background: rgba(52, 152, 219, 0.1);
    border-radius: 50%;
    color: var(--accent-color);
    position: relative;
    z-index: 2;
    flex-shrink: 0;
}

.enterprise-schedule-system .chip-icon i {
    font-size: 0.8rem; /* REDUCIDO */
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

/* MEJORADO: Nueva barra de acciones - posición superior derecha sticky */
.enterprise-schedule-system .action-bar {
    position: fixed;
    top: 2rem;
    right: 2rem;
    background: rgba(255, 255, 255, 0.95);
    border-radius: var(--border-radius-lg);
    padding: 1rem;
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
    border: 1px solid rgba(0,0,0,0.08);
    z-index: 1000;
    backdrop-filter: blur(10px);
    /* NUEVO: Layout vertical compacto */
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    max-width: 280px;
    /* NUEVO: Animación de entrada */
    animation: slideInFromRight 0.3s ease-out;
}

@keyframes slideInFromRight {
    from {
        opacity: 0;
        transform: translateX(100%);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* NUEVO: Sección de contadores compacta */
.enterprise-schedule-system .action-bar .counters-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem;
    background: rgba(52, 152, 219, 0.05);
    border-radius: var(--border-radius);
    border: 1px solid rgba(52, 152, 219, 0.1);
}

.enterprise-schedule-system .action-bar .counter-item {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.75rem;
    color: var(--dark-text);
    font-weight: 500;
}

.enterprise-schedule-system .action-bar .counter-item i {
    font-size: 0.8rem;
    opacity: 0.7;
}

/* NUEVO: Botones en grid compacto */
.enterprise-schedule-system .action-bar .buttons-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.5rem;
}

.enterprise-schedule-system .action-bar .buttons-section .btn-enterprise {
    padding: 0.5rem;
    font-size: 0.75rem;
    text-align: center;
    justify-content: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* NUEVO: Botón principal que ocupa el ancho completo */
.enterprise-schedule-system .action-bar .btn-primary-full {
    grid-column: span 2;
    background: linear-gradient(135deg, var(--success-color), #229954);
}

/* Notificaciones - ajuste para no chocar con la barra */
.notification-container {
    position: fixed;
    top: 2rem;
    right: 18rem; /* AJUSTADO: Espacio para la barra flotante */
    z-index: 1050;
    max-width: 300px; /* REDUCIDO */
}

/* MEJORA: Responsive para la nueva barra flotante */
@media (max-width: 768px) {
    .enterprise-schedule-system .action-bar {
        position: fixed;
        top: auto;
        bottom: 1rem;
        right: 1rem;
        left: 1rem;
        max-width: none;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 0.75rem;
    }
    
    .enterprise-schedule-system .action-bar .counters-section {
        flex-direction: column;
        gap: 0.25rem;
        min-width: 120px;
    }
    
    .enterprise-schedule-system .action-bar .buttons-section {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    
    .enterprise-schedule-system .action-bar .btn-primary-full {
        grid-column: unset;
    }
    
    .notification-container {
        right: 1rem;
        left: 1rem;
        max-width: none;
    }
    
    /* NUEVO: Más padding bottom en mobile */
    .enterprise-schedule-system {
        padding-bottom: 120px;
    }
}

/* Resto de estilos originales sin cambios */
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
    padding: 1rem