<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// import from database
require_once __DIR__ . '/../database/database.php';

// Create a new database object
$db = new Database();

// Get the PDO connection
$conn = $db->getConnection();
 
//Test if connection works
if($conn){
    echo "Database Connection successfull!";
} else {
    echo "Database connection fail!";
}

?>