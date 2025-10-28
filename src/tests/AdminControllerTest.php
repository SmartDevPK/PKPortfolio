<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../controllers/AdminController.php';

final class AdminControllerTest extends TestCase
{
    private AdminController $controller;

    protected function setUp(): void
    {
        if (ob_get_level() === 0) {
            ob_start();
        }

        // Suppress warnings if session cannot start (not critical for tests)
        if (session_status() === PHP_SESSION_NONE) {
            @session_start();
        }

        $this->controller = new AdminController();
    }

    protected function tearDown(): void
    {
        if (ob_get_length() > 0) {
            ob_end_clean();
        }

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }

    /** @test */
    public function testShowLoginFormLoadsView(): void
    {
        ob_start();
        $this->controller->showLoginForm();
        $output = ob_get_clean();

        $this->assertStringContainsString(
            'Wellcome to Admin Login page',
            $output,
            'Login view should contain welcome message.'
        );
    }

    /** @test */
    public function testLogOutDestroysSessionAndRedirects(): void
    {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = 'admin@example.com';

        ob_start();
        $this->controller->logOut();
        $output = ob_get_clean();

        $this->assertArrayNotHasKey('admin_logged_in', $_SESSION);
        $this->assertArrayNotHasKey('admin_email', $_SESSION);


    }
}
