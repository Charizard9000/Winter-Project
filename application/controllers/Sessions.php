<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller {
	

	// Method for creating a user
	public function create()
	{
		// load the model
		$this->load->model("User");

		// delegate the task of checking user input to the model
		$user = $this->User->get_user_by_username($this->input->post('username'));

		if ($user && password_verify($this->input->post('password'), $user['password']))
		{
			$user_info = array(
					'id' => $user['id'],
					'name' => $user['name'],
					'username' => $user['username'],
					'is_logged_in' => TRUE
				);
			$this->session->set_userdata($user_info);
			// var_dump($this->session->userdata('name'));
			redirect("/success");
		}

		else
		{
			$this->session->set_flashdata("error", "Invalid username or password");
			redirect("/");
		}
		// depending on result, show error or login the user
	}

	public function success()
	{
		if($this->session->userdata('is_logged_in') == FALSE)
		{
			redirect("/");
		}

		$this->load->view('Sessions/success');
	}

	public function destroy()
	{
		$this->session->sess_destroy();
		redirect("/");
	}

}