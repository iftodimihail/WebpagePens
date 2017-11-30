<div class="test">
<form method="post">
	<p>1)Ce culoare are mașina roșie?</p>
	<input type="radio" name="answer1" value="alb" <?php if(isset($_POST['answer1']) && $_POST['answer1'] == "alb") echo "checked";?>>alb
	<input type="radio" name="answer1" value="negru" <?php if(isset($_POST['answer1']) && $_POST['answer1'] == "negru") echo "checked";?>>negru
	<input type="radio" name="answer1" value="roșu" <?php if(isset($_POST['answer1']) && $_POST['answer1'] == "roșu") echo "checked";?> >roșu
	<input type="radio" name="answer1" value="verde" <?php if(isset($_POST['answer1']) && $_POST['answer1'] == "verde") echo "checked";?>>verde
	<p>2)2+2*2-2=?</p>
	<input type="radio" name="answer2" value="4" <?php if(isset($_POST['answer2']) && $_POST['answer2'] == 4) echo "checked";?>>4
	<input type="radio" name="answer2" value="6" <?php if(isset($_POST['answer2']) && $_POST['answer2'] == 6) echo "checked";?>>6
	<input type="radio" name="answer2" value="0" <?php if(isset($_POST['answer2']) && $_POST['answer2'] == 0) echo "checked";?>>0
	<input type="radio" name="answer2" value="2" <?php if(isset($_POST['answer2']) && $_POST['answer2'] == 2) echo "checked";?>>2
	<p>3)Dacă Ana are 2 mere, câte mere are Ana?</p>
	<input type="radio" name="answer3" value="4" <?php if(isset($_POST['answer3']) && $_POST['answer3'] == 4) echo "checked";?>>4
	<input type="radio" name="answer3" value="3" <?php if(isset($_POST['answer3']) && $_POST['answer3'] == 3) echo "checked";?>>3
	<input type="radio" name="answer3"  value="2" <?php if(isset($_POST['answer3']) && $_POST['answer3'] == 2) echo "checked";?>>2
	<input type="radio" name="answer3" value="1" <?php if(isset($_POST['answer3']) && $_POST['answer3'] == 1) echo "checked";?>>1
	<p>4.Ala bala?</p>
	<input type="radio" name="answer4" value="banana" <?php if(isset($_POST['answer4']) && $_POST['answer4'] == "banana") echo "checked";?>>banana
	<input type="radio" name="answer4" value="portocala" <?php if(isset($_POST['answer4']) && $_POST['answer4'] == "portocala") echo "checked";?>>portocala
	<input type="radio" name="answer4" value="Ana" <?php if(isset($_POST['answer4']) && $_POST['answer4'] == "Ana") echo "checked";?>>Ana
	<input type="radio" name="answer4" value="cana" <?php if(isset($_POST['answer4']) && $_POST['answer4'] == "cana") echo "checked";?>>cana
	<p>5.Daca mâine e marți, ce zi va fi în 4 zile?</p>
	<input type="radio" name="answer5" value="duminică" <?php if(isset($_POST['answer5']) && $_POST['answer5'] == "duminică") echo "checked";?>>duminică
	<input type="radio" name="answer5" value="sâmbătă" <?php if(isset($_POST['answer5']) && $_POST['answer5'] == "sâmbătă") echo "checked";?>>sâmbătă
	<input type="radio" name="answer5" value="vineri" <?php if(isset($_POST['answer5']) && $_POST['answer5'] == "vineri") echo "checked";?>>vineri
	<input type="radio" name="answer5" value="joi" <?php if(isset($_POST['answer5']) && $_POST['answer5'] == "joi") echo "checked";?> >joi
	<br><input type="submit" name="verifica" id="verifica" value="verifica">
	</form>
	<?php
		function verify(){
			$contor = 0;
			$ans1 = $ans2= $ans3 = $ans4 = $ans5 ="";
			$ans = array();
			$test = array(
			array("1)Ce culoare are mașina roșie?","roșu"),
			array("2)2+2*2-2=?",4),
			array("3)Dacă Ana are 2 mere, câte mere are Ana?",2),
			array("4.Ala bala?","portocala"),
			array("5.Daca mâine e marți, ce zi va fi în 4 zile?","vineri")
			);
			
			$noQuestions = sizeof($test,0);
			for($i=1;$i<=$noQuestions; $i++){
				if(isset($_POST['answer'.$i])){
					$ans[$i-1] = test_input($_POST['answer'.$i]);
					if($ans[$i-1]==$test[$i-1][1])
						$contor++;
				}
			}
			
			echo "<p>Ați răspuns corect la: ".$contor." din 5 întrebări!</p>";
			echo "<p>Răspunsurile corecte la toate întrebările:<br> 
			1)roșu<br> 2)4<br> 3)2<br> 4)portocala<br> 5)vineri";
		}
		function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
		if(array_key_exists('verifica',$_POST)){
			verify();
		}
		
	?>
</div>
