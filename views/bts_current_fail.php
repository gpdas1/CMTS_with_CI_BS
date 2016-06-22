<h4>BTS Current Failures</h4>
<?php
if (!isset($results)){
echo "No BTS Failure at this time";
} else {
?>
<table class="table table-striped table-bordered">
<thead><tr><th>CELL ID</th><th>FAULT TIME</th></tr></thead>
<tbody>
<?php
foreach ($results as $result){
?>
<tr><td><?= $result['btsid']; ?></td><td><?= $result['flttime']; ?></td></tr>
<?php } ?>
</tbody>
</table>
<?php } ?>

