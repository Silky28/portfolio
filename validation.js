// Name Validations
function validateName()
	{
	   var name = document.getElementById("name").value;

	   if(name.length == 0)
	   {
	      producePrompt("*Name is required","commentNamePrompt", "red");
	      return false;
	   }
	   else if(!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/))
	   {
         producePrompt("*First And Last Name Please", "commentNamePrompt", "yellow");
	     return false;
	   }

	   producePrompt('Welcome '  + name, "commentNamePrompt", "white");
	     return true;
	  }
// Phone Validations

function validatePhone()
	{ 
     var phone = document.getElementById("phone").value;
      if(phone.length == 0)
	   {
      producePrompt("* Phone Number is required","commentPhonePrompt", "red");
      return false;
      
	   }
	   if(!phone.match(/^[0-9]{10}$/))
	   {
        producePrompt("* Enter Valid PhoneNumber", "commentPhonePrompt", "yellow");
	    return false;
	  
	   }

	   producePrompt("Valid Number" , "commentPhonePrompt", "white");
	   return true;
	   
	}
// Email Validations 

function validateEmail()
	{ 
     var email = document.getElementById("email").value;
      if(email.length == 0)
	   {
       producePrompt("* Email is required","commentEmailPrompt", "red");
       return false;
       
	   }
	   if(!email.match(/^[A-za-z._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/))
	   {
        producePrompt("* Email Invalid", "commentEmailPrompt", "yellow");
	    return false;
	    
	   }

	   producePrompt("Valid Email" , "commentEmailPrompt", "white");
	   return true;
	   
	}
// Message Validations
function validateMessage()
	{ 
     var message = document.getElementById("message").value;
     var required = 10;
     var left = required - message.length;
      if(left > 0)
	   {
	      producePrompt(left + "Characters Required","commentMessagePrompt", "red");
	      return false;
	    
	   }
	   producePrompt("Valid comment" , "commentMessagePrompt", "white");
	   return true;
	   
	}

function validateCommentForm()
{
    if(!validateName() || !validatePhone() || !validateEmail() || !validateMessage())
    {
    	jsShow("commentPrompt");
    	producePrompt("Form must be Valid to Submit", "commentPrompt", "red");
    	setTimeout(function(){jsHide("commentPrompt");}, 5000);
    }
}
function jsShow(id)
{
    	document.getElementById(id).style.display = "block";
}
function jsHide(id)
{
    	document.getElementById(id).style.display = "none";
}
    
function producePrompt(message, promptLocation, color)
	{
		document.getElementById(promptLocation).innerHTML = message;
		document.getElementById(promptLocation) .className = color;
	}




