<?php

require_once "config.php";
require_once "navbar.php";

?>

<!-- when post request come -->

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']) || empty($_POST['password'])) {
        $empty_error = "all fields are mandotary, fill all.";
    } else {
        $name = $_POST['name'];
        $password = $_POST['password'];

        $sql = "SELECT * from user where  name = '$name' and password = '$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            $wrong_error = "email or password is wrong";
        } else {
            $row = mysqli_fetch_assoc($result);
            if($row['name'] == '$name' && $row['password'] == '$password') {
                header( "location: dashboard.php");
            } else {
                $wrong_error = "email or password is wrong";
            }
        }
    }


}

?>

<link rel="stylesheet" href="../css/style.css">
</link>
<div class="main-container">
    <div class="login-form">
        <h2> Login </h2>
        <form action="login.php" method="post">
            <input type="text" placeholder="User name" name="name"> </input>
            <input type="password" placeholder="Password" name="password"> </input>
            <?php if(isset($empty_error)) {
                echo $empty_error;
            } if(isset($wrong_error)) {
                echo $wrong_error;
            } ?>
            <button class="login-btn btn">SUBMIT</button>
        </form>
    </div>
</div>