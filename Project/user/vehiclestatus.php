<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<?php
require_once("auth.php");
require_once("connect.php");
$unm = $_SESSION["usrnm"];
$table = "vehicle_details";
$msg = "";
$color = "";
?>
<?php include 'userheader.php'; ?>
<?php


//To Show Records
$sql = "select * from vehicle_details where username='" . $unm . "'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
?>
    <div class="container">
        <table class="table table-primary table-hover table-striped table-bordered my-4">
            <tr class="thead-dark">
                <!-- <th>ID</th>
                <th>USERNAME</th> -->
                <th>VEHICLE-ID</th>
                <th>VEHICLE NAME</th>
                <th>CHASSIS NUMBER</th>
                <th>MODEL NUMBER</th>
                <th>VEHICLE COLOR</th>
                <th>DATE</th>
                <th>ACTION</th>


            </tr>
            <?php
            while ($row = mysqli_fetch_array($res)) {
            ?>
                <tr>
                    <td><?php echo $row["vehicle_id"]; ?></td>
                    <td><?php echo $row["vehicle_name"]; ?></td>
                    <td><?php echo $row["chassis_no"]; ?></td>
                    <td><?php echo $row["model_no"]; ?></td>
                    <td><?php echo $row["vehicle_color"]; ?></td>
                    <td><?php echo $row["Date"]; ?></td>
                    <td>
                        <a href="vehicleupdate.php?id= <?php echo $row["id"] ?>" class="btn btn-warning">EDIT</a>
                        <a href="deletevehicle.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">DELETE</a>
                    </td>


                </tr>
            <?php
            }
            ?>
        </table>
    </div>
<?php
} else {
    echo "No Records Found";
}
?>
</div>
<?php include 'footer.php'; ?>
</body>

</html>

<?php
mysqli_close($conn);
?>