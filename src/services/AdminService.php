<?php
declare(strict_types=1);

require_once __DIR__ . '/../models/Admin.php';

class AdminService
{
    private Admin $adminModel;

    public function __construct()
    {
        $this->adminModel = new Admin();
    }

    public function verifyCredentials(string $email, string $password): bool
    {
        return $this->adminModel->verifyLogin($email, $password);
    }
}
?>