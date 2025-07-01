<?php
require_once(__DIR__ . '/../dbconnect.php');


class Department {
    public function create($data) {
        global $conn;

        $stmt = $conn->prepare(
            "INSERT INTO DEPARTMENT (
                DepartmentName, 
                CollegeID
            )  VALUES (?, ?)"
        );

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "si", 
            $data['department_name'], 
            $data['college_id']
        );

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function getAll() {
        global $conn;

        $sql = "SELECT DepartmentID, DepartmentName FROM DEPARTMENT";
        $result = $conn->query($sql);
        
        $department = [];

        while ($row = $result->fetch_assoc()) {
            $department[] = $row;
        }

        return $department;
    }

}
