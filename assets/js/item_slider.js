/*item_slider.js*/
const board = document.querySelector("#board_img_wrap");
const slide = document.querySelector(".slides");
const boardImgs = document.querySelectorAll(".view_img");
let currentIdx = 0;

const buttonLeft = document.querySelector("#left_btn");
const buttonRight = document.querySelector("#right_btn");
const slideImgs = document.querySelectorAll(".slide_imgs");

/*イメージスライド*/
function boardImgChange() {
  if (board) {
    boardImgs.forEach((boardImgs) => {
      boardImgs.style.width = `${boardImgs.clientWidth}px`; 
    });

    slide.style.width = `-${board.clientWidth * boardImgs.length}px`; 

   

    buttonLeft.addEventListener("click", () => {
      currentIndex--;
      currentIndex = currentIndex < 0 ? 0 : currentIndex; 
      slide.style.marginLeft = `-${board.clientWidth * currentIndex}px`; 
      clearInterval(interval); 
      interval = getInterval(); 
    });

    buttonRight.addEventListener("click", () => {
      currentIndex++;
      currentIndex =
        currentIndex >= boardImgs.length ? boardImgs.length - 1 : currentIndex; 
      slide.style.marginLeft = `-${board.clientWidth * currentIndex}px`; 
      clearInterval(interval); 
      interval = getInterval(); 
    });

    function click_img(index) {
      slideImgs[index].addEventListener("click", () => {
        currentIndex = index;
        slide.style.marginLeft = `-${board.clientWidth * currentIndex}px`;
        clearInterval(interval); 
        interval = getInterval(); 
      });
    }

    for (var i = 0; i < slideImgs.length; i++) {
      click_img(i);
    }
  }
}

const getInterval = () => {
  if (board) {
    return setInterval(() => {
      currentIndex++;
      currentIndex = currentIndex >= boardImgs.length ? 0 : currentIndex;
      slide.style.marginLeft = `-${board.clientWidth * currentIndex}px`;
    }, 3000);
  }
};

let interval = getInterval(); 

boardImgChange();
