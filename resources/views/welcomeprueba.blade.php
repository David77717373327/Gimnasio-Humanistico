<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIMNASIO HUMANÍSTICO</title>
    <!-- Google Fonts - Tipografía moderna -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap y Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
/* ============================================
   VARIABLES CSS MODERNAS - Gimnasio Humanístico 2024
============================================ */
:root {
    /* Paleta de colores modernizada y balanceada */
    --primary-green: #0d3f27;
    --primary-green-bottom: #065e35;
    --secondary-green: #7ddfac;
    --light-green: #4CAF50;
    --accent-gold: #F4B942;
    --dark-gold: #E6A835;
    --soft-gold: #FDF6E3;
    --dark-gold-fondo: #e7ba49;

    /* Colores neutros modernos */
    --white: #FFFFFF;
    --light-gray: #F8FAFB;
    --medium-gray: #E5E7EB;
    --dark-gray: #374151;
    --text-dark: #1F2937;
    --text-darkk: #333333;
    --text-light: #6B7280;
    --text-muted: #9CA3AF;


    /* Azul principal - confianza */
    --primary-blue: #1E3A5F;  
    /* Azul oscuro - elegancia */
    --dark-blue: #264653;  
    /* Azul profundo (similar al que mostraste) */
    --deep-blue: #003366;  
    /* Azul intermedio - contraste suave */
    --soft-blue: #07346e;  
    /* Azul grisáceo - texto y detalles */
    --slate-blue: #3A506B;  
    /* Complemento claro (fondos suaves) */
    --light-blue: #E0ECF7;  

    /* Nuevos colores para modernizar */
    --soft-blue: #EBF8FF;
    --accent-blue: #3B82F6;
    --success-green: #10B981;
    --warm-white: #FEFEFE;

    /* Sombras modernas y suaves */
    --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);

    /* Gradientes modernos */
    --gradient-primary: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
    --gradient-gold: linear-gradient(135deg, var(--accent-gold) 0%, var(--dark-gold) 100%);
    --gradient-overlay: linear-gradient(135deg, rgba(27, 94, 63, 0.9) 0%, rgba(27, 94, 63, 0.7) 100%);

    /* Espaciado moderno */
    --section-padding: 6rem 0;
    --container-padding: 0 1.5rem;

    /* Bordes redondeados */
    --border-radius-sm: 8px;
    --border-radius-md: 12px;
    --border-radius-lg: 16px;
    --border-radius-xl: 24px;
    --border-radius-full: 9999px;

    /* Transiciones */
    --transition-fast: 0.15s ease-out;
    --transition-normal: 0.3s ease-out;
    --transition-slow: 0.5s ease-out;
}

/* ============================================
   RESET Y CONFIGURACIÓN GENERAL MEJORADA
============================================ */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    line-height: 1.7;
    color: var(--text-dark);
    font-weight: 400;
    overflow-x: hidden;
    background-color: var(--warm-white);
    scroll-behavior: smooth;
}

/* Tipografía moderna */
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    line-height: 1.3;
    color: var(--text-dark);
}

/* ============================================
   HEADER INSTITUCIONAL CON ANIMACIONES
============================================ */
.logo-bar {
    background: var(--primary-green);
    padding: 20px 0;
    box-shadow:
        0 8px 32px rgba(17, 75, 47, 0.12),
        0 2px 16px rgba(0, 0, 0, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.05);
    position: relative;
    z-index: 999;
    overflow: hidden;
    
    /* ANIMACIÓN DE ENTRADA AÑADIDA */
    opacity: 0;
    transform: translateY(-30px);
    animation: slideInFromTop 0.8s ease-out 0.2s forwards;
}

.logo-bar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background:
        radial-gradient(circle at 20% 20%, rgba(255, 200, 87, 0.03) 0%, transparent 30%),
        radial-gradient(circle at 80% 80%, rgba(255, 200, 87, 0.03) 0%, transparent 30%);
    z-index: -1;
    opacity: 0.6;
}

.logo-bar-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(248, 249, 250, 0.02);
    backdrop-filter: blur(1px);
    z-index: -1;
}

/* Contenedor del header */
.institutional-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1800px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
}

/* Contenedor del logo */
.logo-container {
    position: relative;
    display: inline-block;
    flex-shrink: 0;
    
    /* ANIMACIÓN DE ENTRADA AÑADIDA */
    opacity: 0;
    transform: translateX(-30px) scale(0.8);
    animation: slideInFromLeft 0.8s ease-out 0.4s forwards;
}

