import getTheme from "./utils/getTheme.js";

const imgs = document.querySelectorAll("img");

export default function updateIcons() {
    imgs.forEach(img => {
        if (img.dataset.img) {
            img.src = "../assets/images/" + img.dataset.img + "-" + getTheme() + ".png";
            // console.log(img)
        }
    })
}