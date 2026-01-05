Quiero que generes contenido HTML optimizado para SEO, pero sin agregar estilos, sin CSS, sin clases nuevas y sin modificar los estilos existentes. Únicamente genera estructura HTML semántica y contenido textual optimizado.

Sigue exactamente estas instrucciones:

🔎 1. SEO dentro del HTML

Incluye:

Títulos optimizados (H1, H2, H3…)

Descripciones claras en párrafos

Palabras clave principales y secundarias (incluye variaciones naturales)

Keywords locales (Ciudad, región, país)

ALT descriptivos con keywords para imágenes (pero sin agregar estilos)

🧱 2. Estructura semántica (sin estilos)

Usar únicamente estas etiquetas:

<header>

<nav>

<main>

<section>

<article>

<footer>

<h1> a <h4>

<p>

<ul> <li>

<img> (solo con alt y title)

<a> (con buen anchor text)

No agregar clases ni ids nuevos, a menos que yo los proporcione explícitamente.

🦾 3. Accesibilidad

Agregar:

alt="" con descripciones reales (incluyendo keywords)

aria-label funcional cuando corresponda

Texto natural para lectores de pantalla

Sin afectar estilos.

⚡ 4. No modificar estilos existentes

No crear:

Clases nuevas

IDs nuevos

CSS inline

Estilos embebidos

Scripts que alteren el diseño

Solo contenido textual dentro del HTML ya existente.

📝 5. Contenido

Redactar:

Texto profesional y persuasivo

Orientado al SEO moderno

Claro, humano y natural

Optimizado para posicionar en Google

🎯 6. Entrega

Solo dame:

Fragmentos HTML listos para pegar en una vista existente

Sin estilos

Sin clases nuevas

Sin nada visual

Solamente contenido optimizado.

🔚 Instrucción final

Genera el contenido HTML optimizado respetando TODO lo anterior y manteniendo completamente intactos mis estilos actuales.





QUIERO QUE ME AYUDES A QUE MI CONTENIDO DE MI VISTA SEA ADAPTABLE A 
CUALQUIER TIPO DE PANTALLAS
ES DESIR QUE SEA RESPONSIVE EN PANTTALLAS MOVILES SIN DAÑAR NI MODIFICAR LOS ESTILOS QUE YA TENGO EN PANTALLAS
COMPLETAS  YA QUE EN PANTTALLAS COMPLETAS YA TENGO EL ESTILO DEFINIDO PORFAVOR DE LA MANERA MAS PROFESIONAL POSIBLE Y EMPRESARIAL 
PERFECIONALO MAS PORFAVOR  QUE LAS IMAGENES COMO LOS TESTOS LOS TIYULOS TODO QUEDE RESPONSIVE SI ME ENTIDES DAME EL CSS COMPLETO

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educación Básica Primaria | Gimnasio Humanístico del Alto Magdalena - Neiva</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- CSS personalizado -->
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
    --dark-blue: #264653;
    --deep-blue: #003366;
    --soft-blue: #07346e;
    --slate-blue: #3A506B;
    --light-blue: #E0ECF7;

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

/* ============================================
   HEADER SECTION - DISEÑO PROFESIONAL
============================================ */

.admision-nav-header {
    text-align: center;
    margin-top: 0.50rem;
    position: relative;
    z-index: 2;
    animation: fadeInDown 0.6s ease-out;
    padding: 2rem 0 1.5rem;
    background: linear-gradient(180deg, rgba(244, 185, 66, 0.02) 0%, transparent 100%);
}

