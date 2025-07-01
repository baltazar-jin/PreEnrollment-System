<?php
require_once('../models/Department.php');
require_once('../models/College.php');
$college = new College();
$collegeList = $college->getAll(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Department</title>
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
            margin: 20px left;
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
            margin-bottom: 40px;
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

        .form{
            margin-bottom: 60px;
        }

        #popup {
            visibility: hidden;
            min-width: 250px;
            background-color: #28a745;
            color: white;
            text-align: center;
            border-radius: 4px;
            padding: 12px;
            position: fixed;
            z-index: 1000;
            left: 50%;
            bottom: 30px;
            font-size: 16px;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.5s ease, visibility 0.5s;
        }

        #popup.show {
            visibility: visible;
            opacity: 1;
        }

    </style>
</head>
<body>
    <form id="addDepartmentForm" method="POST">
        <p>Enter Enter Department:(e.g. Department of Computer Engineering)</p>
        <input class="form-input" name="department_name" placeholder="Department Name" required>
        <p>Select the College/School the department belongs to:</p>
            <select class="form-input" name="college_id" id="college_id" required>
            <option value="" disabled selected>Select College ID</option>
            <?php foreach ($collegeList as $college): ?>
                <option value="<?= $college['CollegeID'] ?>">
                    <?= $college['CollegeID'] . " - " . $college['CollegeName'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="button-group">
            <button class="btn btn-add" type="submit">Add Department</button>
        </div>
    </form>
</body>
</html>
