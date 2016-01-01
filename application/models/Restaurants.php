<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurants extends CI_Model{

	// public function create($post)
	// {
	// 	$query = "INSERT INTO users (name, username, password, created_at, updated_at) VALUES (?,?,?,NOW(),NOW())";
	// 	$values = array(
	// 			$post['name'],
	// 			$post['username'],
	// 			password_hash($post['password'], PASSWORD_BCRYPT)
	// 		);
	// 	return $this->db->query($query, $values);
	// }


	// public function create_trip($post)
	// {
	// 	$query = "INSERT INTO trips (destination, description, date_from, date_to, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
	// 	$values = array(
	// 			$post['destination'],
	// 			$post['description'],
	// 			$post['date_from'],
	// 			$post['date_to']
	// 		);
	// 	return $this->db->query($query, $values);
	// }


	public function get_stuff($current_time)
	{
		$query = "SELECT * FROM times JOIN restaurants ON restaurants.id = times.Restaurant_id WHERE ? = times.day";
		$time = array($current_time);
		return $this->db->query($query, $time)->result_array();
	}

	// public function validate($post)
	// {
	// 	$this->form_validation->set_rules("name", "Name", 'required|min_length[3]');
		
	// 	$this->form_validation->set_rules("username", "Username", 'required|min_length[3]');
	// 	$this->form_validation->set_rules("confirm", "Password Confirmation", 'required');
	// 	$this->form_validation->set_rules("password", "Password", 'required|matches[confirm]|alpha_numeric');


	// 	return $this->form_validation->run();
	// }

	// public function validate_trip($post)
	// {
	// 	$this->form_validation->set_rules("destination", "Destination", 'required');
		
	// 	$this->form_validation->set_rules("description", "Description", 'required');
	// 	$this->form_validation->set_rules("date_from", "Starting Date", 'required');
	// 	$this->form_validation->set_rules("date_to", "Finishing Date", 'required');


	// 	return $this->form_validation->run();
	// }

	// public function add_trip()
	// {
	// 	$this->load->view('Users/add_trip');
	// }

}