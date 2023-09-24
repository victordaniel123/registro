const menuIcon = document.getElementById("menu-icon");
const menu = document.getElementById("menu");
const content = document.getElementById("content");

menuIcon.addEventListener("click", () => {
    menu.classList.toggle("active");
    content.classList.toggle("active");
});

document.addEventListener("click", (e) => {
    if (!menu.contains(e.target) && !menuIcon.contains(e.target)) {
        menu.classList.remove("active");
        content.classList.remove("active");
    }
});
