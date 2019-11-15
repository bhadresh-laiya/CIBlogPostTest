<?php
class Category_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function record_count()
    {
        return $this->db->count_all('category');
    }
    
    public function get_category($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('category');
            return $query->result_array(); // $query->result(); // returns object
        }
 
        $query = $this->db->get_where('category', array('slug' => $slug));
        return $query->row_array(); // $query->row(); // returns object
    }
        
    public function get_category_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('category');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('category', array('id' => $id));
        return $query->row_array();
    }
}