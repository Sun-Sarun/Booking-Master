<?php
session_start();
require_once "../../admin/config.php"; 

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_action'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // Note: Consider using password_verify() for hashed passwords

    // 1. Prepare SQL to check the account table
    $sql = "SELECT * FROM account WHERE email = ? AND password = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // 2. Store session data
        $_SESSION['accountID'] = $user['accountID'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['permission'] = $user['permission']; // Stores 'admin' or 'user'

        // 3. Conditional Redirection based on Permission
        if ($user['permission'] === 'admin') {
            // Redirect to Admin Dashboard
            header("Location: ../../admin/dashboard/dashboard.php");
        } else {
            // Redirect to Customer Homepage
            header("Location: ../../home/index.php");
        }
        exit();
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingMaster | Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: { brand: '#3B82F6', dark: '#0F172A' }
                }
            }
        }
    </script>
    <style>
        .glass-panel { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.3); }
        .bg-image { background: linear-gradient(rgba(15, 23, 42, 0.5), rgba(15, 23, 42, 0.5)), url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=1920'); background-size: cover; background-position: center; }
        .floating-label:focus-within label, .floating-label input:not(:placeholder-shown) + label { transform: translateY(-1.5rem) scale(0.85); color: #3B82F6; }
    </style>
</head>
<body class="bg-dark font-sans antialiased">
    <div class="bg-image min-h-screen flex items-center justify-center p-6">
        <div class="glass-panel w-full max-w-md rounded-[2.5rem] p-8 md:p-12 shadow-2xl relative overflow-hidden">
            
            <div class="text-center mb-10">
                <a href="../../home">  
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-brand/10 text-brand rounded-2xl mb-4">
                        <i class="bi bi-geo-alt-fill text-3xl"></i>
                    </div>
                </a> 
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Welcome back</h2>
                <?php if($error_message): ?>
                    <p class="text-red-500 mt-2 font-medium"><?php echo $error_message; ?></p>
                <?php else: ?>
                    <p class="text-slate-500 mt-2 font-medium">Please sign in to your account</p>
                <?php endif; ?>
            </div>

            <form id="loginForm" method="POST" action="index.php" class="space-y-6">
                <input type="hidden" name="login_action" value="1">
                
                <div class="relative floating-label">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <input type="email" name="email" id="email" placeholder=" " required
                        class="block w-full pl-11 pr-4 py-4 bg-white/50 border border-slate-200 rounded-2xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all peer">
                    <label for="email" class="absolute left-11 top-4 text-slate-400 pointer-events-none transition-all origin-left">
                        Email Address
                    </label>
                </div>

                <div class="relative floating-label">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="bi bi-lock"></i>
                    </div>
                    <input type="password" name="password" id="password" placeholder=" " required
                        class="block w-full pl-11 pr-12 py-4 bg-white/50 border border-slate-200 rounded-2xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all peer">
                    <label for="password" class="absolute left-11 top-4 text-slate-400 pointer-events-none transition-all origin-left">
                        Password
                    </label>
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-brand transition">
                        <i id="eyeIcon" class="bi bi-eye"></i>
                    </button>
                </div>

                <button type="submit" id="submitBtn" class="w-full bg-brand text-white py-4 rounded-2xl font-bold text-lg shadow-lg shadow-blue-200 hover:bg-blue-600 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                    <span>Sign In</span>
                </button>
            </form>

            <p class="text-center mt-10 text-slate-500 font-medium">
                Don't have an account? 
                <a href="../register/" class="text-brand font-bold hover:underline ml-1">Create one</a>
            </p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                pwd.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
</body>
</html>