.admision-nav-title {
    font-family: 'Times New Roman', Times, serif;
    font-size: clamp(3.5rem, 5vw, 2.5rem);
    font-weight: 700;
    color: var(--primary-green, #0d3f27);
    margin-bottom: 0.8rem;
    letter-spacing: -0.5px;
    line-height: 1.2;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ============================================
   SECCIÓN DE OBJETIVOS EDUCACIÓN INICIAL
   TODAS LAS CLASES CON PREFIJO "objetivos-"
   DISEÑO PROFESIONAL Y SIMÉTRICO
============================================ */

/* Contenedor principal */
.objetivos-split-container {
    display: flex;
    min-height: calc(100vh - 200px);
}

/* ============================================
   PANEL IZQUIERDO - NAVEGACIÓN
============================================ */

.objetivos-nav-panel {
    width: 320px;
    background: white;
    border-right: 1px solid white;
    padding: 1rem;
    overflow-y: auto;
    position: sticky;
    top: 0;
    height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.objetivos-nav-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.875rem 1rem;
    cursor: pointer;
    transition: all 0.2s ease;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-left: 3px solid transparent;
}

.objetivos-nav-item:hover {
    background: #ffffff;
    border-left-color: #065e35;
}

.objetivos-nav-item.active {
    background: var(--primary-green);
    color: white;
    border: 1px solid var(--primary-green);
    border-left: 3px solid var(--primary-green);
}

.objetivos-nav-number {
    width: 40px;
    height: 40px;
    background: var(--primary-green);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 1.125rem;
    flex-shrink: 0;
    transition: all 0.2s ease;
}

.objetivos-nav-item.active .objetivos-nav-number {
    background: #ffffff;
    color: #0d3f27;
}

.objetivos-nav-content {
    flex: 1;
}

.objetivos-nav-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--primary-green);
    line-height: 1.3;
    margin-bottom: 0.25rem;
    transition: color 0.2s ease;
}

.objetivos-nav-item.active .objetivos-nav-title {
    color: white;
}

.objetivos-nav-subtitle {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.75rem;
    font-weight: 500;
    color: black;
    transition: color 0.2s ease;
}

.objetivos-nav-item.active .objetivos-nav-subtitle {
    color: rgba(255, 255, 255, 0.75);
}

/* ============================================
   PANEL DERECHO - CONTENIDO CON IMÁGENES DE FONDO
============================================ */

.objetivos-content-panel {
    flex: 1;
    padding: 2rem;
    overflow-y: auto;
    position: relative;
}

/* ============================================
   IMÁGENES DE FONDO PARA CADA CATEGORÍA
============================================ */

.objetivos-background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0;
    transition: opacity 0.6s ease-in-out;
    z-index: 0;
    pointer-events: none;
}

.objetivos-background-image.active {
    opacity: 1;
}

/* SOLUCIÓN: Overlay MÁS OSCURO (85%) para máximo contraste */
.objetivos-background-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.85);
    z-index: 1;
}

/* IMÁGENES ESPECÍFICAS PARA CADA CATEGORÍA */

/* Valores y Ciudadanía - Imagen 1 */
.valores-bg {
    background-image: url('https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=1600');
}

/* Desarrollo Académico - Imagen 2 */
.academico-bg {
    background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=1600');
}

/* Desarrollo Físico - Imagen 3 */
.fisico-bg {
    background-image: url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=1600');
}

/* Habilidades Sociales - Imagen 4 */
.sociales-bg {
    background-image: url('https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1600');
}

/* ============================================
   CONTENIDO DE OBJETIVOS
============================================ */

.objetivos-content-item {
    display: none;
    position: relative;
    z-index: 10;
    animation: objetivosFadeIn 0.5s ease;
}

.objetivos-content-item.active {
    display: block;
}

/* Animación de entrada */
@keyframes objetivosFadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Animación de salida */
.objetivos-content-item.fade-out {
    animation: objetivosFadeOut 0.15s ease;
}

@keyframes objetivosFadeOut {
    from {
        opacity: 1;
        transform: translateY(0);
    }
    to {
        opacity: 0;
        transform: translateY(-10px);
    }
}

.objetivos-content-header {
    display: flex;
    align-items: center;
    gap: 1.25rem;
    margin-bottom: 2rem;
    padding-bottom: 1.25rem;
    border-bottom: 3px solid white;
    position: relative;
    z-index: 10;
}

