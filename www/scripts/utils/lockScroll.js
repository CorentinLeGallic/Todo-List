import unlockScroll from "./unlockScroll.js";

export default function lockScroll(duration = null) {
    // let defaultOverflow = document.querySelector(":root").style.overflow;
    let defaultOverflow = window.getComputedStyle(document.querySelector(":root")).overflow;

    document.querySelector(":root").style.overflow = "hidden";

    if (duration) {
        setTimeout(() => {
            unlockScroll(defaultOverflow);
            console.log("Unlocking after " + duration + "ms - defaultOverflow : " + defaultOverflow)
        }, duration);
    } else {
        return defaultOverflow;
    }
}