<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos y Celebraciones | Gimnasio Humanístico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #0d3f27;
            --primary-green-bottom: #065e35;
            --secondary-green: #7ddfac;
            --white: #FFFFFF;
            --black: #000000;
            --light-gray: #f5f5f5;
            --text-dark: #1a1a1a;
            --text-light: #666666;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--white);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        
    </style>
</head>
<body>
    

    <script>
        const eventos = [
            {
                id: 'sanpedrito',
                category: 'Tradición',
                title: 'San Pedrito',
                icon: 'fa-child-reaching',
                description: 'Celebración tradicional donde nuestros estudiantes más pequeños comparten su alegría y talento en un ambiente festivo y educativo que fortalece su desarrollo integral.',
                date: 'Junio',
                participants: '200+',
                images: [
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg'
                ]
            },
            {
                id: 'englishday',
                category: 'Académico',
                title: 'English Day',
                icon: 'fa-language',
                description: 'Jornada dedicada a la celebración del idioma inglés con actividades interactivas, presentaciones culturales y dinámicas que fortalecen el aprendizaje del idioma.',
                date: 'Septiembre',
                participants: '300+',
                images: [
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg'
                ]
            },
            {
                id: 'salidas',
                category: 'Experiencial',
                title: 'Salidas Pedagógicas',
                icon: 'fa-bus',
                description: 'Experiencias de aprendizaje fuera del aula que conectan teoría con práctica, explorando el entorno natural, histórico y cultural de nuestra región.',
                date: 'Todo el año',
                participants: 'Variable',
                images: [
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg'
                ]
            },
            {
                id: 'comuniones',
                category: 'Espiritual',
                title: 'Primeras Comuniones',
                icon: 'fa-church',
                description: 'Ceremonia religiosa significativa donde nuestros estudiantes reciben el sacramento de la Eucaristía, acompañados por sus familias y comunidad educativa.',
                date: 'Mayo',
                participants: '50+',
                images: [
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg'
                ]
            },
            {
                id: 'confirmaciones',
                category: 'Espiritual',
                title: 'Confirmaciones',
                icon: 'fa-dove',
                description: 'Sacramento de la Confirmación donde nuestros jóvenes fortalecen su compromiso con la fe y los valores cristianos que guían nuestra institución educativa.',
                date: 'Octubre',
                participants: '40+',
                images: [
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg'
                ]
            },
            {
                id: 'deportivo',
                category: 'Deportivo',
                title: 'Festival Deportivo',
                icon: 'fa-medal',
                description: 'Competencia deportiva anual que promueve el trabajo en equipo, el espíritu deportivo y la vida saludable entre todos nuestros estudiantes.',
                date: 'Agosto',
                participants: '400+',
                images: [
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg',
                    '../images/Educacion Secundaria/Imagen1.jpg'
                ]
            }
        ];

        function renderTabs() {
            const tabsWrapper = document.getElementById('tabsWrapper');
            const tabsContent = document.getElementById('tabsContent');

            eventos.forEach((evento, index) => {
                // Crear tab button
                const tabBtn = document.createElement('button');
                tabBtn.className = `tab-btn ${index === 0 ? 'active' : ''}`;
                tabBtn.onclick = () => switchTab(evento.id);
                tabBtn.innerHTML = `
                    <i class="fas ${evento.icon} tab-icon"></i>
                    <span class="tab-title">${evento.title}</span>
                `;
                tabsWrapper.appendChild(tabBtn);

                // Crear tab content
                const tabPanel = document.createElement('div');
                tabPanel.className = `tab-panel ${index === 0 ? 'active' : ''}`;
                tabPanel.id = evento.id;
                tabPanel.innerHTML = `
                    <div class="evento-layout">
                        <div class="evento-info">
                            <span class="evento-category">${evento.category}</span>
                            <h2 class="evento-title">${evento.title}</h2>
                            <p class="evento-description">${evento.description}</p>
                            
                            <div class="evento-stats">
                                <div class="stat-box">
                                    <span class="stat-number">${evento.date}</span>
                                    <span class="stat-label">Fecha</span>
                                </div>
                                <div class="stat-box">
                                    <span class="stat-number">${evento.participants}</span>
                                    <span class="stat-label">Participantes</span>
                                </div>
                            </div>
                            
                            <div class="evento-actions">
                                <a href="#" class="btn-primary">
                                    <span>Ver galería completa</span>
                                    <i class="fas fa-images"></i>
                                </a>
                                <a href="#" class="btn-secondary">
                                    <span>Más información</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="evento-gallery">
                            ${evento.images.map(img => `
                                <div class="gallery-item" onclick="openLightbox('${img}')">
                                    <img src="${img}" alt="${evento.title}" class="gallery-img">
                                    <div class="gallery-overlay">
                                        <i class="fas fa-expand gallery-icon"></i>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                `;
                tabsContent.appendChild(tabPanel);
            });
        }

        function switchTab(tabId) {
            // Desactivar todos los tabs
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-panel').forEach(panel => panel.classList.remove('active'));

            // Activar tab seleccionado
            const selectedBtn = Array.from(document.querySelectorAll('.tab-btn')).find(btn => 
                btn.querySelector('.tab-title').textContent === eventos.find(e => e.id === tabId).title
            );
            selectedBtn.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }

        function openLightbox(src) {
            const lightbox = document.getElementById('lightbox');
            const img = document.getElementById('lightboxImage');
            img.src = src;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }

        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) closeLightbox();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeLightbox();
        });

        document.addEventListener('DOMContentLoaded', renderTabs);
    </script>









</body>
</html>