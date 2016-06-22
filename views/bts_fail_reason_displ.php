<h4>BTS Fault Reason Display</h4>
<?php
/*
if (!isset($results)){
echo "No BTS Failure at this time";
} else {
?>
<table class="table table-striped table-bordered">
<thead><tr><th>ID</th><th>SSA</th><th>CELL ID</th><th>FAULT TIME</th><th>Reason</th><th>Descriptions</th></tr></thead>
<tbody>
<?php
$options = array(
                  'small'  => 'Small Shirt',
                  'med'    => 'Medium Shirt',
                  'large'   => 'Large Shirt',
                  'xlarge' => 'Extra Large Shirt',
                );
$data = array(
              'name'        => 'reason[]',
              'id'          => 'reason',
              'maxlength'   => '250',
              'size'        => '50',
              'style'       => 'width:50%',
            );


echo form_open('bts/updatereason'); 
foreach ($results as $result){
?>
<tr>
<td><?= $result['id']; ?></td>
<td><?= $result['xtraid']; ?></td>
<td><?= $result['details']; ?></td>
<?php
echo "</tr>";
?>
<?php } ?>
<?php echo form_submit('submit', 'Update'); ?>
<?php echo form_close(); ?>
</tbody>
</table>
<?php } ?>
*/
