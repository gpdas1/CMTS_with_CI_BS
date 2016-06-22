<h4>BTS Fault Reason Modify</h4>
<table class="table table-striped table-bordered">
<thead><tr><th>ID</th><th>SSA</th><th>CELL ID</th><th>FAULT TIME</th><th>Sectors</th><th>Reason</th><th>Descriptions</th></tr></thead>
<tbody>
<?php

$data = array(
              'name'        => 'reason[]',
              'id'          => 'reason',
              'maxlength'   => '250',
              'size'        => '50',
              'style'       => 'width:50%',
            );
foreach($rcodes as $rcode1){
$options1[$rcode1['failcode']] = $rcode1['description'];
}
echo form_open(); 
?>
<tr>
<td><?= $para['id']; ?></td>
<td><?= $para['rcode']; ?></td>
<td><input name="rcode" type="text" size="10" id="rcode" value="<?= $para['rcode']; ?>" </td>
<td><input name="details" type="text" size="10" id="details" value="<?= $para['details']; ?>" </td>
<td><a href="<?= site_url(); ?>bts/modifyreason/<?php echo $result['id']; ?>/<?php echo $result['rcode']; ?>/<?= $result['details']; ?>">modify</a></td>
</tr>

<?php echo form_submit('submit', 'Update'); ?>
<?php echo form_close(); ?>
</tbody>
</table>
<?php } ?>

