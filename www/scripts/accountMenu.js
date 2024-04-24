accountButton = document.getElementById("account-button");
accountDropdown = document.getElementById("account-dropdown");
accountDisconnect = document.getElementById("disconnect")

accountDropdownIsActive = false;

window.addEventListener("click", (e) => {
    if ((e.target == accountButton || accountButton.contains(e.target)) && !accountDropdownIsActive) {
        accountDropdownIsActive = true;
        accountDropdown.classList.add("active");
    } else if (accountDropdownIsActive) {
        accountDropdownIsActive = false;
        accountDropdown.classList.remove("active");
    }
})