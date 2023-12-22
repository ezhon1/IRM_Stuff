function myFunction() { // declare a function name myFunction 
	var txt; // variable value is text 
	if (confirm("Press a button!")) {
	  txt = "You pressed OK!";
	} else {
	  txt = "You pressed Cancel!";
	}
	document.getElementById("demo").innerHTML = txt; // The getElementById() method returns the element that has the ID demo 
}
  
mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		mybutton.style.display = "block";
	} else {
		mybutton.style.display = "none";
	}
}
  
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
	document.body.scrollTop = 0; 
	document.documentElement.scrollTop = 0;
}
  
//jQuey code below 

$(document).ready(function(){
	$("#hide").click(function(){
		$("#notice").hide();
	});
	$("#show").click(function(){
		$("#notice").show();
	});

	$("tr:even").css("background-color", "#9b0000");

	$(".btn1").click(function(){
		$("h5").fadeOut();
		$("p").slideUp();
	});
	$(".btn2").click(function(){
		$("h5").fadeIn();
		$("p").slideDown();
	});
	
	var click = 0;
	$("#Hideheading").click(function(){
		click++;
		if (click%2 == 0){
			$("h2").show("slow", function(){
				alert("The heading is now visible");
			});
		} else {
			$("h2").hide("slow", function(){
				alert("The heading is now hidden");
			});
		}
	});
 
	$(window).bind('beforeunload', function(){
		return 'Are you sure you want to leave?';
	});
});