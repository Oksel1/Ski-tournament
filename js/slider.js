// let slideIndex = 0;
// showSlides();

// function showSlides() {
//   let i;
//   let slides = document.getElementsByClassName("mySlides");
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   slideIndex++;
//   if (slideIndex > slides.length) {slideIndex = 1}
//   slides[slideIndex-1].style.display = "block";
//   setTimeout(showSlides, 7000); // Change image every 7 seconds
// }

let slideIndex = 0;
let autoSlideInterval;

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    autoSlideInterval = setTimeout(showSlides, 7000); // Change image every 2 seconds
}

function plusSlides(n) {
    clearTimeout(autoSlideInterval);
    showSlidesManually(slideIndex += n);
}

function currentSlide(n) {
    clearTimeout(autoSlideInterval);
    showSlidesManually(slideIndex = n);
}

function showSlidesManually(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex-1].style.display = "block";
    autoSlideInterval = setTimeout(showSlides, 7000); // Restart automatic sliding
}

showSlides();