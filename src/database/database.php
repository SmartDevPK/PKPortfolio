<?php
declare(strict_types=1);

/**
 * Database Connection Class
 * Provides a clean, secure, and reusable way to handle database connections
 */

require_once __DIR__ . '/../config.php';

class Database
{
    private string $host = DB_HOST;
    private string $user = DB_USER;
    private string $pass = DB_PASS;
    private string $dbname = DB_NAME;
    private string $charset = DB_CHARSET;

    private ?PDO $conn = null; // PDO connection
    private ?string $error = null; // Error message (if any)

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

        $options = [
            PDO::ATTR_PERSISTENT => true,                     
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,     
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
            PDO::ATTR_EMULATE_PREPARES => false,             
        ];

        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            // Store the error for later retrieval and show minimal info to users
            $this->error = $e->getMessage();
            error_log("Database Connection Error: " . $this->error); // Log securely
            echo " Unable to connect to the database. Please contact the administrator.";
        }
    }

    /**
     * Get the PDO connection instance
     */
    public function getConnection(): ?PDO
    {
        return $this->conn;
    }

    /**
     * Optional: Get the last connection error (for debugging/logging)
     */
    public function getError(): ?string
    {
        return $this->error;
    }
}
