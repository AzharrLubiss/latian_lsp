
const menuToggle = document.getElementById("menuToggle");
const navigation = document.getElementById("navigation");

if (menuToggle && navigation) {
    menuToggle.addEventListener("click", function () {
        const isOpen = navigation.classList.toggle("show");

        menuToggle.setAttribute(
            "aria-expanded",
            String(isOpen)
        );
    });
}
