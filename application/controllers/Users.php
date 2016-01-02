<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()	
	{
		$this->load->view("Users/welcome");
	} 
	//method for showing register form
	public function new_user()
	{
		$this->load->view("Users/new_user");
	}
	//method for actually creating the user
	public function create()
	{
		//load the model
		$this->load->model("User");

		//check user input
		$this->load->library("form_validation");

		//delegate the model the task of validating user input
		$validation_result = $this->User->validate($this->input->post());

		//depending on validation checks, show error or create user 
		if($validation_result == TRUE)
		{
			// //delegate the task of creating user to the model
			$this->User->create($this->input->post());

			//go to the login page
			redirect(base_url("sessions/new"));
		}
		else
		{
			//or show error
			$this->session->set_flashdata("errors", validation_errors());

			//go back to register form
			redirect(base_url("users/new"));
		}
	}
}