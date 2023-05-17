<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Login</title>
</head>
<body>
    
<div class="center2">
    <h1>Login</h1>

    <form action="login.php" method="post">
        <label for="email" >Email address:</label><br>
        <input type="email" name="email" required><br>

        <label for="password" >Password:</label><br>
        <input type="password" name="password" required><br> 

        <input type="submit" name="Login" value="Login"> <br><br>
        <a href="register.php">Register</a>
    </form>
</div>

<?php
if(isset($_POST['Login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email_address = '$email' AND password = '$password'");
    $row = mysqli_fetch_array($select);
    $status = $row['status'];

    $select2 = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email_address = '$email' AND password  = '$password'");
    $check_user = mysqli_num_rows($select2);

    if($check_user == 1){
        $_SESSION["status"] = $row['status'];
        $_SESSION["email"] = $row['email_address'];
        $_SESSION["password"] = $row['password'];

        if($status == "approved"){
            echo '<script type="text/javascript">';
            echo 'alert("Login success!");';
            echo 'window.location.replace("user-dashboard.php");';
            echo '</script>';
        } elseif($status == "pending") {
            echo '<script type="text/javascript">';
            echo 'alert("Your account is still pending!");';
            echo 'document.querySelector(".center2").insertAdjacentHTML("beforebegin", "<div class=\"alert\">Your account is still pending!</div>");';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Incorrect email or password!");';
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Incorrect email or password!");';
        echo '</script>';
    }
}
?>

</body>
</html>
