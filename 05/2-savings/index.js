const form = document.querySelector("form");
const divContainer = document.querySelector(".container");

const inputs = document.querySelectorAll("input");

let m = 0;
for (const input of inputs){
    m += Number(input.dataset.consumption);
}
console.log(m);

function updateChart(){
    let ci = [];
    for (const input of inputs){
        const c = input.value / input.max * input.dataset.consumption;
        ci.push(c);
        const label = document.querySelector(`label[for="${input.id}"]`);
        label.style.width = `${c / m * 100}%`;
    }
    console.log(ci);
}

form.addEventListener("input", updateChart);
updateChart();