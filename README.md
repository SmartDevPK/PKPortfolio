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