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
		<input type="text" name="username" placeholder="username"/> 
		<input type="password" name="password" placeholder="password"/> 
		<input type="submit" value="submit">
	</form>

	
</body>
</html>
