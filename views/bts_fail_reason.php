<h4>BTS Fault Reason Entry</h4>
<?php
//die("BB");
if (!isset($results)){
echo "No BTS Failure at this time";
} else {
?>
<table class="table table-striped table-bordered">
<thead><tr><th>ID</th><th>SSA</th><th>CELL ID</th><th>FAULT TIME</th><th>Sectors</th><th>Reason</th><th>Descriptions</th></tr></thead>
<tbody>
<?php
$options = array(
                  'Z'  => '- Not Known -',
                  'A'  => 'OFC ETR',
                  'B'  => 'OFC SSA',
                  'C'  => 'PCM Error ETR',
                  'D'  => 'PCM Error SSA',
                  'E'  => 'Media Dependency',
                  'M'  => 'Mini-link Fault',
                  'P'  => 'P.F No DG',
                  'Q'  => 'P.F DG Faulty',
                  'R'  => 'P.F DG not run',
                  'S'  => 'P.F No DG Battery',
                  'W'  => 'Power Plant Fault',
                  'T'  => 'Power Dependency',
                  'U'  => 'Elect Board Issue',
                  'V'  => 'Elect Item Fault',
                  'H'  => 'Hardware Fault',
                  'J'  => 'Software Error',
                  'X'  => 'BTY Back up low',
                  'Y'  => 'Land Owner Issue',
                  'I'  => 'Local Issue',
                  'O'  => 'Other',
                );

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
foreach ($results as $result){
?>
<tr>
<td><?= $result['id']; ?></td>
<td><?= $result['ssa']; ?></td>
<td><input name="btsid[]" type="text" size="10" id="btsid" value="<?= $result['xtraid']; ?>" readonly></td>
<td><?= $result['flttime']; ?></td>
<td><input name="cnt" type="text" size="2" id="cnt" value="<?= $result['cnt']; ?>" readonly></td>
<?php
echo "<td>" . form_dropdown('rcode[]', $options1, $result['rcode']) . "</td>";
echo "<td>" . form_input($data, $result['details']). "</td>";
?>
</tr>

<?php } ?>
<?php echo form_submit('submit', 'Update'); ?>
<?php echo form_close(); ?>
</tbody>
</table>
<?php } ?>

