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
        <title>Add Account</title>
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
                <h1>Add Account</h1>
                <hr>
                
                <form action="addaccountprocess.php" method="post">
                    <div class="row align-items-center">
                        <div class="col-md-2" align="center">
                            <h5>First Name:</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="staffnamef" class="form-control">
                        </div>
                        <div class="col"></div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-2" align="center">
                            <h5>Last Name:</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="staffnamel" class="form-control">
                        </div>
                        <div class="col"></div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-2" align="center">
                            <h5>Password:</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col"></div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-2" align="center">
                            <h5>Role:</h5>
                        </div>
                        <div class="col-md-3" align="center">
                            <input type="radio" name="role" value="recept" checked> Receptionist<br>
                            <input type="radio" name="role" value="admin"> Administrator<br><br>
                        </div>
                        <div class="col"></div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-5" align="center">
                            <input type ="submit" value="Submit"  class="btn btn-warning btn-lg">
                        </div>
                        <div class="col"></div>
                    </div>
                </form>

            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

