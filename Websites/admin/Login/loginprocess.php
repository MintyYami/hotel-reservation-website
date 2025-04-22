<?php
session_start();

//Only allows login attempt if number of attempt is less than three
if((isset($_COOKIE['login'])) && ($_COOKIE['login'] >= 3)){
    header("Location: login.php");
} else {
    //Check for correct login information
    try {
        include_once("../connection.php");
        array_map("htmlspecialchars", $_POST);
            
        $stmt = $conn->prepare("SELECT * FROM TblStaff WHERE StaffID = :id;");
        $stmt->bindParam(':id', $_POST["id"]);
        $stmt->execute();

        //Traverse through data stored in table to check for account with the same ID as the one input
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $hashed = $row['Password'];
            $passtry = $_POST['password'];

            //If password of account is also correct then allow login
            if(password_verify($passtry, $hashed)) {
                $_SESSION['role']=$row["Role"];
                //Unset number of login attempt after a succesful login
                if(isset($_COOKIE['login'])){
                    setcookie('login', 1, time());
                }
                header("Location: ../Home/home.php");
            }else{
                //Check if cookie for login attempt is set
                if(isset($_COOKIE['login'])){
                    //Increment number of login attempt by one
                    $attempts = $_COOKIE['login'] + 1;
                    setcookie('login', $attempts, time()+60*10);
                } else {
                    //set the cookie for 10 minutes with the initial value of 1
                    setcookie('login', 1, time()+60*10);
                }
                //o.1 second delay to show user the login information has been attempted and is incorrect
                header("Refresh:0.1; url = login.php");
            }
        }

        //If no account has same ID as the input ID then increment number of login attempt by one
        if(isset($_COOKIE['login'])){
            $attempts = $_COOKIE['login'] + 1;
            setcookie('login', $attempts, time()+60*10);
        } else {
            setcookie('login', 1, time()+60*10);
        }
        header("Refresh:0.1; url = login.php");
    }
    catch(PDOException $e){
        echo "error".$e->getMessage();
    }
}

$conn=null;

?>

