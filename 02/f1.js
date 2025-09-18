const par = document.querySelector("p");
par.innerText = "S<i>zer</i>da"; // nem működik a formázás
par.innerHTML = "S<i>zer</i>da"; // így már működik

const he = document.querySelector("h1");
he.innerText = "Csütörtök";

const hes = document.querySelectorAll("h1"); // NodeList
for (const h of hes)
    h.innerText = "Mindet átírtam!";

// CSS  -> background-color: green
// JS   -> backgroundColor = "green"
par.style.backgroundColor = "green";
par.style.color = "rgb(250 200 150)";
par.style.border = "3px black solid";

const img = document.querySelector("img");
img.src = "https://static.posters.cz/image/750/art-photo/close-up-of-red-fox-on-snow-i210563.jpg";