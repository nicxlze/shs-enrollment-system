<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "enrollment_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $conn->prepare("INSERT INTO enrollments (strand, year_level, name, email, contact, address, password, reg_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $strand, $year_level, $name, $email, $contact, $address, $password, $reg_date);

    // Set parameters and execute
    $strand = $_POST['strand'] ?? '';
    $year_level = $_POST['year_level'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $address = $_POST['add'] ?? ''; // Adjust the name attribute if necessary
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $reg_date = date('Y-m-d H:i:s'); // Use the current date and time

    // Validate the input fields
    if (empty($strand) || empty($year_level) || empty($name) || empty($email) || empty($contact) || empty($address) || empty($_POST['password'])) {
        echo "";
    } else {
        if ($stmt->execute()) {
            // Redirect to success page
            header("Location: success.php");
            exit(); // Ensure no further code is executed after redirection
        } else {
            echo "Error: " . $stmt->error;
        }
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
    <title>Senior High School Enrollment System</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Roboto', sans-serif;
            background-color:#834037;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
            margin: 0;
        }

        /* Container */
        .container {
            max-width: 1400px; /* Increase container width */
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Styling */
        nav {
            overflow: hidden;
            text-align: right;
            border-bottom: 2px solid;
            border-top: 2px solid;
            border-color: #000;
            background-color: #e4bc38;
        }

        nav a {
            float: right;
            display: block;
            color: white;
            text-align: right;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: rgb(37, 150, 190);
            color: black;
        }

        .header-content {
            text-align: center;
            padding: 80px 0;
        }

        .header-content h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        /* Form Section */
        .form-section {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 2rem; /* Increase section title font size */
            text-align: center;
            color: #1d2b64;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px; /* Adjust spacing */
            color: #555;
            font-size: 1.2rem;
        }

        input[type="text"],
        select,
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        input[type="password"] {
            padding: 12px;
            margin: 10px 0 20px 0;
            border-radius: 10px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
            font-size: 1.2rem;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        select:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="number"]:focus,
        input[type="password"]:focus {
            border-color: #1d2b64;
        }

        input[type="submit"] {
            padding: 15px 0;
            background: linear-gradient(90deg, #1d2b64, #f8cdda);
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
            font-size: 1.4rem;
            width: 30%; /* Set width for better alignment */
            margin-left: auto;
            display: block;
            outline: none;
            text-align: center;
        }

        input[type="submit"]:hover {
            background: linear-gradient(90deg, #1d2b64, #d299c2);
        }

        /* Footer Styling */
        footer {
            background: linear-gradient(90deg, #1d2b64, #f8cdda);
            color: #fff;
            padding: 15px 0;
            text-align: center;
            width: 100%;
            margin-top: 30px;
        }

        /* Add CSS for table layout */
        .form-section table {
            width: 100%;
            margin-top: 20px; /* Add margin to separate from other elements */
        }

        .form-section td {
            padding: 10px;
        }

        .form-section label {
            font-weight: bold;
            color: #555;
            font-size: 1.2rem;
        }

        .form-section input[type="text"],
        .form-section select,
        .form-section input[type="email"],
        .form-section input[type="tel"],
        .form-section input[type="number"],
        .form-section input[type="password"] {
        
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
            font-size: 1.2rem;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .form-section input[type="text"]:focus,
        .form-section select:focus,
        .form-section input[type="email"]:focus,
        .form-section input[type="tel"]:focus,
        .form-section input[type="number"]:focus,
        .form-section input[type="password"]:focus {
            border-color: #1d2b64;
        }

        .form-section .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-section .back-button {
            padding: 15px 0;
            background: linear-gradient(90deg, #1d2b64, #f8cdda);
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
            text-align: center;
            width: 10%; /* Set width for better alignment */
        }

        .form-section .back-button:hover {
            background: #141a3a;
        }
    </style>
</head>
<body>

<header>
    <h2> Enrollment Form</h2>
</header>

<nav>
    <a class="navbar-link" href="enrolled_students.php">Enrolled Students</a>
    <a class="navbar-link" href="edit.php">Contact Us</a>
    <a href="about.php">About us</a>
    <a href="main.php">Home</a>
</nav>

<div class="container">
    <section class="form-section">
        <h2>Personal Information</h2>
        <form action="reg.php" method="POST">
            <table>
                <tr>
                    <td><label for="strand">Choose a Strand:</label></td>
                    <td><label for="year_level">Select Year Level:</label></td>
                    <td><label for="name">Full Name:</label></td>
                </tr>
                <tr>
                    <td>
                        <select name="strand" id="strand" required>
                            <option value="STEM">STEM</option>
                            <option value="ABM">ABM</option>
                            <option value="HUMSS">HUMSS</option>
                            <option value="GAS">GAS</option>
                            <option value="TVL">TVL</option>
                        </select>
                    </td>
                    <td>
                        <select name="year_level" id="year_level" required>
                            <option value="11">Grade 11</option>
                            <option value="12">Grade 12</option>
                        </select>
                    </td>
                    <td><input type="text" name="name" id="name" placeholder="Enter your full name" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><label for="contact">Contact Number:</label></td>
                    <td><label for="add">Address :</label></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" id="email" placeholder="Enter your email" required></td>
                    <td><input type="tel" name="contact" id="contact" placeholder="Enter your contact number"></td>
                    <td><input type="text" name="add" id="add" placeholder="Enter your address"></td>
                </tr>
                <tr>
                    <td><label for="password">Password :</label></td>
                    <td><label for="repeat_password">Repeat Password :</label></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" id="password" placeholder="Enter your password" required></td>
                    <td><input type="password" name="repeat_password" id="repeat_password" placeholder="Repeat your password" required></td>
                </tr>
            </table>
            <div class="buttons">
                <a href="main.php" class="back-button">Back</a>
                <input type="submit" value="Submit">
            </div>
        </form>
    </section>
</div>

<footer>
    <div class="container">
        &copy; 2024 Senior High School Enrollment System
    </div>
</footer>

</body>
</html>
