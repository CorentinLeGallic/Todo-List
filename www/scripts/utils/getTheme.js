export default function getTheme() {
// function getTheme() {
    const root = document.querySelector(":root");

    if (localStorage.getItem("theme") == null) {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? "dark" : "light";
    }

    return localStorage.getItem("theme");
}