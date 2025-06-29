<?php
require_once('../models/Grade.php');

$action = $_GET['action'] ?? '';

$grade = new Grade();

if ($action === 'submit') {
    $grade->create($_POST);
    header("Location: ../views/success.php");
    exit();
}

if ($action === 'view') {
    $data = $grade->getAll();
    include '../views/view_grade.php';
}
