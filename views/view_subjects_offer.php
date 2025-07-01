<?php
require_once('../models/Offer.php');
require_once('../models/Subjects.php');

$offer = new Offer();
$data = $offer->getAll(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subject and Offer Code List</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3eee9;
        }

        .table-container {
            background-color: transparent;
            max-width: 1500px;
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

        td:nth-child(1),
        td:nth-child(7) {
            width: 70px;
        }

        td:nth-child(2) {
            width: 350px;
        }

        td:nth-child(3),
        td:nth-child(4),
        td:nth-child(5) {
            width: 150px;
        }

        td:nth-child(6) {
            width: 250px;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <table>
            <tr>
                <th>Subject Code</th>
                <th>Subject Description</th>
                <th>Offer Code</th>
                <th>Room</th>
                <th>Time</th>
                <th>Day</th>
                <th>Units</th>
            </tr>
            <?php while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $row['SubjectCode'] ?></td>
                <td><?= $row['SubjectDescription'] ?></td>
                <td><?= $row['OfferCode'] ?></td>
                <td><?= $row['Room'] ?></td>
                <td><?= $row['Time_sched'] ?></td>
                <td><?= $row['Day'] ?></td>
                <td><?= $row['Units'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>
