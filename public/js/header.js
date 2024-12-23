    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    });

    window.onload = function () {
        document.getElementById('loader').style.display = 'none';
        document.getElementById('content').style.display = 'block';
    };

