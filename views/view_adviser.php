<?php
require_once('../models/Adviser.php');
$adviser = new Adviser();
$data = $adviser->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adviser List</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3eee9;
        }

        .table-container {
            background-color: transparent;
            max-width: 1800px;
            margin: 30px auto;
            position: relative;
        }

        .btn-back {
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

        td:nth-child(1),
        td:nth-child(5) {
            width: 70px;
        }

        td:nth-child(2),
        td:nth-child(3),
        td:nth-child(4),
        td:nth-child(6),
        td:nth-child(7) {
            width: 220px;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <a href="#" class="btn-back" onclick="loadPage('add_adviser', this)">← Back to Add Adviser</a>

        <table>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Dept. ID</th>
                <th>Department</th>
                <th>College</th>
            </tr>
            <?php while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $row['EmployeeID'] ?></td>
                <td><?= $row['FacultyFirstName'] ?></td>
                <td><?= $row['FacultyMiddleName'] ?></td>
                <td><?= $row['FacultyLastName'] ?></td>
                <td><?= $row['DepartmentID'] ?></td>
                <td><?= $row['DepartmentName'] ?></td>
                <td><?= $row['CollegeName'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
