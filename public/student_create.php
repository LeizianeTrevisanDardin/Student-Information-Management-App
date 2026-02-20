<?php

require_once __DIR__ . "/../helpers/auth.php";
require_once __DIR__ . "/../controllers/StudentController.php";
require_once __DIR__ . '/../config/bootstrap.php';

require_login();

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    redirect("dashboard.php");
}

$controller = new StudentController();
$controller->create((int)$_SESSION["user_id"]);

redirect("dashboard.php");