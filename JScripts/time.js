function display_c() {
    var refresh = 1000;
    mytime = setTimeout('display_ct()', refresh)
}

function display_ct() {
    var strcount
    var x = new Date()
    var x1 = x.toUTCString(); 
    document.getElementById('ct').innerHTML = x1;
    tt = display_c();
}