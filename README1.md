
/* ============================================
   CONTENIDO PRINCIPAL - HOVER MINIMALISTA
============================================ */

.filosofia-content {
    position: relative;
}

.content-card {
    background: transparent;
    border-radius: 0;
    box-shadow: none;
    padding: 60px;
    position: relative;
    overflow: hidden;
    border: none;
    transition: all var(--transition-normal);
}

.card-decoration {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--accent-gold);
    border-radius: 0;
}

/* Declaración de Apertura */
.opening-statement {
    font-size: clamp(1.2rem, 2.5vw, 1.4rem);
    font-weight: 500;
    color: var(--text-dark);
    line-height: 1.6;
    margin-bottom: 50px;
    text-align: center;
    font-family: 'Open Sans', sans-serif;
    position: relative;
    padding: 35px;
    background: linear-gradient(135deg, var(--light-blue) 0%, rgba(235, 248, 255, 0.3) 100%);
    border-radius: var(--border-radius-lg);
    border-left: 4px solid var(--primary-green);
    box-shadow: var(--shadow-sm);
}

.opening-statement strong {
    color: var(--primary-green);
    font-weight: 700;
}

/* ============================================
   BLOQUES DE FILOSOFÍA - HOVER MINIMALISTA
============================================ */
.philosophy-blocks {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
    gap: 30px;
    margin-top: 0;
}

.philosophy-block {
    display: flex;
    align-items: flex-start;
    gap: 24px;
    padding: 35px;
    background: transparent;
    border-radius: 0;
    border: none;
    position: relative;
    overflow: hidden;
    box-shadow: none;
}

/* Línea minimalista desde la izquierda */
.philosophy-block::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    background: linear-gradient(180deg, var(--primary-green) 0%, var(--accent-gold) 50%, var(--primary-blue) 100%);
    z-index: 1;
}

/* Línea sutil desde abajo */
.philosophy-block::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 0;
    background: linear-gradient(90deg, 
        var(--primary-green) 0%, 
        var(--accent-gold) 30%, 
        var(--primary-blue) 70%, 
        var(--primary-green) 100%
    );
}

/* ============================================
   ICONOS - SIN ANIMACIONES COMPLEJAS
============================================ */
.block-icon {
    flex-shrink: 0;
    width: 64px;
    height: 64px;
    background: var(--primary-green);
    color: var(--white);
    border-radius: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    position: relative;
    z-index: 2;
    box-shadow: none;
}

.block-icon i {
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
}

/* ============================================
   CONTENIDO DE LOS BLOQUES
============================================ */
.block-content {
    flex: 1;
    position: relative;
    z-index: 2;
}

.block-content h4 {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--primary-green);
    margin-bottom: 12px;
    position: relative;
}

.block-content h4::after {
    display: none;
}

.block-content p {
    font-family: 'Open Sans', sans-serif;
    font-size: 1rem;
    color: var(--text-light);
    line-height: 1.7;
    margin-bottom: 0;
    text-align: justify;
    hyphens: auto;
}

/* ============================================
   RESPONSIVE DESIGN
============================================ */
@media (max-width: 992px) {
    .content-card {
        padding: 40px;
    }
    
    .philosophy-blocks {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .philosophy-block {
        padding: 28px;
        gap: 20px;
    }
    
    .block-icon {
        width: 56px;
        height: 56px;
        font-size: 1.3rem;
    }
}

@media (max-width: 768px) {
    .componente-filosofico-section {
        padding: 80px 0;
    }
    
    .content-card {
        padding: 30px 20px;
    }
    
    .institutional-header {
        margin-bottom: 30px;
    }
    
    .main-title {
        margin-bottom: 14px;
    }
    
    .header-subtitle {
        margin-bottom: 20px;
    }
    
    .header-badge {
        padding: 8px 16px;
        font-size: 0.8rem;
        margin-bottom: 16px;
    }
    
    .philosophy-block {
        flex-direction: column;
        text-align: center;
        padding: 25px;
    }
    
    .block-icon {
        align-self: center;
        margin-bottom: 15px;
    }
    
    .block-content p {
        text-align: center;
    }
}

@media (max-width: 480px) {
    .philosophy-blocks {
        grid-template-columns: 1fr;
    }
    
    .institutional-header {
        margin-bottom: 40px;
    }
    
    .main-title {
        font-size: 2.5rem;
        margin-bottom: 16px;
    }
    
    .header-subtitle {
        font-size: 1.1rem;
        margin-bottom: 24px;
    }
    
    .header-badge {
        padding: 10px 20px;
        font-size: 0.85rem;
        margin-bottom: 20px;
    }
}