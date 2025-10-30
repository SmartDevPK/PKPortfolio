<?php
//autamatically converted data
declare(strict_types=1);

// Import from models
require_once __DIR__ . '/../models/Project.php';
// Import from database
require_once __DIR__ . '/../database/database.php';


// Service to manage projects
class ProjectService
{
  private PDO $db;

  public function __construct()
  {
    // Initialize database connection from Database class
    $database = new Database();
    $this->db = $database->getConnection();
  }
/**
 * Add (insert) a new project to the database
 */

public function addProject(Project $project): bool
{
  //prepare SQL insert query
  $sql = "INSERT INTO Portfolio(name, description,heading)
               VALUES (:name, :description, :heading)";

//prepare statement
  $stmt = $this->db->prepare($sql);

  // Bind values safely (prevent SQL injection)
  $stmt->bindValue(':name', $project->getName());
  $stmt->bindValue(':description', $project->getDescription());
  $stmt->bindValue(':heading', $project->getHeading());

  // Execute the statement and return success status
  return $stmt->execute();
}


}


?>