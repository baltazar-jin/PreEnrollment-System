<?php
require_once('../models/Department.php');

$action = $_GET['action'] ?? '';

$department = new Department();

if ($action === 'submit') {
    $success = $department->create($_POST);
    echo json_encode(['status' => $success ? 'success' : 'error']);
    exit();
}

