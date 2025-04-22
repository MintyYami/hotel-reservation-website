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
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet"text/css href="../style.css">
    </head>

    <body>
        <?php
            include_once "../Nav/navbaradmin.php";
        ?>

        <div class="row">
            <div class="column side"></div>
            <div class="column middle">
                <h1>Add New Room Type</h1>
                <hr>
                
                
                <form action="addroomtypeprocess.php" align="right" method="post">
                    <div class="row align-items-center">
                        <!-- Select hotel where to room will be for -->
                        <div class="col-md-2" align="center">
                            <h5>Hotel:</h5>
                        </div>
                        <div class="col-md-3">
                            <select name="hotel" class="form-control" required>
                                <option value="" disabled selected="selected"></option>
                                <option value="1" >New Siam I</option>
                                <option value="2">New Siam II</option>
                                <option value="3">New Siam III</option>
                                <option value="4">New Siam River Side</option>
                                <option value="5">New Siam Palace Ville</option>
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                        <!-- Room Capacity -->
                        <div class="col-md-2" align="center">
                            <h5>Capacity:</h5>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="capacity" class="form-control" max="9" min="0">
                        </div>
                    </div>
                    
                    <div class="row align-items-center">
                        <!-- Room Name -->
                        <div class="col-md-2" align="center">
                            <h5>Room Name:</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="roomname" class="form-control" maxlength="30">
                        </div>
                        <div class="col-md-2"></div>
                        <!-- Room Price -->
                        <div class="col-md-2" align="center">
                            <h5>Price:</h5>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="price" maxlength="4" class="form-control">
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <!-- Room Description -->
                        <div class="col-md-2" align="center">
                            <h5>Room Description:</h5>
                        </div>
                        <div class="col-md-5">
                            <textarea type="text" name="description" rows="4" maxlength="1000" class="form-control"></textarea>
                            <p style="color:grey; font-size:12px;">1000 characters max.</p>
                        </div>
                        <!-- Room Amount -->
                        <div class="col-md-2" align="center">
                            <h5>Room Amount:</h5>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="rAmount" max="999" min="0" class="form-control">
                        </div>
                        <div class="col"></div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-12" align="center">
                            <br>
                            <input type ="submit" value="Submit"  class="btn btn-warning btn-lg">
                        </div>
                    </div>
                </form><br><br>

            </div>
            <div class="column side" style="background-color:#f1f1f1;"></div>
        </div>

    </body>
</html>