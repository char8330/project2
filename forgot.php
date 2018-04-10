<head>
	<title>Password Reset</title>
</head>
<body>
	<h1>Password Reset</h1>
		<!--<form method="post" action="forgot">-->
		<form method ="post" action="forget2">
		Enter your email here to request password reset: <input type="text" name="email" placeholder="Enter Email"> 
		<input type="hidden" name="ah" value=<?php// echo $key; ?> >
		<input type="submit" value="Submit">
		<a href = "<?=Uri::create('index.php/southdakota/forget2')?>">Reset</a>
		</form>		
</body>
