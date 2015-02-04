<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Messages</title>

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
  .post-message {
    min-width: 770px;
    min-height: 100px;
    display: block;
  }

  .post-border {
    border: 1px solid gray;
    width: 600px;
    height:100px;
    margin-left: 30px;
  }

  .post-margin {
    margin-left: 50px
  }

  .btn-md {
    margin: 15px 20px;
  }

  .message-header {
    margin-left: 20px;
    margin-bottom: 5px;
  }

  .post-message p {
    margin: 5px 0 0 3px;
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
      echo "<p>Please sign in to comment</p>";
    }
    ?>
  
    <div class='container'>
      <?php //var_dump($messages); ?>

      <?php //var_dump($user) ?>

      <?php //var_dump($posts) ?>

      <h2><?= "{$user['first_name']} {$user['last_name']}"; ?></h2>
      <div class='row'>
        <div class='col-md-6'>
          <table class='table table-bordered'>
            <tr>
              <td>Registered at:</td>
              <td> <?= $user['created_at']; ?> </td>
            </tr>
            <tr>
              <td>User ID</td>
              <td><?= $user['id'];  ?></td>
            </tr>
            <tr>
              <td>Email address:</td>
              <td> <?= $user['email'];  ?> </td>
            </tr>
            <tr>
              <td>Description: </td>
              <td> <?= $user['description']; ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class='row'>
        <div class='col-md-8'>
          <h2>Leave a message for <?= $user['first_name'];  ?></h2>
          <form action="/show/post_message/<?= $user['id'] ?>" method='post'>
            <textarea class='post-message' name='message'></textarea>
            <input type='submit' class='btn btn-primary btn-md text-right' value='post' />
          </form>
        </div>
      </div>

<!--           <a class="btn btn-primary btn-md text-right" href="#" role="button">Post</a> -->

<!--           </form>
          
        </div>
      <div class='row'>
        <div class='col-md-8 text-right'>
          
        </div>
      </div> -->



      <?php 
        foreach ($messages as $index) {
      ?>
      <div class='row'>
        <div class='col-md-6'>
            <h4 class='message-header'> <?= "{$index['first_name']} wrote"  ?> </h4>
        </div>
        <div class='col-md-2'>
          <p> <?= $index['created_at']  ?> </p>
        </div>
      </div>
      <div class='row'>
        <div class='col-md-10 post-message post-border'>
          <p> <?= $index['message']  ?> </p>
        </div>
      </div>

      <!-- Insert second for each loop here
      get comments where comments.messages_id = $index['id'] and display the comments -->
          <?php 
          foreach ($posts as $p_index) {
            // echo $p_index['messages_id'] . '<br>';
            // echo $index['id'] . '<br>';
            if($p_index['messages_id'] == $index['mess_id'])
            {
              //display the posts
          ?>
            <div class='row'>
                <div class='col-md-8 post-margin'>
                  <div class='row'>
                    <div class='col-md-6'>
                      <h4 class='message-header'> <?= "{$p_index['first_name']} wrote";  ?> </h4>
                    </div>
                    <div class='col-md-4 text-right'>
                      <p> <?= $p_index['created_at'];  ?></p>
                    </div>
                  </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-8 post-margin'>
                  <div class='post-message post-border'>
                    <p> <?= $p_index['comment']  ?> </p>
                  </div> 
                </div>
            </div>

      <?php 
            }
          }
      ?>
            <div class='row'>
              <div class='col-md-8 text-right'>
                <a class="btn btn-primary btn-md text-right" href="#" role="button">Comment</a>
              </div>
            </div>
      <?php
        }
      ?>

    </div> <!-- end of container -->
  </body>

</html>