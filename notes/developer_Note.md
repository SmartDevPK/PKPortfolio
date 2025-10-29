# 🧠 Developer Notes — DEVPKPORTFOLIO  
*Last Updated: 2025-10-18 02:45 (Africa/Lagos)*

Internal documentation and technical references for ongoing development and maintenance of the DEVPKPORTFOLIO application.

---

## 🧩 Project Overview  
*Created: 2025-10-18 02:40*

DEVPKPORTFOLIO is a PHP-based portfolio application built using an MVC-style structure.  
It focuses on modular backend logic, clean configuration, and a simple deployment process.

---

## ⚙️ Environment Setup  
*Last Updated: 2025-10-18 02:45*

### Local Development
- **Server:** Apache (XAMPP / Laragon)
- **PHP Version:** 8.1 or higher  
- **Database:** MySQL 5.7+ or MariaDB  
- **Timezone:** `Africa/Lagos`  
- **Charset:** `utf8mb4`

---

## 🗂️ Directory Structure (Quick Reference)  
*Last Updated: 2025-10-18 02:46*

src/
├── config/
├── controllers/
├── models/
├── database/
├── services/
├── util/
└── views/
public/
└── index.ph


---
## ⚙️ src/config.php  
*Created: 2025-10-18 15:20 (Africa/Lagos)* 
**Description:**  
Initialized the main application configuration file.  
This file defines all essential constants for database connection, timezone, and global app settings.

**Key Configurations:**
- `DB_HOST`: Database host (`localhost`)
- `DB_USER`: Database user (`root`)
- `DB_PASS`: Database password (empty for local setup)
- `DB_NAME`: Database name (`portflio`)
- `DB_CHARSET`: Character set (`utf8mb4`)
- `APP_NAME`: Application name (`DEVPKPORTFOLIO`)
- `APP_ENV`: Environment mode (`development`)
- Timezone set to `Africa/Lagos`

**Notes:**  
- `src/config.php` is **ignored in .gitignore** for security reasons.  
- Always create and commit `src/config.example.php` when modifying configuration constants.  
- Ensure database name matches your local environment.  
- Charset `utf8mb4` supports full Unicode (including emojis).


## 🗄️ Database Configuration  
*Last Updated: 2025-10-18 02:47*
**Database name:** `portfolio`  
**Default Tables (Admin):**
- `projects` — portfolio items  
- `contacts` — messages from contact form  

**Connection file:** `src/config.php`  
**Charset:** `utf8mb4`
---

## README.MD
*Updated: 2025-10-18 15:05 (Africa/Lagos)*  

Changed project structure name from `project` to `DEVPKPORTFOLIO` in the **README.md** 
file.

## Database Connection Test
Created at 2025-10-18 06:21
**File:** `src/tests/test.php`  
**Purpose:** Verify that the database connection is working before building additional features.

### Steps to Test
1. Ensure XAMPP (Apache and MySQL) is running:
   ```bash
2.   sudo /opt/lampp/lampp start
3. Open your browser and visit:`http://localhost/DevPKPortfolio/src/tests/test.php`
Database connection successful!

### Version Control (Internal)
Created at 2025-10-18 06:30
```bash
git add notes/developer_notes.md
git commit -m "docs: add database connection test details"
git push origin main
```

## Database Setup
The project uses **MySQL** with **PDO** for database connections.  

### Database Setup and Test

1. **Start XAMPP** (Apache + MySQL):
   ```bash
2. Open phpMyAdmin:
http://localhost/phpmyadmin

3. Create a new database
Use the same name as specified in src/config.php.

4. Import the SQL dump
Files located in the database/ folder:
database/portfolio.sql

5. Test the connection using the script:

http://localhost/DevPKPortfolio/src/tests/test.php

6. Expected Output
Database connection successful!

# Developer Notes

## Admin_Login Model

- **Location:** `models/Admin_Login.php`
- **Purpose:** Handles admin authentication using email and password.
- **Features:**
  - Checks email against `ADMIN_EMAIL` constant.
  - Verifies password using `password_verify` against `ADMIN_PASSWORD_HASH`.
  - Returns `true` if credentials are correct, `false` otherwise.

  ### Admin_Login Example

```php
require_once 'models/Admin_Login.php';

$adminLogin = new Admin_Login();

$email = '';
$password = '';

if ($adminLogin->login($email, $password)) {
    echo "Login successful!";
} else {
    echo "Login failed!";
}

