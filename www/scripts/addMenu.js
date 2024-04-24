import findValueInObjectArray from "./utils/findValueInObjectArray.js";
import sendPhpRequest from "./utils/sendPhpRequest.js";
import sortTasks from "./utils/sortTasks.js";

const addBtns = document.getElementsByClassName("add-task");
const overlay = document.getElementById("overlay");
const addMenu = document.getElementById("add-menu");

const addForm = document.getElementById("add-form");

const cancelBtn = document.getElementById("cancel-add");

const addInputs = document.querySelectorAll(".add-input");

const addError = document.getElementById("add-error");

let menuIsActive = false;

function closeMenu() {
    for (let addInput of addInputs) {
        addInput.value = "";
    }
    addMenu.dataset.taskId = "";
    menuIsActive = false;
    overlay.classList.remove("active");
    addMenu.classList.remove("active");
}

window.addEventListener("mousedown", (e) => {
    for (let addBtn of addBtns) {
        if ((e.target == addBtn || addBtn.contains(e.target)) && !menuIsActive) {
            addMenu.style.top = (window.scrollY + (window.innerHeight / 2)).toString() + "px";

            menuIsActive = true;
            overlay.classList.add("active");
            addMenu.classList.add("active");
        } else if (menuIsActive && !(addMenu.contains(e.target) || addMenu == e.target)) {
            closeMenu();
        } else {
            continue;
        }
        break;
    }
});

addForm.addEventListener("submit", (e) => {
    e.preventDefault();

    setTimeout(() => {
        if (addError.classList.contains("active")) {
            addError.classList.remove("active");
        }
        const formData = new FormData(addForm);

        let title = formData.get("add-title");
        let description = formData.get("add-description");
        let dateDay = formData.get("add-date-day");
        let dateMonth = formData.get("add-date-month");
        let dateYear = formData.get("add-date-year");

        sendPhpRequest("../includes/handle_task_add.php", 'POST', `name=${title}&description=${description}&date_day=${dateDay}&date_month=${dateMonth}&date_year=${dateYear}`, (response) => {
            window.location.reload(true);
        }, (response) => {
            if (!addError.classList.contains("active")) {
                addError.classList.add("active");
            }
            console.error("Task add request failed - " + response.status)
        }, (error) => {
            console.error("An error occured while sending the task add request : " + error)
        })
    }, 300)
});

cancelBtn.addEventListener("click", closeMenu);