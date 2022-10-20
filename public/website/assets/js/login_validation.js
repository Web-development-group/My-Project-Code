/*
	User Registeration validation 
	1 - required field (every field must fill )
	2 - texts input ( digit not valid )
	3 - password  ( at least 5 charcter not valid )
	4 - Confirm password 
*/

function user_login(){

	var result = true;
	var email = document.getElementById("email").value;
	var password = document.getElementById("pwd").value;

	var digit = /\d/;
	var text = /[A-z]/
		

	if(email == ""){
		document.getElementById("msg1").innerText = "please fill the email";
		result = false;
	}else{
		document.getElementById("msg1").innerText = "";
	}

	if(password == ""){
		document.getElementById("msg2").innerText = "please fill the password";
		result = false;
	}else if(password.length < 5 ){
		document.getElementById("msg2").innerText = "password at least 5 charcter";
		result = false;
	}else{
		document.getElementById("msg2").innerText = "";
	}
	   return result;
 }
