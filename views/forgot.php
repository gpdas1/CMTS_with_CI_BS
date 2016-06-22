

<button type="button" class="btn btn-info">Password Reset</button>
<br />
<br />
<section class="comment">
        <?php echo validation_errors() ? '<div class="errors">' . validation_errors() . '</div>' : ''; ?>
        <?php echo !empty($error) ? '<div class="errors">' . $error . '</div>' : '';?>
        <?php echo form_open('users/reset_password'); ?>
        <?php echo form_label('Email:', 'email'); ?>
        <?php echo form_input('email'); ?>
<br />
<br />

        <?php echo form_submit('submit', 'Submit'); ?>
        <?php echo form_close(); ?>
<br />
</section>
