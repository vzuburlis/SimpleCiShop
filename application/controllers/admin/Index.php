<?php

/**
 * Class Index
 */
class Index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$logged_in = $this->authentication->authenticate($this->input->post('username'), $this->input->post('password'));
		if($logged_in === FALSE) $this->login_form();
		else redirect('catalog');
	}

	function login_form()
	{
		// gets all products from database
		$data['title'] = "Είσοδος Στο Σύστημα Διαχείρισης";
		$data['heading'] = "Είσοδος Στο Σύστημα Διαχείρισης";

		$data['contents'] = $this->load->view('login/login_tpl', array(), TRUE);


		$this->load->view('login/container_tpl',$data);
	}
}