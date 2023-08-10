<?php

require_once "config.php";
require_once "navbar.php";

?>

<!-- for registration purpose -->

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['password'] != $_POST['com_password']) {
        $password_error = "password didn't match";
    } else {

        $for_ver_sql = "SELECT * from user where email = '$email'";

        $result_for_ver = mysqli_query($conn, $for_ver_sql);

        if (mysqli_num_rows($result_for_ver)) {
            $already_exist_error = "this email aready exist";
        } else {
            if (empty($_POST['name']) || empty($_POST['password'])) {
                $empty_error = "all fields are mandotary, fill all.";
            } else {
                $name = $_POST['name'];
                $password = $_POST['password'];
                $email = trim($_POST['email']);
                $token = md5(rand());
                

                $sql = "INSERT into user (name, email, password, token)  values('$name', '$email','$password', '$token' )";

                $result = mysqli_query($conn, $sql);
                
                header("location: email_verification.php");

            }
        }
    }
}

?>


<link rel="stylesheet" href="../css/style.css">
</link>
<div class="main-container">
    <div class="login-form">
        <h2> User registration </h2>
        <form action="registration.php" method="post">
            <input type="text" placeholder="User name" name="name"> </input>
            <input type="email" placeholder="Email" name="email"> </input>
            <input type="password" placeholder="Password" name="password"> </input>
            <input type="password" placeholder="Confirm Password" name="com_password"> </input>
            <?php if (isset($empty_error)) {
                echo $empty_error;
            }
            if (isset($wrong_error)) {
                echo $wrong_error;
            } if(isset($password_error)) {
                echo $password_error;
            }?>
            <button class="login-btn btn">SUBMIT</button>
        </form>
    </div>
</div>