<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<?php
require_once("auth.php");
require_once("connect.php");
$unm = $_SESSION["usrnm"];
$table = "complaint_form_detail";
$msg = "";
$color = "";
?>
<?php include 'userheader.php'; ?>
<?php


//To Show Records
$sql = "select * from complaint_form_detail where username='" . $unm . "'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
?>
    <div class="container">
        <table class="table table-primary table-hover table-striped table-bordered my-4">
            <tr class="thead-dark">
                <!-- <th>ID</th>
                <th>USERNAME</th> -->
                <th>CHASSIS NUMBER</th>
                <th>DAY OF THEFT</th>
                <th>LAST LOCATION</th>
                <th>MODEL NUMBER</th>
                <th>DATE</th>
                <th>STATUS</th>
                <th>Action</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($res)) {
            ?>
                <tr>
                    <td><?php echo $row["chassis_no"]; ?></td>
                    <td><?php echo $row["DayOfTheft"]; ?></td>
                    <td><?php echo $row["LastLocation"]; ?></td>
                    <td><?php echo $row["model_no"]; ?></td>
                    <td><?php echo $row["Date"]; ?></td>
                    <td>
                        <?php
                        if ($row['status'] == 1) {
                            echo ('CONFIRM');
                        } else {
                            echo ('PENDING');
                        }
                        ?></td>
                    <td>
                        <a href="update.php?id= <?php echo $row["id"] ?>" class="btn btn-warning">EDIT</a>
                        <a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">DELETE</a>
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