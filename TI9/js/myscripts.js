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
	var a = document.getElementById("term1").value;
	var b = document.getElementById("term2").value;
	var regexp = new RegExp("[0-9]");
	var c=0;
	var ans = document.getElementById("Ans");
	var operator = document.getElementById("op").value;
	if(regexp.test(a) && regex.test(b)){
		a=parseInt(a);
		b=parseInt(b);
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
			if(b===0)
				alert("Nu se poate împărții la 0");
			else
				c = a / b;
			ans.innerHTML = c;
		}
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
	  			  document.getElementById("verif").innerHTML="Nume și parolă corecte" ;
	  			  break;
	        	}
	  		  else if(user === myObj.utilizator[i].username && pw !==  myObj.utilizator[i].password){
	  			  document.getElementById("verif").innerHTML="Parolă incorectă";
	  			  break;
	  		  }
	  		  else 
	  			document.getElementById("verif").innerHTML="Numele de utilizator nu a fost găsit";
	  	  	}
	  	  }
	};
	xmlhttp.open("GET", "utilizatori.json", true);
	xmlhttp.send();			 
}

function library(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	var xmlDoc = this.responseXML;
		    var x = xmlDoc.documentElement.childNodes;
		    var y = parseInt(x.length/2);
		    var section = document.getElementById('xmlTable');
		    var tbl = document.createElement('table');
		    tbl.style.width = '70%';
		    tbl.setAttribute('border', '1');
		    var tbdy = document.createElement('tbody');
		    console.log(x.length);
		    console.log(x[1].children.length);
		    var tr= document.createElement('tr');
		    var td = document.createElement('td');
		    for(var i=1;i<x.length;i++){
		    	if(i%2==1){
		    		tr = document.createElement('tr');
		    		for(var j=0;j<x[1].children.length;j++){
		    			if(i%2==1){
		    				td = document.createElement('td');
		    				td.appendChild(document.createTextNode((x[i].children[j].textContent)));
		    				tr.appendChild(td);  
		    			}
		    		}	
		    		tbdy.appendChild(tr);
		    	}
		    }
		    tbl.appendChild(tbdy);
		    section.appendChild(tbl);
		    
	    }
	};
	xhttp.open("GET", "biblioteca.xml", true);
	xhttp.send();
}



