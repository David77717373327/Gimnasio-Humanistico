<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gobierno Escolar</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #2d5016;
            --secondary-gold: #f4b942;
            --medium-gray: #d0d0d0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
        }

        /*=============================================
            SECCIÓN DE INTRODUCCIÓN MEJORADA
        ==============================================*/
        .intro-section {
            max-width: 1300px;
            margin: 0 auto;
            padding: 6rem 1rem;
        }

        .intro-text {
            font-size: clamp(1rem, 1.8vw, 1.125rem);
            line-height: 1.85;
            color: black;
            text-align: center;
            max-width: 1000px;
            margin: 0 auto 4rem;
            text-align: justify;
            text-justify: inter-word;
        }

        .gobierno-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 4rem;
            margin-top: 3rem;
        }

        .gobierno-column {
            display: flex;
            flex-direction: column;
        }

        .column-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.5rem, 2.5vw, 1.95rem);
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 1rem;
            text-align: center;
        }

        .column-description {
            font-size: clamp(0.9rem, 1.4vw, 1rem);
            line-height: 1.7;
            color: black;
            text-align: center;
            margin-bottom: 2rem;
            min-height: 60px;
            text-align: justify;
            text-justify: inter-word;
        }

        /* FLIP CARD */
        .flip-card {
            perspective: 1000px;
            height: 480px;
            width: 100%;
            cursor: pointer;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            border: 1px solid var(--medium-gray);
        }

        /* FRONT */
        .flip-card-front {
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem 2rem;
        }

        .card-icon {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            margin-bottom: 2rem;
            overflow: hidden;
            border: 3px solid var(--secondary-gold);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .front-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .front-subtitle {
            font-size: 1.1rem;
            color: black;
            text-align: center;
        }

        .hover-hint {
            position: absolute;
            bottom: 25px;
            font-size: 0.85rem;
            color: black;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* BACK */
        .flip-card-back {
            background: white;
            transform: rotateY(180deg);
            padding: 2.5rem 2rem;
            overflow-y: auto;
        }

        .back-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 1.5rem;
            text-align: center;
            padding-bottom: 1rem;
            border-bottom: solid 2px var(--primary-green);
        }

        .members-list {
            display: flex;
            flex-direction: column;
            gap: 0rem;
        }

        .member-item {
            display: flex;
            align-items: flex-start;
            padding: 0;
        }

        .bullet {
            color: #000000;
            font-size: 1.3rem;
            font-weight: bold;
            margin-right: 1rem;
            line-height: 1.6;
            flex-shrink: 0;
        }

        .member-text {
            font-size: 0.85rem;
            line-height: 1.7;
            color: black;
            flex: 1;
        }

        .member-text strong {
            color: #000000;
            font-weight: 600;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .gobierno-grid {
                grid-template-columns: 1fr;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 2rem 0.5rem;
            }

            .flip-card {
                height: 450px;
            }

            .card-icon {
                width: 130px;
                height: 130px;
            }

            .front-title {
                font-size: 1.7rem;
            }

            .front-subtitle {
                font-size: 1rem;
            }

            .flip-card-back {
                padding: 2rem 1.5rem;
            }

            .back-title {
                font-size: 1.3rem;
            }

            .member-text {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .flip-card {
                height: 420px;
            }

            .card-icon {
                width: 110px;
                height: 110px;
            }

            .front-title {
                font-size: 1.5rem;
            }

            .hover-hint {
                font-size: 0.75rem;
                bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <section class="intro-section">
        <p class="intro-text">
            El Gobierno Escolar está conformado por el Consejo Directivo, como órgano de máxima autoridad para la toma de decisiones, y el Consejo Académico como órgano asesor.
        </p>

        <div class="gobierno-grid">
            <!-- RECTORÍA -->
            <div class="gobierno-column">
                <h3 class="column-title">Rectoría</h3>
                <p class="column-description">
                    Máxima autoridad ejecutiva del establecimiento, responsable de la representación legal y ejecución de decisiones del Gobierno Escolar.
                </p>
                
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-icon">
                                <img src="URL_DE_TU_IMAGEN_RECTORIA" alt="Rectoría">
                            </div>
                            <h4 class="front-title">Rectoría</h4>
                            <p class="front-subtitle">Representación Legal</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Rectoría</h5>
                            <div class="members-list">
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Representante legal</strong> del establecimiento ante las autoridades educativas y ejecutor de las decisiones del Gobierno Escolar y de los propietarios.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Preside y convoca</strong> tanto al Consejo Directivo como al Consejo Académico periódica y extraordinariamente cuando lo considere conveniente.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Responsable</strong> de la dirección general y coordinación de todas las actividades institucionales.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONSEJO DIRECTIVO -->
            <div class="gobierno-column">
                <h3 class="column-title">Consejo Directivo</h3>
                <p class="column-description">
                    Instancia directiva de toma de decisiones de la comunidad educativa y de orientación académica y administrativa del establecimiento.
                </p>
                
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-icon">
                                <img src="URL_DE_TU_IMAGEN_CONSEJO_DIRECTIVO" alt="Consejo Directivo">
                            </div>
                            <h4 class="front-title">Consejo Directivo</h4>
                            <p class="front-subtitle">Órgano de Decisión</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Miembros del Consejo</h5>
                            <div class="members-list">
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>La Rectoría</strong>, quien lo preside y lo convoca periódica y extraordinariamente.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Dos representantes del personal docente</strong>, elegidos por mayoría de votos en una Asamblea de Docentes.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Un representante de los padres de familia</strong>, elegido por la Junta Directiva de la Asociación de Padres de Familia.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Un representante de los estudiantes</strong>, elegido por el Consejo de Estudiantes entre los del último grado.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Un representante de los exalumnos</strong>, elegido por el Consejo Directivo.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Un representante del sector productivo</strong>, escogido de candidatos propuestos por la respectiva organización.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Un representante de los Directivos Propietarios</strong>: Grupo Humanístico SAS.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONSEJO ACADÉMICO -->
            <div class="gobierno-column">
                <h3 class="column-title">Consejo Académico</h3>
                <p class="column-description">
                    Instancia superior para decidir y proponer orientaciones en aspectos académicos, curriculares, pedagógicos y formativos.
                </p>
                
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-icon">
                                <img src="URL_DE_TU_IMAGEN_CONSEJO_ACADEMICO" alt="Consejo Académico">
                            </div>
                            <h4 class="front-title">Consejo Académico</h4>
                            <p class="front-subtitle">Órgano Asesor</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Miembros del Consejo</h5>
                            <div class="members-list">
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>La Rectoría</strong>, representante legal del establecimiento ante las autoridades educativas y ejecutor de las decisiones del Gobierno Escolar y de los propietarios.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>La Coordinadora</strong>, quien dirige los niveles educativos asignados.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Los Directivos Propietarios</strong>: Gloria Carvajal de Valderrama, Silvia Cristina Ruiz Campos y Jaime Puentes Camero.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>El jefe de cada área académica</strong>, elegido para cada año escolar.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>