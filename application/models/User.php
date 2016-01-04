<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model{

	public function create($post)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?, NOW(),NOW())";
		$values = array(
				$post['first_name'],
				$post['last_name'],
				$post['email'],
				password_hash($post['password'], PASSWORD_BCRYPT)
			);
		return $this->db->query($query, $values);
	}

	public function get_user_by_email($email)
	{
		$query = "SELECT * FROM users WHERE email = ?";
		$value = array($email);
		return $this->db->query($query, $value)->row_array();
	}

	public function validate($post)
	{
		$this->form_validation->set_rules("first_name", "First name", "required|min_length[3]");
		$this->form_validation->set_rules("last_name", "Last name", "required");
		$this->form_validation->set_rules("email", "Email", "required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("confirm", "Password Confirmation", "required");
		$this->form_validation->set_rules("password", "Password", "required|matches[password_confirmation]|alpha_numeric");
		return $this->form_validation->run();
	}
}