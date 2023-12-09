<?php
include("configurations.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $checkQuery = "SELECT * FROM info WHERE username = '$username'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION["username"] = $username;
            header("Location: pokedex.php");
            exit();
        } else {
            $message = "Incorrect password. Please try again.";
        }
    } else {
        $message = "Username not found. Please register or try a different username.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body style="background: url('loginbg.png') center/cover no-repeat;">
    <div id="container">
        <h1>Login</h1>

        <?php
        if (isset($message)) {
            echo "<p class='" . (($message == 'Login successful!') ? 'success' : 'error') . "'>$message</p>";
        }
        ?>

        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>

        <p>Don't have an account? <a href="register.php">Register</a></p>
        <p>Return to the main page? <a href="index.php">Return</a></p>
    </div>
</body>
</html>
