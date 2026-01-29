<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingMaster | Luxury Travel & Stays</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
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
        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        .hero-gradient {
            background: linear-gradient(rgba(15, 23, 42, 0.6), rgba(15, 23, 42, 0.6)), 
                        url('https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=1920');
            background-size: cover;
            background-position: center;
        }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-gray-50 text-slate-900 font-sans">

    <nav class="fixed w-full z-50 transition-all duration-300 glass border-b border-gray-200">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="flex items-center space-x-2 text-2xl font-extrabold text-brand tracking-tighter">
                <i class="bi bi-geo-alt-fill"></i>
                <span>BookingMaster</span>
            </a>
            
            <div class="hidden md:flex space-x-8 font-semibold text-slate-600">
                <a href="#" class="hover:text-brand transition">Home</a>
                <a href="#categories" class="hover:text-brand transition">Categories</a>
                <a href="#packages" class="hover:text-brand transition">Packages</a>
                <a href="#destinations" class="hover:text-brand transition">Destinations</a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="#" class="text-sm font-bold text-slate-700 hover:text-brand transition">Sign In</a>
                <a href="#" class="bg-brand text-white px-6 py-2.5 rounded-full font-bold shadow-lg shadow-blue-200 hover:bg-blue-600 transition transform hover:-translate-y-0.5">Book Now</a>
            </div>
        </div>
    </nav>

    <header class="hero-gradient h-[85vh] flex items-center justify-center text-center px-6">
        <div class="max-w-4xl">
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 leading-tight">
                Adventure Awaits, <br><span class="text-blue-400">Explore the World.</span>
            </h1>
            <p class="text-xl text-gray-200 mb-10 max-w-2xl mx-auto font-light">
                Discover the most beautiful places on earth with curated packages and luxury stays.
            </p>

            <div class="glass p-2 md:p-3 rounded-2xl md:rounded-full shadow-2xl max-w-5xl mx-auto border border-white/50">
                <form action="process_booking.php" method="POST" class="flex flex-col md:flex-row items-center gap-2">
                    <div class="flex-1 w-full px-4 text-left border-r border-gray-200">
                        <label class="block text-[10px] uppercase tracking-wider font-bold text-slate-400 ml-1">Location</label>
                        <input type="text" name="destination" placeholder="Where to?" class="w-full bg-transparent border-none focus:ring-0 text-slate-800 placeholder-slate-400 font-semibold" required>
                    </div>
                    <div class="flex-1 w-full px-4 text-left border-r border-gray-200">
                        <label class="block text-[10px] uppercase tracking-wider font-bold text-slate-400 ml-1">Check In</label>
                        <input type="date" name="check_in" class="w-full bg-transparent border-none focus:ring-0 text-slate-800 font-semibold cursor-pointer" required>
                    </div>
                    <div class="flex-1 w-full px-4 text-left border-r border-gray-200">
                        <label class="block text-[10px] uppercase tracking-wider font-bold text-slate-400 ml-1">Guests</label>
                        <input type="number" name="guests" placeholder="Add guests" class="w-full bg-transparent border-none focus:ring-0 text-slate-800 placeholder-slate-400 font-semibold" min="1" required>
                    </div>
                    <button type="submit" name="search" class="w-full md:w-auto bg-brand text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-blue-600 transition-all flex items-center justify-center gap-2">
                        <i class="bi bi-search"></i> Search
                    </button>
                </form>
            </div>
        </div>
    </header>

    <section class="py-12 bg-white border-b border-gray-100">
        <div class="container mx-auto px-6 flex flex-wrap justify-between items-center gap-8">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-blue-50 text-brand rounded-xl flex items-center justify-center text-2xl"><i class="bi bi-shield-check"></i></div>
                <div><h4 class="font-bold">Secure Booking</h4><p class="text-xs text-gray-500">100% data protection</p></div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center text-2xl"><i class="bi bi-headset"></i></div>
                <div><h4 class="font-bold">24/7 Support</h4><p class="text-xs text-gray-500">Expert travel help</p></div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-green-50 text-green-500 rounded-xl flex items-center justify-center text-2xl"><i class="bi bi-wallet2"></i></div>
                <div><h4 class="font-bold">Best Price</h4><p class="text-xs text-gray-500">No hidden fees</p></div>
            </div>
        </div>
    </section>

    <main class="container mx-auto px-6 py-20 space-y-24">

        <section id="categories">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h5 class="text-brand font-bold uppercase tracking-widest text-sm mb-2">Discovery</h5>
                    <h2 class="text-4xl font-extrabold">Popular Categories</h2>
                </div>
                <a href="#" class="text-brand font-bold hover:underline">View All <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="flex overflow-x-auto gap-6 hide-scrollbar pb-4">
                <?php
                $cats = [
                    ['Travel Packages', 'bi-backpack', 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=400'],
                    ['Luxury Hotels', 'bi-building-check', 'https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?auto=format&fit=crop&w=400'],
                    ['Vehicle Rental', 'bi-car-front', 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=400'],
                    ['Tour Guides', 'bi-person-walking', 'https://images.unsplash.com/photo-1500835595353-b0ad2e58b8df?auto=format&fit=crop&w=400'],
                    ['Room Rentals', 'bi-house-heart', 'https://images.unsplash.com/photo-1525625239911-4f5d7222eeed?auto=format&fit=crop&w=400']
                ];
                foreach ($cats as $cat): ?>
                <div class="min-w-[280px] group cursor-pointer">
                    <div class="relative h-48 rounded-2xl overflow-hidden mb-4">
                        <img src="<?= $cat[2] ?>" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-5">
                            <i class="bi <?= $cat[1] ?> text-white text-3xl mb-1"></i>
                        </div>
                    </div>
                    <h3 class="font-bold text-xl group-hover:text-brand transition"><?= $cat[0] ?></h3>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="packages">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h5 class="text-brand font-bold uppercase tracking-widest text-sm mb-2">Hot Offers</h5>
                    <h2 class="text-4xl font-extrabold">Featured Packages</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $packages = [
                    ['Paris, France', '$499', 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=400'],
                    ['Venice, Italy', '$550', 'https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?auto=format&fit=crop&w=400'],
                    ['Dubai, UAE', '$800', 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=400']
                ];
                foreach ($packages as $pkg): ?>
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition duration-300 border border-gray-100 group">
                    <div class="relative h-64">
                        <img src="<?= $pkg[2] ?>" class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 bg-brand text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase">Limited Time</span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-bold text-xl"><?= $pkg[0] ?></h3>
                            <div class="text-yellow-400 text-sm"><i class="bi bi-star-fill"></i> 4.9</div>
                        </div>
                        <p class="text-gray-500 text-sm mb-6">Experience the magic of <?= $pkg[0] ?> with a premium stay and guided tours.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-400 text-xs line-through">$600</span>
                                <div class="text-2xl font-extrabold text-slate-900"><?= $pkg[1] ?></div>
                            </div>
                            <button class="bg-slate-900 text-white px-5 py-2 rounded-xl font-bold hover:bg-brand transition">View Details</button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white pt-20 pb-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-1">
                    <a href="#" class="text-2xl font-extrabold text-brand mb-6 block">BookingMaster</a>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        We make travel simple, luxury accessible, and memories unforgettable.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-brand transition"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-brand transition"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-brand transition"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Company</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition">Partner with us</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Resources</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Destinations</a></li>
                        <li><a href="#" class="hover:text-white transition">Travel Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Help Center</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6">Newsletter</h4>
                    <p class="text-gray-400 mb-4">Subscribe for the best deals.</p>
                    <form class="flex space-x-2">
                        <input type="email" placeholder="Email address" class="bg-slate-800 border-none rounded-lg px-4 py-2 w-full focus:ring-1 focus:ring-brand">
                        <button class="bg-brand px-4 py-2 rounded-lg font-bold"><i class="bi bi-send"></i></button>
                    </form>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-10 text-center text-gray-500 text-sm">
                &copy; 2026 BookingMaster. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>