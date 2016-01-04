<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{

		$this->load->model('Restaurant');

		$id = $this->Restaurant->get_restaurant_id();

		$config['upload_path'] = './assets/images';
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '800';
		$config['max_width']  = '400';
		$config['max_height']  = '400';
		$config['file_name'] = $id;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			redirect('Session/success');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			redirect('Session/success');
		}
	}
}
?>