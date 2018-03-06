//Global variable used to control form submission
var numberOfErrors = 0;

function checkUsernameEntered(event)
{
    //Obtain the contents of the username textbox
    var username = event.currentTarget.value;
  
    //Access the warning text
    var warning = document.getElementById("usernameWarning");  
    
    //Ensure a username was entered
    if(username === "")
    {  
    	//Increment the number of errors if appropriate
    	if(usernameWarning.className === "hideError")
    	{
    	    numberOfErrors++;
    	}
    	
       //Update and display the warning text
       warning.innerHTML = "Please enter a username.";
       warning.className = "showError";
       event.currentTarget.className = "showError";   
    }

    //If the username is valid, hide all error information
    else
    {
    	//Decrement the number of errors if appropriate
    	if(warning.className === "showError")
    	{
    	    numberOfErrors--;
    	}
    	
      //Hide the warning
      warning.className = "hideError";
      event.currentTarget.className = "hideError";
    }
}

function checkPasswordEntered(event)
{
    //Obtain the contents of the username textbox
    var password = event.currentTarget.value;
  
    //Access the warning text
    var warning = document.getElementById("passwordWarning");  
    
    //Ensure a password was entered
    if(password === "")
    {  
    	//Increment the number of errors if appropriate
    	if(passwordWarning.className === "hideError")
    	{
    	    numberOfErrors++;
    	}
    	
       //Update and display the warning text
       warning.innerHTML = "Please enter a password.";
       warning.className = "showError";
       event.currentTarget.className = "showError";   
    }

    //If the password is valid, hide all error information
    else
    {
    	//Decrement the number of errors if appropriate
    	if(warning.className === "showError")
    	{
    	    numberOfErrors--;
    	}
    	
        //Hide the warning
        warning.className = "hideError";
        event.currentTarget.className = "hideError";
    }
}

//Function for checking empty form elements before registration form submission
function validateLogin(event)
{
    //Access the username textbox and warning
    var username = document.getElementById("username");
    var usernameWarning = document.getElementById("usernameWarning");
    
    //Access the password textbox and warning
    var password = document.getElementById("password");
    var passwordWarning = document.getElementById("passwordWarning");

    //If the username textbox is empty, inform the user
    if(username.value === "")
    {  
    	//Increment the number of errors if appropriate
    	if(usernameWarning.className === "hideError")
    	{
    	    numberOfErrors++;
    	}
    	
        //Update and display the warning text
        usernameWarning.innerHTML = "Please enter a username.";
        usernameWarning.className = "showError";
        username.className = "showError"; 
    }

    //If the password textbox is empty, inform the user
    if(password.value === "")
    {  
    	//Increment the number of errors if appropriate
    	if(passwordWarning.className === "hideError")
    	{
    	    numberOfErrors++;
    	}
    	
        //Update and display the warning text
        passwordWarning.innerHTML = "Please enter a password.";
        passwordWarning.className = "showError";
        password.className = "showError"; 
    }

    //If the form is invalid (any errors), do not call the PHP process
    if(numberOfErrors)
    {	
	    event.preventDefault();	
    }
}

//Function for resetting the login form 
function clearLogin(event)
{
    //Reset the number of errors
    numberOfErrors = 0;
	
    //Hide all error messages
    document.getElementById("usernameWarning").className = "hideError";
    document.getElementById("passwordWarning").className = "hideError";

    //Reset textboxes
    document.getElementById("username").className = "hideError";
    document.getElementById("password").className = "hideError";
}
