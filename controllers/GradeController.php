<?php
require_once('../models/Grade.php');

$action = $_GET['action'] ?? '';

$grade = new Grade();

if ($action === 'submit') {
    $success = $grade->create($_POST);
    echo json_encode(['status' => $success ? 'success' : 'error']);
    exit();
}


