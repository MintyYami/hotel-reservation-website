<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location:../Login/logout.php");
}
if ($_SESSION['role'] != 1) {
    header("Location:../Home/home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Accounts</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet"text/css href="style.css">
    </head>

    <body>
        <?php
            include_once "../Nav/navbaradmin.php"
        ?>

        <div class="row">

            <div class="column side"></div>
            <div class="column middle">
                <h1>View Accounts</h1>
                <hr>
                
                <!-- Table for showing the accounts -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>Forename</th>
                            <th>Surname</th>
                            <th>Account Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>              
                        <?php
                        include_once("../connection.php");
                        $stmt = $conn->prepare("SELECT * FROM TblStaff ORDER BY classBy");
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo("<tr>");

                                //Show staff ID
                                echo("<td>".$row["StaffID"]."</td>");
                                //Show staff forename
                                echo("<td>".$row["StaffNameF"]."</td>");
                                //Show surname
                                echo("<td>".$row["StaffNameL"]."</td>");
                                //Show account type
                                switch($row["Role"]) {
                                    case "1":
                                        echo("<td>Administrator</td>");
                                    break;
                                    case "0":
                                        echo("<td>Receptionist</td>");
                                    break;
                                }

                                //Button that takes staff to a page for editing an account
                                echo('<td>
                                <form action="editanaccount.php" method="get">
                                    <button name="editid" type="submit" value="'.$row["StaffID"].'" class="btn">Edit</button>
                                </form>
                                </td>');
                                
                            echo("</tr>");
                        }

                        ?>
                    </tbody>
                </table>

            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

