
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('America/Los_Angeles');


class Home extends CI_Controller {


	public function index()
	{
		$timestamp = time();
		$current_date =  date("w", $timestamp);
		$this->load->model("Restaurants");
		$stuff = $this->Restaurants->get_stuff($current_date);
		$this->load->view('Home', ['query_result' => $stuff]);
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