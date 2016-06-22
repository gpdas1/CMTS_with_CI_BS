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
        }
        // Validate the form
        $this->form_validation->set_rules($this->user_model->rule);
        if ($this->form_validation->run() == true) {
            // Try to log in
            if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password')) == TRUE) {
                redirect('welcome/index');
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
    {

 $this->form_validation->set_rules($this->user_model->register_rule);
        if ($this->form_validation->run() == true) {
            // Try to log in
//die("Regiser TRUE");
	$additional_data = array(
	'uname' =>$this->input->post('uname'),
	'desig' => $this->input->post('desig'),
	'mobile' => $this->input->post('mobile'),
	'ssa' => $this->input->post('ssa'),
	'dept' => 'BSNL'
	);
		$group = array('2'); // Sets user to admin.
            if ($this->ion_auth->register($identity,$this->input->post('password'), $this->input->post('email'), $additional_data, $group)) {
                redirect('welcome/index');
            }
            else {
                $this->data['error'] = 'There is some Error';
	        $this->load_view('register');
            }
        }

	        $this->load_view('register');
    }

public function reset_password ()
{
//die("In reset_password");
			$this->form_validation->set_rules('email', 'Email Address', 'required');
//die("In reset_password");
			if ($this->form_validation->run() == false) {
//die("In reset_password");
				//setup the input
				$this->data['email'] = array('name'    => 'email',
							 'id'      => 'email',
							);
				//set any errors and display the form
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
//die("In reset_password");
				$this->load->view('auth/forgot_password', $this->data);
			}
			else {
				//run the forgotten password method to email an activation code to the user
				$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));


				if ($forgotten) { //if there were no errors
					$this->session->set_flashdata('message', $this->ion_auth->messages());
//die("In reset_password");
					redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
				}
				else {
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect("auth/forgot_password", 'refresh');
				}
			}
		}

public function reset_pwd()
{
$this->load_view('forgot');
}

}//end of class