/* Estilos del logo institucional */
.institutional-logo {
    margin-left: 20px;
    width: 140px;
    height: 140px;
    border-radius: 50%;
    border: 4px solid var(--accent-gold);
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    box-shadow:
        0 12px 40px rgba(17, 75, 47, 0.15),
        0 4px 12px rgba(0, 0, 0, 0.08),
        inset 0 2px 4px rgba(255, 255, 255, 0.8);
    transition: var(--transition-normal);
    filter: drop-shadow(0 0 20px rgba(17, 75, 47, 0.1));
    object-fit: cover;
}

/* Efecto glow para el logo */
.logo-glow {
    position: absolute;
    top: -8px;
    left: -8px;
    right: -8px;
    bottom: -8px;
    border-radius: 50%;
    background: conic-gradient(from 0deg,
            var(--primary-green),
            var(--accent-gold),
            var(--secondary-green),
            var(--accent-gold),
            var(--primary-green));
    opacity: 0;
    transition: opacity 0.4s ease;
    filter: blur(8px);
    z-index: -1;
}

.institutional-logo:hover {
    transform: scale(1.05) rotate(2deg);
    box-shadow:
        0 16px 50px rgba(17, 75, 47, 0.25),
        0 6px 16px rgba(0, 0, 0, 0.12),
        inset 0 2px 4px rgba(255, 255, 255, 0.9);
    border-color: var(--soft-gold);
    border-width: 5px;
}

.institutional-logo:hover+.logo-glow {
    opacity: 0.4;
}

/* Estilos para el título */
.institutional-title {
    flex: 1;
    text-align: center;
    padding: 0 1rem;
    
    /* ANIMACIÓN DE ENTRADA AÑADIDA */
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInUp 0.8s ease-out 0.6s forwards;
}

.college-main-title {
    font-family: 'Georgia', serif;
    color: var(--white);
    margin: 0;
    line-height: 1.2;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
}

.title-line-1 {
    display: block;
    font-size: clamp(1.5rem, 3vw, 2.5rem);
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: var(--white);
    text-transform: uppercase;
    letter-spacing: -0.02em;
}

.title-line-2 {
    display: block;
    font-size: clamp(2rem, 3.5vw, 2.5rem);
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--white);
    text-transform: uppercase;
    letter-spacing: -0.01em;
}

.title-line-3 {
    display: block;
    font-size: clamp(1.2rem, 2vw, 1.5rem);
    color: var(--accent-gold);
    font-weight: 500;
    letter-spacing: 0.05em;
    text-transform: capitalize;
}

/* ============================================
   NAVEGACIÓN PRINCIPAL CON ANIMACIONES
============================================ */
.main-navigation {
    background: var(--primary-green);
    position: sticky;
    top: 0;
    z-index: 998;
    transition: var(--transition-normal);
    box-shadow: var(--shadow-md);
    
    /* ANIMACIÓN DE ENTRADA AÑADIDA */
    opacity: 0;
    transform: translateY(-20px);
    animation: slideInFromTop 0.8s ease-out 0.8s forwards;
}

