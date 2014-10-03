<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		$this->load->model('user_model');
		$this->load->model('email');
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
							'username'  => $check_login->username,
							'logged_in' => TRUE
						);

						$this->session->set_userdata($session);
						redirect(base_url('social/news_feed/'.$check_login->username));
					}else {
		                $this->session->set_flashdata('error', 'Error');
		                redirect(base_url('social/auth'));
					}
				}
			}elseif (isset($post['signup'])) {
				$this->form_validation->set_rules('username_s', 'Username', 'required');
				$this->form_validation->set_rules('fullname_s', 'Full Name', 'required');
				$this->form_validation->set_rules('email_s', 'Email', 'required|valid_email|is_unique[social_user.email]');
				$this->form_validation->set_rules('password_s', 'Password', 'required|min_length[5]');
				$this->form_validation->set_rules('gender_s', 'Gender', 'required');
				
				$this->form_validation->set_message('required', 'Can not be empty');
				$this->form_validation->set_message('is_unique', 'This email has been registered');
				$this->form_validation->set_message('valid_email', 'must be a valid email');
				$this->form_validation->set_error_delimiters('<label class="control-label">', '</label>');

				if ($this->form_validation->run() == FALSE) 
				{
	            	$data['error'] = true;
				}
				else
				{
					$check_username = $this->user_model->check_username_s($post);
					$check_email = $this->user_model->check_email_s($post);
					if ($check_username) {
	            		$data['error_username'] = true;
					}elseif ($check_email) {
	            		$data['error_email'] = true;
					}else{
						$this->user_model->signup($post);

						$user_id = $this->db->insert_id();
						$activation_token = $this->user_model->get_user_by_user_id($user_id);

						// SEND MAIL HERE
						$sendmail_msg = '
						<div>
							Welcome, a social media that allows you to post your photo!
						</div>
						<br>
						<div>
							Thanks for registering. Before you start, we need you to confirm you email address validation.
						</div>
						<br>
						<div style="text-align:center">
							Copy this ' . site_url() . 'social/auth/activation_member/' . $activation_token->activation_hash . ' on your browser
						</div>
						<br>
						<br>
						<div>
						Sincerely,
						</div>
						<br>
						<div>
						Team
						</div>
						';
						
						$sendmail_to = $post['email_s'];
						$sendmail_subject = 'Please Confirm Your Registration';
						$this->email->send_mail($sendmail_to, $sendmail_subject, $sendmail_msg);

		                redirect(base_url('social/auth/activation_page'));
					}
				}
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

	public function activation_page()
	{
		echo "Please activate your account, check your email";
	}

	public function activation_member($hash)
	{
		$this->user_model->activating_member($hash);
		echo "Thanks to activated your account, click <a href='".base_url('social/auth')."'>here</a> to back to login page";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */