<?php
require_once(__DIR__ . '/../dbconnect.php');


class Grade {
    public function create($data) {
        global $conn;

        $stmt = $conn->prepare(
            "INSERT INTO GRADE (
                PrelimGrade, 
                MidtermGrade, 
                FinalGrade,
                SubjectCode,
                StudentID 
            )  VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "dddii", 
            $data['prelim_grade'], 
            $data['midterm_grade'], 
            $data['final_grade'], 
            $data['subject_code'],
            $data['student_id']
        );
        $stmt->execute();
    }

    public function getAll() {
        global $conn;
        $sql = "SELECT 
                s.StudentID,
                s.StudentFirstName,
                s.StudentMiddleName,
                s.StudentLastName,
                sub.SubjectDescription,
                g.PrelimGrade,
                g.MidtermGrade,
                g.FinalGrade,
                sub.Units
                FROM GRADE g
                JOIN subjects sub ON g.SubjectCode = sub.SubjectCode
                JOIN student s ON g.StudentID = s.StudentID";
        return $conn->query($sql);
    }

}
