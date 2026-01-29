<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingMaster | Professional Dashboard</title>
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
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .sidebar-gradient {
            background: linear-gradient(180deg, #0F172A 0%, #1E293B 100%);
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .active-link { @apply bg-brand text-white shadow-lg shadow-blue-500/30; }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900">

    <header class="lg:hidden flex items-center justify-between p-4 bg-white border-b">
        <div class="flex items-center space-x-2 text-brand font-bold text-xl">
            <i class="bi bi-geo-alt-fill"></i>
            <span>BookingMaster</span>
        </div>
        <button onclick="toggleSidebar()" class="text-2xl text-slate-600">
            <i class="bi bi-list"></i>
        </button>
    </header>

    <div class="flex min-h-screen">
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-72 sidebar-gradient text-slate-300 transform -translate-x-full lg:translate-x-0 lg:static transition-transform duration-300 ease-in-out shadow-2xl">
            <div class="p-8">
                <div class="flex items-center space-x-3 text-white text-2xl font-extrabold tracking-tight mb-10">
                    <div class="bg-brand p-2 rounded-xl shadow-lg shadow-blue-500/20">
                        <i class="bi bi-geo-alt-fill text-xl"></i>
                    </div>
                    <span>BookingMaster</span>
                </div>

                <nav class="space-y-2">
                    <p class="text-[10px] uppercase tracking-widest font-bold text-slate-500 mb-4 px-4">Menu</p>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-2xl bg-brand text-white shadow-lg shadow-blue-500/30 transition-all">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span class="font-semibold">Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-2xl hover:bg-white/5 hover:text-white transition-all">
                        <i class="bi bi-calendar-event"></i>
                        <span class="font-medium">My Bookings</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-2xl hover:bg-white/5 hover:text-white transition-all">
                        <i class="bi bi-wallet2"></i>
                        <span class="font-medium">Transactions</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-2xl hover:bg-white/5 hover:text-white transition-all">
                        <i class="bi bi-chat-dots"></i>
                        <span class="font-medium">Messages</span>
                    </a>
                    
                    <p class="text-[10px] uppercase tracking-widest font-bold text-slate-500 mt-10 mb-4 px-4">Settings</p>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-2xl hover:bg-white/5 hover:text-white transition-all">
                        <i class="bi bi-person-gear"></i>
                        <span class="font-medium">Profile</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-2xl hover:bg-red-500/10 hover:text-red-400 transition-all">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="font-medium">Logout</span>
                    </a>
                </nav>
            </div>
            
            <div class="absolute bottom-8 left-8 right-8 p-6 bg-white/5 rounded-[2rem] border border-white/10 text-center">
                <p class="text-xs font-semibold mb-3">Upgrade to Premium</p>
                <button class="w-full bg-white text-dark py-2 rounded-xl text-sm font-bold hover:bg-slate-100 transition">Go Pro</button>
            </div>
        </aside>

        <main class="flex-1 p-6 lg:p-10 no-scrollbar overflow-y-auto">
            
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Dashboard Overview</h1>
                    <p class="text-slate-500">Welcome back, Alex! Here’s what’s happening today.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="bi bi-bell text-xl text-slate-400"></i>
                        <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-slate-50"></span>
                    </div>
                    <div class="flex items-center space-x-3 bg-white p-2 pr-4 rounded-2xl border border-slate-200 shadow-sm cursor-pointer hover:shadow-md transition">
                        <img src="https://i.pravatar.cc/150?u=alex" class="w-10 h-10 rounded-xl object-cover" alt="Avatar">
                        <div>
                            <p class="text-sm font-bold leading-none">Alex Rivera</p>
                            <p class="text-[10px] text-slate-400 font-medium uppercase">Platinum Member</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="glass-card p-6 rounded-[2rem] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-100 text-brand rounded-2xl text-xl"><i class="bi bi-airplane-engines"></i></div>
                        <span class="text-xs font-bold text-green-500 bg-green-100 px-2 py-1 rounded-lg">+12%</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium">Total Bookings</p>
                    <h3 class="text-2xl font-extrabold mt-1">1,284</h3>
                </div>
                <div class="glass-card p-6 rounded-[2rem] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-purple-100 text-purple-600 rounded-2xl text-xl"><i class="bi bi-credit-card"></i></div>
                        <span class="text-xs font-bold text-slate-400 bg-slate-100 px-2 py-1 rounded-lg">Stable</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium">Total Spent</p>
                    <h3 class="text-2xl font-extrabold mt-1">$42,950</h3>
                </div>
                <div class="glass-card p-6 rounded-[2rem] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-orange-100 text-orange-600 rounded-2xl text-xl"><i class="bi bi-star"></i></div>
                        <span class="text-xs font-bold text-green-500 bg-green-100 px-2 py-1 rounded-lg">+5%</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium">User Rating</p>
                    <h3 class="text-2xl font-extrabold mt-1">4.9 / 5</h3>
                </div>
                <div class="glass-card p-6 rounded-[2rem] shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-teal-100 text-teal-600 rounded-2xl text-xl"><i class="bi bi-headset"></i></div>
                        <span class="text-xs font-bold text-red-500 bg-red-100 px-2 py-1 rounded-lg">-2m</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium">Response Time</p>
                    <h3 class="text-2xl font-extrabold mt-1">14 Mins</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 glass-card rounded-[2.5rem] p-8 shadow-sm">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-xl font-extrabold">Recent Itineraries</h3>
                        <button class="text-brand font-bold text-sm hover:underline underline-offset-4">View All</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-slate-400 text-xs uppercase tracking-widest font-bold">
                                    <th class="pb-4">Destination</th>
                                    <th class="pb-4">Date</th>
                                    <th class="pb-4">Status</th>
                                    <th class="pb-4 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <?php
                                $trips = [
                                    ['Paris, FR', 'May 12, 2026', 'Confirmed', 'text-green-500', 'bg-green-50'],
                                    ['Bali, ID', 'June 05, 2026', 'Pending', 'text-orange-500', 'bg-orange-50'],
                                    ['Tokyo, JP', 'Aug 20, 2026', 'In Review', 'text-blue-500', 'bg-blue-50']
                                ];
                                foreach($trips as $trip):
                                ?>
                                <tr class="group hover:bg-slate-50/50 transition">
                                    <td class="py-4 font-bold text-slate-700"><?= $trip[0] ?></td>
                                    <td class="py-4 text-sm text-slate-500 font-medium"><?= $trip[1] ?></td>
                                    <td class="py-4">
                                        <span class="<?= $trip[4] ?> <?= $trip[3] ?> text-[10px] font-extrabold px-3 py-1 rounded-full uppercase"><?= $trip[2] ?></span>
                                    </td>
                                    <td class="py-4 text-right">
                                        <button class="p-2 hover:bg-white rounded-xl shadow-sm border opacity-0 group-hover:opacity-100 transition"><i class="bi bi-three-dots"></i></button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="glass-card rounded-[2.5rem] p-8 shadow-sm">
                    <h3 class="text-xl font-extrabold mb-6">Exclusive Offers</h3>
                    <div class="space-y-6">
                        <div class="relative group cursor-pointer overflow-hidden rounded-3xl h-40">
                            <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=400" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-5">
                                <p class="text-white font-bold text-lg leading-tight">Beach Resorts</p>
                                <p class="text-white/70 text-sm">Save up to 40%</p>
                            </div>
                        </div>
                        <div class="relative group cursor-pointer overflow-hidden rounded-3xl h-40">
                            <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=400" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-5">
                                <p class="text-white font-bold text-lg leading-tight">Luxury Suites</p>
                                <p class="text-white/70 text-sm">Members Exclusive</p>
                            </div>
                        </div>
                    </div>
                    <button class="w-full mt-6 py-4 border-2 border-slate-200 rounded-2xl font-bold text-slate-600 hover:border-brand hover:text-brand transition">Show All Deals</button>
                </div>
            </div>

        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>
</body>
</html>