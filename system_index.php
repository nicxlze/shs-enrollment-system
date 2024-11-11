<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior High School Enrollment System</title>
    <link rel="stylesheet" href="styles.css"> <!-- External CSS file for styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background-color: #005078;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
        }

        section {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        h2 {
            margin-top: 0;
            font-size: 1.8rem;
            color: #005078;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            outline: none;
        }

        button[type="submit"] {
            padding: 12px 20px;
            background-color: #005078;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #003b57;
        }

        .course-list {
            margin-bottom: 20px;
        }

        .course-list label {
            margin-right: 10px;
        }

        footer {
            background-color: #005078;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            border-radius: 0 0 10px 10px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Senior High School Enrollment System</h1>
        </div>
    </header>

    <div class="container">
        <section id="registration">
            <h2>Student Registration</h2>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <button type="submit">Register</button>
            </form>
        </section>

        <section id="course-selection">
            <h2>Strand Selection</h2>
            <form action="select_courses.php" method="post">
                <div class="course-list">
                    <label><input type="radio" name="strand" value="STEM"> STEM</label>
                    <label><input type="radio" name="strand" value="ABM"> ABM</label>
                    <label><input type="radio" name="strand" value="HUMSS"> HUMSS</label>
                    <label><input type="radio" name="strand" value="GAS"> GAS</label>
                </div>
                <button type="submit">Submit </button>
            </form>
        </section>

        <section id="year-selection">
            <h2>Year Selection</h2>
            <form action="select_courses.php" method="post">
                <div class="course-list">
                    <label><input type="radio" name="year" value="GRADE 11"> GRADE 11</label>
                    <label><input type="radio" name="year" value="GRADE 12"> GRADE 12</label>
                </div>
                <button type="submit">Submit</button>
            </form>
        </section>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Senior High School Enrollment System</p>
        </div>
    </footer>
</body>
</html>
