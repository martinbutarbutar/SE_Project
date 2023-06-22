//eye icon
document.addEventListener("DOMContentLoaded", function() {
  let eyeOpen = document.querySelector(".eye_open");
  let eyeClosed = document.querySelector(".eye_closed");

  eyeOpen.addEventListener("click", () => {
      eyeClosed.style.display = "block";
      eyeOpen.style.display = "none";
  });

  eyeClosed.addEventListener("click", () => {
      eyeOpen.style.display = "block";
      eyeClosed.style.display = "none";
  });
});

//tampilkan password
function MyPasswordVisible () {
    let passwordInput = document.getElementById("password");
    if (passwordInput.type == "password") {
        passwordInput.type = "text";
    }
    else {
      passwordInput.type = "password"
    }
}

function validateInput() {
  // mengambil nilai dari input form
  var username_or_email = document.forms["loginForm"]["username_or_email"].value;
  var password = document.forms["loginForm"]["password"].value;
  // var rememberCheckbox = document.forms["loginForm"]["remember"];
  // var rememberChecked = rememberCheckbox.checked;

  // lakukan validasi input
  if (username_or_email === "") {
    alert("Username or Email is required!");
    return false; // Menghentikan pengiriman form
  }

  if (password === "") {
    alert("Password is required!");
    return false; // Menghentikan pengiriman form
  }

  // Jika semua validasi sukses, return true untuk mengirim form
  return true;
}


function rememberPassword() {
  var rememberCheckbox = document.getElementById("remember");
  var passwordInput = document.getElementById("password");
  
  if (rememberCheckbox.checked) {
    var password = passwordInput.value;
    localStorage.setItem("rememberedPassword", password);
  } else {
    localStorage.removeItem("rememberedPassword");
  }
}

// Fungsi untuk memeriksa apakah kata sandi pernah disimpan di local storage
function checkRememberedPassword() {
  var rememberedPassword = localStorage.getItem("rememberedPassword");
  var passwordInput = document.getElementById("password");
  
  if (rememberedPassword) {
    passwordInput.value = rememberedPassword;
  }
}

// Panggil fungsi checkRememberedPassword() saat halaman dimuat
document.addEventListener("DOMContentLoaded", function() {
  checkRememberedPassword();
});
