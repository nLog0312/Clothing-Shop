// Handle click button "Xoá"
let btnDeleteProducts = document.querySelectorAll(".btn-delete");
const modalDelete = document.querySelector(".modal-confirm--delete");
let btnConfirm = document.querySelector(".btn-confirm");
function HandleModalDelete() {
    modalDelete.classList.add("open");
    let id = this.value;
    btnConfirm.querySelector('a').href = "process_delete.php?id=" + id;
}
btnDeleteProducts.forEach(element => {
    element.addEventListener("click", HandleModalDelete);
});

// Handle click button "Huỷ"
let btnCancel = document.querySelector(".btn-cancel");
let btnClose = document.querySelector(".modal-close");

function HideModalDelete() {
    modalDelete.classList.remove("open");
}

btnCancel.addEventListener("click", HideModalDelete);
btnClose.addEventListener("click", HideModalDelete);