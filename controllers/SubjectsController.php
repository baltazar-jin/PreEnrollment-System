<?php
require_once('../models/Subjects.php');

$action = $_GET['action'] ?? '';

$subjects = new Subjects();

if ($action === 'submit') {
    $subjects->create($_POST);
    header("Location: ../views/success.php");
    exit();
}

if ($action === 'view') {
    $data = $subjects->getAll();
    include '../views/view_subjects.php';
}
