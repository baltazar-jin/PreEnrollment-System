<?php
require_once(__DIR__ . '/../dbconnect.php');


class Student {
    public function create($data) {
        global $conn;
        $id = $this->generateID();
        $stmt = $conn->prepare("INSERT INTO STUDENT (StudentID, StudentFirstName, StudentLastName, Course, School_Year) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $id, $data['first_name'], $data['last_name'], $data['course'], $data['school_year']);
        $stmt->execute();
    }

    public function getAll() {
        global $conn;
        return $conn->query("SELECT * FROM STUDENT");
    }

    private function generateID() {
        global $conn;
        $result = $conn->query("SELECT MAX(StudentID) as max_id FROM STUDENT");
        $row = $result->fetch_assoc();
        return $row['max_id'] + 1;
    }
}
