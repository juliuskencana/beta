<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect(site_url());
		}

		$this->load->model('user_model');
    }
    
	public function index()
	{
		$data['error'] = false;
		$data['user'] = $this->user_model->get_user_by_user_id($this->session->userdata('user_id'));
		$data['user_id'] = $this->user_model->get_user_by_username($this->session->userdata('username'));
		if ($this->input->post()) {
			$post = $this->input->post();
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
			$this->form_validation->set_rules('name', 'name', 'required');
			
			$this->form_validation->set_message('required', 'Can not be empty');
				$this->form_validation->set_message('valid_email', 'must be a valid email');
			$this->form_validation->set_error_delimiters('<label class="control-label">', '</label>');

			if ($this->form_validation->run() == FALSE) 
			{
            	$data['error'] = true;
			}
			else
			{
				$check_username = $this->user_model->check_username($post);
				$check_email = $this->user_model->check_email($post);
				if ($post['username'] == $data['user']->username) {
					if ($post['email'] == $data['user']->email) {
						$this->user_model->edit_user($post, $this->session->userdata('user_id'));
						// send mail
						redirect(site_url('social/setting'));
					}else{
						if ($check_email) {
	            			$data['error'] = true;
		            		$data['error_email'] = true;
						}else{
							$this->user_model->edit_user($post, $this->session->userdata('user_id'));
							// send mail
							redirect(site_url('social/setting'));
						}
					}
				}elseif ($post['email'] == $data['user']->email) {
					if ($check_username) {
            			$data['error'] = true;
	            		$data['error_username'] = true;
					}else{
						$this->user_model->edit_user($post, $this->session->userdata('user_id'));
						// send mail
						redirect(site_url('social/setting'));
					}
				}else{
					if ($check_username) {
            			$data['error'] = true;
	            		$data['error_username'] = true;
					}elseif ($check_email) {
            			$data['error'] = true;
	            		$data['error_email'] = true;
					}else{
						$this->user_model->edit_user($post, $this->session->userdata('user_id'));
						// send mail
						redirect(site_url('social/setting'));
					}
				}
			}
		}
		$this->load->view('social/header', $data);
		$this->load->view('social/setting');
		$this->load->view('social/footer');
	}
    
	public function upload()
	{
		$user = $this->user_model->get_user_by_user_id($this->session->userdata('user_id'));
		if ($_FILES['photo']['name']) {
			$config['upload_path'] = './storage/avatar';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1024';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
				
			if ( ! $this->upload->do_upload('photo'))
			{
				$this->session->set_flashdata('error_upload', 'error');
				redirect(site_url('social/setting'));
			}
			else
			{
				if ($user->profile_photo != NULL) {
					$old_pp = 'storage/avatar/' . $user->profile_photo;
					if (!empty($old_pp)) {
						unlink($old_pp);
					}
				}

				$upload_data = $this->upload->data();
				$this->user_model->upload_photo($this->session->userdata('user_id'), $upload_data);

				redirect(site_url('social/setting'));
			}
		}elseif ($_FILES['cover']['name']) {
			$config['upload_path'] = './storage/cover';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
				
			if ( ! $this->upload->do_upload('cover'))
			{
				$this->session->set_flashdata('error_upload', 'error');
				redirect(site_url('social/setting'));
			}
			else
			{
				if ($user->cover_photo != NULL) {
					$old_pp = 'storage/cover/' . $user->cover_photo;
					if (!empty($old_pp)) {
						unlink($old_pp);
					}
				}

				$upload_data = $this->upload->data();
				$this->user_model->upload_cover($this->session->userdata('user_id'), $upload_data);

				redirect(site_url('social/setting'));
			}
		}
	}

	public function password()
	{
		$data['user_id'] = $this->user_model->get_user_by_username($this->session->userdata('username'));
		$data['error'] = false;
		$data['user'] = $this->user_model->get_user_by_user_id($this->session->userdata('user_id'));
		if ($this->input->post()) {
			$post = $this->input->post();
			$this->form_validation->set_rules('opass', 'Old Password', 'required');
			$this->form_validation->set_rules('npass', 'New Password', 'required|min_length[5]');
			$this->form_validation->set_rules('cpass', 'Confirm New Password', 'required|matches[npass]');
			
			$this->form_validation->set_message('required', 'Can not be empty');
			$this->form_validation->set_error_delimiters('<label class="control-label">', '</label>');

			if ($this->form_validation->run() == FALSE) 
			{
            	$data['error'] = true;
			}
			else
			{
				if (sha1($post['opass']) == $data['user']->password) {
					$this->user_model->change_password($this->session->userdata('user_id'), $post);
					
					$this->session->set_flashdata('success', 'success');
					redirect(site_url('social/setting/password'));
				}else{
            		$data['error'] = true;
            		$data['error_opass'] = true;
				}
			}
		}
		$this->load->view('social/header', $data);
		$this->load->view('social/setting_password');
		$this->load->view('social/footer');
	}

	public function email_notification()
	{
		$data['user'] = $this->user_model->get_user_by_user_id($this->session->userdata('user_id'));
		$data['user_id'] = $this->user_model->get_user_by_username($this->session->userdata('username'));
		// if ($this->input->post()) {
		// 	$post = $this->input->post();
		// 	var_dump($post);
		// 	$this->user_model->email_notification($this->session->userdata('user_id'), $post);
		// }
		$this->load->view('social/header', $data);
		$this->load->view('social/email_notification');
		$this->load->view('social/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */