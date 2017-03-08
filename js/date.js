var dom = document.getElementById('date');
var ctx = dom.getContext('2d');
var width = ctx.canvas.width;
var height = ctx.canvas.height;
var r = width / 2;
var rem = width / 200;  //比例
var d = new Date();


function drawBackground(){
    ctx.save();
    ctx.translate( r, r);
    ctx.beginPath();
    ctx.lineWidth = 10 * rem;
    ctx.arc( 0, 0, r - ctx.lineWidth / 2, 0, 2 * Math.PI, false);    
    ctx.strokeStyle = "rgba(0,0,0,0.7)";
    ctx.stroke();//空心

    ctx.beginPath();
    ctx.arc( 0, 0, r - ctx.lineWidth / 2 - 5 * rem, 0, 2 * Math.PI, false);    
    ctx.fillStyle = "rgba(255,255,255,0.7)";
    ctx.fill();//实心背景

    ctx.font = 18 * rem + 'px Arial';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
        ctx.fillStyle = "#000";

    ctx.fillText(d.getFullYear(), -30, 0);
    ctx.fillText(".", -5, 0);
    ctx.fillText(d.getMonth()+1, 10, 0);
    ctx.fillText(".", 25, 0);
    ctx.fillText(d.getDate(), 40, 0);




}



drawBackground();



















