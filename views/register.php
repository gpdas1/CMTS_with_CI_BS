

<button type="button" class="btn btn-info">Create User</button>
<br />
<br />
<?php
$data_reg = array(
              'name'        => 'uname',
              'id'          => 'uname',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:30%',
            );
?>
<section class="comment">
        <?php echo validation_errors() ? '<div class="errors">' . validation_errors() . '</div>' : ''; ?>
        <?php echo !empty($error) ? '<div class="errors">' . $error . '</div>' : '';?>
        <?php echo form_open('users/register'); ?>
        <?php echo form_label('Full Name:', 'uname'); ?>
        <?php echo form_input($data_reg); ?>
<br />
<br />
<?php
echo form_label('Designation :');
$options = array(
                  '0'  => '---Select---',
                  'tta'  => 'TTA',
                  'jto'  => 'JTO',
                  'sde'  => 'SDE',
                  'sdot' => 'SDOT',
                  'det'  => 'DET',
                  'agm'  => 'AGM',
                  'dgm'  => 'DGM',
                  'gm'   => 'GM',
                );

echo form_dropdown('desig', $options);
?>
<br />
<br />
<?php
echo form_label('Select SSA :');
$options1 = array(
                  '0'  => '--Select--',
                  '1'  => 'Balasore',
                  '2'  => 'Baripada',
                  '3'  => 'Berhampur',
                  '4' => 'Bhawanipatna',
                  '5'  => 'Bhubaneswar',
                  '6'  => 'Bolangir',
                  '7'  => 'Cuttack',
                  '8'   => 'Dhenkanal',
                  '9'   => 'Keonjhar',
                  '10'   => 'Koraput',
                  '11'   => 'Phulbani',
                  '12'   => 'Rourkela',
                  '13'   => 'Sambalpur',
                  '14'   => 'Circle',
                );

//$shirts_on_sale = array('small', 'large');

echo form_dropdown('ssa', $options1);
?>

<br />
<br />

        <?php echo form_label('Email:', 'email'); ?>
        <?php echo form_input('email'); ?>
<br />
<br />
        <?php echo form_label('Password:'); ?>
        <?php echo form_password('password'); ?>
<br />
<br />
        <?php echo form_label('Password Confirm:'); ?>
        <?php echo form_password('passconf'); ?>
<br />
<br />

        <?php echo form_label('Mobile:', 'mobile'); ?>
        <?php echo form_input('mobile'); ?>
<br />
<br />

        <?php echo form_submit('submit', 'Create'); ?>
        <?php echo form_close(); ?>
<br />
</section>
