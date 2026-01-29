<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingMaster | Edit Profile</title>
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
            background: linear-gradient(rgba(15, 23, 42, 0.05), rgba(15, 23, 42, 0.05)), 
                        url('https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=1920');
            background-size: cover;
            background-attachment: fixed;
        }
        .floating-label:focus-within label,
        .floating-label input:not(:placeholder-shown) + label,
        .floating-label select:not([value=""]):valid + label {
            transform: translateY(-1.5rem) scale(0.85);
            color: #3B82F6;
        }
    </style>
</head>
<body class="bg-image min-h-screen font-sans antialiased text-slate-900">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="flex items-center space-x-2 text-2xl font-extrabold text-brand tracking-tighter">
                <i class="bi bi-geo-alt-fill"></i>
                <span>BookingMaster</span>
            </a>
            
            <div class="hidden md:flex items-center bg-slate-100 rounded-full px-4 py-2 border border-slate-200">
                <i class="bi bi-search text-slate-400 mr-2"></i>
                <input type="text" placeholder="Search destinations..." class="bg-transparent border-none focus:ring-0 text-sm w-64">
            </div>

            <div class="flex items-center space-x-4">
                <button class="relative text-slate-600 hover:text-brand transition">
                    <i class="bi bi-bell text-xl"></i>
                    <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </button>
                <div class="w-10 h-10 rounded-full bg-brand/10 flex items-center justify-center text-brand font-bold">
                    JD
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12 flex justify-center">
        <div class="glass-panel w-full max-w-2xl rounded-[2.5rem] p-8 md:p-12 shadow-2xl">
            
            <div class="mb-10 flex items-center space-x-6">
                <div class="relative group">
                    <div class="w-24 h-24 rounded-3xl bg-slate-200 overflow-hidden border-4 border-white shadow-lg">
                        <img id="preview" src="https://i.pravatar.cc/150?u=john" class="w-full h-full object-cover">
                    </div>
                    <label for="pfp" class="absolute -bottom-2 -right-2 w-8 h-8 bg-brand text-white rounded-xl flex items-center justify-center cursor-pointer hover:bg-blue-600 transition shadow-lg">
                        <i class="bi bi-camera-fill text-sm"></i>
                    </label>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Profile</h1>
                    <p class="text-slate-500 font-medium">Manage your public information and privacy</p>
                </div>
            </div>

            <form action="added_product.php" method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="file" name="pfp" id="pfp" class="hidden" onchange="previewImage(this)">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="relative floating-label">
                        <input type="text" name="fname" placeholder=" " required
                            class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all peer">
                        <label class="absolute left-5 top-4 text-slate-400 pointer-events-none transition-all origin-left font-medium">
                            First Name
                        </label>
                    </div>

                    <div class="relative floating-label">
                        <input type="text" name="lname" placeholder=" " required
                            class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all peer">
                        <label class="absolute left-5 top-4 text-slate-400 pointer-events-none transition-all origin-left font-medium">
                            Last Name
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="relative">
                        <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-400 mb-2 ml-4">Gender</label>
                        <select name="gender" class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all appearance-none cursor-pointer">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <div class="absolute right-5 bottom-4 pointer-events-none text-slate-400">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </div>

                    <div class="relative">
                        <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-400 mb-2 ml-4">Birth Date</label>
                        <input type="date" name="dob" required
                            class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                    </div>
                </div>

                <div class="relative floating-label">
                    <input type="email" name="email" placeholder=" " required
                        class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all peer">
                    <label class="absolute left-5 top-4 text-slate-400 pointer-events-none transition-all origin-left font-medium">
                        Email Address
                    </label>
                </div>

                <div class="relative floating-label">
                    <input type="tel" name="phone" placeholder=" " required
                        class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all peer">
                    <label class="absolute left-5 top-4 text-slate-400 pointer-events-none transition-all origin-left font-medium">
                        Phone Number
                    </label>
                </div>

                <div class="relative floating-label">
                    <input type="text" name="address" placeholder=" " required
                        class="block w-full px-5 py-4 bg-white/50 border border-slate-200 rounded-2xl text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all peer">
                    <label class="absolute left-5 top-4 text-slate-400 pointer-events-none transition-all origin-left font-medium">
                        Residential Address
                    </label>
                </div>

                <div class="pt-6 border-t border-slate-200 flex flex-col md:flex-row gap-4">
                    <button type="submit" name="btnadd" class="flex-1 bg-brand text-white py-4 rounded-2xl font-bold text-lg shadow-lg shadow-blue-200 hover:bg-blue-600 active:scale-[0.98] transition-all">
                        Save Changes
                    </button>
                    <button type="reset" class="px-8 py-4 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 transition-all">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="mt-auto py-10 bg-dark text-slate-400 border-t border-slate-800">
        <div class="container mx-auto px-6 text-center">
            <div class="text-white font-extrabold text-xl mb-6 flex justify-center items-center space-x-2">
                <i class="bi bi-geo-alt-fill text-brand"></i>
                <span>BookingMaster</span>
            </div>
            <nav class="flex justify-center space-x-8 mb-8 text-sm font-semibold">
                <a href="#" class="hover:text-white transition">Home</a>
                <a href="#" class="hover:text-white transition">Services</a>
                <a href="#" class="hover:text-white transition">Privacy</a>
                <a href="#" class="hover:text-white transition">Support</a>
            </nav>
            <p class="text-[10px] uppercase tracking-widest font-bold">&copy; 2026 BookingMaster International</p>
        </div>
    </footer>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>
</html>