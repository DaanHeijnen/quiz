<?php 
class questionDAO{
	private $conn;
		function __construct(){
			// gegevens om een connectie te maken met de database
			$servername = "localhost";
			$username = "st360143";
			$password = "GNRxDV9Z";
			$database = "st360143";

			// connectie maken
			$conn = mysqli_connect($servername, $username, $password, $database);
			$this->conn = $conn;			
		}

	public function QA(){
		$sqlQ = "SELECT * FROM Vragen";
		$JSONstring = '{"value":[';
		$quote = "\"";
		$result = $this->conn->query($sqlQ);
		while ($row = $result->fetch_assoc()){
			$JSONstring = $JSONstring. "{". $quote. "ID". $quote. ":";
			$JSONstring = $JSONstring.$row["Vraag_ID"]. ", ";
			$JSONstring = $JSONstring. $quote . "text". $quote. ":";
			$JSONstring = $JSONstring. $quote.$row["Vraag"].$quote. ", ";
			$JSONstring = $JSONstring. $quote. "correctanswer". $quote . ":";
			$JSONstring = $JSONstring. $row["JuisteAntwoord"]. ", ";
			$JSONstring = $JSONstring. $quote. "possibleanswers" . $quote . ":";
			$answers = ($this->getAnswers($row["Vraag_ID"]));
			$JSONstring = $JSONstring.$answers;
			$JSONstring = $JSONstring. "},";
		}

		$JSONstring = substr($JSONstring, 0, -1);
		$JSONstring = $JSONstring. "] }";

		return $JSONstring;
	}

	private function getAnswers($Vraag_ID){
		$sqlA = "SELECT Antwoord FROM Antwoorden WHERE Vraag_ID =". $Vraag_ID. ";";
		$quote = "\"";
		$result = $this->conn->query($sqlA); 
		$answerString = "[";
		while ($row = $result->fetch_assoc()) {
			$answerString = $answerString . $quote . $row["Antwoord"]. $quote . ", "; 
		}

		$answerString = substr($answerString, 0, -1);
		$answerString = $answerString. "]";

		return $answerString;
	}
}
?>