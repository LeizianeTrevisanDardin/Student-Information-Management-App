<?php

class User {
    private mysqli $conn;
    private ?string $lastError = null;

    public function __construct(mysqli $db) {
        $this->conn = $db;
    }

    public function getLastError(): ?string {
        return $this->lastError;
    }

    public function findByEmail(string $email): ?array {
        $sql = "SELECT id, username, email, password FROM users WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            $this->lastError = "Prepare failed (findByEmail): " . $this->conn->error;
            return null;
        }

        $stmt->bind_param("s", $email);

        if (!$stmt->execute()) {
            $this->lastError = "Execute failed (findByEmail): " . $stmt->error;
            return null;
        }

        $result = $stmt->get_result();
        $user = $result ? $result->fetch_assoc() : null;

        $stmt->close();
        return $user ?: null;
    }

    public function create(string $username, string $email, string $hash): bool {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            $this->lastError = "Prepare failed (create): " . $this->conn->error;
            return false;
        }

        $stmt->bind_param("sss", $username, $email, $hash);

        if (!$stmt->execute()) {
            $this->lastError = "Execute failed (create): " . $stmt->error;
            $stmt->close();
            return false;
        }

        $stmt->close();
        return true;
    }
}
