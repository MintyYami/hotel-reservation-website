<?php
include_once("../connection.php");

$stmt = $conn->prepare("DELETE FROM TblFAQ WHERE FAQID=:faqID");
$stmt->bindParam(':faqID', $_POST["faqID"]);
$stmt->execute();

header('Location: viewfaq.php');
?>

