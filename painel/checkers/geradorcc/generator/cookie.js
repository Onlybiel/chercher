 function setCookie(cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + (3*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = "Bin" + "=" + cvalue + "; " + expires;
}
function getCookie() {
    var name = "Bin" + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
function checkCookie() {
    var binE=getCookie();
    if (binE!="") {
		document.console.ccp.value=binE;
    }
}