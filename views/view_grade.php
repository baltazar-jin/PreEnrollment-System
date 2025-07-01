<?php
require_once('../models/Grade.php');
$grade = new Grade();
$data = $grade->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Grade List</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3eee9;
        }

        .table-container {
            background-color: transparent;
            max-width: 1300px;
            margin: 30px auto;
            position: relative;
        }

        .btn-back {
            position: absolute;
            top: 20px;
            right: 30px;
            padding: 10px 16px;
            background-color: #007bff;
            color: white;
            font-size: 14px;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 60px;
        }

        th, td {
            padding: 10px 8px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #14361c;
            color: white;
        }

        td:nth-child(1) { width: 80px; }
        td:nth-child(2) { width: 200px; }
        td:nth-child(3),
        td:nth-child(4),
        td:nth-child(5),
        td:nth-child(6),
        td:nth-child(7) { width: 120px; }

    </style>
</head>
<body>
    <div class="table-container">
        <table>
            <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Subject</th>
                <th>Prelim Grade</th>
                <th>Midterm Grade</th>
                <th>Final Grade</th>
                <th>Units</th>
            </tr>
            <?php while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $row['StudentID'] ?></td>
                <td><?= $row['StudentLastName'] . ', ' . $row['StudentFirstName'] . ' ' . $row['StudentMiddleName'] ?></td>
                <td><?= $row['SubjectDescription'] ?></td>
                <td><?= $row['PrelimGrade'] ?></td>
                <td><?= $row['MidtermGrade'] ?></td>
                <td><?= $row['FinalGrade'] ?></td>
                <td><?= $row['Units'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
