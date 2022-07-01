var form  = document.getElementById('myform');
var email = document.getElementById('mail');
var error = document.querySelector('.error');

email.addEventListener("input", function (event) {
  // kiểm tra khi user bắt đầu nhập
  if (email.validity.valid) {
    // nếu valid, remove
    error.innerHTML = ""; 
    error.className = "error"; 
  }
}, false);

form.addEventListener("submit", function (event) {
  // kiểm tra khi user click submit.
  if (!email.validity.valid) {
    error.innerHTML = "Baby à, cho anh địa chỉ email chứ";
    error.className = "error active";
    // chặn việc submit form
    event.preventDefault();
  }
}, false);