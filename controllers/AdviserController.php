<?php
require_once('../models/Adviser.php');

$action = $_GET['action'] ?? '';

$adviser = new Adviser();

if ($action === 'submit') {
    $adviser->create($_POST);
    header("Location: ../views/success.php");
    exit();
}

if ($action === 'view') {
    $data = $adviser->getAll();
    include '../views/view_adviser.php';
}
