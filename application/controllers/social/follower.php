<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Follower extends CI_Controller {

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
		$data['user_id'] = $this->user_model->get_user_by_username($username);
		$data['user'] = $this->user_model->get_user_by_user_id($this->session->userdata('user_id'));
		$data['follower'] = $this->user_model->get_follower($data['user_id']->social_user_id);

		$this->load->view('social/header', $data);
		$this->load->view('social/follower');
		$this->load->view('social/footer');
	}
    
	public function follow($user_id)
	{
		$user = $this->user_model->get_user_by_user_id($this->session->userdata('user_id'));
		$this->user_model->follow($this->session->userdata('user_id'), $user_id);
		redirect(base_url('social/following/' . $user->username));
	}
    
	public function unfollow($user_id)
	{
		$user = $this->user_model->get_user_by_user_id($this->session->userdata('user_id'));
		$this->user_model->unfollow($this->session->userdata('user_id'), $user_id);
		redirect(base_url('social/following/' . $user->username));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */