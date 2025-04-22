<?php
include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("UPDATE TblFAQ SET Question=:question, Answer=:ans WHERE FAQID=:faqID");

$stmt->bindParam(':question', $_POST["question"]);
$stmt->bindParam(':ans', $_POST["answer"]);
$stmt->bindParam(':faqID', $_POST["faqID"]);

$stmt->execute();

echo
'<script>
    alert("Changes saved");
    window.location.href="viewfaq.php";
</script>';

?>

