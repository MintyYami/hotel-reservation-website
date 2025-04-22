<?php

include_once("../connection.php");
array_map("htmlspecialchars", $_POST);


$stmt = $conn->prepare("INSERT INTO TblNews (Title,NewsType,NewsDate,NewsContent)VALUES (:title,:ntype,:ndate,:content)");

$stmt->bindParam(':title', $_POST["title"]);
$stmt->bindParam(':ntype', $_POST["nType"]);
$stmt->bindParam(':ndate', $_POST["todayDate"]);
$stmt->bindParam(':content', $_POST["content"]);

$stmt->execute();

$conn=null;

header('Location: addnews.php');

?>


