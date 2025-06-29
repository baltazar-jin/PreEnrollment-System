<?php
require_once('../models/Offer.php');

$action = $_GET['action'] ?? '';

$offer = new Offer();

if ($action === 'submit') {
    $offer->create($_POST);
    header("Location: ../views/success.php");
    exit();
}

if ($action === 'view') {
    $data = $offer->getAll();
    include '../views/view_subjects_offer.php';
}
