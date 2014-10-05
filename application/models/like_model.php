<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Like_model extends CI_Model {

    public function add_like($social_user_id, $post)
    {
        $data = array(
           'social_user_id' => $social_user_id,
           'like_module_name' => $post['like_module_name'],
           'like_module_id' => $post['like_module_id']
        );

        $this->db->insert('like', $data);
    }

    public function unlike($social_user_id, $post)
    {
        $data = array(
           'social_user_id' => $social_user_id,
           'like_module_name' => $post['like_module_name'],
           'like_module_id' => $post['like_module_id']
        );

        $this->db->delete('like', $data);
    }

    public function get_like_count($like_module_id)
    {
        $this->db->select('*');
        $this->db->from('like');
        $this->db->where('like_module_id', $like_module_id);
        
        return $this->db->count_all_results();
    }

    public function check_like($like_module_id, $social_user_id)
    {
        $this->db->select('*');
        $this->db->from('like');
        $this->db->where('like_module_id', $like_module_id);
        $this->db->where('social_user_id', $social_user_id);
        
        $query = $this->db->get();
        return $query->row();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */