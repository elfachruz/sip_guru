<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SIP_GURU</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/jquery.searchable-1.0.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" >SIP_GURU</a>
			</div>
			<!--<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="#">List Data Guru</a></li>
				<li><a href="#">Tentang Kami</a></li> 
				<li><a href="#">Kontak</a></li> 
			</ul>-->
			<ul class="nav navbar-nav navbar-right">
				<li><a data-toggle="modal" href="#ModalLogin"><span class="glyphicon glyphicon-log-in"></span> Login Admin</a></li>
			</ul>
		</div>
	</nav>

	<div>
	</div>
	
	
<!-- Modal Popup untuk Add--> 
<div id="ModalLogin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">


        <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
            <form action="checklogin.php" class="inner-login" method="post">
            <h3 class="text-center title-login">Login Admin</h3>
                <div class="form-group">
                    <label for="UserName">UserName</label>
					<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" class="form-control" name="user" placeholder="Username" required/>
					</div>
                </div>

                <div class="form-group">
				<label for="Password">Password</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="pass" placeholder="Password" required/>
                </div>
				</div>
                
                <input type="submit" class="btn btn-primary btn-block" value="LOGIN" />
                
            </form>
        </div>

           

    </div>
</div>
	
	
  </body>
