<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . "/../../helpers/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Information Management App</title>
  <!-- used this css link to get the animation on the flash messages. -->
  <link rel="stylesheet" href="/StudentsApp/public/style.css?v=<?= time() ?>">

</head>
<body>
