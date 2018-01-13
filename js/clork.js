var dom = document.getElementById('clork');
var ctx = dom.getContext('2d');
var width = ctx.canvas.width;
var height = ctx.canvas.height;
var r = width / 2;
var rem = width / 200;  //比例


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

    var hourNumbers = [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 1, 2];  //画12个数字
    ctx.font = 18 * rem + 'px Arial';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    hourNumbers.forEach(function(number, i){

    	var rad = 2 * Math.PI / 12 * i;
    	var x = Math.cos(rad) * (r - 30 * rem);
    	var y = Math.sin(rad) * (r - 30 * rem);
        ctx.fillStyle = "#000";
        ctx.fillText(number, x, y);
    })

    for(var i = 0; i < 60; i++){                //画60个秒点
    	var rad = 2 * Math.PI / 60 * i;
    	var x = Math.cos(rad) * (r - 18 * rem);
    	var y = Math.sin(rad) * (r - 18 * rem);
        
    	ctx.beginPath();
    	if(i % 5 === 0){
    		ctx.arc( x, y, 2 * rem, 0, 2 * Math.PI, false);
            ctx.fillStyle = "#000";
    	}
    	else{
    		ctx.arc( x, y, 2 * rem, 0, 2 * Math.PI, false);
    		ctx.fillStyle = "#ccc";  //填充灰色
    	}
        ctx.fill();//实心
    }

}

function drawHour(hour, minute){
    ctx.save();
    ctx.beginPath();
    var rad = 2 * Math.PI / 12 * hour;
    var mrad = 2 * Math.PI / 12 / 60 * minute;
    ctx.rotate(rad + mrad);
    ctx.lineWidth = 6 * rem;  //不能写成“6px”
    ctx.lineCap = 'round'; //让线的两端是圆的
    ctx.moveTo(0, 10 * rem);
    ctx.lineTo(0, -r / 2);  //往下是正向
    ctx.stroke();
    ctx.restore();
}


function drawMinute(minute){
    ctx.save();
    ctx.beginPath();
    var rad = 2 * Math.PI / 60 * minute;
    ctx.rotate(rad);
    ctx.lineWidth = 3 * rem;  //不能写成“3px”
    ctx.lineCap = 'round'; //让线的两端是圆的
    ctx.moveTo(0, 10 * rem);//多10像素让指针的尾巴不是在圆心
    ctx.lineTo(0, -r + 30 * rem);  //往下是正向 等于 -（r - 30）-r是上边缘，上边缘向下30像素，数字越大越短
    ctx.stroke();
    ctx.restore();
}

function drawSecond(second){
   ctx.save();
    ctx.beginPath();
    ctx.fillStyle = "#ee6e73";
    var rad = 2 * Math.PI / 60 * second;
    ctx.rotate(rad);
    ctx.moveTo(-2 * rem, 20 * rem);
    ctx.lineTo(2 * rem, 20 * rem);
    ctx.lineTo(1, -r + 18 * rem);
    ctx.lineTo(-1, -r + 18 * rem);
    ctx.fill();
    ctx.restore();
}

function drawDot() {
    ctx.beginPath();
    ctx.fillStyle = "#fff";
    ctx.arc(0, 0, 3 * rem, 0, 2 * Math.PI, false);
    ctx.fill();
}

function draw(){
ctx.clearRect(0, 0, width, height);
var now = new Date();
var hour = now.getHours();
var minute = now.getMinutes();
var second = now.getSeconds();
drawBackground();
drawHour(hour, minute);
drawMinute(minute);
drawSecond(second);
drawDot();
ctx.restore();
}

draw();
setInterval(draw, 1000);














