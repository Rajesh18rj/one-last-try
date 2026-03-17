document.addEventListener('DOMContentLoaded', () => {

    const level = window.assessmentLevel;

    if (!['Excellent','Good'].includes(level)) return;

    const canvas = document.getElementById('confetti-canvas');

    if(!canvas) return;

    const ctx = canvas.getContext('2d');

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const colors=[
        '#F79C23',
        '#FFB84D',
        '#FFD18A',
        '#34D399',
        '#60A5FA'
    ];

    const confetti=[];

    for(let i=0;i<120;i++){

        confetti.push({

            x:Math.random()*canvas.width,
            y:Math.random()*canvas.height/2,
            r:Math.random()*6+4,
            d:Math.random()*40+10,
            color:colors[Math.floor(Math.random()*colors.length)],
            tilt:Math.random()*10-10,
            tiltAngle:0,
            tiltAngleIncrement:Math.random()*0.1+0.04

        });

    }

    function draw(){

        ctx.clearRect(0,0,canvas.width,canvas.height);

        confetti.forEach(c=>{

            ctx.beginPath();
            ctx.fillStyle=c.color;

            ctx.arc(c.x,c.y,c.r,0,Math.PI*2);

            ctx.fill();

        });

        update();

    }

    function update(){

        confetti.forEach(c=>{

            c.y+=Math.cos(c.d)+2;

            c.tiltAngle+=c.tiltAngleIncrement;

            c.tilt=Math.sin(c.tiltAngle)*15;

            if(c.y>canvas.height){

                c.y=-10;
                c.x=Math.random()*canvas.width;

            }

        });

    }

    let animationFrame;

    function animate(){

        draw();

        animationFrame=requestAnimationFrame(animate);

    }

    animate();

    setTimeout(()=>{

        cancelAnimationFrame(animationFrame);

        ctx.clearRect(0,0,canvas.width,canvas.height);

    },4000);

});
