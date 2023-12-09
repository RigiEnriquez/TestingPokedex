<?php
include("configurations.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $checkQuery = "SELECT * FROM info WHERE username = '$username'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        $message = "Username already exists. Choose a different username.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO info (username, password) VALUES ('$username', '$hashedPassword')";

        if ($conn->query($query) === TRUE) {
            $message = "Registration successful!";
        } else {
            $message = "Error: " . $query . "<br>" . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Register</h1>

        <?php
        if ($message) {
            echo "<p class='" . (($message == 'Registration successful!') ? 'success' : 'error') . "'>$message</p>";
        }
        ?>

        <form action="register.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Register">
        </form>

        <p>Already have an account? <a href="login.php">Login</a></p>
        <p>Return to the main page? <a href="index.php">Return</a></p>
    </div>
</body>
</html>