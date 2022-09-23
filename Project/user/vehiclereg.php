<?php
require_once("auth.php");
require_once("connect.php");
$table = "vehicle_details";
$msg = "";
$color = "";

?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="style2.css">
    <!------ Include the above in your HEAD tag ---------->


    <script>
        $(document).ready(function() {
            $flag = 1;
            $("#vehiclenumber").focusout(function() {
                if ($(this).val() == '') {
                    $(this).css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_vehiclenumber").text("* You have to enter your Vehicle number!");
                } else {
                    $(this).css("border-color", "#2eb82e");
                    $('#submit').attr('disabled', false);
                    $("#error_vehiclenumber").text("");

                }
            });
            $("#manufacturednumber").focusout(function() {
                if ($(this).val() == '') {
                    $(this).css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_manufacturednumber").text("* You have to enter your Vehicle manufactured number!");
                } else {
                    $(this).css("border-color", "#2eb82e");
                    $('#submit').attr('disabled', false);
                    $("#error_manufacturednumber").text("");
                }
            });
            $("#no.ofwheels").focusout(function() {
                if ($(this).val() == '') {
                    $(this).css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_no.ofwheels").text("* You have to enter how many wheels in your stolen vehicle!");
                } else {
                    $(this).css({
                        "border-color": "#2eb82e"
                    });
                    $('#submit').attr('disabled', false);
                    $("#error_no.ofwheels").text("");

                }
            });
            $("#vehiclemodel").focusout(function() {
                if ($(this).val() == '') {
                    $(this).css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_vehiclemodel").text("* You have to enter your Vehicle model number!");
                } else {
                    $(this).css("border-color", "#2eb82e");
                    $('#submit').attr('disabled', false);
                    $("#error_vehiclemodel").text("");
                }
            });
            $("#vehiclecolor").focusout(function() {
                if ($(this).val() == '') {
                    $(this).css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_vehiclecolor").text("* You have to enter your Vehicle color!");
                } else {
                    $(this).css("border-color", "#2eb82e");
                    $('#submit').attr('disabled', false);
                    $("#error_vehiclecolor").text("");
                }
            });
            $("#ownername").focusout(function() {
                if ($(this).val() == '') {
                    $(this).css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_ownername").text("* You have to enter your name!");
                } else {
                    $(this).css("border-color", "#2eb82e");
                    $('#submit').attr('disabled', false);
                    $("#error_ownername").text("");
                }
            });




            $("#submit").click(function() {
                if ($("#vehiclenumber").val() == '') {
                    $("#vehiclenumber").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_vehiclenumber").text("* You have to enter your Vehicle number!");
                }
                if ($("#manufacturednumber").val() == '') {
                    $("#manufacturednumber").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_manufacturednumber").text("* You have to enter your Vehicle Manufactured Number!");
                }
                if ($("#no.ofwheels").val() == '') {
                    $("#no.ofwheels").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_no.ofwheels").text("*You have to enter how many wheels in your stolen vehicle!");
                }
                if ($("#vehiclemodel").val() == '') {
                    $("#vehiclemodel").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_vehiclemodel").text("* You have to enter your Vehicle Model!");
                }
                if ($("#vehiclecolor").val() == '') {
                    $("#vehiclecolor").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_vehiclecolor").text("* You have to enter your Vehicle Color!");
                }
                if ($("#ownername").val() == '') {
                    $("#ownername").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_ownername").text("* You have to enter your Name!");
                }
            });
        });
    </script>
</head>

<body>
    <?php include 'userheader.php'; ?>
    <?php
    date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
    $dt = date('d-m-Y H:i:s');
    if ($_POST) {
        $user_name = $_SESSION["usrnm"];
        $vehicle_id = $_POST["vehicle_id"];
        $vehicle_name = $_POST["vehicle_name"];
        $chassis_no = $_POST["chassis_no"];
        $model_no = $_POST["model_no"];
        $vehicle_color = $_POST["vehicle_color"];

        $sql2 = "insert into " . $table . "(username,vehicle_id,vehicle_name,chassis_no,model_no,vehicle_color,Date) values('" . $user_name . "', '" . $vehicle_id . "','" . $vehicle_name . "','" . $chassis_no . "','" . $model_no . "','" . $vehicle_color . "','" . $dt . "')";
        $vehicle_details = mysqli_query($conn, $sql2);

        if (!$vehicle_details) {
            $msg = "Record not Added, " . mysqli_error($conn);
            $color = "warning";
        } else {

            $msg = "Records Added Successfully";
            $color = "success";
            echo '<script>window.location.href = "vehiclestatus.php";</script>';
        }
    }
    ?>
    <div class="container bg-light">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12 col-lg-6 ">
                <div class="panel panel-primary">
                    <div class="tagline underlineHover">
                        <h3> Vehicle Registration Form</h3>
                    </div>
                    <div class="panel-body">
                        <form name="myform" method="post" class="form_new bg-light ">
                            <div class="form-group ">
                                <label for="vehiclenumber">Vehicle Number *</label>
                                <input id="vehiclenumber" name="vehicle_id" class="form-control" type="text" data-validation="required">
                                <span id="error_vehiclenumber" class="text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label for="no.ofwheels">Vehicle Name *</label>
                                <input id="no.ofwheels" name="vehicle_name" class="form-control" type="text">
                                <span id="error_no.ofwheels" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="ownername">chassis Number*</label>
                                <input type="text" name="chassis_no" id="ownername" class="form-control">
                                <span id="error_ownername" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="vehiclemodel">Vehicle Model *</label>
                                <input type="text" name="model_no" id="vehiclemodel" class="form-control">
                                <span id="error_vehiclemodel" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="vehiclecolor">Vehicle Color *</label>
                                <input type="text" name="vehicle_color" id="vehiclecolor" class="form-control">
                                <span id="error_vehiclecolor" class="text-danger"></span>
                            </div>
                            <div class="col-sm-2"> <input type="submit" value="submit" class="btn btn-primary">
                            </div>


                            <!-- <a href="update.php?id= <?php echo $row["id"] ?>" class="btn btn-warning">UPDATE</a> -->


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

</body>