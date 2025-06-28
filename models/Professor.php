<?php
require_once(__DIR__ . '/../dbconnect.php');


class Professor {
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

        $stmt->bind_param(
            "sssi", 
            $data['first_name'], 
            $data['middle_name'], 
            $data['last_name'], 
            $data['department_id']
        );
        $stmt->execute();
    }

    public function getAll() {
        global $conn;
        return $conn->query("
            SELECT 
            a.FacultyID, 
            a.FacultyFirstName, 
            a.FacultyMiddleName, 
            a.FacultyLastName, 
            d.DepartmentName, 
            c.CollegeName
            FROM ADVISER a
            JOIN DEPARTMENT d ON a.DepartmentID = d.DepartmentID
            JOIN COLLEGE c ON d.CollegeID = c.CollegeID
        ");
    }
}
