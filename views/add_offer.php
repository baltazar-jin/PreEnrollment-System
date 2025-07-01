<?php
require_once('../models/Offer.php');
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

        .btn-view-link {
            background-color: #28a745;
            text-decoration: none;
        }

        .btn-view-link:hover {
            background-color: #1e7e34;
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
    <form id="addOfferForm" method="POST">
        <p>Select Subject Code:</p>
        <select class="form-input" name="subject_code" id="subject_code" required>
            <option value="" disabled selected>Select Subject</option>
            <?php foreach ($subjectList as $subject): ?>
                <option value="<?= $subject['SubjectCode'] ?>">
                    <?= $subject['SubjectCode'] . " - " . $subject['SubjectDescription'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <p>Enter Offer Code to the Subject (this field must be unique/different):</p>
        <input class="form-input" name="offer_code" placeholder="Offer Code" required>
        <p>Enter Room:</p>
        <input class="form-input" name="room" placeholder="Enter Room (e.g. SN102, SN103)" required>
        <p>Enter Starting Time to End Time:</p>
        <input class="form-input" name="time_sched" placeholder="Enter Time (e.g. 9:00AM - 10:00AM)" required>
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
        <div class="button-group">
            <button class="btn btn-add" type="submit">Add Offer</button>
        </div>
    </form>
</body>
</html>
