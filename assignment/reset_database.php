<?php 
	require_once("database.php");

	exec_cmd("DROP TABLE IF EXISTS question");

	exec_cmd("	CREATE TABLE `question` (
	  `QuestionID` int(11) NOT NULL,
	  `QuestionDescription` varchar(256) NOT NULL,
	  `QuestionOptionA` varchar(64) NOT NULL,
	  `QuestionOptionB` varchar(64) NOT NULL,
	  `QuestionOptionC` varchar(64) NOT NULL,
	  `QuestionOptionD` varchar(64) NOT NULL,
	  `Answer` varchar(1) NOT NULL)");

	exec_cmd("	ALTER TABLE `question`
	  ADD PRIMARY KEY (`QuestionID`)");

	exec_cmd("	ALTER TABLE `question`
	  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT");

	exec_cmd("INSERT INTO question (QuestionDescription, QuestionOptionA, QuestionOptionB, QuestionOptionC, QuestionOptionD, Answer) VALUES ('If a=1 and b=2, what is a+b?', '12', '3', '4', '-5', 'B')");

	header("Location: index.php")
 ?>