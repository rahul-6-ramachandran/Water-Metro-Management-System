
function colourchange(){
    colour1=document.getElementById('body1').style.backgroundColor
    if(colour1=="aliceblue"){
        document.getElementById('body1').style.backgroundColor="rgb(12, 18, 28)"
        document.getElementById('h2').style.color="white"
    }
    else if(colour1=="rgb(12, 18, 28)"){
        document.getElementById('body1').style.backgroundColor="aliceblue"
        document.getElementById('h2').style.color="black"
    }
}
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
scrollFunction();
};

function scrollFunction() {
if (
document.body.scrollTop > 20 ||
document.documentElement.scrollTop > 20
) {
mybutton.style.display = "block";
} else {
mybutton.style.display = "none";
}
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
}