```

## 🧩 Composer Files Commit Guide

###  Files to Commit
- **composer.json** → Defines dependencies and autoload settings.  
- **composer.lock** → Locks exact package versions for consistent installations.  

###  Files to Ignore
- **composer-setup.php** → Local Composer installer; do not commit.  

### 💻 Git Commands for Committing Composer Files
```bash
git add composer.json composer.lock
git commit -m "chore: add composer.json and lock file for project dependencies"
git push origin main
```

# 🧠 Developer Notes — AdminService

This document provides technical details, usage examples, and testing guidance for the `AdminService` class.

---

## 📄 File Location
`services/AdminService.php`

---

## ⚙️ Class Overview

```php
<?php
declare(strict_types=1);

require_once __DIR__ . '/../models/Admin_Login.php';

class AdminService
{
    private Admin_Login $adminLogin;

    public function __construct()
    {
        $this->adminLogin = new Admin_Login();
    }

    public function loginAdmin(string $email, string $password): bool
    {
        $success = $this->adminLogin->login($email, $password);

        if ($success) {
            @session_start();
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_email'] = $email;
        }

        return $success;
    }
}
?>
```

## 🧪 AdminService Unit Tests

The `AdminServiceTest.php` file contains PHPUnit tests for the `AdminService` class.  
It ensures that the login functionality and session management work as expected.

### 📄 File Location
`tests/AdminServiceTest.php`

### ⚙️ Test Coverage

- `loginAdmin()` returns `true` for valid credentials.
- `$_SESSION['admin_logged_in']` is correctly set to `true`.
- `$_SESSION['admin_email']` is set to the logged-in admin’s email.

### 🏃 Running the Tests

From your project root, run:

```bash
php vendor/bin/phpunit tests/AdminServiceTest.php
```
### AdminController Overview

- **Location:** `src/controllers/AdminController.php`
- **Purpose:** Manages admin-related actions such as login display and logout.
- **Strict Types:** Enabled via `declare(strict_types=1)` for better type safety.
- **Dependencies:** Uses `AdminService` for admin logic.

#### Methods

- `showLoginForm()`
  - Loads the admin login view from `public/admin_login.php`.

- `logout()`
  - Destroys the session and redirects to `/admin/login`.

#### Testing
- Tested with PHPUnit.
- Test file: `src/tests/AdminControllerTest.php`
- Run command:
  ```bash
  vendor/bin/phpunit src/tests/AdminControllerTest.php
  ```
 ### 🧪 AdminController Unit Tests

The AdminControllerTest.php file contains PHPUnit tests for the AdminController class.
These tests verify that the controller correctly loads the login view and handles session logout.

### 📄 File Location

### src/tests/AdminControllerTest.php

### ⚙️ Test Coverage

testShowLoginFormLoadsView()
Ensures that the admin login view renders and contains the welcome message.

testLogOutDestroysSessionAndRedirects()
Confirms that session variables (admin_logged_in, admin_email) are cleared after logout.

### 🧰 Setup and Cleanup

Uses setUp() to initialize the controller and manage output buffering.

Uses tearDown() to clean up output buffers and session data after each test.

### 🏃 Running the Tests

From your project root, run:

php vendor/bin/phpunit src/tests/AdminControllerTest.php

### Ignore the img folder

### Add the following line to your .gitignore to ignore all images:

public/img/

### Remove previously tracked img/ folder

### If you had already added it to Git before ignoring, remove it from tracking:

git rm -r --cached public/img/
git commit -m "Stop tracking img folder"

Track other public assets

### Make sure CSS, JS, fonts, and index.php are tracked:

git add public/css public/js public/fonts public/index.php
git commit -m "Add CSS, JS, fonts, and index.php"

### Notes on empty folders

Git does not track empty folders. If you want to keep a folder structure, add a placeholder file like .gitkeep:

### touch public/css/.gitkeep

### Check status

Always verify which files are staged:

## login.php

Purpose: Handles user login and session management.

### Handling Large File Modifications

When `git status` shows many modified files:

#### 1. To commit all changes at once
```bash
git add .
git commit -m "Update all project files"
git push origin main
```
# Developer Notes: Project Class

## Overview

This `Project` class is part of the portfolio project.  
It demonstrates **basic PHP OOP principles**, encapsulation, and data conversion for APIs or frontend consumption.

---

## Features

- **Private properties**: Ensures data encapsulation.
- **Constructor (`__construct`)**: Initializes project properties.
- **Getters**: Access project data safely.
- **`toArray()` method**: Converts object data to an **associative array**, useful for JSON responses.
- **PHPUnit tests**: Validates object creation, getters, and `toArray()` functionality.

---

## Class Structure

```php
class Project
{
    private string $name;
    private string $description;
    private string $heading;

    public function __construct(string $name, string $description, string $heading) { ... }

    public function getName(): string { ... }
    public function getDescription(): string { ... }
    public function getHeading(): string { ... }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'heading' => $this->heading,
        ];
    }
}
