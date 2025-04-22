<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet"text/css href="../style.css">
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../Home/home.php"><span class="glyphicon glyphicon-home"></span> New Siam</a>
                </div>
                
                <ul class="nav navbar-nav navbar-right">
                    <!-- Home -->
                    <li><a href="../Home/home.php">Home</a></li>
                    <!-- View Reservation -->
                    <li><a href="../ViewReservation/viewreservation.php">View Reservation</a></li>
                    <!-- Researve Room -->
                    <li><a href="../ReserveRoom/addreservation.php">Add Reservation</a></li>
                    <!-- Update Website -->
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Update Website <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../UpdateWebsite/updatenews.php">News/Promotion</a></li>
                            <li><a href="../UpdateWebsite/updatefaq.php">FAQ</a></li>
                            <li><a href="../UpdateWebsite/updateroom.php">Room</a></li>
                        </ul>
                    </li>
                    <!-- Accounts -->
                    <li><a href="../Account/account.php">Accounts</a></li>
                    <!-- Logout -->
                    <li><a href="../Login/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </body>
</html>

