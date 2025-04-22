<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Map</title>
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
            <div class="column side"></div>
            <div class="column middle">
                <iframe src="https://www.google.com/maps/d/embed?mid=1g8mi2CAqcm4FBVkFuTWe57Bz1kTK7nWt&hl=en" width="100%" height="480"></iframe>
                
                <div class="row" style="padding: 20px;">
                    <div class="col-md-6">
                        <p><span class="glyphicon glyphicon-plus"></span> National Gallery</p>
                        <p><span class="glyphicon glyphicon-plus"></span> Bangkok National Museum</p>
                        <p><span class="glyphicon glyphicon-plus"></span> The National Theatre</p>
                        <p><span class="glyphicon glyphicon-plus"></span> Phra Sumen Fort</p>
                        <p><span class="glyphicon glyphicon-plus"></span> Wat Bowon Sathan Sutthawat</p>
                        <p><span class="glyphicon glyphicon-plus"></span> Wat Phra Kaew (Temple of the Emerald Buddha)</p>
                    </div>
                    <div class="col-md-6">
                        <p><span class="glyphicon glyphicon-plus"></span> Peeps Thai Eatery</p>
                        <p><span class="glyphicon glyphicon-plus"></span> Hemlock / HemlockArtRestaurant</p>
                        <p><span class="glyphicon glyphicon-plus"></span> Jang Teo Korean Restaurant</p>
                        <p><span class="glyphicon glyphicon-plus"></span> Jaywalk Cafe</p>
                        <p><span class="glyphicon glyphicon-plus"></span> Sanam Luang Park</p>
                        <p><span class="glyphicon glyphicon-plus"></span> Moonshine bar</p>
                    </div>
                </div>
                
            </div>
            <div class="column side"></div>
        </div>
        
    </body>
</html>
