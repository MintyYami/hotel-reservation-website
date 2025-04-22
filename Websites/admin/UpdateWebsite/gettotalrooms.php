<?php
session_start();
include_once("../connection.php");

$_SESSION['roomtype'] = $_POST["rtype"];

header("Location: totalrooms.php");

$conn=null;

?>