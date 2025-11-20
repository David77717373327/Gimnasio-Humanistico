
<link rel="stylesheet" href="{{ asset('css/navegacion.css') }}">

<!-- ============================================
     NAVEGACIÓN VISUAL INSTITUCIONAL
     Sistema de navegación responsive profesional
     ============================================ -->

<section class="institutional-nav-section">
    <div class="institutional-nav-container">

        <!-- Grid de navegación - 4 columnas en desktop, adaptable en mobile -->
        <div class="institutional-nav-grid">

            <!-- Card 1: Misión y Visión -->
            <a href="{{ route('mision-vision') }}" class="nav-card-inst">
                <div class="nav-card-overlay-inst"></div>
                <div class="nav-card-content-inst">
                    <div class="nav-icon-inst">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3 class="nav-title-inst">Misión y Visión</h3>
                </div>
            </a>

            <!-- Card 2: Filosofía -->
            <a href="{{ route('filosofia_institucional') }}" class="nav-card-inst filosofia">
                <div class="nav-card-overlay-inst"></div>
                <div class="nav-card-content-inst">
                    <div class="nav-icon-inst">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="nav-title-inst">Filosofía</h3>
                </div>
            </a>

            <!-- Card 3: Principios -->
            <a href="{{ route('principios-valores') }}" class="nav-card-inst principios">
                <div class="nav-card-overlay-inst"></div>
                <div class="nav-card-content-inst">
                    <div class="nav-icon-inst">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h3 class="nav-title-inst">Principios</h3>
                </div>
            </a>

            <!-- Card 4: Símbolos -->
            <a href="{{ route('simbolos') }}" class="nav-card-inst simbolos">
                <div class="nav-card-overlay-inst"></div>
                <div class="nav-card-content-inst">
                    <div class="nav-icon-inst">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3 class="nav-title-inst">Símbolos</h3>
                </div>
            </a>

        </div>
    </div>
</section>