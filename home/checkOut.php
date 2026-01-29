<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingMaster | Your Cart</title>
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
        .item-row:hover { background: rgba(248, 250, 252, 0.8); }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="flex items-center space-x-2 text-2xl font-extrabold text-brand tracking-tighter">
                <i class="bi bi-geo-alt-fill"></i>
                <span>BookingMaster</span>
            </a>
            <div class="flex items-center space-x-6">
                <a href="view_all.php" class="font-bold text-slate-600 hover:text-brand transition">Back to Explore</a>
                <div class="relative">
                    <i class="bi bi-bag-check text-2xl text-slate-900"></i>
                    <span class="absolute -top-2 -right-2 bg-brand text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center">2</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-extrabold mb-10 tracking-tight">Your Travel Cart</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <div class="lg:col-span-2 space-y-6">
                
                <div class="glass-card rounded-[2.5rem] p-6 flex flex-col md:flex-row gap-6 shadow-sm item-row transition-all">
                    <div class="w-full md:w-48 h-36 rounded-3xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=400" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 flex flex-col justify-between">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold">Grand Paris Luxury Suite</h3>
                                <p class="text-slate-400 text-sm font-medium"><i class="bi bi-calendar3 mr-2"></i>Dec 12 - Dec 15, 2025</p>
                            </div>
                            <button class="text-slate-300 hover:text-red-500 transition text-xl">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                        <div class="flex justify-between items-end mt-4">
                            <div class="flex items-center space-x-4">
                                <span class="text-xs font-bold text-slate-400 uppercase">Guests:</span>
                                <div class="flex items-center bg-slate-100 rounded-xl px-2">
                                    <button class="p-2 hover:text-brand">-</button>
                                    <span class="px-4 font-bold text-sm">2</span>
                                    <button class="p-2 hover:text-brand">+</button>
                                </div>
                            </div>
                            <span class="text-2xl font-extrabold text-slate-900">$3,600</span>
                        </div>
                    </div>
                </div>

                <div class="glass-card rounded-[2.5rem] p-6 flex flex-col md:flex-row gap-6 shadow-sm item-row transition-all">
                    <div class="w-full md:w-48 h-36 rounded-3xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?auto=format&fit=crop&w=400" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 flex flex-col justify-between">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold">Venice Gondola Experience</h3>
                                <p class="text-slate-400 text-sm font-medium"><i class="bi bi-calendar3 mr-2"></i>Dec 16, 2025</p>
                            </div>
                            <button class="text-slate-300 hover:text-red-500 transition text-xl">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                        <div class="flex justify-between items-end mt-4">
                            <div class="flex items-center space-x-4">
                                <span class="text-xs font-bold text-slate-400 uppercase">Tickets:</span>
                                <div class="flex items-center bg-slate-100 rounded-xl px-2">
                                    <button class="p-2 hover:text-brand">-</button>
                                    <span class="px-4 font-bold text-sm">2</span>
                                    <button class="p-2 hover:text-brand">+</button>
                                </div>
                            </div>
                            <span class="text-2xl font-extrabold text-slate-900">$150</span>
                        </div>
                    </div>
                </div>

                <a href="view_all.php" class="inline-flex items-center text-brand font-bold hover:underline underline-offset-4 mt-4">
                    <i class="bi bi-arrow-left mr-2"></i> Continue Exploring
                </a>
            </div>

            <div class="lg:col-span-1">
                <div class="glass-card p-8 rounded-[2.5rem] shadow-xl">
                    <h2 class="text-2xl font-extrabold mb-8">Order Summary</h2>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-slate-500 font-medium">
                            <span>Subtotal</span>
                            <span>$3,750.00</span>
                        </div>
                        <div class="flex justify-between text-slate-500 font-medium">
                            <span>Service Fees</span>
                            <span>$45.00</span>
                        </div>
                        <div class="flex justify-between text-green-500 font-bold">
                            <span>Discount (WINTER20)</span>
                            <span>-$200.00</span>
                        </div>
                    </div>

                    <div class="relative mb-8">
                        <input type="text" placeholder="Promo code" class="w-full pl-4 pr-20 py-3 bg-slate-100 border-none rounded-2xl text-sm focus:ring-2 focus:ring-brand/20">
                        <button class="absolute right-2 top-1.5 bottom-1.5 bg-dark text-white px-4 rounded-xl text-xs font-bold hover:bg-brand transition">Apply</button>
                    </div>

                    <div class="border-t border-slate-100 pt-6 mb-8">
                        <div class="flex justify-between text-slate-900 font-extrabold text-2xl">
                            <span>Total</span>
                            <span>$3,595.00</span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <button class="w-full bg-brand text-white py-4 rounded-2xl font-bold text-lg shadow-lg shadow-blue-200 hover:bg-blue-600 transition-all active:scale-[0.98] flex items-center justify-center gap-2">
                            <span>Secure Checkout</span>
                            <i class="bi bi-lock-fill"></i>
                        </button>
                        
                        <div class="flex items-center justify-center gap-4 text-slate-300 text-xl pt-4">
                            <i class="bi bi-credit-card"></i>
                            <i class="bi bi-paypal"></i>
                            <i class="bi bi-apple"></i>
                        </div>
                    </div>
                </div>

                <div class="mt-6 p-6 border-2 border-dashed border-slate-200 rounded-[2rem] flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 text-brand rounded-full flex items-center justify-center text-xl">
                        <i class="bi bi-headset"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold">Need help?</p>
                        <p class="text-xs text-slate-500">Our support is available 24/7</p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="py-10 text-center text-slate-400 text-xs uppercase tracking-widest font-bold">
        &copy; 2026 BookingMaster International Secure Checkout
    </footer>

</body>
</html>