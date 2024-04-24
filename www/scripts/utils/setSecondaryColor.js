export default function setSecondaryColor() {
    const root = document.querySelector(":root");

    if (localStorage.getItem("theme-color") == null) {
        localStorage.setItem("theme-color", "--theme-color1");
    }

    root.setAttribute("data-theme-color", localStorage.getItem("theme-color"));
    root.style.setProperty("--current-theme", "var(" + localStorage.getItem("theme-color") + ")")
}