<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model{

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


	public function create_trip($post)
	{
		$query = "INSERT INTO trips (destination, description, date_from, date_to, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
		$values = array(
				$post['destination'],
				$post['description'],
				$post['date_from'],
				$post['date_to']
			);
		return $this->db->query($query, $values);
	}


	public function get_user_by_username($username)
	{
		$query = "SELECT * FROM users WHERE username = ?";
		$value = array($username);
		return $this->db->query($query, $value)->row_array();
	}

	public function validate($post)
	{
		$this->form_validation->set_rules("name", "Name", 'required|min_length[3]');
		
		$this->form_validation->set_rules("username", "Username", 'required|min_length[3]');
		$this->form_validation->set_rules("confirm", "Password Confirmation", 'required');
		$this->form_validation->set_rules("password", "Password", 'required|matches[confirm]|alpha_numeric');


		return $this->form_validation->run();
	}

	public function validate_trip($post)
	{
		$this->form_validation->set_rules("destination", "Destination", 'required');
		
		$this->form_validation->set_rules("description", "Description", 'required');
		$this->form_validation->set_rules("date_from", "Starting Date", 'required');
		$this->form_validation->set_rules("date_to", "Finishing Date", 'required');


		return $this->form_validation->run();
	}

	public function add_trip()
	{
		$this->load->view('Users/add_trip');
	}

}