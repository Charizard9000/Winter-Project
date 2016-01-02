<html>
<head>
	<title></title>
</head>
<body>
	<h2>welcome back <?php echo $this->session->userdata('name'); ?></h2>

	<form action="/sessions/destroy" method="post">
		<input type="submit" value="logout">
	</form>
</body>
</html>