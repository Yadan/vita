<?php
include("php/config.php");

if(isset($_POST['submit'])){
    $Fullname = $_POST['fullname'];
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    // Update user's information in the database
    mysqli_query($conn, "UPDATE users SET Fullname='$Fullname', Username='$Username', Password='$Password' WHERE Username='{$_SESSION['Username']}'");

    // Update session variables
    $_SESSION['Fullname'] = $Fullname;
    $_SESSION['Username'] = $Username;
    $_SESSION['Password'] = $Password;

    // Redirect to homepage
    header("Location: homepage.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Change Information</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" name="submit" value="Update" required>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
