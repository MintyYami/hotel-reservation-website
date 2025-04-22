<!DOCTYPE html>
<html lang="en">
    <head>
        <title>News & Promotion</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet"text/css href="style.css">
    </head>

    <body>

        <?php
            include_once "navbar.php";  
        ?>

        <div class="row">

            <div class="column side" style="height: 1000px"></div>
            <div class="column middle" style="padding: 20px;">
                <h1>News & Promotion</h1>
                <hr>
                
                <?php
                include_once("connection.php");

                $stmt = $conn->prepare("SELECT * FROM TblNews ORDER BY newsID DESC");
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo
                    '<div class="row">
                        <div class="col-md-10">
                            <h4>'.$row["Title"].'</h4>
                        </div>
                        <div class="col-md-2" align="right">
                            <h5>'.$row["NewsDate"].'</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <p style="color:grey;">';
                            
                            if($row["NewsType"]==0) {
                                echo 'News';
                            } else {
                                echo 'Promotion';
                            }
                            
                            echo '</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>'.$row["NewsContent"].'</p>
                        </div>
                    </div>';

                    //Line to separate news
                    echo '<p style="font-size: 10px;">_______</p>';
                }
                ?>
            </div>
            <div class="column side" style="height:1000px"></div>
        </div>
        
    </body>
</html>