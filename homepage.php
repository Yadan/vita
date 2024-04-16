<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Homepage</title>
</head>
<body>
    <div class="right-links">
        <a href="editing.php">Change Information</a>
        <a href="logout.php"> <button class="btn">Log out</button></a> <!-- Logout link/button -->
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <?php
                    // Start the session to access session variables
                    session_start();

                    // Check if the user is logged in and Fullname session variable is set
                    if (isset($_SESSION['Fullname'])) {
                        // Display the Fullname
                        echo "<p>Hello " . $_SESSION['Fullname'] . "</p>";
                    } else {
                        // If Fullname is not set, display a default greeting
                        echo "<p>Hello</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
