<?php
declare(strict_types=1);

require_once __DIR__ . '/../config.php';


class Admin
{
    public function verifyLogin(string $email, string $password): bool
    {
        // Validate directly from config.php constants
        if ($email === ADMIN_EMAIL && password_verify($password, ADMIN_PASSWORD_HASH)) {
            return true;
        }

        return false;
    }
}
