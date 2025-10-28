<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

/**
 * DEV PK PORTFOLIO - Admin Login Page
 * Handles login form submission and session initialization.
 */

require_once __DIR__ . '/../src/controllers/AdminController.php';

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



// Initialize controller and error variable
$controller = new AdminController();
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($controller->login($email, $password)) {
        // Login successful → redirect to dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV PK PORTFOLIO - Admin Login</title>

    <!-- Font Awesome & Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #ad3128;
            --secondary: #2c3e50;
            --light: #f8f9fa;
            --dark: #212529;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .logo-img:hover {
            transform: scale(1.05);
        }

        .logo h2 {
            color: var(--secondary);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .logo p {
            color: #6c757d;
            margin-bottom: 0;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            height: 45px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            width: 100%;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: #8c2720;
        }

        .footer-links {
            margin-top: 20px;
            text-align: center;
        }

        .footer-links a {
            color: #6c757d;
            text-decoration: none;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">
            <img src="img/pk.jpeg" alt="DEV PK PORTFOLIO" class="logo-img">
            <h2>DEV PK PORTFOLIO</h2>
            <p>Admin Login</p>
        </div>
     <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

        <form id="adminLoginForm" method="POST" action="">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter your email"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="password"
                    placeholder="Enter your password"
                    required
                >
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </div>
        </form>

        <div class="footer-links">
            <a href="index.php" class="text-muted">
                <i class="fas fa-arrow-left"></i> Return to Website
            </a>
        </div>
    </div>
</body>
</html>
