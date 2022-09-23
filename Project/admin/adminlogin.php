<?php
require_once("connect.php");
//require_once("auth.php");
session_start();
$table2 = "administrator";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="style2.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background: linear-gradient(to right, #b92b27, #1565c0)
    }
  </style>
</head>

<body>
  <div class="container">
    <?php

    if ($_POST) {
      $username2 = stripslashes($_REQUEST['username']);    // removes backslashes
      $username2 = mysqli_real_escape_string($conn, $username2);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($conn, $password);
      // Check user is exist in the database
      $query = "SELECT * FROM $table2 WHERE username='$username2'
               AND password='" . $password . "'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $rows = mysqli_num_rows($result);
      if ($rows > 0) {
        $_SESSION['usrnmd'] = $username2;
        // Redirect to user dashboard page
        header("Location: adminpannel.php");
      } else {
        echo "<div class='form'>
            <h3>Incorrect Username/password.</h3><br/>
            <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
            </div>";
      }
    } else {
    ?>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <form class="box" method="post" name="login">
                <h1>Login</h1>
                <p class="text-muted"> Please enter your login and password!</p> <input type="text" name="username" placeholder="Username"> <input type="password" name="password" placeholder="Password"> <a class="forgot text-muted" href="#">Forgot password?</a> <a class="forgot text-light" href="administrator.php"> New Registration</a> <input type="submit" name="" value="Login" href="#">

              </form>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</body>

</html>