<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h1>Login</h1>
	<?php if($status === 'error') {?>
		<p>Incorrect details entered. Please try again.</p>
	<?php } ?>
	<form action="checkLogin" method="POST">
		Username: <br>
		<input type="text" name="username" placeholder="Please enter username"/> <br> </br>
		Password: <br>
		<input type="password" name="password" placeholder="Please enter password"/> <br> </br>
		<input type="submit" value="submit">
	</form>

	
</body>
</html>
