<?php
// Enable debugging (optional)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load files
require_once __DIR__ . '/../src/models/Project.php';
require_once __DIR__ . '/../src/services/ProjectService.php';

// Get POST values
$heading = $_POST['heading'] ?? '';
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';

// Validate input
if (empty($heading) || empty($name) || empty($description)) {
    die("All fields are required");
}

// Create Project object
$project = new Project(
    null,       
    $heading,
    $name,
    $description
);

// Save to DB
$service = new ProjectService();
$result = $service->addProject($project);

if ($result) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: project not saved!";
}
