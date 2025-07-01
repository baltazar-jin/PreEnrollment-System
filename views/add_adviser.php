<?php
require_once('../models/Adviser.php');
require_once('../models/Department.php');

$departmentModel = new Department();
$departmentList = $departmentModel->getAll();
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

        .spacing-btn {
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <div class="spacing-btn">
        <a href="#" class="btn-home" onclick="loadPage('view_adviser', this)">View Adviser List</a>
    </div>
    <form id="addAdviserForm" method="POST">
        <p>Enter Faculty First Name:</p>
        <input class="form-input" name="first_name" placeholder="First Name" required>

        <p>Enter Faculty Middle Name:</p>
        <input class="form-input" name="middle_name" placeholder="Middle Name" required>

        <p>Enter Faculty Last Name:</p>
        <input class="form-input" name="last_name" placeholder="Last Name" required>

        <p>Select Department for Adviser:</p>
        <select class="form-input" name="department_id" required>
            <option value="" disabled selected>Select Department</option>
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
</body>
</html>
