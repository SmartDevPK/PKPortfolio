<?php

//models/Admin_Login.php
declare(strict_types=1);

//Import from config.php
 require_once __DIR__ . '/../config.php';

 class Admin_Login 
 {
    /**
     * Attempt to log in the admin using email and password
     *
     * @param string $email
     * @param string $password
     * @return bool True if login successful, false otherwise
     */

    public function login(string $email, string $password):bool {

    // Check if email matchs
    if($email !== ADMIN_EMAIL){
        return false;
    }

    // verify password againts the stored hash
    return password_verify($password, ADMIN_PASSWORD_HASH);
    }
 }


?>