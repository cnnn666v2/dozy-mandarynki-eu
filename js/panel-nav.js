const dd_menu1 = document.getElementById("dropdown-blogs");
const dd_menu2 = document.getElementById("dropdown-categories");
const dd_menu3 = document.getElementById("dropdown-tags");

const dd_btn1 = document.getElementById("subnav-blogs");
const dd_btn2 = document.getElementById("subnav-categories");
const dd_btn3 = document.getElementById("subnav-tags");

dd_btn1.addEventListener("click", toggleBlog);
dd_btn2.addEventListener("click", toggleCategory);
dd_btn3.addEventListener("click", toggleTags);

function toggleBlog() {
  if (dd_menu1.classList.contains("hidden")) {
    dd_menu1.classList.remove("hidden");
    dd_btn1.classList.add("bg-green-600");

    dd_menu2.classList.add("hidden");
    dd_btn2.classList.remove("bg-green-600");

    dd_menu3.classList.add("hidden");
    dd_btn3.classList.remove("bg-green-600");
  } else {
    dd_menu1.classList.add("hidden");
    dd_btn1.classList.remove("bg-green-600");
  }
}

function toggleCategory() {
  if (dd_menu2.classList.contains("hidden")) {
    dd_menu2.classList.remove("hidden");
    dd_btn2.classList.add("bg-green-600");

    dd_menu1.classList.add("hidden");
    dd_btn1.classList.remove("bg-green-600");

    dd_menu3.classList.add("hidden");
    dd_btn3.classList.remove("bg-green-600");
  } else {
    dd_menu2.classList.add("hidden");
    dd_btn2.classList.remove("bg-green-600");
  }
}

function toggleTags() {
  if (dd_menu3.classList.contains("hidden")) {
    dd_menu3.classList.remove("hidden");
    dd_btn3.classList.add("bg-green-600");

    dd_menu1.classList.add("hidden");
    dd_btn1.classList.remove("bg-green-600");

    dd_menu2.classList.add("hidden");
    dd_btn2.classList.remove("bg-green-600");
  } else {
    dd_menu3.classList.add("hidden");
    dd_btn3.classList.remove("bg-green-600");
  }
}
