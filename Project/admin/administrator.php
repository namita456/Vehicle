<?php
//require_once("auth2.php");
require_once("connect.php");
$table = "administrator";
$msg = "";
$color = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>

    </style>
</head>

<body>
    <?php
    if ($_POST) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $name = $_POST["name"];


        $sql = "insert into " . $table . "(username,password,name) values('" . $username . "','" . $password . "','" . $name . "')";
        $administrator = mysqli_query($conn, $sql);
        if (!$administrator) {
            $msg = "Record not Added, " . mysqli_error($conn);
            $color = "warning";
        } else {

            $msg = "Records Added Successfully";
            $color = "success";
            header('Location:adminlogin.php');
        }
    }
    ?>
    <div class="container">
        <div class="row justify-content-center bg-light centr lh-lg">
            <div class="col-md-6 col-sm-12 col-lg-6 ">
                <div class="panel panel-primary">
                    <div class="tagline underlineHover">
                        <h3>Registration</h3>
                    </div>
                    <div class="panel-body">
                        <form name="myform" method="post" class="form_new">
                            <div class="form-group ">
                                <label for="myName">UserName *</label>
                                <input id="myName" name="username" class="form-control" type="text" data-validation="required">
                                <span id="error_name" class="text-danger"></span>
                            </div>
                            <div class="form-group ">
                                <label for="myName">Password *</label>
                                <input id="myName" name="password" class="form-control" type="password" data-validation="required">
                                <span id="error_name" class="text-danger"></span>
                            </div>
                            <div class="form-group ">
                                <label for="myName">Name *</label>
                                <input id="myName" name="name" class="form-control" type="text" data-validation="required">
                                <span id="error_name" class="text-danger"></span>
                            </div>


                            <div class="form-group mt-2">
                                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>