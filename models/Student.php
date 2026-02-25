<?php

class Student {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAllByUser(int $userId) {
        $stmt = $this->conn->prepare(
            "SELECT id, student_id, name, email 
             FROM students 
             WHERE user_id = ? 
             ORDER BY id DESC"
        );
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function create(string $studentId, string $name, string $email, int $userId) {
        //check the duplicates
        $check = $this->conn->prepare(
            "SELECT id FROM students WHERE student_id = ? AND user_id = ?"
        );
        $check->bind_param("si", $studentId, $userId);
        $check->execute();
        $check->store_result();
     
        $exists = $check ->num_rows > 0;

        if ($exists) {
            return [
                "ok" => false, 
                "error" => "This Student Id already exists.Please choose another Id number."
                ];
        }


        $stmt = $this->conn->prepare(
            "INSERT INTO students (student_id, name, email, user_id) 
             VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("sssi", $studentId, $name, $email, $userId);

        $ok = $stmt-> execute();

        return ["ok" => $ok, "error" => $ok ? null : "Failed to create student."];
    }

    public function delete(int $id, int $userId) {
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $id, $userId);
        return $stmt->execute();
    }
}
