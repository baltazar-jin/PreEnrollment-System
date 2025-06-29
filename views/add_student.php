<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pre-Enrollment Page</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3eee9;
        }

        .header-panel {
            background-color: #14361c;
            height: 150px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
        }

        .notice-bar {
            background-color: #f1bd3c;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            max-width: 500px;
            margin: 30px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
        }

        .form-input {
            width: 60%;
            padding: 10px;
            margin: 10px left;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: block;
        }

        .button-group {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn {
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            text-align: center;
        }

        .btn-enroll {
            background-color: #007bff;
        }

        .btn-enroll:hover {
            background-color: #0056b3;
        }

        .btn-view-link {
            background-color: #28a745;
            text-decoration: none;
        }

        .btn-view-link:hover {
            background-color: #1e7e34;
        }

        .btn-home {
            display: inline-block;
            float: right;
            margin-bottom: 20px;
            background-color: #6c757d;
            padding: 8px 12px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }


        .btn-home:hover {
            background-color: #5a6268;
        }

        .spacing-btn{
            margin-bottom: 50px;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header-panel">
        Pre-Enrollment System
    </div>

    <div class="notice-bar">
    </div>

    <!-- Enrollment Form Section -->
    <div class="form-container">
        <div class="spacing-btn">
            <a href="homepage.php" class="btn-home">← Back to Homepage</a>
        </div>
       
        <form method="POST" action="../controllers/StudentController.php?action=submit">
            <h3>Fill in the details required to add a Student in the database.</h3>
            <p>Enter First Name:</p>
            <input class="form-input" name="firstname" placeholder="First Name" required>
            <p>Enter Middle Name:</p>
            <input class="form-input" name="middlename" placeholder="Middle Name" required>
            <p>Enter Last Name:</p>
            <input class="form-input" name="lastname" placeholder="Last Name" required>
            <p>Enter School year (e.g. 2024–2025):</p>
            <input class="form-input" name="school_year" placeholder="School Year" required>
            <p>Enter Course:</p>
            <input class="form-input" name="course" placeholder="Course (e.g. BSCS)" required>
            <p>Select Term to Enroll:</p>
            <select class="form-input" name="term" required>
                <option value="" disabled selected>Click here to select</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
                <option value="Non Block">Non Block</option>
            </select>
            <p>Select Department:</p>
            <select class="form-input" name="department_id" required>
                <option value="" disabled selected>Click here to select</option>
                <option value="1">1 - Computer Engineering</option>
                <option value="2">2 - Electrical Engineering</option>
                <option value="3">3 - Mechanical Engineering</option>
                <option value="4">4 - Industrial Engineering</option>
                <option value="5">5 - Electronics and Communications Engineering</option>
                <option value="6">6 - Hospitality and Management</option>
                <option value="7">7 - Accountancy</option>
                <option value="8">8 - Tourism</option>
                <option value="9">9 - Information Technology</option>
            </select>

            <div class="button-group">
                <button class="btn btn-enroll" type="submit">Add Student</button>
            </div>
        </form>
    </div>

</body>
</html>
