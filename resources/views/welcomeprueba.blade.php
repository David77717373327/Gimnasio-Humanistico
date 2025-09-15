<!-- Sección 3: Niveles Educativos -->
<section class="educational-levels-section" id="niveles-educativos">
    <div class="container">
        <div class="section-header text-center mb-5">
            <div class="section-badge">Oferta Académica</div>
            <h2 class="section-title">Niveles Educativos</h2>
            <p class="section-subtitle">Acompañamos a nuestros estudiantes en cada etapa de su formación con programas diseñados para su desarrollo integral</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="level-card">
                    <div class="level-image-container">
                        <img src="{{ asset('images/Niveles/Imagen1.jpeg') }}" alt="Educación Preescolar" class="level-image">
                        <div class="level-overlay">
                            <div class="level-badge">3-5 años</div>
                        </div>
                    </div>
                    <div class="level-content">
                        <div class="level-icon">
                            <i class="fas fa-child"></i>
                        </div>
                        <h4 class="level-title">Preescolar</h4>
                        <p class="level-description">Desarrollo integral a través del juego, la exploración y el descubrimiento en un ambiente seguro y estimulante.</p>
                        <a href="#preescolar-detalle" class="level-link">
                            <span>Ver más</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="level-card">
                    <div class="level-image-container">
                        <img src="{{ asset('images/primaria.jpg') }}" alt="Educación Primaria" class="level-image">
                        <div class="level-overlay">
                            <div class="level-badge">6-10 años</div>
                        </div>
                    </div>
                    <div class="level-content">
                        <div class="level-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h4 class="level-title">Básica Primaria</h4>
                        <p class="level-description">Fortalecimiento de competencias básicas con metodologías activas que fomentan el pensamiento crítico y creativo.</p>
                        <a href="#primaria-detalle" class="level-link">
                            <span>Ver más</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="level-card">
                    <div class="level-image-container">
                        <img src="{{ asset('images/secundaria.jpg') }}" alt="Educación Secundaria" class="level-image">
                        <div class="level-overlay">
                            <div class="level-badge">11-14 años</div>
                        </div>
                    </div>
                    <div class="level-content">
                        <div class="level-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="level-title">Básica Secundaria</h4>
                        <p class="level-description">Profundización académica y desarrollo de habilidades sociales con enfoque en liderazgo y emprendimiento.</p>
                        <a href="#secundaria-detalle" class="level-link">
                            <span>Ver más</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="level-card">
                    <div class="level-image-container">
                        <img src="{{ asset('images/media.jpg') }}" alt="Educación Media" class="level-image">
                        <div class="level-overlay">
                            <div class="level-badge">15-17 años</div>
                        </div>
                    </div>
                    <div class="level-content">
                        <div class="level-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4 class="level-title">Media Académica</h4>
                        <p class="level-description">Preparación universitaria integral con énfasis en excelencia académica y formación para la vida profesional.</p>
                        
                        <a href="#media-detalle" class="level-link">
                            <span>Ver más</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ============================================
   SECCIÓN DE BIENVENIDA / MENSAJE INSTITUCIONAL
============================================ */
.welcome-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #fafbfc 0%, #f1f3f4 100%);
    position: relative;
    overflow: hidden;
}

.welcome-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 80% 20%, rgba(13, 63, 39, 0.03) 0%, transparent 40%),
        radial-gradient(circle at 20% 80%, rgba(244, 185, 66, 0.03) 0%, transparent 40%);
    pointer-events: none;
}

.welcome-badge {
    display: inline-block;
    background: rgba(13, 63, 39, 0.08);
    color: var(--primary-green);
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 0.6rem 1.5rem;
    border-radius: var(--border-radius-full);
    border: 1px solid rgba(13, 63, 39, 0.2);
    margin-bottom: 1.5rem;
    font-family: 'Montserrat', sans-serif;
    position: relative;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease-out 0.2s forwards;
}

.welcome-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 700;
    color: var(--primary-green);
    margin-bottom: 1.5rem;
    line-height: 1.2;
    font-family: 'Montserrat', sans-serif;
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.8s ease-out 0.4s forwards;
}

.welcome-subtitle {
    font-size: 1.2rem;
    color: var(--text-light);
    line-height: 1.7;
    max-width: 700px;
    margin: 0 auto 2rem;
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.8s ease-out 0.6s forwards;
}

/* Imagen principal con overlay */
.facilities-image-container {
    position: relative;
    border-radius: var(--border-radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    transform: translateY(0);
    transition: var(--transition-normal);
    opacity: 0;
    animation: slideInFromLeft 1s ease-out 0.8s forwards;
}

.facilities-image-container:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.facilities-main-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    transition: var(--transition-slow);
}

.facilities-image-container:hover .facilities-main-image {
    transform: scale(1.05);
}

.facilities-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(13, 63, 39, 0.3) 0%, rgba(13, 63, 39, 0.1) 100%);
    display: flex;
    align-items: flex-end;
    padding: 2rem;
}

.facilities-badge {
    background: rgba(255, 255, 255, 0.95);
    color: var(--primary-green);
    padding: 1rem 1.5rem;
    border-radius: var(--border-radius-md);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-weight: 600;
    font-size: 1rem;
    box-shadow: var(--shadow-md);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.facilities-badge i {
    font-size: 1.2rem;
    color: var(--accent-gold);
}

/* Contenido de instalaciones */
.facilities-content {
    opacity: 0;
    transform: translateX(30px);
    animation: slideInFromRight 1s ease-out 1s forwards;
}

.facilities-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-green);
    margin-bottom: 1.5rem;
    font-family: 'Montserrat', sans-serif;
}

.facilities-description {
    font-size: 1.1rem;
    color: var(--text-light);
    line-height: 1.7;
    margin-bottom: 2rem;
}

.facilities-features {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.75rem 0;
    font-weight: 500;
    color: var(--text-dark);
    border-left: 3px solid var(--accent-gold);
    padding-left: 1rem;
    background: rgba(244, 185, 66, 0.05);
    border-radius: 0 8px 8px 0;
    transition: var(--transition-normal);
}

.feature-item:hover {
    background: rgba(244, 185, 66, 0.1);
    transform: translateX(5px);
}

.feature-item i {
    font-size: 1.2rem;
}

/* Galería de instalaciones */
.facilities-gallery {
    margin-top: 4rem;
    opacity: 0;
    transform: translateY(40px);
    animation: fadeInUp 1s ease-out 1.2s forwards;
}

.gallery-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-green);
    margin-bottom: 0.5rem;
    font-family: 'Montserrat', sans-serif;
}

.gallery-subtitle {
    color: var(--text-light);
    font-size: 1rem;
}

.gallery-item {
    position: relative;
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition-normal);
    height: 250px;
}

.gallery-item:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition-slow);
}