.objetivos-content-number {
    width: 60px;
    height: 60px;
    background: white;
    color: var(--primary-green);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Montserrat', sans-serif;
    font-weight: 800;
    font-size: 1.5rem;
    flex-shrink: 0;
    border-radius: 4px;
}

.objetivos-content-title-group h2 {
    font-family: 'Montserrat', sans-serif;
    font-size: 2rem;
    font-weight: 700;
    color: white;
    margin-bottom: 0.5rem;
    line-height: 1.2;
    letter-spacing: -0.5px;
}

.objetivos-content-category {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
}

.objetivos-content-text {
    font-family: 'Open Sans', sans-serif;
    font-size: 1.125rem;
    line-height: 1.9;
    color: white;
    text-align: left;
    margin-bottom: 2rem;
    position: relative;
    z-index: 10;
    font-weight: 400;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.9);
}

.objetivos-content-highlight {
    background: rgba(255, 255, 255, 0.08);
    padding: 1.75rem;
    border-left: 4px solid white;
    margin-top: 2rem;
    position: relative;
    z-index: 10;
}

.objetivos-content-highlight h3 {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.125rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.9);
}

.objetivos-content-highlight p {
    font-family: 'Open Sans', sans-serif;
    font-size: 1rem;
    line-height: 1.8;
    color: white;
    font-weight: 400;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.9);
}

/* ============================================
   NAVEGACIÓN ENTRE OBJETIVOS
============================================ */

.objetivos-content-navigation {
    display: flex;
    justify-content: space-between;
    margin-top: 2.5rem;
    padding-top: 2rem;
    border-top: 2px solid rgba(255, 255, 255, 0.15);
    position: relative;
    z-index: 10;
}

.objetivos-nav-btn {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.9375rem;
    font-weight: 700;
    padding: 1rem 2rem;
    border: 2px solid white;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.625rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background: transparent;
    color: white;
}

.objetivos-nav-btn:hover {
    transform: translateX(0) scale(1.05);
    background: white;
    color: var(--primary-green);
}

.objetivos-nav-btn:disabled {
    opacity: 0.3 !important;
    cursor: not-allowed;
    transform: none;
}

.objetivos-nav-btn:disabled:hover {
    transform: none;
    background: transparent;
    color: white;
}

/* ============================================
   RESPONSIVE - TABLET
============================================ */

@media (max-width: 1024px) {
    .objetivos-nav-panel {
        width: 280px;
        padding: 0.875rem;
    }
    
    .objetivos-content-panel {
        padding: 1.75rem;
    }
    
    .objetivos-nav-item {
        padding: 0.75rem 0.875rem;
    }
    
    .objetivos-nav-number {
        width: 36px;
        height: 36px;
        font-size: 1rem;
    }
}

/* ============================================
   RESPONSIVE - MOBILE
============================================ */

