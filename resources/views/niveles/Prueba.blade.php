<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios y Aulas - Educación Media</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #0d3f27;
            --accent-gold: #f4b942;
            --white: #ffffff;
            --transition-normal: 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* ============================================
           HEADER SECTION
        ============================================ */
        .admision-nav-header {
            text-align: center;
            margin-top: 4rem;
            position: relative;
            z-index: 2;
            animation: fadeInDown 0.6s ease-out;
            padding: 2rem 0 1.5rem;
            background: linear-gradient(180deg, rgba(244, 185, 66, 0.02) 0%, transparent 100%);
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

        .header-content-wrapper {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 2rem;
            max-width: 900px;
            margin-left: 70px;
        }

        .header-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            flex-shrink: 0;
            margin-top: 20px;
            margin-right: 90px;
        }

        .header-text-content {
            flex: 1;
            text-align: center;
            min-width: 0;
        }

        .header-label {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 1rem;
            background: linear-gradient(135deg, rgba(244, 185, 66, 0.12) 0%, rgba(244, 185, 66, 0.08) 100%);
            border-radius: 50px;
            margin-bottom: 1rem;
            border: 1px solid rgba(244, 185, 66, 0.25);
            box-shadow: 0 2px 8px rgba(244, 185, 66, 0.1);
        }

        .label-icon {
            color: #f4b942;
            font-size: 0.85rem;
            animation: pulse 2.5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.75;
                transform: scale(1.08);
            }
        }

        .label-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary-green);
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .admision-nav-title {
            font-family: 'Times New Roman', Times, serif;
            font-size: clamp(3rem, 5vw, 3.8rem);
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 0.8rem;
            letter-spacing: -0.5px;
            line-height: 1.2;
        }

        .admision-nav-subtitle {
            font-family: 'Open Sans', sans-serif;
            font-size: 1.09rem;
            color: black;
            font-weight: 400;
            line-height: 1.8;
            max-width: 620px;
            margin: 0 auto;
        }

        /* ============================================
           SECCIÓN HORARIOS Y AULAS
        ============================================ */
        .horarios-aulas-section {
            padding: 0.45rem 0 3rem;
            background: linear-gradient(180deg, #FFFFFF 0%, #F8FAFB 100%);
        }

        .horarios-aulas-section .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .modalidad-badge {
            display: inline-block;
            background: var(--primary-green);
            color: white;
            padding: 12px 28px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 50px;
            margin-left: 36%;
        }

        /* GRID DE AULAS - 1 FILA x 2 COLUMNAS */
        .aulas-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2.5rem;
            margin-bottom: 2rem;
        }

        .aula-item {
            position: relative;
        }

        /* WRAPPER DE IMAGEN */
        .aula-image {
            position: relative;
            width: 100%;
            padding-bottom: 35%;
            overflow: hidden;
            background: #f0f0f0;
            border-radius: 0;
        }

        .aula-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
            border-radius: 0;
        }

        .aula-item:hover .aula-image img {
            transform: scale(1.05);
        }

        /* OVERLAY CON NIVEL */
        .aula-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(13, 63, 39, 0.3) 100%);
            display: flex;
            align-items: flex-end;
            padding: 1.25rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .aula-item:hover .aula-overlay {
            opacity: 1;
        }

        .aula-nivel {
            font-family: "Lucida Calligraphy", "Lucida Handwriting", cursive;
            font-size: 1.375rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: white;
        }

        /* CONTENIDO DE AULA */
        .aula-info {
            margin-top: 28px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .aula-info h4 {
            font-family: "Lucida Calligraphy", "Lucida Handwriting", cursive;
            font-size: 1.9rem;
            font-weight: 700;
            color: var(--primary-green);
            margin: 0 0 0.5rem 0;
        }

        .aula-info p {
            font-size: 0.98rem;
            color: black;
            line-height: 1.5;
            margin: 0;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .aulas-grid {
                gap: 1.5rem;
            }

            .header-content-wrapper {
                margin-left: 0;
            }

            .header-logo {
                margin-right: 30px;
            }
        }

        @media (max-width: 768px) {
            .horarios-aulas-section {
                padding: 2.5rem 0 2rem;
            }

            .header-content-wrapper {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }

            .header-logo {
                margin: 0 0 0.5rem 0;
                width: 80px;
                height: 80px;
            }

            .modalidad-badge {
                margin-left: 0;
                width: 100%;
                text-align: center;
            }

            .aulas-grid {
                grid-template-columns: 1fr;
                gap: 1.25rem;
                margin-bottom: 1.5rem;
            }

            .aula-info h4 {
                font-size: 1.5rem;
            }

            .aula-info p {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .admision-nav-header {
                margin-top: 2rem;
            }

            .header-logo {
                width: 60px;
                height: 60px;
            }

            .admision-nav-title {
                font-size: 2rem;
            }

            .admision-nav-subtitle {
                font-size: 0.95rem;
            }

            .modalidad-badge {
                font-size: 0.8rem;
                padding: 10px 20px;
            }

            .aula-image {
                padding-bottom: 45%;
            }

            .aula-info h4 {
                font-size: 1.3rem;
            }

            .aula-info p {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .horarios-aulas-section {
                padding: 2rem 0 1.5rem;
            }

            .aulas-grid {
                gap: 1rem;
            }

            .aula-image {
                padding-bottom: 50%;
            }

            .aula-info {
                padding: 0.875rem;
            }
        }
    </style>
</head>
<body>
    <!-- Horarios y Aulas - Educación Media -->
    <div class="horarios-aulas-section">
        <div class="container">
            <!-- Header de la sección con logo -->
            <div class="admision-nav-header">
                <div class="header-content-wrapper">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Colegio" class="header-logo">
                    <div class="header-text-content">
                        <div class="header-label">
                            <span class="label-icon">✦</span>
                            <span class="label-text">Información Institucional</span>
                        </div>
                        <h2 class="admision-nav-title">Horarios y Aulas</h2>
                        <p class="admision-nav-subtitle">
                            Espacios especializados diseñados para potenciar el aprendizaje y desarrollo académico 
                            de nuestros estudiantes de educación media.
                        </p>
                    </div>
                </div>
            </div>

            <span class="modalidad-badge">Lunes a Viernes • 7:00 AM - 1:30 PM</span>

            <!-- Aulas por Nivel -->
            <div class="aulas-grid">
                <div class="aula-item">
                    <div class="aula-image">
                        <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Décimo">
                        <div class="aula-overlay">
                            <span class="aula-nivel">Décimo</span>
                        </div>
                    </div>
                    
                    <div class="aula-info">
                        <h4>Décimo Grado</h4>
                        <p>
                            Aulas equipadas con tecnología avanzada, recursos multimedia y espacios para trabajo 
                            colaborativo que facilitan la preparación para la educación superior y el desarrollo 
                            de proyectos de investigación.
                        </p>
                    </div>
                </div>

                <div class="aula-item">
                    <div class="aula-image">
                        <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Once">
                        <div class="aula-overlay">
                            <span class="aula-nivel">Once</span>
                        </div>
                    </div>
                    
                    <div class="aula-info">
                        <h4>Once Grado</h4>
                        <p>
                            Salones especializados con laboratorios integrados, biblioteca digital y espacios de 
                            estudio individual, diseñados específicamente para la preparación de las pruebas Saber 11 
                            y la transición a la universidad.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>