.gallery-item:hover .gallery-image {
    transform: scale(1.1);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, transparent 0%, rgba(13, 63, 39, 0.8) 100%);
    display: flex;
    align-items: flex-end;
    padding: 1.5rem;
    opacity: 0;
    transition: var(--transition-normal);
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-content h4 {
    color: var(--white);
    font-weight: 600;
    margin-bottom: 0.25rem;
    font-size: 1.1rem;
}

.gallery-content p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9rem;
    margin: 0;
}

/* ============================================
   SECCIÓN QUIÉNES SOMOS
============================================ */
.about-us-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    position: relative;
}

.section-badge {
    display: inline-block;
    background: rgba(244, 185, 66, 0.1);
    color: var(--accent-gold);
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 0.6rem 1.5rem;
    border-radius: var(--border-radius-full);
    border: 1px solid rgba(244, 185, 66, 0.3);
    margin-bottom: 1.5rem;
    font-family: 'Montserrat', sans-serif;
}

.section-title {
    font-size: clamp(2rem, 4vw, 2.8rem);
    font-weight: 700;
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
}

.section-subtitle {
    font-size: 1.1rem;
    color: var(--text-light);
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
}

.about-card {
    background: var(--white);
    padding: 2rem 1.5rem;
    border-radius: var(--border-radius-lg);
    text-align: center;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--medium-gray);
    transition: var(--transition-normal);
    height: 100%;
    position: relative;
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.8s ease-out forwards;
}

.about-card:nth-child(1) { animation-delay: 0.2s; }
.about-card:nth-child(2) { animation-delay: 0.4s; }
.about-card:nth-child(3) { animation-delay: 0.6s; }
.about-card:nth-child(4) { animation-delay: 0.8s; }

.about-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: var(--gradient-gold);
    border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0;
}

.about-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
}

.about-icon {
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

.about-card:hover .about-icon {
    background: var(--gradient-gold);
    color: var(--text-dark);
    transform: scale(1.05);
}

.about-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
}

.about-text {
    color: var(--text-light);
    line-height: 1.6;
    font-size: 0.95rem;
}

.btn-modern-outline {
    background: transparent;
    color: var(--primary-green);
    border: 2px solid var(--primary-green);
    padding: 1rem 2.5rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-radius: var(--border-radius-full);
    transition: var(--transition-normal);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.9rem;
    font-family: 'Montserrat', sans-serif;
    position: relative;
    overflow: hidden;
}

.btn-modern-outline::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: var(--primary-green);
    transition: left 0.3s ease;
    z-index: -1;
}

.btn-modern-outline:hover {
    color: var(--white);
    border-color: var(--primary-green);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-modern-outline:hover::before {
    left: 0;
}

/* ============================================
   SECCIÓN NIVELES EDUCATIVOS
============================================ */
.educational-levels-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #f1f3f4 0%, #e8eaf6 100%);
    position: relative;
}

.educational-levels-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 20% 30%, rgba(13, 63, 39, 0.02) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(244, 185, 66, 0.02) 0%, transparent 50%);
    pointer-events: none;
}

.level-card {
    background: var(--white);
    border-radius: var(--border-radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--medium-gray);
    transition: var(--transition-normal);
    height: 100%;
    opacity: 0;
    transform: translateY(40px);
    animation: fadeInUp 0.8s ease-out forwards;
}

.level-card:nth-child(1) { animation-delay: 0.2s; }
.level-card:nth-child(2) { animation-delay: 0.4s; }
.level-card:nth-child(3) { animation-delay: 0.6s; }
.level-card:nth-child(4) { animation-delay: 0.8s; }

.level-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
}

.level-image-container {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.level-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition-slow);
}

.level-card:hover .level-image {
    transform: scale(1.1);
}

.level-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(13, 63, 39, 0.2) 0%, rgba(13, 63, 39, 0.4) 100%);
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
    padding: 1rem;
}

.level-badge {
    background: rgba(255, 255, 255, 0.95);
    color: var(--primary-green);
    padding: 0.5rem 1rem;
    border-radius: var(--border-radius-full);
    font-weight: 600;
    font-size: 0.8rem;
    box-shadow: var(--shadow-sm);
    backdrop-filter: blur(10px);
}

.level-content {
    padding: 2rem 1.5rem;
    text-align: center;
}

.level-icon {
    width: 60px;
    height: 60px;
    background: var(--gradient-gold);
    border-radius: var(--border-radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.5rem;
    color: var(--text-dark);
    box-shadow: var(--shadow-md);
    transition: var(--transition-normal);
}

.level-card:hover .level-icon {
    background: var(--gradient-primary);
    color: var(--white);
    transform: scale(1.05);
}

.level-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
}

.level-description {
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
}



.level-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary-green);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    padding: 0.75rem 1.5rem;
    border: 2px solid var(--primary-green);
    border-radius: var(--border-radius-full);
    transition: var(--transition-normal);
    background: transparent;
    position: relative;
    overflow: hidden;
}

.level-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: var(--primary-green);
    transition: left 0.3s ease;
    z-index: -1;
}

.level-link:hover {
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

.level-link:hover::before {
    left: 0;
}

/* ============================================
   ANIMACIONES SCROLL
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
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInFromRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* ============================================
   RESPONSIVE DESIGN
============================================ */
@media (max-width: 992px) {
    .welcome-section, .about-us-section, .educational-levels-section {
        padding: 4rem 0;
    }
    
    .facilities-main-image {
        height: 300px;
    }
    
    .facilities-content {
        margin-top: 2rem;
        text-align: center;
    }
    
    .gallery-item {
        height: 220px;
    }
    
    .about-card {
        margin-bottom: 2rem;
    }
    
    .level-image-container {
        height: 180px;
    }
    
    .level-content {
        padding: 1.5rem 1rem;
    }
}

@media (max-width: 768px) {
    .welcome-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .facilities-features {
        margin-top: 2rem;
    }
    
    .feature-item {
        text-align: center;
        justify-content: center;
    }
    
    .gallery-item {
        height: 200px;
        margin-bottom: 1rem;
    }
    
    .about-card {
        padding: 1.5rem 1rem;
    }
    
    .level-card {
        margin-bottom: 2rem;
    }
    
    .btn-modern-outline,
    .level-link {
        width: 100%;
        max-width: 280px;
        justify-content: center;
        margin: 0 auto;
        display: flex;
    }
}

@media (max-width: 480px) {
    .welcome-section, .about-us-section, .educational-levels-section {
        padding: 3rem 0;
    }
    
    .facilities-main-image {
        height: 250px;
    }
    
    .facilities-badge {
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
    }
    
    .gallery-item {
        height: 180px;
    }
    
    .about-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .level-icon {
        width: 50px;
        height: 50px;
        font-size: 1.3rem;
    }
    
    .level-image-container {
        height: 160px;
    }
    
    .welcome-badge, .section-badge {
        padding: 0.5rem 1rem;
        font-size: 0.7rem;
    }
}

/* ============================================
   SCROLL ANIMATIONS CON INTERSECTION OBSERVER
============================================ */
.fade-in-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease-out;
}

