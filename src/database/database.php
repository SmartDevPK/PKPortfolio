<?php
/**
 * Database Connection Class
 * Provides a clean and secure way to handle database connections
 */

// Import from src/config.php
require_once __DIR__ . '/../config.php';

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $conn;
    private $error;

    public function __construct() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=' . DB_CHARSET;

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo "Database Connection Failed: " . $this->error;
        }
    }

    // Get the PDO connection
    public function getConnection() {
        return $this->conn;
    }
}
