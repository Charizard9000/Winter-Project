<html>
<head>
	<title>Register</title>
</head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/issyfood.css') ?>">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=roboto">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=oswald">
<style>
form{
	width:100%;
	text-align:center;
	background-color: rgb(35,35,35);
	margin: 0px auto;
	font-family: "Open Sans";
	color: #ffffff;
	height:100%;
}
fieldset{
	padding: 10%;
}
legend{
	font-size: 2em;
	width: 20%;
	border: 2pt solid white;
	text-align: center;
	font-family: "open sans";
	background: rgb(255,132,138);
	padding-bottom: 5px;
	font-weight: bolder;
}
label{
	display:inline-block;
	text-align: center;
	font-family: "oswald";
	font-size: 2em;
	margin: 3%;
}
input{
	height: 3%;
	text-align: center;
	margin: 0px; auto;
	width: 13%;
	font-size: 1em;
	font-weight: bold;
	font-color: green;
}
#regi_button{
	text-align: center;
	border: 2pt solid white;
	font-family: "oswald";
	padding: 2%;
	padding-bottom: 40px;
	color: white;
	font-size:1em;
	font-weight: bolder;
	background-color: rgba(63,76,107,1);
	width:10%;
	float:right;
	margin-top: 4%;
	margin-right: 8%;
}
#regi_button:hover{
	text-align:center;
	display:block;
	width:10%;
	background-color: rgba(63,76,31,1);
}

</style>
<body>
	<?= $this->session->flashdata('errors'); ?>
	<form action="/users/create" method="post">
		<fieldset>
			<legend>REGISTRATION</legend>
			<br>
			<label>First Name</label>
			<input type="text" name="first_name">
			
			<label>Last Name</label>
			<input type="text" name="last_name">

			<label>Email</label>
			<input type="text" name="email">

			<label>Password</label>
			<input type="password" name="password">

			<label>Password Confirmation</label>
			<input type="password" name="confirm">
			
			<input id="regi_button" type="submit" value="Register">
		</fieldset>
	</form>
	<?= $this->session->flashdata('error1'); ?>
</body>
</html>