const form = document.querySelector(".login-form form"),
  loginBtn = form.querySelector(".form-group input[type=submit]"),
  errorText = form.querySelector(".error_text");

form.onsubmit = (e) => {
  e.preventDefault();
};

loginBtn.onclick = () => {
  //Ajax
  let xhr = new XMLHttpRequest(); //creating XML object
  xhr.open("POST", "php/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "success") {
          location.href = "index.php";
        } else if (data == "fail") {
          location.href = "user_otp.php";
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};
