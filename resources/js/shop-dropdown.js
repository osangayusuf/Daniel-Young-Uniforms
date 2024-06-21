const showDropDownButtons = document.querySelectorAll('#open-dropdown');

const dropDowns = document.querySelectorAll('#dropdown')

for (let i = 0; i < showDropDownButtons.length; i++) {
    const toggleDropDown = () => {
        dropDowns[i].classList.toggle('hidden');
        dropDowns[i].classList.toggle('block');
    };

    showDropDownButtons[i].addEventListener('click', toggleDropDown);
}
