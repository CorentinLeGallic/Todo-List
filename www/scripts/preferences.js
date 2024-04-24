import updateIcons from "./updateIcons.js";
import setSecondaryColor from "./utils/setSecondaryColor.js";
import setTheme from "./utils/setTheme.js";

const themeInputs = document.getElementsByClassName("theme-radio");
const colorInputs = document.getElementsByClassName("color-radio");

let defaultTheme = (localStorage.getItem("theme") == null) ? window.matchMedia('(prefers-color-scheme: dark)').matches ? "dark" : "light" : localStorage.getItem("theme");
let defaultColor = (localStorage.getItem("theme-color") == null) ? "--theme-color1" : localStorage.getItem("theme-color");

for (const themeInput of themeInputs) {

    let theme = themeInput.id.slice(0, -12);

    if (theme == defaultTheme) {
        themeInput.checked = true;
    } else {
        themeInput.checked = false;
    }

    themeInput.addEventListener("change", () => {
        if (theme == "light" || theme == "dark") {
            localStorage.setItem("theme", theme);
        } else if (theme == "auto") {
            localStorage.setItem("theme", window.matchMedia('(prefers-color-scheme: dark)').matches ? "dark" : "light");
        }
        setTheme();
        updateIcons();
    })
}

for (const colorInput of colorInputs) {

    let color = colorInput.id.slice(0, -6);

    if (color == defaultColor) {
        colorInput.checked = true;
    } else {
        colorInput.checked = false;
    }

    colorInput.addEventListener("click", () => {
        localStorage.setItem("theme-color", "--theme-" + color);
        setSecondaryColor();
    })
}

// document.addEventListener("scroll", () => {
//     if(window.scrollY == 0){
        
//     }
// })