<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', 'Argenza Top Jean\'s — Jasa Vermak & Jahit Levis Profesional')</title>
    <meta name="description" content="@yield('meta_description', 'Argenza Top Jean\'s melayani jasa vermak levis total, kecilin pinggang, potong sambung celana, ganti resleting, dan jahit custom levis dengan kualitas premium, rapi, dan cepat.')">
    <meta name="keywords" content="vermak levis, jahit levis, kecilin celana, potong celana, ganti resleting, argenza top jeans, vermak levis profesional">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Argenza Top Jean\'s — Jasa Vermak & Jahit Levis')">
    <meta property="og:description" content="Jasa vermak & jahit custom levis profesional dengan hasil rapi, presisi, dan harga terjangkau.">
    <meta property="og:image" content="{{ asset('images/custom-jeans.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-denim-dark text-denim-text font-dmsans selection:bg-denim-red selection:text-white" 
      x-data="{ mobileMenuOpen: false, scrolled: false }"
      @scroll.window="scrolled = (window.pageYOffset > 50) ? true : false">

    <!-- NAVBAR -->
    <nav :class="scrolled ? 'bg-denim-dark/95 border-b border-white/10 shadow-lg backdrop-blur-md py-4' : 'bg-transparent py-6'"
         class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="#beranda" class="flex items-center space-x-2 group">
                    <span class="p-2 bg-denim-red rounded-lg text-white group-hover:scale-110 transition-transform duration-300">
                        <!-- Scissors Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                            <circle cx="6" cy="6" r="3" />
                            <circle cx="6" cy="18" r="3" />
                            <path d="M20 4L8.5 11" />
                            <path d="M20 20L8.5 13" />
                            <path d="M8.12 12h7.88" />
                        </svg>
                    </span>
                    <span class="font-oswald text-2xl font-bold tracking-wider uppercase text-white group-hover:text-denim-red transition-colors">
                        ARGENZA <span class="text-denim-red font-light">TOP JEAN'S</span>
                    </span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8 font-oswald text-lg tracking-wide">
                    <a href="#beranda" class="text-denim-muted hover:text-white transition-colors duration-200">BERANDA</a>
                    <a href="#keunggulan" class="text-denim-muted hover:text-white transition-colors duration-200">KEUNGGULAN</a>
                    <a href="#layanan" class="text-denim-muted hover:text-white transition-colors duration-200">LAYANAN & HARGA</a>
                    <a href="#cara-pesan" class="text-denim-muted hover:text-white transition-colors duration-200">CARA PESAN</a>
                    <a href="#galeri" class="text-denim-muted hover:text-white transition-colors duration-200">GALERI</a>
                    <a href="#hubungi-kami" class="text-denim-muted hover:text-white transition-colors duration-200">KONTAK</a>
                </div>

                <!-- Desktop CTA Button -->
                <div class="hidden md:block">
                    <a href="https://wa.me/{{ env('WA_NUMBER', '6281234567890') }}?text=Halo%20Argenza%20Top%20Jean's!%20👋%20Saya%20ingin%20tanya%20mengenai%20layanan%20vermak/jahit%20jeans." 
                       target="_blank" 
                       class="inline-flex items-center space-x-2 bg-denim-green hover:bg-[#20ba56] text-white px-5 py-2.5 rounded-full font-oswald tracking-wide font-medium transition-all duration-300 transform hover:-translate-y-0.5 shadow-md shadow-denim-green/20">
                        <!-- WA Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.197 1.489 4.807 1.49 5.483.003 9.948-4.459 9.951-9.94.002-2.654-1.02-5.15-2.883-7.014C16.65 1.826 14.154.803 11.5.803c-5.488 0-9.954 4.46-9.957 9.943-.001 1.77.475 3.498 1.38 5.044l-.993 3.626 3.717-.976zm11.599-7.093c-.3-.15-1.773-.875-2.043-.974-.27-.099-.467-.149-.663.15-.197.299-.76 1.002-.931 1.201-.171.2-.343.224-.643.075-.3-.15-1.267-.467-2.413-1.489-.892-.796-1.493-1.78-1.668-2.08-.175-.3-.019-.462.131-.61.135-.133.3-.349.45-.523.15-.174.2-.299.3-.499.1-.2.05-.374-.025-.524-.075-.15-.663-1.597-.909-2.193-.24-.577-.48-.499-.663-.508-.172-.007-.37-.008-.567-.008-.198 0-.52.074-.792.373-.272.299-1.04 1.016-1.04 2.479 0 1.463 1.063 2.877 1.211 3.077.149.2 2.093 3.197 5.07 4.485.708.306 1.26.489 1.691.626.712.227 1.36.195 1.871.118.571-.085 1.774-.725 2.023-1.424.249-.699.249-1.295.174-1.424-.075-.13-.272-.204-.572-.354z"/>
                        </svg>
                        <span>KONSULTASI WA</span>
                    </a>
                </div>

                <!-- Mobile Hamburger -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="text-white hover:text-denim-red focus:outline-none p-2"
                            aria-label="Toggle menu">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-none stroke-current" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             @click.away="mobileMenuOpen = false"
             class="md:hidden bg-denim-dark border-b border-white/10 px-4 pt-2 pb-6 space-y-4 shadow-xl"
             style="display: none;">
            <a href="#beranda" @click="mobileMenuOpen = false" class="block font-oswald text-lg text-denim-muted hover:text-white py-2">BERANDA</a>
            <a href="#keunggulan" @click="mobileMenuOpen = false" class="block font-oswald text-lg text-denim-muted hover:text-white py-2">KEUNGGULAN</a>
            <a href="#layanan" @click="mobileMenuOpen = false" class="block font-oswald text-lg text-denim-muted hover:text-white py-2">LAYANAN & HARGA</a>
            <a href="#cara-pesan" @click="mobileMenuOpen = false" class="block font-oswald text-lg text-denim-muted hover:text-white py-2">CARA PESAN</a>
            <a href="#galeri" @click="mobileMenuOpen = false" class="block font-oswald text-lg text-denim-muted hover:text-white py-2">GALERI</a>
            <a href="#hubungi-kami" @click="mobileMenuOpen = false" class="block font-oswald text-lg text-denim-muted hover:text-white py-2">KONTAK</a>
            
            <a href="https://wa.me/{{ env('WA_NUMBER', '6281234567890') }}?text=Halo%20Argenza%20Top%20Jean's!%20👋" 
               target="_blank" 
               class="flex items-center justify-center space-x-2 bg-denim-green hover:bg-[#20ba56] text-white px-5 py-3 rounded-xl font-oswald tracking-wide font-medium shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.197 1.489 4.807 1.49 5.483.003 9.948-4.459 9.951-9.94.002-2.654-1.02-5.15-2.883-7.014C16.65 1.826 14.154.803 11.5.803c-5.488 0-9.954 4.46-9.957 9.943-.001 1.77.475 3.498 1.38 5.044l-.993 3.626 3.717-.976zm11.599-7.093c-.3-.15-1.773-.875-2.043-.974-.27-.099-.467-.149-.663.15-.197.299-.76 1.002-.931 1.201-.171.2-.343.224-.643.075-.3-.15-1.267-.467-2.413-1.489-.892-.796-1.493-1.78-1.668-2.08-.175-.3-.019-.462.131-.61.135-.133.3-.349.45-.523.15-.174.2-.299.3-.499.1-.2.05-.374-.025-.524-.075-.15-.663-1.597-.909-2.193-.24-.577-.48-.499-.663-.508-.172-.007-.37-.008-.567-.008-.198 0-.52.074-.792.373-.272.299-1.04 1.016-1.04 2.479 0 1.463 1.063 2.877 1.211 3.077.149.2 2.093 3.197 5.07 4.485.708.306 1.26.489 1.691.626.712.227 1.36.195 1.871.118.571-.085 1.774-.725 2.023-1.424.249-.699.249-1.295.174-1.424-.075-.13-.272-.204-.572-.354z"/>
                </svg>
                <span>PESAN VIA WHATSAPP</span>
            </a>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-black/90 border-t border-white/10 text-denim-muted pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Column 1: Info Toko -->
                <div>
                    <div class="flex items-center space-x-2 mb-6">
                        <span class="p-2 bg-denim-red rounded-lg text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                <circle cx="6" cy="6" r="3" />
                                <circle cx="6" cy="18" r="3" />
                                <path d="M20 4L8.5 11" />
                                <path d="M20 20L8.5 13" />
                            </path>
                            </svg>
                        </span>
                        <span class="font-oswald text-xl font-bold tracking-wider uppercase text-white">
                            ARGENZA <span class="text-denim-red font-light">TOP JEAN'S</span>
                        </span>
                    </div>
                    <p class="text-sm leading-relaxed mb-6 font-dmsans">
                        "Jahit Custom Sesuai Ukuran — Vermak Levis Profesional"<br>
                        Spesialis reparasi, modifikasi celana denim, dan pembuatan jeans custom dari nol dengan pengerjaan rapi & presisi.
                    </p>
                    <div class="flex items-center space-x-4">
                        <!-- Instagram -->
                        <a href="https://instagram.com" target="_blank" class="p-2.5 bg-white/5 hover:bg-denim-red hover:text-white rounded-full transition-all duration-300 text-denim-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/>
                            </svg>
                        </a>
                        <!-- WhatsApp -->
                        <a href="https://wa.me/{{ env('WA_NUMBER', '6281234567890') }}" target="_blank" class="p-2.5 bg-white/5 hover:bg-denim-green hover:text-white rounded-full transition-all duration-300 text-denim-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.197 1.489 4.807 1.49 5.483.003 9.948-4.459 9.951-9.94.002-2.654-1.02-5.15-2.883-7.014C16.65 1.826 14.154.803 11.5.803c-5.488 0-9.954 4.46-9.957 9.943-.001 1.77.475 3.498 1.38 5.044l-.993 3.626 3.717-.976zm11.599-7.093c-.3-.15-1.773-.875-2.043-.974-.27-.099-.467-.149-.663.15-.197.299-.76 1.002-.931 1.201-.171.2-.343.224-.643.075-.3-.15-1.267-.467-2.413-1.489-.892-.796-1.493-1.78-1.668-2.08-.175-.3-.019-.462.131-.61.135-.133.3-.349.45-.523.15-.174.2-.299.3-.499.1-.2.05-.374-.025-.524-.075-.15-.663-1.597-.909-2.193-.24-.577-.48-.499-.663-.508-.172-.007-.37-.008-.567-.008-.198 0-.52.074-.792.373-.272.299-1.04 1.016-1.04 2.479 0 1.463 1.063 2.877 1.211 3.077.149.2 2.093 3.197 5.07 4.485.708.306 1.26.489 1.691.626.712.227 1.36.195 1.871.118.571-.085 1.774-.725 2.023-1.424.249-.699.249-1.295.174-1.424-.075-.13-.272-.204-.572-.354z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Layanan Menu -->
                <div>
                    <h3 class="font-oswald text-lg text-white tracking-wide uppercase mb-6">Layanan Kami</h3>
                    <ul class="space-y-3 font-dmsans text-sm">
                        <li><a href="#layanan" class="hover:text-denim-red transition-colors">Vermak Jeans</a></li>
                        <li><a href="#layanan" class="hover:text-denim-red transition-colors">Kecilin Ukuran Celana</a></li>
                        <li><a href="#layanan" class="hover:text-denim-red transition-colors">Potong & Sambung</a></li>
                        <li><a href="#layanan" class="hover:text-denim-red transition-colors">Ganti Resleting Jeans/Jaket</a></li>
                        <li><a href="#layanan" class="hover:text-denim-red transition-colors">Jahit Custom Levis Baru</a></li>
                    </ul>
                </div>

                <!-- Column 3: Jam Operasional -->
                <div>
                    <h3 class="font-oswald text-lg text-white tracking-wide uppercase mb-6">Jam Operasional</h3>
                    <ul class="space-y-3 font-dmsans text-sm">
                        <li class="flex justify-between border-b border-white/5 pb-2">
                            <span>Senin – Sabtu</span>
                            <span class="text-white font-medium">08.00 – 20.00</span>
                        </li>
                        <li class="flex justify-between border-b border-white/5 pb-2">
                            <span>Minggu</span>
                            <span class="text-white font-medium">09.00 – 17.00</span>
                        </li>
                        <li class="text-xs text-denim-red italic mt-2">
                            *Untuk hari libur nasional, silakan konfirmasi via WhatsApp.
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Kontak & Lokasi -->
                <div>
                    <h3 class="font-oswald text-lg text-white tracking-wide uppercase mb-6">Kontak & Lokasi</h3>
                    <p class="text-sm font-dmsans mb-3 flex items-start space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-denim-red flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Jl. Pangeran Antasari No. 45, Kebayoran Baru, Jakarta Selatan</span>
                    </p>
                    <p class="text-sm font-dmsans mb-4 flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-denim-green" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="font-mono text-white font-semibold">{{ env('WA_NUMBER', '6281234567890') }}</span>
                    </p>
                    
                    <!-- Maps Embed -->
                    <div class="w-full h-32 rounded-xl overflow-hidden grayscale opacity-75 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m12!1m3!1d3966.257620352516!2d106.8023136!3d-6.2297465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14df5a2c4e3%3A0x6b403487c6e0004f!2sKebayoran%20Baru%2C%20South%20Jakarta%20City!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
            
            <hr class="border-white/10 my-8">
            
            <div class="flex flex-col sm:flex-row justify-between items-center text-xs font-dmsans text-white/40">
                <p>&copy; 2025 Argenza Top Jean's. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 sm:mt-0">
                    <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                    <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP BUTTON WITH TOOLTIP -->
    <div class="fixed bottom-6 right-6 z-50 group flex items-center justify-end" x-data="{ openTooltip: true }" x-init="setTimeout(() => openTooltip = false, 6000)">
        <!-- Tooltip -->
        <div x-show="openTooltip" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-x-4"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 translate-x-4"
             class="bg-denim-card border border-white/10 text-white text-xs px-4 py-2 rounded-xl shadow-2xl mr-3 font-dmsans relative whitespace-nowrap"
             style="display: none;">
            <p class="font-medium">Ada Celana Levis Rusak? 🤔</p>
            <p class="text-[10px] text-denim-muted">Chat WhatsApp Sekarang!</p>
            <button @click="openTooltip = false" class="absolute -top-1 -right-1 bg-denim-red text-white w-4 h-4 rounded-full flex items-center justify-center text-[8px] font-bold">×</button>
        </div>
        
        <!-- Button -->
        <a href="https://wa.me/{{ env('WA_NUMBER', '6281234567890') }}?text=Halo%20Argenza%20Top%20Jean's!%20👋%20Saya%20ingin%20tanya-tanya%20seputar%20vermak%20atau%20jahit%20jeans." 
           target="_blank"
           @mouseenter="openTooltip = true"
           class="flex items-center justify-center bg-denim-green hover:bg-[#20ba56] text-white w-14 h-14 rounded-full shadow-2xl transition-all duration-300 hover:scale-110 active:scale-95 animate-bounce shadow-denim-green/30 relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.197 1.489 4.807 1.49 5.483.003 9.948-4.459 9.951-9.94.002-2.654-1.02-5.15-2.883-7.014C16.65 1.826 14.154.803 11.5.803c-5.488 0-9.954 4.46-9.957 9.943-.001 1.77.475 3.498 1.38 5.044l-.993 3.626 3.717-.976zm11.599-7.093c-.3-.15-1.773-.875-2.043-.974-.27-.099-.467-.149-.663.15-.197.299-.76 1.002-.931 1.201-.171.2-.343.224-.643.075-.3-.15-1.267-.467-2.413-1.489-.892-.796-1.493-1.78-1.668-2.08-.175-.3-.019-.462.131-.61.135-.133.3-.349.45-.523.15-.174.2-.299.3-.499.1-.2.05-.374-.025-.524-.075-.15-.663-1.597-.909-2.193-.24-.577-.48-.499-.663-.508-.172-.007-.37-.008-.567-.008-.198 0-.52.074-.792.373-.272.299-1.04 1.016-1.04 2.479 0 1.463 1.063 2.877 1.211 3.077.149.2 2.093 3.197 5.07 4.485.708.306 1.26.489 1.691.626.712.227 1.36.195 1.871.118.571-.085 1.774-.725 2.023-1.424.249-.699.249-1.295.174-1.424-.075-.13-.272-.204-.572-.354z"/>
            </svg>
            <span class="absolute -top-1 -right-1 bg-red-500 w-3 h-3 rounded-full animate-ping"></span>
        </a>
    </div>

</body>
</html>
