//jQuery//
$(document).ready(function() {
    $("#flip").click(function() {
        $("#panel").fadeToggle("slow");
    });

    $("#input").focus(function() {
        $(this).css("background-color", "#lightblue");
    });

    $("#input").blur(function() {
        $(this).css("background-color", "white");
    });

    $(".text").click(function() {
        $(".text").css("color", "white");
        $(".text").css("background-color", "#9b0000");
    });

    $("h4").mouseenter(function() {
        $("div#animate").animate({
            left: '250px'
        });
    });

    $("h4").mouseleave(function() {
        $("div#animate").animate({
            left: '0px'
        });
    });
});

//JavaScript//
function appendNames() {
    var firstname = document.forms["form"]["fname"].value;
    var lastname = document.forms["form"]["lname"].value;
    window.alert(firstname + "." + lastname);
}

//slideshow//
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 5000); // Change image every 5 seconds
}