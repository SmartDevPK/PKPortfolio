<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../src/services/ProjectService.php';

$service = new ProjectService();
$result = $service->clearAllProjects();

echo json_encode([
    "status" => $result ? "success" : "error"
]);
