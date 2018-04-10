<p>	Welcome to your password reset</p>
<?php;
	$em = Session::get("mailTo");
	//$em = Input::param("email");
?>
	<form method="post" action="login">
	Enter new password here: <input type="text" name="password" placeholder="New Password"> 
	<input type="submit" value="Submit">
	</form>		
	<!-- Need to grab either email or userID from database and associate it to the session, then make a variable to store the password and update the database with the new password -->
