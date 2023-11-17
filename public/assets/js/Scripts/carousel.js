// On commence par sélectionner toutes les images du slider
var slides = document.querySelectorAll('.home .slider');
var currentSlide = 0; // On commence par la première image

// Fonction pour passer à la slide suivante
function nextSlide() {
    // On rend l'image actuelle invisible
    slides[currentSlide].style.opacity = 0;
    
    // On augmente l'index de l'image actuelle, et on revient à 0 si nécessaire
    currentSlide = (currentSlide + 1) % slides.length;
    
    // On rend la prochaine image visible
    slides[currentSlide].style.opacity = 1;
}

// Fonction pour démarrer l'animation
function startSlideShow() {
    // On définit un intervalle de 5 secondes (5000 millisecondes)
    setInterval(nextSlide, 8000);
    
    // On démarre par rendre la première image visible
    slides[currentSlide].style.opacity = 1;
}

// On attend que le contenu de la page soit chargé pour démarrer le diaporama
document.addEventListener('DOMContentLoaded', startSlideShow);
