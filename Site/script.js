/*
var body = document.body;
var bodyHeight = Math.max(body.scrollHeight, body.offsetHeight);
var html = document.documentElement;
var htmlHeight = Math.max(html.scrollHeight, html.offsetHeight);
var maxHeight = Math.max(bodyHeight, htmlHeight);

var h = window.innerHeight ||
    document.documentElement.clientHeight ||
    document.body.clientHeight;
if (bodyHeight < h) {
    document.getElementById("footer").classList.add('footerBloque');
    document.body.style.height = "100vh";
} else {
    document.getElementById("footer").classList.add('footerNonConnecte');
    document.body.style.height = "initial";
}

function myFunction(x) {
    if (x.matches) { // If media query matches
        //alert("it matches ! totalHeight: "+totalHeight+"   bodyHeight : "+bodyHeight);
        document.getElementById("footer").style.position = "inherit";
        document.getElementById("footer").style.display = "flex";
    } else {
        document.getElementById("footer").style.position = "absolute";
        document.getElementById("footer").style.display = "flex";
    }
}

if (document.getElementById("footer").classList.contains('footerBloque')) {
    var footerHeight = Math.max(document.getElementById("footer").scrollHeight, document.getElementById("footer").offsetHeight);

    var totalHeight = footerHeight + maxHeight;
    var y = window.matchMedia("(max-height: " + bodyHeight + "px)");
    myFunction(y); // Call listener function at run time
    y.addListener(myFunction); // Attach listener function on state changes


}
*/
