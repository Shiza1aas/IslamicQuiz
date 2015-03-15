window.onload = CheckLogin;

function CheckLogin () 
{
	
	request = createRequest();
	request.onstatechange = loginVerify;
	request.open("GET","login.php?user_name="+user_name,true);
	request.send();
}

