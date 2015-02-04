<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

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

    .table-margin {
      margin-top: 80px;
    }

  </style>

  <body>


    <?php 
    if($this->session->userdata('is_logged_in')
        && $this->session->userdata('is_logged_in') == true) {
      $this->load->view('partials/navbar-logoff');
    }
    else 
    {
      $this->load->view('partials/navbar-signin');
    }
    ?>

    
    <div class='container'>
      <div class='row table-margin'>
        <div class='col-md-6'>
          <h2>Manage Users</h2>
        </div>
        <div class='col-md-6 text-right'>
          <a class='btn btn-primary btn-md' href='' role='button'>Add new</a>
        </div>
      <div>
      <div class='row'>
        <div class='col-md-12'>
          
          <table class='table table-bordered'>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Email</td>
              <td>created_at</td>
              <td>user_level</td>
              <td>actions</td>
            </tr>
            <?php 
            foreach ($data as $index) {
              ?>
             <tr>
                <td> <?= $index['id']; ?> </td>
                <td> <a href="/show/wall/<?= $index['id'];?>" > <?= $index['first_name']; ?></a> </td>
                <td> <?= $index['email']; ?> </td>
                <td> <?= $index['created_at']; ?> </td>
                <td> <?= $index['access_rights_id']; ?> </td>
                <td> <a href=''>edit <a href=''>remove</a> </td>
              </tr>
            <?php
            }
            ?>

            <tr>
              <td>1</td>
              <td><a href=''>Paul Chang</a></td>
              <td>paulchino@gmail.com</td>
              <td>Dec. 24th 2015</td>
              <td>admin</td>
              <td><a href=''>edit <a href=''>remove</a></td>
            </tr>
            <tr>
              <td>2</td>
              <td><a href=''>Bob Smith</a></td>
              <td>bsmith@gmail.com</td>
              <td>Dec. 25th 2015</td>
              <td>admin</td>
              <td><a href=''>edit <a href=''>remove</a></td>
            </tr>
            <tr>
              <td>3</td>
              <td><a href=''>John Doe</a></td>
              <td>jdoe@gmail.com</td>
              <td>Dec. 29th 2015</td>
              <td>normal</td>
              <td><a href=''>edit <a href=''>remove</a></td>
            </tr>
          </table>
        </div>
      </div>



      </div>


    </div>


  </body>

</html>