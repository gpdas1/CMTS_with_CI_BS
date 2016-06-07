<?php
 class Users extends MY_Controller {
//public $data = array();
    public function __construct ()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function logout ()
    {
        $this->ion_auth->logout();
        redirect('users/login');
    }
    /**
     * Login a user and redirect him to questions
     */
    public function login ()
    {
        // redirect if already logged in
        if ($this->ion_auth->logged_in() == TRUE) {
          redirect('welcome/index');
  //         $this->load_view('homepage');
        }
        // Validate the form
        $this->form_validation->set_rules($this->user_model->rule);
        if ($this->form_validation->run() == true) {
            // Try to log in
            if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password')) == TRUE) {
                redirect('welcome/index');
//           $this->load_view('homepage');
            }
            else {
                $this->data['error'] = 'The email or password not correct';
            }
        }
        // Set subview & Load layout
        $this->load_view('login');
//        $this->load->view('../views/users/login');
//        $this->load->view('login');
//die("In users controller");
    }
    public function register ()
    {}
}
