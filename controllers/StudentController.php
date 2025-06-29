<?php
require_once('../models/Student.php');

$action = $_GET['action'] ?? '';

$student = new Student();

if ($action === 'submit') {
    $student->create($_POST);
    header("Location: ../views/success.php");
    exit();
}

if ($action === 'view') {
    $data = $student->getAll();
    include '../views/view_student.php';
}
