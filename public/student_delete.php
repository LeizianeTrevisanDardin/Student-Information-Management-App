<?php

if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . "/../helpers/auth.php";
require_once __DIR__ . "/../controllers/StudentController.php";
require_once __DIR__ . '/../config/bootstrap.php';

require_login();

$id = (int)($_GET["id"] ?? 0);
if($id > 0) {
    (new StudentController())->delete($id, (int)$_SESSION["user_id"]);
}

redirect("dashboard.php");