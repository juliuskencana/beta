<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function add_comment($social_user_id, $post)
    {
        $data = array(
           'social_user_id' => $social_user_id,
           'user_comment_type' => $post['ct'],
           'user_comment_post_id' => $post['cpid'],
           'user_comment_content' => $post['comment'],
           'user_comment_timestamp' => date("Y-m-d H:i:s")
        );

        $this->db->insert('comments', $data);
    }

    public function get_comment_count($user_comment_post_id)
    {
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('user_comment_post_id', $user_comment_post_id);
        
        return $this->db->count_all_results();
    }

    public function get_comment_by_journal_id($user_comment_post_id)
    {
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->join('social_user', 'social_user.social_user_id = comments.social_user_id');
        $this->db->where('comments.user_comment_post_id', $user_comment_post_id);
        $this->db->order_by("comments.user_comment_timestamp", "desc");
        // $this->db->limit(1);

        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */