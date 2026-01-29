<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingMaster | Grand Paris Luxury Suite</title>
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
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .sticky-sidebar { top: 100px; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="flex items-center space-x-2 text-2xl font-extrabold text-brand tracking-tighter">
                <i class="bi bi-geo-alt-fill"></i>
                <span>BookingMaster</span>
            </a>
            <div class="hidden md:flex space-x-8 font-bold text-slate-600">
                <a href="index.php" class="hover:text-brand transition">Home</a>
                <a href="view_all.php" class="hover:text-brand transition">Destinations</a>
                <a href="#" class="hover:text-brand transition">My Bookings</a>
            </div>
            <button class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-brand hover:text-white transition">
                <i class="bi bi-person-fill"></i>
            </button>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-10">
        
        <nav class="flex mb-8 text-xs font-bold uppercase tracking-widest text-slate-400">
            <a href="index.php">Home</a> <span class="mx-2">/</span>
            <a href="view_all.php">Destinations</a> <span class="mx-2">/</span>
            <span class="text-slate-900">Paris Luxury Suite</span>
        </nav>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 gap-4">
            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">Grand Paris Luxury Suite</h1>
                <p class="text-slate-500 mt-2 flex items-center">
                    <i class="bi bi-geo-alt-fill text-brand mr-2"></i> 8th Arrondissement, Paris, France
                </p>
            </div>
            <div class="flex space-x-3">
                <button class="flex items-center space-x-2 px-4 py-2 rounded-xl border border-slate-200 font-bold text-sm hover:bg-white transition">
                    <i class="bi bi-share"></i> <span>Share</span>
                </button>
                <button class="flex items-center space-x-2 px-4 py-2 rounded-xl border border-slate-200 font-bold text-sm hover:bg-white transition text-red-500">
                    <i class="bi bi-heart"></i> <span>Save</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 h-[500px] mb-12 rounded-[2.5rem] overflow-hidden shadow-2xl">
            <div class="md:col-span-2 md:row-span-2 relative group cursor-pointer">
                <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=800" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
            </div>
            <div class="hidden md:block relative group cursor-pointer">
                <img src="https://images.unsplash.com/photo-1522333323558-4b5511dcbb8b?auto=format&fit=crop&w=400" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
            </div>
            <div class="hidden md:block relative group cursor-pointer">
                <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?auto=format&fit=crop&w=400" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
            </div>
            <div class="hidden md:block relative group cursor-pointer">
                <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457?auto=format&fit=crop&w=400" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
            </div>
            <div class="hidden md:block relative group cursor-pointer">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=400" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center text-white font-bold">
                    View All Photos
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-2 space-y-12">
                <section>
                    <h2 class="text-2xl font-extrabold mb-6">About this space</h2>
                    <p class="text-slate-600 leading-relaxed text-lg">
                        Experience the epitome of Parisian elegance in this grand luxury suite. Located just steps away from the Champs-Élysées, this space combines historical architecture with modern high-end amenities. Perfect for travelers seeking a sophisticated stay in the heart of the city of lights.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-extrabold mb-6">What this place offers</h2>
                    <div class="grid grid-cols-2 gap-y-4">
                        <div class="flex items-center space-x-4 text-slate-700 font-medium">
                            <i class="bi bi-wifi text-xl text-brand"></i> <span>High-speed Wi-Fi</span>
                        </div>
                        <div class="flex items-center space-x-4 text-slate-700 font-medium">
                            <i class="bi bi-p-circle text-xl text-brand"></i> <span>Free Parking</span>
                        </div>
                        <div class="flex items-center space-x-4 text-slate-700 font-medium">
                            <i class="bi bi-water text-xl text-brand"></i> <span>Infinity Pool</span>
                        </div>
                        <div class="flex items-center space-x-4 text-slate-700 font-medium">
                            <i class="bi bi-snow text-xl text-brand"></i> <span>Air Conditioning</span>
                        </div>
                    </div>
                    <button class="mt-8 px-6 py-3 border-2 border-slate-200 rounded-2xl font-bold hover:border-brand hover:text-brand transition">Show all 45 amenities</button>
                </section>

                <section class="border-t border-slate-200 pt-12">
                    <h2 class="text-2xl font-extrabold mb-8 flex items-center">
                        <i class="bi bi-star-fill text-yellow-400 mr-3"></i> 4.98 · 124 Reviews
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <?php for($i=0; $i<2; $i++): ?>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <img src="https://i.pravatar.cc/150?u=<?=$i?>" class="w-12 h-12 rounded-full">
                                <div>
                                    <h4 class="font-bold">Sarah Jenkins</h4>
                                    <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">October 2025</p>
                                </div>
                            </div>
                            <p class="text-slate-600 text-sm italic">"Absolutely breathtaking views and world-class service. This was by far the best stay I've ever had in Paris. Will definitely return!"</p>
                        </div>
                        <?php endfor; ?>
                    </div>
                </section>
            </div>

            <div class="lg:col-span-1">
                <div class="glass-card p-8 rounded-[2.5rem] sticky-sidebar shadow-xl card-shadow">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <span class="text-3xl font-extrabold">$1,200</span>
                            <span class="text-slate-400 text-sm font-bold">/ night</span>
                        </div>
                        <div class="text-sm font-bold"><i class="bi bi-star-fill text-yellow-400"></i> 4.98</div>
                    </div>

                    <form class="space-y-4">
                        <div class="grid grid-cols-2 border border-slate-200 rounded-2xl overflow-hidden">
                            <div class="p-3 border-r border-slate-200 hover:bg-slate-50 transition cursor-pointer">
                                <label class="block text-[10px] uppercase font-bold text-slate-400">Check-in</label>
                                <input type="text" value="12/12/2025" class="bg-transparent border-none p-0 text-sm font-bold w-full focus:ring-0">
                            </div>
                            <div class="p-3 hover:bg-slate-50 transition cursor-pointer">
                                <label class="block text-[10px] uppercase font-bold text-slate-400">Check-out</label>
                                <input type="text" value="12/15/2025" class="bg-transparent border-none p-0 text-sm font-bold w-full focus:ring-0">
                            </div>
                        </div>
                        <div class="p-3 border border-slate-200 rounded-2xl hover:bg-slate-50 transition cursor-pointer">
                            <label class="block text-[10px] uppercase font-bold text-slate-400">Guests</label>
                            <select class="bg-transparent border-none p-0 text-sm font-bold w-full focus:ring-0">
                                <option>2 Guests</option>
                                <option>3 Guests</option>
                                <option>4 Guests</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="w-full bg-brand text-white py-4 rounded-2xl font-bold text-lg shadow-lg shadow-blue-200 hover:bg-blue-600 transition-all active:scale-[0.98] mt-4">
                            Reserve Now
                        </button>
                    </form>

                    <p class="text-center text-slate-400 text-xs mt-4">You won't be charged yet</p>
                    
                    <div class="mt-6 space-y-3 border-t border-slate-100 pt-6">
                        <div class="flex justify-between text-slate-600 font-medium">
                            <span>$1,200 x 3 nights</span>
                            <span>$3,600</span>
                        </div>
                        <div class="flex justify-between text-slate-600 font-medium">
                            <span>Service fee</span>
                            <span>$150</span>
                        </div>
                        <div class="flex justify-between text-slate-900 font-extrabold text-lg pt-3 border-t border-slate-100">
                            <span>Total</span>
                            <span>$3,750</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="bg-dark text-white pt-20 pb-10 mt-20">
        <div class="container mx-auto px-6 text-center">
            <a href="#" class="text-2xl font-extrabold text-brand mb-6 block">BookingMaster</a>
            <p class="text-gray-500 text-sm">&copy; 2026 BookingMaster International. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>