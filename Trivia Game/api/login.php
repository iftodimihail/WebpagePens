<form method="POST" action="api/login.php"> 
			Utilizator: <input pattern="[a-zA-z0-9]{3,15}" type="text" name="user" required>
			Parola: <input pattern="[a-zA-z0-9]{6,15}" type="text" name="password" required>
			<input type="submit" name="loginBtn" value="Login">
</form>
<button id="signUpBtn" onclick="loadDoc('signup.html')">Creează-ți cont</button>