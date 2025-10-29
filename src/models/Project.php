<?php
//automatically converted data type declarations
declare(strict_types=1);

// Project Model Class
class Project
{
    // Project properties
    private string $name;
    private string $description;
    private string $heading;

    // Constructor to initialize project properties
    public function __construct(string $name, string $description, string $heading)
    {
        $this->name = $name;
        $this->description = $description;
        $this->heading = $heading;
    }

    // Getters for project properties
    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getHeading(): string
    {
        return $this->heading;
    }

    // Method to convert project data to an associative array
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'heading' => $this->heading,
        ];
    }
}
