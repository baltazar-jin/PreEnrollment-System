<?php
require_once('../models/Department.php');

$action = $_GET['action'] ?? '';

$department = new Department();

if ($action === 'submit') {
    $adviser->create($_POST);
    header("Location: ../views/success.php");
    exit();
}

if ($action === 'view') {
    $data = $adviser->getAll();
    include '../views/view_adviser.php';
}
