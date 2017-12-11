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
function insertTheRow(jsonObj) {
	var arr = JSON.parse(jsonObj);
	
	var table = document.getElementById("table");
	var tr = document.createElement("tr");
	
	for (var i = 1; i < arr.length; ++i) {
		var td = document.createElement("td");
		td.innerHTML = arr[i];
		tr.appendChild(td);
	}
	table.appendChild(tr);
}

function addFileOnServer() {
	var fileUpload = document.getElementById("fileToUpload");	
	var file = fileUpload.files[0];
	var formData = new FormData();
	formData.append('fileToUpload', file, file.name);
	
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		
		if (this.readyState == 4 && this.status == 200) {
			insertTheRow(this.responseText);
		}
	};
	
	xhr.open("POST", "adauga.php", true);
	xhr.send(formData);
}
function deleteFileOnServer(path, row) {
	
	var data = new FormData();
	data.append('path', path);
	
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			row.parentNode.removeChild(row);
		}
	};
	
	xhr.open("POST", "sterge.php", true);
	xhr.send(data);
}
