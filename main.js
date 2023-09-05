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

    var hamburger_menu = document.querySelector('.hamburger-menu');
    var sidebar_contents = document.querySelector('.sidebar-contents');

    hamburger_menu ? hamburger_menu.addEventListener('click', () => {
        sidebar_contents.classList.toggle('active');
        document.querySelector('body').classList.toggle('active');
        image.classList.toggle('none');
    }) : null
})