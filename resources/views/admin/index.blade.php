@extends('layouts.master')

@section('content')
<div class="container mx-auto px-6 py-8 relative overflow-hidden" id="dashboard-container">
    <h1 class="text-4xl font-bold text-green-800 mb-8 text-center relative z-10">Gestión Administrativa del Colegio</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative z-10">
        <!-- Módulo Horarios -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer module-card" onclick="expandCard(this)">
            <i class="fas fa-clock text-green-600 text-3xl mb-4"></i>
            <h2 class="text-xl font-semibold text-green-700 mb-2">Horarios</h2>
            <p class="text-gray-600">Gestiona y visualiza los horarios de clases de manera eficiente.</p>
            <a href="#" class="mt-4 inline-block text-green-600 hover:text-green-800 font-medium">Ver detalles <i class="fas fa-arrow-right"></i></a>
        </div>

        <!-- Módulo Llamado a Lista -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer module-card" onclick="expandCard(this)">
            <i class="fas fa-list-check text-green-600 text-3xl mb-4"></i>
            <h2 class="text-xl font-semibold text-green-700 mb-2">Llamado a Lista</h2>
            <p class="text-gray-600">Registra la asistencia de los estudiantes en tiempo real.</p>
            <a href="#" class="mt-4 inline-block text-green-600 hover:text-green-800 font-medium">Ver detalles <i class="fas fa-arrow-right"></i></a>
        </div>

        <!-- Módulo Estudiantes Destacados -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer module-card" onclick="expandCard(this)">
            <i class="fas fa-star text-green-600 text-3xl mb-4"></i>
            <h2 class="text-xl font-semibold text-green-700 mb-2">Estudiantes Destacados</h2>
            <p class="text-gray-600">Reconoce el rendimiento académico de los alumnos destacados.</p>
            <a href="#" class="mt-4 inline-block text-green-600 hover:text-green-800 font-medium">Ver detalles <i class="fas fa-arrow-right"></i></a>
        </div>

        <!-- Módulo Profesores Información -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer module-card" onclick="expandCard(this)">
            <i class="fas fa-chalkboard-teacher text-green-600 text-3xl mb-4"></i>
            <h2 class="text-xl font-semibold text-green-700 mb-2">Profesores Información</h2>
            <p class="text-gray-600">Consulta los datos y horarios de los profesores.</p>
            <a href="#" class="mt-4 inline-block text-green-600 hover:text-green-800 font-medium">Ver detalles <i class="fas fa-arrow-right"></i></a>
        </div>

        <!-- Módulo Inscripciones -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer module-card" onclick="expandCard(this)">
            <i class="fas fa-user-plus text-green-600 text-3xl mb-4"></i>
            <h2 class="text-xl font-semibold text-green-700 mb-2">Inscripciones</h2>
            <p class="text-gray-600">Administra las inscripciones de nuevos estudiantes.</p>
            <a href="#" class="mt-4 inline-block text-green-600 hover:text-green-800 font-medium">Ver detalles <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>

<style>
    #dashboard-container {
        background: linear-gradient(135deg, #f0f9f0 0%, #e6f3e6 100%);
        min-height: calc(100vh - 64px - 64px); /* Ajuste para header y padding */
    }

    .module-card {
        position: relative;
        overflow: hidden;
    }

    .module-card.expanded {
        transform: scale(1.05) !important;
        box-shadow: 0 10px 20px rgba(0, 77, 0, 0.2) !important;
        z-index: 20;
    }

    .module-card.expanded::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 77, 0, 0.1);
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.2); opacity: 0; }
        100% { transform: scale(1); opacity: 0.5; }
    }

    .dark-mode #dashboard-container {
        background: linear-gradient(135deg, #1a2a1a 0%, #1e2e1e 100%);
    }
</style>

<script>
    function expandCard(card) {
        const cards = document.querySelectorAll('.module-card');
        cards.forEach(c => c.classList.remove('expanded'));
        card.classList.add('expanded');
        setTimeout(() => card.classList.remove('expanded'), 2000); // Regresa después de 2 segundos
    }

    // Añadir efecto de hover con sonido (simulado)
    const cards = document.querySelectorAll('.module-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
            card.style.transform = 'translateY(-5px)';
            card.style.boxShadow = '0 8px 15px rgba(0, 77, 0, 0.3)';
        });
        card.addEventListener('mouseleave', () => {
            if (!card.classList.contains('expanded')) {
                card.style.transform = 'translateY(0)';
                card.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.1)';
            }
        });
    });
</script>
@endsection

