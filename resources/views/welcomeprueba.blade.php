<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Corregido - Gimnasio Humanístico</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    
    <style>
        /* Variables CSS */
        :root {
            --primary-green: #0d3f27;
            --primary-green-bottom: #065e35;
            --secondary-green: #7ddfac;
            --light-green: #4CAF50;
            --accent-gold: #F4B942;
            --dark-gold: #E6A835;
            --soft-gold: #FDF6E3;

            --white: #FFFFFF;
            --light-gray: #F8FAFB;
            --medium-gray: #E5E7EB;
            --dark-gray: #374151;
            --text-dark: #1F2937;
            --text-light: #6B7280;
            --text-muted: #9CA3AF;

            --soft-blue: #EBF8FF;
            --accent-blue: #3B82F6;
            --success-green: #10B981;
            --warm-white: #FEFEFE;

            --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);

            --gradient-primary: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
            --gradient-gold: linear-gradient(135deg, var(--accent-gold) 0%, var(--dark-gold) 100%);
            --gradient-overlay: linear-gradient(135deg, rgba(27, 94, 63, 0.9) 0%, rgba(27, 94, 63, 0.7) 100%);

            --section-padding: 6rem 0;
            --container-padding: 0 1.5rem;

            --border-radius-sm: 8px;
            --border-radius-md: 12px;
            --border-radius-lg: 16px;
            --border-radius-xl: 24px;
            --border-radius-full: 9999px;

            --transition-fast: 0.15s ease-out;
            --transition-normal: 0.3s ease-out;
            --transition-slow: 0.5s ease-out;
        }

        /* CSS del Footer - CORREGIDO */
        .main-footer {
            background: var(--primary-green);
            position: relative;
            overflow: hidden;
        }

        /* SOLUCIÓN: Ajustar el z-index y la altura del pseudo-elemento */
        .main-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: calc(100% - 120px); /* NO cubrir el footer-bottom */
            background: 
                radial-gradient(circle at 15% 25%, rgba(244, 185, 66, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 85% 75%, rgba(125, 223, 172, 0.06) 0%, transparent 50%),
                linear-gradient(135deg, rgba(13, 63, 39, 0.9) 0%, rgba(6, 94, 53, 0.95) 100%);
            z-index: 0; /* Reducir z-index para que no interfiera */
        }

        .main-footer::after {
            content: '';
            position: absolute;
            top: -2px;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, 
                var(--accent-gold) 0%, 
                var(--secondary-green) 25%, 
                var(--accent-gold) 50%, 
                var(--secondary-green) 75%, 
                var(--accent-gold) 100%);
            animation: gradient-shift 8s ease-in-out infinite;
            z-index: 3;
        }

        @keyframes gradient-shift {
            0%, 100% { opacity: 0.8; transform: scaleX(1); }
            50% { opacity: 1; transform: scaleX(1.02); }
        }

        .footer-top {
            padding: 4rem 0 2rem;
            position: relative;
            z-index: 2; /* Asegurar que esté por encima del ::before */
        }

        .footer-brand {
            margin-bottom: 2rem;
        }

        .footer-logo {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            text-decoration: none;
            color: var(--white);
            font-weight: 700;
            font-size: 1.5rem;
            transition: var(--transition-normal);
            position: relative;
        }

        .footer-logo::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(135deg, rgba(244, 185, 66, 0.2), rgba(125, 223, 172, 0.2));
            border-radius: var(--border-radius-lg);
            opacity: 0;
            transform: scale(0.8);
            transition: var(--transition-normal);
            z-index: -1;
        }

        .footer-logo:hover {
            color: var(--accent-gold);
            transform: translateY(-5px) scale(1.05);
        }

        .footer-logo:hover::before {
            opacity: 1;
            transform: scale(1);
        }

        .footer-logo-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, var(--accent-gold), var(--dark-gold));
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-green);
            font-size: 1.6rem;
            box-shadow: 
                0 8px 25px rgba(244, 185, 66, 0.3),
                0 4px 12px rgba(0, 0, 0, 0.2);
            transition: var(--transition-normal);
            position: relative;
            overflow: hidden;
        }

        .footer-logo-icon::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transform: rotate(45deg);
            transition: var(--transition-normal);
            opacity: 0;
        }

        .footer-logo:hover .footer-logo-icon {
            transform: rotate(10deg) scale(1.1);
            box-shadow: 
                0 15px 35px rgba(244, 185, 66, 0.4),
                0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .footer-logo:hover .footer-logo-icon::before {
            opacity: 1;
            animation: shine 0.8s ease-out;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.8;
            margin-bottom: 2rem;
            max-width: 400px;
            font-size: 0.95rem;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
            transition: var(--transition-normal);
        }

        .footer-description:hover {
            color: rgba(255, 255, 255, 0.95);
            transform: translateY(-2px);
        }

        .footer-section {
            margin-bottom: 2rem;
        }

        .footer-title {
            color: var(--accent-gold);
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            transition: var(--transition-normal);
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-gold), var(--secondary-green));
            border-radius: var(--border-radius-full);
            transition: var(--transition-normal);
        }

        .footer-title:hover {
            color: var(--secondary-green);
            transform: translateY(-3px);
        }

        .footer-title:hover::after {
            width: 60px;
            background: linear-gradient(90deg, var(--secondary-green), var(--accent-gold));
            box-shadow: 0 2px 8px rgba(244, 185, 66, 0.4);
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition-normal);
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0;
            position: relative;
            font-size: 0.95rem;
            border-radius: var(--border-radius-sm);
            overflow: hidden;
        }

        .footer-link::before {
            content: '';
            position: absolute;
            left: -100%;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(244, 185, 66, 0.1), transparent);
            transition: var(--transition-normal);
            z-index: -1;
        }

        .footer-link:hover {
            color: var(--accent-gold);
            transform: translateX(10px) scale(1.05);
            text-shadow: 0 1px 3px rgba(244, 185, 66, 0.3);
        }

        .footer-link:hover::before {
            left: 100%;
        }

        .footer-link i {
            font-size: 0.875rem;
            opacity: 0.7;
            transition: var(--transition-normal);
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(244, 185, 66, 0.1);
            border-radius: 50%;
        }

        .footer-link:hover i {
            opacity: 1;
            background: var(--accent-gold);
            color: var(--primary-green);
            transform: rotate(360deg) scale(1.2);
            box-shadow: 0 2px 8px rgba(244, 185, 66, 0.4);
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.25rem;
            padding: 0.75rem;
            border-radius: var(--border-radius-md);
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition-normal);
        }

        .contact-item:hover {
            background: rgba(244, 185, 66, 0.08);
            border-color: rgba(244, 185, 66, 0.3);
            transform: translateY(-3px) scale(1.02);
            box-shadow: 
                0 8px 25px rgba(0, 0, 0, 0.2),
                0 0 15px rgba(244, 185, 66, 0.1);
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--accent-gold), var(--secondary-green));
            color: var(--primary-green);
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
            box-shadow: 
                0 6px 20px rgba(244, 185, 66, 0.25),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            transition: var(--transition-normal);
            position: relative;
            overflow: hidden;
        }

        .contact-icon::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--accent-gold), var(--secondary-green), var(--accent-gold));
            border-radius: var(--border-radius-md);
            z-index: -1;
            opacity: 0;
            transition: var(--transition-normal);
        }

        .contact-item:hover .contact-icon {
            transform: rotate(10deg) scale(1.1);
            box-shadow: 
                0 10px 30px rgba(244, 185, 66, 0.4),
                0 0 20px rgba(244, 185, 66, 0.2);
        }

        .contact-item:hover .contact-icon::before {
            opacity: 1;
            animation: rotate-glow 2s linear infinite;
        }

        @keyframes rotate-glow {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .contact-content {
            flex: 1;
        }

        .contact-label {
            color: var(--accent-gold);
            font-weight: 700;
            font-size: 0.8rem;
            margin-bottom: 0.25rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            transition: var(--transition-normal);
        }

        .contact-item:hover .contact-label {
            color: var(--secondary-green);
            transform: translateY(-1px);
        }

        .contact-text {
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
            line-height: 1.4;
            font-size: 0.85rem;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            transition: var(--transition-normal);
        }

        .contact-item:hover .contact-text {
            color: rgba(255, 255, 255, 1);
            transform: translateY(-1px);
        }

        .social-links {
            display: flex;
            gap: 1.25rem;
            margin-top: 2.5rem;
            justify-content: flex-start;
        }

        .social-link {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.8);
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: var(--transition-normal);
            box-shadow: 
                0 4px 15px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            position: relative;
            overflow: hidden;
            font-size: 1.2rem;
            backdrop-filter: blur(10px);
        }

        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition-normal);
        }

        .social-link:hover {
            transform: translateY(-8px) scale(1.15) rotate(5deg);
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.3),
                0 0 30px rgba(244, 185, 66, 0.2);
        }

        .social-link:hover::before {
            left: 100%;
        }

        .social-link.facebook:hover {
            background: linear-gradient(135deg, #1877F2, #42a5f5);
            color: white;
            border-color: #1877F2;
            box-shadow: 
                0 15px 35px rgba(24, 119, 242, 0.4),
                0 0 30px rgba(24, 119, 242, 0.3);
        }

        .social-link.instagram:hover {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            color: white;
            border-color: transparent;
            box-shadow: 
                0 15px 35px rgba(240, 148, 51, 0.4),
                0 0 30px rgba(220, 39, 67, 0.3);
        }

        .social-link.youtube:hover {
            background: linear-gradient(135deg, #FF0000, #ff4444);
            color: white;
            border-color: #FF0000;
            box-shadow: 
                0 15px 35px rgba(255, 0, 0, 0.4),
                0 0 30px rgba(255, 0, 0, 0.3);
        }

        .social-link.whatsapp:hover {
            background: linear-gradient(135deg, #25D366, #4fda85);
            color: white;
            border-color: #25D366;
            box-shadow: 
                0 15px 35px rgba(37, 211, 102, 0.4),
                0 0 30px rgba(37, 211, 102, 0.3);
        }

        /* SOLUCIÓN PRINCIPAL: Footer Bottom Corregido */
        .footer-bottom {
            background: linear-gradient(135deg, rgba(6, 94, 53, 0.95), rgba(13, 63, 39, 0.98));
            border-top: 2px solid rgba(244, 185, 66, 0.3);
            padding: 1.25rem 0; /* Reducido de 2rem a 1.25rem */
            text-align: center;
            position: relative;
            z-index: 20; /* Z-index alto para garantizar visibilidad */
            backdrop-filter: blur(10px);
            /* Agregar un fondo sólido de respaldo */
            background-color: rgba(6, 94, 53, 0.9);
        }

        .footer-bottom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at center, rgba(244, 185, 66, 0.05) 0%, transparent 70%);
            z-index: -1;
        }

        .footer-bottom-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1.5rem; /* Reducido de 2rem a 1.5rem */
            position: relative;
            z-index: 21; /* Asegurar que el contenido esté visible */
        }

        .copyright {
            color: rgba(255, 255, 255, 0.9); /* Aumentar opacidad */
            margin: 0;
            font-size: 0.9rem;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5); /* Sombra más fuerte */
            transition: var(--transition-normal);
            position: relative;
            font-weight: 500; /* Agregar peso de fuente */
        }

        .copyright::before {
            content: '';
            position: absolute;
            left: -20px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 1px;
            background: var(--accent-gold);
            opacity: 0;
            transition: var(--transition-normal);
        }

        .copyright:hover {
            color: var(--accent-gold);
            transform: translateX(10px);
        }

        .copyright:hover::before {
            opacity: 1;
            width: 25px;
        }

        .footer-bottom-links {
            display: flex;
            gap: 2rem; /* Reducido de 2.5rem a 2rem */
            flex-wrap: wrap;
        }

        .footer-bottom-link {
            color: rgba(255, 255, 255, 0.8); /* Aumentar opacidad */
            text-decoration: none;
            font-size: 0.85rem; /* Reducido de 0.9rem a 0.85rem */
            transition: var(--transition-normal);
            position: relative;
            padding: 0.25rem 0; /* Reducido de 0.5rem a 0.25rem */
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.4); /* Sombra más fuerte */
            font-weight: 400; /* Agregar peso de fuente */
        }

        .footer-bottom-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--accent-gold), var(--secondary-green));
            transition: var(--transition-normal);
        }

        .footer-bottom-link:hover {
            color: var(--accent-gold);
            transform: translateY(-3px);
            text-shadow: 0 2px 8px rgba(244, 185, 66, 0.3);
        }

        .footer-bottom-link:hover::after {
            width: 100%;
        }

        /* Decoración flotante mejorada */
        .footer-decoration {
            position: absolute;
            top: -75px;
            right: 8%;
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--accent-gold) 0%, var(--secondary-green) 50%, var(--accent-gold) 100%);
            border-radius: 50%;
            opacity: 0.08;
            animation: float-decoration 8s ease-in-out infinite;
            z-index: 1;
        }

        .footer-decoration::after {
            content: '';
            position: absolute;
            top: 30px;
            left: 30px;
            width: 60px;
            height: 60px;
            background: var(--accent-gold);
            border-radius: 50%;
            opacity: 0.3;
            animation: rotate-decoration 6s linear infinite;
        }

        @keyframes float-decoration {
            0%, 100% { 
                transform: translateY(0px) translateX(0px) rotate(0deg) scale(1); 
            }
            25% { 
                transform: translateY(-20px) translateX(10px) rotate(90deg) scale(1.05); 
            }
            50% { 
                transform: translateY(-15px) translateX(-10px) rotate(180deg) scale(0.95); 
            }
            75% { 
                transform: translateY(-25px) translateX(5px) rotate(270deg) scale(1.1); 
            }
        }

        @keyframes rotate-decoration {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.2); }
            100% { transform: rotate(360deg) scale(1); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .footer-top {
                padding: 4rem 0 2.5rem;
            }

            .footer-bottom-content {
                flex-direction: column;
                text-align: center;
                gap: 1.5rem;
            }

            .footer-bottom-links {
                justify-content: center;
                gap: 1.5rem;
            }

            .social-links {
                justify-content: center;
                gap: 1rem;
            }

            .social-link {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }

            .contact-item {
                margin-bottom: 1rem;
                padding: 0.5rem;
            }

            .contact-icon {
                width: 38px;
                height: 38px;
                font-size: 0.9rem;
            }

            .footer-decoration {
                width: 80px;
                height: 80px;
                top: -40px;
                right: 5%;
            }

            .footer-decoration::after {
                top: 20px;
                left: 20px;
                width: 40px;
                height: 40px;
            }
        }

        @media (max-width: 576px) {
            .footer-decoration {
                display: none;
            }

            .social-link {
                width: 42px;
                height: 42px;
                font-size: 1rem;
            }

            .social-links {
                gap: 0.75rem;
                margin-top: 2rem;
            }

            .contact-item {
                gap: 1rem;
            }

            .footer-bottom-links {
                flex-direction: column;
                gap: 1rem;
            }

            .footer-title {
                font-size: 1.1rem;
            }

            .footer-link {
                font-size: 0.9rem;
            }
        }

        /* Focus states para accesibilidad */
        .footer-link:focus,
        .social-link:focus,
        .footer-bottom-link:focus {
            outline: 2px solid var(--accent-gold);
            outline-offset: 3px;
            border-radius: var(--border-radius-sm);
        }

        /* Reducir animaciones para usuarios que lo prefieran */
        @media (prefers-reduced-motion: reduce) {
            .footer-decoration,
            .footer-decoration::after {
                animation: none;
            }
            
            * {
                transition-duration: 0.1s !important;
            }
        }
    </style>
