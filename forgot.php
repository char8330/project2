<head>
	<title>Password Reset</title>
</head>
<body>
	<h1>Password Reset</h1>
	<?php
		
		$mailTo = Input::param("email");
		if(isset($mailTo)){

		$subject = "Password Reset";
		$content = 'Please follow this link to reset password https://www.cs.colostate.edu/~jtperea/ct310/index.php/southdakota/reset/'. $secretKey;
		error_reporting(0);
		if(mail($mailTo, $subject, $content)){
				echo "<p>Reset link sent to $mailTo</p>";
			}
			else {
				echo "<p>There was an error trying to reset your password.</p>\n";
			}
	}
		else{
			echo "<form method=\"post\" action=\"forgot\">\n";
			?>
		Enter your email here to request password reset: <input type="text" name="email" placeholder="Enter Email"> 
		<input type="submit" value="Submit">
		</form>		
	<?php
	}

	echo "<br><br>";
	?>
</body>
