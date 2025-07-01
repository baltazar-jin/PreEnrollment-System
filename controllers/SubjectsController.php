<?php
require_once('../models/Subjects.php');

$action = $_GET['action'] ?? '';

$subjects = new Subjects();

if ($action === 'submit') {
    $success = $subjects->create($_POST);
    echo json_encode(['status' => $success ? 'success' : 'error']);
    exit();
}

