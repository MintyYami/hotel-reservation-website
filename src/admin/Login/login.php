<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
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
                    <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span> New Siam</a>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="column side"></div>
            <div class="column middle">
                <h1>Login</h1>
                <hr>
                <!-- Login form -->
                <form action="../Login/loginprocess.php" method="POST">
                    <!-- ID input-->
                    <div class="row align-items-center">
                        <div class="col-md-2" align="center">
                            <h5>ID:</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="id" class="form-control">
                        </div>
                        <div class="col"></div>
                    </div><br>

                    <!-- Password input -->
                    <div class="row align-items-center">
                        <div class="col-md-2" align="center">
                            <h5>Password:</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col"></div>
                    </div><br>
                    
                    <!-- Login Button -->
                    <div class="row align-items-center">
                        <div class="col-md-2"></div>
                        <div class="col-md-3" align="center">
                            <!-- Check if no more that three attempts has been made in a period of ten mintues -->
                            <?php
                            if((!isset($_COOKIE['login'])) || ($_COOKIE['login'] < 3)) {
                                echo '<input type ="submit" value="Login" class="btn btn-warning btn-lg">';
                            } else { //Disable login button after three attempts
                                echo '<input type ="submit" value="Login" class="btn btn-warning btn-lg" disabled="disabled">';
                                
                                echo '
                        </div>
                        <div class="col"></div>
                    </div>
                                ';
                                echo '
                    <div class="row align-items-center">
                        <div class="col-md-2"></div>
                        <div class="col-md-3" align="center">
                                <p style="color:red;">You are banned for 10 minutes.</p>
                                ';
                            }

                            ?>
                        </div>
                        <div class="col"></div>
                    </div>

                    <!-- Alert for final attempt -->
                    <?php
                    if ((isset($_COOKIE['login'])) && $_COOKIE['login'] == 2) {
                        echo '
                        <div class="row align-items-center">
                            <div class="col-md-2"></div>
                            <div class="col-md-3" align="center">
                                <p style="color:red;">WARING: You have one attempt left</p>
                            </div>
                            <div class="col"></div>
                        </div><br>
                        ';
                    }
                    ?>
                    
                </form>
            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

