<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		$this->load->model('user_model');
    }

	public function index()
	{
		$data['error'] = false;
		if ($this->input->post()) {
			$post = $this->input->post();

			if (isset($post['signin'])) {
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				
				$this->form_validation->set_message('required', 'Can not be empty');
				$this->form_validation->set_error_delimiters('<label class="control-label">', '</label>');

				if ($this->form_validation->run() == FALSE) 
				{
	            	$data['error'] = true;
				}
				else
				{
					$check_login = $this->user_model->check_login($post);
					if ($check_login != false) {
						$session = array(
							'user_id'  => $check_login->social_user_id,
							'logged_in' => TRUE
						);

						$this->session->set_userdata($session);
						redirect(base_url('social/news_feed'));
					}else {
		                $this->session->set_flashdata('error', 'Error');
		                redirect(base_url('social/auth'));
					}
				}
			}elseif (isset($post['signup'])) {
				echo "asdasd";
			}
		}

		$this->load->view('social/header', $data);
		$this->load->view('social/signup');
		$this->load->view('social/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url());
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */