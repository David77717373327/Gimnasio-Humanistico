<!-- Navegación Principal Optimizada para SEO y Accesibilidad -->
<nav class="main-navigation navbar navbar-expand-lg" aria-label="Navegación principal">
    <div class="container-fluid">

        <!-- Logo móvil -->
        <div class="logo-mobile">
            <img src="{{ asset('images/Logo.png') }}" 
                 alt="Logo del Colegio Gimnasio Humanístico del Alto Magdalena" 
                 class="institutional-logo-mobile"
                 loading="lazy"
                 width="50" height="50">
        </div>

        <!-- Botón hamburguesa accesible -->
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav"
            aria-controls="navbarNav" 
            aria-expanded="false" 
            aria-label="Abrir o cerrar menú de navegación">

            <span class="navbar-toggler-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>
        
        <!-- Contenedor de navegación -->
        <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="navbar-nav" role="menubar">
                
                <!-- Ítems SEMÁNTICOS -->
                <li class="nav-item" role="none">
                    <a class="nav-link active" href="/" role="menuitem">Inicio</a>
                </li>

                <!-- QUIÉNES SOMOS -->
                <li class="nav-item dropdown" role="none">
                    <a class="nav-link" href="#" role="menuitem" aria-haspopup="true" aria-expanded="false">
                        Quiénes Somos
                    </a>

                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-section">
                            <h6 class="dropdown-header">Institución</h6>
                            <a class="dropdown-item" role="menuitem" href="{{ route('Historia') }}">Nuestra Historia</a>
                            <a class="dropdown-item" role="menuitem" href="{{ route('mision-vision') }}">Misión y Visión</a>
                            <a class="dropdown-item" role="menuitem" href="{{ route('filosofia_institucional') }}">Filosofía Educativa</a>
                            <a class="dropdown-item" role="menuitem" href="{{ route('simbolos') }}">Símbolos Institucionales</a>
                            <a class="dropdown-item" role="menuitem" href="{{ route('principios-valores') }}">Principios y Valores</a>
                            <a class="dropdown-item" role="menuitem" href="{{ route('politica-calidad') }}">Política de Calidad</a>
                        </div>

                        <div class="dropdown-section">
                            <h6 class="dropdown-header">Organización</h6>
                            <a class="dropdown-item" role="menuitem" href="{{ route('organigrama') }}">Organigrama</a>
                            <a class="dropdown-item" role="menuitem" href="{{ route('Grupo_humanistico') }}">Grupo Humanístico S.A.S</a>
                            <a class="dropdown-item" role="menuitem" href="{{ route('Gobierno_escolar') }}">Gobierno Escolar</a>
                            <a class="dropdown-item" role="menuitem" href="{{ route('Directivos') }}">Directivos</a>
                            <a class="dropdown-item" role="menuitem" href="{{ route('Administrativos') }}">Administrativos</a>
                            <a class="dropdown-item" role="menuitem" href="{{ route('Docentes') }}">Docentes</a>
                        </div>
                    </div>
                </li>

                <!-- PROPUESTA EDUCATIVA -->
                <li class="nav-item dropdown" role="none">
                    <a class="nav-link" href="#" role="menuitem" aria-haspopup="true" aria-expanded="false">
                        Propuesta Educativa
                    </a>
                    <div class="dropdown-menu single-column" role="menu">
                        <a class="dropdown-item" role="menuitem" href="#enfoque">Enfoque Pedagógico</a>
                    </div>
                </li>

                <!-- NIVELES -->
                <li class="nav-item dropdown" role="none">
                    <a class="nav-link" href="#" role="menuitem" aria-haspopup="true" aria-expanded="false">
                        Niveles
                    </a>
                    <div class="dropdown-menu single-column" role="menu">
                        <a class="dropdown-item" role="menuitem" href="{{ route('prescolar') }}">Educación Inicial Prescolar</a>
                        <a class="dropdown-item" role="menuitem" href="{{ route('basica_primaria') }}">Educación Básica Primaria</a>
                        <a class="dropdown-item" role="menuitem" href="{{ route('basica_segundaria') }}">Educación Básica Secundaria</a>
                        <a class="dropdown-item" role="menuitem" href="{{ route('media_academica') }}">Educación Media Académica</a>
                    </div>
                </li>

                <!-- Admisión -->
                <li class="nav-item" role="none">
                    <a class="nav-link" href="{{ route('admision') }}" role="menuitem">Admisión</a>
                </li>

                <!-- Vida estudiantil -->
                <li class="nav-item dropdown" role="none">
                    <a class="nav-link" href="#" role="menuitem" aria-haspopup="true" aria-expanded="false">
                        Vida Estudiantil
                    </a>
                    <div class="dropdown-menu single-column" role="menu">
                        <a class="dropdown-item" role="menuitem" href="#actividades">Actividades Extracurriculares</a>
                        <a class="dropdown-item" role="menuitem" href="#eventos">Eventos y Celebraciones</a>
                        <a class="dropdown-item" role="menuitem" href="{{ route('transporte') }}">Transporte Escolar</a>
                        <a class="dropdown-item" role="menuitem" href="#pastoral">Pastoral Estudiantil</a>
                    </div>
                </li>

                <!-- Contacto -->
                <li class="nav-item" role="none">
                    <a class="nav-link" href="#contacto" role="menuitem">Contacto</a>
                </li>

                <!-- Login -->
                <li class="nav-item" role="none">
                    <a class="nav-link login-btn" href="{{ route('login') }}" role="menuitem">Acceder</a>
                </li>
            </ul>

            <!-- Indicador -->
            <div class="nav-indicator"></div>
        </div>
    </div>
</nav>
