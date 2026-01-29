<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Product Inventory List</title>
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
        .glass-panel {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .table-row-hover:hover {
            background-color: rgba(59, 130, 246, 0.04);
        }
        .custom-scrollbar::-webkit-scrollbar { height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen font-sans antialiased text-slate-900">

    <div class="flex">
        <aside class="w-72 bg-dark h-screen sticky top-0 flex flex-col p-6">
            <div class="flex items-center gap-3 mb-12 px-2">
                <div class="w-10 h-10 bg-brand rounded-xl flex items-center justify-center text-white text-xl"><i class="bi bi-layers-fill"></i></div>
                <span class="text-white font-extrabold text-xl">AdminPanel</span>
            </div>
            <nav class="flex-1 space-y-2">
                <a href="admin_dashboard.php" class="flex items-center gap-4 px-4 py-3.5 text-slate-400 hover:text-white rounded-2xl font-semibold">
                    <i class="bi bi-grid"></i> Dashboard
                </a>
                <a href="admin_product_list.php" class="flex items-center gap-4 px-4 py-3.5 bg-brand text-white rounded-2xl shadow-lg shadow-blue-500/30 font-bold">
                    <i class="bi bi-list-ul"></i> Product List
                </a>
                <a href="admin_bookings.php" class="flex items-center gap-4 px-4 py-3.5 text-slate-400 hover:text-white rounded-2xl font-semibold">
                    <i class="bi bi-plus-circle"></i> Add New
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-10">
            <header class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-10">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight">Property Inventory</h1>
                    <p class="text-slate-500 font-medium">Manage all listings, types, and locations from one place.</p>
                </div>
                <div class="flex gap-3">
                    <div class="relative">
                        <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" placeholder="Search products..." class="pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-sm w-64 focus:ring-4 focus:ring-brand/10 outline-none">
                    </div>
                    <a href="admin_bookings.php" class="bg-dark text-white px-6 py-3 rounded-2xl font-bold text-sm flex items-center gap-2 hover:bg-slate-800 transition-all">
                        <i class="bi bi-plus-lg"></i> Add New
                    </a>
                </div>
            </header>

            <div class="glass-panel rounded-[2.5rem] overflow-hidden shadow-sm">
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-6 py-5 text-[10px] uppercase tracking-widest font-black text-slate-400">Property Name</th>
                                <th class="px-6 py-5 text-[10px] uppercase tracking-widest font-black text-slate-400">Type</th>
                                <th class="px-6 py-5 text-[10px] uppercase tracking-widest font-black text-slate-400">Contact / Phone</th>
                                <th class="px-6 py-5 text-[10px] uppercase tracking-widest font-black text-slate-400">Full Address</th>
                                <th class="px-6 py-5 text-[10px] uppercase tracking-widest font-black text-slate-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <?php
                            // Mock Data based on your requested parameters
                            $products = [
                                [
                                    'name' => 'Santorini Sunset Villa',
                                    'type' => 'Villa',
                                    'phone' => '+30 228 12345',
                                    'house' => 'No. 45-B',
                                    'district' => 'Oia',
                                    'province' => 'South Aegean',
                                    'country' => 'Greece',
                                    'status' => 'Active'
                                ],
                                [
                                    'name' => 'Grand Paris Luxury Suite',
                                    'type' => 'Hotel',
                                    'phone' => '+33 1 42 66 12',
                                    'house' => 'Suite 802',
                                    'district' => '8th Arr.',
                                    'province' => 'Île-de-France',
                                    'country' => 'France',
                                    'status' => 'Active'
                                ],
                                [
                                    'name' => 'Kyoto Zen Garden',
                                    'type' => 'Resort',
                                    'phone' => '+81 75 987 00',
                                    'house' => 'No. 12-1',
                                    'district' => 'Higashiyama',
                                    'province' => 'Kyoto',
                                    'country' => 'Japan',
                                    'status' => 'Inactive'
                                ]
                            ];

                            foreach ($products as $p): ?>
                            <tr class="table-row-hover transition-colors group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-400">
                                            <i class="bi bi-image"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900"><?= $p['name'] ?></p>
                                            <p class="text-[10px] text-brand font-black uppercase tracking-tighter">ID: BM-<?= rand(1000, 9999) ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold"><?= $p['type'] ?></span>
                                </td>
                                <td class="px-6 py-5 text-sm font-semibold text-slate-600">
                                    <i class="bi bi-telephone text-brand mr-1"></i> <?= $p['phone'] ?>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="text-xs leading-relaxed">
                                        <p class="font-bold text-slate-800"><?= $p['house'] ?>, <?= $p['district'] ?></p>
                                        <p class="text-slate-400"><?= $p['province'] ?>, <?= $p['country'] ?></p>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-2">
                                        <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-100 text-slate-400 hover:text-brand hover:border-brand transition-all shadow-sm">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-100 text-slate-400 hover:text-red-500 hover:border-red-500 transition-all shadow-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-100 text-slate-400 hover:text-dark hover:border-dark transition-all shadow-sm">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="px-8 py-6 border-t border-slate-50 flex justify-between items-center bg-slate-50/30">
                    <p class="text-xs font-bold text-slate-400">Showing 3 of 124 properties</p>
                    <div class="flex gap-2">
                        <button class="p-2 w-10 h-10 rounded-xl border border-slate-200 flex items-center justify-center hover:bg-white transition text-slate-400"><i class="bi bi-chevron-left"></i></button>
                        <button class="p-2 w-10 h-10 rounded-xl bg-dark text-white flex items-center justify-center font-bold">1</button>
                        <button class="p-2 w-10 h-10 rounded-xl border border-slate-200 flex items-center justify-center hover:bg-white transition text-slate-400"><i class="bi bi-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>