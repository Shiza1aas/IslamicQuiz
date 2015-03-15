<?php 
	session_start();
	require_once('connectvars.php');
	require_once('Functions.php');

	$handler = connectToDatabase();

	if ( isset($_POST['submit']))
	{
		$user = $_POST['user_name'];
		$success_login = checkLogIn($handler,$user);
		if ( $success_login)
		{
			echo "Welcome $user";
		}
		else
		{
			echo "Hello guest";
		}
	}
 ?>