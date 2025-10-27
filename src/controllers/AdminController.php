<?php
declare(strict_types=1);

require_once __DIR__ . '/../services/AdminService.php';

class AdminController
{
    private AdminService $adminService;

    public function __construct()
    {
        $this->adminService = new AdminService();
    }

    public function showLoginForm(): void
    {
        require __DIR__ . '/../../public/admin_login.php';
    }

    public function logOut(): void
    {
        // Only start session if it’s not already started
        if (session_status() === PHP_SESSION_NONE) {
            @session_start();
        }

        // Clear all session data
        $_SESSION = [];
        session_unset();
        // session_destroy();

        // Redirect safely
        if (!headers_sent()) {
            header('Location: /admin_login.php');
            exit;
        } else {
            echo '<script>window.location.href="/admin_login.php";</script>';
        }
    }
}
