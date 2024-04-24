import sortTasks from "./utils/sortTasks.js";

const categories = document.getElementsByName("category");

categories.forEach(category => {
    category.addEventListener("change", () => {
        sortTasks(category);
    })
});