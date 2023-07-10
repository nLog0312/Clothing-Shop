const body = document.querySelector("body"),
    sidebar = document.querySelector(".sidebar"),
    toggle = document.querySelector(".toggle"),
    modeSwitch = document.querySelector(".toggle-switch"),
    modeText = document.querySelector(".mode-text"),
    navLinks = document.querySelectorAll(".nav-link"),
    titleContent = document.querySelector(".information .text");


toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
})

modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");
    modeText.textContent = modeText.textContent === "Dark Mode" ? "Light Mode" : "Dark Mode";
});