@media (max-width: 768px) {
    .objetivos-split-container {
        flex-direction: column;
    }
    
    .objetivos-nav-panel {
        width: 100%;
        position: relative;
        height: auto;
        max-height: none;
        border-right: none;
        border-bottom: 1px solid #e5e7eb;
        padding: 1rem;
        gap: 0.375rem;
    }
    
    .objetivos-nav-item {
        padding: 0.625rem 0.75rem;
    }
    
    .objetivos-nav-number {
        width: 32px;
        height: 32px;
        font-size: 0.875rem;
    }
    
    .objetivos-nav-title {
        font-size: 0.875rem;
    }
    
    .objetivos-nav-subtitle {
        font-size: 0.6875rem;
    }
    
    .objetivos-content-panel {
        padding: 1.25rem;
    }
    
    .objetivos-content-header {
        flex-direction: row;
        gap: 0.875rem;
        margin-bottom: 1.25rem;
    }
    
    .objetivos-content-number {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .objetivos-content-title-group h2 {
        font-size: 1.25rem;
    }
    
    .objetivos-content-navigation {
        gap: 0.5rem;
        margin-top: 1.5rem;
    }
    
    .objetivos-nav-btn {
        padding: 0.625rem 1rem;
        font-size: 0.8125rem;
    }
}
    </style>
</head>

<body>

    <header class="header-top" aria-label="Encabezado principal del sitio">
        <!-- Tu header aquí -->
    </header>

    <nav class="nav-sticky" aria-label="Navegación principal">
        <!-- Tu navegación aquí -->
    </nav>

    <main id="main" role="main">

        <!-- HERO -->
        <section class="hero-section" aria-label="Educación Básica Primaria en Neiva">
            <div class="hero-background">
                <img src="../images/Mision1.jpg"
                    alt="Instalaciones del colegio en Neiva enfocadas en educación básica primaria" 
                    width="1920"
                    height="1080" 
                    loading="lazy">
            </div>

            <div class="hero-overlay"></div>
            <div class="hero-particles" aria-hidden="true"></div>

            <div class="container hero-container">
                <div class="hero-content">
                    <h1 class="hero-title" data-title="Nuestra Identidad Institucional">
                        Educación Básica Primaria
                    </h1>

                    <div class="hero-scroll-indicator" onclick="scrollToContent()" role="button" tabindex="0"
                        aria-label="Ir a contenido principal" onkeypress="if(event.key==='Enter')scrollToContent()">
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- Título SEO -->
        <header class="admision-nav-header" id="siguiente_sesion">
            <h2 class="admision-nav-title">Objetivos Educación Básica Primaria</h2>
        </header>


        <div class="objetivos-split-container">
            <!-- Panel de Navegación -->
            <div class="objetivos-nav-panel">

                <!-- Valores y Ciudadanía -->
                <div class="objetivos-nav-item active" data-category="valores">
                    <div class="objetivos-nav-number">01</div>
                    <div class="objetivos-nav-content">
                        <div class="objetivos-nav-title">Valores y Ciudadanía</div>
                        <div class="objetivos-nav-subtitle">4 objetivos</div>
                    </div>
                </div>

                <!-- Desarrollo Académico -->
                <div class="objetivos-nav-item" data-category="academico">
                    <div class="objetivos-nav-number">02</div>
                    <div class="objetivos-nav-content">
                        <div class="objetivos-nav-title">Desarrollo Académico</div>
                        <div class="objetivos-nav-subtitle">7 objetivos</div>
                    </div>
                </div>

                <!-- Desarrollo Físico -->
                <div class="objetivos-nav-item" data-category="fisico">
                    <div class="objetivos-nav-number">03</div>
                    <div class="objetivos-nav-content">
                        <div class="objetivos-nav-title">Desarrollo Físico</div>
                        <div class="objetivos-nav-subtitle">3 objetivos</div>
                    </div>
                </div>

                <!-- Habilidades Sociales -->
                <div class="objetivos-nav-item" data-category="sociales">
                    <div class="objetivos-nav-number">04</div>
                    <div class="objetivos-nav-content">
                        <div class="objetivos-nav-title">Habilidades Sociales</div>
                        <div class="objetivos-nav-subtitle">1 objetivo</div>
                    </div>
                </div>
            </div>

            <!-- Panel de Contenido -->
            <div class="objetivos-content-panel">

                <!-- IMAGEN DE FONDO PARA VALORES Y CIUDADANÍA -->
                <div class="objetivos-background-image valores-bg" data-category="valores"></div>

                <!-- IMAGEN DE FONDO PARA DESARROLLO ACADÉMICO -->
                <div class="objetivos-background-image academico-bg" data-category="academico"></div>

                <!-- IMAGEN DE FONDO PARA DESARROLLO FÍSICO -->
                <div class="objetivos-background-image fisico-bg" data-category="fisico"></div>

                <!-- IMAGEN DE FONDO PARA HABILIDADES SOCIALES -->
                <div class="objetivos-background-image sociales-bg" data-category="sociales"></div>


                <!-- VALORES Y CIUDADANÍA -->
                <!-- Objetivo 1 -->
                <div class="objetivos-content-item active" data-category="valores" data-index="0">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">01</div>
                        <div class="objetivos-content-title-group">
                            <h2>Valores para la Convivencia</h2>
                            <p class="objetivos-content-category">Valores y Ciudadanía • 1 de 4</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        La formación de los valores fundamentales para la convivencia de una sociedad democrática, participativa y pluralista.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Este objetivo busca desarrollar en los estudiantes las bases éticas y morales necesarias para vivir en armonía con otros, respetando la diversidad y promoviendo el diálogo como herramienta de resolución de conflictos.</p>
                    </div>
                </div>

                <!-- Objetivo 2 -->
                <div class="objetivos-content-item" data-category="valores" data-index="1">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">02</div>
                        <div class="objetivos-content-title-group">
                            <h2>Valores Cívicos y Morales</h2>
                            <p class="objetivos-content-category">Valores y Ciudadanía • 2 de 4</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        El desarrollo de valores civiles y morales de organización social y de convivencia humana.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Fomenta la comprensión de las normas sociales y el desarrollo de una consciencia ciudadana responsable desde temprana edad.</p>
                    </div>
                </div>

                <!-- Objetivo 3 -->
                <div class="objetivos-content-item" data-category="valores" data-index="2">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">03</div>
                        <div class="objetivos-content-title-group">
                            <h2>Educación Constitucional</h2>
                            <p class="objetivos-content-category">Valores y Ciudadanía • 3 de 4</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        La iniciación en el conocimiento de la constitución política.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Introduce a los estudiantes en los principios fundamentales que rigen nuestra sociedad y sus derechos como ciudadanos.</p>
                    </div>
                </div>

                <!-- Objetivo 4 -->
                <div class="objetivos-content-item" data-category="valores" data-index="3">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">04</div>
                        <div class="objetivos-content-title-group">
                            <h2>Participación Infantil</h2>
                            <p class="objetivos-content-category">Valores y Ciudadanía • 4 de 4</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        La formación para la participación y organización infantil y la utilización adecuada del tiempo libre.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Desarrolla habilidades de liderazgo, trabajo en equipo y gestión del tiempo desde la infancia.</p>
                    </div>
                </div>

                <!-- DESARROLLO ACADÉMICO -->
                <!-- Objetivo 5 -->
                <div class="objetivos-content-item" data-category="academico" data-index="0">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">01</div>
                        <div class="objetivos-content-title-group">
                            <h2>Deseo de Saber</h2>
                            <p class="objetivos-content-category">Desarrollo Académico • 1 de 7</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        El fomento del deseo del saber, de la iniciativa personal frente al conocimiento y frente a la realidad social, así como el espíritu crítico.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Cultiva la curiosidad intelectual y el pensamiento crítico, herramientas esenciales para el aprendizaje continuo.</p>
                    </div>
                </div>

                <!-- Objetivo 6 -->
                <div class="objetivos-content-item" data-category="academico" data-index="1">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">02</div>
                        <div class="objetivos-content-title-group">
                            <h2>Habilidades Comunicativas</h2>
                            <p class="objetivos-content-category">Desarrollo Académico • 2 de 7</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        El desarrollo de las habilidades comunicativas básicas para leer, comprender, escribir, escuchar, hablar y expresarse correctamente en lengua castellana, así como el fomento de la afición por la lectura.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>La comunicación efectiva es la base de todas las interacciones humanas y el aprendizaje académico.</p>
                    </div>
                </div>

                <!-- Objetivo 7 -->
                <div class="objetivos-content-item" data-category="academico" data-index="2">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">03</div>
                        <div class="objetivos-content-title-group">
                            <h2>Expresión Estética</h2>
                            <p class="objetivos-content-category">Desarrollo Académico • 3 de 7</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        El desarrollo de la capacidad para apreciar y utilizar la lengua como medio de expresión estética.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Fomenta la creatividad y la sensibilidad artística a través del lenguaje.</p>
                    </div>
                </div>

                <!-- Objetivo 8 -->
                <div class="objetivos-content-item" data-category="academico" data-index="3">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">04</div>
                        <div class="objetivos-content-title-group">
                            <h2>Pensamiento Matemático</h2>
                            <p class="objetivos-content-category">Desarrollo Académico • 4 de 7</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        El desarrollo de los conocimientos matemáticos necesarios para manejar y utilizar operaciones simples de cálculo y procedimientos lógicos elementales en diferentes situaciones, así como la capacidad para solucionar problemas que impliquen conocimientos.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Las matemáticas desarrollan el razonamiento lógico y la capacidad de resolver problemas de manera sistemática.</p>
                    </div>
                </div>

                <!-- Objetivo 9 -->
                <div class="objetivos-content-item" data-category="academico" data-index="4">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">05</div>
                        <div class="objetivos-content-title-group">
                            <h2>Comprensión del Medio</h2>
                            <p class="objetivos-content-category">Desarrollo Académico • 5 de 7</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        La comprensión básica del medio físico, social y cultural en el nivel local, nacional y universal, de acuerdo con el desarrollo intelectual correspondiente a su edad.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Permite a los estudiantes entender su entorno y su lugar en el mundo.</p>
                    </div>
                </div>

                <!-- Objetivo 10 -->
                <div class="objetivos-content-item" data-category="academico" data-index="5">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">06</div>
                        <div class="objetivos-content-title-group">
                            <h2>Asimilación de Conceptos</h2>
                            <p class="objetivos-content-category">Desarrollo Académico • 6 de 7</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        La asimilación de conceptos en áreas del conocimiento que sean objeto de estudio, de acuerdo con el desarrollo intelectual y la edad.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Garantiza una comprensión profunda de los contenidos adaptados a cada etapa del desarrollo.</p>
                    </div>
                </div>

                <!-- Objetivo 11 -->
                <div class="objetivos-content-item" data-category="academico" data-index="6">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">07</div>
                        <div class="objetivos-content-title-group">
                            <h2>Lengua Extranjera</h2>
                            <p class="objetivos-content-category">Desarrollo Académico • 7 de 7</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        La adquisición de elementos de conversación y de lectura al menos en una lengua extranjera.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Abre puertas al mundo globalizado y desarrolla habilidades cognitivas adicionales.</p>
                    </div>
                </div>

                <!-- DESARROLLO FÍSICO -->
                <!-- Objetivo 12 -->
                <div class="objetivos-content-item" data-category="fisico" data-index="0">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">01</div>
                        <div class="objetivos-content-title-group">
                            <h2>Salud y Cuidado Personal</h2>
                            <p class="objetivos-content-category">Desarrollo Físico • 1 de 3</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        La valoración de la higiene y la salud del propio cuerpo y la formación para la protección de la naturaleza y el ambiente.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Establece hábitos saludables y consciencia ambiental desde temprana edad.</p>
                    </div>
                </div>

                <!-- Objetivo 13 -->
                <div class="objetivos-content-item" data-category="fisico" data-index="1">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">02</div>
                        <div class="objetivos-content-title-group">
                            <h2>Educación Física y Deportes</h2>
                            <p class="objetivos-content-category">Desarrollo Físico • 2 de 3</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        El conocimiento y ejercitación del propio cuerpo mediante la práctica de la educación física, la recreación y los deportes adecuados a su edad y conducentes a un desarrollo físico armónico.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Promueve el desarrollo físico integral y la disciplina deportiva.</p>
                    </div>
                </div>

                <!-- Objetivo 14 -->
                <div class="objetivos-content-item" data-category="fisico" data-index="2">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">03</div>
                        <div class="objetivos-content-title-group">
                            <h2>Formación Artística</h2>
                            <p class="objetivos-content-category">Desarrollo Físico • 3 de 3</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        La formación artística mediante la expresión corporal, la representación, la música, la plástica y la literatura.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Desarrolla la creatividad y la sensibilidad artística a través de múltiples lenguajes expresivos.</p>
                    </div>
                </div>

                <!-- HABILIDADES SOCIALES -->
                <!-- Objetivo 15 -->
                <div class="objetivos-content-item" data-category="sociales" data-index="0">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">01</div>
                        <div class="objetivos-content-title-group">
                            <h2>Autonomía Personal</h2>
                            <p class="objetivos-content-category">Habilidades Sociales • 1 de 1</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        La adquisición de habilidades para desempeñarse con autonomía en la sociedad.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Prepara a los estudiantes para ser independientes y tomar decisiones responsables.</p>
                    </div>
                </div>

                <!-- Navegación entre objetivos -->
                <div class="objetivos-content-navigation">
                    <button class="objetivos-nav-btn objetivos-prev" id="objetivosPrevBtn">
                        ← Anterior
                    </button>
                    <button class="objetivos-nav-btn objetivos-next" id="objetivosNextBtn">
                        Siguiente →
                    </button>
                </div>
            </div>
        </div>


        <!-- JavaScript -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.objetivos-nav-item');
            const contentItems = document.querySelectorAll('.objetivos-content-item');
            const backgroundImages = document.querySelectorAll('.objetivos-background-image');
            const prevBtn = document.getElementById('objetivosPrevBtn');
            const nextBtn = document.getElementById('objetivosNextBtn');
            
            let currentCategory = 'valores';
            let currentIndex = 0;

            // Obtener objetivos de una categoría
            function getObjectivesByCategory(category) {
                return Array.from(contentItems).filter(item => 
                    item.getAttribute('data-category') === category
                );
            }

            // Cambiar imagen de fondo según categoría
            function changeBackgroundImage(category) {
                backgroundImages.forEach(bg => {
                    if (bg.getAttribute('data-category') === category) {
                        bg.classList.add('active');
                    } else {
                        bg.classList.remove('active');
                    }
                });
            }

            // Mostrar contenido con animación
            function showContent(category, index) {
                const categoryObjectives = getObjectivesByCategory(category);
                
                // Ocultar todos los contenidos con animación de salida
                contentItems.forEach(item => {
                    item.classList.remove('active');
                    item.classList.add('fade-out');
                });
                
                // Pequeño delay para la animación de entrada
                setTimeout(() => {
                    contentItems.forEach(item => item.classList.remove('fade-out'));
                    
                    // Mostrar el contenido actual
                    if (categoryObjectives[index]) {
                        categoryObjectives[index].classList.add('active');
                    }
                }, 150);

                // Cambiar imagen de fondo
                changeBackgroundImage(category);

                // Actualizar botones de navegación
                prevBtn.disabled = index === 0;
                nextBtn.disabled = index === categoryObjectives.length - 1;

                // Scroll al top del contenido
                document.querySelector('.objetivos-content-panel').scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });

                currentCategory = category;
                currentIndex = index;
            }

            // Click en items de navegación (categorías)
            navItems.forEach((item) => {
                item.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');
                    
                    // Remover active de todos los nav items
                    navItems.forEach(nav => nav.classList.remove('active'));
                    
                    // Agregar active al item clickeado
                    this.classList.add('active');
                    
                    // Mostrar primer objetivo de la categoría
                    showContent(category, 0);
                });
            });

            // Botón anterior
            prevBtn.addEventListener('click', function() {
                if (currentIndex > 0) {
                    showContent(currentCategory, currentIndex - 1);
                }
            });

            // Botón siguiente
            nextBtn.addEventListener('click', function() {
                const categoryObjectives = getObjectivesByCategory(currentCategory);
                if (currentIndex < categoryObjectives.length - 1) {
                    showContent(currentCategory, currentIndex + 1);
                }
            });

            // Inicializar
            changeBackgroundImage('valores');
            showContent('valores', 0);
        });

        function scrollToContent() {
            document.getElementById('siguiente_sesion').scrollIntoView({ 
                behavior: 'smooth' 
            });
        }
        </script>

    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>