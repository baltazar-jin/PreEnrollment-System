<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h2>Enrolled Students</h2>
    <table border="1">
        <tr>
            <th>ID</th><th>First</th><th>Last</th><th>Course</th><th>SY</th>
        </tr>
        <?php while ($row = $data->fetch_assoc()): ?>
        <tr>
            <td><?= $row['StudentID'] ?></td>
            <td><?= $row['StudentFirstName'] ?></td>
            <td><?= $row['StudentMiddleName'] ?></td>
            <td><?= $row['StudentLastName'] ?></td>
            <td><?= $row['Course'] ?></td>
            <td><?= $row['School_Year'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="../views/enroll_form.php"><button>Back</button></a>
</body>
</html>
