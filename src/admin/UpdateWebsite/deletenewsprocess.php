<?php
include_once("../connection.php");

$stmt = $conn->prepare("DELETE FROM TblNews WHERE newsID=:id");
$stmt->bindParam(':id', $_POST["newsid"]);
$stmt->execute();

header('Location: viewnews.php');
?>
