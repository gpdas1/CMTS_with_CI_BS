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
<table>
<tr>
<td style="width:10%; font-size:1em; background-color:black; color:#FFF; height:40px">CMTS Odisha</td>
<td style="width:60%; font-size:2.5em; background-color:black; color:#FFF; height:40px; text-align:center">Node Monitor</td>
<td style="width:30%; font-size:1em; background-color:black; color:#FFF; height:40px">
 <ul class="nav">
                        <li><a href="">Home</a></li>
                        <li><a href="">Get PUK</a></li>
                        <li><a href="">Feedback</a></li>
                        <li><?php echo $this->ion_auth->logged_in() == true ? anchor('users/logout', 'Logout') :
anchor('users/login', 'Login') ?></li>
                </ul>

</td>
</tr>
</table>
<div class="sidebar">
</div>
New User?<br />
Register
	<div class="main">
		<?php $this->load->view($subview); ?>
	</div>
	<footer>
          <small>&copy; <?php echo date('Y'); ?> GP Das</small>
	</footer>
</body>
</html>
