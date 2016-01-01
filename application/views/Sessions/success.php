<?php

$this->load->model('User');
$trip_data = $this->db->query("SELECT * FROM trips");


?>

<html>
<head>
	<title></title>
</head>
<body>
	<h2>welcome back <?php echo $this->session->userdata('name'); ?></h2>

	<form action="/sessions/destroy" method="post">
		<input type="submit" value="logout">
	</form>
	
	<div id="local_trips">
		<h3>Your Schedule'd Trips</h3>
		<table>
			<tr>
				<th>Destination</th>
				<th>Travel Start Date</th>
				<th>Travel End Date</th>
				<th>Plan</th>
			</tr>
			<?php


			foreach($trip_data->result_array() as $row)
			{
				echo "<tr>";
				echo "<td>" . $row['destination'] . "</td>";
				echo "<td>" . $row['date_from'] . "</td>";
				echo "<td>" . $row['date_to'] . "</td>";
				echo "<td>" . $row['description'] . "</td>";
				echo "</tr>";
			}

			?>
		</table>
	</div>
	<div id="user_trips">
		<h3>Other User's Travel Plans</h3>
		<table>
			<tr>
				<th>Destination</th>
				<th>Travel Start Date</th>
				<th>Travel End Date</th>
				<th>Plan</th>
				<th>Do you want to join?</th>
			</tr>

			<?php
			foreach($trip_data->result_array() as $row)
			{
				echo "<tr>";
				echo "<td>" . $row['destination'] . "</td>";
				echo "<td>" . $row['date_from'] . "</td>";
				echo "<td>" . $row['date_to'] . "</td>";
				echo "<td>" . $row['description'] . "</td>";
				echo "<td><a href='/success'>Join!</a></td>";
				echo "</tr>";
			}

			?>
		</table>
	</div>
	<br>
	<a href="/add_trip">Add Travel Plan</a>
	<?php
	// var_dump($trip_data);
	?>
</body>
</html>