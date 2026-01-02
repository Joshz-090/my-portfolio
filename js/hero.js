document.addEventListener('DOMContentLoaded', () => {
    const starfield = document.getElementById('starfield');
    if (!starfield) return;

    const starCount = 150;
    const fragment = document.createDocumentFragment();

    for (let i = 0; i < starCount; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        
        const size = Math.random() * 2;
        const x = Math.random() * 100;
        const y = Math.random() * 100;
        const delay = Math.random() * 5;
        const duration = 2 + Math.random() * 3;

        star.style.width = `${size}px`;
        star.style.height = `${size}px`;
        star.style.left = `${x}%`;
        star.style.top = `${y}%`;
        star.style.animation = `twinkle ${duration}s ease-in-out infinite ${delay}s`;
        
        fragment.appendChild(star);
    }

    starfield.appendChild(fragment);

    // Header Blending Logic
    const header = document.querySelector('nav');
    const hero = document.getElementById('cinematic-hero');
    
    if (header && hero) {
        // Initial state
        header.classList.add('header-transparent');

        window.addEventListener('scroll', () => {
            const heroHeight = hero.offsetHeight - 80;
            if (window.scrollY > heroHeight) {
                header.classList.remove('header-transparent', 'header-on-hero');
                header.classList.add('header-scrolled');
            } else {
                header.classList.add('header-transparent', 'header-on-hero');
                header.classList.remove('header-scrolled');
            }
        });
    }

    // Subtle parallax effect
    window.addEventListener('mousemove', (e) => {
        const x = (e.clientX / window.innerWidth - 0.5) * 30;
        const y = (e.clientY / window.innerHeight - 0.5) * 30;
        
        const earth = document.querySelector('.earth-container');
        if (earth) {
            earth.style.transform = `translate(${x}px, ${y}px)`;
        }
    });
});
