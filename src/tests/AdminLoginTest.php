<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

// Import the class to be tested
require_once __DIR__ . '/../models/Admin_Login.php';
require_once __DIR__ . '/../config.php';

final class AdminLoginTest extends TestCase
{
    private Admin_Login $adminLogin;

    protected function setUp(): void 
    {
        $this->adminLogin = new Admin_Login();
    }

    public function testLoginSuccess(): void
    {
        // Correct email and password
        $result = $this->adminLogin->login(ADMIN_EMAIL, ADMIN_PASSWORD_HASH);

        if ($result) {
            echo "Login successful!\n";
        } else {
            echo "Login failed!\n";
        }

        $this->assertTrue($result, 'Login should succeed with correct credentials');
    }

    public function testLoginWithWrongPassword(): void
    {
        // Correct email but wrong password
        $result = $this->adminLogin->login(ADMIN_EMAIL, 'wrongpassword');

        if ($result) {
            echo "Login successful (unexpected)!\n";
        } else {
            echo "Login failed as expected!\n";
        }

        $this->assertFalse($result, 'Login should fail with wrong password');
    }

    public function testLoginWithWrongEmail(): void
    {
        // Wrong email
        $result = $this->adminLogin->login('wrong@example.com', ADMIN_PASSWORD_HASH);

        if ($result) {
            echo "Login successful (unexpected)!\n";
        } else {
            echo "Login failed as expected!\n";
        }

        $this->assertFalse($result, 'Login should fail with wrong email');
    }
}
