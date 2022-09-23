<?php
ob_start();
require_once("auth.php");
require_once("connect.php");
$table = "complaint_form_detail";
$msg = "";
$color = "";
$unm = $_SESSION["usrnm"];
?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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
            $("#chassisnumber").focusout(function() {
                if ($(this).val() == '') {
                    $(this).css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_chassisnumber").text("* You have to enter your vehicle Chassis number!");
                } else {
                    $(this).css("border-color", "#2eb82e");
                    $('#submit').attr('disabled', false);
                    $("#error_chassisnumber").text("");
                }
            });
            $("#Dayoftheft").focusout(function() {
                if ($(this).val() == '') {
                    $(this).css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_Dayoftheft").text("* You have to enter the date when vehicle is stolen!");
                } else {
                    $(this).css("border-color", "#2eb82e");
                    $('#submit').attr('disabled', false);
                    $("#error_Dayoftheft").text("");
                }
            });
            $("#Timeoftheft").focusout(function() {
                if ($(this).val() == '') {
                    $(this).css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_Timeoftheft").text("* You have to enter the time when vehicle is stolen!");
                } else {
                    $(this).css("border-color", "#2eb82e");
                    $('#submit').attr('disabled', false);
                    $("#error_timeoftheft").text("");
                }
            });
            $("#lastlocation").focusout(function() {
                if ($(this).val() == '') {
                    $(this).css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_lastlocation").text("* You have to enter the last location of vehicle!");
                } else {
                    $(this).css({
                        "border-color": "#2eb82e"
                    });
                    $('#submit').attr('disabled', false);
                    $("#error_lastlocation").text("");

                }
            });
            $("#modelnumber").focusout(function() {
                if ($(this).val() == '') {
                    $(this).css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_modelnumber").text("* You have to enter your Vehicle model number!");
                } else {
                    $(this).css({
                        "border-color": "#2eb82e"
                    });
                    $('#submit').attr('disabled', false);
                    $("#error_modelnumber").text("");

                }
            });

            $("#submit").click(function() {

                if ($("#vehiclenumber").val() == '') {
                    $("#vehiclenumber").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_vehiclenumber").text("* You have to enter your vehicle number!");
                }
                if ($("#chassisnumber").val() == '') {
                    $("#chassisnumber").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_chassisnumber").text("* You have to enter your vehicle chassis number!");
                }
                if ($("#Dayoftheft").val() == '') {
                    $("#Dayoftheft").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_Dayoftheft").text("* You have to enter the date when vehicle is stolen!");
                }
                if ($("#Timeoftheft").val() == '') {
                    $("#Timeoftheft").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_Timeoftheft").text("* You have to enter the time when vehicle is stolen!");
                }
                if ($("#lastlocation").val() == '') {
                    $("#lastlocation").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_lastlocation").text("* You have to enter the last location of vehicle!");
                }
                if ($("#vehiclemodel").val() == '') {
                    $("#vehiclemodel").css("border-color", "#FF0000");
                    $('#submit').attr('disabled', true);
                    $("#error_vehiclemodel").text("* You have to enter your vehicle model!");
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

        $chassis_no = $_POST["chassis_no"];
        $DayOfTheft = $_POST["DayOfTheft"];
        $LastLocation = $_POST["LastLocation"];
        $model_no = $_POST["model_no"];
        $sql = "insert into " . $table . "(username,chassis_no,DayOfTheft,LastLocation,model_no,Date) values('" . $unm . "','" . $chassis_no . "','" . $DayOfTheft . "',
'" . $LastLocation . "','" . $model_no . "','" . $dt . "')";

        $complaint_form_detail = mysqli_query($conn, $sql);

        if (!$complaint_form_detail) {
            $msg = "Record not Added, " . mysqli_error($conn);
            $color = "warning";
        } else {

            $msg = "Records Added Successfully";
            $color = "success";
            header('Location:showcomplaint.php');
        }
    }
    ?>
    <form name="myform" method="post" class="form_new">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12 col-lg-6 ">
                <div class="panel panel-primary">
                    <div class="tagline underlineHover">
                        <h3>Complaint Registration Form</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="chassisnumber">Chassis Number *</label>
                            <input id="chassisnumber" name="chassis_no" class="form-control" type="chassisnumber">
                            <span id="error_chassisnumber" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="Dayoftheft">Day of Theft *</label>
                            <input type="text" name="DayOfTheft" id="Dayoftheft" class="form-control">
                            <span id="error_Dayoftheft" class="text-danger"></span>
                        </div>


                        <div class="form-group">
                            <label for="lastlocation">Last Location Of Vehicle *</label>
                            <input type="lastlocation" id="lastlocation" name="LastLocation" class="form-control">
                            <span id="error_lastlocation" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="vehiclemodel">Vehicle Model *</label>
                            <input type="vehiclemodel" id="vehiclemodel" name="model_no" class="form-control">
                            <span id="error_vehiclemodel" class="text-danger"></span>
                        </div>
                        <button id="submit" type="submit" value="submit" class="btn btn-primary center">Submit</button>


    </form>

    </div>
    </div>
    </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>