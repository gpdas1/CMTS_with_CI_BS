<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bts extends MY_Controller {

    public function __construct ()
    {
        parent::__construct();
        $this->load->model('bts_model');
    }

	public function btscurrentfail()
	{
	$data['results'] = $this->bts_model->bts_current_fail();
	$this->load->view('layouts/layoutheader');
	$this->load->view('bts_current_fail', $data);
	$this->load->view('layouts/layoutfooter');
	}

        public function btsfailall()
        {
        $data['results'] = $this->bts_model->bts_fail_all();
        $this->load->view('layouts/layoutheader');
        $this->load->view('bts_fail_all', $data);
        $this->load->view('layouts/layoutfooter');
        }

        public function btsfaildistinct()
        {
//        $data['results'] = $this->bts_model->bts_fail_distinct();
        $data = $this->bts_model->bts_fail_distinct();
//        $data = $this->bts_model->bts_fail_distinct(30, $start);
        $this->load->view('layouts/layoutheader');
        $this->load->view('bts_fail_distinct', $data);
        $this->load->view('layouts/layoutfooter');
        }

        public function btsfailreason($ssa)
        {
        $data['results'] = $this->bts_model->btsfailreason($ssa);
        $data['rcodes'] = $this->bts_model->get_rcodes();
        $this->load->view('layouts/layoutheader');
        $this->load->view('bts_fail_reason', $data);
        $this->load->view('layouts/layoutfooter');
        }

 public function modifyreason($id, $rcode, $details)
        {
//        $data['results'] = $this->bts_model->modifyfailreason($id, $rcode, $details);
        $data['rcodes'] = $this->bts_model->get_rcodes();
	$data['para'] = array(
	'id' => $id,
	'rcode' => $rcode,
	'details' => $details
	);
        $this->load->view('layouts/layoutheader');
        $this->load->view('btsReasonModify', $data);
        $this->load->view('layouts/layoutfooter');
        }

 public function modify2greason($ssa)
        {
        $data['results'] = $this->bts_model->modify2greason($ssa);
        $data['rcodes'] = $this->bts_model->get_rcodes();
        $this->load->view('layouts/layoutheader');
        $this->load->view('bts_modify_reason', $data);
        $this->load->view('layouts/layoutfooter');
        }


}//end of class
