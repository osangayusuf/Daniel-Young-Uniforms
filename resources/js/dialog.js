const showDialog = document.querySelector('#show-dialog');
const closeDialog = document.querySelectorAll('#close-dialog');
const dialog = document.querySelector('#dialog');

const checkBoxes = Array.from(document.querySelectorAll('input[type="checkbox"]'));
const cartCount = document.querySelector('#cart-count');


const toggleDialog = () => {
    dialog.classList.toggle('hidden');
    dialog.classList.toggle('block');
};


showDialog.addEventListener('click', toggleDialog);
for (let i = 0; i < closeDialog.length; i++) {
    closeDialog[i].addEventListener('click', toggleDialog);
}

const countCheckedBoxes = () => {
    cartCount.innerHTML = document.querySelectorAll('input[type="checkbox"]:checked').length;
};

for (let i = 0; i < checkBoxes.length; i++) {
    checkBoxes[i].addEventListener("click", countCheckedBoxes);
}


