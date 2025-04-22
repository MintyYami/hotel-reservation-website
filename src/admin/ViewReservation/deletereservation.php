<?php
include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("DELETE FROM TblReservation WHERE ReservationID=:rID");

$stmt->bindParam(':rID', $_POST["rID"]);
$stmt->execute();

header('Location: viewreservation.php');
?>
