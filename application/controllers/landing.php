<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		if ($this->session->userdata('logged_in') == TRUE) {
			redirect(site_url('social/news_feed'));
		}
		
		$this->load->model('user_model');
    }

	public function index()
	{
		if ($this->input->post()) {

			$session = array(
				'fullname'  => $this->input->post('fullname'),
				'password'  => $this->input->post('password'),
				'email' => $this->input->post('email')
			);

			$this->session->set_userdata($session);
			redirect(base_url('social/auth'));
		}

		$this->load->view('landing');
	}
}