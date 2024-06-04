const initApp = () => {
    const hamburgerButton = document.querySelector('#nav-button');
    const mobileMenu = document.querySelector('#mobile-nav');

    const toggleMenu = () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('block');

    }

    hamburgerButton.addEventListener('click', toggleMenu);
    mobileMenu.addEventListener('click', toggleMenu);
}

initApp();
