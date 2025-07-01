<?php
require_once('../models/Offer.php');

$action = $_GET['action'] ?? '';

$offer = new Offer();

if ($action === 'submit') {
    $success = $offer->create($_POST);
    echo json_encode(['status' => $success ? 'success' : 'error']);
    exit();
}

