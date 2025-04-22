<?php
include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("UPDATE TblReservation SET RoomNum=:rNum WHERE TblReservation.ReservationID=:rID");

$stmt->bindParam(':rNum', $_POST["roomnum"]);
$stmt->bindParam(':rID', $_POST["rID"]);
$stmt->execute();

header('Location: viewareservation.php?resID='.$_POST["rID"]);
?>
