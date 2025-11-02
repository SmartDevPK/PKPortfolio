<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

// Load database + ProjectService
require_once __DIR__ . '/../src/database/database.php';

require_once __DIR__ . '/../src/services/ProjectService.php';

try {
    $service = new ProjectService();
    $projects = $service->getAllProjects();

    echo json_encode([
        "status" => "success",
        "data" => $projects
    ]);

} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Failed to load projects",
        "error" => $e->getMessage()
    ]);
}
