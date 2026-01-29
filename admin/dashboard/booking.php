<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage Inventory</title>
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
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        input, select, textarea {
            @apply w-full px-5 py-3 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-brand/10 focus:border-brand outline-none transition-all;
        }
        label {
            @apply text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2 mb-1 block;
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen font-sans antialiased text-slate-900">

    <div class="flex">
        <aside class="w-72 bg-dark h-screen sticky top-0 flex flex-col p-6">
            <div class="flex items-center gap-3 mb-12 px-2">
                <div class="w-10 h-10 bg-brand rounded-xl flex items-center justify-center text-white text-xl"><i class="bi bi-gear-fill"></i></div>
                <span class="text-white font-extrabold text-xl">AdminPanel</span>
            </div>
            <nav class="flex-1 space-y-2">
                <a href="#" class="flex items-center gap-4 px-4 py-3.5 bg-brand text-white rounded-2xl shadow-lg shadow-blue-500/30 font-bold">
                    <i class="bi bi-plus-circle"></i> Add Listing
                </a>
                <a href="admin_dashboard.php" class="flex items-center gap-4 px-4 py-3.5 text-slate-400 hover:text-white rounded-2xl font-semibold">
                    <i class="bi bi-grid"></i> Dashboard
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-12">
            <header class="mb-10">
                <h1 class="text-3xl font-extrabold tracking-tight">New Property Listing</h1>
                <p class="text-slate-500 font-medium">Please fill in the required parameters to list a new property.</p>
            </header>

            <div class="glass-panel rounded-[2.5rem] p-10 shadow-sm border-none max-w-5xl">
                <form action="#" method="POST" class="space-y-8">
                    
                    <div>
                        <h3 class="text-sm font-bold text-brand uppercase tracking-tighter mb-6 border-b pb-2">1. Basic Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Property Name">
                            </div>
                            <div class="space-y-1">
                                <label>Type</label>
                                <select name="type">
                                    <option>Hotel</option>
                                    <option></option>
                                    <option>Apartment</option>
                                    <option>Resort</option>
                                </select>
                            </div>
                            <div class="space-y-1">
                                <label>Phone Number</label>
                                <input type="tel" name="phone" placeholder="+1 (234) 567-890">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-bold text-brand uppercase tracking-tighter mb-6 border-b pb-2">2. Location Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div class="space-y-1 lg:col-span-1">
                                <label>House Number</label>
                                <input type="text" name="house_number" placeholder="No. 123">
                            </div>
                            <div class="space-y-1 lg:col-span-1">
                                <label>District</label>
                                <input type="text" name="district" placeholder="District Name">
                            </div>
                            <div class="space-y-1 lg:col-span-1">
                                <label>Province</label>
                                <input type="text" name="province" placeholder="State/Province">
                            </div>
                            <div class="space-y-1 lg:col-span-1">
                                <label>Country</label>
                                <input type="text" name="country" placeholder="Country">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-bold text-brand uppercase tracking-tighter mb-6 border-b pb-2">3. Detailed Description</h3>
                        <div class="space-y-1">
                            <label>Description</label>
                            <textarea name="description" rows="5" placeholder="Describe the property, amenities, and surroundings..."></textarea>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full md:w-auto px-12 py-4 bg-dark text-white rounded-2xl font-black text-lg hover:bg-brand shadow-xl transition-all active:scale-[0.98]">
                            Save Listing
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>
</html>