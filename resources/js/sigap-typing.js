// Swipe Up Animation for SIGAP Text - All at once
document.addEventListener('DOMContentLoaded', function() {
    const typingElement = document.getElementById('sigap-typing');
    if (!typingElement) return;

    const fullText = 'SIGAP.CO.ID';
    const chars = fullText.split('');
    
    // Build HTML dengan styling
    let html = '';
    chars.forEach((char, index) => {
        const isDot = char === '.';
        const isAfterSigap = index >= 5; // Setelah "SIGAP"
        
        if (isAfterSigap) {
            // Styling untuk .CO.ID (termasuk titik)
            html += `<span class="text-sigap-orange italic font-bold inline-block">${char}</span>`;
        } else {
            // Huruf normal
            html += `<span class="inline-block">${char}</span>`;
        }
    });
    
    typingElement.innerHTML = html;
    typingElement.classList.add('animate-swipe-up');
    
    // Trigger swipe highlight bersamaan
    const swipeHighlight = document.getElementById('swipe-highlight');
    if (swipeHighlight) {
        swipeHighlight.classList.add('active');
    }
});

