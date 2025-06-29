<?php
require_once(__DIR__ . '/../dbconnect.php');


class Student {
    public function create($data) {
        global $conn;

        $stmt = $conn->prepare(
            "INSERT INTO STUDENT (
                StudentFirstName, 
                StudentMiddleName, 
                StudentLastName, 
                Course, 
                School_Year, 
                TermToEnroll, 
                DepartmentID
            ) VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "ssssisi", // No more ID (AUTO_INCREMENT)
            $data['firstname'],
            $data['middlename'],
            $data['lastname'],
            $data['course'],
            $data['school_year'],
            $data['term'],
            $data['department_id']
        );
        $stmt->execute();
    }

    public function getAll(){
        global $conn;
        $sql = "SELECT 
                s.StudentID,
                s.StudentFirstName,
                s.StudentMiddleName,
                s.StudentLastName,
                s.Course,
                s.School_Year,
                s.TermToEnroll,
                s.DepartmentID,
                d.DepartmentName,
                c.CollegeName
            FROM STUDENT s
            JOIN department d ON s.DepartmentID = d.DepartmentID
            JOIN college c ON d.CollegeID = c.CollegeID";
        return $conn->query($sql);
    }
}
