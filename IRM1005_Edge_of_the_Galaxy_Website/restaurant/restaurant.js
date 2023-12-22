//jQuery//
$(document).ready(function() {
    $("mark").mouseenter(function() {
        $("mark").css("color", "white");
        $("mark").css("background-color", "#9b0000");
    });
    $("mark").mouseleave(function() {
        $("mark").css("background-color", "black");
        $("mark").css("color", "white");
    });

    $(".th").mouseenter(function() {
        $(".th").css("color", "white");
        $(".th").css("background-color", "#9b0000");
    });
    $(".th").mouseleave(function() {
        $(".th").css("background-color", "#004080");
        $(".th").css("color", "white");
    });

    $("h2").dblclick(function() {
        alert("Click on our menu pages below for more information.");
    });

    $(".restaurantheader").mouseenter(function() {
        $(".restaurantheader").css("color", "#004080");
    });
    $(".restaurantheader").mouseleave(function() {
        $("restaurantheader").css("color", "black");
    });
});

//JavaScript//
function show_popup(source, description) {
    var p = document.getElementById("popup");
    p.style.display = "block";
    p.style.opacity = "0";
    setTimeout(popup_fade_in, 5);

    document.getElementById("popup_image").src = source;
    document.getElementById("popup_image").alt = description;
    document.getElementById("popup_caption").innerHTML = description;
}

function popup_fade_in() {
    document.getElementById("popup").style.opacity = "100";
}

function hide_popup() {
    document.getElementById("popup").style.opacity = "0";
    setTimeout(popup_display_none, 500);
}

function popup_display_none() {
    document.getElementById("popup").style.display = "none";
}

function restauranteventsheading1() {
    document.getElementById("h1").style.color = "#004080";
    document.getElementById("h1").style.fontSize = "50px";
}

function restauranteventsheading2() {
    document.getElementById("h1").style.color = "white";
}