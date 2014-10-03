<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Model {

	public function send_mail($to, $subject, $msg)
	{
		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);

		$this->email->from('service@gatauapaan.com', 'SOCIAL MEDIA');
		$this->email->to($to); 

		$this->email->subject($subject);
		$this->email->message($msg);	

		$this->email->send();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */