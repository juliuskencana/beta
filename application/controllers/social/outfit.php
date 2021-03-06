<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outfit extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect(site_url());
		}

		$this->load->model('user_model');
		$this->load->model('like_model');
		$this->load->model('ootd_model');
		$this->load->model('comment_model');
    }
    
	public function index($username)
	{
		$data['user'] = $this->user_model->get_user_by_user_id($this->session->userdata('user_id'));
		$data['user_id'] = $this->user_model->get_user_by_username($username);
		$data['ootd'] = $this->ootd_model->get_ootd_by_user_id($data['user_id']->social_user_id);
		if (isset($_FILES['photo']['name'])) {
			$post = $this->input->post();
			$config['upload_path'] = './storage/ootd';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
				
			if ( ! $this->upload->do_upload('photo'))
			{
				$this->session->set_flashdata('error_upload', 'error');
				redirect(site_url('social/outfit/'.$username));
			}
			else
			{
				$upload_data = $this->upload->data();
				$this->ootd_model->upload_ootd($this->session->userdata('user_id'), $upload_data, $post);

				redirect(site_url('social/outfit/'.$username));
			}
		}
		$this->load->view('social/header', $data);
		$this->load->view('social/outfit');
		$this->load->view('social/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */