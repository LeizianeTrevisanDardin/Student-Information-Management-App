<?php
if (session_status() === PHP_SESSION_NONE) session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . "/../helpers/auth.php";
require_once __DIR__ . "/../controllers/AuthController.php";


if (is_user_logged_in()) redirect("dashboard.php");

$controller = new AuthController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->register();

    if (($_SESSION["message_type"] ?? "") === "success") {
        redirect("login.php");
    }

   
    redirect("register.php");
}


require_once __DIR__ . "/../views/partials/header.php";
require_once __DIR__ . "/../views/partials/navigation.php";
require_once __DIR__ . "/../views/partials/flash.php"; 
include __DIR__ . "/../views/register.php";
