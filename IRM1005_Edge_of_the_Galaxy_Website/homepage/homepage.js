var r = 0;

function spin(){
	r++;
	document.getElementById("icon1").style.transform = "rotate3D(0,1,0," + r + "deg)"
	document.getElementById("icon2").style.transform = "rotate3D(0,1,0," + r + "deg)"
	document.getElementById("icon3").style.transform = "rotate3D(0,1,0," + r + "deg)"
	document.getElementById("icon4").style.transform = "rotate3D(0,1,0," + r + "deg)"
	document.getElementById("icon5").style.transform = "rotate3D(0,1,0," + r + "deg)"
}

function startSpin(){
	setInterval(spin, 10);
}