/*!
* Start Bootstrap - Grayscale v7.0.6 (https://startbootstrap.com/theme/grayscale)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-grayscale/blob/master/LICENSE)
*/
//
// Scripts
//

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });
});
// document.addEventListener('DOMContentLoaded', function () {
//     const navbarToggle = document.querySelector('.navbar-toggler'); // Кнопка меню
//     const navbar = document.querySelector('#navbarResponsive'); // Меню
//
//     navbarToggle.addEventListener('click', function () {
//         // Перевіряємо, чи є у меню клас 'collapse'
//         if (navbar.classList.contains('collapse')) {
//             // Якщо клас є, видаляємо 'collapse' і додаємо 'navbar-collapse'
//             navbar.classList.remove('collapse');
//             navbar.classList.add('navbar-collapse');
//         } else {
//             // Якщо класу 'collapse' немає, додаємо його назад
//             navbar.classList.add('collapse');
//             navbar.classList.remove('navbar-collapse');
//         }
//     });
// });
