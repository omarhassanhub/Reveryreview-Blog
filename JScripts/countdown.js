var count = 6;
var redirect = "home.html";

function countDown() {
    var timer = document.getElementById("timer");
    if (count > 0) {
        count--;
        timer.innerHTML = "You will be redirected to the Blog in " + count + " seconds.";
        setTimeout("countDown()", 1000);
    } else {
        window.location.href = redirect;
    }
}