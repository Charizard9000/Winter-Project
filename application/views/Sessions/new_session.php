<html>
<head>
	<title>Log In</title>
</head>
<body>
	<?= $this->session->flashdata('error')  ?>
	<form action="/sessions/create" method="post">
		<fieldset>
			<legend>Log in</legend>
			
			<label>Email</label>
			<input type="text" name="email">

			<label>Password</label>
			<input type="password" name="password">
			
			<input type="submit" value="Log In">
		</fieldset>
	</form>
</body>
</html>