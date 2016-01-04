<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>IssyFood</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/issyfood.css') ?>">
    	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
	    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=roboto">
    	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=oswald">

		<script>
			function startTime() {
		    	var today = new Date();
		    	var check = today.getHours();
		    	var h = today.getHours();
		    	if(h > 12)
		    	{
		    		h = h - 12;
		    	}
		    	if(h == 0)
		    	{
		    		h = h + 12;
		    	}
		    	var m = today.getMinutes();
		    	var s = today.getSeconds();
		    	var a = "AM";
		    	if(check > 12)
		    	{
		    		a = "PM";
		    	}
		    	if (check <= 12)
		    	{
		    		a = "AM";
		    	}
		    	m = checkTime(m);
		    	s = checkTime(s);
		    	document.getElementById('clock').innerHTML =
		    	h + ":" + m + ":" + s + "  " + a;
		    	var t = setTimeout(startTime, 500);
			}
			function checkTime(i) {
		    	if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		    	return i;
			}
			function toggleD(classId) 
			{
   				$("."+classId).toggle(200);
			}
		</script>
	</head>

	<body onload="startTime()">

		<?php
		date_default_timezone_get('America/Los_Angeles');
		$timestamp = time();
		$current_date =  date("w", $timestamp);
		$current_time = date("H:i:s", $timestamp);
		?> 
	
		<div id="content">
			<h1 id="title"> IssyFoods </h1><div>
				<div id="header">
					<a href="/users/new">REGISTER</a>
					<a href="/Session/login">LOG IN</a>
					<button onclick="toggleD('restaurant')">Delivery-Only</button>
					<div id="clock"></div>
				</div>
			</div>
			<?php
			if($this->session->userdata('is_logged_in') == TRUE)
			{
				echo "<div class='welcome_message'><p> hello again " . $this->session->userdata('first_name') . "</p></div>"; 
			}
			else
			{
				echo "<div class='welcome_message'> <p> welcome</p></div>";
			}
			?>
				<div id="nondeliver_color"> <h4>DOES NOT DELIVER</h4></div>
				<div id="deliver_color"> <h4> DELIVERS</h4></div>

			<?php
			for($i=0;$i<count($query_result);$i++)
			{
				
				if($query_result[$i]['open'] <= $current_time && $query_result[$i]['close'] >= $current_time)
				{
					if($query_result[$i]['deliver'] == '1')
					{
						echo "<div class='restaurant_d'>";
						echo "<div class='restaurant_picture'><img src='assets/images/" . $query_result[$i]['Restaurant_id'] . ".jpg' alt=''></div>";
						echo "<div class='restaurant_info'><div class='restaurant_name'><h2>" . $query_result[$i]['name'] . "</h2></div>";
						echo "<div class='restaurant_phone'><h3>" . $query_result[$i]['phone'] . "</h3></div>";
						echo "<div class='restaurant_address'><h3>" . $query_result[$i]['address'] . "</h3></div>";
						echo "<div class='restaurant_hours'><h3> Hours:" . $query_result[$i]['open'] . " - " . $query_result[$i]['close'] . " </h3></div>";
						echo "</div></div>";
					}
					if($query_result[$i]['deliver'] == '0')
					{
						echo "<div class='restaurant'>";
						echo "<div class='restaurant_picture'><img src='assets/images/" . $query_result[$i]['Restaurant_id'] . ".jpg' alt=''></div>";
						echo "<div class='restaurant_info'><div class='restaurant_name'><h2>" . $query_result[$i]['name'] . "</h2></div>";
						echo "<div class='restaurant_phone'><h3>" . $query_result[$i]['phone'] . "</h3></div>";
						echo "<div class='restaurant_address'><h3>" . $query_result[$i]['address'] . "</h3></div>";
						echo "<div class='restaurant_hours'><h3> Hours:" . $query_result[$i]['open'] . " - " . $query_result[$i]['close'] . " </h3></div>";
						echo "</div></div>";
					}
				}
			}
			
			?>
		</div>
	</body>
</html>