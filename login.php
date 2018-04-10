<head>
	<title>Login Page</title>
</head>
<body>
	<h1>Login</h1>
	<?php if($status === 'error') {?>
		<p>Incorrect details entered. Please try again.</p>
	<?php }?>
	<form action="checkLogin" method="POST">
		<input type="text" name="username" placeholder="username"/> 
		<input type="password" name="password" placeholder="password"/> 
		<input type="submit" value="submit">
	</form>
	<h3><a href="<?=Uri::create('index.php/southdakota/forgot'); ?>">Forgot Password?</a></h3>
	
</body>
