var slideIndex = 0;

function showSlides() { // declare a function function showSlides() 
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
  setTimeout(showSlides, 10000); // Change image every 10 seconds 
}

function getAndDisplay() {
  var x = document.getElementById("myTextarea").value;
  document.getElementById("display").innerHTML = x;
}
  
function resize() {
  var maxrows = 1;
  var txt = textbox.value;
  var cols = textbox.cols;
  var arraytxt = txt.split('\n');
  var rows = arraytxt.length;
  for (i = 0; i < arraytxt.length; i++)
    rows += parseInt(arraytxt[i].length / cols);
  if (rows > maxrows) textbox.rows = maxrows;
  else textbox.rows = rows;
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

// No indentation 
function myFunction() {
  var list = document.getElementById("myList");
  list.removeChild(list.childNodes[0]);
}
 
// When the user clicks on the button, scroll to the top of the document 
function topFunction() {
  document.body.scrollTop = 0; 
  document.documentElement.scrollTop = 0; 
}

// jQuery code below 

$(document).ready(function(){
  $("p").dblclick(function(){
    $(this).hide();
  });
});

 

