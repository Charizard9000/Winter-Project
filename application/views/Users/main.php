

<html>
<head>
	<title>Welcome!</title>
</head>
<body>
	<h2>Welcome!</h2>
	<form action="/users/create" method="post">
		<fieldset>
			<legend>Register</legend>
			<label>Name: </label>
			<input type="text" name="name">
			
			<label>Username: </label>
			<input type="text" name="username">
			<label>Password: </label>
			<input type="password" name="password">
			<label>Confirm Password: </label>
			<input type="password" name="confirm">
			<?= $this->session->flashdata('error1'); ?>
			<input type="submit" value="Register">
		</fieldset>
	</form>

	<form action="/sessions/create" method="post">
		<fieldset>
			<legend>Log In</legend>

			<label>Username: </label>
			<input type="text" name="username">

			<label>Password: </label>
			<input type="password" name="password">
			<?= $this->session->flashdata('error'); ?>
			<input type="submit" value="Log In">
		</fieldset>
	</form>
</body>
</html>