.main-navigation.scrolled {
    background: rgba(27, 94, 63, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: var(--shadow-lg);
}

.navbar {
    padding: 0;
}

.navbar-nav {
    gap: 0;
    width: 100%;
    justify-content: center;
}

.nav-item {
    position: relative;
    
    /* ANIMACIÓN DE ENTRADA AÑADIDA PARA CADA ITEM */
    opacity: 0;
    transform: translateY(-15px);
    animation: fadeInUp 0.6s ease-out calc(1s + var(--item-delay, 0)) forwards;
}

/* Delays escalonados para cada nav-item */
.nav-item:nth-child(1) { --item-delay: 0.1s; }
.nav-item:nth-child(2) { --item-delay: 0.2s; }
.nav-item:nth-child(3) { --item-delay: 0.3s; }
.nav-item:nth-child(4) { --item-delay: 0.4s; }
.nav-item:nth-child(5) { --item-delay: 0.5s; }
.nav-item:nth-child(6) { --item-delay: 0.6s; }
.nav-item:nth-child(7) { --item-delay: 0.7s; }
.nav-item:nth-child(8) { --item-delay: 0.8s; }

.nav-link {
    color: var(--white) !important;
    font-weight: 500;
    font-size: 0.8rem;
    padding: 1rem 1rem !important;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    transition: var(--transition-normal);
    border-radius: 0;
    position: relative;
    display: flex;
    align-items: center;
    gap: 0.4rem;
    font-family: 'Montserrat', sans-serif;
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background: var(--gradient-gold);
    transition: var(--transition-normal);
    transform: translateX(-50%);
}

.nav-link:hover,
.nav-link:focus {
    color: var(--accent-gold) !important;
    background: rgba(255, 255, 255, 0.05);
}

.nav-link:hover::after,
.nav-link.active::after {
    width: 80%;
}

.nav-link.active {
    color: var(--accent-gold) !important;
    background: rgba(255, 255, 255, 0.08);
}

.nav-link.login-btn {
    height: 40px;
    color: var(--white) !important;
    margin-top: 7px;
    margin-left: 1rem;
    border-radius: var(--border-radius-full);
    font-weight: 600;
    padding: 0.75rem 1.5rem !important;
    box-shadow: var(--shadow-sm);
}

.nav-link.login-btn::after {
    display: none;
}

.nav-link.login-btn:hover {
    background: var(--dark-gold);
    color: var(--white) !important;
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
}

.nav-link i {
    font-size: 0.7rem;
    opacity: 0.9;
}

/* ============================================
   DROPDOWNS COMPLETAMENTE MODERNOS
============================================ */
.dropdown-menu {
    border: none;
    box-shadow: var(--shadow-xl);
    border-radius: var(--border-radius-lg);
    padding: 1rem 0;
    margin-top: 0.5rem;
    min-width: 260px;
    background: var(--white);
    overflow: hidden;
    backdrop-filter: blur(10px);
    border: 1px solid var(--medium-gray);
}

.mega-dropdown {
    min-width: 680px;
    padding: 2rem;
    border-radius: var(--border-radius-xl);
}

.dropdown-header {
    color: var(--primary-green);
    font-weight: 700;
    font-size: 0.7rem;
    margin-bottom: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 0 1rem;
    position: relative;
}

.dropdown-header::after {
    content: '';
    position: absolute;
    bottom: -0.5rem;
    left: 1rem;
    width: 30px;
    height: 2px;
    background: var(--gradient-gold);
    border-radius: 1px;
}

.dropdown-item {
    padding: 0.75rem 1rem;
    border: none;
    border-radius: var(--border-radius-sm);
    transition: var(--transition-normal);
    color: var(--text-dark);
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-weight: 500;
    margin: 0 0.5rem;
    border-left: 3px solid transparent;
}

.dropdown-item:hover {
    background: var(--light-gray);
    color: var(--primary-green);
    border-left-color: var(--accent-gold);
    transform: translateX(3px);
}

.dropdown-item i {
    width: 14px;
    color: var(--accent-gold);
    font-size: 0.8rem;
}

/* ============================================
   HERO SECTION - IMAGEN PRINCIPAL OPTIMIZADA
============================================ */
.hero-banner {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
    display: flex;
    align-items: center;
}

.hero-image-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.hero-bg-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 30%;
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
    backface-visibility: hidden;
    transform: translateZ(0);
    filter:
        brightness(1.1) contrast(1.15) saturate(1.1) unsharp-mask(1px 1px 1px);
    transition: filter 0.3s ease-out;
    min-width: 100%;
    min-height: 100%;
}

/* Overlay mejorado para mejor legibilidad del texto */
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

/* Contenido del hero con mejor posicionamiento */
.hero-content {
    position: relative;
    z-index: 3;
    width: 100%;
    color: var(--white);
    padding: 2rem 0;
}

/* Contenido textual del hero */
.hero-text-content {
    padding-right: 2rem;
    animation: slideInFromLeft 0.8s ease-out;
}

.hero-badge {
    display: inline-block;
    background: rgba(0, 0, 0, 0.6);
    color: #ffffff;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 0.5rem 1rem;
    border-radius: var(--border-radius-full);
    border: 1px solid rgba(255, 255, 255, 0.3);
    margin-bottom: 1.5rem;
    font-family: 'Montserrat', sans-serif;
}

.hero-title {
    font-size: clamp(2.2rem, 4.5vw, 3.5rem);
    font-weight: 700;
    margin-bottom: 1.5rem;
    line-height: 1.1;
    letter-spacing: -0.02em;
    font-family: 'Montserrat', sans-serif;
    color: #ffffff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
}

