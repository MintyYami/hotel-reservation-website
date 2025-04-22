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
        <title>Add FAQ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet"text/css href="../style.css">
    </head>

    <body>
        <?php
            include_once "../Nav/navbaradmin.php"
        ?>

        <div class="row">

            <div class="column side"></div>
            <div class="column middle">
                <h1>Add FAQ</h1>
                <hr>
                
                <form action="addfaqprocess.php" method="post">
                    <!-- Question -->
                    <div class="row align-items-center" align="center">
                        <div class="col-md-2" align="center">
                            <h5>Question:</h5>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="question" class="form-control">
                        </div>
                        <div class="col"></div>
                    </div>

                    <div class="row align-items-center">
                        <!-- Answer -->
                        <div class="col-md-2" align="center">
                            <h5>Answer:</h5>
                        </div>
                        <div class="col-md-10">
                            <textarea type="text" name="answer" rows="4" maxlength="1000" class="form-control"></textarea>
                        </div>
                        <div class="col"></div>
                    </div><br>

                    <div class="row" align="center">
                        <div class="col">
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

