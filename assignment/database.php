<?php 
	function get_db_connection(){
		return /*$db =*/ new PDO('mysql:host=localhost:3305;dbname=webassignment','root','root');
	}

	function query_cmd($sqlCommand) {
		$db = get_db_connection();
		return $db->query($sqlCommand);
	}

	function exec_cmd($sqlCommand) {
		$db = get_db_connection();
		//$stmt = $db->prepare($sqlCommand);
		$db->exec($sqlCommand) /*or die(print_r($db->errorInfo(), true))*/;
	}

	function get_questions(){
		$cmd = "SELECT * FROM question";
		$cmd = query_cmd($cmd);

		echo '<form action="exam_results.php" method="POST">';
		foreach ($cmd as $row) {
			echo 	'QUESTION<br>
					'.$row['QuestionDescription'].'<br>
					ANSWER<br>
					<input type="hidden" name="'.$row['QuestionID'].'" value="E">
					<label for="A'.$row['QuestionID'].'">'.$row['QuestionOptionA'].'</label>
					<input type="radio" name="'.$row['QuestionID'].'" id="A'.$row['QuestionID'].'" value="A"><br>
					<label for="B'.$row['QuestionID'].'">'.$row['QuestionOptionB'].'</label>
					<input type="radio" name="'.$row['QuestionID'].'" id="B'.$row['QuestionID'].'" value="B"><br>
					<label for="C'.$row['QuestionID'].'">'.$row['QuestionOptionC'].'</label>
					<input type="radio" name="'.$row['QuestionID'].'" id="C'.$row['QuestionID'].'" value="C"><br>
					<label for="D'.$row['QuestionID'].'">'.$row['QuestionOptionD'].'</label>
					<input type="radio" name="'.$row['QuestionID'].'" id="D'.$row['QuestionID'].'" value="D"><br><br>
					';
		}
		echo 	'<input type="submit" value="Submit">
				</form>';
	}

	function get_nb_questions(){
		$cmd = "SELECT MAX(QuestionID) AS val FROM question";
		$cmd = query_cmd($cmd);
		$cmd = $cmd->fetch();
		return $cmd["val"];
	}

	function check_answers($POST){
		$cmd = "SELECT QuestionID, Answer FROM question";
		$cmd = query_cmd($cmd);

		$mark = 0;

		foreach ($cmd as $row) {
			if($row["Answer"] === $POST[$row["QuestionID"]]){
				$mark = $mark + 1;
			}
		}

		return $mark;
	}

	function get_mark($POST){
		return check_answers($POST)."/".get_nb_questions();
	}
 ?>