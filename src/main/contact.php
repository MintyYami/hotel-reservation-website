<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact Us</title>
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
            <div class="column middle" style="padding: 20px;">
                <h1>Contact Us</h1>
                <hr>

                <div class="row">
                    <!-- Working hours -->
                    <div class="col-md-2">
                        <p>Working Days:</p>
                        <p>Working Hours:</p>
                    </div>
                    <div class="col-md-3">
                        <p>Monday - Friday</p>
                        <p>09:00 - 17:00 (GMT +7)</p>
                    </div>
                    <!-- Button to go to FAQ page -->
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <p>Check your questions in Frequently Asked Questions:</p>
                    </div>
                    <div class="col-md-1">
                        <form action="faq.php">
                            <input type ="submit" value="FAQ" class="btn btn-warning">
                        </form>
                    </div>
                </div>

                <div style="background-color: #F1F1F1; padding: 5px;">
                    <p><b>Please note:</b> We do not usually read and respond to email messages on weekends and public holidays, so we do not normally process requests on these days. If you want to try to contact us on these days, please call us by telephone in addition to sending an email message, and then we may be able to read and respond to your email message.</p>
                    <p>We apologize for any inconvenience if we cannot respond to your email on these days.</p>
                </div><br>
                
                <div class="row">
                    <div class="col-md-4">
                        <h4>New Siam I</h4>
                        <hr>
                        <p><b>Tel:</b> +66 2282 4554</p>
                        <p><b>Fax:</b> +66 2281 7461</p>
                        <p><b>Facebook:</b> <a href="https://www.facebook.com/NewSiam1GuestHouse">@NewSiam1GuestHouse</a></p>
                    </div>
                    <div class="col-md-4">
                        <h4>New Siam II</h4>
                        <hr>
                        <p><b>Tel:</b> +66 2629 0101</p>
                        <p><b>Fax:</b> +66 2629 0303</p>
                        <p><b>Facebook:</b> <a href="https://www.facebook.com/NewSiam2guesthouse/">@NewSiam2guesthouse</a></p>
                    </div>
                    <div class="col-md-4">
                        <h4>New Siam III</h4>
                        <hr>
                        <p><b>Tel:</b> +66 2629 4844</p>
                        <p><b>Fax:</b> +66 2629 4843</p>
                        <p><b>Facebook:</b> <a href="https://www.facebook.com/NewSiam3GuestHouse/">@NewSiam3GuestHouse</a></p>
                    </div>
                </div><br>
                    
                <div class="row">
                    <div class="col-md-4">
                        <h4>New Siam River Side</h4>
                        <hr>
                        <p><b>Tel:</b> +66 2629 3535</p>
                        <p><b>Fax:</b> +66 2629 3443</p>
                        <p><b>Facebook:</b> <a href="https://www.facebook.com/Newsiamriverside4/">@Newsiamriverside4</a></p>
                    </div>
                    <div class="col-md-4">
                        <h4>New Siam Palace Ville</h4>
                        <hr>
                        <p><b>Tel:</b> +66 2282 4142</p>
                        <p><b>Fax:</b> --</p>
                        <p><b>Facebook:</b> <a href="https://www.facebook.com/newsiampalaceville">@newsiampalaceville</a></p>
                    </div>
                </div>
            </div>
            
            <div class="column side"></div>
        </div>
    </body>
</html>
