<?php
// To correct kind of datab being handled
declare(strict_types=1);

//Import from services/AdminService.php
require_once __DIR__ . '/../services/AdminService.php';

// Controller for admin-related actions
class AdminController
{
    // Service instance for admin operations
    private AdminService $adminService;
    // Constructor to initialize the service
    public function __construct()
    {
        // Create an instance of AdminService
        $this->adminService = new AdminService();
    }

    // show the admin login page
 public function showLoginForm(): void
{
  require __DIR__ . '/../../public/admin_login.php';
}

// handle admin login
   public function  logOut(): void
   {
    // Destroy the session to log out the admin
    session_start();
    session_unset();
    session_destroy();

    // Redirect to the login page after logout
    header('Location: /admin_login.php');
   }

}

?>