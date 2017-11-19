/*var myCanvas = document.getElementById('draw');

myCanvas.addEventListener('click', function(event) {
    var rect = myCanvas.getBoundingClientRect();
    var x1 = event.clientX - rect.left;
    var y1 = event.clientY - rect.top;
	var ctx = myCanvas.getContext("2d");
	ctx.rect(x,y/2,40,20);
	ctx.strokeStyle=document.getElementById("stroke").value;
	ctx.stroke(); 
	ctx.fillStyle=document.getElementById("fill").value;
	ctx.fill();
	
    document.getElementById("coord").innerHTML="x: " + x + " y: " + y; 
}, false);*/
var myCanvas = document.getElementById('canvas');
var ctx = myCanvas.getContext("2d");
var startX;
var startY;
var isDrawing = false;
function draw(event){
	var rect = myCanvas.getBoundingClientRect();
	clickX = event.clientX - rect.left;
	clickY = event.clientY - rect.top;
	console.log(clickX + "-" + clickY);
	
	if(isDrawing){
		isDrawing = false;
		ctx.beginPath();
		ctx.rect(startX, startY/2, clickX - startX, clickY/2 - startY/2);
		ctx.strokeStyle=document.getElementById("stroke").value;
		ctx.stroke(); 
		ctx.fillStyle=document.getElementById("fill").value;
		ctx.fill();
	}
	else{
		isDrawing = true;
		startX = clickX;
		startY = clickY;
	}
}

myCanvas.addEventListener("click",function(e){
	draw(e);
});

function clearCanvas(){
	ctx.clearRect(0, 0, 301, 301);
}
		
	
