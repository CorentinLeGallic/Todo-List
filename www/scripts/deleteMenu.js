import sendPhpRequest from "./utils/sendPhpRequest.js";

const deleteBtn = document.getElementById("delete-task");
const overlay = document.getElementById("overlay");
const deleteMenu = document.getElementById("delete-menu");

const cancelBtn = document.getElementById("cancel-delete");
const saveDeleteBtn = document.getElementById("save-delete");

const deleteError = document.getElementById("delete-error");

let menuIsActive = false;

function closeMenu() {
    deleteMenu.dataset.taskId = "";
    menuIsActive = false;
    overlay.classList.remove("active");
    deleteMenu.classList.remove("active");
}

window.addEventListener("mousedown", (e) => {
    if ((e.target == deleteBtn || deleteBtn.contains(e.target)) && !menuIsActive) {

        let taskId = deleteBtn.dataset.taskId;

        deleteMenu.dataset.taskId = taskId;

        deleteMenu.style.top = (window.scrollY + (window.innerHeight / 2)).toString() + "px";

        menuIsActive = true;
        overlay.classList.add("active");
        deleteMenu.classList.add("active");

    } else if (menuIsActive && !(deleteMenu.contains(e.target) || deleteMenu == e.target)) {
        closeMenu();
    }
});

saveDeleteBtn.addEventListener("click", (e) => {
    e.preventDefault();

    setTimeout(() => {
        if (deleteError.classList.contains("active")) {
            deleteError.classList.remove("active");
        }

        let taskId = deleteMenu.dataset.taskId;

        sendPhpRequest("../includes/handle_task_delete.php", 'POST', `task_id=${taskId}`, (response) => {

            // const deletedTask = document.querySelector('[data-id="' + taskId + '"]');

            // deletedTask.remove();

            // let task = findValueInObjectArray(tasks, "task_id", taskId);

            // let taskIndexInArray = tasks.indexOf(task);
            // tasks = tasks.splice(taskIndexInArray, 1);

            // sortTasks(document.querySelector('input[name="category"]:checked'));
            // closeMenu();

            window.location.reload(true);

        }, (response) => {
            if (!deleteError.classList.contains("active")) {
                deleteError.classList.add("active");
            }
            console.error("Task deletion request failed - " + response.status)
        }, (error) => {
            console.error("An error occured while sending the task deletion request : " + error)
        })
    }, 300)
})

cancelBtn.addEventListener("click", closeMenu);