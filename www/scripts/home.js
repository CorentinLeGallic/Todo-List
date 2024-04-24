import lockScroll from "./utils/lockScroll.js";

const sloganElements = document.getElementsByClassName("home-slogan-element");
const frame1scroller = document.getElementById("frame1-scroller");
const scrollingFrame = document.getElementById("scrolling-frame");

const frame2stickyContainer = document.getElementById("scrolling-sticky-container");
const scrollingContainer = document.getElementById("scrolling-container");
const scrollingStatuts = document.getElementsByClassName("scrolling-statuts");

const frameSeparator2 = document.getElementById("frame-separator2");

const frame3 = document.getElementById("frame3");
const frame3stickyContainer = document.getElementById("frame3-sticky-container");
const frame3stickyLayer1 = document.getElementById("frame3-sticky-layer1");
const frame3title = document.getElementById("frame3-title");
const mouseIcon = document.getElementById("mouse-icon");

const colorContainer = document.getElementById("frame3-color-container");
const frame3Bg = document.getElementById("frame3-colors-bg");
const frame3txt = document.getElementById("frame3-color-txt");
const frame3colors = document.getElementsByClassName("frame3-color");

const registerContainer = document.getElementById("register-container");
const registerContent = document.getElementById("register-content");
const registerLabel = document.getElementById("register-label");

window.onbeforeunload = function () {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "instant"
    });
}
lockScroll(7000);

Array.from(sloganElements).forEach((sloganEl, elIndex) => {
    let text = sloganEl.textContent.split("");
    sloganEl.textContent = "";
    let result = [];

    text.forEach(char => {
        if (char == " ") {
            char = "\u00a0"
        }
        const span = document.createElement("span");
        span.setAttribute("class", "home-slogan-char");
        span.textContent = char;
        result.push(span);
    })

    result.forEach((span, spanIndex) => {
        span.setAttribute("style", `animation-delay: ${3.5 + elIndex + spanIndex / 40}s`);
        span.classList.add("active");
        sloganEl.appendChild(span);
    })
})

frame1scroller.addEventListener("click", () => {
    window.scrollTo(0, scrollingFrame.offsetTop);
})

document.addEventListener("mousemove", (e) => {
    const activeCard = document.querySelector(".scrolling-card.active");

    activeCard.style.setProperty("--scrolling-card-before-position", `clamp(-100px, ${e.clientX - activeCard.getBoundingClientRect().x - 100}px, 200px)`);
})

// Le before de la scrolling card active se déplace horizontalement pour être au même niveau que la souris

let currentCardIndex = 0;
let currentCard = document.getElementById(`card${currentCardIndex}`);

window.addEventListener("scroll", () => {
    let scrollFraction = ((window.scrollY - frame2stickyContainer.parentElement.offsetTop) / window.innerHeight);
    scrollFraction = scrollFraction < 0 ? 0 : scrollFraction > 3 ? 3 : scrollFraction;
    scrollingContainer.style.transform = `translateX(${-scrollFraction * 350}px)`; // 100vh = 350px

    if (Math.round(scrollFraction) != currentCardIndex) {
        currentCard.classList.remove("active");

        currentCardIndex = Math.round(scrollFraction);
        currentCard = document.getElementById(`card${currentCardIndex}`);

        currentCard.classList.add("active");

        for (const scrollingStatut of scrollingStatuts) {
            if (parseInt(scrollingStatut.id.charAt(4)) <= currentCardIndex) {
                scrollingStatut.classList.add("active");
            } else {
                scrollingStatut.classList.remove("active");
            }
        }
    }
});

