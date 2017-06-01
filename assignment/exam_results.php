<?php require_once("database.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title>Exam result</title>
</head>
<body>
	<?php include_once("nav_bar.php") ?>
	<?php 
		if(!isset($_POST["1"])){
			echo "Please, fill the exam first.";
		} 
		else{
			echo 	"Thank you for completing the exam!<br>
					Your score is ".get_mark($_POST);
		}
	?>
</body>
</html>