<?php
require_once(__DIR__ . '/../dbconnect.php');


class Adviser {
    public function create($data) {
        global $conn;

        $stmt = $conn->prepare(
            "INSERT INTO ADVISER (
                FacultyFirstName, 
                FacultyMiddleName, 
                FacultyLastName, 
                DepartmentID
            )  VALUES (?, ?, ?, ?)"
        );

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "sssi", 
            $data['first_name'], 
            $data['middle_name'], 
            $data['last_name'], 
            $data['department_id']
        );
        
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function getAll() {
        global $conn;
        $sql = "SELECT 
                a.EmployeeID,
                a.FacultyFirstName,
                a.FacultyMiddleName,
                a.FacultyLastName,
                a.DepartmentID,
                d.DepartmentName,
                c.CollegeName
                FROM ADVISER a
                JOIN department d ON a.DepartmentID = d.DepartmentID
                JOIN college c ON d.CollegeID = c.CollegeID";
        return $conn->query($sql);
    }

}
