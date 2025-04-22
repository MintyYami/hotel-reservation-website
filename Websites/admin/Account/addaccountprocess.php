<?php

include_once("../connection.php");
array_map("htmlspecialchars", $_POST);

switch($_POST["role"]){
    case "recept":
        $role=0;
    break;
    case "admin":
        $role=1;
    break;
}

$stmt = $conn->prepare("INSERT INTO TblStaff (StaffNameF,StaffNameL,Password,Role)VALUES (:fname,:lname,:pass,:role)");

$stmt->bindParam(':fname', $_POST["staffnamef"]);
$stmt->bindParam(':lname', $_POST["staffnamel"]);
$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$stmt->bindParam(':pass', $hashed_password);
$stmt->bindParam(':role', $role);

$stmt->execute();

$conn=null;

header('Location: addaccount.php');

?>

