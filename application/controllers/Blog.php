<?php
class Blog extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->model('category_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('pagination');
    }
 
    public function index()
    {
        $data['blog'] = $this->blog_model->get_blog();
        $data['title'] = 'Your Blog';
 
        $this->load->view('templates/header', $data);
        $this->load->view('blog/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($slug = NULL)
    {
        $data['blog_item'] = $this->blog_model->get_blog($slug);
        
        if (empty($data['blog_item'])) {
            show_404();
        }
 
        $data['title'] = $data['blog_item']['title'];
 
        $this->load->view('templates/header', $data);
        $this->load->view('blog/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('user/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $data['title'] = 'Create a blog item';
 
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('categories[]', 'Select Categories', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        $data['category_item'] = $this->category_model->get_category();
        
        if (empty($data['category_item'])) {
            show_404();
        }
 
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('blog/create');
            $this->load->view('templates/footer');
        } else {            
            $this->session->set_flashdata('msg_success','Blog created Successfully!');
            redirect( site_url('blog') );
        }
    }
    
    public function edit()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('user/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        
        $id = $this->uri->segment(3);
        
        if (empty($id)) {
            show_404();
        }        
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Edit a blog item';        
        $data['blog_item'] = $this->blog_model->get_blog_by_id($id);
        
        if ($data['blog_item']['user_id'] != $this->session->userdata('user_id')) {
            $currentClass = $this->router->fetch_class(); // class = controller
            redirect(site_url($currentClass));
        }
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        // $this->form_validation->set_rules('categories[]', 'Select Categories', 'required|callback_check_default');
        $this->form_validation->set_rules('text', 'Text', 'required');

        $data['category_item'] = $this->category_model->get_category();
 
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('blog/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->blog_model->set_blog($id);
            $this->session->set_flashdata('msg_success','Blog updated Successfully!');
            redirect( site_url('blog') );
        }
    }

    public function check_default($array)
    {
        $arr_course = $this->input->post('categories');
        if(empty($arr_course)):
            $this->form_validation->set_rules('categories','Select at least one Category');
            return false;
        endif;
    }
    
    public function delete()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('user/login'));
        }
        
        $id = $this->uri->segment(3);
        
        if (empty($id)) {
            show_404();
        }
                
        $blog_item = $this->blog_model->get_blog_by_id($id);
        
        if ($blog_item['user_id'] != $this->session->userdata('user_id')) {
            $currentClass = $this->router->fetch_class(); // class = controller
            redirect(site_url($currentClass));
        }
        
        $this->blog_model->delete_blog($id);        
        redirect( base_url() . 'blog');        
    }
}