<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enrollmentsystemdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Normalize username to lowercase for case-insensitive comparison
    $username = strtolower($username);

    // Check credentials using prepared statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE LOWER(username) = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id']; // Assuming 'user_id' is the column name for the primary key
            $_SESSION['username'] = $user['username'];
            header("Location: en-details.php");
            exit();
        } else {
            echo "";
        }
    } else {
        echo "No user found with that username.";
    }
    
    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .login-header h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }

        .login-header p {
            font-size: 16px;
            color: #666;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 24px);
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .forgot-password {
            text-align: right;
            font-size: 14px;
            color: #333;
        }

        .forgot-password a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-password a:hover {
            color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Welcome Back!</h2>
            <p>Please login to access your account</p>
        </div>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($user) && !password_verify($password, $user['password'])): ?>
            <div class="error-message">Invalid password.</div>
        <?php endif; ?>
        
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($result) && $result->num_rows == 0): ?>
            <div class="error-message">No user found with that username.</div>
        <?php endif; ?>

        <form id="login-form" action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
            <div class="forgot-password">
                <a href="">Forgot password?</a>
            </div>
            <div class="text-center">
                <p>Not registered yet? <a href="signup.php">Signup Here!</a></p>
            </div>
            <div class="text-center">
                <a href="main.php">Home</a>
            </div>
        </form>
    </div>
</body>
</html>
