
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->load->view('Home');
	}

	// public function add_trip()
	// {
	// 	$this->load->view('Users/add_trip');
	// }


	// // Method for creating user
	// public function create()
	// {
	// 	// load model
	// 	$this->load->model("User");

	// 	// check user input
	// 	$this->load->library('form_validation');

	// 	// delegate the model the task of validating user input
	// 	$validation_result = $this->User->validate($this->input->post());

	// 	if( $validation_result == TRUE)
	// 	{
	// 		// delegate the task of creating the user to the model
	// 		$this->User->create($this->input->post());

	// 		$this->session->set_flashdata("error1", "User Registered Successfully");
	// 		redirect("/");
	// 	}

	// 	else
	// 	{
	// 		$this->session->set_flashdata("error1", "Something in your form didn't go so well, try again");
	// 		redirect('/');
	// 	}

		
	// }

	// public function create_trip()
	// {
	// 	// load model
	// 	$this->load->model("User");

	// 	// check user input
	// 	$this->load->library('form_validation');

	// 	// delegate the model the task of validating user input
	// 	$validation_result = $this->User->validate_trip($this->input->post());

	// 	if( $validation_result == TRUE)
	// 	{
	// 		// delegate the task of creating the user to the model
	// 		$this->User->create_trip($this->input->post());

	// 		// return to the user's home page
	// 		redirect("/success");
	// 		// var_dump($this->input->post());
	// 	}

	// 	else
	// 	{
	// 		$this->session->set_flashdata("error", "Something in your form didn't go so well, try again");
	// 		redirect('/add_trip');
	// 	}

		
	// }






}