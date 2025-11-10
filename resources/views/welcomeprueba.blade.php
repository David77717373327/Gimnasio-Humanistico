<!-- SECCION DE INTRODUCCIÓN MEJORADA -->
<section class="intro-section" id="intro-section">
    <div class="intro-container">
        <div class="intro-content">
            <h2 class="intro-title">Gobierno Escolar</h2>
            <p class="intro-subtitle">Estructura organizacional y participación democrática</p>
            
            <p class="intro-text">
                El <span class="intro-highlight">Gobierno Escolar</span> está conformado por el <span class="intro-highlight">Consejo Directivo</span>, como órgano de máxima autoridad para la toma de decisiones, y el <span class="intro-highlight">Consejo Académico</span> como órgano asesor.
            </p>
            
            <div class="consejos-row">
                <div class="consejo-column">
                    <h3 class="section-subtitle">Consejo Directivo</h3>
                    <p class="intro-text-column">
                        El Consejo Directivo, como instancia directiva de toma de decisiones de la comunidad educativa y de orientación académica y administrativa del establecimiento, está conformado por:
                    </p>
                    
                    <div class="members-list">
                        <div class="member-item">
                            <span class="bullet">•</span>
                            <p class="member-text"><strong>La Rectoría</strong>, quien lo preside y lo convoca periódica y extraordinariamente cuando lo considere conveniente.</p>
                        </div>
                        <div class="member-item">
                            <span class="bullet">•</span>
                            <p class="member-text"><strong>Dos representantes del personal docente</strong>, elegidos por mayoría de votos en una Asamblea de Docentes.</p>
                        </div>
                        <div class="member-item">
                            <span class="bullet">•</span>
                            <p class="member-text"><strong>Un representante de los padres de familia</strong>, elegido por la Junta Directiva de la Asociación de Padres de Familia.</p>
                        </div>
                        <div class="member-item">
                            <span class="bullet">•</span>
                            <p class="member-text"><strong>Un representante de los estudiantes</strong>, elegido por el Consejo de Estudiantes entre los que se encuentran cursando el último grado ofrecido por la institución.</p>
                        </div>
                        <div class="member-item">
                            <span class="bullet">•</span>
                            <p class="member-text"><strong>Un representante de los exalumnos</strong>, elegido por el Consejo Directivo.</p>
                        </div>
                        <div class="member-item">
                            <span class="bullet">•</span>
                            <p class="member-text"><strong>Un representante del sector productivo</strong>, escogido por el Consejo Directivo, de candidatos propuestos por la respectiva organización.</p>
                        </div>
                        <div class="member-item">
                            <span class="bullet">•</span>
                            <p class="member-text"><strong>Un representante de los Directivos Propietarios</strong>, responsables de toda la vida y desarrollo de la institución: Grupo Humanístico SAS.</p>
                        </div>
                    </div>
                </div>
                
                <div class="consejo-column">
                    <h3 class="section-subtitle">Consejo Académico</h3>
                    <p class="intro-text-column">
                        El Consejo Académico, como instancia superior para decidir y proponer ante el Consejo Directivo; orientar los aspectos académicos, curriculares, pedagógicos, didácticos y en general formativos, está conformado por:
                    </p>
                    
                    <div class="members-list">
                        <div class="member-item">
                            <span class="bullet">•</span>
                            <p class="member-text"><strong>La Rectoría</strong>, representante legal del establecimiento ante las autoridades educativas y ejecutor de las decisiones del Gobierno Escolar y de los propietarios.</p>
                        </div>
                        <div class="member-item">
                            <span class="bullet">•</span>
                            <p class="member-text"><strong>La Coordinadora</strong>, quien dirige los niveles educativos asignados.</p>
                        </div>
                        <div class="member-item">
                            <span class="bullet">•</span>
                            <p class="member-text"><strong>Los Directivos Propietarios</strong>: Gloria Carvajal de Valderrama, Silvia Cristina Ruiz Campos y Jaime Puentes Camero.</p>
                        </div>
                        <div class="member-item">
                            <span class="bullet">•</span>
                            <p class="member-text"><strong>El jefe de cada área académica</strong>, elegido para cada año escolar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/*=============================================
    SECCIÓN DE INTRODUCCIÓN MEJORADA
==============================================*/

.intro-section {
    padding: 6rem 0;
    background: linear-gradient(to bottom, #FEFEFE 0%, #F8FAFB 100%);
}

.intro-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 3rem;
}

.intro-content {
    text-align: center;
    animation: fadeIn 1s ease-out;
}

.intro-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem, 4vw, 2.75rem);
    font-weight: 700;
    color: #0d3f27;
    margin-bottom: 1rem;
    line-height: 1.3;
    position: relative;
    display: inline-block;
}

.intro-title::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, #F4B942 0%, #E6A835 100%);
    border-radius: 2px;
}

.intro-subtitle {
    font-family: 'Open Sans', sans-serif;
    font-size: clamp(1.05rem, 2vw, 1.2rem);
    font-weight: 500;
    color: #6B7280;
    margin-bottom: 2.5rem;
    letter-spacing: 0.3px;
}

.intro-text {
    font-family: 'Open Sans', sans-serif;
    font-size: clamp(1rem, 1.8vw, 1.125rem);
    line-height: 1.85;
    color: #374151;
    text-align: center;
    max-width: 1200px;
    margin: 0 auto 3rem;
    font-weight: 400;
}

.consejos-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    margin-top: 3rem;
}

.consejo-column {
    text-align: left;
}

.section-subtitle {
    font-family: 'Playfair Display', serif;
    font-size: clamp(1.5rem, 3vw, 1.95rem);
    font-weight: 700;
    color: #065e35;
    margin-bottom: 1.5rem;
    text-align: left;
}

.intro-text-column {
    font-family: 'Open Sans', sans-serif;
    font-size: clamp(0.95rem, 1.6vw, 1.05rem);
    line-height: 1.85;
    color: #374151;
    text-align: justify;
    margin-bottom: 2rem;
    font-weight: 400;
}

.members-list {
    text-align: left;
}

.member-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.bullet {
    color: #F4B942;
    font-size: 1.3rem;
    font-weight: bold;
    margin-right: 0.8rem;
    line-height: 1.85;
    flex-shrink: 0;
}

.member-text {
    font-family: 'Open Sans', sans-serif;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
    line-height: 1.85;
    color: #374151;
    margin: 0;
    flex: 1;
}

.member-text strong {
    color: #0d3f27;
    font-weight: 600;
}

.intro-highlight {
    color: #0d3f27;
    font-weight: 600;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 992px) {
    .consejos-row {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
    
    .intro-container {
        padding: 0 2rem;
    }
}

@media (max-width: 768px) {
    .intro-section {
        padding: 4rem 0;
    }

    .intro-container {
        padding: 0 1.5rem;
    }

    .intro-title::after {
        width: 60px;
        height: 2px;
    }

    .intro-text {
        text-align: left;
    }
    
    .intro-text-column {
        text-align: left;
    }

    .member-item {
        padding-left: 0;
    }

    .bullet {
        margin-right: 0.6rem;
        font-size: 1.2rem;
    }
}
</style>