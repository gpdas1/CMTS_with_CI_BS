<?php
$sql="create temporary table reasonentry(id int(11), btsid varchar(50), xtraid varchar(50), btsname varchar(100), make varchar(1), ssa varchar(3), cnt int(2))";
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

$sql="create temporary table reasonentry1(id int(11), btsid varchar(50), xtraid varchar(50), btsname varchar(100), make varchar(1), ssa varchar(3))";
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
$records = $this->db->get('reasonentry');
foreach($records as $record){
$modarr[] = array(
'btsfail_id' => $record['id'],
'rcode' => $record['rcode'],
'details' => $record['details']
);
}//end of foreach
$this->db->update_batch('reasontable', $modarr, 'btsfail_id');
/*
$sql="update reasonentry a, reasontable b set a.make='Y' where a.id=b.btsfail_id";
$this->db->query($sql);
$sql="delete from reasonentry where make='Y'";
$this->db->query($sql);
$sql="insert into reasontable (btsfail_id, rcode, details)(select id, rcode, details from reasonentry)";
$this->db->query($sql);
*/
$_POST['btsid']="";
$_POST['reason']="";
$_POST['rcode']="";

//}
$query = $this->db->get('reasonentry1');
return $query->result_array();
}

