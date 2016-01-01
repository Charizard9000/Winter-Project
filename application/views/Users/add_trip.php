<html>
<head>
	<title>Add Trip!</title>
</head>
<body>
	<div id="header">
		<a href="/success">Home</a>
		<form action="/sessions/destroy" method="post">
			<input type="submit" value="logout">
		</form>
	</div>
	<div>
		<h2>Add a Trip!</h2>
		<form action="/users/create_trip" method="post">
			<legend>Trip Details: </legend>
			<label>Where: </label>
			<input type="text" name="destination">
				
			<label>description: </label>
			<textarea name="description" id="" cols="30" rows="10"></textarea>
			<label>Travel Date From: </label>
			<input type="date" name="date_from">
			<label>Travel Date To: </label>
			<input type="date" name="date_to">
			<?= $this->session->flashdata('error'); ?>
			<input type="submit" value="Add Trip">
		</form>
		
	</div><?= $this->session->flashdata('error');?>
</body>
</html>