<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('America/Los_Angeles');

class Home extends CI_Controller
{
	
	public function index()
	{
		$timestamp = time();
		$current_date =  date("w", $timestamp);
		$this->load->model("Restaurant");
		$stuff = $this->Restaurant->get_stuff($current_date);
		$this->load->view('Home', ['query_result' => $stuff]);
	}
}