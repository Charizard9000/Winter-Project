<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller {

	//method to show login form
	public function new_session()
	{
		$this->load->view("Sessions/new_session");
	}

	//method to do actual logging in
	public function create()
	{
		//load the model
		$this->load->model("User");

		//delegate the task of checking user input to the model
		$user = $this->User->get_user_by_email($this->input->post("email"));

		//depending on the result, show error or log user in
		if ($user && password_verify($this->input->post('password'), $user['password']))
		{
			$user_info = array(
				'id' => $user['id'],
				'first_name' => $user['first_name'],
				'last_name' => $user['last_name'],
				'is_logged_in' => TRUE
			);		
		$this->session->set_userdata($user_info);
		redirect(base_url("success"));
		}
		else
		{
			$this->session->set_flashdata("error", "Invalid email or password");
			redirect(base_url("sessions/new"));
		}
	}

	public function success()
	{
		if ($this->session->userdata('is_logged_in') == FALSE)
		{
			redirect(base_url('sessions/new'));
		}
		$this->load->view("success");
	}

	public function destroy()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
} 