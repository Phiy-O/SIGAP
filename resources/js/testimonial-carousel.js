// Testimonial and Partner Carousel - Infinite Scroll
document.addEventListener('DOMContentLoaded', function() {
    // Pause on hover for better UX
    const testimonialCarousel = document.querySelector('.testimonial-carousel');
    const partnerCarousel = document.querySelector('.partner-carousel');
    
    if (testimonialCarousel) {
        testimonialCarousel.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });
        
        testimonialCarousel.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    }
    
    if (partnerCarousel) {
        partnerCarousel.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });
        
        partnerCarousel.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    }
});

