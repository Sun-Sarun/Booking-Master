<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | BookingMaster</title>
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
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .text-gradient {
            background: linear-gradient(to right, #3B82F6, #2DD4BF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
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
                <a href="view_all.php" class="hover:text-brand transition">Explore</a>
                <a href="about.php" class="text-brand">About</a>
            </div>
            <a href="contact.php" class="bg-dark text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-brand transition-all">Contact Us</a>
        </div>
    </nav>

    <header class="relative py-24 overflow-hidden bg-dark text-white">
        <div class="absolute inset-0 opacity-30">
            <img src="https://images.unsplash.com/photo-1488085061387-422e29b40080?auto=format&fit=crop&w=1920" class="w-full h-full object-cover">
        </div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h4 class="text-brand font-bold uppercase tracking-[0.3em] text-sm mb-4">Our Journey</h4>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6">Redefining the way <br> <span class="text-gradient">you see the world.</span></h1>
            <p class="max-w-2xl mx-auto text-slate-400 text-lg leading-relaxed">
                BookingMaster started with a simple idea: travel should be seamless, luxury should be accessible, and every journey should tell a story.
            </p>
        </div>
    </header>

    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <h2 class="text-4xl font-extrabold text-slate-900 mb-2">150+</h2>
                    <p class="text-slate-500 font-medium uppercase tracking-widest text-[10px]">Destinations</p>
                </div>
                <div class="text-center">
                    <h2 class="text-4xl font-extrabold text-slate-900 mb-2">12M</h2>
                    <p class="text-slate-500 font-medium uppercase tracking-widest text-[10px]">Happy Travelers</p>
                </div>
                <div class="text-center">
                    <h2 class="text-4xl font-extrabold text-slate-900 mb-2">4.9</h2>
                    <p class="text-slate-500 font-medium uppercase tracking-widest text-[10px]">Average Rating</p>
                </div>
                <div class="text-center">
                    <h2 class="text-4xl font-extrabold text-slate-900 mb-2">24/7</h2>
                    <p class="text-slate-500 font-medium uppercase tracking-widest text-[10px]">Global Support</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div class="rounded-[3rem] overflow-hidden shadow-2xl rotate-3">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800" alt="Team">
                    </div>
                    <div class="absolute -bottom-8 -left-8 glass-card p-6 rounded-3xl shadow-xl hidden md:block">
                        <p class="text-brand font-extrabold text-2xl italic">"Travel is the only thing you buy that makes you richer."</p>
                    </div>
                </div>
                <div class="space-y-8">
                    <h2 class="text-4xl font-extrabold tracking-tight">Built by travelers, <br> for travelers.</h2>
                    <p class="text-slate-600 text-lg leading-relaxed">
                        We aren't just a booking platform; we are a community of explorers. Our team is composed of digital nomads, luxury enthusiasts, and adventure seekers who understand what it takes to make a trip unforgettable.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="mt-1 w-6 h-6 bg-blue-100 text-brand rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <p class="text-slate-700 font-medium">Curated selection of only the highest-rated properties.</p>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="mt-1 w-6 h-6 bg-blue-100 text-brand rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <p class="text-slate-700 font-medium">Transparent pricing with zero hidden booking fees.</p>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="mt-1 w-6 h-6 bg-blue-100 text-brand rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <p class="text-slate-700 font-medium">Instant confirmation and 24/7 concierge assistance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-4">Our Core Values</h2>
                <div class="w-20 h-1.5 bg-brand mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="glass-card p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all border-none">
                    <i class="bi bi-shield-check text-4xl text-brand mb-6 block"></i>
                    <h3 class="text-xl font-extrabold mb-4">Trust & Security</h3>
                    <p class="text-slate-500 leading-relaxed">Your safety is our priority. Every partner is vetted rigorously to ensure your peace of mind.</p>
                </div>
                <div class="glass-card p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all border-none">
                    <i class="bi bi-lightning-charge text-4xl text-brand mb-6 block"></i>
                    <h3 class="text-xl font-extrabold mb-4">Innovation</h3>
                    <p class="text-slate-500 leading-relaxed">We use the latest tech to provide instant bookings and personalized travel AI recommendations.</p>
                </div>
                <div class="glass-card p-10 rounded-[2.5rem] shadow-sm hover:shadow-xl transition-all border-none">
                    <i class="bi bi-globe-americas text-4xl text-brand mb-6 block"></i>
                    <h3 class="text-xl font-extrabold mb-4">Sustainability</h3>
                    <p class="text-slate-500 leading-relaxed">We are committed to eco-friendly travel options to preserve the beauty of our planet.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white pt-20 pb-10">
        <div class="container mx-auto px-6 text-center">
            <a href="#" class="text-2xl font-extrabold text-brand mb-6 block">BookingMaster</a>
            <p class="text-slate-500 text-sm">&copy; 2026 BookingMaster International. Proudly made for explorers.</p>
        </div>
    </footer>

</body>
</html>