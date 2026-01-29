<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingMaster | Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: { brand: '#3B82F6', dark: '#0F172A', success: '#10B981' }
                }
            }
        }
    </script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .sidebar-link.active {
            @apply bg-brand text-white shadow-lg shadow-blue-500/30;
        }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased">

    <div class="flex min-h-screen">
        <aside class="w-72 bg-dark text-slate-400 p-6 flex flex-col fixed h-full z-50">
            <div class="flex items-center space-x-3 text-white text-2xl font-extrabold mb-12 px-2">
                <div class="bg-brand p-2 rounded-xl">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
                <span>AdminHub</span>
            </div>

            <nav class="flex-1 space-y-2">
                <p class="text-[10px] uppercase tracking-[0.2em] font-bold text-slate-600 mb-4 px-4">Management</p>
                <a href="#" class="sidebar-link active flex items-center space-x-3 px-4 py-3.5 rounded-2xl transition-all">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span class="font-bold">Overview</span>
                </a>
                <a href="#" class="sidebar-link flex items-center space-x-3 px-4 py-3.5 rounded-2xl hover:bg-white/5 transition-all">
                    <i class="bi bi-calendar-check"></i>
                    <span class="font-semibold">Bookings</span>
                </a>
                <a href="#" class="sidebar-link flex items-center space-x-3 px-4 py-3.5 rounded-2xl hover:bg-white/5 transition-all">
                    <i class="bi bi-people"></i>
                    <span class="font-semibold">Users</span>
                </a>
                <a href="#" class="sidebar-link flex items-center space-x-3 px-4 py-3.5 rounded-2xl hover:bg-white/5 transition-all">
                    <i class="bi bi-geo-alt"></i>
                    <span class="font-semibold">Destinations</span>
                </a>
            </nav>

            <div class="pt-6 border-t border-slate-800">
                <a href="index.php" class="flex items-center space-x-3 px-4 py-3.5 rounded-2xl hover:bg-red-500/10 hover:text-red-400 transition-all">
                    <i class="bi bi-box-arrow-left"></i>
                    <span class="font-semibold">Logout</span>
                </a>
            </div>
        </aside>

        <main class="flex-1 ml-72 p-10">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight">System Overview</h1>
                    <p class="text-slate-500 font-medium">Monitoring BookingMaster live performance.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="w-12 h-12 glass-card rounded-2xl flex items-center justify-center text-slate-500 hover:text-brand transition">
                        <i class="bi bi-bell"></i>
                    </button>
                    <div class="flex items-center space-x-3 glass-card px-4 py-2 rounded-2xl shadow-sm">
                        <div class="text-right">
                            <p class="text-xs font-bold text-slate-900">Admin User</p>
                            <p class="text-[10px] text-brand font-bold uppercase">Super Admin</p>
                        </div>
                        <img src="https://i.pravatar.cc/150?u=admin" class="w-10 h-10 rounded-xl object-cover">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div class="glass-card p-6 rounded-[2rem] shadow-sm">
                    <div class="w-12 h-12 bg-blue-100 text-brand rounded-2xl flex items-center justify-center mb-4">
                        <i class="bi bi-currency-dollar text-xl"></i>
                    </div>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Total Revenue</p>
                    <h3 class="text-2xl font-black mt-1">$124,500.00</h3>
                    <p class="text-success text-xs font-bold mt-2"><i class="bi bi-arrow-up"></i> +12% this month</p>
                </div>
                <div class="glass-card p-6 rounded-[2rem] shadow-sm">
                    <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mb-4">
                        <i class="bi bi-calendar-heart text-xl"></i>
                    </div>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">New Bookings</p>
                    <h3 class="text-2xl font-black mt-1">1,482</h3>
                    <p class="text-success text-xs font-bold mt-2"><i class="bi bi-arrow-up"></i> +5.4%</p>
                </div>
                <div class="glass-card p-6 rounded-[2rem] shadow-sm">
                    <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center mb-4">
                        <i class="bi bi-people text-xl"></i>
                    </div>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Active Users</p>
                    <h3 class="text-2xl font-black mt-1">8,920</h3>
                    <p class="text-red-500 text-xs font-bold mt-2"><i class="bi bi-arrow-down"></i> -2.1%</p>
                </div>
                <div class="glass-card p-6 rounded-[2rem] shadow-sm">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-4">
                        <i class="bi bi-star text-xl"></i>
                    </div>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Avg. Rating</p>
                    <h3 class="text-2xl font-black mt-1">4.8 / 5.0</h3>
                    <p class="text-slate-400 text-xs font-bold mt-2">Based on 2k reviews</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 glass-card rounded-[2.5rem] p-8 shadow-sm">
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="text-xl font-extrabold">Recent Transactions</h3>
                        <button class="text-brand font-bold text-sm hover:underline">View All</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-slate-400 text-[10px] uppercase tracking-[0.2em] font-black border-b border-slate-100">
                                    <th class="pb-4">Customer</th>
                                    <th class="pb-4">Destination</th>
                                    <th class="pb-4">Amount</th>
                                    <th class="pb-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <tr class="border-b border-slate-50 group">
                                    <td class="py-5">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 rounded-full bg-slate-200"></div>
                                            <span class="font-bold">Alex Rivera</span>
                                        </div>
                                    </td>
                                    <td class="py-5 text-slate-500 font-medium">Paris, France</td>
                                    <td class="py-5 font-bold">$1,200.00</td>
                                    <td class="py-5">
                                        <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-[10px] font-black uppercase">Completed</span>
                                    </td>
                                </tr>
                                <tr class="border-b border-slate-50 group">
                                    <td class="py-5">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 rounded-full bg-slate-200"></div>
                                            <span class="font-bold">Mila Kunis</span>
                                        </div>
                                    </td>
                                    <td class="py-5 text-slate-500 font-medium">Tokyo, Japan</td>
                                    <td class="py-5 font-bold">$950.00</td>
                                    <td class="py-5">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-[10px] font-black uppercase">Pending</span>
                                    </td>
                                </tr>
                                <tr class="group">
                                    <td class="py-5">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 rounded-full bg-slate-200"></div>
                                            <span class="font-bold">Jordan Smith</span>
                                        </div>
                                    </td>
                                    <td class="py-5 text-slate-500 font-medium">Bali, Indonesia</td>
                                    <td class="py-5 font-bold">$1,500.00</td>
                                    <td class="py-5">
                                        <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-[10px] font-black uppercase">Cancelled</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="glass-card rounded-[2.5rem] p-8 shadow-sm">
                    <h3 class="text-xl font-extrabold mb-8">Popular Destinations</h3>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=100" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-bold text-sm">Paris, France</p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase">450 Bookings</p>
                                </div>
                            </div>
                            <span class="text-brand font-black">#1</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=100" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-bold text-sm">Dubai, UAE</p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase">312 Bookings</p>
                                </div>
                            </div>
                            <span class="text-brand font-black">#2</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1500835595353-b0ad2e58b8df?auto=format&fit=crop&w=100" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-bold text-sm">Tokyo, Japan</p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase">298 Bookings</p>
                                </div>
                            </div>
                            <span class="text-brand font-black">#3</span>
                        </div>
                    </div>
                    <button class="w-full mt-8 py-3 border-2 border-slate-100 rounded-2xl text-xs font-bold text-slate-400 hover:border-brand hover:text-brand transition">Download Report</button>
                </div>
            </div>
        </main>
    </div>

</body>
</html>