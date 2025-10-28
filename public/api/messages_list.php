<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../../src/database/database.php';

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        http_response_code(405);
        echo json_encode(['error' => 'Method Not Allowed']);
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

    $stmt = $pdo->query('SELECT id, name, email, message, created_at FROM messages ORDER BY created_at DESC');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($rows);
} catch (Throwable $e) {
    error_log('messages_list error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Server error']);
}
