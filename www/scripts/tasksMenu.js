import findParentInArray from "./utils/findParentInArray.js";

const tasksBtns = document.getElementsByClassName("task-options");
const dropdownMenu = document.getElementById("tasks-dropdown");

const mainSection = document.getElementById("mylist-main");

const taskOptions = document.getElementsByClassName("task-option");

let taskDropdownIsActive = false;

window.addEventListener("click", (e) => {
    let task = findParentInArray(e.target, tasksBtns);
    if(task){
        if(taskDropdownIsActive){
            dropdownMenu.classList.remove("active");
        }

        let mainRect = mainSection.getBoundingClientRect();
        let verticalOffset = e.pageY - mainRect.top - window.scrollY + 5;
        let horizontalOffset = e.pageX - mainRect.left + 5;

        // console.log(dropdownMenu.clientWidth)
        // console.log(dropdownMenu.clientHeight)

        // console.log(horizontalOffset + dropdownMenu.clientWidth)
        // console.log(window.innerWidth)

        // console.log("--------")
        // console.log(verticalOffset + dropdownMenu.clientHeight)
        // console.log("--------")
        // // console.log(window.innerHeight)
        // console.log(e.pageY);
        // console.log(mainRect.top);
        // console.log(window.scrollY)
        // console.log(e.pageY - mainRect.top - window.scrollY + 5);

        if(verticalOffset + dropdownMenu.clientHeight + mainRect.top > window.innerHeight || horizontalOffset + dropdownMenu.clientWidth + 10 > window.innerWidth){
            dropdownMenu.style.top = (verticalOffset - dropdownMenu.clientHeight - 10).toString()  + "px";
            dropdownMenu.style.left = (horizontalOffset - dropdownMenu.clientWidth - 10).toString() + "px";
        } else {
            dropdownMenu.style.top = verticalOffset.toString()  + "px";
            dropdownMenu.style.left = horizontalOffset.toString() + "px";
        }
        
        dropdownMenu.classList.add("active");

        for(let taskOption of taskOptions){
            taskOption.dataset.taskId = task.dataset.taskId;
        }

        // dropdownMenu.dataset.taskId = task.dataset.taskId;

        taskDropdownIsActive = true;
    } else {
        dropdownMenu.classList.remove("active");
        taskDropdownIsActive = false;
    }
})

window.addEventListener("resize", () => {
    if(taskDropdownIsActive){
        taskDropdownIsActive = false;
        dropdownMenu.classList.remove("active");
    }
})

// tasksBtns.array.forEach(taskBtn => {
//     taskBtn.addEventListener("click", () => {
        
//     })
// });