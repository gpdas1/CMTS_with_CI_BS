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

public $register_rule = array(
               array(
                     'field'   => 'uname',
                     'label'   => 'Full Name',
                     'rules'   => 'trim|required|min_length[5]|max_length[30]|is_unique[users.uname]|xss_clean'
                  ),
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'trim|required|min_length[4]|max_length[12]|xss_clean|matches[passconf]'
                  ),
               array(
                     'field'   => 'passconf',
                     'label'   => 'Password Confirm',
                     'rules'   => 'trim|required|xss_clean'
                  ),
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|valid_email|is_unique[users.email]|xss_clean'
                  ),
		array(
                     'field'   => 'mobile',
                     'label'   => 'Mobile',
                     'rules'   => 'trim|required|exact_length[10]|is_unique[users.mobile]|xss_clean'
                  )

            );


}
