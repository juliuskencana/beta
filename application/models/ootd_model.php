<?php

class Ootd_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    public function upload_ootd($user_id, $upload_data, $post) 
    {
        $data = array(
           'social_user_id' => $user_id,
           'user_journal_post_type' => 'ootd',
           'user_journal_post_content' => $upload_data['file_name'],
           'user_journal_post_description' => $post['description'],
           'user_journal_post_timestamp' => date("Y-m-d H:i:s")
        );

        $this->db->insert('user_journal_posts', $data);
    }

    public function get_ootd_by_user_id($user_id) 
    {
        $this->db->select('*');
        $this->db->from('user_journal_posts');
        $this->db->join('social_user', 'social_user.social_user_id = user_journal_posts.social_user_id');
        $this->db->where('user_journal_posts.social_user_id', $user_id);
        $this->db->where('user_journal_posts.user_journal_post_type', 'ootd');
        $this->db->order_by("user_journal_posts.user_journal_post_timestamp", "desc");
        
        $query = $this->db->get();
        return $query->result();
    }
}