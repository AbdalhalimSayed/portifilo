

AOS.init({ duration: 800, once: true });

const darkToggle = document.getElementById('darkToggle');
const icon = darkToggle.querySelector('i');
darkToggle.addEventListener('click', () => {
    document.body.classList.toggle('light-mode');
    icon.className = document.body.classList.contains('light-mode') ? 'fa-regular fa-moon' : 'fa-regular fa-sun';
});

const navbar = document.querySelector('.navbar');
window.addEventListener('scroll', () => {
    if(window.scrollY > 50) navbar.classList.add('scrolled');
    else navbar.classList.remove('scrolled');
});

document.querySelectorAll('.nav-link').forEach(l => {
    l.addEventListener('click', () => { 
        new bootstrap.Collapse(document.querySelector('.navbar-collapse')).hide(); 
    });
});

new Swiper('.swiper-container', {
    slidesPerView: 1, spaceBetween: 20, loop: true,
    autoplay: { delay: 3000 },
    pagination: { el: '.swiper-pagination', clickable: true },
    breakpoints: { 640: { slidesPerView: 1 }, 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
});
