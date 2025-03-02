let btnAdd = document.getElementById("add-tag");
let selTag = document.getElementById("tags-list");
let tagList = document.getElementById("tag-table");
let errorTagMsg = document.getElementById("tag-err-msg");

btnAdd.addEventListener("click", tagAdd);

function tagDel(event) {
    console.log("Jajco xd");
    event.target.remove();    
}

function tagAdd() {
    if(document.contains(document.getElementById("tg-" + selTag.value))) {
        errorTagMsg.textContent = "Error: Tag " + selTag.value + " has been already added.";
    } else {
        let element = document.createElement("p");

        element.textContent = selTag.value;
        element.id = "tg-" + selTag.value;
        element.classList.add("group", "bg-blue-600", "rounded-md", "px-2", "hover:bg-blue-400", "hover:cursor-pointer", "hover:text-red-700", "transition-colors", "ease-in-out", "duration-200");

        element.addEventListener("click", tagDel);
        tagList.appendChild(element);
    }
}