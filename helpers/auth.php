<?php

if(session_status() === PHP_SESSION_NONE) session_start();

function redirect($location){
  header("Location: $location");
  exit;
}


function is_user_logged_in(){
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}


function require_login(){
    if(!is_user_logged_in()){
        $_SESSION["message"] = "Please login";
        $_SESSION["message_type"] = "error";
        redirect("login.php");
    }
}

//researching I found that to avoid sql injections, stmt(statement) is used to avoid them
function user_exists($conn, string $username): bool {
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result && $result->num_rows > 0;
}


function setActiveClass(string $fileName): string {
    $current = basename($_SERVER["PHP_SELF"]); // ex: index.php
    return $current === $fileName ? "active" : "";
}