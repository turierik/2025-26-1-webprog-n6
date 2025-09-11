let numbers = [3, 4, 2, -5, -6, 0, 7];

// 1.) válogassuk ki a páros számokat

let even = [];
for (let i = 0; i < numbers.length; i++){
    if (numbers[i] % 2 === 0){
        //even[even.length] = numbers[i];
        even.push(numbers[i]);
    }
}
console.log(even);

even = [];
for (const number of numbers){
    if (number % 2 === 0){
        even.push(number);
    }
}
console.log(even);

console.log(numbers.filter(x => x % 2 === 0));

function isEven(x){
    return x % 2 === 0;
}

console.log(numbers.filter(isEven));

// 2.) numbers tömb minden elemét emeld köbre

console.log(numbers.map(x => x ** 3));

// 3.) mi a legnagyobb szám a number tömbben?
// a.) for ciklus
let largest = numbers[0];
for (let i = 1; i < numbers.length; i++)
    if (numbers[i] > largest) largest = numbers[i];
console.log(largest);
// b.) Math.max 
console.log(Math.max(...numbers));
// c.) reduce
console.log(numbers.reduce((prevResult, number) => prevResult > number ? prevResult : number));

// 4.) hány negatív szám van a tömbben?
console.log(numbers.filter(x => x < 0).length);
console.log(numbers.reduce((prevResult, number) => prevResult + (number < 0 ? 1 : 0), 0));

// objektum

let car = {
    model: "Tesla M",
    year: 2024,
    broken: false
};
console.log(car);
console.log(car.year);
console.log(car["year"]);