<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingMaster | Explore All Destinations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
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
        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        .card-shadow {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        }
        .filter-chip.active {
            @apply bg-brand text-white border-brand;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased">

    <nav class="sticky top-0 z-50 glass border-b border-slate-200">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="flex items-center space-x-2 text-2xl font-extrabold text-brand tracking-tighter">
                <i class="bi bi-geo-alt-fill"></i>
                <span>BookingMaster</span>
            </a>
            
            <div class="hidden md:flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Search destinations..." class="pl-10 pr-4 py-2 bg-slate-100 border-none rounded-full text-sm w-64 focus:ring-2 focus:ring-brand/20 transition-all">
                    <i class="bi bi-search absolute left-4 top-2.5 text-slate-400"></i>
                </div>
                <a href="#" class="bg-brand text-white px-6 py-2 rounded-full font-bold text-sm shadow-lg shadow-blue-200">Sign In</a>
            </div>
        </div>
    </nav>

    <header class="bg-white border-b border-slate-100 py-12">
        <div class="container mx-auto px-6">
            <nav class="flex mb-4 text-xs font-bold uppercase tracking-widest text-slate-400">
                <a href="index.php" class="hover:text-brand transition">Home</a>
                <span class="mx-2">/</span>
                <span class="text-slate-600">All Destinations</span>
            </nav>
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight">Explore the World</h1>
            <p class="text-slate-500 mt-2 text-lg">Showing 248 luxury stays and curated packages found globally.</p>
        </div>
    </header>

    <main class="container mx-auto px-6 py-10">
        <div class="flex flex-col lg:flex-row gap-10">
            
            <aside class="w-full lg:w-72 space-y-8">
                <div>
                    <h3 class="font-extrabold text-lg mb-4">Categories</h3>
                    <div class="flex flex-wrap lg:flex-col gap-2">
                        <button class="filter-chip px-4 py-2 rounded-xl border border-slate-200 text-sm font-bold text-left hover:border-brand active">All Categories</button>
                        <button class="filter-chip px-4 py-2 rounded-xl border border-slate-200 text-sm font-bold text-left hover:border-brand">Luxury Hotels</button>
                        <button class="filter-chip px-4 py-2 rounded-xl border border-slate-200 text-sm font-bold text-left hover:border-brand">Travel Packages</button>
                        <button class="filter-chip px-4 py-2 rounded-xl border border-slate-200 text-sm font-bold text-left hover:border-brand">Rental Vehicles</button>
                    </div>
                </div>

                <div>
                    <h3 class="font-extrabold text-lg mb-4">Price Range</h3>
                    <input type="range" class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-brand">
                    <div class="flex justify-between text-xs font-bold text-slate-400 mt-2">
                        <span>$100</span>
                        <span>$5,000+</span>
                    </div>
                </div>

                <div>
                    <h3 class="font-extrabold text-lg mb-4">Rating</h3>
                    <div class="space-y-2">
                        <?php for($i=5; $i>=3; $i--): ?>
                        <label class="flex items-center space-x-3 cursor-pointer group">
                            <input type="checkbox" class="w-5 h-5 rounded border-slate-300 text-brand focus:ring-brand">
                            <span class="text-sm font-medium text-slate-600 group-hover:text-slate-900">
                                <?= $i ?> Stars & Up 
                                <span class="text-yellow-400 ml-1"><i class="bi bi-star-fill"></i></span>
                            </span>
                        </label>
                        <?php endfor; ?>
                    </div>
                </div>
            </aside>

            <div class="flex-1">
                <div class="flex justify-between items-center mb-8">
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">Sort by: <span class="text-slate-900 ml-2">Recommended <i class="bi bi-chevron-down ml-1"></i></span></p>
                    <div class="flex space-x-2">
                        <button class="p-2 bg-white border border-slate-200 rounded-lg text-brand"><i class="bi bi-grid-fill"></i></button>
                        <button class="p-2 bg-white border border-slate-200 rounded-lg text-slate-400"><i class="bi bi-list"></i></button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                    <?php
                    // Simulated Data Array
                    $items = [
                        ['Paris Luxury Stay', 'Hotel', '$1,200', '4.9', 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=600'],
                        ['Venice Getaway', 'Package', '$550', '4.8', 'https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?auto=format&fit=crop&w=600'],
                        ['Dubai Desert Safari', 'Tour', '$800', '5.0', 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=600'],
                        ['Tokyo Neon Night', 'Package', '$950', '4.7', 'https://images.unsplash.com/photo-1500835595353-b0ad2e58b8df?auto=format&fit=crop&w=600'],
                        ['New York Skyline', 'Hotel', '$620', '4.6', 'https://images.unsplash.com/photo-1525625239911-4f5d7222eeed?auto=format&fit=crop&w=600'],
                        ['Bali Ocean Villa', 'Resort', '$1,500', '4.9', 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=600']
                    ];

                    foreach ($items as $item): ?>
                    <div class="bg-white rounded-[2rem] overflow-hidden card-shadow hover:-translate-y-2 transition-all duration-300 group">
                        <div class="relative h-60 overflow-hidden">
                            <img src="<?= $item[4] ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <button class="absolute top-4 right-4 w-10 h-10 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 transition">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                            <span class="absolute bottom-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest"><?= $item[1] ?></span>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-lg leading-tight text-slate-900"><?= $item[0] ?></h3>
                                <div class="flex items-center text-yellow-400 font-bold text-sm">
                                    <i class="bi bi-star-fill mr-1"></i> <?= $item[3] ?>
                                </div>
                            </div>
                            <div class="flex items-center text-slate-400 text-xs mb-6">
                                <i class="bi bi-geo-alt mr-1"></i> Worldwide Destination
                            </div>
                            <div class="flex justify-between items-center pt-4 border-t border-slate-50">
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase">Per Night</p>
                                    <span class="text-xl font-extrabold text-slate-900"><?= $item[2] ?></span>
                                </div>
                                <button class="bg-dark text-white px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-brand transition-all">Book Now</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-16 flex justify-center space-x-2">
                    <button class="w-12 h-12 rounded-xl border border-slate-200 flex items-center justify-center hover:bg-white hover:shadow-lg transition"><i class="bi bi-chevron-left"></i></button>
                    <button class="w-12 h-12 rounded-xl bg-brand text-white font-bold shadow-lg shadow-blue-200">1</button>
                    <button class="w-12 h-12 rounded-xl border border-slate-200 font-bold hover:bg-white transition">2</button>
                    <button class="w-12 h-12 rounded-xl border border-slate-200 font-bold hover:bg-white transition">3</button>
                    <button class="w-12 h-12 rounded-xl border border-slate-200 flex items-center justify-center hover:bg-white hover:shadow-lg transition"><i class="bi bi-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white pt-20 pb-10 mt-20">
        <div class="container mx-auto px-6 text-center">
            <a href="#" class="text-2xl font-extrabold text-brand mb-6 block">BookingMaster</a>
            <div class="flex justify-center space-x-6 mb-10">
                <a href="#" class="text-gray-400 hover:text-white transition">About</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Destinations</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Support</a>
            </div>
            <p class="text-gray-500 text-sm border-t border-slate-800 pt-10">&copy; 2026 BookingMaster. Explore with confidence.</p>
        </div>
    </footer>

</body>
</html>