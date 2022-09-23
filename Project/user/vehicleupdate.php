<?php
require_once("connect.php");
require_once("auth.php");
$table = "vehicle_details";
$msg = "";
$color = "";
$id = $_GET['id'];

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

    $sql = "select * from " . $table . " where id =" . $id;
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

                            <label>Update Vehicle-Id</label>
                            <input type="text" name="vehicle_id" class="form-control" value="<?php echo $row["vehicle_id"]; ?>">
                            <label>Update Vehicle_name</label>
                            <input type="text" name="vehicle_name" class="form-control" value="<?php echo $row["vehicle_name"]; ?>">
                            <label>Update Chassis Number</label>
                            <input type="text" name="chassis_no" class="form-control" value="<?php echo $row["chassis_no"]; ?>">
                            <label>Update Model Number</label>
                            <input type="text" name="model_no" class="form-control" value="<?php echo $row["model_no"]; ?>">
                            <label>Update Vehicle Color</label>
                            <input type="text" name="vehicle_color" class="form-control" value="<?php echo $row["vehicle_color"]; ?>">

                    <?php
                    }
                } else
                    echo "No Record Found";
                    ?>
                    <div class=" row justify justify-center">

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

    $mob = $_POST["vehicle_id"];
    $add = $_POST["vehicle_name"];
    $gender = $_POST["chassis_no"];
    $cnt = $_POST["model_no"];
    $gendernew = $_POST["vehicle_color"];


    $sql = "update " . $table . " set vehicle_id='" . $mob . "',vehicle_name='" . $add . "',chassis_no='" . $gender . "',model_no='" . $cnt . "',vehicle_color='" . $gendernew . "',Date='" . $dt . "' where id=" . $id;
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        $msg = "Record not Updated, " . mysqli_error($conn);
        $color = "warning";
        echo $msg;
    } else {
        $msg = "Records Updated Successfully";
        echo $msg;
        $color = "success";
        echo '<script>window.location.href = "vehiclestatus.php";</script>';
    }
}

?>