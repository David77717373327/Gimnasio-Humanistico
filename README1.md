/* ============================================
   HEADER INSTITUCIONAL - SIN MODIFICACIONES
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
    border-bottom: 1px solid var(--medium-gray);
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
}

/* Estilos del logo institucional */
.institutional-logo {
    margin-left: 20px;
    width: 140px;
    height: 140px;
    border-radius: 50%;
    border: 4px solid var(--accent-gold);
    background: var(--primary-green);
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
   NAVEGACIÓN PRINCIPAL - MODIFICADO SEGÚN REQUISITOS
============================================ */
.main-navigation {
    background: var(--primary-green);
    position: sticky;
    top: 0;
    z-index: 998;
    transition: var(--transition-normal);
    box-shadow: 
        0 4px 20px rgba(17, 75, 47, 0.15),
        0 1px 3px rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}

/* Estado al hacer scroll */
.main-navigation.scrolled {
    background: rgba(27, 94, 63, 0.95);
    backdrop-filter: blur(15px);
    box-shadow: 
        0 8px 32px rgba(17, 75, 47, 0.25),
        0 2px 8px rgba(0, 0, 0, 0.15);
}

.navbar {
    padding: 0;
}

.navbar-nav {
    gap: 0;
    width: 100%;
    justify-content: center;
    align-items: center;
}

.nav-item {
    position: relative;
}

/* MODIFICADO: Sin íconos, hover limpio con línea blanca inferior gruesa */
.nav-link {
    color: #ffffff !important;
    font-weight: 500;
    font-size: 0.875rem;
    padding: 1.25rem 1.5rem !important;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    font-family: 'Montserrat', sans-serif;
    background: transparent;
    cursor: pointer;
}

/* MODIFICADO: Línea inferior BLANCA gruesa que cubre toda la navegación */
.nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 4px;
    background: #ffffff;
    transition: all 0.3s ease;
}

/* MODIFICADO: Hover con gris sutil solo en el texto */
.nav-link:hover {
    color: #e5e7eb !important;
    background: transparent;
}

/* Solo muestra la línea en hover (no en active para INICIO) */
.nav-link:hover::after {
    width: 100%;
}

/* MODIFICADO: Active sin línea permanente */
.nav-link.active {
    color: #ffffff !important;
    font-weight: 600;
    background: transparent;
}

/* NO mostrar línea en el elemento active a menos que tenga hover */
.nav-link.active::after {
    width: 0;
}

.nav-link.active:hover::after {
    width: 100%;
}

/* Botón de login mantiene su estilo */
.nav-link.login-btn {
    color: #ffffff !important;
    margin-left: 1rem;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 4px;
    font-weight: 600;
    padding: 0.75rem 1.5rem !important;
    background: rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.nav-link.login-btn::after {
    display: none;
}

.nav-link.login-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff !important;
    border-color: rgba(255, 255, 255, 0.5);
}

/* ============================================
   DROPDOWNS - MODIFICADO CON FUNCIONALIDAD CORRECTA
============================================ */

/* MODIFICADO: Dropdown se despliega con hover automáticamente */
.nav-item.dropdown:hover > .dropdown-menu {
    display: flex;
    opacity: 1;
    visibility: visible;
}

.dropdown-menu {
    display: none;
    opacity: 0;
    visibility: hidden;
    border: none;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    border-radius: 0;
    padding: 0;
    margin-top: 0;
    background: #ffffff;
    position: absolute;
    top: 100%;
    left: 0;
    transition: all 0.3s ease;
    min-width: 600px;
    gap: 0;
    z-index: 1000;
}

/* MODIFICADO: Dropdown de una sola columna */
.dropdown-menu.single-column {
    min-width: 280px;
    flex-direction: column;
}

/* MODIFICADO: Secciones del dropdown con espaciado reducido */
.dropdown-section {
    flex: 1;
    padding: 1.25rem 1.5rem;
    border-right: 1px solid #e5e7eb;
}

.dropdown-section:last-child {
    border-right: none;
}

