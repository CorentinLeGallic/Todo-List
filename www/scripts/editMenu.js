import findValueInObjectArray from "./utils/findValueInObjectArray.js";
import sendPhpRequest from "./utils/sendPhpRequest.js";

const editBtn = document.getElementById("edit-task");
const overlay = document.getElementById("overlay");
const editMenu = document.getElementById("edit-menu");

const editForm = document.getElementById("edit-form");

const titleInput = document.getElementById("edit-title");
const descriptionInput = document.getElementById("edit-description");

const dayInput = document.getElementById("edit-date-day");
const monthInput = document.getElementById("edit-date-month");
const yearInput = document.getElementById("edit-date-year");

const cancelBtn = document.getElementById("cancel-edit");

const editInputs = document.querySelectorAll(".edit-input");

const editError = document.getElementById("edit-error");

let menuIsActive = false;

function closeMenu() {
    for (let editInput of editInputs) {
        editInput.value = "";
    }
    editMenu.dataset.taskId = "";
    menuIsActive = false;
    overlay.classList.remove("active");
    editMenu.classList.remove("active");
}

window.addEventListener("mousedown", (e) => {
    if ((e.target == editBtn || editBtn.contains(e.target)) && !menuIsActive) {

        let taskId = editBtn.dataset.taskId;
        let task = findValueInObjectArray(tasks, "task_id", taskId);

        editMenu.dataset.taskId = taskId;

        titleInput.value = task["task_name"];
        descriptionInput.value = task["task_description"];

        let date_values = task["task_date"].split("-");

        [yearInput.value, monthInput.value, dayInput.value] = date_values;

        editMenu.style.top = (window.scrollY + (window.innerHeight / 2)).toString() + "px";

        menuIsActive = true;
        overlay.classList.add("active");
        editMenu.classList.add("active");
    } else if (menuIsActive && !(editMenu.contains(e.target) || editMenu == e.target)) {
        closeMenu();
    }
});

editForm.addEventListener("submit", (e) => {
    e.preventDefault();

    setTimeout(() => {
        if (editError.classList.contains("active")) {
            editError.classList.remove("active");
        }
        const formData = new FormData(editForm);

        let taskId = editMenu.dataset.taskId;
        let newTitle = formData.get("edit-title");
        let newDescription = formData.get("edit-description");
        let newDateDay = formData.get("edit-date-day");
        let newDateMonth = formData.get("edit-date-month");
        let newDateYear = formData.get("edit-date-year");

        sendPhpRequest("../includes/handle_task_edit.php", 'POST', `task_id=${taskId}&new_name=${newTitle}&new_description=${newDescription}&new_date_day=${newDateDay}&new_date_month=${newDateMonth}&new_date_year=${newDateYear}`, (response) => {

            // const editedTask = document.querySelector('[data-id="' + taskId + '"]');

            // let newDate = `${newDateYear}-${newDateMonth}-${newDateDay}`;

            // editedTask.dataset.taskDate = newDate;

            // editedTask.querySelector(".task-title").innerText = newTitle;
            // editedTask.querySelector(".task-description").innerText = newDescription;

            // let task = findValueInObjectArray(tasks, "task_id", taskId);
            // task.task_title = newTitle;
            // task.task_description = newDescription;
            // task.task_date = newDate;

            // console.log(task.task_date)

            // if (task.task_status == "default") {
            //     let taskDate = new Date(newDate);
            //     let currentDate = new Date();

            //     if (taskDate >= currentDate) {
            //         editedTask.dataset.status = "upcoming";
            //     } else {
            //         editedTask.dataset.status = "expired";
            //     }
            // }
            window.location.reload(true);
        }, (response) => {
            if (!editError.classList.contains("active")) {
                editError.classList.add("active");
            }
            console.error("Task edit request failed - " + response.status)
        }, (error) => {
            console.error("An error occured while sending the task edit request : " + error)
        })
    }, 300)
});

cancelBtn.addEventListener("click", closeMenu);