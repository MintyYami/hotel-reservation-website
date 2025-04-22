<?php
include_once("../connection.php");

$stmt = $conn->prepare("DELETE FROM TblStaff WHERE StaffID=:id");
$stmt->bindParam(':id', $_POST["deleteid"]);
$stmt->execute();

header('Location: viewaccount.php');
?>