<?php

class User_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    public function check_username($post) 
    {
        $this->db->select('*');
        $this->db->from('social_user');
        $this->db->where('username', $post['username']);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function check_password($password, $password_db) 
    {
        if($password == $password_db)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function check_login($post)
    {
        $check_username = $this->check_username($post);
        if ($check_username->is_activated == 1) 
        {
            $check_password = $this->check_password(sha1($post['password']), $check_username->password);

            if ($check_password == true)
            {
                return $check_username;
            }
            else
            {
                $this->session->set_flashdata('error', 'Error');
                redirect(base_url('social/auth'));
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Error');
            redirect(base_url('social/auth'));
        }
    }

    public function get_user_by_user_id($user_id)
    {
        $this->db->select('*');
        $this->db->from('social_user');
        $this->db->where('social_user_id', $user_id);
        
        $query = $this->db->get();
        return $query->row();
    }
}