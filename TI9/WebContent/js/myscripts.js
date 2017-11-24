function loadDoc(x) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("content").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", x, true);
  
  xhttp.send();
}

function calculus(){
	var a = parseInt(document.getElementById("term1").value);
	var b = parseInt(document.getElementById("term2").value);
	var c=0;
	var ans = document.getElementById("Ans");
	var operator = document.getElementById("op").value;
	if(operator == "+"){
		c = a + b;
		ans.innerHTML = c;
	}
	else if(operator == "-"){
		c = a - b;
		ans.innerHTML = c;
	}
	else if(operator == "*"){
		c = a * b;
		ans.innerHTML = c;
	}
	else if(operator == "/"){
		c = a / b;
		ans.innerHTML = c;
	}
}

function verify(){
	var user = document.getElementById("username").value;
	var pw = document.getElementById("password").value;
	var myObj='';
	var x = " ";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        myObj = JSON.parse(this.responseText);
	        for(var i in myObj.utilizator){
	        	if(user === myObj.utilizator[i].username && pw ===  myObj.utilizator[i].password){
	  			  document.getElementById("demo").innerHTML="Nume și parolă corecte" ;
	  			  break;
	        	}
	  		  else
	  			  document.getElementById("demo").innerHTML="Nume și parolă greșite";
	  	  	}
	  	  }
	};
	xmlhttp.open("GET", "utilizatori.json", true);
	xmlhttp.send();

	
		 
}