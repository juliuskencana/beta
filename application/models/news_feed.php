<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_feed extends CI_Model {

    public function get_news_feed($social_user_id)
    {
        $this->db->select('*');
        $this->db->from('user_journal_posts');
        $this->db->join('social_user', 'social_user.social_user_id = user_journal_posts.social_user_id');
        $this->db->join('follow', 'follow.social_user_id_following = social_user.social_user_id');
        $this->db->where('follow.social_user_id', $social_user_id);
    	$this->db->or_where('user_journal_posts.social_user_id', $social_user_id); 
        $this->db->order_by("user_journal_posts.user_journal_post_timestamp", "desc");
        // $this->db->limit(1);

        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */