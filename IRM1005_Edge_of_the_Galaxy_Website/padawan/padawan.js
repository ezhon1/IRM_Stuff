var n = 0;

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
    //new image taken from https://www.starwars.com/databank/hoth
    document.getElementById("imagetwo").src = "media/cr2.png";
    //new image taken from https://media.contentapi.ea.com/content/dam/walrus/common/naboo.jpg
    document.getElementById("imagethree").src = "media/cr3.png";
    //new image taken from https://lumiere-a.akamaihd.net/v1/images/databank_cloudcity_01_169_e589ba2c.jpeg?region=0%2C0%2C1560%2C878&width=960
    document.getElementById("imagefour").src = "media/cr4.png";
    //new image taken from https://i.pinimg.com/originals/a7/7f/48/a77f486665f37182fa04cbbfd202a7ab.jpg
    document.getElementById("headerimage").src = "media/cr5.png";
    document.getElementById("desc1").style.color = "#B3000C";
    document.getElementById("desc2").style.color = "#B3000C";
    document.getElementById("desc3").style.color = "#B3000C";
    document.getElementById("desc4").style.color = "#B3000C";
    document.getElementById("above").style.color = "#3C8D0D";
    document.getElementById("other").style.color = "#3C8D0D";
    document.getElementById("above").style.textAlign = "center";
    document.getElementById("above").innerHTML = "December is Star Month! <br/>Come check out our Limited Time attractions!";
    document.getElementById("desc1").innerHTML = "Come out for our Present Hunt!";
    document.getElementById("desc2").innerHTML = "Visit Hoth and join our Snow Base <br/>Building Competition!";
    document.getElementById("desc3").innerHTML = "Come relax on Naboo!";
    document.getElementById("desc4").innerHTML = "Explore Bespin: What surprises await you?";
    document.getElementById("other").innerHTML = "<i>Attractions available for a limited time only</i>";
    $("#oct").hide();
    $("#firstli").hide();
    $("#secondli").hide();
    document.getElementById("snpk").innerHTML = "Go Back";
}

function myFunction2() {
	document.getElementById("imageone").src = "media/Otoh Gunga.png";
    document.getElementById("imagetwo").src = "media/Corellia.png";
    document.getElementById("imagethree").src = "media/Blueprint.png";
    document.getElementById("imagefour").src = "media/Ewok.png";
    document.getElementById("headerimage").src = "media/village.png";
    document.getElementById("desc1").style.color = "#004080";
    document.getElementById("desc2").style.color = "#004080";
    document.getElementById("desc3").style.color = "#004080";
    document.getElementById("desc4").style.color = "#004080";
    document.getElementById("above").style.color = "black";
    document.getElementById("other").style.color = "black";
    document.getElementById("above").style.textAlign = "left";
    document.getElementById("above").innerHTML = "Attractions:";
    document.getElementById("desc1").innerHTML = "Under Water City:<br/> Explore Otoh Gunga with Jar Jar Binks";
    document.getElementById("desc2").innerHTML = "Corellia: Visit the planet of Corellia <br/>And check out our Children's spaceship <br/>Flying school!";
    document.getElementById("desc3").innerHTML = "Also available on Corellia: <br/>Courses on designing and building <br/>your own spaceship";
    document.getElementById("desc4").innerHTML = "Save the Ewok!";
    document.getElementById("other").innerHTML = "<i>More attractions coming soon!</i>";
    $("#oct").show();
    $("#firstli").show();
    $("#secondli").show();
    document.getElementById("snpk").innerHTML = "December Sneak Peak";
}

