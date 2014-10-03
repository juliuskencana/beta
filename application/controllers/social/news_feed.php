<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_feed extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect(site_url());
		}

		$this->load->model('user_model');
    }
    
	public function index($username)
	{
		if ($username != $this->session->userdata('username')) {
			show_404('page', ['log_error']);
		}else{
			$data['user_id'] = $this->user_model->get_user_by_username($username);
			$data['user'] = $this->user_model->get_user_by_user_id($this->session->userdata('user_id'));
			$this->load->view('social/header', $data);
			$this->load->view('social/news_feed');
			$this->load->view('social/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */