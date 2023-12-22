var c;

$(function(){
	$("td.logo").on('click', function(){
		window.location.href="../homepage/homepage.html";
	});
	
	$("#header table tr").css("background-color", "black");
	
	$("td.logo").on('mouseover', function(){
		document.getElementById('logo').src='../headerfooter/media/logob.png';
	});
	
	$("td.logo").on('mouseleave', function(){
		document.getElementById('logo').src='../headerfooter/media/logow.png';
	});

	$(".esub").submit(function(){
		console.log($("#subemail").text());
		alert("Thanks for subscribing!");
	});
	
	$("header input", "footer input").focus(function(){
		$(this).css("background-color", "white");
	});
	
	$("#subcheck").on("click", function(){
		checkSubscribe();
		
	});
});

function checkSubscribe(){
	var confirm = document.forms["subscribe"]["confirm"].checked;
	if(confirm == true){
		document.getElementById("subsub").disabled = false;
	}else{
		document.getElementById("subsub").disabled = true;
	}
}