</head>
<body>
    <!-- Contenido de ejemplo -->
    <div style="height: 100vh; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
        <h2 style="color: #0d3f27;">Contenido de tu página aquí...</h2>
    </div>

    <!-- FOOTER PRINCIPAL - CÓDIGO CORREGIDO -->
    <footer class="main-footer">
        <div class="footer-decoration"></div>
        
        <div class="footer-top">
            <div class="container">
                <div class="row g-4">
                    <!-- Información de la Institución -->
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-section footer-brand" data-aos="fade-up" data-aos-delay="100">
                            <a href="#" class="footer-logo">
                                <div class="footer-logo-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <span>Gimnasio Humanístico</span>
                            </a>
                            <p class="footer-description">
                                Formando ciudadanos íntegros con excelencia académica, valores cristianos y 
                                compromiso social desde hace más de 25 años. Construyendo el futuro de Colombia 
                                a través de una educación transformadora.
                            </p>
                            <div class="social-links">
                                <a href="#" class="social-link facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link youtube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="#" class="social-link whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Enlaces Rápidos -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-section" data-aos="fade-up" data-aos-delay="200">
                            <h5 class="footer-title">Enlaces Rápidos</h5>
                            <ul class="footer-links">
                                <li><a href="#inicio" class="footer-link"><i class="fas fa-chevron-right"></i>Inicio</a></li>
                                <li><a href="#quienes-somos" class="footer-link"><i class="fas fa-chevron-right"></i>Quiénes Somos</a></li>
                                <li><a href="#niveles-educativos" class="footer-link"><i class="fas fa-chevron-right"></i>Oferta Académica</a></li>
                                <li><a href="#admisiones" class="footer-link"><i class="fas fa-chevron-right"></i>Admisiones</a></li>
                                <li><a href="#noticias" class="footer-link"><i class="fas fa-chevron-right"></i>Noticias</a></li>
                                <li><a href="#contacto" class="footer-link"><i class="fas fa-chevron-right"></i>Contacto</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Servicios -->
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-section" data-aos="fade-up" data-aos-delay="300">
                            <h5 class="footer-title">Servicios</h5>
                            <ul class="footer-links">
                                <li><a href="#" class="footer-link"><i class="fas fa-chevron-right"></i>Educación Preescolar</a></li>
                                <li><a href="#" class="footer-link"><i class="fas fa-chevron-right"></i>Básica Primaria</a></li>
                                <li><a href="#" class="footer-link"><i class="fas fa-chevron-right"></i>Básica Secundaria</a></li>
                                <li><a href="#" class="footer-link"><i class="fas fa-chevron-right"></i>Media Académica</a></li>
                                <li><a href="#" class="footer-link"><i class="fas fa-chevron-right"></i>Bilingüismo</a></li>
                                <li><a href="#" class="footer-link"><i class="fas fa-chevron-right"></i>Orientación Vocacional</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Información de Contacto -->
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-section" data-aos="fade-up" data-aos-delay="400">
                            <h5 class="footer-title">Contacto</h5>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-label">Dirección</div>
                                    <p class="contact-text">Calle 23 #45-67<br>Neiva, Huila - Colombia</p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-label">Teléfono</div>
                                    <p class="contact-text">(+57) 8 875 2345<br>(+57) 300 123 4567</p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-label">Email</div>
                                    <p class="contact-text">info@gimnasiohumanistico.edu.co<br>admisiones@gimnasiohumanistico.edu.co</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom - SECCIÓN CORREGIDA -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content" data-aos="fade-up" data-aos-delay="500">
                    <p class="copyright">
                        © 2024 Gimnasio Humanístico. Todos los derechos reservados.
                    </p>
                    <div class="footer-bottom-links">
                        <a href="#" class="footer-bottom-link">Política de Privacidad</a>
                        <a href="#" class="footer-bottom-link">Términos y Condiciones</a>
                        <a href="#" class="footer-bottom-link">Manual de Convivencia</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <script>
        // Inicializar AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out',
            once: true,
            offset: 100,
            delay: 50
        });

        // JavaScript mejorado para el footer
        document.addEventListener('DOMContentLoaded', function() {
            
            // Observer para efectos adicionales
            const footerObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        
                        // Animación escalonada para los enlaces
                        const footerLinks = entry.target.querySelectorAll('.footer-link');
                        footerLinks.forEach((link, index) => {
                            setTimeout(() => {
                                link.style.opacity = '1';
                                link.style.transform = 'translateX(0)';
                            }, index * 100);
                        });

                        // Efecto para los iconos sociales
                        const socialLinks = entry.target.querySelectorAll('.social-link');
                        socialLinks.forEach((social, index) => {
                            setTimeout(() => {
                                social.style.opacity = '1';
                                social.style.transform = 'scale(1)';
                            }, 300 + (index * 100));
                        });

                        // Animación especial para el footer-bottom
                        const footerBottom = entry.target.querySelector('.footer-bottom-content');
                        if (footerBottom) {
                            setTimeout(() => {
                                footerBottom.style.opacity = '1';
                                footerBottom.style.transform = 'translateY(0)';
                            }, 500);
                        }

                        footerObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.2 });

            // Observar el footer
            const footer = document.querySelector('.main-footer');
            if (footer) {
                footerObserver.observe(footer);
            }

            // Inicializar estilos de los elementos animados
            document.querySelectorAll('.footer-link').forEach(link => {
                link.style.opacity = '0';
                link.style.transform = 'translateX(-20px)';
                link.style.transition = 'all 0.3s ease-out';
            });

            document.querySelectorAll('.social-link').forEach(social => {
                social.style.opacity = '0';
                social.style.transform = 'scale(0.8)';
                social.style.transition = 'all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            });

            // Inicializar footer-bottom-content
            const footerBottomContent = document.querySelector('.footer-bottom-content');
            if (footerBottomContent) {
                footerBottomContent.style.opacity = '0';
                footerBottomContent.style.transform = 'translateY(30px)';
                footerBottomContent.style.transition = 'all 0.6s ease-out';
            }

            // Efectos hover adicionales
            document.querySelectorAll('.footer-link').forEach(link => {
                link.addEventListener('mouseenter', function() {
                    this.style.textShadow = '0 0 10px rgba(244, 185, 66, 0.5)';
                });
                
                link.addEventListener('mouseleave', function() {
                    this.style.textShadow = 'none';
                });
            });

            // Parallax sutil para la decoración
            let ticking = false;
            
            function updateParallax() {
                const scrolled = window.pageYOffset;
                const decoration = document.querySelector('.footer-decoration');
                if (decoration) {
                    const speed = scrolled * 0.1;
                    decoration.style.transform = `translateY(${speed}px) rotate(${scrolled * 0.05}deg)`;
                }
                ticking = false;
            }

            window.addEventListener('scroll', function() {
                if (!ticking) {
                    requestAnimationFrame(updateParallax);
                    ticking = true;
                }
            });
        });
    </script>
</body>
</html>