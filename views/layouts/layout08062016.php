<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CMTS Odisha</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

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
      <p class="navbar-brand" href="#"><span class="h3">Node Monitor</span></p>
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
           <li><a href="#">Page 1-1</a></li>
           <li><a href="#">Page 1-2</a></li>
           <li><a href="#">Page 1-3</a></li>
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
        <li class="active"><a href="<?= site_url(); ?>users/logout"><?php echo $this->ion_auth->logged_in() == true ? 'Logout' : 'Login'; ?></a></li> 
        <li class="active"><a href="<?= site_url(); ?>users/register"><?php if($this->ion_auth->logged_in() == false): ?><span class="glyphicon glyphicon-user"></span> Register(New User)<?php endif; ?></a></li>
      </ul>
    </div>
  </div>
</nav>
<br />
    <div class="container">
	<section>
	<div class="well well-md text-center">
	<?php $this->load->view($subview); ?>
	</div>
	</section>
    </div>
<footer>
      <div class="container">
        <p class="text-muted">&copy; 2016 GP Das - <span class="glyphicon glyphicon-earphone"></span> 9437025000</p>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
