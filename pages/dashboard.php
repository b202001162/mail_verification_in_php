<?php 

require_once "config.php";
require_once "navbar.php";

if(!isset($_SESSION['logedin']) || !isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    header("location : login.php");
}
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$ver_sql = "SELECT * from user where email = $email and password = $password";

$result = mysqli_query($conn, $ver_sql);

if(mysqli_num_rows($result) == 0) {
    header("location: registration.php");
} 

?>

<div class="main-container">
    <h1> Welcome to dashboard!</h1>
</div>