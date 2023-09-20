const dialogBox = document.querySelector("#popup");
const toggleButton = document.querySelector("#toggle-popup");

toggleButton.addEventListener("click", () => {
    dialogBox.showModal();
})

const closeButton = document.querySelector("#toggle-close");

closeButton.addEventListener("click", () => {
    dialogBox.close();
});