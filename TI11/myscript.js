function setCookie(){
	var inputElement = document.getElementById("cookieInput");
	if(inputElement.value != ""){
		document.cookie="utilizator="+inputElement.value;
		location.reload();
		}
		else{
			document.cookie = "utilizator=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/TI11;";
			location.reload();
		}
}

function getCookie(cname){
	if(document.cookie){
		var name = cname+"=";
		var decodedCookie = decodeURIComponent(document.cookie)
		var inputElement = document.getElementById("cookieInput");
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				console.log(c.substring(name.length, c.length));
				inputElement.value = c.substring(name.length, c.length);
			}
		}
	}
    return "";
}
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "adauga.php", true);
  xhttp.send();
}