let panelCategory = document.getElementById("category-dropdown");
let panelTags = document.getElementById("tags-dropdown");

let statusCat = false; // true - displayed, false - hidden
let statusTag = false; // true - displayed, false - hidden

let selCat = document.getElementsByName("selected-category");
let catBtn = document.getElementById("btn-selected-category");
let catList = document.getElementById("category-list");
let catSearch = document.getElementById("search-category");

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

function selectCategory(name, value) {
    catBtn.textContent = name;
    selCat.value = value;
}

function removeCategory() {
    catBtn.textContent = "No category selected";
    selCat.value = "";
}

catSearch.addEventListener("input", function () {
  const filterValue = this.value.toLowerCase();
  const buttons = document.querySelectorAll("#category-list button");

  buttons.forEach(button => {
    const name = button.getAttribute("name").toLowerCase();
    if (name.includes(filterValue)) {
      button.style.display = "inline-block";
    } else {
      button.style.display = "none";
    }
  });
});