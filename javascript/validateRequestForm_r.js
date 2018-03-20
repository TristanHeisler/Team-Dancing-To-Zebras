//Create an event listener for checking a valid name
document.getElementById("name").addEventListener("blur", checkNameEntered, false);

//Create an event listener for checking a valid email
document.getElementById("email").addEventListener("blur", checkEmailEntered, false);

//Create an event listener for checking a valid location
document.getElementById("location").addEventListener("blur", checkLocationEntered, false);

//Create an event listener for checking a valid tool
document.getElementById("desiredTool").addEventListener("blur", checkToolEntered, false);

//Create an event listener for checking valid reasoning
document.getElementById("reasoning").addEventListener("blur", checkReasoningEntered, false);

//Create an event listener for clicking on the submit button
document.getElementById("request").addEventListener("click", validateRequest, false);

//Create an event listener for clicking on the clear button
document.getElementById("clear").addEventListener("click", clearRequest, false);