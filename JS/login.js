//eye icon
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

//tampilkan password
function MyPasswordVisible () {
    let x = document.getElementById("open");
    if (x.type == "password") {
        x.type = "text";
    }
    else {
        x.type = "password"
    }
}
