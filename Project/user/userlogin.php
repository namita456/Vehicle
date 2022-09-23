<?php
require_once("connect.php");
//require_once("auth.php");
session_start();
$table = "user_details";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <?php

        if ($_POST) {
            $username = stripslashes($_REQUEST['user_name']);    // removes backslashes
            $username = mysqli_real_escape_string($conn, $username);
            $contact = stripslashes($_REQUEST['password']);
            $contact = mysqli_real_escape_string($conn, $contact);
            // Check user is exist in the database
            $query = "SELECT * FROM $table WHERE user_name='$username' AND password ='" . $contact . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $rows = mysqli_num_rows($result);
            if ($rows > 0) {
                $_SESSION["usrnm"] = $username;
                // Redirect to user dashboard page
                header("Location: userpannel.php");
            } else {
                header("Location: error.php");
            }
        } else {
        ?>

            <div class="container login-container d-flex justify-content-center">
                <div class="col-md-6 login-form-1">
                    <h3>User Login</h3>
                    <form class="form" method="post" name="login" action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_name" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" name="submit" class="login-button btn btnSubmit" />
                        </div>
                        <div class="form-group">

                            <a href="registration.php" class="ForgetPwd">New Registration</a>
                        </div>
                    </form>
                </div>
            <?php
        }
            ?>
            </div>
</body>

</html>