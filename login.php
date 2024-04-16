<?php
include("php/config.php");
if(isset($_POST['Submit'])){
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE Username='$Username' AND Password='$Password'") or die("Error Occurred");
    $row = mysqli_fetch_assoc($result);

    if(is_array($row) && !empty($row)){
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['Password'] = $row['Password'];
        header("Location: homepage.php");
        exit;
    } else {
        $_SESSION['login_error'] = true;
        if(isset($_SESSION['login_error'])) {
            echo "<div class='message'>
                <p>Wrong Username or Password</p>
                </div> <br>";
                echo "<a href='login.php'><button class= 'btn'>Login</button>";
        } // Set a session variable to indicate login error
        header("Location: login.php"); // Redirect back to login page
        exit;
    }
}        // Display error message and login button if login fails
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="box form-box">
        <header>Login</header>
        <form action="" method="post">
            <div class="field input">
                <label for="Username">Username</label>
                <input type="text" name="Username" id="Username" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="Password">Password</label>
                <input type="password" name="Password" id="Password" autocomplete="off" required>
            </div>

            <div class="field">
                <input type="submit" name="Submit" value="Login" required>
            </div>

            <div class="links">
                Don't have an account? <a href="index.php">Sign Up Now</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
