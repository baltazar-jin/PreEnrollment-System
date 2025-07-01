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
                DepartmentID,
                EmployeeID
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "ssssisii", 
            $data['firstname'],
            $data['middlename'],
            $data['lastname'],
            $data['course'],
            $data['school_year'],
            $data['term'],
            $data['department_id'],
            $data['employee_id']
        );

        $result = $stmt->execute();
        $stmt->close();

        return $result;
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
                s.EmployeeID,
                c.CollegeName
            FROM STUDENT s
            JOIN department d ON s.DepartmentID = d.DepartmentID
            JOIN college c ON d.CollegeID = c.CollegeID";
        return $conn->query($sql);
    }

    public function getStudentsList(){
        global $conn;

        $sql = "SELECT StudentID, StudentFirstName FROM STUDENT";
        $result = $conn->query($sql);
        
        $student = [];

        while ($row = $result->fetch_assoc()) {
            $student[] = $row;
        }

        return $student;
    }
}
