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

if ($_POST["password"] == "") {
    $stmt = $conn->prepare("UPDATE TblStaff SET StaffNameF=:fname, StaffNameL=:lname, Role=:role WHERE StaffID= :id");
    
    $stmt->bindParam(':fname', $_POST["staffnamef"]);
    $stmt->bindParam(':lname', $_POST["staffnamel"]);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':id', $_POST["editid"]);

    $stmt->execute();

    echo
    '<script>
        alert("Changes saved");
        window.location.href="editanaccount.php?editid='.$_POST["editid"].'";
    </script>';

} else {
    $stmt = $conn->prepare("UPDATE TblStaff SET StaffNameF=:fname, StaffNameL=:lname, Password=:pass, Role=:role WHERE StaffID= :id");
    
    $stmt->bindParam(':fname', $_POST["staffnamef"]);
    $stmt->bindParam(':lname', $_POST["staffnamel"]);
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stmt->bindParam(':pass', $hashed_password);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':id', $_POST["editid"]);

    $stmt->execute();

    echo
    '<script>
        alert("Changes saved");
        window.location.href="editanaccount.php?editid='.$_POST["editid"].'";
    </script>';
};

?>