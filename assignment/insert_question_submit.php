<?php 
	require_once("database.php");

	if(isset($_POST['desc']) && isset($_POST['optionA']) && isset($_POST['optionB']) && isset($_POST['optionC']) && isset($_POST['optionD']) && isset($_POST['answer'])){
		$desc = $_POST['desc'];
		$optionA = $_POST['optionA'];
		$optionB = $_POST['optionB'];
		$optionC = $_POST['optionC'];
		$optionD = $_POST['optionD'];
		$answer = $_POST['answer'];

		$cmd = "INSERT INTO question (QuestionDescription, QuestionOptionA, QuestionOptionB, QuestionOptionC, QuestionOptionD, Answer) VALUES ('$desc', '$optionA', '$optionB', '$optionC', '$optionC', '$answer')";
		exec_cmd($cmd);

		header('Location: insert_question.php');
	}
 ?>