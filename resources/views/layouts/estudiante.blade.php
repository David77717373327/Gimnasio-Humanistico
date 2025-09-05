<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - EduConnect</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Font Awesome for dropdown icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/estudiante.css') }}">
</head>
<body>
    <!-- Floating School Emojis -->
    <div class="floating-emojis" style="font-size: 2rem;">📚</div>
    <div class="floating-emojis" style="font-size: 1.5rem;">✏️</div>
    <div class="floating-emojis" style="font-size: 2.5rem;">🎓</div>
    <div class="floating-emojis" style="font-size: 1.8rem;">📖</div>

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand">
                <i class="bi bi-mortarboard-fill"></i>
                <span>EduConnect</span>
            </div>
        </div>
        <div class="sidebar-nav">
            <a href="#" class="nav-link active">
                <i class="bi bi-house-fill"></i>
                <span>Inicio</span>
                <div class="tooltip-text">Inicio</div>
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-book-fill"></i>
                <span>Cursos</span>
                <div class="tooltip-text">Cursos</div>
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-list-task"></i>
                <span>Tareas</span>
                <div class="tooltip-text">Tareas</div>
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-bar-chart-fill"></i>
                <span>Calificaciones</span>
                <div class="tooltip-text">Calificaciones</div>
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-person-fill"></i>
                <span>Perfil</span>
                <div class="tooltip-text">Perfil</div>
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-gear-fill"></i>
                <span>Configuración</span>
                <div class="tooltip-text">Configuración</div>
            </a>
        </div>
    </nav>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <div class="header-title">
                    @auth
                        {{ Auth::user()->gender === 'female' ? 'Bienvenida' : 'Bienvenido' }} {{ Auth::user()->name }} 🎓
                    @else
                        Bienvenido/a Invitado/a 🎓
                    @endauth
                </div>
            </div>
            <div class="header-right">
                
                <!-- Perfil de Usuario -->
                <div class="control-item dropdown">
                    <button class="control-btn user-btn" data-bs-toggle="dropdown">
                        <img src="{{ asset('images/Usuario.png') }}" class="user-avatar" alt="Usuario">
                        <div class="user-info">
                            <span class="user-name">@auth {{ Auth::user()->name }} @endauth</span>
                            <span class="user-role">@auth {{ Auth::user()->role }} @endauth</span>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu user-dropdown">
                        <div class="dropdown-header">
                            <div class="user-card">
                                <img src="{{ asset('images/Usuario.png') }}" class="user-card-avatar" alt="Usuario">
                                <div>
                                    <h6>@auth {{ Auth::user()->name }} @endauth</h6>
                                    <p>@auth {{ Auth::user()->email }} @endauth</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-body">
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user"></i>Mi Perfil
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-cog"></i>Configuración
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-question-circle"></i>Ayuda
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item logout-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <h1 class="page-title">Dashboard Estudiantil</h1>
            <p class="page-subtitle">¡Bienvenida a tu espacio de aprendizaje! Aquí puedes ver tu progreso académico</p>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Materias Activas</div>
                        <div class="stat-icon blue">
                            <i class="bi bi-book"></i>
                        </div>
                    </div>
                    <div class="stat-value">6</div>
                    <div class="stat-label">Este semestre</div>
                    <div class="stat-progress">
                        <div class="stat-progress-bar" style="width: 85%;"></div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Tareas Pendientes</div>
                        <div class="stat-icon orange">
                            <i class="bi bi-clock-history"></i>
                        </div>
                    </div>
                    <div class="stat-value">4</div>
                    <div class="stat-label">Por entregar esta semana</div>
                    <div class="stat-progress">
                        <div class="stat-progress-bar" style="width: 60%;"></div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Promedio General</div>
                        <div class="stat-icon green">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                    </div>
                    <div class="stat-value">8.7</div>
                    <div class="stat-label">¡Excelente desempeño!</div>
                    <div class="stat-progress">
                        <div class="stat-progress-bar" style="width: 87%;"></div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Próximos Eventos</div>
                        <div class="stat-icon purple">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                    </div>
                    <div class="stat-value">2</div>
                    <div class="stat-label">Exámenes esta semana</div>
                    <div class="stat-progress">
                        <div class="stat-progress-bar" style="width: 40%;"></div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="quick-actions-section">
                <div class="section-title">
                    <h3>🚀 Acciones Rápidas</h3>
                </div>
                <div class="quick-actions-grid">
                    <button class="quick-action-btn" data-action="homework">
                        <i class="bi bi-pencil-square"></i>
                        <span>Nueva Tarea</span>
                    </button>
                    <button class="quick-action-btn" data-action="schedule">
                        <i class="bi bi-calendar-plus"></i>
                        <span>Ver Horario</span>
                    </button>
                    <button class="quick-action-btn" data-action="grades">
                        <i class="bi bi-graph-up"></i>
                        <span>Calificaciones</span>
                    </button>
                    <button class="quick-action-btn" data-action="resources">
                        <i class="bi bi-folder-fill"></i>
                        <span>Recursos</span>
                    </button>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="upcoming-events">
                <div class="section-title">
                    <h3>📅 Próximos Eventos</h3>
                </div>
                <div class="events-grid">
                    <div class="event-card math">
                        <div class="event-date">
                            <div class="day">15</div>
                            <div class="month">Mar</div>
                        </div>
                        <div class="event-info">
                            <h4>Examen de Matemáticas 📐</h4>
                            <p>Álgebra y Geometría</p>
                            <span class="event-time">09:00 AM</span>
                        </div>
                    </div>
                    <div class="event-card science">
                        <div class="event-date">
                            <div class="day">17</div>
                            <div class="month">Mar</div>
                        </div>
                        <div class="event-info">
                            <h4>Proyecto de Biología 🔬</h4>
                            <p>Presentación final</p>
                            <span class="event-time">02:30 PM</span>
                        </div>
                    </div>
                    <div class="event-card literature">
                        <div class="event-date">
                            <div class="day">20</div>
                            <div class="month">Mar</div>
                        </div>
                        <div class="event-info">
                            <h4>Club de Lectura 📚</h4>
                            <p>Discusión: "Cien años de soledad"</p>
                            <span class="event-time">03:00 PM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sidebar Toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        sidebarToggle.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('mobile-visible');
                sidebarOverlay.classList.toggle('active');
            } else {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('collapsed');
            }
        });

        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('mobile-visible');
            sidebarOverlay.classList.remove('active');
        });

        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                navLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('mobile-visible');
                    sidebarOverlay.classList.remove('active');
                }
                const icon = this.querySelector('i');
                icon.style.transform = 'scale(1.3) rotate(360deg)';
                setTimeout(() => {
                    icon.style.transform = '';
                }, 300);
            });
        });

        const notificationBtn = document.getElementById('notificationBtn');
        notificationBtn.addEventListener('click', function() {
            const notifications = [
                '📚 Nueva tarea de Matemáticas disponible',
                '⭐ Calificación disponible en Historia: 9.2/10',
                '⏰ Recordatorio: Proyecto de Ciencias vence en 3 días',
                '🎉 ¡Felicitaciones! Eres estudiante del mes'
            ];
            const randomNotif = notifications[Math.floor(Math.random() * notifications.length)];
            const toast = document.createElement('div');
            toast.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: linear-gradient(135deg, var(--primary-blue), var(--purple));
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 12px;
                box-shadow: var(--shadow-hover);
                z-index: 9999;
                transform: translateX(400px);
                transition: all 0.3s ease;
                max-width: 300px;
                font-weight: 500;
            `;
            toast.textContent = randomNotif;
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.style.transform = 'translateX(0)';
            }, 100);
            setTimeout(() => {
                toast.style.transform = 'translateX(400px)';
                setTimeout(() => document.body.removeChild(toast), 300);
            }, 4000);
        });

        const quickActionBtns = document.querySelectorAll('.quick-action-btn');
        quickActionBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.dataset.action;
                const actions = {
                    homework: '📝 Abriendo sección de tareas...',
                    schedule: '📅 Mostrando tu horario semanal...',
                    grades: '📊 Cargando tus calificaciones...',
                    resources: '📁 Accediendo a recursos de estudio...'
                };
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1.05)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                }, 150);
                const toast = document.createElement('div');
                toast.style.cssText = `
                    position: fixed;
                    bottom: 30px;
                    left: 50%;
                    transform: translateX(-50%) translateY(100px);
                    background: var(--white);
                    color: var(--dark-text);
                    padding: 1rem 2rem;
                    border-radius: 25px;
                    box-shadow: var(--shadow-hover);
                    z-index: 9999;
                    transition: all 0.3s ease;
                    font-weight: 600;
                    border: 2px solid rgba(59, 130, 246, 0.2);
                `;
                toast.textContent = actions[action];
                document.body.appendChild(toast);
                setTimeout(() => {
                    toast.style.transform = 'translateX(-50%) translateY(0)';
                }, 100);
                setTimeout(() => {
                    toast.style.transform = 'translateX(-50%) translateY(100px)';
                    setTimeout(() => document.body.removeChild(toast), 300);
                }, 2000);
            });
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebarOverlay.classList.remove('active');
                sidebar.classList.remove('mobile-visible');
                mainContent.classList.remove('mobile-full');
            } else {
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('collapsed');
                mainContent.classList.add('mobile-full');
            }
        });

        if (window.innerWidth <= 768) {
            mainContent.classList.add('mobile-full');
        }

        const ctx = document.getElementById('performanceChart')?.getContext('2d');
        if (ctx) {
            const performanceChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                    datasets: [{
                        label: 'Promedio General',
                        data: [8.2, 8.5, 8.3, 8.8, 8.6, 8.7],
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 4,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#3b82f6',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 3,
                        pointRadius: 8,
                        pointHoverRadius: 12
                    }, {
                        label: 'Matemáticas 📐',
                        data: [8.0, 8.3, 8.1, 8.9, 8.4, 8.8],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 3,
                        fill: false,
                        tension: 0.4,
                        pointBackgroundColor: '#10b981',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 10
                    }, {
                        label: 'Historia 🏛️',
                        data: [8.5, 8.7, 8.9, 8.6, 9.0, 8.9],
                        borderColor: '#8b5cf6',
                        backgroundColor: 'rgba(139, 92, 246, 0.1)',
                        borderWidth: 3,
                        fill: false,
                        tension: 0.4,
                        pointBackgroundColor: '#8b5cf6',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: { size: 13, weight: '600' }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: 'white',
                            bodyColor: 'white',
                            cornerRadius: 8,
                            padding: 12,
                            displayColors: true
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 7,
                            max: 10,
                            grid: { color: 'rgba(0, 0, 0, 0.05)', drawBorder: false },
                            ticks: { font: { size: 12, weight: '500' }, color: '#64748b' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 12, weight: '500' }, color: '#64748b' }
                        }
                    },
                    elements: { point: { hoverRadius: 12 } },
                    animation: { duration: 2000, easing: 'easeInOutQuart' }
                }
            });
        }

        window.addEventListener('load', function() {
            setTimeout(() => {
                const progressBars = document.querySelectorAll('.stat-progress-bar');
                progressBars.forEach(bar => {
                    const width = bar.style.width;
                    bar.style.width = '0%';
                    setTimeout(() => {
                        bar.style.width = width;
                    }, 500);
                });
            }, 1000);
        });

        function addSparkleEffect(element) {
            const sparkle = document.createElement('div');
            sparkle.innerHTML = '✨';
            sparkle.style.cssText = `
                position: absolute;
                pointer-events: none;
                font-size: 1.2rem;
                animation: sparkle 1s ease-out forwards;
            `;
            element.appendChild(sparkle);
            setTimeout(() => {
                element.removeChild(sparkle);
            }, 1000);
        }

        const sparkleStyle = document.createElement('style');
        sparkleStyle.textContent = `
            @keyframes sparkle {
                0% { opacity: 0; transform: scale(0) rotate(0deg); }
                50% { opacity: 1; transform: scale(1) rotate(180deg); }
                100% { opacity: 0; transform: scale(0) rotate(360deg); }
            }
        `;
        document.head.appendChild(sparkleStyle);
    </script>
</body>
</html>