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

public function bts_fail_all()
{
$sql="create temporary table fail2gall(id int(11), btsid varchar(50), xtraid varchar(50), btsname varchar(100), ssa varchar(10), owner varchar(5), flttime timestamp DEFAULT 0, sector int(1), days int(4), reason varchar(50), details varchar(250))"; 
$this->db->query($sql);
$sql="insert into fail2gall(id, ssa, xtraid, btsid, btsname, owner, flttime, days) (select id, ssa, xtraid, btsid, btsname, owner, flttime, days from v2gdetails)";
$this->db->query($sql);
$sql="update fail2gall a, v2gsector b set a.sector=b.sector where a.xtraid=b.xtraid";
$this->db->query($sql);
$sql="update fail2gall a, reasontable b set a.reason=b.rcode, a.details=b.details where a.id=b.btsfail_id";
$this->db->query($sql);

$query = $this->db->get('fail2gall');
return $query->result_array();
}

public function bts_fail_distinct()
{
$user = $this->ion_auth->user()->row();
$ssa = $user->ssa;
$sql="create temporary table fail2gdistinct(id int(11), btsid varchar(50), xtraid varchar(50), btsname varchar(100), ssa varchar(10), owner varchar(5), flttime timestamp, sector int(1), days int(4), reason varchar(50), details varchar(250))"; 
$this->db->query($sql);
$sql="ALTER TABLE fail2gdistinct MODIFY flttime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
$this->db->query($sql);
$sql="insert into fail2gdistinct(id, ssa, xtraid, btsid, btsname, owner, flttime, days) (select id, ssa, xtraid, btsid, btsname, owner, flttime, days from v2gdetails)";
$this->db->query($sql);
$sql="update fail2gdistinct a, v2gsector b set a.sector=b.sector where a.xtraid=b.xtraid";
$this->db->query($sql);
$sql="update fail2gdistinct a, reasontable b set a.reason=b.rcode, a.details=b.details where a.id=b.btsfail_id";
$this->db->query($sql);
$sql="create temporary table fail2gdistinct1(id int(11), btsid varchar(50), xtraid varchar(50), btsname varchar(100), ssa varchar(10), owner varchar(5), flttime timestamp, sector int(1), days int(4), reason varchar(50), details varchar(250))"; 
$this->db->query($sql);
$sql="ALTER TABLE fail2gdistinct1 MODIFY flttime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
$this->db->query($sql);
$sql="insert into fail2gdistinct1(xtraid) (select distinct(xtraid) from fail2gdistinct)";
$this->db->query($sql);
$sql="update fail2gdistinct1 a, fail2gdistinct b set a.id=b.id, a.ssa=b.ssa, a.btsid=b.btsid, a.btsname=b.btsname, a.owner=b.owner, a.flttime=b.flttime, a.days=b.days, a.sector=b.sector, a.reason=b.reason, a.details=b.details where a.xtraid=b.xtraid";
$this->db->query($sql);
$sql="update fail2gdistinct1 a, reasoncode b set a.reason=b.description where a.reason=b.failcode";
$this->db->query($sql);
if($ssa == 'CIR'){
$query = $this->db->get('fail2gdistinct1');
//return $query->result_array();
//$tbldata['results'] =  $query->result_array();
$tbldata['rows_cnt'] =  $query->num_rows();
//$query = $this->db->get('fail2gdistinct1', $num, $start);
$tbldata['results'] =  $query->result_array();
//var_dump(('tempdb..fail2gdistinct'));
}
else
{
$query = $this->db->get_where('fail2gdistinct1', array('ssa' => $ssa));
$tbldata['rows_cnt'] =  $query->num_rows();
$tbldata['results'] =  $query->result_array();
}
return $tbldata;
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
$sql="create temporary table reasonentry(id int(11), btsid varchar(50), xtraid varchar(50), btsname varchar(100), make varchar(1), ssa varchar(3), cnt int(2), flttime timestamp, days int(4), rcode varchar(2), details varchar(250))";
$this->db->query($sql);
$sql="insert into reasonentry (id, btsid, flttime, make) (select id, btsid, flttime, make from btsfail where status=0)";
$this->db->query($sql);
$sql="update reasonentry a, btsmap2g b set a.xtraid=b.xtraid where a.btsid = b.btsid";
$this->db->query($sql);
$sql="update reasonentry a, btsdata b set a.ssa=b.ssa, a.btsname=b.btsname where a.xtraid = b.xtraid and b.ssa='$ssa'";
$this->db->query($sql);
$sql="delete from reasonentry where ssa is null";
$this->db->query($sql);

$sql="create temporary table reasonentry2(cnt int(2), xtraid varchar(50))";
$this->db->query($sql);
$sql="insert into reasonentry2 (xtraid, cnt) (select xtraid, count(xtraid) as cnt from reasonentry group by xtraid)";
$this->db->query($sql);
//$sql="update reasonentry1 a, reasonentry2 b set a.cnt=b.cnt where a.xtraid=b.xtraid";
//$this->db->query($sql);
//$sql="delete from reasonentry where ssa != 'DKL'";
//$this->db->query($sql);

$sql="create temporary table reasonentry1(id int(11), btsid varchar(50), xtraid varchar(50), btsname varchar(100), make varchar(1), ssa varchar(3), cnt int(2), flttime timestamp, days int(4), rcode varchar(2), details varchar(250))";
$this->db->query($sql);
//$sql="insert into reasonentry1 (id, btsid, flttime, make) (select id, btsid, flttime, make from btsfail where status=0)";

$sql="insert into reasonentry1 (xtraid) (select distinct(xtraid) from reasonentry)";
$this->db->query($sql);
$sql="update reasonentry1 a, reasonentry b set a.id = b.id, a.ssa=b.ssa, a.btsname=b.btsname where a.xtraid = b.xtraid";
$this->db->query($sql);
$sql="update reasonentry1 a, reasonentry2 b set a.cnt=b.cnt where a.xtraid=b.xtraid";
$this->db->query($sql);
$sql="update reasonentry1 a, reasontable b set a.rcode=b.rcode, a.details=b.details where a.id=b.btsfail_id";
$this->db->query($sql);
$sql="delete from reasonentry1 where ssa is null or rcode <> 'Z'";
$this->db->query($sql);
if(isset($_POST['reason'])){
$j = sizeof($_POST['reason']);
$btsid = $_POST['btsid'];
$reason = $_POST['reason'];
$rcode = $_POST['rcode'];
for($i=0; $i < $j; $i++){
if($rcode[$i] !== 'Z'){
$btsarr[] = array(
'xtraid' => $btsid[$i],
'details' => $reason[$i],
'rcode' => $rcode[$i]
);
}//end of IF
}// end of FOR
$this->db->update_batch('reasonentry', $btsarr, 'xtraid');
$sql="delete from reasonentry where rcode = 'Z' or rcode is null";
$this->db->query($sql);
$sql="update reasonentry a, reasontable b set a.make='Y' where a.id=b.btsfail_id";
$this->db->query($sql);
$sql="delete from reasonentry where make='Y'";
$this->db->query($sql);
$sql="insert into reasontable (btsfail_id, rcode, details)(select id, rcode, details from reasonentry)";
$this->db->query($sql);
$_POST['btsid']="";
$_POST['reason']="";
$_POST['rcode']="";

}
$query = $this->db->get('reasonentry1');
return $query->result_array();
}

