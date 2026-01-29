<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: { brand: '#3B82F6', dark: '#0F172A', success: '#10B981', warning: '#F59E0B', danger: '#EF4444' }
                }
            }
        }
    </script>
    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .user-row:hover {
            background-color: rgba(59, 130, 246, 0.03);
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen font-sans antialiased text-slate-900">

    <div class="flex">
        <aside class="w-20 lg:w-72 bg-dark h-screen sticky top-0 flex flex-col p-4 lg:p-6">
            <div class="flex items-center gap-3 mb-12 px-2">
                <div class="w-10 h-10 bg-brand rounded-xl flex items-center justify-center text-white text-xl shadow-lg shadow-blue-500/20">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
                <span class="hidden lg:block text-white font-extrabold text-xl tracking-tighter">AdminHub</span>
            </div>

            <nav class="flex-1 space-y-2">
                <a href="admin_dashboard.php" class="flex items-center gap-4 px-4 py-3.5 text-slate-400 hover:text-white hover:bg-white/5 rounded-2xl transition-all">
                    <i class="bi bi-grid-1x2-fill text-xl"></i>
                    <span class="hidden lg:block font-semibold">Overview</span>
                </a>
                <a href="admin_users.php" class="flex items-center gap-4 px-4 py-3.5 bg-brand text-white shadow-lg shadow-blue-500/30 rounded-2xl transition-all">
                    <i class="bi bi-people-fill text-xl"></i>
                    <span class="hidden lg:block font-bold">User List</span>
                </a>
                <a href="admin_bookings.php" class="flex items-center gap-4 px-4 py-3.5 text-slate-400 hover:text-white hover:bg-white/5 rounded-2xl transition-all">
                    <i class="bi bi-calendar-check text-xl"></i>
                    <span class="hidden lg:block font-semibold">Inventory</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-6 lg:p-12">
            
            <header class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-10">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight">User Directory</h1>
                    <p class="text-slate-500 font-medium">Manage permissions and view account activities.</p>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" placeholder="Search by name or email..." 
                            class="pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-sm w-full lg:w-80 focus:ring-4 focus:ring-brand/10 outline-none transition-all">
                    </div>
                    <button class="bg-dark text-white px-6 py-3 rounded-2xl font-bold text-sm flex items-center gap-2 hover:bg-slate-800 transition-all shadow-xl shadow-slate-200">
                        <i class="bi bi-person-plus-fill"></i>
                        <span class="hidden md:inline">Add User</span>
                    </button>
                </div>
            </header>

            <div class="glass-panel rounded-[2.5rem] overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-8 py-5 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">User Details</th>
                                <th class="px-8 py-5 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Join Date</th>
                                <th class="px-8 py-5 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Bookings</th>
                                <th class="px-8 py-5 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Status</th>
                                <th class="px-8 py-5 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <?php
                            // Mock Data
                            $users = [
                                ['name' => 'John Doe', 'email' => 'john@example.com', 'date' => 'Oct 12, 2025', 'bookings' => '12', 'status' => 'Active', 'color' => 'bg-green-100 text-green-600'],
                                ['name' => 'Sarah Jenkins', 'email' => 'sarah.j@outlook.com', 'date' => 'Nov 05, 2025', 'bookings' => '04', 'status' => 'Active', 'color' => 'bg-green-100 text-green-600'],
                                ['name' => 'Mike Ross', 'email' => 'mike.r@pearson.com', 'date' => 'Dec 01, 2025', 'bookings' => '00', 'status' => 'Pending', 'color' => 'bg-blue-100 text-blue-600'],
                                ['name' => 'Harvey Specter', 'email' => 'harvey@law.com', 'date' => 'Sep 20, 2025', 'bookings' => '28', 'status' => 'Suspended', 'color' => 'bg-red-100 text-red-600'],
                                ['name' => 'Rachel Zane', 'email' => 'rachel@travels.org', 'date' => 'Jan 15, 2026', 'bookings' => '02', 'status' => 'Active', 'color' => 'bg-green-100 text-green-600'],
                            ];

                            foreach ($users as $user): ?>
                            <tr class="user-row transition-colors group">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="w-11 h-11 rounded-full bg-slate-100 flex items-center justify-center font-bold text-brand ring-2 ring-white">
                                            <?= substr($user['name'], 0, 1) ?>
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900"><?= $user['name'] ?></p>
                                            <p class="text-xs text-slate-400 font-medium"><?= $user['email'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-sm font-semibold text-slate-600">
                                    <?= $user['date'] ?>
                                </td>
                                <td class="px-8 py-5 text-sm font-bold text-slate-900">
                                    <?= $user['bookings'] ?>
                                </td>
                                <td class="px-8 py-5">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider <?= $user['color'] ?>">
                                        <?= $user['status'] ?>
                                    </span>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-2">
                                        <button class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-100 text-slate-500 hover:bg-brand hover:text-white transition-all">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-100 text-slate-500 hover:bg-danger hover:text-white transition-all">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="p-8 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-xs font-bold text-slate-400">Showing 1 to 5 of 248 users</p>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 rounded-xl border border-slate-200 text-xs font-bold hover:bg-slate-50 transition">Previous</button>
                        <button class="px-4 py-2 rounded-xl bg-dark text-white text-xs font-bold shadow-lg">1</button>
                        <button class="px-4 py-2 rounded-xl border border-slate-200 text-xs font-bold hover:bg-slate-50 transition">2</button>
                        <button class="px-4 py-2 rounded-xl border border-slate-200 text-xs font-bold hover:bg-slate-50 transition">Next</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>