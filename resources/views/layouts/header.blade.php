<!-- Header Institucional Mejorado -->
<div class="logo-bar">
    <div class="container-fluid">
        <div class="institutional-header">
            <!-- Solo un logo a la izquierda -->
            <div class="logo-container">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo Colegio Gimnasio Humanístico"
                    class="institutional-logo">
            </div>

            <!-- Título modernizado -->
            <div class="institutional-title">
                <h1 class="college-main-title">
                    <span class="title-line-1">COLEGIO GIMNASIO HUMANÍSTICO</span>
                    <span class="title-line-2">DEL ALTO MAGDALENA</span>
                    <span class="title-line-3">Neiva, Huila</span>
                </h1>
            </div>
        </div>
    </div>
</div>

<!-- Navegación Principal Mejorada -->
<nav class="main-navigation navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>

        
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/">INICIO</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">QUIÉNES SOMOS</a>
                    <div class="dropdown-menu">
                        <div class="dropdown-section">
                            <h6 class="dropdown-header">Institución</h6>
                            <a class="dropdown-item" href="{{ route('Historia') }}">Nuestra Historia</a>
                            <a class="dropdown-item" href="{{ 'mision-vision'}}">Misión y Visión</a>
                            <a class="dropdown-item" href="{{ route('filosofia_institucional') }}">Filosofía Educativa</a>
                        </div>
                        <div class="dropdown-section">
                            <h6 class="dropdown-header">Organización</h6>
                            <a class="dropdown-item" href="#directorio">Directorio</a>
                            <a class="dropdown-item" href="#plana-docente">Símbolos Institucionales</a>
                            <a class="dropdown-item" href="#organigrama">Organigrama</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">PROPUESTA EDUCATIVA</a>
                    <div class="dropdown-menu single-column">
                        <a class="dropdown-item" href="{{ route('prescolar') }}">Enfoque Pedagógico</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">NIVELES</a>
                    <div class="dropdown-menu single-column">
                        <a class="dropdown-item" href="{{ route('prescolar') }}">Educación Inicial Prescolar</a>
                        <a class="dropdown-item" href="{{ route('basica_primaria') }}">Educación Básica Primaria</a>
                        <a class="dropdown-item" href="#secundaria">Educación Básica Secundaria</a>
                        <a class="dropdown-item" href="#media">Educación Media Académica</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ 'admision' }}">ADMISIÓN</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">VIDA ESTUDIANTIL</a>
                    <div class="dropdown-menu single-column">
                        <a class="dropdown-item" href="#actividades">Actividades Extracurriculares</a>
                        <a class="dropdown-item" href="#eventos">Eventos y Celebraciones</a>
                        <a class="dropdown-item" href="#cafeteria">Servicio de Alimentación</a>
                        <a class="dropdown-item" href="#transporte">Transporte Escolar</a>
                        <a class="dropdown-item" href="#pastoral">Pastoral Estudiantil</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contacto">CONTACTO</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link login-btn" href="{{ route('login') }}">ACCEDER</a>
                </li>
            </ul>
        </div>
    </div>
</nav>