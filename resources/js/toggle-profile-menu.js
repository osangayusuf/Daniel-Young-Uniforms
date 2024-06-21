const profileMenuButton = document.querySelector('#profile-menu-button');
const profileMenu = document.querySelector('#profile-menu');



const toggleProfileMenu = () => {
    profileMenu.classList.toggle('hidden');
    profileMenu.classList.toggle('block');
}


profileMenuButton.addEventListener('click', toggleProfileMenu);
profileMenu.addEventListener('click', toggleProfileMenu);
