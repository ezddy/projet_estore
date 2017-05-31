<!DOCTYPE html>
<html>
<head>
	<title>Insert question</title>
</head>
<body>
	<?php include_once("nav_bar.php") ?>
	<form action="insert_question_submit.php" method="POST">
		<textarea name="desc" id="desc" placeholder="Question description" required="required" cols="21" rows="3"></textarea><br>
		<input type="text" name="optionA" id="optionA" placeholder="Option A" required="required"><br>
		<input type="text" name="optionB" id="optionB" placeholder="Option B" required="required"><br>
		<input type="text" name="optionC" id="optionC" placeholder="Option C" required="required"><br>
		<input type="text" name="optionD" id="optionD" placeholder="Option D" required="required"><br>
		<label for="answer">Answer: </label>
		<select name="answer" id="answer" required="required">
			<option selected="selected"></option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
		</select><br>
		<input type="submit" name="insert_question" value="Insert">
	</form>
</body>
</html>