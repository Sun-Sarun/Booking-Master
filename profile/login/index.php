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
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: '#3B82F6',
                        dark: '#0F172A',
                    }
                }
            }
        }
    </script>
    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .bg-image {
            background: linear-gradient(rgba(15, 23, 42, 0.5), rgba(15, 23, 42, 0.5)), 
                        url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=1920');
            background-size: cover;
            background-position: center;
        }
        /* Custom input transition */
        .floating-label:focus-within label,
        .floating-label input:not(:placeholder-shown) + label {
            transform: translateY(-1.5rem) scale(0.85);
            color: #3B82F6;
        }
    </style>
</head>
<body class="bg-dark font-sans antialiased">

    <div class="bg-image min-h-screen flex items-center justify-center p-6">
        
        <div class="glass-panel w-full max-w-md rounded-[2.5rem] p-8 md:p-12 shadow-2xl relative overflow-hidden">
            
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-brand/10 text-brand rounded-2xl mb-4">
                    <i class="bi bi-geo-alt-fill text-3xl"></i>
                </div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Welcome back</h2>
                <p class="text-slate-500 mt-2 font-medium">Please sign in to your account</p>
            </div>

            <form id="loginForm" class="space-y-6">
                
                <div class="relative floating-label">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <input type="email" id="email" placeholder=" " required
                        class="block w-full pl-11 pr-4 py-4 bg-white/50 border border-slate-200 rounded-2xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all peer">
                    <label for="email" class="absolute left-11 top-4 text-slate-400 pointer-events-none transition-all origin-left">
                        Email Address
                    </label>
                </div>

                <div class="relative floating-label">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="bi bi-lock"></i>
                    </div>
                    <input type="password" id="password" placeholder=" " required
                        class="block w-full pl-11 pr-12 py-4 bg-white/50 border border-slate-200 rounded-2xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all peer">
                    <label for="password" class="absolute left-11 top-4 text-slate-400 pointer-events-none transition-all origin-left">
                        Password
                    </label>
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-brand transition">
                        <i id="eyeIcon" class="bi bi-eye"></i>
                    </button>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center space-x-2 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-brand focus:ring-brand">
                        <span class="text-slate-600 group-hover:text-slate-900 transition">Remember me</span>
                    </label>
                    <a href="#" class="text-brand font-bold hover:text-blue-600 transition">Forgot password?</a>
                </div>

                <button type="submit" id="submitBtn" class="w-full bg-brand text-white py-4 rounded-2xl font-bold text-lg shadow-lg shadow-blue-200 hover:bg-blue-600 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                    <span>Sign In</span>
                    <div id="loader" class="hidden animate-spin h-5 w-5 border-2 border-white border-t-transparent rounded-full"></div>
                </button>
            </form>

            <div class="relative my-10">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
                <div class="relative flex justify-center text-sm"><span class="px-4 bg-transparent text-slate-400 font-medium">Or continue with</span></div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <button class="flex justify-center py-3 bg-white border border-slate-200 rounded-2xl hover:bg-gray-50 hover:border-brand/30 transition shadow-sm">
                    <i class="bi bi-google text-red-500"></i>
                </button>
                <button class="flex justify-center py-3 bg-white border border-slate-200 rounded-2xl hover:bg-gray-50 hover:border-brand/30 transition shadow-sm">
                    <i class="bi bi-facebook text-blue-600"></i>
                </button>
                <button class="flex justify-center py-3 bg-white border border-slate-200 rounded-2xl hover:bg-gray-50 hover:border-brand/30 transition shadow-sm">
                    <i class="bi bi-apple text-black"></i>
                </button>
            </div>

            <p class="text-center mt-10 text-slate-500 font-medium">
                Don't have an account? 
                <a href="#" class="text-brand font-bold hover:underline ml-1">Create one</a>
            </p>

            <div id="successOverlay" class="hidden absolute inset-0 bg-white flex flex-col items-center justify-center text-center p-8 z-50">
                <div class="w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center text-4xl mb-6 animate-bounce">
                    <i class="bi bi-check-lg"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900">Success!</h3>
                <p class="text-slate-500 mt-2">Authenticating your profile...</p>
            </div>

        </div>
    </div>

    <script>
        // Toggle Password Visibility
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

        // Handle Form Submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = document.getElementById('submitBtn');
            const loader = document.getElementById('loader');
            const success = document.getElementById('successOverlay');

            // Visual feedback
            btn.disabled = true;
            btn.querySelector('span').innerText = 'Processing...';
            loader.classList.remove('hidden');

            // Simulate API Call
            setTimeout(() => {
                success.classList.remove('hidden');
                // Redirect logic here
                // window.location.href = 'dashboard.php';
            }, 1500);
        });
    </script>
</body>
</html>