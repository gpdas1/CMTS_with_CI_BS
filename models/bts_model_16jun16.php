<?php
class Bts_model extends CI_Model {

public function __construct ()
    {
        parent::__construct();
    }

public function bts_current_fail()
{
$this->db->where('status', 0)->order_by('flttime', 'asc')->limit(10, 10);
$query = $this->db->get('btsfail');
return $query->result_array();
}

public function btsfaildetails()
{
//$this->db->distinct('xtraid');
//$this->db->order_by('flttime', 'asc')->limit(20, 0);
$query = $this->db->query('SELECT DISTINCT(xtraid), ssa, btsname, flttime, days FROM `vbtsfaildetail` order by days DESC limit 10, 20');
//$query = $this->db->get('vbtsfaildetails');
return $query->result_array();
}

public function get_rcodes()
{
//$this->db->distinct('xtraid');
//$this->db->order_by('flttime', 'asc')->limit(20, 0);
//$query = $this->db->query('SELECT DISTINCT(xtraid), ssa, btsname, flttime, days FROM `vbtsfaildetail` order by days DESC $
$query = $this->db->get('reasoncode');
return $query->result_array();
}

public function btsfailreason($ssa)
{
$sql="create temporary table reasonentry(id int(11), btsid varchar(50), xtraid varchar(50), btsname varchar(100), make varchar(1), ssa varchar(3), flttime timestamp, days int(4), rcode varchar(2), details varchar(250))";
$this->db->query($sql);
$sql="insert into reasonentry (id, btsid, flttime, make) (select id, btsid, flttime, make from btsfail where status=0)";
$this->db->query($sql);
$sql="update reasonentry a, btsmap2g b set a.xtraid=b.xtraid where a.btsid = b.btsid";
$this->db->query($sql);
$sql="update reasonentry a, btsdata b set a.ssa=b.ssa, a.btsname=b.btsname where a.xtraid = b.xtraid and b.ssa='$ssa'";
$this->db->query($sql);
//$sql="delete from reasonentry where ssa != 'DKL'";
//$this->db->query($sql);

$sql="create temporary table reasonentry1(id int(11), btsid varchar(50), xtraid varchar(50), btsname varchar(100), make varchar(1), ssa varchar(3), flttime timestamp, days int(4), rcode varchar(2), details varchar(250))";
$this->db->query($sql);
//$sql="insert into reasonentry1 (id, btsid, flttime, make) (select id, btsid, flttime, make from btsfail where status=0)";

$sql="insert into reasonentry1 (xtraid) (select distinct(xtraid) from reasonentry)";
$this->db->query($sql);
$sql="update reasonentry1 a, reasonentry b set a.id = b.id, a.ssa=b.ssa, a.btsname=b.btsname where a.xtraid = b.xtraid";
$this->db->query($sql);
$sql="delete from reasonentry1 where ssa is null";
$this->db->query($sql);
if(isset($_POST['reason'])){
$j = sizeof($_POST['reason']);
$btsid = $_POST['btsid'];
$reason = $_POST['reason'];
$rcode = $_POST['rcode'];
for($i=0; $i < $j; $i++){
$btsarr[] = array(
'xtraid' => $btsid[$i],
'details' => $reason[$i],
'rcode' => $rcode[$i]
);
}
$this->db->update_batch('reasonentry', $btsarr, 'xtraid');
$sql="insert into reasontable (btsfail_id, rcode, details)(select id, rcode, details from reasonentry)";
$this->db->query($sql);
}

$query = $this->db->get('reasonentry1');
return $query->result_array();
}

public function btsreasonupdate(){
//var_dump($_POST['reason']);//
//var_dump($_POST['btsid']);
$reason = $_POST['reason'];
$btsid = $_POST['btsid'];
//$btsarr = [];
//$i = 0;
//$j = sizeof($_POST['btsid']);
$j = count($btsid);
//echo "$btsid[1]";
//foreach($btsid as $xtraid){
//echo "j=" . $j;
//die();
for($i=0; $i < $j; $i++){
$btsarr[] = array(
'xtraid' => $btsid[$i],
'details' => $reason[$i]
);
}
$this->db->update_batch('reasonentry', $btsarr, 'xtraid');
$query = $this->db->get('reasonentry');
return $query->result_array();
}

}// end of class
