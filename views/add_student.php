<?php
require_once('../models/Student.php');
require_once('../models/Department.php');

$departmentModel = new Department();
$departmentList = $departmentModel->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3eee9;
        }

        .form-container {
            background-color: transparent;
            max-width: 500px;
            margin: 30px auto;
            position: relative;
        }

        .form-input {
            width: 40%;
            padding: 10px;
            margin: 10px 0;
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

        .btn-add {
            background-color: #28a745;
        }

        .btn-add:hover {
            background-color: #218838;
        }

        .btn-home {
            display: inline-block;
            float: right;
            margin-bottom: 10px;
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-home:hover {
            background-color: #0056b3;
        }

        .spacing {
            margin-bottom: 5px;
        }

        .spacing-btn {
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <div class="spacing-btn">
        <a href="#" class="btn-home" onclick="loadPage('view_student', this)">View Student List</a>
    </div>
    <form id="addStudentForm" method="POST">

        <p>Enter First Name:</p>
        <input class="form-input" name="firstname" placeholder="First Name" required>

        <p>Enter Middle Name:</p>
        <input class="form-input" name="middlename" placeholder="Middle Name" required>

        <p>Enter Last Name:</p>
        <input class="form-input" name="lastname" placeholder="Last Name" required>

        <p>Enter School Year (e.g. 2024–2025):</p>
        <input class="form-input" name="school_year" placeholder="School Year" required>

        <p>Enter Course:</p>
        <input class="form-input" name="course" placeholder="Course (e.g. BSCS)" required>

        <p>Select Term to Enroll:</p>
        <select class="form-input" name="term" required>
            <option value="" disabled selected>Select Term</option>
            <option value="1st Year">1st Year</option>
            <option value="2nd Year">2nd Year</option>
            <option value="3rd Year">3rd Year</option>
            <option value="4th Year">4th Year</option>
            <option value="Non Block">Non Block</option>
        </select>

        <p>Select Department:</p>
        <select class="form-input" name="department_id" required>
            <option value="" disabled selected>Select Department</option>
            <?php foreach ($departmentList as $department): ?>
                <option value="<?= $department['DepartmentID'] ?>">
                    <?= $department['DepartmentID'] . " - " . $department['DepartmentName'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <div class="button-group">
            <button class="btn btn-add" type="submit">Add Student</button>
        </div>
    </form>
</body>
</html>
