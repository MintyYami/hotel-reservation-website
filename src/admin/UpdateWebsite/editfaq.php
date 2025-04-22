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
                <h1>Edit FAQ</h1>
                <hr>

                <!-- Button to delete account-->
                <form onSubmit="if(!confirm('Are you sure you want to delete this FAQ? This action cannot be undone.')){return false;}" action="deletefaqprocess.php" method="post">
                    <div class="col-md" align="right">
                        <?php
                            echo '<button name="faqID" type="submit" value="'.$_GET["faqID"].'" class="btn btn-danger">Delete FAQ</button>'
                        ?>
                    </div>
                </form><br><br>
                
                <!-- Form to edit FAQ -->
                <form action="editfaqprocess.php" method="post">
                    
                    <?php
                    include_once("../connection.php");

                    $stmt = $conn->prepare("SELECT * FROM TblFAQ WHERE FAQID=:id");
                    $stmt->bindParam(':id', $_GET["faqID"]);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        //Question
                        echo'<div class="row align-items-center" align="center">
                            <div class="col-md-2" align="center">
                                <h5>Question:</h5>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="question" class="form-control" value="'.$row["Question"].'" placeholder="'.$row["Question"].'">
                            </div>
                            <div class="col"></div>
                        </div>';

                        //Answer
                        echo '<div class="row align-items-center">
                            <div class="col-md-2" align="center">
                                <h5>Answer:</h5>
                            </div>
                            <div class="col-md-10">
                                <textarea type="text" name="answer" rows="4" maxlength="1000" class="form-control" placeholder="'.$row["Answer"].'">'.$row["Answer"].'</textarea>
                             </div>
                            <div class="col"></div>
                        </div><br>';
                    }
                    ?>

                    <div class="row" align="center">
                        <div class="col">
                            <?php
                                echo '<button name="faqID" type="submit" value="'.$_GET["faqID"].'" class="btn btn-warning">Save</button>'
                            ?>
                        </div>
                        <div class="col"></div>
                    </div>
                </form>

            </div>
            <div class="column side"></div>
        </div>

    </body>
</html>

