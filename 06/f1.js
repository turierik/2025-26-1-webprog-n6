const canvas = document.querySelector('canvas');
const ctx = canvas.getContext('2d');

ctx.fillStyle = "green";
ctx.fillRect(50, 50, 120, 70);

ctx.strokeStyle = "hotpink";
ctx.lineWidth = 4;
ctx.strokeRect(70, 70, 120, 70);

ctx.font = "40px Comic Sans MS";
ctx.lineWidth = 1;
ctx.fillText("Hello", 200, 200);
ctx.strokeText("Stroke", 200, 300);

const fox = new Image();
fox.src = "fox.png";
fox.addEventListener("load", function(){
    ctx.drawImage(fox, 200, 200);
    ctx.drawImage(fox, 200, 200, 100, 100);
})

ctx.beginPath();
ctx.moveTo(300, 50);
ctx.lineTo(330, 80);
ctx.lineTo(320, 120);
ctx.lineTo(300, 50);
ctx.stroke();
ctx.fill();

ctx.beginPath();
ctx.arc(150, 150, 50, 0, 2 * Math.PI);
ctx.fill();