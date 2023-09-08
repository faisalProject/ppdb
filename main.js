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
    var navbar = document.querySelector('.navbar');

    hamburger_menu ? hamburger_menu.addEventListener('click', () => {
        sidebar_contents.classList.toggle('active');
        document.querySelector('body').classList.toggle('active');
        image.classList.toggle('none');
        navbar.classList.toggle('active');
    }) : null

    var hamburger_2 = document.querySelector('.hamburger-2');
    var sidebar_landing_contents = document.querySelector('.sidebar-landing-contents');
    var navbar_landing_page = document.querySelector('.navbar-landing-page');

    hamburger_2 ? hamburger_2.addEventListener('click', () => {
        sidebar_landing_contents.classList.toggle('active');
        document.querySelector('body').classList.toggle('active');
        navbar_landing_page.classList.toggle('active');
    }) : null

    var show = document.querySelectorAll('.show');
    var input_type = document.querySelectorAll('.input-type')

    show ? show.forEach((e, i) => {
        e.addEventListener('click', () => {
            e.classList.toggle('active');
            input_type[i].type === 'password' ? input_type[i].type = 'text' : input_type[i].type = 'password'
        })
    }) : null;

    var hamburger_admin = document.querySelector('.hamburger-admin');
    var sidebar_admin_contents = document.querySelector('.sidebar-admin-contents');
    var navbar_admin = document.querySelector('.navbar-admin');
    hamburger_admin ? hamburger_admin.addEventListener('click', () => {
        sidebar_admin_contents.classList.toggle('active');
        document.querySelector('body').classList.toggle('active');
        navbar_admin.classList.toggle('active');
    }) : null

    var delete_major = document.querySelectorAll('.delete');
    delete_major ? delete_major.forEach((e) => {
        e.addEventListener('click', () => {
            Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Ingin menghapus jurusan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
            })
        })
    }) : null
})