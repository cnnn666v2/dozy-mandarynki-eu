let panelCategory = document.getElementById("category-dropdown");
let panelTags = document.getElementById("tags-dropdown");

let statusCat = false; // true - displayed, false - hidden
let statusTag = false; // true - displayed, false - hidden

function toggleCategory() {
    if(!panelCategory.classList.contains("hidden")) {
        panelCategory.classList.add("hidden");
        statusCat = false;
    } else {
        panelCategory.classList.remove("hidden");
        statusCat = true;
    }

    if(statusTag) { panelTags.classList.add("hidden"); }
}

function toggleTags() {
    if(!panelTags.classList.contains("hidden")) {
        panelTags.classList.add("hidden");
        statusTag = false;
    } else {
        panelTags.classList.remove("hidden");
        statusTag = true;
    }

    if(statusCat) { panelCategory.classList.add("hidden"); }
}