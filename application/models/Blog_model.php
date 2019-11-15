<?php
class Blog_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function record_count()
    {
        return $this->db->count_all('blog');
    }
    
    public function get_blog($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get_where('blog', array('user_id' => $this->session->userdata('user_id')));
            return $query->result_array(); // $query->result(); // returns object
        }
 
        $query = $this->db->get_where('blog', array('slug' => $slug, 'user_id' => $this->session->userdata('user_id')));
        return $query->row_array(); // $query->row(); // returns object
        
        // $query->num_rows(); // returns number of rows selected, similar to counting rows
        // $query->num_fields(); // returns number of fields selected
    }
        
    public function get_blog_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('blog');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('blog', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_blog($id = 0)
    {
        $this->load->helper('url');
 
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
 
        $data = array(
            'title' => $this->input->post('title'), // $this->db->escape($this->input->post('title'))
            'slug' => $slug,
            'categories' => implode(',', $this->input->post('categories')),
            'description' => $this->input->post('text'),
            'user_id' => $this->input->post('user_id'),
        );
        
        if ($id == 0) {
            return $this->db->insert('blog', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('blog', $data);
        }
    }
    
    public function delete_blog($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('blog');
    }
}