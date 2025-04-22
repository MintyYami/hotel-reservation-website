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
        <title>Accounts</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet"text/css href="style.css">
    </head>

    <body>
        <?php
            include_once "../Nav/navbaradmin.php";
        ?>

        <div class="row">
            <div class="column side"></div>
            <div class="column middle text-center">
                <h1>Accounts</h1>
                <hr>
                
                <form action="viewaccount.php">
                    <input type ="submit" value="View Accounts"  class="btn btn-warning btn-lg">
                </form><br><br>
                <form action="addaccount.php">
                    <input type ="submit" value="Add Accounts"  class="btn btn-warning btn-lg">
                </form><br><br>

            </div>
            <div class="column side" style="background-color:#f1f1f1;"></div>
        </div>

    </body>
</html>

