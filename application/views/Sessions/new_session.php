<html>
<head>
	<title></title>
</head>
<body>
	<?= $this->session->flashdata('error'); ?>
	<form action="/sessions/create" method="post">
		<fieldset>
			<legend>Log In</legend>

			<label>Email: </label>
			<input type="text" name="email">

			<label>Password: </label>
			<input type="password" name="password">
		
			<input type="submit" value="Login">
		</fieldset>
	</form>

	<form action="/sessions/admin" method="post">
		<fieldset>
			<legend>Admin Log In</legend>

			<label>Password: </label>
			<input type="password" name="admin_password">
		
			<input type="submit" value="Admin Login">
		</fieldset>
	</form>
</body>
</html>