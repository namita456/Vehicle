<?php
require_once("connect.php");
require_once("auth.php");
$table = "user_details";
$msg = "";
$color = "";

$unm = $_SESSION['usrnm'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>
    <?php include 'userheader.php'; ?>
    <?php

    $sql = "select * from " . $table . " where user_name='" . $unm . "'";
    $res = mysqli_query($conn, $sql);
    ?>

    <div class="container">
        <form action="#" method="post">
            <div class="row bg-light shadow my-4 py-3">
                <div class="col-md-2"></div>
                <?php
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_array($res)) {
                ?>

                        <div class="col-md-8 form-group">

                            <label>Update Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>">
                            <label>Change Pasword</label>
                            <input type="text" name="password" class="form-control" value="<?php echo $row["password"]; ?>">
                            <label>Update Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $row["address"]; ?>">
                            <label>Update Contact</label>
                            <input type="number" name="contact" class="form-control" value="<?php echo $row["contact"]; ?>">
                            <label>Update Gender</label>
                            <select name="gender" id="gender" class="form-control" value="<?php echo $row["gender"]; ?>">
                                <option>Male</option>
                                <option>Female </option>
                                <option>Other</option>
                            </select>

                            <label>Update Date Of Birth</label>
                            <input type="date" name="dob" class="form-control" value="<?php echo $row["dob"]; ?>">
                    <?php
                    }
                } else
                    echo "No Record Found";
                    ?>
                    <div class="row justify justify-center">

                        <div class="col-sm-2"><a href="vehiclereg.php" class="btn btn-primary">Cancel</a></div>
                        <div class="col-sm-2"> <input type="submit" name="update" value="Update" class="btn btn-info">
                        </div>
                        <div class="alert alert<?php echo $color; ?> alert-dismissible fade show" role="alert">
                            <strong><?php echo $msg; ?></strong>

                        </div>
                    </div>

                        </div>

        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>
<?php
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
$dt = date('d-m-Y H:i:s');
if ($_POST) {

    $mob = $_POST["name"];
    $add = $_POST["password"];
    $gender = $_POST["address"];
    $cnt = $_POST["contact"];
    $gendernew = $_POST["gender"];
    $dob = $_POST["dob"];

    $sql = "update " . $table . " set name='" . $mob . "',password='" . $add . "',address='" . $gender . "',contact='" . $cnt . "',gender='" . $gendernew . "',dob= '" . $dob . "' ,Date='" . $dt . "' where user_name='" . $unm . "'";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        $msg = "Record not Updated, " . mysqli_error($conn);
        $color = "warning";
        echo $msg;
    } else {
        $msg = "Records Updated Successfully";
        echo $msg;
        $color = "success";
        header("Location:userpannel.php");
    }
}

?>