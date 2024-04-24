import sendPhpRequest from "./utils/sendPhpRequest.js";
import sortTasks from "./utils/sortTasks.js";

const statusBtns = document.getElementsByClassName("status");
const tasks = document.getElementsByClassName("task");

Array.from(tasks).forEach(task => {

    let completed_status = {
        id: "completed",
        el: task.querySelector(".completed-status")
    };

    let ongoing_status = {
        id: "ongoing",
        el: task.querySelector(".ongoing-status")
    };

    let activeStatus = {
        completed: completed_status.el.classList.contains("active"),
        ongoing: ongoing_status.el.classList.contains("active")
    };

    for (const [key, statusBtn] of Object.entries({
        completed: completed_status.el,
        ongoing: ongoing_status.el
    })) {
        statusBtn.addEventListener("click", () => {
            // console.log(statusBtn.dataset.taskId);
            // console.log(statusBtn.id);

            let taskId = task.id;
            let newStatus = activeStatus[key] ? "default" : key;

            sendPhpRequest("../includes/handle_task_status_change.php", 'POST', `task_id=${taskId}&new_status=${newStatus}`, (response) => {
                activeStatus[key] = !activeStatus[key];
                activeStatus[key == "completed" ? "ongoing" : "completed"] = false;

                if (newStatus == "default") {
                    let taskDate = new Date(task.dataset.taskDate);
                    let currentDate = new Date();

                    if (taskDate >= currentDate) {
                        task.dataset.status = "upcoming";
                    } else {
                        task.dataset.status = "expired";
                    }
                } else {
                    task.dataset.status = newStatus;
                }

                // console.log("--------------");
                [completed_status, ongoing_status].forEach(status => {
                    // console.log(status.id);
                    if (activeStatus[status.id]) {
                        status.el.classList.add("active");
                    } else {
                        status.el.classList.remove("active");
                    }
                })
                // console.log("--------------");

                sortTasks(document.querySelector('input[name="category"]:checked'));
            }, (response) => {
                console.error("Task status change request failed.")
            }, (error) => {
                console.error("An error occured while sending the task status change request : " + error)
            })
        })
    }
});


// Array.from(statusBtns).forEach(statusBtn => {

//     let isActive = statusBtn.classList.contains("active");

//     statusBtn.addEventListener("click", () => {
//         // console.log(statusBtn.dataset.taskId);
//         // console.log(statusBtn.id);

//         let taskId = statusBtn.dataset.taskId;
//         let newStatus = statusBtn.id;

//         sendPhpRequest("../../includes/handle_task_status_change.php", 'POST', `task_id=${taskId}&new_status=${newStatus}`, (response) => {
//             // console.log("Request succeded ! Response : ", response.text());
//             // console.log(document.querySelector('input[name="category"]:checked'));

//             let task = findParentInArray(statusBtn, tasks);
//             task.dataset.status = newStatus;

//             sortTasks(document.querySelector('input[name="category"]:checked'));
//         }, (response) => {
//             console.error("Task status change request failed.")
//         }, (error) => {
//             console.error("An error occured while sending the task status change request : " + error)
//         })
//     })
// });