<?php
require_once('../models/Student.php');

$action = $_GET['action'] ?? '';

$student = new Student();

if ($action === 'submit') {
    $success = $student->create($_POST);

    echo json_encode(['status' => 'success']);
    exit();
}
