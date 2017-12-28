<?php
	session_start();
	echo "<h1>".ucfirst($_GET['category'])."</h1>";
?>
<input id="category" type="hidden" value=<?php echo $_GET['category']; ?>>
<div class="quiz-container">
	<div id="quiz" class="container">
		<div id="question"></div>
			<label class="option"><input type="radio" name="button" id="btn1" value="1"><span id="choice1"></span></label>
			<label class="option"><input type="radio" name="button" id="btn2" value="2"><span id="choice2"></span></label>
			<label class="option"><input type="radio" name="button" id="btn3" value="3"><span id="choice3"></span></label>
			<label class="option"><input type="radio" name="button" id="btn4" value="4"><span id="choice4"></span></label>
			<button id="nextBtn" onclick="loadNextQuestion()">Next Question</button>
	</div>
	<div id="result" style="display:none;"></div>
</div>
