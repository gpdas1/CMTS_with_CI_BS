<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CMTS Odisha</title>

    <!-- Bootstrap -->
    <link href="<?= site_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
.errors {
    padding: 10px 20px;
    color: #f00;
    border: 1px dashed #f00;
    margin-bottom: 20px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    background: #FCE8E8
    }

.navbar-brand {
  padding: 0px;
}
.navbar-brand>img {
  height: 100%;
  padding: 15px;
  width: auto;
}
.gp_section {
background:#B3F0FF;
}
.table th {
   text-align: center;
}
.table {
  border: 0.5px solid brown;
}
.table-bordered td, .table-bordered th{
    border-color: brown !important;
}
    </style>
  </head>
  <body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>

	<a class="navbar-brand" href="#"><img src="<?= site_url(); ?>assets/images/nodemonitor.png" alt="Node Monitor"></a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="active"><a href="#">Get PUK</a></li>
<?php if($this->ion_auth->logged_in() == true): ?>
        <li class="active dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">GSM
           <span class="caret"></span></a>
           <ul class="dropdown-menu">
           <li><a href="<?= site_url(); ?>bts/btscurrentfail">BTS Current Failures</a></li>
           <li><a href="<?= site_url(); ?>bts/btsfailhours">BTS Failures &gt Hour</a></li>
           <li><a href="<?= site_url(); ?>bts/btsfaildefineddate">BTS Failures btn defined dates</a></li>
           <li><a href="<?= site_url(); ?>bts/btsfailsummary">BTS Failure Summary</a></li>
           <li><a href="<?= site_url(); ?>bts/exportmulti">Export BTS Multiple Failures</a></li>
           <li><a href="<?= site_url(); ?>bts/btsfailduration">Export BTS Fail Durations</a></li>
           <li><a href="<?= site_url(); ?>bts/btsfailparticular">Particular BTS Fail History</a></li>
           <li><a href="<?= site_url(); ?>bts/btsfailreason">Enter BTS Fail Reason</a></li>
           <li><a href="<?= site_url(); ?>bts/modify2greason">Modify BTS Fail Reason</a></li>
           <li><a href="<?= site_url(); ?>bts/btsavailability">BTS-wise availability</a></li>
           <li><a href="<?= site_url(); ?>bts/ssaavailability">SSA-wise availability</a></li>
           </ul>
	</li> 
        <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Node-B
           <span class="caret"></span></a>
           <ul class="dropdown-menu">
           <li><a href="#">Page 1-1</a></li>
           <li><a href="#">Page 1-2</a></li>
           <li><a href="#">Page 1-3</a></li> 
           </ul>
	</li> 
	 <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sales
           <span class="caret"></span></a>
           <ul class="dropdown-menu">
           <li><a href="#">Page 1-1</a></li>
           <li><a href="#">Page 1-2</a></li>
           <li><a href="#">Page 1-3</a></li>
           </ul>
        </li>
	 <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
           <span class="caret"></span></a>
           <ul class="dropdown-menu">
           <li><a href="#">Page 1-1</a></li>
           <li><a href="#">Page 1-2</a></li>
           <li><a href="#">Page 1-3</a></li>
           </ul>
        </li>

<?php endif; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
<?php if($this->ion_auth->logged_in() == true): ?>
	<li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings
           <span class="caret"></span></a>
           <ul class="dropdown-menu">
           <li><a href="#">Page 1-1</a></li>
           <li><a href="#">Page 1-2</a></li>
           <li><a href="#">Page 1-3</a></li>
           </ul>
        </li>
<?php endif; ?>
        <li class="active"><a href="<?= site_url(); ?>auth/logout"><?php echo $this->ion_auth->logged_in() == true ? 'Logout' : 'Login'; ?></a></li> 
        <li class="active"><a href="<?= site_url(); ?>auth/create_user"><?php if($this->ion_auth->logged_in() == false): ?><span class="glyphicon glyphicon-user"> Register</span><?php endif; ?></a></li>
      </ul>
    </div>
  </div>
</nav>
<br />
    <div class="container">
	<section>
	<div class="well well-md text-center gp_section">