.fade-in-on-scroll.visible {
    opacity: 1;
    transform: translateY(0);
}

.slide-in-left {
    opacity: 0;
    transform: translateX(-50px);
    transition: all 0.8s ease-out;
}

.slide-in-left.visible {
    opacity: 1;
    transform: translateX(0);
}

.slide-in-right {
    opacity: 0;
    transform: translateX(50px);
    transition: all 0.8s ease-out;
}

.slide-in-right.visible {
    opacity: 1;
    transform: translateX(0);
}

.scale-in {
    opacity: 0;
    transform: scale(0.9);
    transition: all 0.6s ease-out;
}

.scale-in.visible {
    opacity: 1;
    transform: scale(1);
}

/* ============================================
   EFECTOS HOVER ADICIONALES
============================================ */
.facilities-features .feature-item:hover i {
    transform: scale(1.1);
    color: var(--accent-gold);
}

.about-card:hover .about-title {
    color: var(--accent-gold);
}

.level-features li:hover {
    color: var(--primary-green);
    transform: translateX(5px);
}

.level-features li:hover::before {
    color: var(--accent-gold);
    transform: scale(1.2);
}

/* ============================================
   LOADING ANIMATIONS
============================================ */
.loading-shimmer {
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

</style>









































<!-- ============================================
     SECCIÓN DE BIENVENIDA INSTITUCIONAL
     Insertar este código DESPUÉS de la hero section (después del </section> de .hero-banner)
============================================ -->

<!-- Sección de Bienvenida -->
<section class="welcome-section" id="bienvenida">
    <div class="container">
        <!-- Mensaje de Bienvenida Principal -->
        <div class="welcome-header text-center mb-5">
            <div class="welcome-badge" data-aos="fade-up">
                <i class="fas fa-graduation-cap"></i>
                <span>Excelencia Educativa Desde 1999</span>
            </div>
            <h2 class="welcome-title" data-aos="fade-up" data-aos-delay="200">
                Bienvenidos al <span class="highlight-text">Colegio Gimnasio Humanístico</span>
            </h2>
            <p class="welcome-subtitle" data-aos="fade-up" data-aos-delay="400">
                Formamos líderes íntegros con valores cristianos, excelencia académica y visión global. 
                Nuestro compromiso es brindar una educación de calidad que transforme vidas y construya futuro.
            </p>
        </div>

        <!-- Contenido Principal con Grid Moderno -->
        <div class="row align-items-center mb-5">
            <!-- Columna de Texto e Información -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="welcome-content" data-aos="fade-right">
                    <div class="welcome-stats-mini">
                        <div class="stat-mini-item">
                            <div class="stat-mini-icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="stat-mini-content">
                                <span class="stat-mini-number">25+</span>
                                <span class="stat-mini-label">Años de Experiencia</span>
                            </div>
                        </div>
                        <div class="stat-mini-item">
                            <div class="stat-mini-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-mini-content">
                                <span class="stat-mini-number">800+</span>
                                <span class="stat-mini-label">Estudiantes</span>
                            </div>
                        </div>
                        <div class="stat-mini-item">
                            <div class="stat-mini-icon">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div class="stat-mini-content">
                                <span class="stat-mini-number">95%</span>
                                <span class="stat-mini-label">Éxito Universitario</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="welcome-features">
                        <div class="feature-point" data-aos="fade-up" data-aos-delay="100">
                            <div class="feature-point-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span>Metodología innovadora basada en competencias</span>
                        </div>
                        <div class="feature-point" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-point-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span>Formación bilingüe certificada</span>
                        </div>
                        <div class="feature-point" data-aos="fade-up" data-aos-delay="300">
                            <div class="feature-point-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span>Tecnología educativa de vanguardia</span>
                        </div>
                        <div class="feature-point" data-aos="fade-up" data-aos-delay="400">
                            <div class="feature-point-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span>Valores cristianos y formación integral</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna de Imagen Principal -->
            <div class="col-lg-6">
                <div class="welcome-image-container" data-aos="fade-left">
                    <div class="main-image-wrapper">
                        <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Instalaciones del Colegio Gimnasio Humanístico" class="welcome-main-image">
                        <div class="image-overlay-content">
                            <div class="overlay-badge">
                                <i class="fas fa-building"></i>
                                <span>Instalaciones Modernas</span>
                            </div>
                        </div>
                        <!-- Elementos decorativos flotantes -->
                        <div class="floating-element element-1">
                            <i class="fas fa-atom"></i>
                        </div>
                        <div class="floating-element element-2">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <div class="floating-element element-3">
                            <i class="fas fa-laptop"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Galería de Instalaciones -->
        <div class="facilities-gallery" data-aos="fade-up">
            <div class="gallery-header text-center mb-4">
                <h3 class="gallery-title">
                    <span class="title-decorator"></span>
                    Nuestras Instalaciones
                    <span class="title-decorator"></span>
                </h3>
                <p class="gallery-subtitle">Espacios diseñados para potenciar el aprendizaje y el desarrollo integral</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                        <div class="gallery-image-wrapper">
                            <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Laboratorios de Ciencias" class="gallery-image">
                            <div class="gallery-overlay">
                                <div class="gallery-content">
                                    <h4>Laboratorios de Ciencias</h4>
                                    <p>Equipamiento científico de última generación</p>
                                    <div class="gallery-icon">
                                        <i class="fas fa-flask"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                        <div class="gallery-image-wrapper">
                            <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Aulas Inteligentes" class="gallery-image">
                            <div class="gallery-overlay">
                                <div class="gallery-content">
                                    <h4>Aulas Inteligentes</h4>
                                    <p>Tecnología interactiva para el aprendizaje</p>
                                    <div class="gallery-icon">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                        <div class="gallery-image-wrapper">
                            <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Biblioteca Digital" class="gallery-image">
                            <div class="gallery-overlay">
                                <div class="gallery-content">
                                    <h4>Biblioteca Digital</h4>
                                    <p>Recursos educativos digitales y físicos</p>
                                    <div class="gallery-icon">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
                        <div class="gallery-image-wrapper">
                            <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Espacios Deportivos" class="gallery-image">
                            <div class="gallery-overlay">
                                <div class="gallery-content">
                                    <h4>Espacios Deportivos</h4>
                                    <p>Instalaciones para el desarrollo físico</p>
                                    <div class="gallery-icon">
                                        <i class="fas fa-running"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Final -->
        <div class="welcome-cta text-center mt-5" data-aos="fade-up">
            <div class="cta-wrapper">
                <h3 class="cta-title">¿Listo para hacer parte de nuestra familia educativa?</h3>
                <p class="cta-subtitle">Descubre cómo podemos acompañar el crecimiento académico y personal de tu hijo</p>
                <div class="cta-buttons">
                    <a href="#admision" class="btn-cta-primary">
                        <i class="fas fa-calendar-check"></i>
                        Agendar Visita
                    </a>
                    <a href="#contacto" class="btn-cta-secondary">
                        <i class="fas fa-info-circle"></i>
                        Más Información
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     ESTILOS CSS - Agregar al archivo CSS existente
============================================ -->
<style>
/* Sección de Bienvenida */
.welcome-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafb 50%, #ffffff 100%);
    position: relative;
    overflow: hidden;
}

