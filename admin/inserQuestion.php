<?php
	session_start(); 
	require_once('../connectvars.php');
	require_once('../Functions.php');
	$dbc = connectToDatabase();
	$question="";
	$option_a="";
	$option_b="";
	$option_c="";
	$option_d="";
	$correct_option="";
	$level_of_question ="";
	$permission="";
	$time_limit="";
	$quiz_id=1;

	if (isset($_POST['submit']))
	{
		if ( empty($_POST['Option_a']) && empty($_POST['Option_b']) && 
		 empty($_POST['Option_c']) && empty($_POST['Option_d']) && 
		 empty($_POST['Question'])
		  )
		{
			echo "Why are making joke with me.";
		}
		else
		{
			$question = $_POST['Question'];
			$option_a = $_POST['Option_a'];
			$option_b = $_POST['Option_b'];
			$option_c = $_POST['Option_c'];
			$option_d = $_POST['Option_d'];
			$correct_option = ord($_POST['correct_option']) - 97;

			$successfulInsertion = insertIntoQuestion($dbc,$question,$option_a,$option_b,$option_c,$option_d,$correct_option,
		$permission,$quiz_id,$time_limit,$level_of_question);

			// $query = $dbc->prepare("insert into question(question,option_a,
							// option_b,option_c,option_d,answer) values(?,?,?,?,?,?)");

			if($successfulInsertion)
			{
				header("Location: addQuestion.php?successfulSubmission=true");
				die();
			}
			else
			{
				echo "data is not inserted successfully.";
			}
		}
	}
	else
	{
		echo "hello set submit";
	}
 ?>