<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería Premium</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-green: #2d5f3f;
            --accent-green: #3d7a56;
            --light-green: #e8f5e9;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #fafafa;
            color: #1a1a1a;
        }

        /* Header Elegante */
        .gallery-section {
            padding: 100px 0 80px;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            position: relative;
            overflow: hidden;
        }

        .gallery-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(45, 95, 63, 0.2), transparent);
        }

        .gallery-header {
            text-align: center;
            margin-bottom: 70px;
            padding: 0 20px;
            position: relative;
        }

        .gallery-label {
            display: inline-block;
            font-size: 0.813rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--accent-green);
            font-weight: 600;
            margin-bottom: 16px;
            padding: 8px 24px;
            background: var(--light-green);
            border-radius: 50px;
        }

        .gallery-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 20px;
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .gallery-divider {
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-green), var(--accent-green));
            margin: 0 auto 24px;
            border-radius: 2px;
        }

        .gallery-subtitle {
            color: #555;
            font-size: 1.125rem;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.8;
            font-weight: 400;
        }

        /* Container */
        .gallery-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
        }

        /* Grid Masonry Style */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 28px;
        }

        /* Grid Pattern Elegante */
        .gallery-item:nth-child(1) {
            grid-column: span 7;
            height: 480px;
        }

        .gallery-item:nth-child(2) {
            grid-column: span 5;
            height: 480px;
        }

        .gallery-item:nth-child(3) {
            grid-column: span 4;
            height: 360px;
        }

        .gallery-item:nth-child(4) {
            grid-column: span 4;
            height: 360px;
        }

        .gallery-item:nth-child(5) {
            grid-column: span 4;
            height: 360px;
        }

        .gallery-item:nth-child(6) {
            grid-column: span 6;
            height: 420px;
        }

        .gallery-item:nth-child(7) {
            grid-column: span 6;
            height: 420px;
        }

        /* Gallery Items Premium */
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            cursor: pointer;
            background: #fff;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-item::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, transparent 40%, rgba(0,0,0,0.75) 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 1;
        }

        .gallery-item:hover::after {
            opacity: 1;
        }

        .gallery-item:hover {
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.15);
            transform: translateY(-8px);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        /* Label con Icono */
        .image-label {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 28px;
            color: white;
            transform: translateY(100%);
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 2;
        }

        .gallery-item:hover .image-label {
            transform: translateY(0);
        }

        .image-label-text {
            font-weight: 600;
            font-size: 1.125rem;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .image-label-text::before {
            content: '→';
            font-size: 1.3rem;
            opacity: 0.9;
        }

        .image-label-subtitle {
            font-size: 0.875rem;
            opacity: 0.85;
            font-weight: 400;
        }

        /* Lightbox Modal */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.96);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
        }

        .lightbox.active {
            display: flex;
        }

        .lightbox-content {
            position: relative;
            max-width: 92%;
            max-height: 92vh;
            animation: zoomIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .lightbox-content img {
            width: 100%;
            height: auto;
            max-height: 92vh;
            object-fit: contain;
            border-radius: 12px;
            box-shadow: 0 20px 80px rgba(0, 0, 0, 0.5);
        }

        .lightbox-close {
            position: fixed;
            top: 40px;
            right: 40px;
            background: rgba(255, 255, 255, 0.95);
            color: #1a1a1a;
            border: none;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            font-size: 26px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 300;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            z-index: 10000;
            backdrop-filter: blur(10px);
        }

        .lightbox-close:hover {
            background: var(--primary-green);
            color: white;
            transform: rotate(90deg) scale(1.05);
        }

        .lightbox-nav {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.95);
            color: #1a1a1a;
            border: none;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            font-size: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            z-index: 10000;
            backdrop-filter: blur(10px);
        }

        .lightbox-nav:hover {
            background: var(--primary-green);
            color: white;
            transform: translateY(-50%) scale(1.1);
        }

        .lightbox-prev {
            left: 40px;
        }

        .lightbox-next {
            right: 40px;
        }

        /* Image Info Bar */
        .image-info {
            position: fixed;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.95);
            padding: 16px 32px;
            border-radius: 50px;
            color: #1a1a1a;
            font-size: 0.938rem;
            font-weight: 500;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            z-index: 10000;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .image-counter {
            color: var(--primary-green);
            font-weight: 700;
        }

        .image-title {
            border-left: 2px solid #e0e0e0;
            padding-left: 16px;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.92);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Responsive */
        @media (max-width: 991px) {
            .gallery-title {
                font-size: 2.75rem;
            }

            .gallery-grid {
                gap: 24px;
            }

            .gallery-item:nth-child(1),
            .gallery-item:nth-child(2) {
                grid-column: span 6;
                height: 380px;
            }

            .gallery-item:nth-child(3),
            .gallery-item:nth-child(4),
            .gallery-item:nth-child(5) {
                grid-column: span 4;
                height: 320px;
            }

            .gallery-item:nth-child(6),
            .gallery-item:nth-child(7) {
                grid-column: span 6;
                height: 360px;
            }

            .image-info {
                font-size: 0.875rem;
                padding: 14px 24px;
            }
        }

        @media (max-width: 767px) {
            .gallery-section {
                padding: 70px 0 60px;
            }

            .gallery-container {
                padding: 0 20px;
            }

            .gallery-title {
                font-size: 2.25rem;
            }

            .gallery-subtitle {
                font-size: 1rem;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .gallery-item:nth-child(1),
            .gallery-item:nth-child(2),
            .gallery-item:nth-child(3),
            .gallery-item:nth-child(4),
            .gallery-item:nth-child(5),
            .gallery-item:nth-child(6),
            .gallery-item:nth-child(7) {
                grid-column: span 1;
                height: 300px;
            }

            .lightbox-close {
                top: 20px;
                right: 20px;
                width: 46px;
                height: 46px;
                font-size: 22px;
            }

            .lightbox-nav {
                width: 48px;
                height: 48px;
                font-size: 26px;
            }

            .lightbox-prev {
                left: 20px;
            }

            .lightbox-next {
                right: 20px;
            }

            .image-info {
                bottom: 20px;
                font-size: 0.813rem;
                padding: 12px 20px;
                flex-direction: column;
                gap: 8px;
                text-align: center;
            }

            .image-title {
                border-left: none;
                border-top: 2px solid #e0e0e0;
                padding-left: 0;
                padding-top: 8px;
            }
        }

        @media (max-width: 575px) {
            .gallery-title {
                font-size: 1.875rem;
            }

            .gallery-item:nth-child(1),
            .gallery-item:nth-child(2),
            .gallery-item:nth-child(3),
            .gallery-item:nth-child(4),
            .gallery-item:nth-child(5),
            .gallery-item:nth-child(6),
            .gallery-item:nth-child(7) {
                height: 260px;
            }

            .lightbox-close,
            .lightbox-nav {
                width: 42px;
                height: 42px;
                font-size: 20px;
            }

            .lightbox-prev {
                left: 15px;
            }

            .lightbox-next {
                right: 15px;
            }

            .image-info {
                font-size: 0.75rem;
                padding: 10px 16px;
            }
        }
    </style>
</head>
<body>
    <section class="gallery-section">
        <!-- Header Premium -->
        <div class="gallery-header">
            <div class="gallery-label">Galería</div>
            <h2 class="gallery-title">Momentos que Inspiran</h2>
            <div class="gallery-divider"></div>
            <p class="gallery-subtitle">Explora nuestra colección de imágenes que capturan la esencia de nuestra comunidad educativa</p>
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-container">
            <div class="gallery-grid" id="galleryGrid"></div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="lightbox" id="lightbox">
        <button class="lightbox-close" onclick="closeLightbox()">×</button>
        <button class="lightbox-nav lightbox-prev" onclick="changeImage(-1)">‹</button>
        <button class="lightbox-nav lightbox-next" onclick="changeImage(1)">›</button>
        
        <div class="lightbox-content">
            <img id="lightbox-img" src="" alt="">
        </div>

        <div class="image-info">
            <span class="image-counter"><span id="current-num">1</span> / <span id="total-num">7</span></span>
            <span class="image-title" id="current-title"></span>
        </div>
    </div>

    <script>
        // Array de imágenes
        const galleryImages = [
            { src: 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=1200', alt: 'Niños jugando en el aula', subtitle: 'Educación Inicial' },
            { src: 'https://images.unsplash.com/photo-1588075592446-265fd1e6e76f?w=1200', alt: 'Actividades creativas', subtitle: 'Arte y Expresión' },
            { src: 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=1200', alt: 'Aprendizaje en grupo', subtitle: 'Trabajo Colaborativo' },
            { src: 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=1200', alt: 'Exploración educativa', subtitle: 'Descubrimiento' },
            { src: 'https://images.unsplash.com/photo-1544776193-352d25ca82cd?w=1200', alt: 'Tiempo de juego', subtitle: 'Diversión y Aprendizaje' },
            { src: 'https://images.unsplash.com/photo-1497486751825-1233686d5d80?w=1200', alt: 'Desarrollo integral', subtitle: 'Crecimiento Personal' },
            { src: 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?w=1200', alt: 'Momentos especiales', subtitle: 'Experiencias Únicas' }
        ];

        let currentImageIndex = 0;

        // Renderizar galería
        function renderGallery() {
            const galleryGrid = document.getElementById('galleryGrid');
            
            galleryImages.forEach((image, index) => {
                const item = document.createElement('div');
                item.className = 'gallery-item';
                item.onclick = () => openLightbox(index);
                
                item.innerHTML = `
                    <img src="${image.src}" alt="${image.alt}" loading="lazy">
                    <div class="image-label">
                        <div class="image-label-text">${image.alt}</div>
                        <div class="image-label-subtitle">${image.subtitle}</div>
                    </div>
                `;
                
                galleryGrid.appendChild(item);
            });

            document.getElementById('total-num').textContent = galleryImages.length;
        }

        // Actualizar UI
        function updateUI() {
            document.getElementById('current-num').textContent = currentImageIndex + 1;
            document.getElementById('current-title').textContent = galleryImages[currentImageIndex].alt;
            
            const prevBtn = document.querySelector('.lightbox-prev');
            const nextBtn = document.querySelector('.lightbox-next');

            prevBtn.style.display = currentImageIndex === 0 ? 'none' : 'flex';
            nextBtn.style.display = currentImageIndex === galleryImages.length - 1 ? 'none' : 'flex';
        }

        // Abrir lightbox
        function openLightbox(index) {
            currentImageIndex = index;
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');

            lightboxImg.src = galleryImages[index].src;
            lightboxImg.alt = galleryImages[index].alt;
            lightbox.classList.add('active');

            updateUI();
            document.body.style.overflow = 'hidden';
        }

        // Cerrar lightbox
        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Cambiar imagen
        function changeImage(direction) {
            currentImageIndex += direction;

            if (currentImageIndex < 0) currentImageIndex = 0;
            if (currentImageIndex >= galleryImages.length)
                currentImageIndex = galleryImages.length - 1;

            const lightboxImg = document.getElementById('lightbox-img');

            lightboxImg.style.opacity = '0';

            setTimeout(() => {
                lightboxImg.src = galleryImages[currentImageIndex].src;
                lightboxImg.alt = galleryImages[currentImageIndex].alt;
                lightboxImg.style.opacity = '1';
            }, 200);

            updateUI();
        }

        // Eventos de teclado
        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('lightbox');

            if (e.key === 'Escape') closeLightbox();

            if (lightbox.classList.contains('active')) {
                if (e.key === 'ArrowLeft') changeImage(-1);
                if (e.key === 'ArrowRight') changeImage(1);
            }
        });

        // Cerrar al hacer clic fuera
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) closeLightbox();
        });

        // Prevenir cierre en botones
        document.querySelector('.lightbox-close').addEventListener('click', e => e.stopPropagation());
        document.querySelector('.lightbox-prev').addEventListener('click', e => e.stopPropagation());
        document.querySelector('.lightbox-next').addEventListener('click', e => e.stopPropagation());

        // Transición suave
        document.getElementById('lightbox-img').style.transition = 'opacity 0.3s ease';

        // Inicializar
        renderGallery();
    </script>
</body>
</html>