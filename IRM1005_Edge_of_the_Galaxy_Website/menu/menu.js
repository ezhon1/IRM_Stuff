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
});

//JavaScript//
function changeText(id) {
    id.innerHTML = "Sunday is all you can Jabba";
}

var numProducts = 0;

function addToCart() {
    var product = document.getElementById("product").value;
    var size = document.getElementById("size").value;

    var newElement = document.createElement("p");
    newElement.className = "cartProduct";
    newElement.innerHTML = size + " " + product;

    document.getElementById("cart").appendChild(newElement);
    numProducts += 1;
}

function checkout() {
    alert("Your cart contains " + numProducts + " products.");
}

function restauranteventsheading1() {
    document.getElementById("h1").style.color = "#004080";
    document.getElementById("h1").style.fontSize = "50px";
}

function restauranteventsheading2() {
    document.getElementById("h1").style.color = "white";
}

function myFunction() {
    var x = document.getElementById("myTextarea").value;
    document.getElementById("demo").innerHTML = x;
}