.hero-title .highlight {
    color: #f39c12;
    background: none;
    -webkit-background-clip: unset;
    -webkit-text-fill-color: unset;
    background-clip: unset;
    position: relative;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
}

.hero-subtitle {
    font-size: clamp(1rem, 2vw, 1.2rem);
    color: #f2f2f2;
    margin-bottom: 2.5rem;
    font-weight: 400;
    line-height: 1.7;
    max-width: 500px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
}

/* Botones de acción modernos */
.hero-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    align-items: center;
}

.btn-primary-modern {
    background: #f39c12;
    color: #ffffff;
    border: none;
    padding: 1rem 2rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-radius: var(--border-radius-full);
    transition: var(--transition-normal);
    box-shadow: 0 4px 15px rgba(243, 156, 18, 0.3);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.85rem;
    font-family: 'Montserrat', sans-serif;
}

.btn-primary-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(243, 156, 18, 0.4);
    color: #ffffff;
    background: #e67e22;
}

.btn-secondary-modern {
    background: transparent;
    color: #ffffff;
    border: 2px solid rgba(255, 255, 255, 0.7);
    padding: 1rem 2rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-radius: var(--border-radius-full);
    transition: var(--transition-normal);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.85rem;
    font-family: 'Montserrat', sans-serif;
}

.btn-secondary-modern:hover {
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
    border-color: rgba(255, 255, 255, 0.9);
    transform: translateY(-2px);
}

/* ============================================
   ANIMACIONES AÑADIDAS
============================================ */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInFromLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }

    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInFromRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }

    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* NUEVAS ANIMACIONES PARA HEADER Y NAVEGACIÓN */
@keyframes slideInFromTop {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-in {
    animation: fadeInUp 0.6s ease-out;
}

.stats-panel {
    animation: slideInFromRight 0.8s ease-out 0.2s both;
}

/* ============================================
   NAVBAR TOGGLE ORIGINAL
============================================ */
.navbar-toggler {
    border: none;
    padding: 0.5rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: var(--border-radius-sm);
    transition: var(--transition-normal);
    
    /* ANIMACIÓN DE ENTRADA AÑADIDA */
    opacity: 0;
    transform: scale(0.8);
    animation: scaleIn 0.5s ease-out 1.2s forwards;
}

.navbar-toggler:focus {
    box-shadow: none;
}

.navbar-toggler:hover {
    background: var(--accent-gold);
}

.navbar-toggler-icon {
    display: flex;
    flex-direction: column;
    gap: 3px;
    width: 24px;
    height: 18px;
}

.navbar-toggler-icon span {
    width: 100%;
    height: 2px;
    background: var(--white);
    transition: var(--transition-normal);
    border-radius: 2px;
}

.navbar-toggler:hover .navbar-toggler-icon span {
    background: var(--text-dark);
}

/* Nueva animación para el botón toggle */
@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }

    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* ============================================
   RESPONSIVE DESIGN ORIGINAL
============================================ */
@media (max-width: 1200px) {
    .institutional-header {
        gap: 1.5rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
}

@media (max-width: 992px) {
    .logo-bar {
        padding: 1rem 0;
    }

    .institutional-header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }

    .contact-info {
        flex-direction: row;
        justify-content: center;
        gap: 2rem;
    }

    .hero-banner {
        min-height: 100vh;
    }

    .hero-text-content {
        padding-right: 0;
        text-align: center;
        margin-bottom: 3rem;
    }

    .stats-panel {
        margin-top: 2rem;
    }

    .mega-dropdown {
        min-width: 90vw;
        padding: 1.5rem;
    }
}

