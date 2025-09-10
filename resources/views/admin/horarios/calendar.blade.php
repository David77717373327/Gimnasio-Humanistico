@extends('layouts.master')

@section('content')


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
                    @include('admin.horarios.horarios-pdf') 
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