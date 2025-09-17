<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección Quiénes Somos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --institutional-green: #0d4f2b;
            --institutional-green-light: #16633a;
            --accent-gold: #f4b942;
            --text-dark: #2c3e50;
            --text-light: #6c757d;
            --white: #ffffff;
            --medium-gray: #e9ecef;
            --border-radius-xl: 20px;
            --border-radius-full: 50px;
            --transition-normal: all 0.3s ease;
            --shadow-md: 0 4px 15px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /*<!===========================================
           SECCIÓN QUIÉNES SOMOS - COMPLETAMENTE REDISEÑADA
        ===============================================*/
        .about-us-section {
            background: linear-gradient(135deg, #f8fafb 0%, #ffffff 50%, #f8fafb 100%);
            position: relative;
            overflow: hidden;
            margin-top: 0;
            padding: 5rem 0;
        }

        .about-us-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 30% 20%, rgba(13, 79, 43, 0.02) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(244, 185, 66, 0.02) 0%, transparent 50%);
            z-index: 1;
        }

        .about-us-section .container {
            position: relative;
            z-index: 2;
        }

        .about-main-title {
            font-size: clamp(2.8rem, 5.5vw, 4.2rem);
            font-weight: 800;
            color: var(--institutional-green);
            margin-bottom: 2rem;
            line-height: 1.1;
            font-family: 'Inter', 'Montserrat', sans-serif;
            letter-spacing: -0.02em;
            text-align: center;
            position: relative;
        }

        .about-main-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background: linear-gradient(135deg, var(--accent-gold), #f39c12);
            border-radius: 2px;
        }

        .about-main-subtitle {
            font-size: 1.25rem;
            color: var(--text-light);
            max-width: 900px;
            margin: 0 auto 4rem;
            line-height: 1.6;
            font-weight: 400;
            letter-spacing: 0.01em;
            text-align: center;
        }

        /* CARDS PROFESIONALES MEJORADAS */
        .about-card {
            background: var(--white);
            border-radius: var(--border-radius-xl);
            padding: 0;
            height: 100%;
            position: relative;
            transition: var(--transition-normal);
            border: 1px solid var(--medium-gray);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            cursor: pointer;
            display: flex;
            flex-direction: column;
        }

        .about-card:hover {
            transform: translateY(-12px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(13, 79, 43, 0.2);
        }

        .card-header {
            color: var(--white);
            padding: 3rem 2rem 2.5rem;
            text-align: center;
            position: relative;
            flex-shrink: 0;
        }

        .card-icon {
            width: 90px;
            height: 90px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--white);
            margin: 0 auto 2rem;
            backdrop-filter: blur(10px);
            border: 3px solid rgba(255, 255, 255, 0.3);
            transition: var(--transition-normal);
        }

        .about-card:hover .card-icon {
            transform: scale(1.15);
            background: rgba(255, 255, 255, 0.3);
        }

        .card-header h3 {
            font-size: 1.6rem;
            font-weight: 700;
            margin: 0;
            font-family: 'Inter', 'Montserrat', sans-serif;
            line-height: 1.3;
            letter-spacing: -0.01em;
        }

        .card-body {
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            text-align: center;
        }

        .card-description {
            color: var(--text-light);
            line-height: 1.8;
            font-size: 1.1rem;
            margin: 0;
            font-weight: 400;
            letter-spacing: 0.01em;
        }

        /* Colores específicos por card */
        .history-card .card-header {
            background: linear-gradient(135deg, #3498db, #2980b9);
        }

        .mission-card .card-header {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }

        .values-card .card-header {
            background: linear-gradient(135deg, #e67e22, #d35400);
        }

        .philosophy-card .card-header {
            background: linear-gradient(135deg, #9b59b6, #8e44ad);
        }

        /* Responsive mejorado */
        @media (max-width: 768px) {
            .about-us-section {
                padding: 3rem 0 4rem;
            }

            .about-card {
                margin-bottom: 2rem;
            }

            .card-header {
                padding: 2.5rem 1.5rem 2rem;
            }

            .card-body {
                padding: 2rem 1.5rem;
            }

            .card-icon {
                width: 80px;
                height: 80px;
                font-size: 2.2rem;
                margin-bottom: 1.5rem;
            }

            .about-main-title {
                font-size: clamp(2.2rem, 5vw, 3.2rem);
            }

            .card-description {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<!-- Sección Quiénes Somos Mejorada -->
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
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h3>Nuestra Historia</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            Fundado en 1999, el Colegio Gimnasio Humanístico ha sido pionero en 
                            educación integral, formando generaciones de líderes comprometidos 
                            con la excelencia académica y el desarrollo humano integral.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Misión y Visión -->
            <div class="col-lg-3 col-md-6">
                <div class="about-card mission-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Misión y Visión</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            Formar ciudadanos íntegros con pensamiento crítico, competencias 
                            globales y valores cristianos, preparados para liderar la 
                            transformación positiva de la sociedad colombiana.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Valores -->
            <div class="col-lg-3 col-md-6">
                <div class="about-card values-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Nuestros Valores</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            Respeto, responsabilidad, honestidad, solidaridad y fe cristiana 
                            son los pilares fundamentales que guían cada decisión y acción 
                            en nuestra comunidad educativa.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Filosofía Educativa -->
            <div class="col-lg-3 col-md-6">
                <div class="about-card philosophy-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3>Filosofía Educativa</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            Metodología humanística que integra tecnología, innovación 
                            pedagógica y formación en valores, desarrollando el potencial 
                            único de cada estudiante para su crecimiento integral.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>