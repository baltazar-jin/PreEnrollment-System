<?php
require_once('../models/Department.php');
$department = new Department();
$departmentList = $department->getAll(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Adviser</title>
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

        .btn-add {
            background-color: #007bff;
        }

        .btn-add:hover {
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

        .btnspace{
            margin-bottom: 50px;
        }
    </style>
</head>
<body>

    <div class="header-panel">
        Pre-Enrollment System
    </div>

    <div class="notice-bar">
    </div>

    <div class="form-container">
        <div class="btnspace">
            <a href="homepage.php" class="btn-home">← Back to Homepage</a>
        </div>
        <form method="POST" action="../controllers/AdviserController.php?action=submit">
            <p>Enter Faculty First Name:</p>
            <input class="form-input" name="first_name" placeholder="First Name" required>
            <p>Enter Faculty Middle Name:</p>
            <input class="form-input" name="middle_name" placeholder="Middle Name" required>
            <p>Enter Faculty Last Name:</p>
            <input class="form-input" name="last_name" placeholder="Last Name" required>
            <p>Select Department for Adviser:</p>
            <select class="form-input" name="department_id" id="department_id" required>
                <option value="" disabled selected>Select Department ID</option>
                <?php foreach ($departmentList as $department): ?>
                    <option value="<?= $department['DepartmentID'] ?>">
                        <?= $department['DepartmentID'] . " - " . $department['DepartmentName'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <div class="button-group">
                <button class="btn btn-add" type="submit">Add Adviser</button>
            </div>
        </form>
    </div>

</body>
</html>
