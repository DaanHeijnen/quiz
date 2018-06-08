
<?php
	require_once "question_dao.inc.php";
	$questionDAO = new questionDAO();
		$JSONstring = $questionDAO->QA();
		echo $JSONstring; 
?>
