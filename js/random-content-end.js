const L1 = document.getElementById("ce-link-1");
const L2 = document.getElementById("ce-link-2");
const L3 = document.getElementById("ce-link-3");
const L4 = document.getElementById("ce-link-4");

const array_title = ["mandarynki.eu", "discord server", "jajco", "dupa"];
const array_href = ["https://mandarynki.eu", "https://discord.gg", "tutaj_jajco", "a tutaj dupa"];

function getUniqueRandomIndices(count, max) {
    const indices = new Set();
    while (indices.size < count) {
        indices.add(Math.floor(Math.random() * max));
    }
    return [...indices];
}

function updateLinks() {
    const linkElements = [L1, L2, L3, L4];
    const uniqueIndices = getUniqueRandomIndices(linkElements.length, array_title.length);

    linkElements.forEach((link, i) => {
        const index = uniqueIndices[i];
        link.textContent = array_title[index];
        link.href = array_href[index];
    });
}

updateLinks();