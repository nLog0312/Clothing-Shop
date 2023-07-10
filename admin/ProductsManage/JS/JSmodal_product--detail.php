// Handle click button "Huỷ"
let modal = document.querySelector(".modal");
let btnClose = document.querySelector(".modal-close");

function HideModal() {
    modal.classList.remove("open");
    location.href="./"
}

btnClose.addEventListener("click", HideModal);