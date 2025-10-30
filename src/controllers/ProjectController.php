<?php
// autamatically converted data
declare(strict_types=1);

// Import from services
require_once __DIR__ . '/../services/ProjectService.php';
// Import from models
require_once __DIR__ . '/../models/Project.php';

// Controller to handle project-related requests
class ProjectController
{
    private ProjectService $service;

    public function __construct()
    {
        $this->service = new ProjectService();
    }

    // Handle adding a new project
    public function addProject():void
    {
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $heading = $_POST['heading'] ?? '';

        $project = new Project( $name, $description, $heading);

        $success = $this->service->addProject($project);

        if($success){
          // Redirect to project list on success
          // header('Location: dashboard.php?status=success');
          echo "Project added successfully.";
        } else {
          // Handle failure (e.g., show error message)
          echo "Failed to add project.";
        }

      }
    }
}



?>