.welcome-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 20% 20%, rgba(244, 185, 66, 0.03) 0%, transparent 40%),
        radial-gradient(circle at 80% 80%, rgba(13, 63, 39, 0.02) 0%, transparent 40%);
    z-index: 1;
}

.welcome-section .container {
    position: relative;
    z-index: 2;
}

/* Header de Bienvenida */
.welcome-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: linear-gradient(135deg, rgba(244, 185, 66, 0.1), rgba(244, 185, 66, 0.05));
    color: var(--primary-green);
    padding: 1rem 2rem;
    border-radius: var(--border-radius-full);
    border: 1px solid rgba(244, 185, 66, 0.2);
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 2rem;
    box-shadow: 0 4px 20px rgba(244, 185, 66, 0.1);
}

.welcome-badge i {
    color: var(--accent-gold);
    font-size: 1.1rem;
}

.welcome-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1.5rem;
    line-height: 1.2;
    font-family: 'Montserrat', sans-serif;
}

.welcome-title .highlight-text {
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
}

.welcome-subtitle {
    font-size: 1.2rem;
    color: var(--text-light);
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.7;
    font-weight: 400;
}

/* Stats Mini */
.welcome-stats-mini {
    display: flex;
    gap: 2rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.stat-mini-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: var(--white);
    padding: 1.25rem;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--medium-gray);
    transition: var(--transition-normal);
    flex: 1;
    min-width: 200px;
}

.stat-mini-item:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
    border-color: var(--accent-gold);
}

.stat-mini-icon {
    width: 50px;
    height: 50px;
    background: var(--gradient-primary);
    border-radius: var(--border-radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1.2rem;
    flex-shrink: 0;
}

.stat-mini-content {
    display: flex;
    flex-direction: column;
}

.stat-mini-number {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-green);
    line-height: 1;
    font-family: 'Montserrat', sans-serif;
}

.stat-mini-label {
    font-size: 0.85rem;
    color: var(--text-light);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* Feature Points */
.welcome-features {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.feature-point {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(255, 255, 255, 0.7);
    border-radius: var(--border-radius-md);
    border: 1px solid transparent;
    transition: var(--transition-normal);
}

.feature-point:hover {
    background: var(--white);
    border-color: var(--accent-gold);
    transform: translateX(5px);
    box-shadow: var(--shadow-sm);
}

.feature-point-icon {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--success-green);
    font-size: 1rem;
    flex-shrink: 0;
}

.feature-point span {
    font-weight: 500;
    color: var(--text-dark);
    font-size: 0.95rem;
}

/* Imagen Principal */
.welcome-image-container {
    position: relative;
}

.main-image-wrapper {
    position: relative;
    border-radius: var(--border-radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    background: var(--white);
}

.welcome-main-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    transition: var(--transition-slow);
}

.main-image-wrapper:hover .welcome-main-image {
    transform: scale(1.02);
}

.image-overlay-content {
    position: absolute;
    top: 2rem;
    right: 2rem;
    z-index: 3;
}

.overlay-badge {
    background: rgba(255, 255, 255, 0.95);
    color: var(--primary-green);
    padding: 1rem 1.5rem;
    border-radius: var(--border-radius-lg);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    box-shadow: var(--shadow-lg);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(244, 185, 66, 0.2);
}

.overlay-badge i {
    color: var(--accent-gold);
    font-size: 1.1rem;
}

/* Elementos Flotantes */
.floating-element {
    position: absolute;
    width: 60px;
    height: 60px;
    background: var(--gradient-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-dark);
    font-size: 1.5rem;
    box-shadow: var(--shadow-lg);
    animation: float 6s ease-in-out infinite;
    opacity: 0.9;
}

.element-1 {
    top: -20px;
    left: -20px;
    animation-delay: 0s;
}

.element-2 {
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
    animation-delay: 2s;
}

.element-3 {
    top: 50%;
    right: -20px;
    transform: translateY(-50%);
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

/* Galería */
.facilities-gallery {
    margin-top: 5rem;
}

.gallery-header {
    margin-bottom: 3rem;
}

.gallery-title {
    font-size: 2rem;
    font-weight: 600;
    color: var(--primary-green);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    font-family: 'Montserrat', sans-serif;
    margin-bottom: 1rem;
}

.title-decorator {
    width: 60px;
    height: 3px;
    background: var(--gradient-gold);
    border-radius: 2px;
}

.gallery-subtitle {
    color: var(--text-light);
    font-size: 1rem;
    max-width: 600px;
    margin: 0 auto;
}

.gallery-item {
    height: 100%;
    transition: var(--transition-normal);
}

.gallery-image-wrapper {
    position: relative;
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    background: var(--white);
    box-shadow: var(--shadow-sm);
    height: 250px;
    transition: var(--transition-normal);
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition-slow);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(13, 63, 39, 0.8), rgba(13, 63, 39, 0.6));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition-normal);
}

.gallery-image-wrapper:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.gallery-image-wrapper:hover .gallery-overlay {
    opacity: 1;
}

.gallery-image-wrapper:hover .gallery-image {
    transform: scale(1.05);
}

.gallery-content {
    text-align: center;
    color: var(--white);
    padding: 1.5rem;
}

.gallery-content h4 {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-family: 'Montserrat', sans-serif;
}

.gallery-content p {
    font-size: 0.9rem;
    opacity: 0.9;
    margin-bottom: 1rem;
}

.gallery-icon {
    width: 50px;
    height: 50px;
    background: var(--gradient-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    font-size: 1.3rem;
    color: var(--text-dark);
    box-shadow: var(--shadow-md);
}

/* CTA Final */
.welcome-cta {
    margin-top: 4rem;
}

.cta-wrapper {
    background: linear-gradient(135deg, var(--white), var(--light-gray));
    padding: 3rem 2rem;
    border-radius: var(--border-radius-xl);
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--medium-gray);
    max-width: 800px;
    margin: 0 auto;
}

.cta-title {
    font-size: 1.8rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
}

