const shopCatButton = document.querySelector('#shop-categories-button');
const shopCatMenu = document.querySelector('#shop-categories-menu');
const shopFilterButton = document.querySelector('#shop-filter-button');
const shopFilterMenu = document.querySelector('#shop-filter-menu');


const toggleCatMenu = () => {
    shopCatMenu.classList.toggle('hidden');
    shopCatMenu.classList.toggle('block');
}

const toggleFilterMenu = () => {
    shopFilterMenu.classList.toggle('hidden');
    shopFilterMenu.classList.toggle('block');
}

shopCatButton.addEventListener('click', toggleCatMenu);
shopCatMenu.addEventListener('click', toggleCatMenu)

shopFilterButton.addEventListener('click', toggleFilterMenu);
shopFilterMenu.addEventListener('click', toggleFilterMenu);
