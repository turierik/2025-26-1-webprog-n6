const fruits = ['alma', 'banán', 'citrom', 'datolya', 'eper', 'füge'];
const ul = document.querySelector('ul');

// for (const fruit of fruits){
//     const li = document.createElement('li');
//     li.innerText = fruit;
//     ul.appendChild(li);
// }

ul.innerHTML = fruits.map(fruit => `<li>${fruit}</li>`).join('');

function handleLiClick(e){
    if (e.target.matches('li'))
        e.target.style.color = "blue";
}

ul.addEventListener('click', handleLiClick);