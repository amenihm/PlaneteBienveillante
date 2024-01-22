let menu = document.querySelector('.fa-bars');
let navbar = document.querySelector('.navbar');

menu.addEventListener('click', function() {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('nav-toggle');
});

window.addEventListener('scroll', () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('nav-toggle');
});
document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.image-container');
    let scrollValue = 0;

    window.addEventListener('scroll', function() {
        const scrollPercentage = window.scrollY / (document.body.scrollHeight - window.innerHeight);
        scrollValue = scrollPercentage * (container.scrollWidth - window.innerWidth);
        container.style.transform = `translateX(${-scrollValue}px)`;
    });
});
const imageContainer = document.getElementById('imageContainer');
let scrollPosition = 0;

setInterval(() => {
    scrollPosition += 10;
    imageContainer.scrollLeft = scrollPosition;

    if (scrollPosition === imageContainer.scrollWidth - imageContainer.clientWidth) {
        scrollPosition = 0;
    }
}, 50);