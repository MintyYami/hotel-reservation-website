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
        <title>Add News</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet"text/css href="../style.css">
        <!-- Getting today's date to set input min date -->
        <script>
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0
            var yyyy = today.getFullYear();

            if (dd < 10) {
            dd = '0' + dd;
            }
            if (mm < 10) {
            mm = '0' + mm;
            } 
            today = yyyy + '-' + mm + '-' + dd;
        </script>
    </head>

    <body>
        <?php
            include_once "../Nav/navbaradmin.php"
        ?>

        <div class="row">

            <div class="column side"></div>
            <div class="column middle">
                <h1>Add News</h1>
                <hr>
                
                <form action="addnewsprocess.php" method="post">
                    <!-- News Type -->
                    <div class="row align-items-center">
                        <div class="col-md-2" align="center">
                            <h5>News Type:</h5>
                        </div>
                        <div class="col-md-10">
                            <input type="radio" name="nType" value=0 checked>&nbsp;&nbsp;&nbsp;News
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="nType" value=1>&nbsp;&nbsp;&nbsp;Promotion
                        </div>
                    </div>
                    <!-- Title -->
                    <div class="row align-items-center" align="center">
                        <div class="col-md-2" align="center">
                            <h5>Title:</h5>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="col"></div>
                    </div>
                    <!-- Content -->
                    <div class="row align-items-center">
                        <div class="col-md-2" align="center">
                            <h5>Content:</h5>
                        </div>
                        <div class="col-md-10">
                            <textarea type="text" name="content" rows="4" maxlength="1000" class="form-control"></textarea>
                        </div>
                        <div class="col"></div>
                    </div><br>

                    <!-- Set current date to submit button -->
                    <div class="row" align="center">
                        <div class="col">
                            <button name="todayDate" id="todayDate" type="submit" class="btn btn-warning btn-lg">Submit</button>
                            <script type="text/javascript">
                                document.getElementById("todayDate").setAttribute('value',today);
                            </script>
                        </div>
                        <div class="col"></div>
                    </div>
                </form>

            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

