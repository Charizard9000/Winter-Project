<html>
	<head>
		<title>Admin Page</title>
		<?php $this->load->library('upload'); ?>
	</head>
	<body>
		<form action="/users/add" method="post">
			<label>Restaurant Name</label>
			<input type="text" name="restaurant_name"><br><br>
			<label>Restaurant Address</label>
			<input type="text" name="restaurant_address"><br><br>
			<label>Restaurant Delivers?</label>
			<select name="deliver">
				<option value="0">No</option>
				<option value="1">Yes</option>
			</select>
			<br><br>
			<label>Phone Number</label>
			<input type="tel" name="phone" placeholder="(###) ###-####"><label><br><br>
			<fieldset>
				<legend>Hours</legend>
				<table>
					<tr>
						<th>Sunday</th>
						<th>Monday</th>
						<th>Tuesday</th>
						<th>Wednesday</th>
						<th>Thursday</th>
						<th>Friday</th>
						<th>Saturday</th>
					</tr>
					<tr>
						<td><input type="time" name="sunday_open"></td>
						<td><input type="time" name="monday_open"></td>
						<td><input type="time" name="tuesday_open"></td>
						<td><input type="time" name="wednesday_open"></td>
						<td><input type="time" name="thursday_open"></td>
						<td><input type="time" name="friday_open"></td>
						<td><input type="time" name="saturday_open"></td>
					</tr>
					<tr>
						<td><input type="time" name="sunday_close"></td>
						<td><input type="time" name="monday_close"></td>
						<td><input type="time" name="tuesday_close"></td>
						<td><input type="time" name="wednesday_close"></td>
						<td><input type="time" name="thursday_close"></td>
						<td><input type="time" name="friday_close"></td>
						<td><input type="time" name="saturday_close"></td>
					</tr>
				</table>
			</fieldset>
			<input type="submit" value="Add Restaurant">
		</form>
		<br>
		<br>

			<?php echo form_open_multipart('upload/do_upload');?>

			<input type="file" name="userfile" size="20" />

			<br /><br />

			<input type="submit" value="upload" />

		</form>

		<a href="/home">Home</a>
	</body>
</html>