<?php

require_once("connect.php");
require_once("auth2.php");

$query = mysqli_query($conn, "Update complaint_form_detail set status='" . $_POST['val'] . "' where id='" . $_POST['id'] . "' ");
if ($query) {
    $q = mysqli_query($conn, "select * from complaint_form_detai wherer id='" . $_POST['id'] . "' ");
    $data = mysqli_fetch_assoc($query);
    echo $data['status'];
}
