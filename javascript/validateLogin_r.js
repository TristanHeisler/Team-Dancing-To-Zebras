//Create an event listener for checking a valid username
document.getElementById("username").addEventListener("blur", checkUsernameEntered, false);

//Create an event listener for checking a valid password
document.getElementById("password").addEventListener("blur", checkPasswordEntered, false);

//Create an event listener for clicking on the login button
document.getElementById("login").addEventListener("click", validateLogin, false);

//Create an event listener for clicking on the reset button
document.getElementById("clear").addEventListener("click", clearLogin, false);