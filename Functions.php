<?php 
	function checkLogIn($handler,$user)
	{
		$query = $handler->prepare("Select * from user where user_name =?");
		if ( $query->execute(array($user)))
		{
			$row = $query->fetchAll();
			if ( count($row))
			{
				return 1;
			}
		}
		else
		{
			return 0;
		}
	}

	function insertIntoQuestion($dbc,$question,$option_a,$option_b,$option_c,$option_d,$answer,
		$permission,$quiz_id,$time_limit,$level_of_question)
	{
		$query = $dbc->prepare("insert into question(question,option_a,
							option_b,option_c,option_d,answer,permission,quiz_id,
							time_limit,level_of_question) values(?,?,?,?,?,?,?,?,?,?)");
		if ($query->execute(array($question,$option_a,$option_b,$option_c,$option_d,$answer,
		$permission,$quiz_id,$time_limit,$level_of_question)))
		{
			return 1;
		}
		else
		{
			return 0;
		}

	}
	function updateQuestion($dbc,$question,$option_a,$option_b,$option_c,$option_d,$correct_option,
		$permission,$quiz_id,$time_limit,$level_of_question,$question_id)
	{
		$query = $dbc->prepare("update question set question = ? ,option_a = ?,
							option_b = ?,option_c = ?,option_d = ?,answer = ?,permission = ?,quiz_id = ?,
							time_limit = ?,level_of_question = ? where question_id = ?");
		if ($query->execute(array($question,$option_a,$option_b,$option_c,$option_d,$correct_option,
		$permission,$quiz_id,$time_limit,$level_of_question,$question_id)))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
 ?>