@media (max-width: 768px) {
    .hero-actions {
        flex-direction: column;
        width: 100%;
    }

    .btn-primary-modern,
    .btn-secondary-modern {
        width: 100%;
        justify-content: center;
        max-width: 300px;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .stat-item {
        padding: 1.5rem;
    }

    .nav-link {
        padding: 0.75rem 1rem !important;
        text-align: center;
    }

    .dropdown-menu {
        min-width: 100vw;
        left: 0 !important;
        transform: none !important;
        border-radius: 0;
        margin-top: 0;
    }

    .feature-card {
        padding: 2rem 1.5rem;
    }
}

@media (max-width: 480px) {
    .logo-bar {
        padding: 0.75rem 0;
    }

    .institutional-header {
        padding: 0 1rem;
    }

    .institutional-logo {
        width: 70px;
        height: 70px;
    }

    .contact-info {
        flex-direction: column;
        gap: 0.5rem;
    }

    .hero-banner {
        min-height: 90vh;
    }

    .stats-panel {
        padding: 1.5rem;
    }

    .stat-icon {
        width: 45px;
        height: 45px;
        font-size: 1rem;
    }

    .stat-number {
        font-size: 1.5rem;
    }

    .btn-primary-modern,
    .btn-secondary-modern {
        padding: 0.8rem 1.5rem;
        font-size: 0.8rem;
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
}

/* Responsividad */
@media (max-width: 768px) {
    .institutional-header {
        flex-direction: column;
        gap: 1rem;
        padding: 1rem;
    }

    .institutional-logo {
        width: 100px;
        height: 100px;
        border-width: 3px;
    }

    .title-line-1 {
        font-size: clamp(1.5rem, 5vw, 2rem);
    }

    .title-line-2 {
        font-size: clamp(1.2rem, 3.5vw, 1.5rem);
    }

    .title-line-3 {
        font-size: clamp(0.9rem, 2vw, 1rem);
    }
}

/* Información de contacto */
.contact-info {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    font-size: 0.75rem;
    color: var(--text-light);
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 500;
}

.contact-item i {
    color: var(--accent-gold);
    width: 12px;
}

/* ============================================
   UTILIDADES ORIGINALES
============================================ */
.text-gradient {
    background: var(--gradient-gold);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.bg-pattern {
    background-image:
        radial-gradient(circle at 1px 1px, rgba(27, 94, 63, 0.15) 1px, transparent 0);
    background-size: 20px 20px;
}

.blur-backdrop {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

/* ============================================
   MEJORAS DE ACCESIBILIDAD ORIGINALES
============================================ */
@media (prefers-reduced-motion: reduce) {

    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}
    </style>
</head>

<body>
    <!-- Header Institucional Mejorado -->
    <div class="logo-bar">
        <div class="container-fluid">
            <div class="institutional-header">
                <!-- Solo un logo a la izquierda -->
                <div class="logo-container">
                    <img src="https://via.placeholder.com/140x140/0d3f27/F4B942?text=LOGO" alt="Logo Colegio Gimnasio Humanístico"
                        class="institutional-logo">
                </div>

                <!-- Título modernizado -->
                <div class="institutional-title">
                    <h1 class="college-main-title">
                        <span class="title-line-1">COLEGIO GIMNASIO HUMANÍSTICO</span>
                        <span class="title-line-2">DEL ALTO MAGDALENA</span>
                        <span class="title-line-3">Neiva, Huila</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Navegación Principal Mejorada -->
    <nav class="main-navigation navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#inicio">
                            <i class="fas fa-home"></i>
                            INICIO
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-users"></i>
                            QUIÉNES SOMOS
                        </a>
                        <div class="dropdown-menu mega-dropdown">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="dropdown-header">Institución</h6>
                                        <a class="dropdown-item" href="#historia">
                                            <i class="fas fa-history"></i>
                                            Nuestra Historia
                                        </a>
                                        <a class="dropdown-item" href="#mision">
                                            <i class="fas fa-eye"></i>
                                            Misión y Visión
                                        </a>
                                        <a class="dropdown-item" href="#valores">
                                            <i class="fas fa-heart"></i>
                                            Valores Institucionales
                                        </a>
                                        <a class="dropdown-item" href="#filosofia">
                                            <i class="fas fa-lightbulb"></i>
                                            Filosofía Educativa
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="dropdown-header">Organización</h6>
                                        <a class="dropdown-item" href="#directorio">
                                            <i class="fas fa-users-cog"></i>
                                            Directorio
                                        </a>
                                        <a class="dropdown-item" href="#plana-docente">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                            Plana Docente
                                        </a>
                                        <a class="dropdown-item" href="#organigrama">
                                            <i class="fas fa-sitemap"></i>
                                            Organigrama
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="dropdown-header">Reconocimientos</h6>
                                        <a class="dropdown-item" href="#premios">
                                            <i class="fas fa-trophy"></i>
                                            Premios y Logros
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-graduation-cap"></i>
                            PROPUESTA EDUCATIVA
                        </a>
                        <div class="dropdown-menu mega-dropdown">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="dropdown-header">Metodología</h6>
                                        <a class="dropdown-item" href="#enfoque-pedagogico">
                                            <i class="fas fa-brain"></i>
                                            Enfoque Pedagógico
                                        </a>
                                        <a class="dropdown-item" href="#tecnologia">
                                            <i class="fas fa-laptop-code"></i>
                                            Tecnología Educativa
                                        </a>
                                        <a class="dropdown-item" href="#bilinguismo">
                                            <i class="fas fa-globe"></i>
                                            Educación Bilingüe
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="dropdown-header">Formación Integral</h6>
                                        <a class="dropdown-item" href="#valores-cristianos">
                                            <i class="fas fa-cross"></i>
                                            Valores Cristianos
                                        </a>
                                        <a class="dropdown-item" href="#liderazgo">
                                            <i class="fas fa-crown"></i>
                                            Formación en Liderazgo
                                        </a>
                                        <a class="dropdown-item" href="#artes">
                                            <i class="fas fa-palette"></i>
                                            Artes y Cultura
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-school"></i>
                            NIVELES
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#prescolar">
                                <i class="fas fa-child"></i>
                                Educación Prescolar
                            </a>
                            <a class="dropdown-item" href="#primaria">
                                <i class="fas fa-book"></i>
                                Educación Básica Primaria
                            </a>
                            <a class="dropdown-item" href="#secundaria">
                                <i class="fas fa-users"></i>
                                Educación Básica Secundaria
                            </a>
                            <a class="dropdown-item" href="#media">
                                <i class="fas fa-graduation-cap"></i>
                                Educación Media Académica
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-door-open"></i>
                            ADMISIÓN
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#proceso">
                                <i class="fas fa-info-circle"></i>
                                Proceso de Admisión
                            </a>
                            <a class="dropdown-item" href="#cronograma">
                                <i class="fas fa-calendar-alt"></i>
                                Cronograma 2025
                            </a>
                            <a class="dropdown-item" href="#requisitos">
                                <i class="fas fa-file-alt"></i>
                                Requisitos
                            </a>
                            <a class="dropdown-item" href="#costos">
                                <i class="fas fa-dollar-sign"></i>
                                Costos y Pensiones
                            </a>
                            <a class="dropdown-item" href="#becas">
                                <i class="fas fa-hand-holding-usd"></i>
                                Becas y Descuentos
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-smile"></i>
                            VIDA ESTUDIANTIL
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#actividades">
                                <i class="fas fa-calendar-check"></i>
                                Actividades Extracurriculares
                            </a>
                            <a class="dropdown-item" href="#eventos">
                                <i class="fas fa-calendar-star"></i>
                                Eventos y Celebraciones
                            </a>
                            <a class="dropdown-item" href="#cafeteria">
                                <i class="fas fa-utensils"></i>
                                Servicio de Alimentación
                            </a>
                            <a class="dropdown-item" href="#transporte">
                                <i class="fas fa-bus"></i>
                                Transporte Escolar
                            </a>
                            <a class="dropdown-item" href="#pastoral">
                                <i class="fas fa-praying-hands"></i>
                                Pastoral Estudiantil
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">
                            <i class="fas fa-envelope"></i>
                            CONTACTO
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link login-btn" href="#login">
                            <i class="fas fa-sign-in-alt"></i>
                            ACCEDER
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section Completamente Rediseñado -->
    <section class="hero-banner" id="inicio">
        <!-- Fondo con gradiente mejorado -->
        <div class="hero-background">
            <!-- Imagen de fondo más inspiradora -->
            <div class="hero-image-container">
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Estudiantes exitosos del Colegio"
                    class="hero-bg-image">
            </div>
            <div class="hero-overlay"></div>
        </div>

        <div class="hero-content">
            <div class="container">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-6">
                        <!-- Contenido principal del hero -->
                        <div class="hero-text-content">
                            <span class="hero-badge">25 años de excelencia educativa</span>
                            <h1 class="hero-title">
                                Formando
                                <span class="highlight">Líderes</span>
                                del Mañana
                            </h1>
                            <p class="hero-subtitle">
                                Educación integral con valores cristianos, tecnología de vanguardia y metodologías
                                innovadoras que preparan a nuestros estudiantes para un futuro exitoso.
                            </p>

                            <!-- Botones de acción modernos -->
                            <div class="hero-actions">
                                <a href="#admision" class="btn-primary-modern">
                                    <i class="fas fa-rocket"></i>
                                    Solicitar Admisión
                                </a>
                                <a href="#virtual-tour" class="btn-secondary-modern">
                                    <i class="fas fa-play"></i>
                                    Tour Virtual
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>