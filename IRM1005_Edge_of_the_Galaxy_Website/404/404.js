var r = 0;

function spin() {
	r++;
	document.getElementById("crest").style.transform = "rotate3D(0,1,0," + r + "deg)"
}

function startSpin() {
	setInterval(spin,10);
}