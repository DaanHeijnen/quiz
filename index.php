<!DOCTYPE html>
<html>
<head>
	<title>Vraag 2</title>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/myfunctions.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

<!-- "echte code" -->

	<div class="container-fluid">
		<div class="border text-center">
			<h2>Welkom bij de quiz!</h2>
			<p>Er zullen een paar vragen worden gesteld, probeer deze zo goed mogelijk te beantwoorden.</p>
			<h4>Succes!</h4>
		</div>
	</div>

<?php
// gegevens om een connectie te maken met de database
	$servername = "localhost";
	$username = "st360143";
	$password = "GNRxDV9Z";
	$database = "st360143";

// connectie maken
	$connectie = mysqli_connect($servername, $username, $password, $database);

// connectie controleren
	if (!$connectie) {
		die("connection failed:" . mysqli_connect_error());
	}

	//echo "Connectie geslaagd";
?>


<div id="Content"></div>
	<div class="container-fluid">
			<script>
				var correctAnswers = [];
				var numberofquestions = getmyData(); //store the question data in a global variabele
				$.ajax({
			        url: 'http://st360143.cmd17c.cmi.hanze.nl/quiz/question_method.php',
			        method: 'GET',
			        dataType: 'json',
			        success: function(data) {
			            document.getElementById('Content').innerHTML = showRecords(data);
			            console.log("no errors");	
			        },

			        error: function(requestObject, error, errorThrown) {
			            console.log("error thrown, add handler to exit gracefully");
			        },
			        timeout: 3000 //to do: research and develop further in combination with error handling
		   		});

		//my functions//
				function showRecords(jsonrecordset) {
					var s = "";
					for(var i=0; i < jsonrecordset.value.length;i++) {
						s= s + drawQuestion(jsonrecordset.value[i], i);
					}
					return(s);
				}

					for (var i = 0; i < numberofquestions.length-1; i++) {
						document.write(drawQuestion(numberofquestions[i],i));
					}


					/* display questions on the screen */
			</script>

		</div>
</div>

		<div class="row text-center">
			<div class="col-xs-4 btn btn-primary">Exit</div>
			<div onclick="myFunctionHelp()" class="col-xs-4 btn btn-primary">Help</div>
			<a href="Vraag2.php"><div class="col-xs-4 btn btn-primary">Next</a></div>
		</div>
	</div>
	<script>
		function myFunctionHelp(){
			alert("Druk op next om te beginnen met de Quiz, als alle vragen beantwoord heeft klikt u vervolgens op next, hier krijgt u een overzicht te zien. Wilt u stoppen? Dat kan door heel gemakkelijk op 'exit' te klikken");
		}
	</script>

	<script>
		function myFunctionError(){
			alert("Je kunt de quiz niet verlaten als je nog niet bent begonnen, gekkie");
			}
	</script>

</body>
</html>