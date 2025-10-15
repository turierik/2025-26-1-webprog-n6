const canvas = document.querySelector('canvas');
const ctx = canvas.getContext('2d');

const balls = [
    { x: 250, y: 50, c: "red", r: 20, vy: 0 }
];

function render(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (const ball of balls){
        ctx.beginPath();
        ctx.arc(ball.x, ball.y, ball.r, 0, 2 * Math.PI);
        ctx.fillStyle = ball.c;
        ctx.fill();
    }
}

function update(dt){
    for (const ball of balls){
        ball.vy += 0.001 * dt;
        ball.y += ball.vy * dt;

        if (ball.y > canvas.height - ball.r){
            ball.y = canvas.height - ball.r;
            ball.vy *= -0.7;
        }
    }
}

let last = performance.now();

function gameLoop(){
    const now = performance.now();
    const dt = now - last;
    update(dt);
    render();
    requestAnimationFrame(gameLoop);
    last = now;
}
gameLoop();

canvas.addEventListener("click", function(e){
    balls.push({
        x: e.clientX,
        y: e.clientY,
        vy: 0,
        r: Math.floor(10 + Math.random() * 10),
        c: `rgb(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)})`
    });
})