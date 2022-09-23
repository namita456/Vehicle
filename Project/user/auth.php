<?php
session_start();
if (!isset($_SESSION["usrnm"])) {
    header("Location:../index.php");
    exit();
}
