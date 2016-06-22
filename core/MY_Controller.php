<?php
class MY_Controller extends CI_Controller {
public $data = array();
  //  public $parser;

function __construct ()
    {
        parent::__construct();

        // Check authentication
//        $no_redirect = array('users/login', 'users/register', 'users/reset_password', 'users/reset_pwd', 'auth/login');
        $no_redirect = array('auth/login');
        if ($this->ion_auth->logged_in() == false && ! in_array($this->uri->uri_string(), $no_redirect)) {
            redirect('auth/login');
        }
        $this->output->enable_profiler(ENVIRONMENT == 'development');
  }
    /**
     * Set subview and load layout
     * @param string $subview
     */
    public function load_view ($subview)
    {
        $this->data['subview'] = $subview;

        $this->load->view('layouts/layout', $this->data);
//        $this->load->view('login', $this->data);
    }
}
