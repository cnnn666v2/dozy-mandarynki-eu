const sidebar = document.getElementById("nav-side");
const btn = document.getElementById("sidebar-btn");
const btn2 = document.getElementById("sidebar-back");

btn.addEventListener("click", hideSidebar);
btn2.addEventListener("click", hideSidebar);

function hideSidebar() {
    if(sidebar.classList.contains("hidden")) {
        sidebar.classList.remove("hidden");
        btn2.classList.add("hidden");
    } else {
        sidebar.classList.add("hidden");
        btn2.classList.remove("hidden");
    }
}