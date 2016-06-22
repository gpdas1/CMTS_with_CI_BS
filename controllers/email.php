<?php
class Email extends CI_Controller {

public function index(){

$this->load->library('email');

$config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'nodemonitorcmts@gmail.com',
    'smtp_pass' => 'cmts1234',
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
);
//$this->load->library('email', $config);
//$this->load->library('email');
$this->email->set_newline("\r\n");

// Set to, from, message, etc.
$this->email->initialize($config);

        $this->email->from('nodemonitorcmts@gmail.com', 'Node Monitor');
        $this->email->to('gpdas.bsnl@gmail.com'); 

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
if (!$this->email->send()) {
    // Raise error message
    show_error($this->email->print_debugger());
	}
else {
    // Show success notification or other things here
    echo 'Success to send email';
	}
}

}
