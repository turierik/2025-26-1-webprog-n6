const canvas = document.querySelector('canvas');
const ctx = canvas.getContext('2d');

let hands = [];
let date = null; 

const W = canvas.width;
const H = canvas.height;

function render(){ 
    ctx.clearRect(0, 0, W, H);
    renderMarkings();
    renderClockFace();
    renderText();
    renderHands();
}

function renderClockFace(){
    ctx.beginPath();
    ctx.arc(W/2, H/2, 200, 0, 2 * Math.PI);
    ctx.strokeStyle = "darkblue";
    ctx.lineWidth = 10;
    ctx.stroke();
}

function renderHands(){
    for (const hand of hands){
        ctx.beginPath();
        ctx.moveTo(W/2, H/2);
        ctx.lineTo(W/2 + hand.length * Math.sin(hand.angle), H/2 - hand.length * Math.cos(hand.angle));
        ctx.strokeStyle = hand.color;
        ctx.lineWidth = hand.width;
        ctx.stroke();
    }
}

function renderMarkings(){
    ctx.strokeStyle = "black";
    for (let deg = 0; deg < 360; deg += 360 / 12){
        const angle = rad(deg);
        const startRadius = deg % 90 === 0 ? 160 : 180;
        ctx.lineWidth = deg % 90 === 0 ? 6 : 2;
        ctx.beginPath();
        ctx.moveTo(W/2 + startRadius * Math.sin(angle), H/2 - startRadius * Math.cos(angle));
        ctx.lineTo(W/2 + 200 * Math.sin(angle), H/2 - 200 * Math.cos(angle));
        ctx.stroke();
    }
}

function renderText() {
    const formatted = date.toLocaleTimeString('en-GB', { hour12: false });
    ctx.font = "30px Sixtyfour";
    ctx.fillStyle = "red";
    ctx.textAlign = "center";
    ctx.fillText(formatted, W/2, 370);
}

const rad = (deg) => deg / 180 * Math.PI;

function update(){
    date = new Date();
    hands = [
        { length: 100, width: 8, color: "black", angle: rad((date.getHours() + date.getMinutes() / 60) / 12 * 360) },
        { length: 140, width: 4, color: "black", angle: rad((date.getMinutes() + date.getSeconds() / 60) / 60 * 360) },
        { length: 190, width: 2, color: "red",   angle: rad((date.getSeconds() + date.getMilliseconds() / 1000) / 60 * 360)},
    ];
}

function next(){
    update();
    render();
    requestAnimationFrame(next);
}
next();