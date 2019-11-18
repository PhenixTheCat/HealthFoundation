
var body = document.body;
var bodyHeight = Math.max( body.scrollHeight, body.offsetHeight);
var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;
if(bodyHeight<h){
    document.getElementById("footer").classList.add('footerBloque');
}
else{
    document.getElementById("footer").classList.add('footerNonConnecte');
}

function myFunction(x) {
  if (x.matches) { // If media query matches
        document.getElementById("footer").style.position = "inherit";
        document.getElementById("footer").style.display = "flex";
  }
  else {
        document.getElementById("footer").style.position = "absolute";
        document.getElementById("footer").style.display = "flex";
  }
}
    
if(document.getElementById("footer").classList.contains('footerBloque')){
    var footerHeight = Math.max( document.getElementById("footer").scrollHeight, document.getElementById("footer").offsetHeight);
    alert("height footer : "+footerHeight);
    var totalHeight = footerHeight + bodyHeight;
    var y = window.matchMedia("(max-height: "+totalHeight+"px)");
    myFunction(y); // Call listener function at run time
    y.addListener(myFunction); // Attach listener function on state changes


}

