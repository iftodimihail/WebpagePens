<?php
	session_start();
/*	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	} 
	
# HTID:3886908: DO NOT REMOVE OR MODIFY THIS LINE AND THE LINES BELOW
php_value display_errors 1
# DO NOT REMOVE OR MODIFY THIS LINE AND THE LINES ABOVE HTID:3886908:

	$cat = test_input($_GET['category']);
	$questionIndex = $_POST['index'];
	$score = $_POST['score'];
	
	
	function loadQuestion($questionIndex, $score){
		$quests = file_get_contents('../res/questions.json');
		$questsArr = json_decode($quests, true);
		$qnmb = $questionIndex+1;
		echo "index:".$questionIndex." ";
		echo "score:".$score;
		$currentQuestion = $qnmb.". ".$questsArr[$questionIndex]["question"];
		$opt1 = $questsArr[$questionIndex]["option1"];
		$opt2 = $questsArr[$questionIndex]["option2"];
		$opt3 = $questsArr[$questionIndex]["option3"];
		$opt4 = $questsArr[$questionIndex]["option4"];
		$ans = $questsArr[$questionIndex]["correct"];
		
		if(isset($_POST['choice'])){
			echo " da";
			echo $ans;
			if($_POST['choice'] == $ans){
				$score++;
			}
		}
		else echo "nu";
		?>
		<div class="quiz-container">
				<div id="quiz">
					<p id="question"><?php echo $currentQuestion; ?></p>
					<form method="POST" action="computers.php">
						<label class="option"><input name="choice" type="radio" id="btn1" value="1"><span id="choice1"><?php echo $opt1; ?></span></label>
						<label class="option"><input name="choice" type="radio" id="btn2" value="2"><span id="choice2"><?php echo $opt2; ?></span></button></label>
						<label class="option"><input name="choice" type="radio" id="btn3" value="3"><span id="choice3"><?php echo $opt3; ?></span></button></label>
						<label class="option"><input name="choice" type="radio" id="btn4" value="4"><span id="choice4"><?php echo $opt4; ?></span></button></label>
						<input type="hidden" name="index" value= <?php echo '"'.$questionIndex.'"' ?>>
						<input type="hidden" name="score" value= <?php echo '"'.$score.'"' ?>>
						<p><?php echo $score; ?></p>
						<input type="hidden" name="start" value="">
					<?php if($questionIndex !== 9){
						?><input type="submit" id="nextBtn" name="next" value="Next Question">
					<?php }
						else{
					?> 	<input type="submit" id="finishBtn" name="finish" value="Finish Quiz">
					<?php } 
					?>
					</div>
				</div>
				<div id="result">
				</div>
			</div>
	<?php
	}
	
	if(!isset($_POST['start'])){
		?>
		<form method="POST" action= "categories/computers.php">
			<input type="submit" name="start" value="START QUIZ">
		</form>
	<?php
	}
	else{
		if(!isset($_POST['next'])){
			loadQuestion(0,0);
		}
		elseif(array_key_exists('next',$_POST)){
			$questionIndex++;
			loadQuestion($questionIndex, $score);
		}	
	}
*/

if($_GET['category'] === "știință")
	echo "<h1>Știință</h1>";
else
echo "<h1>".ucfirst($_GET['category'])."</h1>";
?>
<input id="category" type="hidden" value=<?php echo $_GET['category']; ?>>
<div class="quizContainer">
	<div id="quiz" class="container">
		<div id="question"></div>
			<label class="option"><input type="radio" name="button" id="btn1" value="1"><span id="choice1"></span></label>
			<label class="option"><input type="radio" name="button" id="btn2" value="2"><span id="choice2"></span></label>
			<label class="option"><input type="radio" name="button" id="btn3" value="3"><span id="choice3"></span></label>
			<label class="option"><input type="radio" name="button" id="btn4" value="4"><span id="choice4"></span></label>
			<button id="nextBtn" onclick="loadNextQuestion()">Următoarea întrebare</button>
	</div>
	<div id="result" style="display:none;"></div>
	<a id="again" style="display:none;" href=<?php echo '"?category='.$_GET['category'].'"';?>><img src="images/tryagain.png"></a>
</div>