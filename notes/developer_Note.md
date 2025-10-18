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


