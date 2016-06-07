<?php
class User_model extends CI_Model {

public $rule = array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|trim'),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim'));

public function __construct ()
    {
        parent::__construct();
    }

}