.dropdown-header {
    color: #000000;
    font-weight: 700;
    font-size: 0.75rem;
    margin-bottom: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 0;
}

/* MODIFICADO: Items sin íconos, espaciado reducido y hover con gris */
.dropdown-item {
    padding: 0.5rem 0;
    border: none;
    border-radius: 0;
    transition: all 0.2s ease;
    color: #4b5563;
    font-size: 0.875rem;
    font-weight: 400;
    margin: 0;
    background: transparent;
    position: relative;
    display: block;
    cursor: pointer;
}

/* MODIFICADO: Hover con fondo gris sutil */
.dropdown-item:hover {
    background: #f3f4f6;
    color: #000000;
    padding-left: 0.5rem;
}

/* ============================================
   ANIMACIONES ORIGINALES
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

.animate-in {
    animation: fadeInUp 0.6s ease-out;
}

.hero-text-content {
    animation: slideInFromLeft 0.8s ease-out;
}

.stats-panel {
    animation: slideInFromRight 0.8s ease-out 0.2s both;
}

/* ============================================
   NAVBAR TOGGLE
============================================ */
.navbar-toggler {
    border: none;
    padding: 0.5rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    transition: var(--transition-normal);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.navbar-toggler:focus {
    box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.3);
}

.navbar-toggler:hover {
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.3);
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
    background: #ffffff;
    transition: var(--transition-normal);
    border-radius: 2px;
}

.navbar-toggler:hover .navbar-toggler-icon span {
    background: #ffffff;
}

/* ============================================
   RESTO DEL CSS ORIGINAL SIN MODIFICACIONES
============================================ */
.features-section {
    padding: var(--section-padding);
    background: var(--light-gray);
    position: relative;
}

.section-title {
    font-size: clamp(2rem, 4vw, 2.5rem);
    font-weight: 700;
    color: var(--primary-green);
    margin-bottom: 1rem;
    text-align: center;
    font-family: 'Montserrat', sans-serif;
}

.section-subtitle {
    font-size: 1.1rem;
    color: var(--text-light);
    text-align: center;
    max-width: 600px;
    margin: 0 auto 3rem;
    line-height: 1.6;
}

.feature-card {
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: var(--border-radius-xl);
    text-align: center;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--medium-gray);
    transition: var(--transition-normal);
    height: 100%;
    position: relative;
    overflow: hidden;
}

.feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: var(--gradient-gold);
}

.feature-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
    border-color: var(--accent-gold);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: var(--gradient-primary);
    border-radius: var(--border-radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.8rem;
    color: var(--white);
    box-shadow: var(--shadow-md);
    transition: var(--transition-normal);
}

.feature-card:hover .feature-icon {
    background: var(--gradient-gold);
    color: var(--text-dark);
    transform: scale(1.05);
}

.feature-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1rem;
    line-height: 1.3;
    font-family: 'Montserrat', sans-serif;
}

.feature-text {
    color: var(--text-light);
    line-height: 1.7;
    font-size: 0.95rem;
}

/* ============================================
   RESPONSIVE DESIGN
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

    .institutional-logo {
        margin-left: 0;
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

    .navbar-collapse {
        background: var(--primary-green);
        padding: 1rem 0;
        margin-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nav-link {
        text-align: center;
        padding: 1rem !important;
    }

    .nav-link::after {
        display: none;
    }

    .dropdown-menu {
        position: static;
        transform: none !important;
        min-width: 100%;
        flex-direction: column;
        box-shadow: none;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: 0.5rem;
    }

    .dropdown-section {
        border-right: none;
        border-bottom: 1px solid #e5e7eb;
        padding: 1rem;
    }

    .dropdown-section:last-child {
        border-bottom: none;
    }

    .nav-link.login-btn {
        margin: 1rem auto 0;
        display: inline-block;
        max-width: 200px;
    }
}

@media (max-width: 768px) {
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

    .feature-card {
        padding: 2rem 1.5rem;
    }

    .dropdown-item {
        padding: 0.75rem 0;
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

    .nav-link {
        font-size: 0.8rem;
        padding: 0.875rem !important;
    }
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