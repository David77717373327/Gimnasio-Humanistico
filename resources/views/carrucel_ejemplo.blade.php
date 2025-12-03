<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso de Admisiones - Carrusel 3D</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem 1rem;
            overflow-x: hidden;
        }

        /* Header */
        .header-section {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInDown 0.8s ease;
        }

        .main-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .subtitle {
            font-size: 1.125rem;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Contador de progreso */
        .progress-counter {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 2rem;
        }

        /* Carrusel Container */
        .carousel-container {
            position: relative;
            width: 100%;
            max-width: 1200px;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 2000px;
        }

        .carousel-track {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Tarjetas */
        .carousel-card {
            position: absolute;
            width: 500px;
            height: 500px;
            background: white;
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
            backface-visibility: hidden;
            left: 50%;
            top: 50%;
            margin-left: -250px;
            margin-top: -250px;
        }

        .carousel-card.active {
            z-index: 10;
            transform: translateX(0) translateZ(0) scale(1);
            opacity: 1;
        }

        .carousel-card.prev {
            z-index: 5;
            transform: translateX(-400px) translateZ(-300px) scale(0.8);
            opacity: 0.6;
            filter: blur(2px);
        }

        .carousel-card.next {
            z-index: 5;
            transform: translateX(400px) translateZ(-300px) scale(0.8);
            opacity: 0.6;
            filter: blur(2px);
        }

        .carousel-card.hidden {
            z-index: 0;
            transform: translateX(0) translateZ(-500px) scale(0.5);
            opacity: 0;
            pointer-events: none;
        }

        /* Contenido de la tarjeta */
        .card-category-badge {
            display: inline-block;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 0.5rem 1rem;
            background: #000000;
            color: white;
            border-radius: 50px;
            margin-bottom: 1.5rem;
        }

        .card-number {
            font-family: 'Montserrat', sans-serif;
            font-size: 5rem;
            font-weight: 900;
            color: rgba(0, 0, 0, 0.05);
            position: absolute;
            top: 1rem;
            right: 2rem;
            line-height: 1;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 1.5rem;
            line-height: 1.3;
            position: relative;
            z-index: 1;
        }

        .card-text {
            font-size: 1.0625rem;
            line-height: 1.8;
            color: #4a4a4a;
            text-align: justify;
            margin-bottom: 2rem;
        }

        /* Controles de navegación */
        .carousel-controls {
            position: absolute;
            bottom: -80px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 1rem;
            z-index: 20;
        }

        .control-btn {
            width: 60px;
            height: 60px;
            background: white;
            border: 2px solid #000000;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #000000;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .control-btn:hover {
            background: #000000;
            color: white;
            transform: scale(1.1);
        }

        .control-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: scale(1);
        }

        /* Indicadores */
        .carousel-indicators {
            position: absolute;
            bottom: -120px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 500px;
        }

        .indicator {
            width: 12px;
            height: 12px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .indicator:hover {
            background: rgba(255, 255, 255, 0.6);
            transform: scale(1.2);
        }

        .indicator.active {
            background: #ffffff;
            width: 30px;
            border-radius: 6px;
            border-color: white;
        }

        /* Animaciones */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .carousel-container {
                height: 550px;
            }

            .carousel-card {
                width: 450px;
                height: 450px;
                margin-left: -225px;
                margin-top: -225px;
                padding: 2.5rem;
            }

            .carousel-card.prev,
            .carousel-card.next {
                transform: translateX(0) translateZ(-400px) scale(0.7);
            }
        }

                    @media (max-width: 768px) {
            .carousel-container {
                height: 500px;
            }

            .carousel-card {
                width: 350px;
                height: 500px;
                margin-left: -175px;
                margin-top: -250px;
                padding: 2rem;
            }

            .carousel-card.prev,
            .carousel-card.next {
                transform: translateX(0) translateZ(-500px) scale(0.5);
                opacity: 0;
            }

            .card-number {
                font-size: 3rem;
                top: 0.5rem;
                right: 1rem;
            }

            .card-title {
                font-size: 1.5rem;
            }

            .card-text {
                font-size: 0.9375rem;
            }

            .carousel-controls {
                bottom: -60px;
            }

            .control-btn {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }

            .carousel-indicators {
                bottom: -100px;
            }
        }
    </style>
</head>
<body>
    <div class="header-section">
        <h1 class="main-title">Proceso de Admisiones</h1>
        <p class="subtitle">Sigue estos pasos para unirte a nuestra comunidad educativa</p>
    </div>

    <div class="progress-counter">
        Paso <span id="currentNum">1</span> de <span id="totalNum">5</span>
    </div>

    <div class="carousel-container">
        <div class="carousel-track" id="carouselTrack">
            <!-- Tarjeta 1 -->
            <div class="carousel-card active">
                <div class="card-number">01</div>
                <span class="card-category-badge">Inicio del Proceso</span>
                <h3 class="card-title">Compra del Formulario</h3>
                <p class="card-text">El primer paso es adquirir el formulario de inscripción en la secretaría del colegio o a través de nuestra plataforma virtual. Este documento es necesario para iniciar tu proceso de admisión y contiene toda la información que necesitamos conocer sobre el estudiante.</p>
            </div>

            <!-- Tarjeta 2 -->
            <div class="carousel-card next">
                <div class="card-number">02</div>
                <span class="card-category-badge">Documentación</span>
                <h3 class="card-title">Anexar Documentos</h3>
                <p class="card-text">Completa el formulario y anexa los documentos pertinentes: fotocopia del documento de identidad del estudiante, registro civil, certificados de estudios anteriores, certificado médico, dos fotos recientes y fotocopia de los documentos de identidad de los padres o acudientes.</p>
            </div>

            <!-- Tarjeta 3 -->
            <div class="carousel-card hidden">
                <div class="card-number">03</div>
                <span class="card-category-badge">Evaluación Personal</span>
                <h3 class="card-title">Entrevista con la Rectora</h3>
                <p class="card-text">Una vez revisada la documentación, se programará una entrevista personal con la rectora del colegio. Este encuentro permite conocer mejor al estudiante y su familia, compartir la filosofía institucional y resolver cualquier inquietud sobre nuestro proyecto educativo.</p>
            </div>

            <!-- Tarjeta 4 -->
            <div class="carousel-card hidden">
                <div class="card-number">04</div>
                <span class="card-category-badge">Evaluación Académica</span>
                <h3 class="card-title">Prueba de Admisión</h3>
                <p class="card-text">El estudiante presentará una evaluación diagnóstica que nos permitirá conocer su nivel académico actual. Esta prueba abarca las áreas fundamentales según el grado al que aspira ingresar y nos ayuda a diseñar un plan de acompañamiento personalizado.</p>
            </div>

            <!-- Tarjeta 5 -->
            <div class="carousel-card hidden">
                <div class="card-number">05</div>
                <span class="card-category-badge">Finalización</span>
                <h3 class="card-title">Matrícula y Bienvenida</h3>
                <p class="card-text">¡Felicitaciones! Una vez aprobado el proceso, recibirás la carta de aceptación y podrás proceder con la matrícula oficial. Te daremos la bienvenida a nuestra familia educativa y te entregaremos toda la información sobre el inicio de clases, uniformes y materiales necesarios.</p>
            </div>
        </div>

        <!-- Controles -->
        <div class="carousel-controls">
            <button class="control-btn" id="prevBtn">←</button>
            <button class="control-btn" id="nextBtn">→</button>
        </div>

        <!-- Indicadores -->
        <div class="carousel-indicators" id="indicators"></div>
    </div>

    <script>
        const cards = document.querySelectorAll('.carousel-card');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const indicators = document.getElementById('indicators');
        const currentNum = document.getElementById('currentNum');
        const totalNum = document.getElementById('totalNum');
        let currentIndex = 0;

        // Crear indicadores
        cards.forEach((_, index) => {
            const indicator = document.createElement('div');
            indicator.className = 'indicator' + (index === 0 ? ' active' : '');
            indicator.addEventListener('click', () => goToSlide(index));
            indicators.appendChild(indicator);
        });

        totalNum.textContent = cards.length;

        function updateCarousel() {
            cards.forEach((card, index) => {
                card.classList.remove('active', 'prev', 'next', 'hidden');
                
                if (index === currentIndex) {
                    card.classList.add('active');
                } else if (index === currentIndex - 1) {
                    card.classList.add('prev');
                } else if (index === currentIndex + 1) {
                    card.classList.add('next');
                } else {
                    card.classList.add('hidden');
                }
            });

            // Actualizar indicadores
            document.querySelectorAll('.indicator').forEach((ind, index) => {
                ind.classList.toggle('active', index === currentIndex);
            });

            // Actualizar contador
            currentNum.textContent = currentIndex + 1;

            // Actualizar botones
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex === cards.length - 1;
        }

        function goToSlide(index) {
            currentIndex = index;
            updateCarousel();
        }

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentIndex < cards.length - 1) {
                currentIndex++;
                updateCarousel();
            }
        });

        // Navegación con teclado
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') prevBtn.click();
            if (e.key === 'ArrowRight') nextBtn.click();
        });

        // Inicializar
        updateCarousel();
    </script>
</body>
</html>