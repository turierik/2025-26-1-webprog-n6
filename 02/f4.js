const inputA = document.querySelector("#a");
const inputB = document.querySelector("#b");
const inputOp = document.querySelector("select");
const calcButton = document.querySelector("button");
const outputResult = document.querySelector("#result");

function calculate(){
    const a = inputA.value;
    const b = inputB.value;
    const op = inputOp.value;
    let result;
    switch(op){
        case "add":
            result = parseFloat(a) + parseFloat(b);
            break;
        case "sub":
            result = a - b;
            break;
        case "mul":
            result = a * b;
            break;
        case "div":
            result = a / b;
            break;
    }
    outputResult.innerText = result;
}

calcButton.addEventListener("click", calculate);