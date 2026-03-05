import './bootstrap';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Register ScrollTrigger plugin
gsap.registerPlugin(ScrollTrigger);

// --- Hero Section Animations ---

// 1. Hero Text Fade-in & Slide-up
gsap.fromTo(
    '.hero-title',
    { opacity: 0, y: 40 },
    { opacity: 1, y: 0, duration: 1.2, ease: 'power3.out' }
);

gsap.fromTo(
    '.hero-subtitle',
    { opacity: 0, y: 30 },
    { opacity: 1, y: 0, duration: 1, ease: 'power3.out', delay: 0.3 }
);

// 2. Hero Image Slide-in (from right)
// Since 'hero-image' is directly on the img tag, we just target '.hero-image'
gsap.fromTo(
    '.hero-image',
    { opacity: 0, x: 50 },
    { opacity: 1, x: 0, duration: 1.2, ease: 'power3.out', delay: 0.2 }
);

// 3. CTA Buttons in Hero Animation
gsap.fromTo(
    '.hero-buttons',
    { opacity: 0, y: 20 },
    { opacity: 1, y: 0, duration: 0.8, ease: 'back.out(1.2)', delay: 0.5 }
);

// --- Services Section Animations ---

// 4. Services Grid Reveal
gsap.utils.toArray('.service-card').forEach((card, index) => {
    gsap.fromTo(
        card,
        { opacity: 0, y: 40, scale: 0.95 },
        {
            opacity: 1,
            y: 0,
            scale: 1,
            duration: 0.8,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                end: 'bottom 20%',
                toggleActions: 'play none none none',
            },
        }
    );
});

// --- About Section Animations ---

// 5. About Cards Fade-in
gsap.utils.toArray('.about-card').forEach((card, index) => {
    gsap.fromTo(
        card,
        { opacity: 0, y: 40 },
        {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                toggleActions: 'play none none none',
            },
        }
    );
});

// 6. Process Step Fade In
gsap.utils.toArray('.process-step').forEach((step, index) => {
    gsap.fromTo(
        step,
        { opacity: 0, y: 30 },
        {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: step,
                start: 'top 85%',
                toggleActions: 'play none none none',
            },
        }
    );
});

// --- Optional Stat/Footer animation replacements (Cleaned) ---

// Footer Fade-in (using footer tag directly)
gsap.fromTo(
    'footer',
    { opacity: 0, y: 30 },
    {
        opacity: 1,
        y: 0,
        duration: 1,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: 'footer',
            start: 'top 90%',
            toggleActions: 'play none none none',
        },
    }
);
