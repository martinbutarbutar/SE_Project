//eye icon
let eyeOpen = document.querySelector(".eye_open");
let eyeClosed = document.querySelector(".eye_closed");

eyeOpen.addEventListener("click", () => {
    // eyeClosed.classList.toggle("show");
    // eyeOpen.classList.toggle("hide");
    eyeClosed.style.display = "block";
    eyeOpen.style.display = "none";
});

eyeClosed.addEventListener("click", () => {
    // eyeOpen.classList.toggle("show")
    // eyeClosed.classList.toggle("hide");
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