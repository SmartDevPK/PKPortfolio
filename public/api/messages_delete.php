<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../../src/database/database.php';

try {
    // Allow either real DELETE with JSON body or POST with form-encoded _method=DELETE
    $method = $_SERVER['REQUEST_METHOD'];

    if (!in_array($method, ['DELETE', 'POST'], true)) {
        http_response_code(405);
        echo json_encode(['error' => 'Method Not Allowed']);
        exit;
    }

    $id = null;

    if ($method === 'DELETE') {
        $raw = file_get_contents('php://input');
        $payload = json_decode($raw, true);
        if (json_last_error() !== JSON_ERROR_NONE) { $payload = []; }
        $id = $payload['id'] ?? null;
    } else { // POST
        $override = $_POST['_method'] ?? '';
        if (strtoupper((string)$override) !== 'DELETE') {
            http_response_code(405);
            echo json_encode(['error' => 'Method Not Allowed']);
            exit;
        }
        $id = $_POST['id'] ?? null;
    }

    if ($id === null || $id === '') {
        http_response_code(400);
        echo json_encode(['error' => 'Missing id']);
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

    if ($id === 'all') {
        $pdo->exec('TRUNCATE TABLE messages');
    } else {
        $stmt = $pdo->prepare('DELETE FROM messages WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }

    echo json_encode(['ok' => true]);
} catch (Throwable $e) {
    error_log('messages_delete error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Server error']);
}
