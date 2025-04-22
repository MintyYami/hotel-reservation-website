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
        <title>Edit News</title>
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
                <h1>Edit News</h1>
                <hr>

                <form action="deletenewsprocess.php" method="post" align="right">
                    <?php
                    echo '<button name="newsid" type="submit" value="'.$_GET["newsid"].'" class="btn btn-danger">Delete News</button>'
                    ?>
                </form>
                
                <form action="editnewsprocess.php" method="post">
                    <?php
                    include_once("../connection.php");

                    $stmt = $conn->prepare("SELECT * FROM TblNews WHERE newsID=:id");
                    $stmt->bindParam(':id', $_GET["newsid"]);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        //News type
                        echo '<div class="row align-items-center">
                            <div class="col-md-2" align="center">
                                <h5>News Type:</h5>
                            </div>
                            <div class="col-md-10">';
                            switch($row["NewsType"]) {
                                case '0':
                                    echo '<input type="radio" name="nType" value=0 checked>&nbsp;&nbsp;&nbsp;News
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="nType" value=1>&nbsp;&nbsp;&nbsp;Promotion';
                                break;
                                case '1':
                                    echo '<input type="radio" name="nType" value=0>&nbsp;&nbsp;&nbsp;News
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="nType" value=1 checked>&nbsp;&nbsp;&nbsp;Promotion';
                                break;
                            }
                            echo '</div>
                        </div>';
                        //Title
                        echo '<div class="row align-items-center" align="center">
                            <div class="col-md-2" align="center">
                                <h5>Title:</h5>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="title" class="form-control" value="'.$row["Title"].'" placeholder="'.$row["Title"].'">
                            </div>
                            <div class="col"></div>
                        </div>';
                        //Content
                        echo '<div class="row align-items-center">
                            <div class="col-md-2" align="center">
                                <h5>Content:</h5>
                            </div>
                            <div class="col-md-10">
                                <textarea type="text" name="content" rows="4" maxlength="1000" class="form-control" placeholder="'.$row["NewsContent"].'">'.$row["NewsContent"].'</textarea>
                            </div>
                            <div class="col"></div>
                        </div><br>';
                        //Submit button
                        echo '<div class="row" align="center">
                            <div class="col">
                                <button name="newsid" type="submit" class="btn btn-warning btn-lg" value="'.$_GET["newsid"].'">Save</button>
                            </div>
                            <div class="col"></div>
                        </div>';

                    }
                    ?>
                </form>

            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

