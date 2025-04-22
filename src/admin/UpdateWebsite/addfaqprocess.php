<?php

include_once("../connection.php");
array_map("htmlspecialchars", $_POST);


$stmt = $conn->prepare("INSERT INTO TblFAQ (Question,Answer)VALUES (:question ,:answer)");

$stmt->bindParam(':question', $_POST["question"]);
$stmt->bindParam(':answer', $_POST["answer"]);

$stmt->execute();

$conn=null;

header('Location: addfaq.php');

?>


