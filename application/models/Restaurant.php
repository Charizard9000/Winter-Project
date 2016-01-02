<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurant extends CI_Model{

	public function get_stuff($current_time)
	{
		$query = "SELECT * FROM times JOIN restaurants ON restaurants.id = times.Restaurant_id WHERE ? = times.day";
		$time = array($current_time);
		return $this->db->query($query, $time)->result_array();
	}
}