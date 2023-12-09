<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <style>
        body {
            font-family: 'Courier New', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url('bg.png') center/cover no-repeat;
        }

        #container {
            text-align: center;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.5));
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            position: relative;
            z-index: 1;
            border: 5px solid #3498db;
        }

        h1 {
            color: #1F618D;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #3498db;
            padding: 15px 30px;
            margin: 10px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
        }

        a:hover {
            background-color: #2079b0;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Welcome to the Main Page!</h1>
        <p><a href="login.php">Login</a></p>
        <p><a href="register.php">Register</a></p>
    </div>
</body>
</html>
