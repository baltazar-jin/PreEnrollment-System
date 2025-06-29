<?php
require_once('../models/Subjects.php');
$subjects = new Subjects();
$subjectList = $subjects->getAll(); // Fetch subject_code and subject_name
require_once('../models/Student.php');
$student = new Student();
$studentList = $student->getStudentsList();
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
            max-width: 400px;
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

        .btnSpace {
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
        <div class="btnSpace">
            <a href="homepage.php" class="btn-home">← Back to Homepage</a>
        </div>
        <form method="POST" action="../controllers/GradeController.php?action=submit">
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
    </div>

</body>
</html>
