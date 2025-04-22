<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css" type="text/css">
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
        include_once "navbar.php";
        ?>

        <div class="row">
            <div class="column side"></div>
            <div class="column middle" style="padding: 20px;">
                <h1>Reserve Room</h1>
                <hr>
                
                <form action="roomforreservation.php" method="post">
                    <!-- row for input labels -->
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Check In:</h5>
                        </div>
                        <div class="col-md-3">
                            <h5>Check Out:</h5>
                        </div>
                        <div class="col-md-3">
                            <h5>Hotel:</h5>
                        </div>
                    </div>

                    <!-- row for input box -->
                    <div class="row align-items-center">
                        <!-- Date in -->
                        <div class="col-md-3">
                            <input type="date" name="datein" id="datein" class="form-control" required>
                        </div>
                        <!-- Date out -->
                        <div class="col-md-3">
                            <input type="date" name="dateout" id="dateout" class="form-control" required>
                        </div>
                        <!-- Set min of input date -->
                        <script>
                            document.getElementById("datein").min = today;
                            document.getElementById("dateout").min = today;
                        </script>
                        <!-- Hotel -->
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
                        <div align="center">
                            <input type ="submit" value="Get Rooms"  class="btn btn-warning">
                        </div>
                    </div>
                </form>

            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

