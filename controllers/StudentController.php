<?php

require_once __DIR__ ."/../config/Database.php";
require_once __DIR__ ."/../models/Student.php";

class StudentController {
    private $studentModel;
    
    public function __construct() {
    $db = (new Database())->connect();
    $this->studentModel = new Student($db);
    } 

    public function index(int $userId) {
        return $this->studentModel->readAllByUser($userId);
    }


    public function create(int $userId) {
        $studentId = trim($_POST["student_id"] ?? "");
        $name = trim($_POST["name"] ?? "");
        $email = trim($_POST["email"] ?? "");

        //validations:
        if($studentId ==="" || $name === "" || $email === ""){
            $_SESSION["message"] = "All student fields are required";
            $_SESSION["message_type"] = "error";
            return false;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["message"] = "Invalid Student email";
            $_SESSION["message_type"] = "error";
            return false;
        }

        $result = $this->studentModel->create($studentId, $name, $email, $userId);

        if(!empty($result["ok"])) {
            $_SESSION["message"] = "Student added successfully";
            $_SESSION["message_type"] = "success";
            return true;
        } 

        $_SESSION["message"] = $result["error"] ?? "Failed to add student.";
        $_SESSION["message_type"] = "error";
        return false;
    }       

    public function delete(int $id, int $userId) {
        $ok = $this->studentModel->delete($id, $userId);
        $_SESSION["message"] = $ok ? "Student deleted" : "Student not deleted";
        $_SESSION["message_type"] = $ok ? "success" : "error";
        return $ok;
    }
}