<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurants extends CI_Model{

	public function create($post)
	{
		$query = "INSERT INTO users (name, username, password, created_at, updated_at) VALUES (?,?,?,NOW(),NOW())";
		$values = array(
				$post['name'],
				$post['username'],
				password_hash($post['password'], PASSWORD_BCRYPT)
			);
		return $this->db->query($query, $values);
	}

	public function get_stuff($current_time)
	{
		$query = "SELECT * FROM times JOIN restaurants ON restaurants.id = times.Restaurant_id WHERE ? = times.day";
		$time = array($current_time);
		return $this->db->query($query, $time)->result_array();
	}
}