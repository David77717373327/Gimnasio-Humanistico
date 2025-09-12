<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Escolar</title>
    <!-- Google Fonts for Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap JS for dropdowns -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    
    <style>
        /* ===================================
           VARIABLES CSS
        =================================== */
        :root {
            --primary-green: #0d3f27;
        }

        /* ===================================
           ESTILOS GENERALES DEL BODY
        =================================== */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            transition: all 0.3s ease;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }

        body.font-inter {
            font-family: 'Inter', sans-serif;
        }

        .dark-mode body {
            background-color: #111827;
            color: #e5e7eb;
        }

        h1, h2, h3, h4, h5, h6 {
            color: #004d00;
            font-weight: 600;
        }

        .dark-mode h1, .dark-mode h2, .dark-mode h3, .dark-mode h4, .dark-mode h5, .dark-mode h6 {
            color: #ffd700;
        }

        /* ===================================
           HEADER PRINCIPAL MEJORADO CON VERDE
        =================================== */
        .main-header {
            background: var(--primary-green);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 2px 8px rgba(13, 63, 39, 0.3);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1050;
            height: 70px;
            transition: all 0.3s ease;
        }

        .dark-mode .main-header {
            background: var(--primary-green);
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }

        /* Contenedor principal del header - Mejor distribución */
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100%;
            max-width: 100%;
            margin: 0;
            padding: 0 24px;
            gap: 2rem;
        }

        /* ===================================
           BOTÓN TOGGLE SIDEBAR
        =================================== */
        .sidebar-toggle-container {
            display: flex;
            align-items: center;
            flex-shrink: 0;
        }

        .sidebar-toggle-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .sidebar-toggle-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar-toggle-btn:active {
            transform: translateY(0);
        }

        /* ===================================
           SECCIÓN IZQUIERDA - LOGO Y MARCA
        =================================== */
        .header-left {
            display: flex;
            align-items: center;
            flex-shrink: 0;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-logo {
            height: 45px;
            width: auto;
            max-width: 140px;
            object-fit: contain;
            transition: all 0.3s ease;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-title {
            font-size: 18px;
            font-weight: 700;
            color: white;
            margin: 0;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ===================================
           NAVEGACIÓN PRINCIPAL DEL HEADER
        =================================== */
        .header-navigation {
            flex: 1;
            display: flex;
            justify-content: center;
            max-width: 700px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 0;
            padding: 0;
            list-style: none;
            flex-wrap: wrap;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
            white-space: nowrap;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateY(-1px);
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .nav-link.active:hover {
            background: rgba(255, 255, 255, 0.25);
            color: white;
        }

        .nav-icon {
            font-size: 16px;
            width: 16px;
            text-align: center;
            color: white;
        }

        .dropdown-arrow {
            font-size: 10px;
            transition: transform 0.2s ease;
            color: white;
        }

        .nav-item.show .dropdown-arrow {
            transform: rotate(180deg);
        }

        /* Dropdown del Header */
        .nav-dropdown {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 8px;
            margin-top: 8px;
            min-width: 200px;
        }

        .dark-mode .nav-dropdown {
            background: #374151;
            border-color: #4b5563;
        }

        .nav-dropdown .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: 8px;
            color: #4b5563;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .nav-dropdown .dropdown-item:hover {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            color: #004d00;
            transform: translateX(4px);
        }

        .dark-mode .nav-dropdown .dropdown-item {
            color: #d1d5db;
        }

        .dark-mode .nav-dropdown .dropdown-item:hover {
            background: linear-gradient(135deg, #4b5563 0%, #6b7280 100%);
            color: #ffd700;
        }

        /* ===================================
           CONTROLES DE USUARIO
        =================================== */
        .user-controls {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        .control-item {
            position: relative;
        }

        .control-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 14px;
            font-weight: 500;
            min-height: 42px;
        }

        .control-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Botón de Notificaciones */
        .notification-btn {
            position: relative;
            width: 42px;
            justify-content: center;
        }

        .notification-badge {
            position: absolute;
            top: 2px;
            right: 2px;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            font-size: 10px;
            font-weight: 600;
            padding: 2px 6px;
            border-radius: 10px;
            min-width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* Botón de Usuario */
        .user-btn {
            padding: 6px 12px;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.2s ease;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
            line-height: 1.2;
            color: white;
        }

        .user-role {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.2;
        }

        /* ===================================
           DROPDOWNS MEJORADOS
        =================================== */
        .dropdown-menu {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 0;
            margin-top: 8px;
            min-width: 320px;
            overflow: hidden;
        }

        .dark-mode .dropdown-menu {
            background: #374151;
            border-color: #4b5563;
        }

        .dropdown-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 16px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dark-mode .dropdown-header {
            background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
            border-bottom-color: #6b7280;
        }

        .dropdown-header h6 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
        }

        .dark-mode .dropdown-header h6 {
            color: #f9fafb;
        }

        .dropdown-header .badge {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }

        .dropdown-body {
            padding: 8px;
            max-height: 300px;
            overflow-y: auto;
        }

        .dropdown-footer {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 12px 16px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
        }

        .dark-mode .dropdown-footer {
            background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
            border-top-color: #6b7280;
        }

        .btn-view-all {
            color: #10b981;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .btn-view-all:hover {
            color: #059669;
        }

        /* Dropdown de Notificaciones */
        .notification-dropdown {
            min-width: 380px;
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            color: #374151;
            transition: all 0.2s ease;
            border-bottom: 1px solid #f3f4f6;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-item:hover {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            transform: translateX(4px);
        }

        .dark-mode .notification-item {
            color: #e5e7eb;
            border-bottom-color: #4b5563;
        }

        .dark-mode .notification-item:hover {
            background: linear-gradient(135deg, #4b5563 0%, #6b7280 100%);
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #e5e7eb 0%, #d1d5db 100%);
            color: #6b7280;
            flex-shrink: 0;
        }

        .notification-content {
            flex: 1;
        }

        .notification-content p {
            margin: 0 0 4px 0;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.4;
        }

        .notification-time {
            font-size: 12px;
            color: #9ca3af;
        }

        /* Dropdown de Usuario */
        .user-dropdown {
            min-width: 280px;
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-card-avatar {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            object-fit: cover;
        }

        .user-card h6 {
            margin: 0 0 2px 0;
            font-size: 16px;
            font-weight: 600;
        }

        .user-card p {
            margin: 0;
            font-size: 13px;
            color: #6b7280;
        }

        .dark-mode .user-card p {
            color: #9ca3af;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 8px;
            color: #4b5563;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            color: #004d00;
            transform: translateX(4px);
            text-decoration: none;
        }

        .dark-mode .dropdown-item {
            color: #d1d5db;
        }

        .dark-mode .dropdown-item:hover {
            background: linear-gradient(135deg, #4b5563 0%, #6b7280 100%);
            color: #ffd700;
        }

        .dropdown-item i {
            width: 16px;
            text-align: center;
            font-size: 16px;
        }

        .logout-item:hover {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%) !important;
            color: #dc2626 !important;
        }

        .dark-mode .logout-item:hover {
            background: linear-gradient(135deg, #7f1d1d 0%, #991b1b 100%) !important;
            color: #fca5a5 !important;
        }

        .dropdown-divider {
            height: 1px;
            background: #e5e7eb;
            margin: 8px 0;
            border: none;
        }

        .dark-mode .dropdown-divider {
            background: #4b5563;
        }

        /* ===================================
           SIDEBAR MEJORADO CON FUNCIONALIDAD COLAPSAR
        =================================== */
        .sidebar {
            position: fixed;
            left: 0;
            top: 70px;
            width: 280px;
            height: calc(100vh - 70px);
            background: var(--primary-green);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 2px 0 4px rgba(0, 0, 0, 0.1);
            z-index: 1040;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            transform: translateX(0);
        }

        .dark-mode .sidebar {
            background: var(--primary-green);
            border-right-color: rgba(255, 255, 255, 0.1);
        }

        /* Estados del sidebar */
        .sidebar-collapsed .sidebar {
            width: 70px;
        }

        /* Transición suave para el hover en sidebar colapsado */
        .sidebar-collapsed.sidebar-hover .sidebar {
            width: 280px;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.2);
        }

        /* Control de visibilidad de elementos del sidebar */
        .sidebar-text {
            opacity: 1;
            transition: opacity 0.2s ease;
            white-space: nowrap;
        }

        .sidebar-collapsed .sidebar-text {
            opacity: 0;
            visibility: hidden;
        }

        .sidebar-collapsed.sidebar-hover .sidebar-text {
            opacity: 1;
            visibility: visible;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .dark-mode .sidebar-header {
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .sidebar-collapsed .sidebar-brand {
            justify-content: center;
        }

        .sidebar-collapsed.sidebar-hover .sidebar-brand {
            justify-content: flex-start;
        }

        .sidebar-logo {
            width: 40px;
            height: 40px;
            border-radius: 10px;
        }

        .sidebar-brand-text {
            transition: all 0.3s ease;
        }

        .sidebar-brand-text h5 {
            margin: 0 0 2px 0;
            font-size: 16px;
            font-weight: 700;
            color: white;
        }

        .sidebar-brand-text p {
            margin: 0;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        .sidebar-body {
            padding: 20px;
            height: calc(100% - 100px);
            overflow-y: auto;
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            margin-bottom: 24px;
            position: relative;
            transition: all 0.3s ease;
        }

        .sidebar-collapsed .sidebar-user {
            justify-content: center;
            padding: 12px;
        }

        .sidebar-collapsed.sidebar-hover .sidebar-user {
            justify-content: flex-start;
            padding: 16px;
        }

        .sidebar-user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .sidebar-collapsed .sidebar-user-avatar {
            width: 36px;
            height: 36px;
        }

        .sidebar-collapsed.sidebar-hover .sidebar-user-avatar {
            width: 48px;
            height: 48px;
        }

        .sidebar-user-info {
            transition: all 0.3s ease;
        }

        .sidebar-user-info h6 {
            margin: 0 0 2px 0;
            font-size: 14px;
            font-weight: 600;
            color: white;
        }

        .sidebar-user-info p {
            margin: 0;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.8);
        }

        .sidebar-user-status {
            position: absolute;
            top: 12px;
            right: 12px;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .status-dot.online {
            background: #10b981;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .nav-section-title {
            font-size: 11px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0 0 8px 0;
            padding: 0 16px;
            transition: all 0.3s ease;
        }

        .sidebar-collapsed .nav-section-title {
            opacity: 0;
            visibility: hidden;
        }

        .sidebar-collapsed.sidebar-hover .nav-section-title {
            opacity: 1;
            visibility: visible;
        }

        .nav-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 10px;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s ease;
            position: relative;
        }

        .sidebar-collapsed .sidebar .nav-link {
            justify-content: center;
            padding: 12px;
        }

        .sidebar-collapsed.sidebar-hover .sidebar .nav-link {
            justify-content: flex-start;
            padding: 12px 16px;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateX(4px);
            text-decoration: none;
        }

        .sidebar-collapsed .sidebar .nav-link:hover {
            transform: translateX(0) scale(1.05);
        }

        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .sidebar .nav-link.active:hover {
            background: rgba(255, 255, 255, 0.25);
            color: white;
            transform: translateX(4px);
        }

        .sidebar-collapsed .sidebar .nav-link.active:hover {
            transform: translateX(0) scale(1.05);
        }

        .sidebar .nav-icon {
            font-size: 18px;
            width: 20px;
            text-align: center;
            flex-shrink: 0;
            color: white;
        }

        .nav-text {
            flex: 1;
            transition: all 0.3s ease;
        }

        .nav-badge {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            padding: 2px 6px;
            border-radius: 8px;
            font-size: 10px;
            font-weight: 600;
            min-width: 16px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .nav-arrow {
            font-size: 12px;
            transition: transform 0.2s ease;
            color: white;
        }

        .has-submenu .nav-link.active .nav-arrow {
            transform: rotate(180deg);
        }

        .submenu {
            display: none;
            margin-top: 4px;
            margin-left: 32px;
        }

        .sidebar-collapsed .submenu {
            margin-left: 0;
        }

        .submenu-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            transition: all 0.2s ease;
        }

        .submenu-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            text-decoration: none;
        }

        /* ===================================
           MAIN CONTENT CON TRANSICIONES
        =================================== */
        .main-content {
            margin-left: 280px;
            margin-top: 70px;
            padding: 32px;
            min-height: calc(100vh - 70px);
            background-color: #f8fafc;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-collapsed .main-content {
            margin-left: 70px;
        }

        .dark-mode .main-content {
            background-color: #111827;
        }

        /* ===================================
           RESPONSIVE DESIGN MEJORADO
        =================================== */
        @media (max-width: 1200px) {
            .header-container {
                gap: 1rem;
                padding: 0 20px;
            }
            
            .brand-text {
                display: none;