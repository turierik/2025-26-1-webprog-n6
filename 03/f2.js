const matrix = [
    [45, 67, 80, 22],
    [78, 2, 71, 21],
    [4, -7, 9, 82]
];

// 1. generálj a mátrixból táblázatot!
const table = document.querySelector('table');
table.innerHTML = matrix.map(row => `<tr>${
    row.map(cell => `<td>${cell}</td>`).join('')
}</tr>`).join('');

// 2. delegálással oldd meg, hogy egy cellára kattintáskor
// a cellában lévő érték megduplázódjon

function handleTdClick(e){
    if (e.target.matches('td'))
        e.target.innerText = parseInt(e.target.innerText) * 2;
}
table.addEventListener("click", handleTdClick);

// 3. (használd a delegate fv-t!) ha egy sorra rámutatok,
// színezd be a sor hátterét sárgára
// mouseover, mouseout
function delegate(parent, type, selector, handler) {
  parent.addEventListener(type, function (event) {
    const targetElement = event.target.closest(selector);
    if (this.contains(targetElement)) {
      handler.call(targetElement, event);
    }
  });
}

delegate(table, "mouseover", "tr", function (){
    this.style.backgroundColor = "yellow";
})

delegate(table, "mouseout", "tr", function (){
    this.style.backgroundColor = "";
})