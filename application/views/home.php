<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>IssyFood</title>
    	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans">
	    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
    	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Oswald">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/issyfood.css') ?>">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

		<script>
			$(document).ready(function(){
				$('#rotate').click(function(){
    			$(this).toggleClass('rotated');
				})
			startTime();
			});
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
		    	if(check >= 12)
		    	{
		    		a = "PM";
		    	}
		    	if (check < 12)
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
			function toggleLinks(){
				if($(".header_link").css("display") == "none"){
					console.log("hidden");
					$(".header_link").fadeIn(300);
				} else {
					$(".header_link").fadeOut(300);
				}
	    	}
		</script>
	</head>

	<body>

		<?php
		date_default_timezone_get('America/Los_Angeles');
		$timestamp = time();
		$current_date =  date("w", $timestamp);
		$current_time = date("H:i:s", $timestamp);
		?> 
	
		<div id="content">
			<h1 id="title"> IssyFoods </h1><div>
				<div id="header">
					<button onclick="toggleLinks()" id="rotate">&equiv;</button>
					<div style="text-align: center; display: inline; margin-left: 28%">
						<a href="/users/new" class='header_link hide'>REGISTER</a>
						<a href="/Session/login" class='header_link hide'>LOG IN</a>
						<a href="/Session/destroy" class='header_link hide'>LOG OUT</a>
						<button onclick="toggleD('restaurant')" class='header_link hide'>SHOW DELIVERY ONLY</button>
					</div>
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

			<?php // var_dump($query_result);
			for($i=0;$i<count($query_result);$i++)
			{
				
				if($query_result[$i]['open'] <= $current_time && $query_result[$i]['close'] >= $current_time)
				{
					if($query_result[$i]['deliver'] == '1')
					{
						echo "<div class='restaurant_d'>";
						echo "<div class='restaurant_picture'><img src='assets/images/" . $query_result[$i]['Restaurant_id'] . ".jpg' alt=''></div>";
						echo "<div class='restaurant_info'><div class='restaurant_name'><h2>" . $query_result[$i]['name'] . "</h2></div>";
						echo "<div class='restaurant_phone'><h3>Phone Number: " . $query_result[$i]['phone'] . "</h3></div>";
						echo "<div class='restaurant_address'><h3>Address: " . $query_result[$i]['address'] . "</h3></div>";
						if($query_result[$i]['open'] == '00:00:00' && $query_result[$i]['close'] == "23:59:00")
							echo "<div class='restaurant_hours'><h3> Hours: Open 24 Hours </h3></div>";
						else
							echo "<div class='restaurant_hours'><h3> Hours: " . date("h:i a", strtotime($query_result[$i]['open'])) . " - " . date("h:i a",strtotime($query_result[$i]['close'])) . " </h3></div>";
						echo "</div></div>";
					}
					if($query_result[$i]['deliver'] == '0')
					{
						echo "<div class='restaurant'>";
						echo "<div class='restaurant_picture'><img src='assets/images/" . $query_result[$i]['Restaurant_id'] . ".jpg' alt=''></div>";
						echo "<div class='restaurant_info'><div class='restaurant_name'><h2>" . $query_result[$i]['name'] . "</h2></div>";
						echo "<div class='restaurant_phone'><h3>Phone Number: " . $query_result[$i]['phone'] . "</h3></div>";
						echo "<div class='restaurant_address'><h3>Address: " . $query_result[$i]['address'] . "</h3></div>";
						if($query_result[$i]['open'] == '00:00:00' && $query_result[$i]['close'] == "23:59:00")
							echo "<div class='restaurant_hours'><h3> Hours: Open 24 Hours </h3></div>";
						else
							echo "<div class='restaurant_hours'><h3> Hours: " . date("h:i a", strtotime($query_result[$i]['open'])) . " - " . date("h:i a",strtotime($query_result[$i]['close'])) . " </h3></div>";
						echo "</div></div>";
					}
				}
			}
			
			?>
		</div>
	</body>
</html>