<!DOCTYPE html>
<html> <head>
    <meta charset="utf-8">
    <title>CMTS Odisha</title>
    
    <link rel="stylesheet" href="../assets/css/mystyle2016.css" type="text/css" />
    
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<table class="header">
<!-- <tr><td width="10%"><img src="../assets/images/bsnlLogo1.jpg" /></td><td class="headertd">Node Monitor</td><td width="30%">yyy</td></tr> -->
<!-- <tr><td><img src="../assets/images/bsnlLogo1.jpg" /><font size="40px">Node Monitor</font></td></tr> -->
</table>
<div class="container">
	<header class="highlight">
		<h1>Welcome to CMTS Odisha Portal</a></h1>
		<ul class="nav">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="<?php echo site_url('questions/listing'); ?>">Questions</a></li>
			<li><?php echo $this->ion_auth->logged_in() == true ? anchor('users/logout', 'Logout') : 
anchor('users/login', 'Login') ?></li>
		</ul>
	</header>
	<div class="main">
		<?php $this->load->view($subview); ?>
	</div>
	<footer>
		&copy; <?php echo date('Y'); ?> AskAway
	</footer> </div> </body>
</html>
