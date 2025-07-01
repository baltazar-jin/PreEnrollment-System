<?php
require_once(__DIR__ . '/../dbconnect.php');


class College {
    public function create($data) {
        global $conn;

        $stmt = $conn->prepare(
            "INSERT INTO COLLEGE (
                CollegeName 
            )  VALUES (?)"
        );

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "s", 
            $data['college_name']
        );

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function getAll() {
        global $conn;

        $sql = "SELECT CollegeID, CollegeName FROM COLLEGE";
        $result = $conn->query($sql);
        
        $college = [];

        while ($row = $result->fetch_assoc()) {
            $college[] = $row;
        }

        return $college;
    }
     

}
