<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

// Import dependencies
require_once __DIR__ . '/../models/Admin_Login.php';
require_once __DIR__ . '/../services/AdminService.php';

@session_start();

/**
 * Test class for AdminService
 */
final class AdminServiceTest extends TestCase
{
    private AdminService $adminService;

    /**
     * Set up before each test
     */
    protected function setUp(): void
    {
        // Create a mock for Admin_Login
        $mockAdminLogin = $this->createMock(Admin_Login::class);
        $mockAdminLogin->method('login')->willReturn(true);

        // Create instance of AdminService
        $this->adminService = new AdminService();

        // Inject the mock into the AdminService using Reflection
        $reflection = new ReflectionClass($this->adminService);
        $property = $reflection->getProperty('adminLogin');
        $property->setAccessible(true);
        $property->setValue($this->adminService, $mockAdminLogin);
    }

    /**
     * Test that loginAdmin returns true
     */
    public function testLoginAdminReturnsTrue(): void
    {
        // Call the loginAdmin method
        $result = $this->adminService->loginAdmin('admin@example.com', 'password123');

        // Verify that the result is true
        $this->assertTrue($result, 'Expected loginAdmin() to return true for valid credentials.');
    }

    
     // Test that loginAdmin sets session variables correctly
    
    public function testLoginAdminSetsSessionVariables(): void
    {
        // Call the loginAdmin method
        $this->adminService->loginAdmin('admin@example.com', 'password');

        // Verify session variables
        $this->assertTrue(isset($_SESSION['admin_logged_in']), 'Expected session variable "admin_logged_in" to be set.');
        $this->assertTrue($_SESSION['admin_logged_in'], 'Expected "admin_logged_in" to be true.');
        $this->assertSame('admin@example.com', $_SESSION['admin_email'], 'Expected session email to match the admin email.');
    }
}
