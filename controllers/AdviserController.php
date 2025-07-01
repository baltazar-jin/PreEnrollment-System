<?php
require_once('../models/Adviser.php');

$action = $_GET['action'] ?? '';

$adviser = new Adviser();

if ($action === 'submit') {
    $success = $adviser->create($_POST);
    echo json_encode(['status' => $success ? 'success' : 'error']);
    exit();
}


