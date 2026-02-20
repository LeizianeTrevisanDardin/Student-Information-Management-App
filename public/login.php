<?php
require_once __DIR__ . "/../views/partials/header.php";
require_once __DIR__ . "/../views/partials/navigation.php";
require_once __DIR__ . "/../helpers/auth.php";
require_once __DIR__ . "/../controllers/AuthController.php";
require_once __DIR__ . '/../config/bootstrap.php';

if (is_user_logged_in()) redirect("dashboard.php");

$controller = new AuthController();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $ok= $controller->login();
    if($ok) redirect("dashboard.php");
    redirect("login.php");
}

include __DIR__ . "/../views/login.php";