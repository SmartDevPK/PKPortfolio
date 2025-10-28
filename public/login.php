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
        /* Enhancements */
        body {
            min-height: 100vh;
            background: linear-gradient(120deg, #f1f5f9, #e2e8f0, #fef3f2);
            background-size: 200% 200%;
            animation: bg-move 12s ease-in-out infinite;
        }
        @keyframes bg-move {
          0% { background-position: 0% 50%; }
          50% { background-position: 100% 50%; }
          100% { background-position: 0% 50%; }
        }
        .login-container {
            position: relative; overflow: hidden;
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.5);
            box-shadow: 0 20px 40px rgba(2,6,23,0.08);
            transform: translateY(8px);
            animation: rise-in .6s ease forwards;
        }
        @keyframes rise-in { to { transform: translateY(0); } }
        .login-container::before {
            content: "";
            position: absolute;
            inset: -1px;
            background: radial-gradient(300px 160px at 20% -10%, #ad312820 0%, transparent 70%),
                        radial-gradient(260px 140px at 110% 10%, #2c3e5018 0%, transparent 70%);
            pointer-events: none;
        }
        .input-wrap { position: relative; }
        .input-wrap input {
            padding-left: 40px;
        }
        .input-icon {
            position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
            color: #94a3b8; font-size: 14px;
        }
        .toggle-password {
            position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
            background: transparent; border: 0; color: #64748b; cursor: pointer; padding: 4px;
        }
        .error-text { color: #dc2626; font-size: 12px; margin-top: 6px; display: none; }
        .form-control.error { border-color: #ef4444; background-color: #fff5f5; }
        .btn[disabled] { opacity: .7; cursor: not-allowed; }
        .btn-primary { transition: transform .15s ease, box-shadow .15s ease; box-shadow: 0 6px 16px rgba(173,49,40,0.2); }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 10px 22px rgba(173,49,40,0.28); }
        .remember {
          display:flex; align-items:center; gap:8px; font-size: 14px; color: #475569;
        }
        .error-banner {
          background: #fee2e2; color:#991b1b; border:1px solid #fecaca; padding:10px 12px; border-radius:8px; margin:-8px 0 12px; font-size:14px;
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
        <div class="error-banner"><i class="fa-solid fa-triangle-exclamation"></i> <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

        <form id="adminLoginForm" method="POST" action="">
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-wrap">
                    <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        id="email"
                        placeholder="you@example.com"
                        required
                    >
                    <button type="button" class="toggle-password" style="display:none"></button>
                </div>
                <div id="emailError" class="error-text">Please enter a valid email address.</div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        id="password"
                        placeholder="Your password"
                        required
                        minlength="6"
                    >
                    <button type="button" id="togglePwd" class="toggle-password" aria-label="Show password">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </div>
                <div id="passwordError" class="error-text">Password must be at least 6 characters.</div>
            </div>

            <div class="form-group" style="margin-top:-4px;">
                <label class="remember"><input type="checkbox" id="rememberMe"> Remember me</label>
            </div>

            <div class="form-group">
                <button id="loginBtn" type="submit" class="btn btn-primary">
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
<script>
  (function(){
    const form = document.getElementById('adminLoginForm');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const loginBtn = document.getElementById('loginBtn');
    const togglePwd = document.getElementById('togglePwd');
    const rememberMe = document.getElementById('rememberMe');

    function isEmail(v){ return /[^\s@]+@[^\s@]+\.[^\s@]+/.test(v); }

    togglePwd.addEventListener('click', function(){
      const isText = password.getAttribute('type') === 'text';
      password.setAttribute('type', isText ? 'password' : 'text');
      this.innerHTML = isText ? '<i class="fa-solid fa-eye"></i>' : '<i class="fa-solid fa-eye-slash"></i>';
    });

    function showError(input, el, message){
      input.classList.add('error');
      el.textContent = message; el.style.display = 'block';
    }
    function clearError(input, el){ input.classList.remove('error'); el.style.display = 'none'; }

    email.addEventListener('input', () => {
      if (!email.value.trim() || !isEmail(email.value.trim())) showError(email, emailError, 'Please enter a valid email address.');
      else clearError(email, emailError);
    });
    password.addEventListener('input', () => {
      if (password.value.length < 6) showError(password, passwordError, 'Password must be at least 6 characters.');
      else clearError(password, passwordError);
    });

    // Prefill from localStorage
    try {
      const saved = localStorage.getItem('admin_login_email');
      if (saved) { email.value = saved; rememberMe.checked = true; }
    } catch {}

    form.addEventListener('submit', function(e){
      let valid = true;
      if (!email.value.trim() || !isEmail(email.value.trim())) { showError(email, emailError, 'Please enter a valid email address.'); valid = false; }
      if (password.value.length < 6) { showError(password, passwordError, 'Password must be at least 6 characters.'); valid = false; }
      if (!valid) { e.preventDefault(); return; }
      try {
        if (rememberMe.checked) localStorage.setItem('admin_login_email', email.value.trim());
        else localStorage.removeItem('admin_login_email');
      } catch {}
      loginBtn.setAttribute('disabled', 'true');
    });
  })();
</script>
</body>
</html>
