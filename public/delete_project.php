<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set response content type to JSON
header('Content-Type: application/json');

require_once __DIR__ . '/../src/database/database.php';
require_once __DIR__ . '/../src/services/ProjectService.php';

// Validate and retrieve project ID from query parameters
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid or missing project ID"
    ]);
    exit;
}

$id = (int) $_GET['id'];

try {
    $service = new ProjectService();
    $deleted = $service->deleteProject($id);

    if ($deleted) {
        echo json_encode([
            "status" => "success",
            "message" => "Project deleted successfully"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Project not found or could not be deleted"
        ]);
    }

} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => "An error occurred while deleting the project",
        "error" => $e->getMessage()
    ]);
}