.cta-subtitle {
    color: var(--text-light);
    font-size: 1rem;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-cta-primary, .btn-cta-secondary {
    padding: 1rem 2rem;
    border-radius: var(--border-radius-lg);
    text-decoration: none;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    transition: var(--transition-normal);
    font-family: 'Montserrat', sans-serif;
}

.btn-cta-primary {
    background: var(--gradient-gold);
    color: var(--text-dark);
    box-shadow: var(--shadow-md);
}

.btn-cta-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
    color: var(--text-dark);
}

.btn-cta-secondary {
    background: transparent;
    color: var(--primary-green);
    border: 2px solid var(--primary-green);
}

.btn-cta-secondary:hover {
    background: var(--primary-green);
    color: var(--white);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 992px) {
    .welcome-stats-mini {
        flex-direction: column;
        gap: 1rem;
    }
    
    .stat-mini-item {
        min-width: auto;
    }
    
    .floating-element {
        display: none;
    }
}

@media (max-width: 768px) {
    .welcome-section {
        padding: 4rem 0;
    }
    
    .welcome-main-image {
        height: 300px;
    }
    
    .image-overlay-content {
        top: 1rem;
        right: 1rem;
    }
    
    .overlay-badge {
        padding: 0.75rem 1rem;
        font-size: 0.8rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-cta-primary, .btn-cta-secondary {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
}

/* Animaciones AOS */
[data-aos="fade-up"] {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

[data-aos="fade-right"] {
    opacity: 0;
    transform: translateX(-30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

[data-aos="fade-left"] {
    opacity: 0;
    transform: translateX(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

[data-aos="zoom-in"] {
    opacity: 0;
    transform: scale(0.8);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

[data-aos].aos-animate {
    opacity: 1;
    transform: translate(0) scale(1);
}
</style>

<!-- Script para Animaciones AOS (Agregar antes del cierre de </body>) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<script>
    // Inicializar AOS
    AOS.init({
        duration: 800,
        easing: 'ease-out',
        once: true,
        offset: 100
    });

    // Animación adicional para contadores
    function animateWelcomeCounters() {
        const counters = document.querySelectorAll('.stat-mini-number');
        counters.forEach(counter => {
            const target = counter.textContent;
            const numericTarget = parseInt(target.replace(/\D/g, ''));
            const suffix = target.replace(/\d/g, '');
            let current = 0;
            const increment = numericTarget / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= numericTarget) {
                    current = numericTarget;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current) + suffix;
            }, 40);
        });
    }

    // Observador para activar animaciones de contadores
    const welcomeObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && entry.target.classList.contains('welcome-stats-mini')) {
                animateWelcomeCounters();
                welcomeObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    // Observar la sección de estadísticas
    document.addEventListener('DOMContentLoaded', function() {
        const statsSection = document.querySelector('.welcome-stats-mini');
        if (statsSection) {
            welcomeObserver.observe(statsSection);
        }
    });
</script>






<!-- ============================================
     SECCIÓN QUIÉNES SOMOS
     Insertar este código DESPUÉS de la sección de bienvenida
============================================ -->

<!-- Sección Quiénes Somos -->
<section class="about-us-section" id="quienes-somos">
    <div class="container">
        <!-- Header de la Sección -->
        <div class="about-header text-center mb-5">
            <div class="section-badge" data-aos="fade-up">
                <i class="fas fa-users"></i>
                <span>Conócenos</span>
            </div>
            <h1 class="about-main-title" data-aos="fade-up" data-aos-delay="200">
                Quiénes <span class="highlight-text">Somos</span>
            </h1>
            <p class="about-main-subtitle" data-aos="fade-up" data-aos-delay="400">
                Más de 25 años forjando el futuro de Colombia a través de una educación integral, 
                innovadora y fundamentada en valores cristianos que transforman vidas.
            </p>
        </div>

        <!-- Grid de Información Institucional -->
        <div class="row g-4 mb-5">
            <!-- Historia -->
            <div class="col-lg-3 col-md-6">
                <div class="about-card history-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-icon-wrapper">
                        <div class="card-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="icon-glow"></div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Nuestra Historia</h3>
                        <p class="card-description">
                            Fundado en 1999, el Colegio Gimnasio Humanístico ha sido pionero en 
                            educación integral, formando generaciones de líderes comprometidos 
                            con la excelencia y los valores.
                        </p>
                        <div class="card-highlight">
                            <span class="highlight-number">25+</span>
                            <span class="highlight-label">Años de trayectoria</span>
                        </div>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>

            <!-- Misión y Visión -->
            <div class="col-lg-3 col-md-6">
                <div class="about-card mission-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-icon-wrapper">
                        <div class="card-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="icon-glow"></div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Misión y Visión</h3>
                        <p class="card-description">
                            Formar ciudadanos íntegros con pensamiento crítico, competencias 
                            globales y valores cristianos, preparados para liderar la 
                            transformación positiva de la sociedad.
                        </p>
                        <div class="card-highlight">
                            <span class="highlight-number">100%</span>
                            <span class="highlight-label">Compromiso social</span>
                        </div>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>

            <!-- Valores -->
            <div class="col-lg-3 col-md-6">
                <div class="about-card values-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-icon-wrapper">
                        <div class="card-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="icon-glow"></div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Nuestros Valores</h3>
                        <p class="card-description">
                            Respeto, responsabilidad, honestidad, solidaridad y fe cristiana 
                            son los pilares que guían cada decisión y acción en nuestra 
                            comunidad educativa.
                        </p>
                        <div class="card-highlight">
                            <span class="highlight-number">5</span>
                            <span class="highlight-label">Valores fundamentales</span>
                        </div>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>

            <!-- Filosofía Educativa -->
            <div class="col-lg-3 col-md-6">
                <div class="about-card philosophy-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-icon-wrapper">
                        <div class="card-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div class="icon-glow"></div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Filosofía Educativa</h3>
                        <p class="card-description">
                            Metodología humanística que integra tecnología, innovación 
                            pedagógica y formación en valores, desarrollando el potencial 
                            único de cada estudiante.
                        </p>
                        <div class="card-highlight">
                            <span class="highlight-number">360°</span>
                            <span class="highlight-label">Formación integral</span>
                        </div>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>
        </div>

        <!-- Sección de Logros y Reconocimientos -->
        <div class="achievements-section" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="achievements-content">
                        <h2 class="achievements-title">Reconocimientos que nos Respaldan</h2>
                        <p class="achievements-description">
                            Nuestro compromiso con la excelencia educativa ha sido reconocido 
                            por instituciones nacionales e internacionales, consolidándonos como 
                            referente en educación integral.
                        </p>
                        <div class="achievements-list">
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <span>Certificación ISO 9001 en Gestión Educativa</span>
                            </div>
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <span>Reconocimiento MEN por Excelencia Académica</span>
                            </div>
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <span>Certificación Cambridge para Educación Bilingüe</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="achievements-visual">
                        <div class="stats-grid">
                            <div class="stat-box" data-aos="zoom-in" data-aos-delay="100">
                                <div class="stat-number">800+</div>
                                <div class="stat-label">Estudiantes Activos</div>
                            </div>
                            <div class="stat-box" data-aos="zoom-in" data-aos-delay="200">
                                <div class="stat-number">50+</div>
                                <div class="stat-label">Docentes Especializados</div>
                            </div>
                            <div class="stat-box" data-aos="zoom-in" data-aos-delay="300">
                                <div class="stat-number">95%</div>
                                <div class="stat-label">Éxito Universitario</div>
                            </div>
                            <div class="stat-box" data-aos="zoom-in" data-aos-delay="400">
                                <div class="stat-number">25+</div>
                                <div class="stat-label">Años de Experiencia</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="about-cta text-center" data-aos="fade-up">
            <div class="cta-content">
                <h2 class="cta-title">¿Quieres conocer más sobre nuestra propuesta educativa?</h2>
                <p class="cta-subtitle">
                    Descubre cómo formamos líderes del mañana con valores sólidos y excelencia académica
                </p>
                <a href="#propuesta-educativa" class="btn-about-primary">
                    <i class="fas fa-arrow-right"></i>
                    <span>Conoce más sobre nosotros</span>
                    <div class="btn-shine"></div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     ESTILOS CSS - Agregar al archivo CSS existente
============================================ -->
<style>
/* Sección Quiénes Somos */
.about-us-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #f8fafb 0%, #ffffff 50%, #f8fafb 100%);
    position: relative;
    overflow: hidden;
}

.about-us-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 30% 20%, rgba(13, 63, 39, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 70% 80%, rgba(244, 185, 66, 0.02) 0%, transparent 50%);
    z-index: 1;
}

.about-us-section .container {
    position: relative;
    z-index: 2;
}

/* Header */
.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: linear-gradient(135deg, rgba(13, 63, 39, 0.1), rgba(13, 63, 39, 0.05));
    color: var(--primary-green);
    padding: 1rem 2rem;
    border-radius: var(--border-radius-full);
    border: 1px solid rgba(13, 63, 39, 0.15);
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 2rem;
    box-shadow: 0 4px 20px rgba(13, 63, 39, 0.08);
}

.section-badge i {
    color: var(--accent-gold);
    font-size: 1.1rem;
}

.about-main-title {
    font-size: clamp(2.5rem, 5vw, 3.8rem);
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1.5rem;
    line-height: 1.2;
    font-family: 'Montserrat', sans-serif;
}

.about-main-title .highlight-text {
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.about-main-subtitle {
    font-size: 1.2rem;
    color: var(--text-light);
    max-width: 900px;
    margin: 0 auto;
    line-height: 1.7;
    font-weight: 400;
}

/* Cards de Información */
.about-card {
    background: var(--white);
    border-radius: var(--border-radius-xl);
    padding: 2.5rem 2rem;
    height: 100%;
    position: relative;
    transition: var(--transition-normal);
    border: 1px solid var(--medium-gray);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
    cursor: pointer;
}

.about-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
    border-color: var(--accent-gold);
}

.card-icon-wrapper {
    position: relative;
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
}

.card-icon {
    width: 80px;
    height: 80px;
    background: var(--gradient-primary);
    border-radius: var(--border-radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: var(--white);
    transition: var(--transition-normal);
    position: relative;
    z-index: 2;
}

.icon-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    height: 100px;
    background: var(--gradient-gold);
    border-radius: 50%;
    opacity: 0;
    filter: blur(20px);
    transition: var(--transition-normal);
    z-index: 1;
}

.about-card:hover .icon-glow {
    opacity: 0.3;
}

.about-card:hover .card-icon {
    background: var(--gradient-gold);
    color: var(--text-dark);
    transform: scale(1.05);
}

.card-content {
    text-align: center;
}

.card-title {
    font-size: 1.4rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
    line-height: 1.3;
}

.card-description {
    color: var(--text-light);
    line-height: 1.7;
    font-size: 0.95rem;
    margin-bottom: 1.5rem;
    text-align: justify;
}

.card-highlight {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem;
    background: rgba(13, 63, 39, 0.05);
    border-radius: var(--border-radius-md);
    border: 1px solid rgba(244, 185, 66, 0.2);
}

.highlight-number {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--primary-green);
    font-family: 'Montserrat', sans-serif;
    line-height: 1;
}

.highlight-label {
    font-size: 0.8rem;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-weight: 500;
    margin-top: 0.25rem;
}

.card-decoration {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: var(--gradient-gold);
    transition: var(--transition-normal);
}

.about-card:hover .card-decoration {
    height: 6px;
}

/* Colores específicos por card */
.history-card .card-decoration {
    background: linear-gradient(135deg, #3498db, #2980b9);
}

.mission-card .card-decoration {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
}

.values-card .card-decoration {
    background: linear-gradient(135deg, #e67e22, #d35400);
}

.philosophy-card .card-decoration {
    background: linear-gradient(135deg, #9b59b6, #8e44ad);
}

/* Sección de Logros */
.achievements-section {
    margin-top: 5rem;
    padding: 3rem 0;
}

.achievements-title {
    font-size: 2rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1.5rem;
    font-family: 'Montserrat', sans-serif;
}

.achievements-description {
    font-size: 1rem;
    color: var(--text-light);
    line-height: 1.7;
    margin-bottom: 2rem;
    text-align: justify;
}

.achievements-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.achievement-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(255, 255, 255, 0.8);
    border-radius: var(--border-radius-md);
    border: 1px solid transparent;
    transition: var(--transition-normal);
}

.achievement-item:hover {
    background: var(--white);
    border-color: var(--accent-gold);
    transform: translateX(5px);
    box-shadow: var(--shadow-sm);
}

.achievement-icon {
    width: 40px;
    height: 40px;
    background: var(--gradient-gold);
    border-radius: var(--border-radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-dark);
    font-size: 1.1rem;
    flex-shrink: 0;
}

.achievement-item span {
    font-weight: 500;
    color: var(--text-dark);
    font-size: 0.95rem;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.stat-box {
    background: var(--white);
    padding: 2rem 1.5rem;
    border-radius: var(--border-radius-lg);
    text-align: center;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--medium-gray);
    transition: var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.stat-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: var(--gradient-gold);
}

.stat-box:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
    border-color: var(--accent-gold);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-green);
    font-family: 'Montserrat', sans-serif;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-light);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* CTA Final */
.about-cta {
    margin-top: 5rem;
}

.cta-content {
    max-width: 800px;
    margin: 0 auto;
}

.cta-title {
    font-size: 2rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
    line-height: 1.3;
}

.cta-subtitle {
    color: var(--text-light);
    font-size: 1rem;
    margin-bottom: 2.5rem;
    line-height: 1.6;
}

.btn-about-primary {
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    background: var(--gradient-gold);
    color: var(--text-dark);
    padding: 1.2rem 3rem;
    border-radius: var(--border-radius-lg);
    text-decoration: none;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-size: 0.9rem;
    font-family: 'Montserrat', sans-serif;
    transition: var(--transition-normal);
    box-shadow: var(--shadow-lg);
    position: relative;
    overflow: hidden;
}

.btn-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.6s ease;
}

