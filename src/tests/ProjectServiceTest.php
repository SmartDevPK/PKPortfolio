<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../services/ProjectService.php';
require_once __DIR__ . '/../models/Project.php';

final class ProjectServiceTest extends TestCase
{
    private ProjectService $service;

    protected function setUp(): void
    {
        $this->service = new ProjectService();
    }

    public function testAddProjectInsertsSuccessfully(): void
    {
        $project = new Project(
            'Unit Test Project',
            'Testing project insertion',
            'PHPUnit'
        );

        $result = $this->service->addProject($project);

        $this->assertTrue($result, "Project should be inserted successfully");
    }
}
