/*Toggle Function*/
function myFunction(){
	var js1 = document.getElementById("js1");
	var arrow = document.getElementById("up-arrow");
	js1.classList.toggle("dark-light");
	arrow.classList.toggle("dark-arrow");
};

/*Footer funtion copies contactinfo to clipboard*/
function copyToClipboard(value){
	var email = document.createElement("input");
	email.value = value;
	document.body.appendChild(email);
	email.select();
	document.execCommand("copy");
	document.body.removeChild(email);
};

/*zooms in on image in events*/
var img = document.getElementsByClassName("card-img-top");

for(var i=0; i < img.length; i++){
	img[i].addEventListener("mouseover", function(){
		this.classList.add("img-zoom");
	});

	img[i].addEventListener("mouseout", function(){
		this.classList.remove("img-zoom");
	});
};

/*scroll upwards*/
var mybutton = document.getElementById("up-arrow");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
	if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
		mybutton.style.display = "block";
	} 
	else {
	    mybutton.style.display = "none";
	}
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
