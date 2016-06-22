	<h2 class="h2">CMTS Odisha</h2>
	<h5 class="h5">Authentication Check</h5>

<section class="comment">
        <?php echo validation_errors() ? '<div class="errors">' . validation_errors() . '</div>' : ''; ?>
        <?php echo !empty($error) ? '<div class="errors">' . $error . '</div>' : '';?>
        <?php echo form_open($this->uri->uri_string()); ?>
        <?php echo form_label('Email'); ?>
        <?php echo form_input('email'); ?>
        <?php echo form_label('Password'); ?>
        <?php echo form_password('password'); ?>
        <?php echo form_submit('submit', 'Log in'); ?>
        <?php echo form_close(); ?>
<br />
<a href="users/reset_password"><button type="button" class="btn btn-default">Reset Password</button></a>
</section>
