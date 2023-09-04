document.addEventListener('DOMContentLoaded', () => {
    var image = document.querySelector('.image')
    var dropdown_container = document.querySelector('.dropdown-container');

    image ? image.addEventListener('mousemove', () => {
        image.classList.add('active');
    }) : null

    image ? image.addEventListener('mouseleave', () => {
        image.classList.remove('active');
    }) : null

    dropdown_container ? dropdown_container.addEventListener('mousemove', () => {
        image.classList.add('active');
    }) : null

    dropdown_container ? dropdown_container.addEventListener('mouseleave', () => {
        image.classList.remove('active');
    }) : null
})