<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pre-Enrollment Homepage</title>
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

        .btn {
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        .btn-add_student {
            background-color: #007bff;
        }
        .btn-add_student:hover {
            background-color: #0056b3;
        }

        .btn-add {
            background-color: #28a745;
        }

        .btn-add:hover {
            background-color: #1e7e34;
        }

        .menu {
            background-color: white;
            padding: 30px;
            max-width: 600px;
            margin: 30px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center; /* ✅ CENTER EVERYTHING INLINE */
        }

        .btn{
            text-decoration: none;
            cursor: pointer;
            color: white;
            display: inline-block;
        }

        .button-center-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }
    </style>
       
</head>
<body>

    <!-- Header Section -->
    <div class="header-panel">
        Pre-Enrollment System
    </div>

    <!-- Sub-header Notification -->
    <div class="notice-bar">
    </div>

    <!-- Menu Bar-->   
    <div class="menu">
       <img src="../assets/University_of_San_Jose–Recoletos_logo.png"
        alt="School Logo"
        style="display: block; height: 150px; width: auto; margin: 0 auto 20px;">
        <p>Welcome to Admin View Homepage</p>
        <p>Select options:</p>
        <div class="button-center-group">
            <a href="add_student.php" class="btn btn-add">Add Student</a>
            <a href="../controllers/StudentController.php?action=view" class="btn btn btn-add">View Student List</a>
            <a href="add_adviser.php" class="btn btn-add">Add Adviser</a>
            <a href="../controllers/AdviserController.php?action=view" class="btn btn-add">View Adviser List</a>
            <a href="add_subjects.php" class="btn btn-add">Add Subject</a>
            <a href="add_offer.php" class="btn btn-add">Add Offer</a>
            <a href="../controllers/OfferController.php?action=view" class="btn btn-add">View Subjects and Offer Code List</a>
            <a href="add_offer.php" class="btn btn-add">Add Grade</a>
            <a href="add_offer.php" class="btn btn-add">Add Department</a>
        </div>
    </div>

</body>
</html>
