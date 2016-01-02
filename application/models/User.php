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
		$this->form_validation->set_rules("first_name", "first name", "required|min_length[3]");
		$this->form_validation->set_rules("last_name", "last name", "required");
		$this->form_validation->set_rules("email", "email", "required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("password_confirmation", "Password Confirmation", "required");
		$this->form_validation->set_rules("password", "Password", "required|matches[password_confirmation]|alpha_numeric");

		return $this->form_validation->run();
	}

	public function add_restaurant($post)
	{
		$temp = "SELECT * FROM restaurants";
		$count = $this->db->query($temp)->result_array();
		$count = count($count)+1;
		$count = strval($count);
		$query = "INSERT INTO restaurants (`name`, `address`, `phone`, `deliver`) VALUES (?,?,?,?)
		INSERT INTO times (`open`, `close`, `day`, `restaurant_id`) VALUES (?,?,?,?)
		INSERT INTO times (`open`, `close`, `day`, `restaurant_id`) VALUES (?,?,?,?)
		INSERT INTO times (`open`, `close`, `day`, `restaurant_id`) VALUES (?,?,?,?)
		INSERT INTO times (`open`, `close`, `day`, `restaurant_id`) VALUES (?,?,?,?)
		INSERT INTO times (`open`, `close`, `day`, `restaurant_id`) VALUES (?,?,?,?)
		INSERT INTO times (`open`, `close`, `day`, `restaurant_id`) VALUES (?,?,?,?)
		INSERT INTO times (`open`, `close`, `day`, `restaurant_id`) VALUES (?,?,?,?)";


		$values = array(
				$post['restaurant_name'],
				$post['restaurant_address'],
				$post['phone'],
				$post['deliver'],
				$post['sunday_open'],
				$post['sunday_close'],
				"0",
				$count,
				$post['monday_open'],
				$post['monday_close'],
				"1",
				$count,
				$post['tuesday_open'],
				$post['tuesday_close'],
				"2",
				$count,
				$post['wednesday_open'],
				$post['wednesday_close'],
				"3",
				$count,
				$post['thursday_open'],
				$post['thursday_close'],
				"4",
				$count,
				$post['friday_open'],
				$post['friday_close'],
				"5",
				$count,
				$post['saturday_open'],
				$post['saturday_close'],
				"6",
				$count	
			);
		return $this->db->query($query, $values);
	}
}