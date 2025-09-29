<style>


/* ============================================
   NAVEGACIÓN INTERNA DE ADMISIÓN
============================================ */

.admision-navigation {
    background: linear-gradient(135deg, var(--light-gray) 0%, var(--white) 50%, var(--light-gray) 100%);
    padding: 5rem 0;
    position: relative;
    overflow: hidden;
}

.admision-navigation::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-green) 0%, var(--accent-gold) 50%, var(--primary-green) 100%);
}

.navigation-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

.navigation-header {
    text-align: center;
    margin-bottom: 4rem;
    position: relative;
}

.navigation-title {
    font-family: 'Playfair Display', serif;
    font-size: 3.2rem;
    font-weight: 700;
    color: var(--primary-green);
    margin-bottom: 1rem;
    position: relative;
    display: inline-block;
}

.navigation-title::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: var(--accent-gold);
    border-radius: 2px;
}

.navigation-subtitle {
    font-family: 'Open Sans', sans-serif;
    font-size: 1.2rem;
    color: var(--text-light);
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.navigation-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.nav-card {
    background: var(--white);
    border-radius: var(--border-radius-lg);
    padding: 2rem;
    display: flex;
    align-items: center;
    text-decoration: none;
    color: inherit;
    box-shadow: var(--shadow-sm);
    border: 2px solid transparent;
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.nav-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(244, 185, 66, 0.1) 50%, 
        transparent 100%);
    transition: left 0.6s ease;
}

.nav-card:hover::before {
    left: 100%;
}

.nav-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: var(--accent-gold);
}

.nav-card-icon {
    flex-shrink: 0;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    border-radius: var(--border-radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1.5rem;
    transition: all var(--transition-normal);
    position: relative;
    z-index: 2;
}

.nav-card:hover .nav-card-icon {
    background: linear-gradient(135deg, var(--accent-gold), var(--dark-gold));
    transform: scale(1.1);
}

.nav-card-icon i {
    font-size: 1.5rem;
    color: var(--white);
    transition: all var(--transition-normal);
}

.nav-card-content {
    flex: 1;
    position: relative;
    z-index: 2;
}

.nav-card-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.4rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 0.5rem;
    transition: color var(--transition-normal);
}

.nav-card:hover .nav-card-title {
    color: var(--dark-gold);
}

.nav-card-description {
    font-family: 'Open Sans', sans-serif;
    font-size: 0.95rem;
    color: var(--text-light);
    line-height: 1.5;
    margin: 0;
    transition: color var(--transition-normal);
}

.nav-card:hover .nav-card-description {
    color: var(--text-dark);
}

.nav-card-arrow {
    flex-shrink: 0;
    font-size: 1.2rem;
    color: var(--text-muted);
    margin-left: 1rem;
    transition: all var(--transition-normal);
    position: relative;
    z-index: 2;
}

.nav-card:hover .nav-card-arrow {
    color: var(--accent-gold);
    transform: translateX(5px);
}

/* Animación de entrada para las tarjetas */
.nav-card {
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
    transform: translateY(30px);
}

.nav-card:nth-child(1) { animation-delay: 0.1s; }
.nav-card:nth-child(2) { animation-delay: 0.2s; }
.nav-card:nth-child(3) { animation-delay: 0.3s; }
.nav-card:nth-child(4) { animation-delay: 0.4s; }
.nav-card:nth-child(5) { animation-delay: 0.5s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Detalle decorativo con azul oscuro */
.admision-navigation::after {
    content: '';
    position: absolute;
    top: 50%;
    right: -50px;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, var(--deep-blue) 0%, transparent 70%);
    opacity: 0.03;
    border-radius: 50%;
    transform: translateY(-50%);
}

/* Responsive Design */
@media (max-width: 768px) {
    .navigation-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .navigation-title {
        font-size: 2.5rem;
    }
    
    .navigation-subtitle {
        font-size: 1.1rem;
    }
    
    .nav-card {
        padding: 1.5rem;
    }
    
    .nav-card-icon {
        width: 50px;
        height: 50px;
        margin-right: 1rem;
    }
    
    .nav-card-icon i {
        font-size: 1.3rem;
    }
    
    .nav-card-title {
        font-size: 1.2rem;
    }
    
    .nav-card-description {
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .admision-navigation {
        padding: 3rem 0;
    }
    
    .navigation-container {
        padding: 0 1rem;
    }
    
    .navigation-header {
        margin-bottom: 2.5rem;
    }
    
    .navigation-title {
        font-size: 2rem;
    }
    
    .navigation-subtitle {
        font-size: 1rem;
    }
    
    .nav-card {
        padding: 1.25rem;
        flex-direction: column;
        text-align: center;
    }
    
    .nav-card-icon {
        margin-right: 0;
        margin-bottom: 1rem;
    }
    
    .nav-card-arrow {
        margin-left: 0;
        margin-top: 0.5rem;
    }
}

</style>