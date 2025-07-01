<?php
require_once('../models/Subjects.php');
$subjects = new Subjects();
$subjectList = $subjects->getAll(); // Fetch subject_code and subject_name
require_once('../models/Student.php');
$student = new Student();
$studentList = $student->getStudentsList();
require_once('../models/Grade.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Grade</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3eee9;
        }

        .form-container {
            background-color: transparent;
            max-width: 400px;
            margin: 30px auto;
            position: relative;
        }

        .form-input {
            width: 40%;
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

        .btnSpace {
            margin-bottom: 50px;
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
    <form id="addGradeForm" method="POST">
        <p>Enter Prelim Grade:</p>
        <input class="form-input" name="prelim_grade" placeholder="Prelim Grade" required>
        <p>Enter Midterm Grade:</p>
        <input class="form-input" name="midterm_grade" placeholder="Midterm Grade" required>
        <p>Enter Final Grade:</p>
        <input class="form-input" name="final_grade" placeholder="Final Grade" required>
        <p>Select Subject Code:</p>
        <select class="form-input" name="subject_code" id="subject_code" required>
            <option value="" disabled selected>Select Subject</option>
            <?php foreach ($subjectList as $subject): ?>
                <option value="<?= $subject['SubjectCode'] ?>">
                    <?= $subject['SubjectCode'] . " - " . $subject['SubjectDescription'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <p>Select Student through ID:</p>
        <select class="form-input" name="student_id" id="student_id" required>
            <option value="" disabled selected>Select Student</option>
            <?php foreach ($studentList as $student): ?>
                <option value="<?= $student['StudentID'] ?>">
                    <?= $student['StudentID'] . " - " . $student['StudentFirstName'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <div class="button-group">
            <button class="btn btn-add" type="submit">Submit Grades to Student</button>
        </div>
    </form>
</body>
</html>
