<?php

if (session_status() === PHP_SESSION_NONE) session_start();


require_once __DIR__ . "/../helpers/auth.php";
require_once __DIR__ . "/../controllers/StudentController.php";
require_once __DIR__ . '/../config/bootstrap.php';



require_login();
if (empty($_SESSION["user_id"])) {
  $_SESSION["message"] = "Session user_id missing. Please login again.";
  $_SESSION["message_type"] = "error";
  redirect("login.php");
}


$controller = new StudentController();
$students = $controller->index((int) $_SESSION["user_id"]);

include __DIR__ . "/../views/dashboard.php";