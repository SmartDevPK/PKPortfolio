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
  $sql = "INSERT INTO admin (name, description,heading)
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

/**
 * Get all projects from the database
 * 
 */
public function getAllProjects(): array
{
  $sql = "SELECT * FROM admin";
  $stmt = $this->db->query($sql);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * clear all projects from the database 
 */
public function clearAllProjects(): bool
{
    $sql = "DELETE FROM admin"; 
    $stmt = $this->db->prepare($sql);
    return $stmt->execute();
}

/**
 * Delete functionality   for the project by id
 */
 public function deleteProject(int $id): bool
{
  $sql  = "DELETE FROM admin WHERE id = :id";
  $stmt = $this->db->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  return $stmt->execute();

}


}


?>