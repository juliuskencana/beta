<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		$this->load->model('like_model');
		$this->load->model('comment_model');
    }
    
	public function index()
	{

	}
    
	public function like()
	{
		$post = $this->input->post();
		$this->like_model->add_like($this->session->userdata('user_id'), $post);
	}
    
	public function unlike()
	{
		$post = $this->input->post();
		$this->like_model->unlike($this->session->userdata('user_id'), $post);
	}
    
	public function comment()
	{
		$post = $this->input->post();
		$this->comment_model->add_comment($this->session->userdata('user_id'), $post);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */