export default function unlockScroll(defaultOverflow) {
    document.querySelector(":root").style.overflow = defaultOverflow;
}