<?php session_start(); require_once'includes/functions.php';?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDN 07 Sejagan | Sistem Informasi Inventaris</title>
    <!-- Custom CSS -->
    <link href="assets/css/style.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container pt-5 mt-5">
      <div class="col-md-6 mx-auto">
        <div class="card border shadow-sm">
          <div class="card-header text-center">
            <h3>SDN 07 Sejagan</h3>
          </div>
          <div class="card-body">
            
            <?php if ($_POST) include 'login_action.php'; ?>
            <form method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Login</button>
              <!-- <a href="admin/" class="btn btn-primary btn-block">Login</a> -->
            </form>

          </div>
        </div>
      </div>
      <p class="text-center">Perancangan Sistem Informasi Inventaris Sarana dan Prasarana pada SDN 07 Sejagan Berbasis Web</p>
    </div>
    
    <?php require_once 'includes/html-body-end.html'; ?>
  </body>
</html>