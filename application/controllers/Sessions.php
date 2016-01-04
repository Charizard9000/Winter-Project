<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller
{
	public function login()
	{
		$this->load->view("Sessions/new_session");
	}
	// Method for creating a user
	public function create()
	{
		// load the model
		$this->load->model("User");

		// delegate the task of checking user input to the model
		$user = $this->User->get_user_by_email($this->input->post('email'));

		if ($user && password_verify($this->input->post('password'), $user['password']))
		{
			$user_info = array(
					'id' => $user['id'],
					'first_name' => $user['first_name'],
					'last_name' => $user['last_name'],
					'is_logged_in' => TRUE
				);
			$this->session->set_userdata($user_info);
			redirect("/home");
		}

		else
		{
			$this->session->set_flashdata("error", "Invalid username or password");
			redirect("Session/login");
		}
	}

	public function admin()
	{
		$admin_pw = "dota";
		if($admin_pw == ($this->input->post('admin_password')))
		{
			$admin_info = array("admin" => TRUE);
			$this->session->set_userdata($admin_info);
			redirect("Session/success");
		}
		else
		{
			redirect('/home');
		}
	}

	public function success()
	{
		if($this->session->userdata('admin') == FALSE)
		{
			redirect("/home");
		}

		$this->load->view('Users/admin');
	}

	public function destroy()
	{
		$this->session->sess_destroy();
		redirect("home");
	}
}