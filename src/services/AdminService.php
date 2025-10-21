<?php
declare(strict_types=1);

//Import from models/Admin_Login.php
require_once __DIR__ . '/../models/Admin_Login.php';

class AdminService
{
    private Admin_Login $adminLogin;

    public function __construct()

    
    {
        $this->adminLogin = new Admin_Login();
    }

    public function loginAdmin(string $email, string $password):bool
    {
        $success = $this->adminLogin->login($email, $password);

        if($success){
        // Business logic: start session store user info, log attempt
        @session_start();
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $email;
        }

        return $success;
    }
}


?>