window.addEventListener("scroll", () => {
    console.log('Scrolling')
    if (frame3.offsetTop <= window.scrollY) {
        if (!frame3title.classList.contains("active")) {
            frame3title.classList.add("active");
            mouseIcon.classList.add("active1");
            lockScroll(2000);
            frame3.style.cursor = "none";
            setTimeout(() => {
                frame3.style.cursor = "auto";
            }, 2000);
        } else {
            let scrollFraction = ((window.scrollY - frame3.offsetTop) / window.innerHeight) * 2;
            // scrollFraction = scrollFraction < 0 ? 0 : scrollFraction > 1 ? 1 : scrollFraction;
            scrollFraction = scrollFraction < 0 ? 0 : scrollFraction;
            frame3title.style.fontSize = `${120 - Math.min(scrollFraction, 1) * 40}px`;
            frame3title.style.paddingTop = `calc((50vh - 225px)*${1 - Math.min(scrollFraction, 1)} + 50px)`;
            colorContainer.style.top = `${frame3title.offsetHeight + (window.innerHeight - frame3title.offsetHeight - colorContainer.offsetHeight) / 2}px`;

            if (mouseIcon.classList.contains("active1")) {
                mouseIcon.classList.remove("active1");
            }

            if (frame3.offsetTop < window.scrollY - 1) {
                mouseIcon.classList.remove("active2");
            } else {
                mouseIcon.classList.add("active2");
            }

            // if (scrollFraction >= (1 - 300 / window.innerHeight)) {
            if (scrollFraction >= 1) {
                if (!colorContainer.classList.contains("active")) {
                    Array.from(frame3colors).forEach((colorEl, index) => {
                        colorEl.style.transitionDelay = `${index * 0.10}s`;
                    });
                    colorContainer.classList.add("active");
                    // window.scrollTo({
                    //     top: ,
                    //     left: 0,
                    //     behavior: "instant"
                    // });
                    // console.log("Locking scroll")
                    // lockScroll(3000);
                }
            } else if (colorContainer.classList.contains("active")) {
                Array.from(frame3colors).forEach(colorEl => {
                    colorEl.style.transitionDelay = "0s";
                });
                colorContainer.classList.remove("active");
            }

            // 0-30% = 1 - 1.6 : blur sur la frame3
            // 30-70%  = 1.6 - 2.4: fin blur sur la frame3 + apparition progressive register container
            // 70-100%  = 2.4 - 3: animations sur le register container
            // 100% : animations finales

            // 1 => 3

            let scrollFractionWithGap = scrollFraction - (300 / window.innerHeight)

            if (1 < scrollFractionWithGap && scrollFractionWithGap <= 2.4) {
                frame3stickyLayer1.style.filter = `blur(${40 * (scrollFractionWithGap - 1) / 1.4}px)`;
                frame3stickyLayer1.style.opacity = 1 - ((scrollFractionWithGap - 1) / 1.4)
            } else if (scrollFractionWithGap <= 1) {
                frame3stickyLayer1.style.filter = "blur(0px)";
                frame3stickyLayer1.style.opacity = 1;
            }

            if (1.6 <= scrollFraction && scrollFraction <= 2.4) {
                registerContainer.style.width = `${60 * (scrollFraction - 1.6) / 0.8}vh`;
                registerContainer.style.height = `${60 * (scrollFraction - 1.6) / 0.8}vh`;
                registerContainer.style.opacity = (scrollFraction - 1.6) / 0.8;
                registerContainer.style.pointerEvents = "all";
            } else if (scrollFraction < 1.6) {
                registerContainer.style.width = 0;
                registerContainer.style.height = 0;
                registerContainer.style.opacity = 0;
                registerContainer.style.pointerEvents = "none";
            } else if (scrollFraction > 2.4) {
                registerContainer.style.width = "60vh";
                registerContainer.style.height = "60vh";
                registerContainer.style.opacity = 1;
            }

            if (1.6 <= scrollFraction && scrollFraction < 2.8) {
                registerContainer.style.setProperty("--border-rotate", `${90 * (scrollFraction - 1.6) / 1.2}deg`);
            }

            if (scrollFraction >= 2.1) {
                registerLabel.style.opacity = 1;
            } else {
                registerLabel.style.opacity = 0;
            }
            if (2.2 <= scrollFraction && scrollFraction < 2.8) {
                registerLabel.style.filter = `blur(${5 * (1 - (scrollFraction - 2.2) / 0.6)}px)`;
                registerLabel.style.transform = `scale(${0.8 + 0.2 * (scrollFraction - 2.2) / 0.6})`;
            } else if (scrollFraction < 2.2) {
                registerLabel.style.filter = "blur(5px)";
                registerLabel.style.transform = "scale(0.8)";
            } else if (scrollFraction >= 2.8) {
                registerLabel.style.filter = "blur(0px)";
                registerLabel.style.transform = "scale(1)";
            }
        }
    }
});

document.addEventListener("mousemove", (e) => {
    registerContent.style.setProperty("--register-content-before-top", `clamp(-10vh, calc(${e.clientY - registerContent.getBoundingClientRect().y}px - 15vh), 60vh)`);
    registerContent.style.setProperty("--register-content-before-left", `clamp(-10vh, calc(${e.clientX - registerContent.getBoundingClientRect().x}px - 15vh), 60vh)`);
})

const colors = [
    {
        buttonColor: "rgb(109, 0, 0)",
        bgColor: "#150000",
        txtColor: "#ff2f2f"
    }, {
        buttonColor: "rgb(0, 63, 100)",
        bgColor: "#020015",
        txtColor: "#2fbbff"
    }, {
        buttonColor: "rgb(0, 133, 1)",
        bgColor: "#001502",
        txtColor: "#2fff3c"
    }, {
        buttonColor: "rgb(102, 0, 169)",
        bgColor: "#150010",
        txtColor: "#972fff"
    }, {
        buttonColor: "rgb(147, 146, 0)",
        bgColor: "#151400",
        txtColor: "#f9ff2f"
    }
];

Array.from(frame3colors).forEach((colorEl, index) => {
    colorEl.style.backgroundColor = colors[index].buttonColor;
    colorEl.style.transitionDelay = `${index * 0.10}s`;

    colorEl.addEventListener("click", () => {
        frame3.style.backgroundColor = colors[index].bgColor;
        frame3Bg.style.backgroundColor = colors[index].bgColor;
        frameSeparator2.style.background = `linear-gradient(#FFF, ${colors[index].bgColor})`;
        frame3txt.style.color = colors[index].txtColor;
    })
});

// window.addEventListener('scroll', () => {
//     const scrollPosition = window.scrollY || window.scrollY;
//     if (scrollPosition > 200) {
//         frame3stickyContainer.classList.add('sticky');
//     } else {
//         frame3stickyContainer.classList.remove('sticky');
//     }
// });