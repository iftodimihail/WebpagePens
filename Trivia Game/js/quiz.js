var quizContainer = document.getElementById("quiz");
var resContainer = document.getElementById("result");
var questionElem = document.getElementById("question");
var categoryElem = document.getElementById("category");
var opt1 = document.getElementById("choice1");
var opt2 = document.getElementById("choice2");
var opt3 = document.getElementById("choice3");
var opt4 = document.getElementById("choice4");
var nextBtn = document.getElementById("nextBtn");
var tryAgain = document.getElementById("again");
var currentQuestion = 0;
var score = 0;
var totalQuests = questions.computers.length;
var quest = "";

function loadQuestion(questionIndex){
	switch(categoryElem.value){
		case "computers": quest = questions.computers[questionIndex];
			break;
		case "geografie": quest = questions.geografie[questionIndex];
			break;
		case "muzică": quest = questions.muzică[questionIndex];
			break;
		case "film": quest = questions.film[questionIndex];
			break;
		case "istorie": quest = questions.istorie[questionIndex];
			break;
		case "știință": quest = questions.știință[questionIndex];
			break;
	}
	// returns the question at questionIndex from myquestions.js file
	questionElem.textContent = (questionIndex+1) + ". " + quest.question;
	opt1.textContent = quest.option1;
	opt2.textContent = quest.option2;
	opt3.textContent = quest.option3;
	opt4.textContent = quest.option4;

};

function loadNextQuestion(){
	var selectedOpt = document.querySelector("input[type=radio]:checked");
	if(!selectedOpt){
		alert("Selectează o opțiune!");
		return;
	}
	
	var answer = selectedOpt.value;
	var correct = "";
	
	switch(categoryElem.value){
		case "computers": 	
				correct = questions.computers[currentQuestion].correct;
				break;
		case "geografie": 
				correct = questions.geografie[currentQuestion].correct;
				break;
		case "muzică": 
				correct = questions.muzică[currentQuestion].correct;
				break;
		case "film": 
				correct = questions.film[currentQuestion].correct;
				break;
		case "istorie": 
				correct = questions.istorie[currentQuestion].correct;
				break;
		case "știință": 
				correct = questions.știință[currentQuestion].correct;
				break;
	}
	
	if(correct === answer){
		score++;
	}
	selectedOpt.checked = false;
	currentQuestion++;
	if(currentQuestion == totalQuests - 1){
		nextBtn.textContent = "Finish";
	}
	if(currentQuestion == totalQuests){
		quizContainer.style.display = "none";
		resContainer.style.display = '';
		resContainer.textContent = "Scor: "+score;
		tryAgain.style.display='';
		/*var scoreElem = document.createElement("input");
		scoreElem.setAttribute("type", "hidden");
		scoreElem.setAttribute("value", score);
		scoreElem.setAttribute("name", "score");
		document.getElementById("result").appendChild(scoreElem);*/
		return;
	}
	loadQuestion(currentQuestion);
}

loadQuestion(currentQuestion)
