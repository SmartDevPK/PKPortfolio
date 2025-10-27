# DEV Portfolio

A personal portfolio web application built with PHP following a simple MVC-style structure.  
This project demonstrates clean backend logic, organized file structure, and dynamic content handling.

---

##  Features

- Simple and clean PHP project structure  
- Centralized configuration file (`src/config.php`)  
- MVC-style folders (`models`, `controllers`, `database`, `services`, `tests`, `storage`, `util`, `views`)  
- Secure database connection with UTF-8MB4 charset  
- Easily customizable frontend  
- Ready for deployment on **Hostinger** or **Wogohost**

---

## Project Structure
DEVPKPORTFOLIO/
│
├── src/
│ ├── config/ # Configuration files
│ ├── controllers/ # Business logic
│ ├── models/ # Database models
│ ├── database/ # Database connection and migrations
│ ├── services/ # Application services (helpers, etc.)
│ ├── tests/ # Unit or feature tests
│ ├── storage/ # Logs, uploads, and cache
│ ├── util/ # Utility functions or classes
│ └── views/ # Frontend pages
│
├── public/
│ └── index.php # Application entry point
│
├── .gitignore
├── README.md
└── notes/ # Developer notes or documentation


---
##  Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/SmartDevPK/PKPortfolio.git
cd PKPortfolio

```
## Database Connection Test
I have created a `test.php` script to verify the database connection.  
The script successfully connects to the database and confirms that everything is working correctly.

**Steps to test the connection:**

1. Make sure XAMPP (Apache and MySQL) is running.
2. Place `test.php` in the `src/tests/` folder.
3. Open the browser and go to:  
   `http://localhost/DevPKPortfolio/src/tests/test.php`
4. You should see: Database connection successful!

### Import Database
1. Open phpMyAdmin.
2. Create a new database with the same name as in `src/config.php`.
3. Import `database/DevPKPortfolio.sql`.
4. Test the connection via `http://localhost/DevPKPortfolio/src/tests/test.php`.

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

## Admin_Login Model

The `Admin_Login` class handles **admin authentication** in the project.

### File Location
`models/Admin_Login.php`

### Features
- Checks the email against the constant `ADMIN_EMAIL`.
- Verifies the password using the hashed value `ADMIN_PASSWORD_HASH`.
- Returns `true` if the credentials are correct, `false` otherwise.

## 🎵 Composer Files Management

This project uses **Composer** for dependency management.

### 📁 Files to Commit

| File | Commit? | Description |
|------|----------|--------------|
| `composer.json` |  **Yes** | Defines project dependencies and autoload configuration. |
| `composer.lock` |  **Yes** | Locks exact versions of dependencies for consistent installations. |
| `composer-setup.php` |  **No** | Local setup script, should not be committed. |

### 💻 How to Commit Composer Files

If you’ve installed new packages or updated dependencies, commit your Composer files as follows:

```bash
git add composer.json composer.lock
git commit -m "chore: add composer.json and lock file for project dependencies"
git push origin main
```

vendor/
composer-setup.php
.env

## 🧩 AdminService

The `AdminService` class handles administrator authentication and session management.  
It depends on the `Admin_Login` model to verify credentials and manage login operations

### 📄 File
`services/AdminService.php`
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
## 🧪 Testing AdminService

The `AdminServiceTest.php` file contains PHPUnit tests for the `AdminService` class.  
It verifies both the login functionality and session handling.

### 📄 Test File
`tests/AdminServiceTest.php`

### ⚙️ Test Coverage

- Ensures `loginAdmin()` returns `true` for valid credentials.
- Confirms `$_SESSION['admin_logged_in']` is set to `true`.
- Confirms `$_SESSION['admin_email']` is set correctly.

### 🏃 Run Tests

From your project root, run:

```bash
php vendor/bin/phpunit tests/AdminServiceTest.php
 Example Output
scss
Copy code
OK (2 tests, 3 assertions)
```

---

## 🗒️ Step 4 — Add README.md Section
da

In your **README.md**, you can add a shorter, public-friendly version:

```markdown
## Admin Controller

Handles admin login and logout functions.

**Features:**
- Shows the admin login page
- Logs out the admin securely

**Files:**
- `src/controllers/AdminController.php`
- `public/admin_login.php`

**Run Test:**
```bash
vendor/bin/phpunit src/tests/AdminControllerTest.php

```


