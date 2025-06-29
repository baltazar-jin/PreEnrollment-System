<?php
require_once(__DIR__ . '/../dbconnect.php');


class Subjects {
    public function create($data) {
        global $conn;

        $stmt = $conn->prepare(
            "INSERT INTO SUBJECTS (
                SubjectDescription, 
                Units
            )  VALUES (?, ?)"
        );

        $stmt->bind_param(
            "sd", 
            $data['subject_description'], 
            $data['units']
        );
        $stmt->execute();
    }

    public function getAll() {
        global $conn;

        $sql = "SELECT SubjectCode, SubjectDescription FROM SUBJECTS";
        $result = $conn->query($sql);
        
        $subjects = [];

        while ($row = $result->fetch_assoc()) {
            $subjects[] = $row;
        }

        return $subjects;
    }

}
