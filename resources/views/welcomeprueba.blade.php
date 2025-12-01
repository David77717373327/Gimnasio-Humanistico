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
    <title>Objetivos Básica Primaria - Vista Dividida</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: #ffffff;
            overflow-x: hidden;
        }

        /* Header */
        .header-section {
            text-align: center;
            padding: 3rem 2rem 2rem;
            background: linear-gradient(135deg, #0d3f27 0%, #065e35 100%);
            color: white;
        }

        .main-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Contenedor principal */
        .split-container {
            display: flex;
            min-height: calc(100vh - 200px);
        }

        /* Panel izquierdo - Navegación */
        .nav-panel {
            width: 400px;
            background: #f8fafb;
            border-right: 1px solid #e5e7eb;
            padding: 2rem 1rem;
            overflow-y: auto;
            position: sticky;
            top: 0;
            height: calc(100vh - 200px);
        }

        .category-group {
            margin-bottom: 2rem;
        }

        .category-label {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #9CA3AF;
            padding: 0 1rem;
            margin-bottom: 0.75rem;
            display: block;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            margin-bottom: 0.5rem;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            border: 2px solid transparent;
        }

        .nav-item:hover {
            background: #ffffff;
            border-color: #F4B942;
            transform: translateX(5px);
        }

        .nav-item.active {
            background: linear-gradient(135deg, #0d3f27, #065e35);
            color: white;
            border-color: #0d3f27;
            box-shadow: 0 4px 15px rgba(13, 63, 39, 0.25);
        }

        .nav-number {
            width: 40px;
            height: 40px;
            background: #F4B942;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 1.125rem;
            flex-shrink: 0;
        }

        .nav-item.active .nav-number {
            background: #F4B942;
        }

        .nav-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9375rem;
            font-weight: 600;
            color: #0d3f27;
            line-height: 1.4;
        }

        .nav-item.active .nav-title {
            color: white;
        }

        /* Panel derecho - Contenido */
        .content-panel {
            flex: 1;
            padding: 3rem;
            overflow-y: auto;
            background: white;
        }

        .content-item {
            display: none;
            animation: fadeInContent 0.5s ease;
        }

        .content-item.active {
            display: block;
        }

        @keyframes fadeInContent {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .content-header {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 3px solid #F4B942;
        }

        .content-number {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #0d3f27, #065e35);
            color: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            font-size: 2rem;
            box-shadow: 0 8px 25px rgba(13, 63, 39, 0.3);
        }

        .content-title-group h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.75rem, 3vw, 2.5rem);
            font-weight: 700;
            color: #0d3f27;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .content-category {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #F4B942;
        }

        .content-text {
            font-size: 1.125rem;
            line-height: 1.9;
            color: #374151;
            text-align: justify;
            margin-bottom: 2rem;
        }

        .content-highlight {
            background: linear-gradient(135deg, rgba(244, 185, 66, 0.1), rgba(13, 63, 39, 0.05));
            padding: 2rem;
            border-radius: 16px;
            border-left: 4px solid #F4B942;
            margin-top: 2rem;
        }

        .content-highlight h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #0d3f27;
            margin-bottom: 1rem;
        }

        .content-highlight p {
            font-size: 1rem;
            line-height: 1.7;
            color: #6B7280;
        }

        /* Navegación entre objetivos */
        .content-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #e5e7eb;
        }

        .nav-btn {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9375rem;
            font-weight: 600;
            padding: 0.875rem 1.75rem;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-btn.prev {
            background: #f8fafb;
            color: #0d3f27;
        }

        .nav-btn.next {
            background: linear-gradient(135deg, #0d3f27, #065e35);
            color: white;
        }

        .nav-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 63, 39, 0.2);
        }

        .nav-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .split-container {
                flex-direction: column;
            }

            .nav-panel {
                width: 100%;
                height: auto;
                position: relative;
                max-height: 400px;
            }

            .content-panel {
                padding: 2rem 1.5rem;
            }

            .content-number {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .nav-item {
                padding: 0.875rem;
            }

            .nav-number {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }

            .nav-title {
                font-size: 0.875rem;
            }

            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="header-section">
        <h1 class="main-title">Objetivos de Educación Básica Primaria</h1>
        <p class="subtitle">15 objetivos fundamentales para la formación integral</p>
    </div>

    <div class="split-container">
        <!-- Panel de Navegación -->
        <div class="nav-panel">
            <!-- Valores y Ciudadanía -->
            <div class="category-group">
                <span class="category-label">Valores y Ciudadanía</span>
                <div class="nav-item active" data-target="objetivo-1">
                    <div class="nav-number">01</div>
                    <div class="nav-title">Valores para la Convivencia</div>
                </div>
                <div class="nav-item" data-target="objetivo-2">
                    <div class="nav-number">02</div>
                    <div class="nav-title">Valores Cívicos y Morales</div>
                </div>
                <div class="nav-item" data-target="objetivo-3">
                    <div class="nav-number">03</div>
                    <div class="nav-title">Educación Constitucional</div>
                </div>
                <div class="nav-item" data-target="objetivo-4">
                    <div class="nav-number">04</div>
                    <div class="nav-title">Participación Infantil</div>
                </div>
            </div>

            <!-- Desarrollo Académico -->
            <div class="category-group">
                <span class="category-label">Desarrollo Académico</span>
                <div class="nav-item" data-target="objetivo-5">
                    <div class="nav-number">05</div>
                    <div class="nav-title">Deseo de Saber</div>
                </div>
                <div class="nav-item" data-target="objetivo-6">
                    <div class="nav-number">06</div>
                    <div class="nav-title">Habilidades Comunicativas</div>
                </div>
                <div class="nav-item" data-target="objetivo-7">
                    <div class="nav-number">07</div>
                    <div class="nav-title">Expresión Estética</div>
                </div>
                <div class="nav-item" data-target="objetivo-8">
                    <div class="nav-number">08</div>
                    <div class="nav-title">Pensamiento Matemático</div>
                </div>
                <div class="nav-item" data-target="objetivo-9">
                    <div class="nav-number">09</div>
                    <div class="nav-title">Comprensión del Medio</div>
                </div>
                <div class="nav-item" data-target="objetivo-10">
                    <div class="nav-number">10</div>
                    <div class="nav-title">Asimilación de Conceptos</div>
                </div>
                <div class="nav-item" data-target="objetivo-11">
                    <div class="nav-number">11</div>
                    <div class="nav-title">Lengua Extranjera</div>
                </div>
            </div>

            <!-- Desarrollo Físico -->
            <div class="category-group">
                <span class="category-label">Desarrollo Físico</span>
                <div class="nav-item" data-target="objetivo-12">
                    <div class="nav-number">12</div>
                    <div class="nav-title">Salud y Cuidado Personal</div>
                </div>
                <div class="nav-item" data-target="objetivo-13">
                    <div class="nav-number">13</div>
                    <div class="nav-title">Educación Física y Deportes</div>
                </div>
                <div class="nav-item" data-target="objetivo-14">
                    <div class="nav-number">14</div>
                    <div class="nav-title">Formación Artística</div>
                </div>
            </div>

            <!-- Habilidades Sociales -->
            <div class="category-group">
                <span class="category-label">Habilidades Sociales</span>
                <div class="nav-item" data-target="objetivo-15">
                    <div class="nav-number">15</div>
                    <div class="nav-title">Autonomía Personal</div>
                </div>
            </div>
        </div>

        <!-- Panel de Contenido -->
        <div class="content-panel">
            <!-- Objetivo 1 -->
            <div class="content-item active" id="objetivo-1">
                <div class="content-header">
                    <div class="content-number">01</div>
                    <div class="content-title-group">
                        <h2>Valores para la Convivencia</h2>
                        <p class="content-category">Valores y Ciudadanía</p>
                    </div>
                </div>
                <p class="content-text">
                    La formación de los valores fundamentales para la convivencia de una sociedad democrática, participativa y pluralista.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Este objetivo busca desarrollar en los estudiantes las bases éticas y morales necesarias para vivir en armonía con otros, respetando la diversidad y promoviendo el diálogo como herramienta de resolución de conflictos.</p>
                </div>
            </div>

            <!-- Objetivo 2 -->
            <div class="content-item" id="objetivo-2">
                <div class="content-header">
                    <div class="content-number">02</div>
                    <div class="content-title-group">
                        <h2>Valores Cívicos y Morales</h2>
                        <p class="content-category">Valores y Ciudadanía</p>
                    </div>
                </div>
                <p class="content-text">
                    El desarrollo de valores civiles y morales de organización social y de convivencia humana.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Fomenta la comprensión de las normas sociales y el desarrollo de una consciencia ciudadana responsable desde temprana edad.</p>
                </div>
            </div>

            <!-- Objetivo 3 -->
            <div class="content-item" id="objetivo-3">
                <div class="content-header">
                    <div class="content-number">03</div>
                    <div class="content-title-group">
                        <h2>Educación Constitucional</h2>
                        <p class="content-category">Valores y Ciudadanía</p>
                    </div>
                </div>
                <p class="content-text">
                    La iniciación en el conocimiento de la constitución política.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Introduce a los estudiantes en los principios fundamentales que rigen nuestra sociedad y sus derechos como ciudadanos.</p>
                </div>
            </div>

            <!-- Objetivo 4 -->
            <div class="content-item" id="objetivo-4">
                <div class="content-header">
                    <div class="content-number">04</div>
                    <div class="content-title-group">
                        <h2>Participación Infantil</h2>
                        <p class="content-category">Valores y Ciudadanía</p>
                    </div>
                </div>
                <p class="content-text">
                    La formación para la participación y organización infantil y la utilización adecuada del tiempo libre.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Desarrolla habilidades de liderazgo, trabajo en equipo y gestión del tiempo desde la infancia.</p>
                </div>
            </div>

            <!-- Objetivo 5 -->
            <div class="content-item" id="objetivo-5">
                <div class="content-header">
                    <div class="content-number">05</div>
                    <div class="content-title-group">
                        <h2>Deseo de Saber</h2>
                        <p class="content-category">Desarrollo Académico</p>
                    </div>
                </div>
                <p class="content-text">
                    El fomento del deseo del saber, de la iniciativa personal frente al conocimiento y frente a la realidad social, así como el espíritu crítico.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Cultiva la curiosidad intelectual y el pensamiento crítico, herramientas esenciales para el aprendizaje continuo.</p>
                </div>
            </div>

            <!-- Objetivo 6 -->
            <div class="content-item" id="objetivo-6">
                <div class="content-header">
                    <div class="content-number">06</div>
                    <div class="content-title-group">
                        <h2>Habilidades Comunicativas</h2>
                        <p class="content-category">Desarrollo Académico</p>
                    </div>
                </div>
                <p class="content-text">
                    El desarrollo de las habilidades comunicativas básicas para leer, comprender, escribir, escuchar, hablar y expresarse correctamente en lengua castellana, así como el fomento de la afición por la lectura.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>La comunicación efectiva es la base de todas las interacciones humanas y el aprendizaje académico.</p>
                </div>
            </div>

            <!-- Objetivo 7 -->
            <div class="content-item" id="objetivo-7">
                <div class="content-header">
                    <div class="content-number">07</div>
                    <div class="content-title-group">
                        <h2>Expresión Estética</h2>
                        <p class="content-category">Desarrollo Académico</p>
                    </div>
                </div>
                <p class="content-text">
                    El desarrollo de la capacidad para apreciar y utilizar la lengua como medio de expresión estética.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Fomenta la creatividad y la sensibilidad artística a través del lenguaje.</p>
                </div>
            </div>

            <!-- Objetivo 8 -->
            <div class="content-item" id="objetivo-8">
                <div class="content-header">
                    <div class="content-number">08</div>
                    <div class="content-title-group">
                        <h2>Pensamiento Matemático</h2>
                        <p class="content-category">Desarrollo Académico</p>
                    </div>
                </div>
                <p class="content-text">
                    El desarrollo de los conocimientos matemáticos necesarios para manejar y utilizar operaciones simples de cálculo y procedimientos lógicos elementales en diferentes situaciones, así como la capacidad para solucionar problemas que impliquen conocimientos.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Las matemáticas desarrollan el razonamiento lógico y la capacidad de resolver problemas de manera sistemática.</p>
                </div>
            </div>

            <!-- Objetivo 9 -->
            <div class="content-item" id="objetivo-9">
                <div class="content-header">
                    <div class="content-number">09</div>
                    <div class="content-title-group">
                        <h2>Comprensión del Medio</h2>
                        <p class="content-category">Desarrollo Académico</p>
                    </div>
                </div>
                <p class="content-text">
                    La comprensión básica del medio físico, social y cultural en el nivel local, nacional y universal, de acuerdo con el desarrollo intelectual correspondiente a su edad.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Permite a los estudiantes entender su entorno y su lugar en el mundo.</p>
                </div>
            </div>

            <!-- Objetivo 10 -->
            <div class="content-item" id="objetivo-10">
                <div class="content-header">
                    <div class="content-number">10</div>
                    <div class="content-title-group">
                        <h2>Asimilación de Conceptos</h2>
                        <p class="content-category">Desarrollo Académico</p>
                    </div>
                </div>
                <p class="content-text">
                    La asimilación de conceptos en áreas del conocimiento que sean objeto de estudio, de acuerdo con el desarrollo intelectual y la edad.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Garantiza una comprensión profunda de los contenidos adaptados a cada etapa del desarrollo.</p>
                </div>
            </div>

            <!-- Objetivo 11 -->
            <div class="content-item" id="objetivo-11">
                <div class="content-header">
                    <div class="content-number">11</div>
                    <div class="content-title-group">
                        <h2>Lengua Extranjera</h2>
                        <p class="content-category">Desarrollo Académico</p>
                    </div>
                </div>
                <p class="content-text">
                    La adquisición de elementos de conversación y de lectura al menos en una lengua extranjera.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Abre puertas al mundo globalizado y desarrolla habilidades cognitivas adicionales.</p>
                </div>
            </div>

            <!-- Objetivo 12 -->
            <div class="content-item" id="objetivo-12">
                <div class="content-header">
                    <div class="content-number">12</div>
                    <div class="content-title-group">
                        <h2>Salud y Cuidado Personal</h2>
                        <p class="content-category">Desarrollo Físico</p>
                    </div>
                </div>
                <p class="content-text">
                    La valoración de la higiene y la salud del propio cuerpo y la formación para la protección de la naturaleza y el ambiente.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Establece hábitos saludables y consciencia ambiental desde temprana edad.</p>
                </div>
            </div>

            <!-- Objetivo 13 -->
            <div class="content-item" id="objetivo-13">
                <div class="content-header">
                    <div class="content-number">13</div>
                    <div class="content-title-group">
                        <h2>Educación Física y Deportes</h2>
                        <p class="content-category">Desarrollo Físico</p>
                    </div>
                </div>
                <p class="content-text">
                    El conocimiento y ejercitación del propio cuerpo mediante la práctica de la educación física, la recreación y los deportes adecuados a su edad y conducentes a un desarrollo físico armónico.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Promueve el desarrollo físico integral y la disciplina deportiva.</p>
                </div>
            </div>

            <!-- Objetivo 14 -->
            <div class="content-item" id="objetivo-14">
                <div class="content-header">
                    <div class="content-number">14</div>
                    <div class="content-title-group">
                        <h2>Formación Artística</h2>
                        <p class="content-category">Desarrollo Físico</p>
                    </div>
                </div>
                <p class="content-text">
                    La formación artística mediante la expresión corporal, la representación, la música, la plástica y la literatura.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Desarrolla la creatividad y la sensibilidad artística a través de múltiples lenguajes expresivos.</p>
                </div>
            </div>

            <!-- Objetivo 15 -->
            <div class="content-item" id="objetivo-15">
                <div class="content-header">
                    <div class="content-number">15</div>
                    <div class="content-title-group">
                        <h2>Autonomía Personal</h2>
                        <p class="content-category">Habilidades Sociales</p>
                    </div>
                </div>
                <p class="content-text">
                    La adquisición de habilidades para desempeñarse con autonomía en la sociedad.
                </p>
                <div class="content-highlight">
                    <h3>¿Por qué es importante?</h3>
                    <p>Prepara a los estudiantes para ser independientes y tomar decisiones responsables.</p>
                </div>
            </div>

            <!-- Navegación entre objetivos -->
            <div class="content-navigation">
                <button class="nav-btn prev" id="prevBtn">
                    ← Anterior
                </button>
                <button class="nav-btn next" id="nextBtn">
                    Siguiente →
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.nav-item');
            const contentItems = document.querySelectorAll('.content-item');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            let currentIndex = 0;

            function showContent(index) {
                // Remover clases activas
                navItems.forEach(item => item.classList.remove('active'));
                contentItems.forEach(item => item.classList.remove('active'));

                // Agregar clase activa
                navItems[index].classList.add('active');
                contentItems[index].classList.add('active');

                // Actualizar botones
                prevBtn.disabled = index === 0;
                nextBtn.disabled = index === navItems.length - 1;

                // Scroll al top del contenido
                document.querySelector('.content-panel').scrollTo(0, 0);

                currentIndex = index;
            }

            // Click en items de navegación
            navItems.forEach((item, index) => {
                item.addEventListener('click', () => showContent(index));
            });

            // Botones anterior/siguiente
            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) showContent(currentIndex - 1);
            });

            nextBtn.addEventListener('click', () => {
                if (currentIndex < navItems.length - 1) showContent(currentIndex + 1);
            });

            // Inicializar
            prevBtn.disabled = true;
        });
    </script>
</body>
</html>










/* Video completamente en el fondo */
.objetivos-video-fondo {
    position: fixed;
    top: 0;
    left: 320px; /* Ancho del panel izquierdo */
    width: calc(100% - 320px);
    height: 100%;
    object-fit: cover;
    z-index: 0;
    opacity: 0.35;
    pointer-events: none; /* Evita que el video interfiera con los clicks */
}


<!-- VIDEO DE FONDO -->
    <video class="objetivos-video-fondo" autoplay muted loop>
        <source src="{{ asset('videos/hero-background4.mp4') }}" type="video/mp4">
    </video>
        