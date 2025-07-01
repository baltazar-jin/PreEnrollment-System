<?php
require_once('../models/Subjects.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Subject</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3eee9;
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
    <form id="addSubjectForm" method="POST">
        <p>Enter Subject Description (e.g. Database Management)</p>
        <input class="form-input" name="subject_description" placeholder="Subject Description/Name" required>
        <p name="form-input">Enter Units from 1.00 - 5.00 (Must be in decimal)</p>
        <input class="form-input" name="units" placeholder="Total Units (e.g. 3.00)" required>
        
        <div class="button-group">
            <button class="btn btn-add" type="submit">Add Subject</button>
        </div>
    </form>
</body>
</html>
