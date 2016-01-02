<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model{

	public function create($post)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?, NOW(),NOW())";
		$values = array(
				$post['name'],
				$post['username'],
				$post['email'],
				password_hash($post['password'], PASSWORD_BCRYPT)
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
		$this->form_validation->set_rules("first_name", "first name", "required|min_length[3]");
		$this->form_validation->set_rules("last_name", "last name", "required");
		$this->form_validation->set_rules("email", "email", "required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("password", "Password", "required|matches[password_confirmation]|alpha_numeric");
		$this->form_validation->set_rules("password_confirmation", "Password Confirmation", "required");

		return $this->form_validation->run();
	}
}