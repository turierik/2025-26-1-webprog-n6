const task1 = document.querySelector('#task1');
const task2 = document.querySelector('#task2');
const task3 = document.querySelector('#task3');
const task4 = document.querySelector('#task4');

const game = [
  "XXOO",
  "O OX",
  "OOO ",
];

task1.innerHTML = game.every(row => row.length === game[0].length);
// task1.innerHTML = !game.some(row => row.length !== game[0].length);
// task1.innerHTML = undefined === game.find(row => row.length !== game[0].length);
// task1.innerHTML = game.filter(row => row.length === game[0].length).length === game.length;
// task1.innerHTML = game.filter(row => row.length !== game[0].length).length === 0;

task2.innerHTML = game[0].split("").every(char => char === "X" || char === "O");

const xs = game.join("").split("").filter(char => char === "X").length;
const os = game.join("").split("").reduce((sum, char) => sum + (char === "O" ? 1 : 0), 0);
task3.innerHTML = `X / O = ${xs} / ${os}`;

task4.innerHTML = game.findIndex(row => row.includes("XXX") || row.includes("OOO"));