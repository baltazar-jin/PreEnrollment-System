<?php
require_once('../models/College.php');

$action = $_GET['action'] ?? '';

$college = new College();

if ($action === 'submit') {
    $success = $college->create($_POST);
    echo json_encode(['status' => $success ? 'success' : 'error']);
    exit();
}

