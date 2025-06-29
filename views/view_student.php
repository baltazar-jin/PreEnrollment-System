<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enrolled Students</title>
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

        .table-container {
            background-color: white;
            padding: 30px;
            max-width: 1800px;
            margin: 30px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
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

        td:nth-child(1),
        td:nth-child(8) {
            width: 70px;
        }

        td:nth-child(7),{
            width: 100px;
        }

        td:nth-child(2),
        td:nth-child(3),
        td:nth-child(4),
        td:nth-child(9),
        td:nth-child(10) {
            width: 220px;
        }
    </style>
</head>
<body>

    <div class="header-panel">
        Pre-Enrollment System
    </div>

    <div class="notice-bar">
        Student List
    </div>

    <div class="table-container">
        <a href="../views/homepage.php" class="btn-back">← Back to Homepage</a>
        <table>
            <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Course</th>
                <th>School Year</th>
                <th>Term</th>
                <th>Dept. ID</th>
                <th>Department</th>
                <th>College</th>
            </tr>
            <?php while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $row['StudentID'] ?></td>
                <td><?= $row['StudentFirstName'] ?></td>
                <td><?= $row['StudentMiddleName'] ?></td>
                <td><?= $row['StudentLastName'] ?></td>
                <td><?= $row['Course'] ?></td>
                <td><?= $row['School_Year'] ?></td>
                <td><?= $row['TermToEnroll'] ?></td>
                <td><?= $row['DepartmentID'] ?></td>
                <td><?= $row['DepartmentName'] ?></td>
                <td><?= $row['CollegeName'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>
