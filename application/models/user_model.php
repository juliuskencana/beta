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

    public function check_username_s($post) 
    {
        $this->db->select('*');
        $this->db->from('social_user');
        $this->db->where('username', $post['username_s']);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function check_email_s($post) 
    {
        $this->db->select('*');
        $this->db->from('social_user');
        $this->db->where('email', $post['email_s']);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function check_email($post) 
    {
        $this->db->select('*');
        $this->db->from('social_user');
        $this->db->where('email', $post['email']);
        
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
            $this->session->set_flashdata('error_activated', 'Error');
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

    public function get_user_by_username($username)
    {
        $this->db->select('*');
        $this->db->from('social_user');
        $this->db->where('username', $username);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function signup($post) 
    {
        $data = array(
           'username' => $post['username_s'],
           'full_name' => $post['fullname_s'],
           'email' => $post['email_s'],
           'password' => sha1($post['password_s']),
           'gender' => $post['gender_s'],
           'create_date' => date("Y-m-d"),
           'is_activated' => 0,
           'activation_hash' => sha1($post['email_s'] . '-' . date("Y-m-d H:i:s"))
        );

        $this->db->insert('social_user', $data);
    }

    public function activating_member($hash) 
    {
        $data = array(
           'is_activated' => 1
        );

        $this->db->where('activation_hash', $hash);
        $this->db->update('social_user', $data);
    }

    public function upload_photo($user_id, $upload_data) 
    {
        $data = array(
           'profile_photo' => $upload_data['file_name']
        );

        $this->db->where('social_user_id', $user_id);
        $this->db->update('social_user', $data);
    }

    public function upload_cover($user_id, $upload_data) 
    {
        $data = array(
           'cover_photo' => $upload_data['file_name']
        );

        $this->db->where('social_user_id', $user_id);
        $this->db->update('social_user', $data);
    }

    public function edit_user($post, $user_id) 
    {
        $data = array(
           'username' => $post['username'],
           'full_name' => $post['name'],
           'email' => $post['email'],
           'country' => $post['country'],
           'gender' => $post['gender'],
           'city' => $post['city'],
           'website' => $post['website'],
           'facebook' => $post['facebook'],
           'twitter' => $post['twitter'],
           'quote' => $post['quote']
        );

        $this->db->where('social_user_id', $user_id);
        $this->db->update('social_user', $data);
    }

    public function change_password($user_id, $post) 
    {
        $data = array(
           'password' => sha1($post['npass'])
        );

        $this->db->where('social_user_id', $user_id);
        $this->db->update('social_user', $data);
    }

    // public function email_notification($user_id, $post) 
    // {
    //     $data = array(
    //        'like' => $post['like'],
    //        'share' => $post['share'],
    //        'comment' => $post['comment'],
    //        'mention' => $post['mention'],
    //        'followed_by_someone' => $post[''],
    //        'message' => $post['message'],
    //     );

    //     $this->db->where('social_user_id', $user_id);
    //     $this->db->update('email_notification', $data);
    // }

    public function get_who_to_follow($user_id) 
    {
        $this->db->select('*');
        $this->db->from('social_user');
        $this->db->where('social_user_id !=', $user_id);
        $this->db->order_by("social_user_id", "random");
        $this->db->limit(5);
        
        $query = $this->db->get();
        return $query->result();
    }

    public function get_count_follower($user_id) {
        $this->db->select('*');
        $this->db->from('follow');
        $this->db->where('social_user_id_following', $user_id);
        
        return $this->db->count_all_results();
    }

    public function get_count_following($user_id) {
        $this->db->select('*');
        $this->db->from('follow');
        $this->db->where('social_user_id', $user_id);
        
        return $this->db->count_all_results();
    }

    public function follow($user_id, $user_id_following) 
    {
        $data = array(
           'social_user_id' => $user_id,
           'social_user_id_following' => $user_id_following,
        );

        $this->db->insert('follow', $data);
    }

    public function unfollow($user_id, $user_id_following) 
    {
        $data = array(
           'social_user_id' => $user_id,
           'social_user_id_following' => $user_id_following,
        );

        $this->db->delete('follow', $data); 
    }

    public function check_following($user_id, $user_id_following) 
    {
        $this->db->select('*');
        $this->db->from('follow');
        $this->db->where('social_user_id', $user_id);
        $this->db->where('social_user_id_following', $user_id_following);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function get_follower($user_id) 
    {
        $this->db->select('*');
        $this->db->from('follow');
        $this->db->join('social_user', 'social_user.social_user_id = follow.social_user_id');
        $this->db->where('follow.social_user_id_following', $user_id);
        
        $query = $this->db->get();
        return $query->result();
    }

    public function get_following($user_id) 
    {
        $this->db->select('*');
        $this->db->from('follow');
        $this->db->join('social_user', 'social_user.social_user_id = follow.social_user_id_following');
        $this->db->where('follow.social_user_id', $user_id);
        
        $query = $this->db->get();
        return $query->result();
    }
}