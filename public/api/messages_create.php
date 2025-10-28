<?php
declare(strict_types=1);

header('Content-Type: text/plain; charset=utf-8');

require_once __DIR__ . '/../../src/database/database.php';

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo 'Method Not Allowed';
        exit;
    }

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        http_response_code(400);
        echo 'Please provide name, email, and message';
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo 'Please provide a valid email';
        exit;
    }

    $db = new Database();
    $pdo = $db->getConnection();
    if (!$pdo) { throw new RuntimeException('No DB connection'); }

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS messages (
            id CHAR(36) PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;'
    );

    $id = bin2hex(random_bytes(16));

    $stmt = $pdo->prepare('INSERT INTO messages (id, name, email, message) VALUES (:id, :name, :email, :message)');
    $stmt->execute([
        ':id' => $id,
        ':name' => $name,
        ':email' => $email,
        ':message' => $message,
    ]);

    echo 'Thank you! Your message has been sent.';
} catch (Throwable $e) {
    error_log('messages_create error: ' . $e->getMessage());
    http_response_code(500);
    echo 'Server error. Please try again later.';
}
