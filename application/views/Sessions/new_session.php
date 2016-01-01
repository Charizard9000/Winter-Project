

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
		
			<input type="submit" value="Register">
		</fieldset>
	</form>
</body>
</html>