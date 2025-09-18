// ESEMÉLYKEZELÉS TUTORIÁL

// 1. hivatkozás minden érintett elemre (bemenet, kimenet, kiváltó)
const p = document.querySelector("p");
const button = document.querySelector("button");

// 2. írd meg az eseménykezelő fv-t
function handleButtonClick(){
    p.innerText = parseInt(p.innerText) + 1;
    // p.innerText = +p.innerText + 1;
    // p.innerText = Number(p.innerText) + 1;
}

// 3. eseményfigyelő regisztrálása
button.addEventListener("click", handleButtonClick);