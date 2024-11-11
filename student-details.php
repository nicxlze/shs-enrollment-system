<?php
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

// Retrieve data from the database
$sql = "SELECT * FROM student_information";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">
    <style>
        /* Reset default browser styles */
        body {
            font-family: 'Georgia', serif;
            background-color: #f2cf3d;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            max-width:  1000px;
            margin: 0 auto;
            padding: 10px;
        }

        nav {
            overflow: hidden;
            text-align: right;
            background-color: #6a0611;
        }

        nav a {
            float: right;
            display: block;
            color: #fff;
            text-align: right;
            padding: 14px 16px;
            text-decoration: none;
            font-family: 'Roboto', serif;
        }

        nav a:hover {
            background-color: #6a0611;
            color: black;
        }

        .header-content {
            text-align: center;
            padding: 10px 0;
        }

        .header-content h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .logo {
            display: inline-block;
            vertical-align: middle;
            margin-right: 15px;
        }

        .school-name {
            display: inline-block;
            vertical-align: middle;
            font-size: 2.5em;
            color: #6a0611;
        }

        .details-section {
            background-color: #fff;
            border-radius: 1px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-top: 30px;
            margin-bottom: 20px;
            font-family: 'Roboto', serif;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 2rem;
            text-align: center;
            color: #6a0611;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd;
        }

        td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .back-button {
            background-color: #6a0611; 
            color: white; 
            padding: 5px 10px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            margin-top: 20px; 
            display: block; 
            text-decoration: none; 
            text-align: center;
        }

        .back-button:hover {
            background: #000;
        }

        .nav-buttons {
            text-align: center;
            margin-bottom: 20px;
        }

        .nav-buttons button {
            background-color: #6a0611;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .nav-buttons button:hover {
            background-color: #000;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }
        th {
            padding: 5px; /* Add padding to the table header cells */
            text-align: left; /* Align text to the left within the cells */
            border: 1px solid #ddd;
        }
    
        th#id-column {
            background-color: #6a0611; /* Choose your desired background color */
            color: white; /* Text color */
            padding: 8px; /* Padding for the header cell */
            text-align: left; 
        }

.action-column {
    width: 150px;
    text-align: center;
}

.action-column button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 2px;
    cursor: pointer;
    border-radius: 3px;
}

.action-column button:hover {
    background-color: #45a049;
}

.delete-button {
    background-color: #f44336;
}

.delete-button:hover {
    background-color: #da190b;
}

.edit-button {
    background-color: #008CBA;
}

.edit-button:hover {
    background-color: #007A99;
}
    </style>
</head>
<header>
    <div class="header-content">
        <img src="logo-removebg-preview.png" alt="School Logo" class="logo" width="100" height="100">
        <div class="school-name">ST. ALPHONUS LIGUORI INTEGRATED SCHOOL</div>
    </div>
</header>

<nav>
        <a class="navbar-link" href="contact_us.php">Contact Us</a>
        <a href="about.php">About us</a>
        <a href="main.php">Home</a>
    </nav>

<div class="container">
    <div class="nav-buttons">
        <button onclick="redirectTo('student-details.php')">Student Details</button>
        <button onclick="redirectTo('contact-details.php')">Contact Details</button>
        <button onclick="redirectTo('parent-details.php')">Parent Details</button>
        <button onclick="redirectTo('previous-details.php')">Previous School Details</button>
        <button onclick="redirectTo('enrollment-details.php')">Enrollment Details</button>
    </div>

    <div class="container">
    <section class="details-section">
        <h2>Students Details</h2>
        <table>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <th id='id-column'>ID</th>
                            <td>" . htmlspecialchars($row["student_info_id"]) . "</td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td>" . htmlspecialchars($row["first_name"]) . "</td>
                        </tr>
                        <tr>
                            <th>Middle Name</th>
                            <td>" . htmlspecialchars($row["middle_name"]) . "</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>" . htmlspecialchars($row["last_name"]) . "</td>
                        </tr>
                        <tr>
                            <th>Extension Name</th>
                            <td>" . htmlspecialchars($row["extension_name"]) . "</td>
                        </tr>
                        <tr>
                            <th>Nickname</th>
                            <td>" . htmlspecialchars($row["nickname"]) . "</td>
                        </tr>
                        <tr>
                            <th>LRN</th>
                            <td>" . htmlspecialchars($row["lrn_number"]) . "</td>
                        </tr>
                        <tr>
                            <th>Birthdate</th>
                            <td>" . htmlspecialchars($row["birthdate"]) . "</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>" . htmlspecialchars($row["gender"]) . "</td>
                        </tr>
                        <tr>
                            <th>Religion</th>
                            <td>" . htmlspecialchars($row["religion"]) . "</td>
                        </tr>
                        <tr>
                            <th>Place of Birth</th>
                            <td>" . htmlspecialchars($row["place_of_birth"]) . "</td>
                        </tr>
                        <tr>
                            <th>Been Hospitalized</th>
                            <td>" . htmlspecialchars($row["have_been_hospitalized"]) . "</td>
                        </tr>
                        <tr>
                            <th>Reason</th>
                            <td>" . htmlspecialchars($row["reason"]) . "</td>
                        </tr>
                        <tr>
                            <th>Medical History</th>
                            <td>" . htmlspecialchars($row["medical_history"]) . "</td>

                             <td class='action-column'>
                                    <form action='update.php' method='POST' style='display: inline-block;'>
                                        <input type='hidden' name='student_info_id' value='" . $row["student_info_id"] . "'>
                                        <button type='submit' class='edit-button'>Update</button>
                                    </form>
                                    <form action='delete.php' method='POST' style='display: inline-block;'>
                                        <input type='hidden' name='student_info_id' value='" . $row["student_info_id"] . "'>
                                        <button type='submit' class='delete-button'>Delete</button>
                                    </form>
                                </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No student details found</td></tr>";
            }
            ?>
        </table>
    </section>
</div>

<script>
function redirectTo(page) {
    window.location.href = page;
}
</script>
</body>
</html>

<?php
// Close connection
$conn->close();
?>