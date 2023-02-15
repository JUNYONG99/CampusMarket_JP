/* product slides btn */
var slides = document.querySelector(".slides"),
  slide = document.querySelectorAll(".slides li"),
  currentIdx = 0,
  slideCount = slide.length,
  nextBtn = document.querySelector(".next"),
  slideWidth = 300,
  slideMargin = 30,
  prevBtn = document.querySelector(".prev");

slides.style.width =
  (slideWidth + slideMargin) * slideCount - slideMargin + "px";

function moveSlide(num) {
  slides.style.left = num * 330 + "px";
  currentIdx = num;
}

nextBtn.addEventListener("click", function () {
  if (currentIdx > slideCount - 14) {
    moveSlide(currentIdx - 1);
  } else {
    moveSlide(0);
  }
});
prevBtn.addEventListener("click", function () {
  if (currentIdx < slideCount - 8) {
    moveSlide(currentIdx + 1);
  } else {
    moveSlide(0);
  }
});
