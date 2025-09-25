

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

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            <i class="fas fa-home"></i>
                            INICIO
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-users"></i>
                            QUIÉNES SOMOS
                        </a>
                        <div class="dropdown-menu mega-dropdown">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="dropdown-header">Institución</h6>
                                        <a class="dropdown-item" href="{{ route('Historia') }}">
                                            <i class="fas fa-history"></i>
                                            Nuestra Historia
                                        </a>
                                        <a class="dropdown-item" href="{{ 'mision-vision'}}">
                                            <i class="fas fa-eye"></i>
                                            Misión y Visión
                                        </a>
                                        <a class="dropdown-item" href="#valores">
                                            <i class="fas fa-heart"></i>
                                            Valores Institucionales
                                        </a>
                                        <a class="dropdown-item" href="#filosofia">
                                            <i class="fas fa-lightbulb"></i>
                                            Filosofía Educativa
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="dropdown-header">Organización</h6>
                                        <a class="dropdown-item" href="#directorio">
                                            <i class="fas fa-users-cog"></i>
                                            Directorio
                                        </a>
                                        <a class="dropdown-item" href="#plana-docente">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                            Plana Docente
                                        </a>
                                        <a class="dropdown-item" href="#organigrama">
                                            <i class="fas fa-sitemap"></i>
                                            Organigrama
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="dropdown-header">Reconocimientos</h6>
                                        <a class="dropdown-item" href="#premios">
                                            <i class="fas fa-trophy"></i>
                                            Premios y Logros
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-graduation-cap"></i>
                            PROPUESTA EDUCATIVA
                        </a>
                        <div class="dropdown-menu mega-dropdown">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="dropdown-header">Metodología</h6>
                                        <a class="dropdown-item" href="#enfoque-pedagogico">
                                            <i class="fas fa-brain"></i>
                                            Enfoque Pedagógico
                                        </a>
                                        <a class="dropdown-item" href="#tecnologia">
                                            <i class="fas fa-laptop-code"></i>
                                            Tecnología Educativa
                                        </a>
                                        <a class="dropdown-item" href="#bilinguismo">
                                            <i class="fas fa-globe"></i>
                                            Educación Bilingüe
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="dropdown-header">Formación Integral</h6>
                                        <a class="dropdown-item" href="#valores-cristianos">
                                            <i class="fas fa-cross"></i>
                                            Valores Cristianos
                                        </a>
                                        <a class="dropdown-item" href="#liderazgo">
                                            <i class="fas fa-crown"></i>
                                            Formación en Liderazgo
                                        </a>
                                        <a class="dropdown-item" href="#artes">
                                            <i class="fas fa-palette"></i>
                                            Artes y Cultura
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-school"></i>
                            NIVELES
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#prescolar">
                                <i class="fas fa-child"></i>
                                Educación Prescolar
                            </a>
                            <a class="dropdown-item" href="#primaria">
                                <i class="fas fa-book"></i>
                                Educación Básica Primaria
                            </a>
                            <a class="dropdown-item" href="#secundaria">
                                <i class="fas fa-users"></i>
                                Educación Básica Secundaria
                            </a>
                            <a class="dropdown-item" href="#media">
                                <i class="fas fa-graduation-cap"></i>
                                Educación Media Académica
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-door-open"></i>
                            ADMISIÓN
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#proceso">
                                <i class="fas fa-info-circle"></i>
                                Proceso de Admisión
                            </a>
                            <a class="dropdown-item" href="#cronograma">
                                <i class="fas fa-calendar-alt"></i>
                                Cronograma 2025
                            </a>
                            <a class="dropdown-item" href="#requisitos">
                                <i class="fas fa-file-alt"></i>
                                Requisitos
                            </a>
                            <a class="dropdown-item" href="#costos">
                                <i class="fas fa-dollar-sign"></i>
                                Costos y Pensiones
                            </a>
                            <a class="dropdown-item" href="#becas">
                                <i class="fas fa-hand-holding-usd"></i>
                                Becas y Descuentos
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-smile"></i>
                            VIDA ESTUDIANTIL
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#actividades">
                                <i class="fas fa-calendar-check"></i>
                                Actividades Extracurriculares
                            </a>
                            <a class="dropdown-item" href="#eventos">
                                <i class="fas fa-calendar-star"></i>
                                Eventos y Celebraciones
                            </a>
                            <a class="dropdown-item" href="#cafeteria">
                                <i class="fas fa-utensils"></i>
                                Servicio de Alimentación
                            </a>
                            <a class="dropdown-item" href="#transporte">
                                <i class="fas fa-bus"></i>
                                Transporte Escolar
                            </a>
                            <a class="dropdown-item" href="#pastoral">
                                <i class="fas fa-praying-hands"></i>
                                Pastoral Estudiantil
                            </a>
                        </div>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">
                            <i class="fas fa-envelope"></i>
                            CONTACTO
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link login-btn" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i>
                            ACCEDER
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</html>