.btn-about-primary:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl);
    color: var(--text-dark);
}

.btn-about-primary:hover .btn-shine {
    left: 100%;
}

/* Responsive */
@media (max-width: 992px) {
    .achievements-section {
        margin-top: 3rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
}

@media (max-width: 768px) {
    .about-us-section {
        padding: 4rem 0;
    }
    
    .about-card {
        padding: 2rem 1.5rem;
        margin-bottom: 1rem;
    }
    
    .card-icon {
        width: 70px;
        height: 70px;
        font-size: 1.8rem;
    }
    
    .achievements-list {
        gap: 0.75rem;
    }
    
    .achievement-item {
        padding: 0.75rem;
    }
    
    .btn-about-primary {
        padding: 1rem 2rem;
        width: 100%;
        max-width: 350px;
        justify-content: center;
    }
}

@media (max-width: 576px) {
    .card-title {
        font-size: 1.2rem;
    }
    
    .card-description {
        font-size: 0.9rem;
    }
    
    .highlight-number {
        font-size: 1.5rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
}
</style>























<!-- ============================================
     SECCIÓN QUIÉNES SOMOS
     Insertar este código DESPUÉS de la sección de bienvenida
============================================ -->

<!-- Sección Quiénes Somos -->
<section class="about-us-section" id="quienes-somos">
    <div class="container">
        <!-- Header de la Sección -->
        <div class="about-header text-center mb-5">
            <h1 class="about-main-title" data-aos="fade-up" data-aos-delay="200">
                Quiénes Somos
            </h1>
            <p class="about-main-subtitle" data-aos="fade-up" data-aos-delay="400">
                Más de 25 años forjando el futuro de Colombia a través de una educación integral, 
                innovadora y fundamentada en valores cristianos que transforman vidas.
            </p>
        </div>

        <!-- Grid de Información Institucional -->
        <div class="row g-4 mb-5">
            <!-- Historia -->
            <div class="col-lg-3 col-md-6">
                <div class="about-card history-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-overlay">
                        <div class="card-overlay-content">
                            <div class="overlay-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <h4 class="overlay-title">Historia Institucional</h4>
                            <p class="overlay-description">Descubre nuestro legado de más de 25 años formando líderes</p>
                        </div>
                    </div>
                    <div class="card-icon-wrapper">
                        <div class="card-icon">
                            <i class="fas fa-history"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Nuestra Historia</h3>
                        <p class="card-description">
                            Fundado en 1999, el Colegio Gimnasio Humanístico ha sido pionero en 
                            educación integral, formando generaciones de líderes comprometidos 
                            con la excelencia y los valores.
                        </p>
                        <div class="card-highlight">
                            <span class="highlight-number">25+</span>
                            <span class="highlight-label">Años de trayectoria</span>
                        </div>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>

            <!-- Misión y Visión -->
            <div class="col-lg-3 col-md-6">
                <div class="about-card mission-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-overlay">
                        <div class="card-overlay-content">
                            <div class="overlay-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h4 class="overlay-title">Misión y Visión</h4>
                            <p class="overlay-description">Nuestro propósito y proyección hacia el futuro</p>
                        </div>
                    </div>
                    <div class="card-icon-wrapper">
                        <div class="card-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Misión y Visión</h3>
                        <p class="card-description">
                            Formar ciudadanos íntegros con pensamiento crítico, competencias 
                            globales y valores cristianos, preparados para liderar la 
                            transformación positiva de la sociedad.
                        </p>
                        <div class="card-highlight">
                            <span class="highlight-number">100%</span>
                            <span class="highlight-label">Compromiso social</span>
                        </div>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>

            <!-- Valores -->
            <div class="col-lg-3 col-md-6">
                <div class="about-card values-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-overlay">
                        <div class="card-overlay-content">
                            <div class="overlay-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <h4 class="overlay-title">Valores Institucionales</h4>
                            <p class="overlay-description">Los principios que guían nuestra comunidad educativa</p>
                        </div>
                    </div>
                    <div class="card-icon-wrapper">
                        <div class="card-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Nuestros Valores</h3>
                        <p class="card-description">
                            Respeto, responsabilidad, honestidad, solidaridad y fe cristiana 
                            son los pilares que guían cada decisión y acción en nuestra 
                            comunidad educativa.
                        </p>
                        <div class="card-highlight">
                            <span class="highlight-number">5</span>
                            <span class="highlight-label">Valores fundamentales</span>
                        </div>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>

            <!-- Filosofía Educativa -->
            <div class="col-lg-3 col-md-6">
                <div class="about-card philosophy-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-overlay">
                        <div class="card-overlay-content">
                            <div class="overlay-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <h4 class="overlay-title">Filosofía Educativa</h4>
                            <p class="overlay-description">Metodología humanística e innovadora</p>
                        </div>
                    </div>
                    <div class="card-icon-wrapper">
                        <div class="card-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Filosofía Educativa</h3>
                        <p class="card-description">
                            Metodología humanística que integra tecnología, innovación 
                            pedagógica y formación en valores, desarrollando el potencial 
                            único de cada estudiante.
                        </p>
                        <div class="card-highlight">
                            <span class="highlight-number">360°</span>
                            <span class="highlight-label">Formación integral</span>
                        </div>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>
        </div>


    </div>
</section>

<!-- ============================================
     ESTILOS CSS - Agregar al archivo CSS existente
============================================ -->
<style>
/* Sección Quiénes Somos */
.about-us-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #f8fafb 0%, #ffffff 50%, #f8fafb 100%);
    position: relative;
    overflow: hidden;
}

.about-us-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 30% 20%, rgba(13, 63, 39, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 70% 80%, rgba(244, 185, 66, 0.02) 0%, transparent 50%);
    z-index: 1;
}

