<?php
require_once('../models/College.php');

$action = $_GET['action'] ?? '';

$college = new College();

if ($action === 'submit') {
    $college->create($_POST);
    header("Location: ../views/success.php");
    exit();
}

if ($action === 'view') {
    $data = $college->getAll();
    include '../views/view_adviser.php';
}
