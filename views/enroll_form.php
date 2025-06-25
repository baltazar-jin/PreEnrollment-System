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
            padding: 15px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            max-width: 600px;
            margin: 30px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-input {
            width: 100%;
            padding: 10px;
            margin: 10px auto;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: block;
        }


        .button-group {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        .btn-enroll {
            background-color: #007bff;
        }

        .btn-enroll:hover {
            background-color: #0056b3;
        }

        .btn-view-link {
            display: block;
            text-align: center;
            background-color: #28a745;
            color: white;
            padding: 12px;
            font-size: 16px;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-view-link:hover {
            background-color: #1e7e34;
        }

    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header-panel">
        Pre-Enrollment System
    </div>

    <!-- Sub-header Notification -->
    <div class="notice-bar">
        Now Accepting Enrollments for S.Y. 2024–2025
    </div>

    <!-- Enrollment Form Section -->
    <div class="form-container">
        <form method="POST" action="../controllers/StudentController.php?action=submit">
            <input class="form-input" name="first_name" placeholder="First Name" required>
            <input class="form-input" name="middlename" placeholder="Middle Name" required>
            <input class="form-input" name="last_name" placeholder="Last Name" required>
            <input class="form-input" name="course" placeholder="Course" required>
            <input class="form-input" name="school_year" placeholder="School Year" required>
            <input class="form-input" name="term" placeholder="Term" required>

            <div class="button-group">
                <button class="btn btn-enroll" type="submit">Submit Enrollment</button>
                <a href="../controllers/StudentController.php?action=view" class="btn btn-view-link">View Enrolled Students</a>

            </div>
        </form>
    </div>

</body>
</html>
