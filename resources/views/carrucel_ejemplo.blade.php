<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objetivos Básica Primaria - Carrusel 3D</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, #0d3f27 0%, #065e35 100%);
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
            color: #F4B942;
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
            background: linear-gradient(135deg, #F4B942, #E6A835);
            color: white;
            border-radius: 50px;
            margin-bottom: 1.5rem;
        }

        .card-number {
            font-family: 'Montserrat', sans-serif;
            font-size: 5rem;
            font-weight: 900;
            color: rgba(13, 63, 39, 0.1);
            position: absolute;
            top: 1rem;
            right: 2rem;
            line-height: 1;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #0d3f27;
            margin-bottom: 1.5rem;
            line-height: 1.3;
            position: relative;
            z-index: 1;
        }

        .card-text {
            font-size: 1.0625rem;
            line-height: 1.8;
            color: #374151;
            text-align: justify;
            margin-bottom: 2rem;
        }

        .card-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #0d3f27, #065e35);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 25px rgba(13, 63, 39, 0.3);
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
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #0d3f27;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .control-btn:hover {
            background: #F4B942;
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
            background: #F4B942;
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

            .card-icon {
                width: 60px;
                height: 60px;
                font-size: 2rem;
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
        <h1 class="main-title">Objetivos Básica Primaria</h1>
        <p class="subtitle">Explora cada objetivo de formación integral</p>
    </div>

    <div class="progress-counter">
        <span id="currentNum">1</span> / <span id="totalNum">15</span>
    </div>

    <div class="carousel-container">
        <div class="carousel-track" id="carouselTrack">
            <!-- Tarjeta 1 -->
            <div class="carousel-card active">
                <div class="card-icon">🎓</div>
                <div class="card-number">01</div>
                <span class="card-category-badge">Valores y Ciudadanía</span>
                <h3 class="card-title">Valores para la Convivencia</h3>
                <p class="card-text">La formación de los valores fundamentales para la convivencia de una sociedad democrática, participativa y pluralista.</p>
            </div>

            <!-- Tarjeta 2 -->
            <div class="carousel-card next">
                <div class="card-icon">🤝</div>
                <div class="card-number">02</div>
                <span class="card-category-badge">Valores y Ciudadanía</span>
                <h3 class="card-title">Valores Cívicos y Morales</h3>
                <p class="card-text">El desarrollo de valores civiles y morales de organización social y de convivencia humana.</p>
            </div>

            <!-- Tarjeta 3 -->
            <div class="carousel-card hidden">
                <div class="card-icon">📜</div>
                <div class="card-number">03</div>
                <span class="card-category-badge">Valores y Ciudadanía</span>
                <h3 class="card-title">Educación Constitucional</h3>
                <p class="card-text">La iniciación en el conocimiento de la constitución política.</p>
            </div>

            <!-- Tarjeta 4 -->
            <div class="carousel-card hidden">
                <div class="card-icon">👥</div>
                <div class="card-number">04</div>
                <span class="card-category-badge">Valores y Ciudadanía</span>
                <h3 class="card-title">Participación Infantil</h3>
                <p class="card-text">La formación para la participación y organización infantil y la utilización adecuada del tiempo libre.</p>
            </div>

            <!-- Tarjeta 5 -->
            <div class="carousel-card hidden">
                <div class="card-icon">💡</div>
                <div class="card-number">05</div>
                <span class="card-category-badge">Desarrollo Académico</span>
                <h3 class="card-title">Deseo de Saber</h3>
                <p class="card-text">El fomento del deseo del saber, de la iniciativa personal frente al conocimiento y frente a la realidad social, así como el espíritu crítico.</p>
            </div>

            <!-- Tarjeta 6 -->
            <div class="carousel-card hidden">
                <div class="card-icon">✍️</div>
                <div class="card-number">06</div>
                <span class="card-category-badge">Desarrollo Académico</span>
                <h3 class="card-title">Habilidades Comunicativas</h3>
                <p class="card-text">El desarrollo de las habilidades comunicativas básicas para leer, comprender, escribir, escuchar, hablar y expresarse correctamente en lengua castellana, así como el fomento de la afición por la lectura.</p>
            </div>

            <!-- Tarjeta 7 -->
            <div class="carousel-card hidden">
                <div class="card-icon">🎨</div>
                <div class="card-number">07</div>
                <span class="card-category-badge">Desarrollo Académico</span>
                <h3 class="card-title">Expresión Estética</h3>
                <p class="card-text">El desarrollo de la capacidad para apreciar y utilizar la lengua como medio de expresión estética.</p>
            </div>

            <!-- Tarjeta 8 -->
            <div class="carousel-card hidden">
                <div class="card-icon">🔢</div>
                <div class="card-number">08</div>
                <span class="card-category-badge">Desarrollo Académico</span>
                <h3 class="card-title">Pensamiento Matemático</h3>
                <p class="card-text">El desarrollo de los conocimientos matemáticos necesarios para manejar y utilizar operaciones simples de cálculo y procedimientos lógicos elementales en diferentes situaciones.</p>
            </div>

            <!-- Tarjeta 9 -->
            <div class="carousel-card hidden">
                <div class="card-icon">🌍</div>
                <div class="card-number">09</div>
                <span class="card-category-badge">Desarrollo Académico</span>
                <h3 class="card-title">Comprensión del Medio</h3>
                <p class="card-text">La comprensión básica del medio físico, social y cultural en el nivel local, nacional y universal, de acuerdo con el desarrollo intelectual correspondiente a su edad.</p>
            </div>

            <!-- Tarjeta 10 -->
            <div class="carousel-card hidden">
                <div class="card-icon">📚</div>
                <div class="card-number">10</div>
                <span class="card-category-badge">Desarrollo Académico</span>
                <h3 class="card-title">Asimilación de Conceptos</h3>
                <p class="card-text">La asimilación de conceptos en áreas del conocimiento que sean objeto de estudio, de acuerdo con el desarrollo intelectual y la edad.</p>
            </div>

            <!-- Tarjeta 11 -->
            <div class="carousel-card hidden">
                <div class="card-icon">🌐</div>
                <div class="card-number">11</div>
                <span class="card-category-badge">Desarrollo Académico</span>
                <h3 class="card-title">Lengua Extranjera</h3>
                <p class="card-text">La adquisición de elementos de conversación y de lectura al menos en una lengua extranjera.</p>
            </div>

            <!-- Tarjeta 12 -->
            <div class="carousel-card hidden">
                <div class="card-icon">🏥</div>
                <div class="card-number">12</div>
                <span class="card-category-badge">Desarrollo Físico</span>
                <h3 class="card-title">Salud y Cuidado Personal</h3>
                <p class="card-text">La valoración de la higiene y la salud del propio cuerpo y la formación para la protección de la naturaleza y el ambiente.</p>
            </div>

            <!-- Tarjeta 13 -->
            <div class="carousel-card hidden">
                <div class="card-icon">⚽</div>
                <div class="card-number">13</div>
                <span class="card-category-badge">Desarrollo Físico</span>
                <h3 class="card-title">Educación Física y Deportes</h3>
                <p class="card-text">El conocimiento y ejercitación del propio cuerpo mediante la práctica de la educación física, la recreación y los deportes adecuados a su edad.</p>
            </div>

            <!-- Tarjeta 14 -->
            <div class="carousel-card hidden">
                <div class="card-icon">🎭</div>
                <div class="card-number">14</div>
                <span class="card-category-badge">Desarrollo Físico</span>
                <h3 class="card-title">Formación Artística</h3>
                <p class="card-text">La formación artística mediante la expresión corporal, la representación, la música, la plástica y la literatura.</p>
            </div>

            <!-- Tarjeta 15 -->
            <div class="carousel-card hidden">
                <div class="card-icon">🎯</div>
                <div class="card-number">15</div>
                <span class="card-category-badge">Habilidades Sociales</span>
                <h3 class="card-title">Autonomía Personal</h3>
                <p class="card-text">La adquisición de habilidades para desempeñarse con autonomía en la sociedad.</p>
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