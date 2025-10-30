<?php
//automatically converted data
declare(strict_types=1);


// Import PHPUnit classes
use PHPUnit\Framework\TestCase;

//  Import the files you are testing
require_once __DIR__ . '/../../src/controllers/ProjectController.php';
require_once __DIR__ . '/../../src/models/Project.php';
require_once __DIR__ . '/../../src/services/ProjectService.php';

final class ProjectControllerTest extends TestCase
{
    // Test successful project creation
    public function testAddProjectSuccess(): void
    {
        // Arrange: Simulate a POST request
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['name'] = 'AI Portfolio';
        $_POST['description'] = 'Machine Learning demo project';
        $_POST['heading'] = 'AI System';

        // Mock ProjectService to simulate successful DB insertion
        $mockService = $this->createMock(ProjectService::class);
        $mockService->method('addProject')->willReturn(true);

        // Create controller instance and inject mock service
        $controller = new ProjectController();
        $reflection = new ReflectionClass($controller);
        $property = $reflection->getProperty('service');
        $property->setAccessible(true);
        $property->setValue($controller, $mockService);

        // Act: Run controller method
        ob_start(); // Prevent echo output
        $controller->addProject();
        ob_end_clean();

        // Assert: Just ensure no errors or exceptions occurred
        $this->assertTrue(true);
    }

   //  Test failed project creation handling
    public function testAddProjectFailure(): void
    {
        // Arrange: Simulate POST data
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['name'] = 'Broken Project';
        $_POST['description'] = 'This should fail';
        $_POST['heading'] = 'Failure Heading';

        // Mock ProjectService to simulate a failed insertion
        $mockService = $this->createMock(ProjectService::class);
        $mockService->method('addProject')->willReturn(false);

        // Inject mock into controller
        $controller = new ProjectController();
        $reflection = new ReflectionClass($controller);
        $property = $reflection->getProperty('service');
        $property->setAccessible(true);
        $property->setValue($controller, $mockService);

        // Act: Capture output
        ob_start();
        $controller->addProject();
        $output = ob_get_clean(); // Get what was printed

        // Assert: Should display the failure message
        $this->assertStringContainsString('Failed to add project.', $output);
    }
}
