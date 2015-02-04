<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

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
    .submit-btn {
      display: block;
      margin: 20px 0 20px 0;
    }

  </style>

  <body>

    <?php $this->load->view('partials/navbar-signin') ?>
    <div class='container'>
      

        <div class='row'>
          <div class='col-md-4'>
            <h2>Register</h2>
            <form action='/newuser/register' method='post'>
              <p>Email Address:</p> <input type='text' name='email' placeholder='Enter email' />
              <p>First Name:</p> <input type='text' name='first' />
              <p>Last Name:</p> <input type='text' name='last' />
              <p>Password:</p> <input type='password' name='password' placeholder='password' />
              <p>Password Confirmation:</p> <input type='password' name='confirm' />
              <input type='hidden' name='action' value='register' />
              <input type='submit' class='submit-btn' value='Register' />
            </form>

          </div>
          <div class='col-md-4'>
            <?php
            if($this->session->userdata('errors'))
            {
              echo $this->session->userdata('errors');
              $this->session->unset_userdata('errors');
            } 
            ?>
        </div>


  </body>

</html>