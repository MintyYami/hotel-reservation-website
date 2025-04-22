<?php
session_start();
if (!isset($_SESSION['role'])) {   
    header("Location:../Login/logout.php");
}
$_SESSION['currentpage'] = $_SERVER['SCRIPT_NAME'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../style.css">
    </head>

    <body>
        <?php
            if($_SESSION['role'] == 1) {
                include_once "../Nav/navbaradmin.php";
            }else{
                include_once "../Nav/navbar.php";
            }
        ?>

        <div class="row">
            <div class="column side"></div>
            <div class="column middle text-center">
                <h1>Home</h1>
                <hr>

                <h3>View Reservation</h3>
                <form action="../ViewReservation/viewreservation.php">
                    <input type ="submit" value="View Reservation" class="btn btn-warning btn-lg">
                </form><br>

                <h3>Reserve Room</h3>
                <form action="../ReserveRoom/addreservation.php">
                    <input type ="submit" value="Add Reservation" class="btn btn-warning btn-lg">
                </form><br>

                <?php
                    if($_SESSION['role'] == 1) {
                        Echo'
                        <h3>Update Website</h3>
                        <form action="../UpdateWebsite/updatenews.php">
                            <input type ="submit" value="News/Promotion" class="btn btn-warning btn-lg">
                        </form><br>
                        <form action="../UpdateWebsite/updatefaq.php">
                            <input type ="submit" value="FAQ" class="btn btn-warning btn-lg">
                        </form><br>
                        <form action="../UpdateWebsite/updateroom.php">
                            <input type ="submit" value="Room" class="btn btn-warning btn-lg">
                        </form><br>

                        <h3>Accounts</h3>
                        <form action="../Account/account.php">
                            <input type ="submit" value="Account"  class="btn btn-warning btn-lg">
                        </form><br>';
                    }
                ?>

            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

