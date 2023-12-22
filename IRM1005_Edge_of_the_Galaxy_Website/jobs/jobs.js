var r = 0;
var c;

$(function(){	
	$(".jobform").hide();
	$(".show").on('click', function(){
		if ($(this).text() == " Click here to apply! "){
			$(".jobform").slideToggle();
			$(this).text(" Hide application form ");
		}else{
			$(".jobform").slideToggle();
			$(this).text(" Click here to apply! ");
		}
	});
	
	$("#comas").hide();

	$("#br").hide();
});

//spinning logo
function spin(){
	r++;
	document.getElementById("crest").style.transform = "rotate3D(0,1,0," + r + "deg)"
}

function startSpin(){
	setInterval(spin, 10);
}

function checkGender(){
	var gender = document.forms["jobform"]["gender"].value;
	if (gender == "female" || gender == "male"){
		document.getElementById("comments").required = false;
		$("#comas").hide();
	}else if(gender == "other"){
		document.getElementById("comments").required = true;
		$("#comas").show();
	}
}

function checkJob(){
	if (document.forms["jobform"]["job"].selectedIndex != 0){
		$("#note").hide();
		$("#br").show();
	}else{
		$("#note").show();
		$("#br").hide();
	}
}

//validating application form
function validateForm() {
	var fn = document.forms["jobform"]["firstname"];
	var ln = document.forms["jobform"]["lastname"];
	var gd = document.forms["jobform"]["gender"];
	var age = document.forms["jobform"]["age"];
	var email = document.forms["jobform"]["jobs_email"];
	var pn = document.forms["jobform"]["phone"];
	
	//variables for checking
	var f = "", l = "", g = "", a = "", e = "", p = "";
	var check = 0;
	
	//checking for unfilled items
	if(fn.value == ""){
		f = "\nFirst name";
		check = 1;
	}else if(ln.value == ""){
		l = "\nLast name";
		check = 1;
	}else if(gd.value == ""){
		g = "\nGender";
		check = 1;
	}else if(age.value == ""){
		a = "\nAge";
		check = 1;
	}else if(email.value == ""){
		e = "\nEmail";
		check = 1;
	}else if(pn.value == ""){
		p = "\nPhone number";
		check = 1;
	}
	
	if(check == 1){ 	//if something is unfilled
		//alert indicating all missing items
		alert("Please fill in the following:" + f + l + g + a + e + p);
		
		//move user to first unfilled item
		if (fn.value == ""){
			fn.focus();
		}else if (ln.value == ""){
			ln.focus();
		}else if (gd.value == ""){
			gd.focus();
		}else if (age.value == ""){
			age.focus();
		}else if (email.value == ""){
			email.focus();
		}else{
			pn.focus();
		}
		
		//reset check variables
		check = 0;
		f = "", l = "", g = "", a = "", e = "", p = "";
	}else{
		if(age.value < 16){
			alert("Sorry, you're too young to join the team at Edge of the Galaxy!");
			location.reload();
		}else{
			document.forms["jobform"].submit();
			alert("Thank you for applying to Edge of the Galaxy!\nWe will contact you if we have a position open for you.");
		}
	}
}