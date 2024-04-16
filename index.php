<?php
include("php/config.php");

// Initialize variables
$Fullname = $Username = $Password = "";

if(isset($_POST['Submit'])){
    $Fullname = $_POST['Fullname'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    $verify_query = mysqli_query($conn,"SELECT Username FROM users WHERE Username='$Username'");

    if(mysqli_num_rows($verify_query) != 0){
        echo "<div class='message'>
        <p>This Username is used, Try another one please!</p>
        </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class= 'btn'>Go Back</button>";
    }
    else {
        mysqli_query($conn,"INSERT INTO users(Fullname,Username,Password) VALUES('$Fullname','$Username','$Password')") or die("Error Occured");

        // After successful registration, set the Fullname session variable
        session_start();
        $_SESSION['Fullname'] = $Fullname;

        // Redirect to login page
        header("Location: login.php");
        exit;
    }
}
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
            <header>REGISTER</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="Full Name">Full Name</label>
                    <input type="text" name="Fullname" id="Fullname" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Username">Username</label>
                    <input type="text" name="Username" id="Username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Password">Password</label>
                    <input type="password" name="Password" id="Password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" name="Submit" value="Register" required>
                </div>

                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
