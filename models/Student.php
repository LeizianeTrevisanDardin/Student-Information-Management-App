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
        $stmt = $this->conn->prepare(
            "INSERT INTO students (student_id, name, email, user_id) 
             VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("sssi", $studentId, $name, $email, $userId);
        return $stmt->execute();
    }

    public function delete(int $id, int $userId) {
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $id, $userId);
        return $stmt->execute();
    }
}