.about-us-section .container {
    position: relative;
    z-index: 2;
}

/* Header */
.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: linear-gradient(135deg, rgba(13, 63, 39, 0.1), rgba(13, 63, 39, 0.05));
    color: var(--primary-green);
    padding: 1rem 2rem;
    border-radius: var(--border-radius-full);
    border: 1px solid rgba(13, 63, 39, 0.15);
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 2rem;
    box-shadow: 0 4px 20px rgba(13, 63, 39, 0.08);
}

.section-badge i {
    color: var(--accent-gold);
    font-size: 1.1rem;
}

.about-main-title {
    font-size: clamp(2.5rem, 5vw, 3.8rem);
    font-weight: 700;
    color: var(--primary-green);
    margin-bottom: 1.5rem;
    line-height: 1.2;
    font-family: 'Montserrat', sans-serif;
}

.about-main-title .highlight-text {
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.about-main-subtitle {
    font-size: 1.2rem;
    color: var(--text-light);
    max-width: 900px;
    margin: 0 auto;
    line-height: 1.7;
    font-weight: 400;
}

/* Cards de Información */
.about-card {
    background: var(--white);
    border-radius: var(--border-radius-xl);
    padding: 2.5rem 2rem;
    height: 100%;
    position: relative;
    transition: var(--transition-normal);
    border: 1px solid var(--medium-gray);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
    cursor: pointer;
}

.about-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
    border-color: var(--accent-gold);
}

