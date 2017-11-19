function showInfo(){
   document.getElementById("url").innerHTML = "URL: "+window.location.href;
	var appName = "Browser Name: " + navigator.appName;
	var appV = "Version: " + navigator.appVersion;
	var os = "OS: " + navigator.platform;
	
	document.getElementById("browser").innerHTML = appName;
	document.getElementById("version").innerHTML = appV;
	document.getElementById("os").innerHTML = os;
	
}
 function showDate(){
	  document.getElementById("data").innerHTML = Date();
 }
