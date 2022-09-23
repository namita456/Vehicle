<?php
//require_once("auth.php");
require_once("connect.php");
$table = "user_details";
$msg = "";
$color = "";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha3a84-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->


<script>
    $(document).ready(function() {
        $flag = 1;
        $("#myEmail").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_name").text("* You have to enter your email address!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");

            }
        });
        $("#myName").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_name").text("* You have to enter your first name!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");

            }
        });
        $("#lastname").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_lastname").text("* You have to enter your Last name!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_lastname").text("");
            }
        });
        $("#dob").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_dob").text("* You have to enter your Date of Birth!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_dob").text("");
            }
        });
        $("#gender").focusout(function() {
            $(this).css("border-color", "#2eb82e");

        });
        $("#address").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_address").text("* You have to enter your address!");
            } else {
                $(this).css({
                    "border-color": "#2eb82e"
                });
                $('#submit').attr('disabled', false);
                $("#error_address").text("");

            }
        });
        $("#phone").focusout(function() {
            $pho = $("#phone").val();
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_phone").text("* You have to enter your Phone Number!");
            } else if ($pho.length != 10) {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_phone").text("* Lenght of Phone Number Should Be Ten");
            } else if (!$.isNumeric($pho)) {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_phone").text("* Phone Number Should Be Numeric");
            } else {
                $(this).css({
                    "border-color": "#2eb82e"
                });
                $('#submit').attr('disabled', false);
                $("#error_phone").text("");
            }
        });
    });

    $("#submit").click(function() {
        if ($("#myName").val() == '') {
            $("#myName").css("border-color", "#FF0000");
            $('#submit').attr('disabled', true);
            $("#error_name").text("* You have to enter your first name!");
        }
        if ($("#lastname").val() == '') {
            $("#lastname").css("border-color", "#FF0000");
            $('#submit').attr('disabled', true);
            $("#error_lastname").text("* You have to enter your Last name!");
        }
        if ($("#dob").val() == '') {
            $("#dob").css("border-color", "#FF0000");
            $('#submit').attr('disabled', true);
            $("#error_dob").text("* You have to enter your Date of Birth!");
        }
        if ($("#address").val() == '') {
            $("#address").css("border-color", "#FF0000");
            $('#submit').attr('disabled', true);
            $("#error_address").text("* You have to enter your address!");
        }
        if ($("#phone").val() == '') {
            $("#phone").css("border-color", "#FF0000");
            $('#submit').attr('disabled', true);
            $("#error_phone").text("* You have to enter your Phone Number!");
        }
    });
</script>

<body>
    <?php
    if ($_POST) {

        $user_name = $_POST["user_name"];

        if ($user_name != "") {

            $result = mysqli_query($conn, "SELECT * FROM " . $table . " where user_name='" . $user_name . "'");
            $num_rows = mysqli_num_rows($result);
            if ($num_rows >= 1) {
                echo '<script>alert("User Exist,Enter with different username...")</script>';
            } else {



                $name = $_POST["name"];
                $password = $_POST["password"];
                $address = $_POST["address"];
                $contact = $_POST["contact"];
                $gender = $_POST["gender"];
                $dob = $_POST["dob"];
                $sql = "insert into " . $table . "(user_name,name,password,address,contact,gender,dob) values('" . $user_name . "','" . $name . "','" . $password . "','" . $address . "',
'" . $contact . "','" . $gender . "','" . $dob . "')";
                $user_details = mysqli_query($conn, $sql);
                if (!$user_details) {
                    $msg = "Record not Added, " . mysqli_error($conn);
                    $color = "warning";
                } else {

                    $msg = "Records Added Successfully";
                    $color = "success";
                    echo '<script>window.location.href = "thanku.php";</script>';
                }
            }
        }
    }
    ?>
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12 col-lg-6 ">
            <div class="panel panel-primary">
                <div class="tagline underlineHover">
                    <h3>Registration</h3>
                </div>
                <div class="panel-body">
                    <form name="myform" method="post" class="form_new">
                        <div class="form-group ">
                            <label for="myName">Username/Email *</label>
                            <input id="myEmail" name="user_name" class="form-control" type="email" data-validation="required">
                            <span id="error_name" class="text-danger"></span>
                        </div>
                        <div class="form-group ">
                            <label for="myName">Name *</label>
                            <input id="myName" name="name" class="form-control" type="text" data-validation="required">
                            <span id="error_name" class="text-danger"></span>
                        </div>
                        <div class="form-group ">
                            <label for="myName">Password *</label>
                            <input id="myName" name="password" class="form-control" type="password" data-validation="required">
                            <span id="error_name" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="Address">Address *</label>

                            <textarea id="address" name="address" class="form-control" type="text" rows="2"></textarea>
                            <span id="error_address" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="number" id="phone" name="contact" class="form-control">
                            <span id="error_phone" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option selected>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                            <span id="error_gender" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date Of Birth *</label>
                            <input type="date" name="dob" id="dob" class="form-control">
                            <span id="error_dob" class="text-danger"></span>
                        </div>



                        <div> <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>