/* Overlay similar al de las instalaciones */
.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(13, 63, 39, 0.85), rgba(13, 63, 39, 0.75));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition-normal);
    z-index: 10;
}

.about-card:hover .card-overlay {
    opacity: 1;
}

.card-overlay-content {
    text-align: center;
    color: var(--white);
    padding: 2rem 1.5rem;
}

.overlay-icon {
    width: 70px;
    height: 70px;
    background: var(--gradient-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.8rem;
    color: var(--text-dark);
    box-shadow: var(--shadow-lg);
}

.overlay-title {
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
    color: var(--white);
}

.overlay-description {
    font-size: 0.95rem;
    opacity: 0.95;
    line-height: 1.6;
}

.card-icon-wrapper {
    position: relative;
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
}

.card-icon {
    width: 80px;
    height: 80px;
    background: var(--gradient-primary);
    border-radius: var(--border-radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: var(--white);
    transition: var(--transition-normal);
    position: relative;
    z-index: 2;
}

.icon-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    height: 100px;
    background: var(--gradient-gold);
    border-radius: 50%;
    opacity: 0;
    filter: blur(20px);
    transition: var(--transition-normal);
    z-index: 1;
}

.about-card:hover .icon-glow {
    opacity: 0.3;
}

.about-card:hover .card-icon {
    background: var(--gradient-gold);
    color: var(--text-dark);
    transform: scale(1.05);
}

.card-content {
    text-align: center;
}

.card-title {
    font-size: 1.4rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
    line-height: 1.3;
}

.card-description {
    color: var(--text-light);
    line-height: 1.7;
    font-size: 0.95rem;
    margin-bottom: 1.5rem;
    text-align: justify;
}

.card-highlight {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem;
    background: rgba(13, 63, 39, 0.05);
    border-radius: var(--border-radius-md);
    border: 1px solid rgba(244, 185, 66, 0.2);
}

.highlight-number {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--primary-green);
    font-family: 'Montserrat', sans-serif;
    line-height: 1;
}

.highlight-label {
    font-size: 0.8rem;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-weight: 500;
    margin-top: 0.25rem;
}

.card-decoration {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: var(--gradient-gold);
    transition: var(--transition-normal);
}

.about-card:hover .card-decoration {
    height: 6px;
}

/* Colores específicos por card */
.history-card .card-decoration {
    background: linear-gradient(135deg, #3498db, #2980b9);
}

.mission-card .card-decoration {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
}

.values-card .card-decoration {
    background: linear-gradient(135deg, #e67e22, #d35400);
}

.philosophy-card .card-decoration {
    background: linear-gradient(135deg, #9b59b6, #8e44ad);
}

/* Sección de Logros */
.achievements-section {
    margin-top: 5rem;
    padding: 3rem 0;
}

.achievements-title {
    font-size: 2rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1.5rem;
    font-family: 'Montserrat', sans-serif;
}

.achievements-description {
    font-size: 1rem;
    color: var(--text-light);
    line-height: 1.7;
    margin-bottom: 2rem;
    text-align: justify;
}

.achievements-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.achievement-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(255, 255, 255, 0.8);
    border-radius: var(--border-radius-md);
    border: 1px solid transparent;
    transition: var(--transition-normal);
}

.achievement-item:hover {
    background: var(--white);
    border-color: var(--accent-gold);
    transform: translateX(5px);
    box-shadow: var(--shadow-sm);
}

.achievement-icon {
    width: 40px;
    height: 40px;
    background: var(--gradient-gold);
    border-radius: var(--border-radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-dark);
    font-size: 1.1rem;
    flex-shrink: 0;
}

.achievement-item span {
    font-weight: 500;
    color: var(--text-dark);
    font-size: 0.95rem;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.stat-box {
    background: var(--white);
    padding: 2rem 1.5rem;
    border-radius: var(--border-radius-lg);
    text-align: center;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--medium-gray);
    transition: var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.stat-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: var(--gradient-gold);
}

.stat-box:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
    border-color: var(--accent-gold);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-green);
    font-family: 'Montserrat', sans-serif;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-light);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* CTA Final */
.about-cta {
    margin-top: 5rem;
}

.cta-content {
    max-width: 800px;
    margin: 0 auto;
}

.cta-title {
    font-size: 2rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
    line-height: 1.3;
}

.cta-subtitle {
    color: var(--text-light);
    font-size: 1rem;
    margin-bottom: 2.5rem;
    line-height: 1.6;
}

.btn-about-primary {
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    background: var(--gradient-gold);
    color: var(--text-dark);
    padding: 1.2rem 3rem;
    border-radius: var(--border-radius-lg);
    text-decoration: none;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-size: 0.9rem;
    font-family: 'Montserrat', sans-serif;
    transition: var(--transition-normal);
    box-shadow: var(--shadow-lg);
    position: relative;
    overflow: hidden;
}

.btn-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.6s ease;
}

.btn-about-primary:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl);
    color: var(--text-dark);
}

.btn-about-primary:hover .btn-shine {
    left: 100%;
}

/* Responsive */
@media (max-width: 992px) {
    .achievements-section {
        margin-top: 3rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
}

@media (max-width: 768px) {
    .about-us-section {
        padding: 4rem 0;
    }
    
    .about-card {
        padding: 2rem 1.5rem;
        margin-bottom: 1rem;
    }
    
    .card-icon {
        width: 70px;
        height: 70px;
        font-size: 1.8rem;
    }
    
    .achievements-list {
        gap: 0.75rem;
    }
    
    .achievement-item {
        padding: 0.75rem;
    }
    
    .btn-about-primary {
        padding: 1rem 2rem;
        width: 100%;
        max-width: 350px;
        justify-content: center;
    }
}

@media (max-width: 576px) {
    .card-title {
        font-size: 1.2rem;
    }
    
    .card-description {
        font-size: 0.9rem;
    }
    
    .highlight-number {
        font-size: 1.5rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
}
</style>