const categories = document.getElementsByName("category");
const categoryTitle = document.getElementById("selected-category-title");

let selectedPreferencesContainer = document.getElementById("preferences-global");

categories.forEach(category => {
    let preferencesContainer = document.getElementById("preferences-" + category.id);

    if (preferencesContainer == selectedPreferencesContainer) {
        preferencesContainer.style.display = "flex";
    } else {
        preferencesContainer.style.display = "none";
    }

    category.addEventListener("change", () => {
        categoryTitle.textContent = document.querySelector("label[for=" + category.id + "]").textContent;

        selectedPreferencesContainer.style.display = "none";
        selectedPreferencesContainer = preferencesContainer;
        selectedPreferencesContainer.style.display = "flex";
    })
});