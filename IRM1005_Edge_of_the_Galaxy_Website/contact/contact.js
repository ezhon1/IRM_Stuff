// validate form first name, last name, comments, submit, and reset and declare function validateForm()
function validateForm() {
  var firstname = document.forms["myForm"]["firstname"];               
  var lastname = document.forms["myForm"]["lastname"];    
  var comments = document.forms["myForm"]["comments"];
  var check = 0;
  
  if (firstname.value == "") { 
    check = 1;
  } else if (lastname.value == "") { 
    check = 1;
  } else if (comments.value == "") { 
    check = 1;
  }
  
  if (check == 1) {
	  window.alert("Please make sure to enter your first name, last name and comments.");
	  firstname.focus();
	  check = 0;
  } else {
	  document.forms["myForm"].submit();
  }
}

// Change text size
function bigFont(){
	document.getElementById("demo").style.fontSize = "300%";
}

function smallFont(){
	document.getElementById("demo").style.fontSize = "200%";
}

function readText(form) {
  TestVar = form.inputbox.value;
  alert("You typed: " + TestVar);
}
 
function writeText(form) {
  form.inputbox.value = "Have a nice day!"
}

function myFunction() {
  document.getElementById("myForm").submit();
}

function getAndDisplay() {
  var x = document.getElementById("myTextarea").value;
  document.getElementById("display").innerHTML = x;
}

mybutton = document.getElementById("myBtn");
window.onscroll = function() {
  scrollFunction()
};

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
 
// jQuery code below 

$(document).ready(function(){
	$("button").click(function(){
		$("#test").hide();
	});

	$("#flip").click(function(){
		$("#panel"). slideToggle("slow");
	});

	$("input").focus(function(){
		$(this).css("background-color", "lightblue");
  });
  
  $("input").blur(function(){
    $(this).css("background-color", "orange");
  });

	var text_max = 250;
	$('#textarea_feedback').html(text_max + ' characters remaining');
	
	$('#textarea').keyup(function() {
		var text_length = $('#description_id').val().length;
		var text_remaining = text_max - text_length;

		$('#textarea_feedback').html(text_remaining + ' characters remaining');
	});
});
