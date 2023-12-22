var n = 0;

function confirmUser(){
    var verifAge = window.prompt("Please enter your age:")

    if (verifAge < 18){
        window.alert("You must be 18 years or older to visit Jedi attractions");
        window.location.href = "../homepage/homepage.html";
    }

    else if (verifAge = 18) {
        window.alert("Welcome Jedi!");
    }

    else if (verifAge > 18) {
        window.alert("Welcome Jedi!");
    }
} 

$(document).ready(function(){ 
    $(".desc").on({
        mouseenter: function(){ 
            $(this).css("background-color", "yellow");
        },
        mouseleave: function(){
            $(this).css("background-color", "white");
        },
    });
    
    $(".snpk").on("click", function(){
    	n++;
    	if(n%2 == 0){
    		myFunction2();
    		console.log("hi");
    	}else{
    		myFunction();
    	}
    });
});

function myFunction() {
    //new image taken from https://i.kym-cdn.com/photos/images/original/000/466/341/627.jpg
    document.getElementById("imageone").src = "media/cr1.png";
    //new image taken from https://cdn.vox-cdn.com/thumbor/xHRHrhMm4WPfQ5OzTXE1kXz0BjI=/0x0:815x543/1200x800/filters:focal(0x0:815x543)/cdn.vox-cdn.com/assets/3715177/atat.jpg
    document.getElementById("imagetwo").src = "media/ilum.png";
    //new image taken from https://lumiere-a.akamaihd.net/v1/images/databank_ilum_01_169_328d126d.jpeg?region=0%2C0%2C1560%2C878&width=960
    document.getElementById("imagethree").src = "media/hoth.png";
    //new image taken from https://vignette.wikia.nocookie.net/starwars/images/a/ac/Scipio.png/revision/latest?cb=20130105224010
    document.getElementById("imagefour").src = "media/scipio.png";
    //new image taken from https://lumiere-a.akamaihd.net/v1/images/krownest_793459cf.jpeg?region=0%2C0%2C1560%2C878&width=960
    document.getElementById("imagefive").src = "media/krownest.png";
    //new image taken from https://comicvine1.cbsistatic.com/uploads/original/11115/111150557/3728958-hoth2.jpg
    document.getElementById("headerimage").src = "media/cr6.png";
    document.getElementById("desc1").style.color = "#B3000C";
    document.getElementById("desc2").style.color = "#B3000C";
    document.getElementById("desc3").style.color = "#B3000C";
    document.getElementById("desc4").style.color = "#B3000C";
    document.getElementById("desc5").style.color = "#B3000C";
    document.getElementById("other").style.color = "#3C8D0D";
    document.getElementById("above").style.color = "#3C8D0D";
    document.getElementById("above").style.textAlign = "center";
    document.getElementById("desc1").innerHTML = "Come out for our Present Hunt!";
    document.getElementById("desc2").innerHTML = "Visit Ilium!";
    document.getElementById("desc3").innerHTML = "Discover Hoth!";
    document.getElementById("desc4").innerHTML = "Explore Scipio!";
    document.getElementById("desc5").innerHTML = "Team Battle on Krownest!";
    document.getElementById("other").innerHTML = "<i>Attractions available for a limited time only</i>";
    document.getElementById("above").innerHTML = "December is Star Month!<br/> Come check out our Limited Time attractions!";
    $("#oct").hide();
    $("#firstli").hide();
    $("#secondli").hide();
    document.getElementById("snpk").innerHTML = "Go Back";
}

function myFunction2() {
	document.getElementById("imageone").src = "media/Jedha.png";
    document.getElementById("imagetwo").src = "media/Tatooine.png";
    document.getElementById("imagethree").src = "media/Coruscant.png";
    document.getElementById("imagefour").src = "media/deathstar.png";
    document.getElementById("imagefive").src = "media/teambattle.png";
    document.getElementById("headerimage").src = "media/jedipic.jpg";
    document.getElementById("desc1").style.color = "#004080";
    document.getElementById("desc2").style.color = "#004080";
    document.getElementById("desc3").style.color = "#004080";
    document.getElementById("desc4").style.color = "#004080";
    document.getElementById("above").style.color = "black";
    document.getElementById("other").style.color = "black";
    document.getElementById("above").style.textAlign = "left";
    document.getElementById("above").innerHTML = "Attractions:";
    document.getElementById("desc1").innerHTML = "Explore Jedha";
    document.getElementById("desc2").innerHTML = "Visit Tatooine";
    document.getElementById("desc3").innerHTML = "Navigate Coruscant";
    document.getElementById("desc4").innerHTML = "Escape the Death Star!";
    document.getElementById("desc5").innerHTML = "Team Battle: Team up with friends <br/>and fight for your side!";
    document.getElementById("other").innerHTML = "<i>More attractions coming soon!</i>";
    $("#oct").show();
    $("#firstli").show();
    $("#secondli").show();
    document.getElementById("snpk").innerHTML = "December Sneak Peak";
}

   
