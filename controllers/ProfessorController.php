<?php
require_once('../models/Professor.php')

$action = $_GET['action'] ?? '';

$professor = new Professor();

if ($action === 'submit') {
    $professor->create($_POST);
    header("Location: ../views/success.php");
    exit();
}

if ($action === 'view') {
    $data = $professor->getAll();
    include '../views/view_professor.php';
}
