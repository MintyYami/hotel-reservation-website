<?php
include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("UPDATE TblRoomTotal SET Roomtype=:rtype, RoomNum=:num WHERE RoomID=:id");

$stmt->bindParam(':rtype', $_POST["rt"]);
$stmt->bindParam(':num', $_POST["roomNum"]);
$stmt->bindParam(':id', $_POST["roomID"]);

$stmt->execute();

echo
'<script>
    alert("Changes saved");
    window.location.href="totalrooms.php";
</script>';

?>