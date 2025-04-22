<?php
include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("UPDATE TblNews SET Title=:title, NewsType=:nType, NewsContent=:content WHERE newsID=:id");

$stmt->bindParam(':title', $_POST["title"]);
$stmt->bindParam(':nType', $_POST["nType"]);
$stmt->bindParam(':content', $_POST["content"]);
$stmt->bindParam(':id', $_POST["newsid"]);

$stmt->execute();

echo
'<script>
    alert("Changes saved");
    window.location.href="viewnews.php";
</script>';

?>

