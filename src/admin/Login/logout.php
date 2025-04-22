<?php
session_start();
//Unset login attempt cookie
if(isset($_COOKIE['login'])){
    setcookie('login', 1, time());
}
//Unset account role
unset($_SESSION['role']);

//Unset sessions for hotel & roomtype session back to zero
unset($_SESSION['hotel']);
//unset($_SESSION['roomtype']);
unset($_SESSION['date']);

//Unset reservation array
unset($_SESSION['reservationArray']);

header("Location: login.php");
?>

