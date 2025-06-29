<?php
require_once('../models/Subjects.php');
$subjects = new Subjects();
$subjectList = $subjects->getAll(); // Fetch subject_code and subject_name
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Offer</title>
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
            background-color: #28abe2;
        }

        .btn-add:hover {
            background-color: #128596;
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

        .checkbox-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
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

    <div class="header-panel">
        <p>Pre-Enrollment System</p>
    </div>

    <div class="notice-bar">
    </div>

    <div class="form-container">
        <div class="spacing-btn">
            <a href="homepage.php" class="btn-home">← Back to Homepage</a>
        </div>
        <form method="POST" action="../controllers/OfferController.php?action=submit">
            <h3>Fill in the details required to add an offer code to the subject.</h3>

            <!-- Subject Code Dropdown -->
            <p>Select Subject Code:</p>
            <select class="form-input" name="subject_code" id="subject_code" required>
                <option value="" disabled selected>Select Subject</option>
                <?php foreach ($subjectList as $subject): ?>
                    <option value="<?= $subject['SubjectCode'] ?>">
                        <?= $subject['SubjectCode'] . " - " . $subject['SubjectDescription'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <p>Enter Offer Code to the Subject:</p>
            <input class="form-input" name="offer_code" placeholder="Offer Code" required>
            <!-- Room Selection -->
            <p>Select Room:</p>
            <select class="form-input" name="room" id="room" required>
                <option value="" disabled selected>Select Room</option>
                <option value="B1-05">B1-05</option>
                <option value="SN 101">SN 101</option>
                <option value="B1-04">B1-04</option>
                <option value="RM 301">RM 301</option>
            </select>

            <!-- Time Picker -->
            <p>Select Time Start:</p>
            <input class="form-input" type="time" name="time_start" required>

            <p>Select Time End:</p>
            <input class="form-input" type="time" name="time_end" required>

            <!-- Day Checkboxes -->
            <div class="spacing">
                <p>Select Days (Can be multiple):</p>
            </div>

            <div class="checkbox-group">
                <label><input type="checkbox" name="days[]" value="M"> Monday</label>
                <label><input type="checkbox" name="days[]" value="T"> Tuesday</label>
                <label><input type="checkbox" name="days[]" value="W"> Wednesday</label>
                <label><input type="checkbox" name="days[]" value="Th"> Thursday</label>
                <label><input type="checkbox" name="days[]" value="F"> Friday</label>
            </div>

            <!-- Buttons -->
            <div class="button-group">
                <button class="btn btn-add" type="submit">Add Offer</button>
            </div>
        </form>
    </div>

</body>
</html>
