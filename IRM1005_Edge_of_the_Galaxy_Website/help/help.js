function myFunction() {
    window.alert("Help me please!");
}

function getHelp(){
	document.getElementById("demo").innerHTML = "If you find yourself under the attack of a Sith lord, crime lord, bounty hunter, etc. please contact us at (666) HelpMe! Or Text EMERGENCY to (666) 666-6666."
}

function tryIt() {
	var x = document.createElement("h1");
	var t = document.createTextNode("Help! Page");
	x.appendChild(t);
	document.getElementById("hi").appendChild(x);
}

// jQuery code below 

$(document).ready(function(){
	alert("You entered the Help! Page. Welcome!");
	
	$("#fade").click(function(){
		$("#div1").fadeIn();
		$("#div2").fadeIn("slow")
		$("#div3").fadeIn(8000);
		$("#div4").fadeIn(8000);
		$("#div5").fadeIn(9000);
		$("#div6").fadeIn(10000);
		$("#div7").fadeIn(12000);
	});
	
	$("#p3, #up").css("color", "blue")
		.slideUp(4000)
		.slideDown(4000);

	$(".btn1").click(function(){
		$("p").slideUp();
	});
	$(".btn2").click(function(){
		$("p").slideDown();
	});
});

window.onbeforeunload = function(){
	  return "You left the Help! Page. Please come back again.";
	};









