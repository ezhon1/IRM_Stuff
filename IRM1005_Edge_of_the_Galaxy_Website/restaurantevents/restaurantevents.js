//jQuery//
$(document).ready(function(){
	$("#flip").click(function(){
		$("#panel").slideToggle("slow");
	});

	$("mark").mouseenter(function(){
		$("mark").css("color", "white");
		$("mark").css("background-color", "#9b0000");
	});
	$("mark").mouseleave(function(){
	  $("mark").css("background-color", "black");
	  $("mark").css("color", "white");
	});
});

//JavaScript//
function restauranteventsheading1(){
	document.getElementById("h1").style.color = "#004080";
	document.getElementById("h1").style.fontSize = "50px";
}

function restauranteventsheading2(){
	document.getElementById("h1").style.color = "white";
}