public function modify2greason($ssa)
{
$sql="create temporary table reasonentry(id int(11), btsid varchar(50), xtraid varchar(50), btsname varchar(100), make varchar(1), ssa varchar(3), cnt int(2), flttime timestamp, days int(4), rcode varchar(2), details varchar(250))";
$this->db->query($sql);
$sql="insert into reasonentry (id, btsid, flttime, make) (select id, btsid, flttime, make from btsfail where status=0)";
$this->db->query($sql);
$sql="update reasonentry a, btsmap2g b set a.xtraid=b.xtraid where a.btsid = b.btsid";
$this->db->query($sql);
$sql="update reasonentry a, btsdata b set a.ssa=b.ssa, a.btsname=b.btsname where a.xtraid = b.xtraid and b.ssa='$ssa'";
$this->db->query($sql);
$sql="delete from reasonentry where ssa is null";
$this->db->query($sql);

$sql="create temporary table reasonentry2(cnt int(2), xtraid varchar(50))";
$this->db->query($sql);
$sql="insert into reasonentry2 (xtraid, cnt) (select xtraid, count(xtraid) as cnt from reasonentry group by xtraid)";
$this->db->query($sql);

$sql="create temporary table reasonentry1(id int(11), btsid varchar(50), xtraid varchar(50), btsname varchar(100), make varchar(1), ssa varchar(3), cnt int(2), flttime timestamp, days int(4), rcode varchar(2), details varchar(250))";
$this->db->query($sql);
$sql="insert into reasonentry1 (xtraid) (select distinct(xtraid) from reasonentry)";
$this->db->query($sql);
$sql="update reasonentry1 a, reasonentry b set a.id = b.id, a.ssa=b.ssa, a.btsname=b.btsname where a.xtraid = b.xtraid";
$this->db->query($sql);
$sql="update reasonentry1 a, reasonentry2 b set a.cnt=b.cnt where a.xtraid=b.xtraid";
$this->db->query($sql);
$sql="update reasonentry1 a, reasontable b set a.rcode=b.rcode, a.details=b.details where a.id=b.btsfail_id";
$this->db->query($sql);
$sql="delete from reasonentry1 where ssa is null or rcode = 'Z' or rcode is null";
$this->db->query($sql);
//die("xxx");

if(isset($_POST['reason'])){
$j = sizeof($_POST['reason']);
$btsid = $_POST['btsid'];
$reason = $_POST['reason'];
$rcode = $_POST['rcode'];
for($i=0; $i < $j; $i++){
if($rcode[$i] !== 'Z'){
$btsarr[] = array(
'xtraid' => $btsid[$i],
'details' => $reason[$i],
'rcode' => $rcode[$i]
);
}//end of IF
}// end of FOR
//var_dump($btsarr);

$this->db->update_batch('reasonentry', $btsarr, 'xtraid');
$sql="delete from reasonentry where rcode = 'Z' or rcode is null";
$this->db->query($sql);
$query = $this->db->get('reasonentry');
$records = $query->result_array();
//var_dump($records);
foreach($records as $record){
$modarr[] = array(
'btsfail_id' => $record['id'],
'rcode' => $record['rcode'],
'details' => $record['details']
);
}//end of foreach

$this->db->update_batch('reasontable', $modarr, 'btsfail_id');
$_POST['btsid']="";
$_POST['reason']="";
$_POST['rcode']="";
}//End of IF POST exists
$query = $this->db->get('reasonentry1');
return $query->result_array();
}




public function modifyfailreason($id, $rcode, $details){
$details = urldecode($details);
$data = array(
               'rcode' => $rcode,
               'details' => $details
            );

$this->db->where('btsfail_id', $id);
$this->db->update('reasontable', $data);

}


}// end of class
