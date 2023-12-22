var endDate = new Date("Dec 30, 2019 00:00:00").getTime();

var x = setInterval(function() {

  var present = new Date().getTime();

  var t = endDate - present;

  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  var hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var mins = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
  var secs = Math.floor((t % (1000 * 60)) / 1000);

  document.getElementById("second").innerHTML = days + "d  " + hours + "h  " + mins + "m  " + secs + "s  ";

  if (t < 0) {
    clearInterval(x);
    document.getElementById("first").innerHTML = "Update In Progress";
    document.getElementById("second").innerHTML = "Thank You For Your Patience";
  }
}, 1000);

function goBack(){
  window.history.back();
}