const carousel1 = document.getElementById("carousel-1");
const carousel2 = document.getElementById("carousel-2");
const carousel1Items = document.getElementById("carousel-1-items");
const carousel2Items = document.getElementById("carousel-2-items");
const carouselImage = document.getElementById("carousel-image");

const carousel1Slides = Array.from(document.getElementsByClassName("slide-carousel-1"));
const carousel2Slides = Array.from(document.getElementsByClassName("slide-carousel-2"));

const slideHeight = carouselImage.getBoundingClientRect().height


const setSlidePosition = () => {
    carousel1Slides.forEach((slide, index) => {
        slide.style.top = slideHeight * index + "px";
    });
    carousel2Slides.forEach((slide, index) => {
        slide.style.bottom = slideHeight * index + "px";
    });
};

function carouselMover1() {
    const nextSlide = carousel1Slides.pop();
    const top = nextSlide.style.top;
    console.log(top);

    carousel1Items.style.transform = "translateY(-" + top + ")";
    setTimeout(() => {
        carousel1Items.style.transform = "translateY(0)";
    }, 5000);



    carousel1Slides.unshift(nextSlide);


    setTimeout(carouselMover1, 5000);
}

function carouselMover2() {
    const nextSlide = carousel2Slides.pop();
    const bottom = nextSlide.style.bottom;
    console.log(bottom);

    carousel2Items.style.transform = "translateY(" + bottom + ")";
    setTimeout(() => {
        carousel2Items.style.transform = "translateY(0)";
    }, 5000);



    carousel2Slides.unshift(nextSlide);


    setTimeout(carouselMover2, 5000);
}

setSlidePosition();
setTimeout(carouselMover1(), 5000);
setTimeout(carouselMover2(), 5000);



