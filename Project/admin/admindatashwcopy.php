<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<?php

require_once("connect.php");
//require_once("auth2.php");
$table = "complaint_form_detail";
$msg = "";
$color = "";
?>
<?php include 'adminheader.php'; ?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-9">
            <div class=" ">
                <h3 class="heading  text-center">Hi! How can we help You?</h3>
                <form method="POST">
                    <div class="d-flex justify-content-center ">
                        <div class="search">
                            <input type="text" name="get_id" class="search-input border  border-primary" placeholder="Search...">
                            <button name="search_by_id" class="btn btn-primary btn-small" type="submit">clickme</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['search_by_id'])) {
    $id = $_POST['get_id'];
    $query = "SELECT * FROM complaint_form_detail WHERE chassis_no='$id' ";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
?>
        <table class="table table-primary table-hover table-striped table-bordered my-4">
            <tr class="thead-dark">
                <th>ID</th>

                <th>CHASSIS NUMBER</th>
                <th>DAY OF THEFT</th>
                <th>LAST LOCATION</th>
                <th>MODEL NUMBER</th>
                <th>DATE</th>
                <th>STATUS</th>
                <th>Actions</th>
                <th>DELETE</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($query_run)) {
            ?>
                <tr>

                    <td><?php echo $row["id"]; ?></td>

                    <td><?php echo $row["chassis_no"]; ?></td>
                    <td><?php echo $row["DayOfTheft"]; ?></td>
                    <td><?php echo $row["LastLocation"]; ?></td>
                    <td><?php echo $row["model_no"]; ?></td>
                    <td><?php echo $row["Date"]; ?></td>
                    <td>
                        <?php
                        if ($row['status'] == 1) {
                            echo "<p id=str" . $row['id'] . ">Confirm</p>";
                        } else {
                            echo "<p id=str" . $row['id'] . ">Pending</p>";
                        }
                        ?>
                    </td>
                    <td>
                        <select class="btn btn-light dropdown-toggle" onchange="active_disactive_user(this.value,<?php echo $row['id']; ?>)">

                            <option class="dropdown-item" value=" 1">Confirm</option>
                            <option class="dropdown-item" value=" 0">Pending</option>
                        </select>

                    </td>
                    <td>
                        <!-- <a href="update.php?id= <?php echo $row["id"] ?>" class="btn btn-warning">EDIT</a> -->
                        <a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">DELETE</a>
                    </td>
                </tr>



            <?php
            }
            ?>
        </table>
<?php
    } else {
        echo "No Record Found";
    }
}
?>
<?php



//To Show Records
$sql = "select * from complaint_form_detail";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
?>
    <table class="table table-primary table-hover table-striped table-bordered my-4">
        <tr class="thead-dark">
            <th>ID</th>

            <th>CHASSIS NUMBER</th>
            <th>DAY OF THEFT</th>
            <th>LAST LOCATION</th>
            <th>MODEL NUMBER</th>
            <th>DATE</th>
            <th>STATUS</th>
            <th>Actions</th>
            <th>DELETE</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($res)) {
        ?>
            <tr>

                <td><?php echo $row["id"]; ?></td>

                <td><?php echo $row["chassis_no"]; ?></td>
                <td><?php echo $row["DayOfTheft"]; ?></td>
                <td><?php echo $row["LastLocation"]; ?></td>
                <td><?php echo $row["model_no"]; ?></td>
                <td><?php echo $row["Date"]; ?></td>
                <td>
                    <?php
                    if ($row['status'] == 1) {
                        echo "<p id=str" . $row['id'] . ">Confirm</p>";
                    } else {
                        echo "<p id=str" . $row['id'] . ">Pending</p>";
                    }
                    ?>
                </td>
                <td>
                    <select class="btn btn-light dropdown-toggle" onchange="active_disactive_user(this.value,<?php echo $row['id']; ?>)">

                        <option class="dropdown-item" value=" 1">Confirm</option>
                        <option class="dropdown-item" value=" 0">Pending</option>
                    </select>

                </td>
                <td>
                    <!-- <a href="update.php?id= <?php echo $row["id"] ?>" class="btn btn-warning">EDIT</a> -->
                    <a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">DELETE</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
} else {
    echo "No Records Found";
}
?>
</div>
<?php include 'footer.php'; ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function active_disactive_user(val, id) {
        $.ajax({
            type: 'post',
            url: 'change.php',
            data: {
                val: val,
                id: id
            },
            success: function(result) {
                if (result == 1) {
                    $('#str' + id).html('Confirm');
                } else {
                    $('#str' + id).html('Pending');
                }
            }
        });
    }
</script>

</html>

<?php
mysqli_close($conn);
?>