window.onload = function () {
  var depOne = document.querySelectorAll(".li01");
  var depTwo = document.querySelectorAll(".dep2");
  var depThree = document.querySelectorAll(".dep2_li");
  var threeList = document.querySelectorAll(".dep3");

  for (let i = 0; i < depOne.length; i++) {
    depOne[i].addEventListener("click", function () {
      this.classList.toggle("on");
      depTwo[i].classList.toggle("on");
    });
  }

  for (let i = 0; i < depThree.length; i++) {
    depThree[i].addEventListener("click", function () {
      this.classList.toggle("on");
      threeList[i].classList.toggle("on");
    });
  }

  var toggle_btn = document.querySelector(".toggle_btn");
  var toggle_click = document.querySelector(".array_click");
  var array = document.querySelector(".array");
  console.log(toggle_btn);
  console.log(toggle_click);
  array.addEventListener("click", function () {
    toggle_click.classList.toggle("active");
  });
};
