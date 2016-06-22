<h4>BTS Current Failures</h4>No. of Records = <?= $rows_cnt; ?>
<?php
if (!isset($results)){
echo "No BTS Failure at this time";
} else {
?>
<table class="table table-striped table-bordered">
<thead><tr><th>SSA</th><th>BTS ID</th><th>SITE NAME</th><th>FAULT TIME</th><th>DAYS</th><th>Sectors</th><th>Reason</th><th>Remark</th></tr></thead>
<tbody>
<?php
foreach ($results as $result){
?>
<tr>
<td><?= $result['ssa']; ?></td>
<td><?= $result['xtraid']; ?></td>
<td><?= $result['btsname']; ?></td>
<td><?= $result['flttime']; ?></td>
<td><?= $result['days']; ?></td>
<td><?= $result['sector']; ?></td>
<td><?= $result['reason']; ?></td>
<td><?= $result['details']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<?php } ?>
