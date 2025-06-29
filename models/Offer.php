<?php
require_once(__DIR__ . '/../dbconnect.php');

class Offer {
    public function create($data) {
        global $conn;

        $stmt = $conn->prepare(
            "INSERT INTO OFFER (
                OfferCode, 
                SubjectCode, 
                Room, 
                Time_sched, 
                Days
            ) VALUES (?, ?, ?, ?, ?)"
        );
        
        $days = isset($data['days']) ? implode(', ', $data['days']) : '';

        $stmt->bind_param(
            "sisss", // i = INT, s = STRING
            $data['offer_code'],
            $data['subject_code'],
            $data['room'],
            $data['time_sched'],
            $days
        );

        $stmt->execute();
    }

    public function getAll() {
        global $conn;

        $sql = "SELECT 
                    o.OfferCode,
                    o.Room,
                    o.Time_sched,
                    o.Days AS Day,
                    s.SubjectCode,
                    s.SubjectDescription,
                    s.Units
                FROM OFFER o
                JOIN SUBJECTS s ON o.SubjectCode = s.SubjectCode";

        return $conn->query($sql);
    }
}
