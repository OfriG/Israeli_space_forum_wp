document.addEventListener('DOMContentLoaded', function() {
    const galleryContainer = document.getElementById('gallery-container');
    const prevButton = document.getElementById('gallery-prev');
    const nextButton = document.getElementById('gallery-next');
    const galleryDesktop = document.querySelector('.artist-block-gallery-desktop');
    
    if (!galleryContainer || !prevButton || !nextButton || !galleryDesktop) {
        return; 
    }
    
    const slides = galleryContainer.querySelectorAll('.gallery-slide');
    const totalSlides = slides.length;
    let currentSlide = 0;
    
    if (totalSlides <= 1) {
        prevButton.style.display = 'none';
        nextButton.style.display = 'none';
        return;
    }
    
    function showSlide(index) {
        slides.forEach(slide => slide.style.display = 'none');
        
        if (slides[index]) {
            slides[index].style.display = 'block';
        }
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }
    
    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            prevSlide();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
        }
    });
});
