function drawQuestion(objQuestion, index) {
	
	index = index + 1; //increment to display starting from 1 and not 0.

	var s =	"<div class='question'><p>" + index + "." + objQuestion.text + "</p><p><ul>";
	

		for (var i = 0; i < objQuestion.possibleanswers.length; i++) {
			var value = i;		
			s = s + "<li><input onChange='updateScore(this.name," + objQuestion.correctanswer + "," + i + ")' type='radio' name='q_" + index + "' value='" + value + "'>" + objQuestion.possibleanswers[i] + "</li>";
		}

	s = s + "</ul></p></div>";
	return s; //return html as string s


	}


function updateScore(question, correctanswer, selectedanswer) {
	var totalScore = 0; //total score

		correctAnswers[question] = 0;
		if (selectedanswer === correctanswer) {
			correctAnswers[question] = 1;
		}

		for (var key in correctAnswers) {
		if (correctAnswers.hasOwnProperty(key)) {
			totalScore = totalScore + correctAnswers[key];
		}

	}

	//bewaar en toon de score aan de gebruiker
	document.getElementById('punten').innerHTML = totalScore;
	//alert("you scored: " + totalScore);
	}
