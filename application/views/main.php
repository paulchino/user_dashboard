<?php 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">


    <!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <style type="text/css">
  	.jumbotron {
  		margin-top: 80px;
  		margin-bottom: 20px;
  		padding: 30px 60px 20px 60px;
  	}
  	.jumbotron h2 {

  	}

  	.jumbotron p a {
  		margin-top: 20px;
  	}


  </style>
  <body>

  <?php $this->load->view('partials/navbar-signin') ?>

	<div class="container">
        
  	<div class='row'>
  		<div class='col-md-12'>
  			<div class="jumbotron">
    				<h2>Welcome to the Test!</h2>
    				<h4>We're going to build a cool application using a MVC 
    				 framework! This aplication was built with the Village88 folks!</h4>
    					<p><a class="btn btn-primary btn-lg" href="/main/signin" role="button">Start</a></p>
  			</div>
  		</div>
  	</div>

  	<div class='row'>
  		<div class='col-md-4'>
  			<h3>Manage Users</h3>
  			<p>Using this application, you'll learn how to add,
  			 remove, and edit users for the application</p>
  		</div>
  		<div class='col-md-4'>
  			<h3>Leave a Message</h3>
  			<p>Users will be able to leave a message to another
  			 user using this application</p>
  		</div>
  		<div class='col-md-4'>
  			<h3>Edit User Information</h3>
  			<p>Admins will be able to edit another user's information
  			 (email address, first name, last name, etc.)</p>
  		</div>
    </div>

	</div> <!-- end of container -->


  </body>
</html>