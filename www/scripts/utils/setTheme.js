export default function setTheme() {
    const root = document.querySelector(":root");

    if (localStorage.getItem("theme") == null) {
        localStorage.setItem("theme", window.matchMedia('(prefers-color-scheme: dark)').matches ? "dark" : "light");
    }

    root.setAttribute("data-theme", localStorage.getItem("theme"));
    root.classList.add(localStorage.getItem("theme"));
    root.classList.remove((localStorage.getItem("theme") == "light") ? "dark" : "light");
}

// if (localStorage.getItem("theme") == "dark") {
// addAttributes(root, {
// "--bg1": "#292929",
// "--bg2": "rgb(59, 59, 59)",
// "--bg3": "#282828",
// "--bg4": "#353535",
// "--bg5": "#1b1a19",
// "--bg6": "#0000004b",
// "--bg7": "rgb(83, 83, 83)",
// "--bg8": "#FFF",
// "--bg9": "rgb(248, 248, 248)",
// "--shadow1": "#00000050",
// "--shadow2": "rgb(94, 94, 94)",
// "--shadow3": "rgb(15, 15, 15)",
// "--shadow4": "rgb(245, 245, 245)",
// "--border1": "#FFF",
// "--border2": "rgb(15, 15, 15)",
// "--border3": "rgba(255, 255, 255, 0.5)",
// "--border4": "rgb(94, 94, 94)",
// "--border5": "rgb(27, 27, 27)",
// "--border6": "#292929",
// "--color1": "#FFF",
// "--color2": "rgb(216, 216, 216)",
// "--color3": "#e3e3e3",
// "--overlay": "rgba(0, 0, 0, 0.301)",
// })
// } else {
// addAttributes(root, {
// "--bg1": "#DDDDDD",
// "--bg2": "rgb(196, 196, 196)",
// "--bg3": "#D7D7D7",
// "--bg4": "#CACACA",
// "--bg5": "#E4E5E6",
// "--bg6": "#FFFFFFB4",
// "--bg7": "rgb(172, 172, 172)",
// "--bg8": "#000",
// "--bg9": "rgb(7, 7, 7)",
// "--shadow1": "#FFFFFFAF",
// "--shadow2": "rgb(161, 161, 161)",
// "--shadow3": "rgb(240, 240, 240)",
// "--shadow4": "rgb(245, 245, 245)",
// "--border1": "#000",
// "--border2": "rgb(196, 196, 196)",
// "--border3": "rgba(0, 0, 0, 0.5)",
// "--border4": "rgb(196, 196, 196)",
// "--border5": "rgb(220, 220, 220)",
// "--border6": "#DDDDDD",
// "--color1": "#000",
// "--color2": "rgb(39, 39, 39)",
// "--color3": "#1c1c1c",
// "--overlay": "rgba(255, 255, 255, 0.301)"
// })
// }