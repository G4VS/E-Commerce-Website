/* var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
} */

var isOut = false;
var targetPos;

function myMove() {
	
  var elem = document.getElementById("Cart_List");   
  
	  if(!isOut)
	  {
		var pos = -200;  
		targetPos = 0;
	  }else if(isOut)
	  {
		  var pos = 0;
		  targetPos = -200;
	  }
	  
	  var id = setInterval(frame, 5);
	  function frame() {
		if (pos == targetPos) {
		  clearInterval(id);
		  isOut = !isOut;
		} else 
		{
			if(!isOut)
			{
			pos++;
			}else if(isOut)
			{
			  pos--;
			}
		  elem.style.right = pos + "px"; 
		}
	  }
}

function showDropDown()
{
	var display = document.getElementByClass("dropdown_item").style.display.value();
	
	if(display == "none")
	{
		document.getElementByClass("dropdown_item").style.display = "initial";
	}else
	{
		document.getElementByClass("dropdown_item").style.display = "none";
	}
	
}

function CheckInfo()
{
	var name = document.getElementById('name_txt').value;
	var Subject = document.getElementById('subject_txt').value;
	var ConNumber = document.getElementById('Contact_Number_txt').value;
	var Email = document.getElementById('email_txt').value;
	var Message = document.getElementById('message_txtarea').value;
	var expEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var expNum = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
	
	
	if(name == '')
	{
		alert('Please enter your name to send a message.');
		return false;
	}else if(Subject == '')
	{
		alert('Please enter the subject of the message.');
		return false;
	}else if(ConNumber == '' && Email == '')
	{
		alert('Please enter details of at least one contact method.');
	
	}else if(!expEmail.test(String(Email).toLowerCase()) && Email !='')
	{
		alert("Please enter a valid email address");
		
	}else if(!expNum.test(String(ConNumber)) && ConNumber !='')
	{
		alert("Please enter a valid phone number");	
	}else if(Message == '')
	{
		alert('Please enter the message you whish to send.');
	}else
	{
		alert("Message successfully sent");
	}
		
}
