<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enrollment_db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Prepare SQL query
$sql = "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')";

// Execute SQL query
if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
