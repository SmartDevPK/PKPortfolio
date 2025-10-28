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

    public function login(string $email, string $password): bool
    {
        if ($this->adminService->verifyCredentials($email, $password)) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_email'] = $email;

            //  Redirect to dashboard after successful login
            header('Location: dashboard.php');
            exit;
        }

        // Login failed
        return false;
    }

    public function logout(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();
        header('Location: login.php');
        exit;
    }
}
