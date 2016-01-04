<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurant extends CI_Model{

	public function get_stuff($current_time)
	{
		$query = "SELECT * FROM times JOIN restaurants ON restaurants.id = times.Restaurant_id WHERE ? = times.day ORDER BY restaurants.name";
		$time = array($current_time);
		return $this->db->query($query, $time)->result_array();
	}

	public function add_restaurant($post)
	{
		$temp = "SELECT * FROM restaurants";
		$count = $this->db->query($temp)->result_array();
		$count = count($count)+1;
		$count = strval($count);
		$query = "INSERT INTO restaurants (`name`, `address`, `phone`, `deliver`) VALUES (?,?,?,?)";
		


		$values = array(
				$post['restaurant_name'],
				$post['restaurant_address'],
				$post['phone'],
				$post['deliver']);
		$week = array(
			$sunday = array(
					$post['sunday_open'],
					$post['sunday_close'],
					"0",
					$count),
			$monday = array(
					$post['monday_open'],
					$post['monday_close'],
					"1",
					$count),
			$tuesday = array(
					$post['tuesday_open'],
					$post['tuesday_close'],
					"2",
					$count),
			$wednesday = array(
					$post['wednesday_open'],
					$post['wednesday_close'],
					"3",
					$count),
			$thrusday = array(
					$post['thursday_open'],
					$post['thursday_close'],
					"4",
					$count),
			$friday = array(
					$post['friday_open'],
					$post['friday_close'],
					"5",
					$count),
			$saturday = array(
					$post['saturday_open'],
					$post['saturday_close'],
					"6",
					$count)
			);
		$this->db->query($query, $values);
		foreach($week as $day => $info)
			$this->db->query("INSERT INTO times (`open`, `close`, `day`, `restaurant_id`) VALUES (?,?,?,?)", $info);
		return;

	}


	public function get_restaurant_id()
	{
		$query = "SELECT id FROM restaurants";
		$id = $this->db->query($query)->result_array();
		$id = count($id);
		return $id;
	}
	
}