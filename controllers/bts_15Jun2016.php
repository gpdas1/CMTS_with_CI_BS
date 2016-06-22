
<?php
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

        public function btsfaildetails()
        {
        $data['results'] = $this->bts_model->btsfaildetails();
        $this->load->view('layouts/layoutheader');
        $this->load->view('bts_fail_details', $data);
        $this->load->view('layouts/layoutfooter');
        }

        public function btsfailreason($ssa)
        {
        $data['results'] = $this->bts_model->btsfailreason($ssa);
        $this->load->view('layouts/layoutheader');
        $this->load->view('bts_fail_reason', $data);
        $this->load->view('layouts/layoutfooter');
        }

        public function updatereason()
        {
        $data['results'] = $this->bts_model->btsreasonupdate();
        $data['rcodes'] = $this->bts_model->get_rcodes();
//var_dump($_POST['reason']);//
//var_dump($_POST['btsid']);

        $this->load->view('layouts/layoutheader');
        $this->load->view('bts_fail_reason_displ', $data);
        $this->load->view('layouts/layoutfooter');

	}


}//end of class
