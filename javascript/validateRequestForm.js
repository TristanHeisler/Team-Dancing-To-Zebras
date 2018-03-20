//Global variable used to control form submission
var numberOfErrors = 0;

function checkNameEntered(event)
{
  //Obtain the contents of the name textbox
  var name = event.currentTarget.value;

  //Access the warning text
  var warning = document.getElementById("nameWarning");  

  //Ensure a username was entered
  if(name === "")
  {  
    //Increment the number of errors if appropriate
    if(name.className === "hideError")
    {
        numberOfErrors++;
    }

     //Update and display the warning text
     warning.innerHTML = "Please enter your name.";
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

function checkEmailEntered(event)
{
  //Obtain the contents of the email textbox
  var email = event.currentTarget.value;

  //Access the warning text
  var warning = document.getElementById("emailWarning");  

  //Set the format for a valid email
  var validFormat = /^[\w.-]+@[\w]+\.[\w]{2,}$/;

  //If the email address is invalid, inform the user
  if(!validFormat.test(email))
  {
    //Increment the number of errors if appropriate
    if(warning.className === "hideError")
    {
      numberOfErrors++;
    }   		

    //Update and display the warning text
    warning.innerHTML = "Invalid email format.";
    warning.className = "showError";
    event.currentTarget.className = "showError";
  } 

  //If the email address is valid, hide all error information
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

function checkLocationEntered(event)
{
  //Obtain the contents of the location textbox
  var location = event.currentTarget.value;

  //Access the warning text
  var warning = document.getElementById("locationWarning");  

  //Ensure a username was entered
  if(location === "")
  {  
    //Increment the number of errors if appropriate
    if(location.className === "hideError")
    {
        numberOfErrors++;
    }

     //Update and display the warning text
     warning.innerHTML = "Please select your location.";
     warning.className = "showError";
     event.currentTarget.className = "showError";   
  }

  //If the location is valid, hide all error information
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

function checkToolEntered(event)
{
  //Obtain the contents of the tool textbox
  var tool = event.currentTarget.value;

  //Access the warning text
  var warning = document.getElementById("toolWarning");  

  //Ensure a username was entered
  if(tool === "")
  {  
    //Increment the number of errors if appropriate
    if(tool.className === "hideError")
    {
        numberOfErrors++;
    }

     //Update and display the warning text
     warning.innerHTML = "Please select your desired tool.";
     warning.className = "showError";
     event.currentTarget.className = "showError";   
  }

  //If the tool is valid, hide all error information
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

function checkReasoningEntered(event)
{
  //Obtain the contents of the reasoning textarea
  var reasoning = event.currentTarget.value;

  //Access the warning text
  var warning = document.getElementById("reasoningWarning");  

  //Ensure a username was entered
  if(reasoning === "")
  {  
    //Increment the number of errors if appropriate
    if(reasoning.className === "hideError")
    {
        numberOfErrors++;
    }

     //Update and display the warning text
     warning.innerHTML = "Please enter reasoning for the request.";
     warning.className = "showError";
     event.currentTarget.className = "showError";   
  }

  //If the reasoning is not left empty, hide all error information
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

function validateRequest(event)
{
  //Access the name textbox and warning
  var name = document.getElementById("name");
  var nameWarning = document.getElementById("nameWarning");
  
  //Access the email textbox and warning
  var email = document.getElementById("email");
  var emailWarning = document.getElementById("emailWarning");
  
  //Access the location dropdown and warning
  var location = document.getElementById("location");
  var locationWarning = document.getElementById("locationWarning");
  
  //Access the tool dropdown and warning
  var tool = document.getElementById("desiredTool");
  var toolWarning = document.getElementById("toolWarning");
  
  //Access the reasoning textarea and warning
  var reasoning = document.getElementById("reasoning");
  var reasoningWarning = document.getElementById("reasoningWarning");

  //If the username textbox is empty, inform the user
  if(name.value === "")
  {  
    //Increment the number of errors if appropriate
    if(nameWarning.className === "hideError")
    {
        numberOfErrors++;
    }

    //Update and display the warning text
    nameWarning.innerHTML = "Please enter a username.";
    nameWarning.className = "showError";
    name.className = "showError"; 
  }
  
  //If the email textbox is empty, inform the user
  if(email.value === "")
  {  
    //Increment the number of errors if appropriate
    if(emailWarning.className === "hideError")
    {
        numberOfErrors++;
    }

    //Update and display the warning text
    emailWarning.innerHTML = "Please enter an email address.";
    emailWarning.className = "showError";
    email.className = "showError"; 
  }
  
  //If the location dropdown is empty, inform the user
  if(location.value === "")
  {  
    //Increment the number of errors if appropriate
    if(locationWarning.className === "hideError")
    {
        numberOfErrors++;
    }

    //Update and display the warning text
    locationWarning.innerHTML = "Please select your location.";
    locationWarning.className = "showError";
    location.className = "showError"; 
  }
  
  //If the desired tool dropdown is empty, inform the user
  if(tool.value === "")
  {  
    //Increment the number of errors if appropriate
    if(toolWarning.className === "hideError")
    {
        numberOfErrors++;
    }

    //Update and display the warning text
    toolWarning.innerHTML = "Please select your desired tool.";
    toolWarning.className = "showError";
    tool.className = "showError"; 
  }
  
  //If the reasoning textarea is empty, inform the user
  if(reasoning.value === "")
  {  
    //Increment the number of errors if appropriate
    if(reasoningWarning.className === "hideError")
    {
        numberOfErrors++;
    }

    //Update and display the warning text
    reasoningWarning.innerHTML = "Please enter reasoning for the request.";
    reasoningWarning.className = "showError";
    reasoning.className = "showError"; 
  }

  //If the form is invalid (any errors), do not call the PHP process
  if(numberOfErrors)
  {	
    event.preventDefault();	
  }
}

function clearRequest(event)
{
  //Reset the number of errors
  numberOfErrors = 0;

  //Hide all error messages
  document.getElementById("nameWarning").className = "hideError";
  document.getElementById("emailWarning").className = "hideError";
  document.getElementById("locationWarning").className = "hideError";
  document.getElementById("toolWarning").className = "hideError";
  document.getElementById("reasoningWarning").className = "hideError";

  //Reset all form elements
  document.getElementById("name").className = "hideError";
  document.getElementById("email").className = "hideError";
  document.getElementById("location").className = "hideError";
  document.getElementById("desiredTool").className = "hideError";
  document.getElementById("reasoning").className = "hideError";
}