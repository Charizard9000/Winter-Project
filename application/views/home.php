<html>
	<head> 
		<title>IssyFood</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/issyfood.css') ?>">
	</head>

	<body>

	<?php
	date_default_timezone_get('America/Los_Angeles');
	$timestamp = time();
	$current_date =  date("w", $timestamp);
	$current_time = date("H:i:s", $timestamp);

	?> 
	<div id="content">
	<h1 id="title"> Welcome To IssyFoods! </h1> 
	<a href="/users/new">Register</a>
	<a href="/Session/login">Login</a>


	<?php

	var_dump($query_result);
	for($i=0;$i<count($query_result);$i++)
	{
		
		if($query_result[$i]['open'] <= $current_time && $query_result[$i]['close'] >= $current_time)
		{
			if($query_result[$i]['deliver'] == '1')
			{
				echo "<div class='restaurant_d'>";
				echo "<img src='assets/images/" . $query_result[$i]['Restaurant_id'] . ".jpg' alt=''>";
				echo "<h3>" . $query_result[$i]['name'] . "</h3>";
				echo "</div>";
			}
			if($query_result[$i]['deliver'] == '0')
			{
				echo "<div class='restaurant'>";
				echo "<img src='assets/images/" . $query_result[$i]['Restaurant_id'] . ".jpg' alt=''>";
				echo "<h3>" . $query_result[$i]['name'] . "</h3>";
				echo "</div>";
			}
		}
		
	}
	
	



	?>
	</div>
	</body>
	
</html>