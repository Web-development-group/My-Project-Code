function vlaidate() {

	var result = true;
	var firstname  = document.getElementById("firstname").value;
	var lastname  = document.getElementById("lastname").value;
	var dob  = document.getElementById("dob").value;
	var msg  = document.getElementById("msg").value;

	var digit = /\d/;
	var text = /[A-z]/

	if( digit.exec(firstname) > 0 ){
		document.getElementById("msg1").innerText = "invalid name! please type text ";
		result = false;
	}else if(firstname == "") {
		document.getElementById("msg1").innerText = "please fill the name";
		result = false;
	}else{
		document.getElementById("msg1").innerText = "";
	}


	if( digit.exec(lastname) > 0 ){
		document.getElementById("msg2").innerText = "invalid name! please type text ";
		result = false;
	}else if(lastname == "" ) {
		document.getElementById("msg2").innerText = "please fill the Lastname";
		result = false;
	}else{
		document.getElementById("msg2").innerText = "";
	}



	if (dob == "") {
		document.getElementById("msg3").innerText = "Please choose  a date ";
		result = false;
	}else{
		document.getElementById("msg3").innerText = "";
	}

	if( digit.exec(msg) > 0 ){
		document.getElementById("msg4").innerText = "invalid name! please type text ";
		result = false;
	}else if(msg == "") {
		document.getElementById("msg4").innerText = "please fill the name";
		result = false;
	}else{
		document.getElementById("msg4").innerText = "";
	}

	return result;
}