const weeks = document.getElementsByClassName("week");
const days = document.getElementsByClassName("day");
const tasks = document.getElementsByClassName("task");

const noResultContainer = document.getElementById("no-result-container");
const weeksContainer = document.getElementById("weeks");

export default function sortTasks(category) {
    let renderedTasks = [];
    if (category.value == "all") {
        renderedTasks = tasks;
        for (let task of tasks) {
            task.style.display = "flex";
        }
    } else {
        for (let task of tasks) {
            if (task.dataset.status == category.value) {
                renderedTasks.push(task)
                task.style.display = "flex";
            } else {
                task.style.display = "none";
            }
        }
    }

    for (let day of days) {
        let dayTasks = day.getElementsByClassName("task");
        let isNotEmpty = Array.from(dayTasks).some((task) => task.style.display == "flex");

        if (isNotEmpty) {
            day.style.display = "block";
        } else {
            day.style.display = "none";
        }
    }

    for (let week of weeks) {
        let weekDays = week.getElementsByClassName("day");
        let isNotEmpty = Array.from(weekDays).some((day) => day.style.display == "block");

        if (isNotEmpty) {
            week.style.display = "block";
        } else {
            week.style.display = "none";
        }
    }

    if(renderedTasks.length > 0){
        noResultContainer.classList.remove("active");
        weeksContainer.classList.add("active");
    } else {
        weeksContainer.classList.remove("active");
        noResultContainer.classList.add("active");
    }
}