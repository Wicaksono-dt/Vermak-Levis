@extends('layouts.app')

@section('title', 'Argenza Top Jean\'s — Jasa Vermak & Jahit Levis Profesional')

@section('content')
<div x-data="{ 
    activeTab: 'VERMAK', 
    selectedService: '', 
    clientName: '', 
    clientPhone: '', 
    measurementType: 'sendiri', 
    sizeWaist: '', 
    address: '', 
    notes: '',
    faqOpen: { 0: false, 1: false, 2: false, 3: false, 4: false, 5: false },
    
    selectService(name, catId) {
        this.selectedService = name;
        this.activeTab = catId;
        
        // Custom smooth scroll to form section
        const target = document.getElementById('form-pemesanan');
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
    },
    
    submitWA() {
        if (!this.clientName) {
            alert('Silakan masukkan nama lengkap Anda.');
            return;
        }
        if (!this.selectedService) {
            alert('Silakan pilih layanan yang diinginkan.');
            return;
        }
        
        let text = `Halo Argenza Top Jean's! 👋\n\n`;
        text += `Saya ingin memesan jasa berikut:\n\n`;
        text += `📌 Layanan    : ${this.selectedService}\n`;
        text += `👤 Nama       : ${this.clientName}\n`;
        if (this.clientPhone) {
            text += `📱 WhatsApp   : ${this.clientPhone}\n`;
        }
        text += `📏 Pengukuran : ${this.measurementType === 'sendiri' ? 'Ukur Sendiri' : 'Ukur ke Tempat'}\n`;
        
        if (this.measurementType === 'sendiri' && this.sizeWaist) {
            text += `📏 Ukuran Pgg : ${this.sizeWaist} cm\n`;
        }
        if (this.measurementType === 'tempat' && this.address) {
            text += `🏠 Alamat     : ${this.address}\n`;
        }
        if (this.notes) {
            text += `📝 Catatan    : ${this.notes}\n`;
        }
        text += `\nMohon konfirmasi jadwal dan estimasi. Terima kasih! 🙏`;
        
        let waNumber = '{{ env("WA_NUMBER", "6281234567890") }}';
        let url = 'https://api.whatsapp.com/send?phone=' + waNumber + '&text=' + encodeURIComponent(text);
        window.open(url, '_blank');
    }
}" id="beranda">

    <!-- HERO SECTION -->
    <section class="relative min-h-[90vh] flex items-center justify-center py-20 px-4 overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-all duration-700" 
             style="background-image: url('{{ asset('images/hero-bg.jpg') }}');"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-denim-dark via-denim-dark/85 to-denim-dark/60"></div>
        
        <!-- Tech/Geometric Texture Accent -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <div class="absolute top-10 left-10 w-72 h-72 rounded-full bg-denim-red filter blur-[120px]"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 rounded-full bg-denim-indigo filter blur-[150px]"></div>
        </div>

        <div class="relative max-w-5xl mx-auto text-center z-10 px-4 sm:px-6">
            <!-- Badge Promo -->
            <div class="inline-flex items-center space-x-2 bg-denim-red/10 border border-denim-red/35 rounded-full px-4 py-1.5 mb-8 hover:scale-105 transition-transform duration-300">
                <span class="flex h-2.5 w-2.5 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-denim-red opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-denim-red"></span>
                </span>
                <span class="text-denim-red font-oswald text-sm font-semibold tracking-wider uppercase">Jasa Tailor & Vermak Jeans Terbaik</span>
            </div>

            <!-- Heading -->
            <h1 class="font-oswald text-4xl sm:text-6xl md:text-7xl font-extrabold uppercase tracking-tight text-white mb-6 leading-tight">
                Vermak & Jahit Levis Custom <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-denim-red to-denim-yellow text-glow-red">
                    Sesuai Ukuranmu
                </span>
            </h1>

            <!-- Subheading -->
            <p class="max-w-2xl mx-auto text-base sm:text-xl text-denim-muted font-dmsans mb-10 leading-relaxed">
                Profesional, rapi, dan harga terjangkau. Kami siap menangani celana jeans kesayanganmu hingga pas sempurna di badan. Sudah dipercaya ratusan pelanggan.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6 mb-16">
                <!-- CTA 1: Layanan -->
                <a href="#layanan" 
                   class="w-full sm:w-auto inline-flex justify-center items-center space-x-2 bg-denim-red hover:bg-[#d52b38] hover:shadow-red-glow text-white px-8 py-4 rounded-xl font-oswald text-lg tracking-wider uppercase font-semibold transition-all duration-300 transform hover:-translate-y-1">
                    <span>✂️ Lihat Layanan & Harga</span>
                </a>
                
                <!-- CTA 2: WhatsApp -->
                <a href="https://wa.me/{{ env('WA_NUMBER', '6281234567890') }}?text=Halo%20Argenza%20Top%20Jean's!%20👋%20Saya%20tertarik%20untuk%20order%20jasa%20vermak%20atau%20jahit%20jeans." 
                   target="_blank"
                   class="w-full sm:w-auto inline-flex justify-center items-center space-x-2 bg-transparent hover:bg-white/5 border-2 border-white/20 hover:border-white text-white px-8 py-4 rounded-xl font-oswald text-lg tracking-wider uppercase font-semibold transition-all duration-300 transform hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.197 1.489 4.807 1.49 5.483.003 9.948-4.459 9.951-9.94.002-2.654-1.02-5.15-2.883-7.014C16.65 1.826 14.154.803 11.5.803c-5.488 0-9.954 4.46-9.957 9.943-.001 1.77.475 3.498 1.38 5.044l-.993 3.626 3.717-.976zm11.599-7.093c-.3-.15-1.773-.875-2.043-.974-.27-.099-.467-.149-.663.15-.197.299-.76 1.002-.931 1.201-.171.2-.343.224-.643.075-.3-.15-1.267-.467-2.413-1.489-.892-.796-1.493-1.78-1.668-2.08-.175-.3-.019-.462.131-.61.135-.133.3-.349.45-.523.15-.174.2-.299.3-.499.1-.2.05-.374-.025-.524-.075-.15-.663-1.597-.909-2.193-.24-.577-.48-.499-.663-.508-.172-.007-.37-.008-.567-.008-.198 0-.52.074-.792.373-.272.299-1.04 1.016-1.04 2.479 0 1.463 1.063 2.877 1.211 3.077.149.2 2.093 3.197 5.07 4.485.708.306 1.26.489 1.691.626.712.227 1.36.195 1.871.118.571-.085 1.774-.725 2.023-1.424.249-.699.249-1.295.174-1.424-.075-.13-.272-.204-.572-.354z"/>
                    </svg>
                    <span>💬 Chat WhatsApp</span>
                </a>
            </div>

            <!-- Features Badges Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-3xl mx-auto border-t border-white/10 pt-10">
                <div class="flex items-center justify-center space-x-3 bg-white/5 border border-white/5 rounded-2xl py-4 px-6 hover:border-white/10 hover:bg-white/10 transition-all duration-300">
                    <span class="text-3xl">⚡</span>
                    <div class="text-left">
                        <p class="font-oswald text-white font-bold tracking-wide uppercase">Sehari Jadi</p>
                        <p class="text-xs text-denim-muted font-dmsans">Layanan potong biasa</p>
                    </div>
                </div>
                <div class="flex items-center justify-center space-x-3 bg-white/5 border border-white/5 rounded-2xl py-4 px-6 hover:border-white/10 hover:bg-white/10 transition-all duration-300">
                    <span class="text-3xl">👖</span>
                    <div class="text-left">
                        <p class="font-oswald text-white font-bold tracking-wide uppercase">Jahit Custom</p>
                        <p class="text-xs text-denim-muted font-dmsans">Bebas request ukuran</p>
                    </div>
                </div>
                <div class="flex items-center justify-center space-x-3 bg-white/5 border border-white/5 rounded-2xl py-4 px-6 hover:border-white/10 hover:bg-white/10 transition-all duration-300">
                    <span class="text-3xl">🚗</span>
                    <div class="text-left">
                        <p class="font-oswald text-white font-bold tracking-wide uppercase">Bisa Ukur di Rumah</p>
                        <p class="text-xs text-denim-muted font-dmsans">Antar-jemput daerah sekitar</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN SECTION -->
    <section id="keunggulan" class="py-24 bg-black/60 relative border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="font-oswald text-4xl sm:text-5xl font-bold uppercase tracking-wider text-white">
                    Mengapa Harus <span class="text-denim-red">Argenza Top Jean's?</span>
                </h2>
                <div class="h-1.5 w-24 bg-denim-red mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 max-w-2xl mx-auto text-denim-muted">
                    Kami mengutamakan presisi jahitan dan kualitas benang untuk memastikan hasil vermak terlihat sealami mungkin.
                </p>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div class="bg-denim-card border border-white/5 rounded-2xl p-8 hover:-translate-y-2 hover:border-denim-red/30 transition-all duration-300 group shadow-lg">
                    <div class="w-14 h-14 bg-denim-red/10 border border-denim-red/20 rounded-xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform duration-300">
                        🪡
                    </div>
                    <h3 class="font-oswald text-xl font-bold text-white uppercase tracking-wider mb-3">Hasil Rapi & Presisi</h3>
                    <p class="text-sm text-denim-muted leading-relaxed font-dmsans">
                        Setiap jahitan dikerjakan dengan sangat teliti dan detail oleh tenaga jahit profesional yang berpengalaman puluhan tahun.
                    </p>
                </div>
                <!-- Card 2 -->
                <div class="bg-denim-card border border-white/5 rounded-2xl p-8 hover:-translate-y-2 hover:border-denim-blue/30 transition-all duration-300 group shadow-lg">
                    <div class="w-14 h-14 bg-denim-blue/10 border border-denim-blue/20 rounded-xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform duration-300">
                        ⚡
                    </div>
                    <h3 class="font-oswald text-xl font-bold text-white uppercase tracking-wider mb-3">Pengerjaan Cepat</h3>
                    <p class="text-sm text-denim-muted leading-relaxed font-dmsans">
                        Layanan potong pendek biasa, potong sambung, dan vermak ringan kami maksimalkan bisa selesai dalam hitungan jam (sehari jadi).
                    </p>
                </div>
                <!-- Card 3 -->
                <div class="bg-denim-card border border-white/5 rounded-2xl p-8 hover:-translate-y-2 hover:border-denim-yellow/30 transition-all duration-300 group shadow-lg">
                    <div class="w-14 h-14 bg-[#ffd60a]/10 border border-[#ffd60a]/20 rounded-xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform duration-300">
                        💰
                    </div>
                    <h3 class="font-oswald text-xl font-bold text-white uppercase tracking-wider mb-3">Harga Terjangkau</h3>
                    <p class="text-sm text-denim-muted leading-relaxed font-dmsans">
                        Harga sangat bersahabat mulai dari Rp 20.000 dengan jaminan mutu jahitan setara distro/departemen store terkemuka.
                    </p>
                </div>
                <!-- Card 4 -->
                <div class="bg-denim-card border border-white/5 rounded-2xl p-8 hover:-translate-y-2 hover:border-denim-indigo/30 transition-all duration-300 group shadow-lg">
                    <div class="w-14 h-14 bg-denim-indigo/10 border border-denim-indigo/20 rounded-xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform duration-300">
                        🚗
                    </div>
                    <h3 class="font-oswald text-xl font-bold text-white uppercase tracking-wider mb-3">Layanan Antar Jemput</h3>
                    <p class="text-sm text-denim-muted leading-relaxed font-dmsans">
                        Malas keluar rumah? Kami sediakan layanan ukur di tempat dan jemput-antar celana ke lokasi Anda secara terjadwal.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- LAYANAN & HARGA SECTION -->
    <section id="layanan" class="py-24 bg-denim-dark relative border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="font-oswald text-4xl sm:text-5xl font-bold uppercase tracking-wider text-white">
                    Daftar Layanan <span class="text-denim-yellow">& Harga</span>
                </h2>
                <div class="h-1.5 w-24 bg-denim-yellow mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 max-w-2xl mx-auto text-denim-muted font-dmsans">
                    Pilih kategori layanan di bawah ini untuk melihat detail harga estimasi pengerjaan. Klik "Pesan Ini" untuk mengisi form otomatis.
                </p>
            </div>

            <!-- Tab Buttons Container -->
            <div class="flex flex-wrap items-center justify-center gap-3 mb-12 max-w-4xl mx-auto">
                @foreach($categories as $category)
                    @php
                        $tabColorClass = '';
                        $activeColorClass = '';
                        switch($category['id']) {
                            case 'VERMAK':
                                $tabColorClass = 'hover:border-gray-500 hover:text-white border-white/10 text-denim-muted';
                                $activeColorClass = 'bg-gray-500/10 border-gray-400 text-white shadow-md shadow-gray-500/5';
                                break;
                            case 'KECILIN':
                                $tabColorClass = 'hover:border-blue-500 hover:text-blue-400 border-white/10 text-denim-muted';
                                $activeColorClass = 'bg-blue-500/10 border-blue-500 text-blue-400 shadow-md shadow-blue-500/5';
                                break;
                            case 'POTONG':
                                $tabColorClass = 'hover:border-denim-yellow hover:text-denim-yellow border-white/10 text-denim-muted';
                                $activeColorClass = 'bg-[#ffd60a]/10 border-denim-yellow text-denim-yellow shadow-md shadow-denim-yellow/5';
                                break;
                            case 'RESLETING':
                                $tabColorClass = 'hover:border-denim-red hover:text-denim-red border-white/10 text-denim-muted';
                                $activeColorClass = 'bg-denim-red/10 border-denim-red text-denim-red shadow-md shadow-denim-red/5';
                                break;
                            case 'JAHIT':
                                $tabColorClass = 'hover:border-indigo-500 hover:text-indigo-400 border-white/10 text-denim-muted';
                                $activeColorClass = 'bg-indigo-500/10 border-indigo-500 text-indigo-400 shadow-md shadow-indigo-500/5';
                                break;
                        }
                    @endphp
                    <button @click="activeTab = '{{ $category['id'] }}'"
                            :class="activeTab === '{{ $category['id'] }}' ? '{{ $activeColorClass }}' : '{{ $tabColorClass }}'"
                            class="inline-flex items-center space-x-2 border px-6 py-3 rounded-xl font-oswald text-lg uppercase tracking-wider transition-all duration-300">
                        <span>{{ $category['emoji'] }}</span>
                        <span>{{ $category['nama'] }}</span>
                    </button>
                @endforeach
            </div>

            <!-- Tab Contents -->
            @foreach($categories as $category)
                <div x-show="activeTab === '{{ $category['id'] }}'" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="max-w-4xl mx-auto space-y-6"
                     style="display: none;">
                    
                    <!-- Category Header Info -->
                    <div class="bg-denim-card border border-white/10 rounded-2xl p-6 flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6">
                        <span class="text-5xl p-4 bg-white/5 border border-white/10 rounded-2xl">{{ $category['emoji'] }}</span>
                        <div>
                            <h3 class="font-oswald text-2xl font-bold uppercase text-white mb-2">{{ $category['nama'] }}</h3>
                            <p class="text-denim-muted text-sm leading-relaxed mb-3">{{ $category['deskripsi'] }}</p>
                            @if(isset($category['catatan_khusus']))
                                <div class="inline-flex items-center space-x-2 bg-denim-red/10 border border-denim-red/20 text-denim-red px-3 py-1 rounded-lg text-xs font-semibold">
                                    <span>💡</span>
                                    <span>{{ $category['catatan_khusus'] }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Category Items Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($category['layanan'] as $service)
                            @php
                                $cardBorderColor = 'border-white/5 hover:border-white/20';
                                $btnColor = 'bg-white/5 hover:bg-white/10 text-white';
                                switch($category['id']) {
                                    case 'VERMAK':
                                        $cardBorderColor = 'border-white/5 hover:border-gray-500/40';
                                        $btnColor = 'bg-gray-500/10 hover:bg-gray-500 text-white hover:text-black border border-gray-500/30';
                                        break;
                                    case 'KECILIN':
                                        $cardBorderColor = 'border-white/5 hover:border-blue-500/40';
                                        $btnColor = 'bg-blue-500/10 hover:bg-blue-500 text-white hover:text-black border border-blue-500/30';
                                        break;
                                    case 'POTONG':
                                        $cardBorderColor = 'border-white/5 hover:border-denim-yellow/40';
                                        $btnColor = 'bg-[#ffd60a]/10 hover:bg-[#ffd60a] text-white hover:text-black border border-[#ffd60a]/30';
                                        break;
                                    case 'RESLETING':
                                        $cardBorderColor = 'border-white/5 hover:border-denim-red/40';
                                        $btnColor = 'bg-denim-red/10 hover:bg-denim-red text-white border border-denim-red/30';
                                        break;
                                    case 'JAHIT':
                                        $cardBorderColor = 'border-white/5 hover:border-indigo-500/40';
                                        $btnColor = 'bg-indigo-500/10 hover:bg-indigo-500 text-white border border-indigo-500/30';
                                        break;
                                }
                            @endphp
                            
                            <div class="bg-denim-card border {{ $cardBorderColor }} rounded-2xl p-6 flex flex-col justify-between hover:shadow-lg transition-all duration-300">
                                <div>
                                    <!-- Title & Est -->
                                    <div class="flex justify-between items-start mb-4">
                                        <h4 class="font-oswald text-lg font-bold tracking-wider text-white uppercase pr-2">
                                            {{ $service['nama'] }}
                                        </h4>
                                        <span class="bg-white/5 border border-white/10 text-denim-muted font-dmsans text-[10px] uppercase font-semibold px-2 py-1 rounded-md whitespace-nowrap">
                                            ⏳ {{ $service['estimasi'] }}
                                        </span>
                                    </div>
                                    
                                    <!-- Pricing -->
                                    <div class="font-mono text-2xl font-bold text-denim-yellow tracking-tight mb-4">
                                        @if(isset($service['harga_max']) && $service['harga_max'])
                                            Rp {{ number_format($service['harga'], 0, ',', '.') }} – {{ number_format($service['harga_max'], 0, ',', '.') }}
                                        @else
                                            Rp {{ number_format($service['harga'], 0, ',', '.') }}
                                        @endif
                                    </div>

                                    @if(isset($service['catatan']) && $service['catatan'])
                                        <p class="text-xs text-denim-red font-medium italic mb-4">
                                            ⚠️ {{ $service['catatan'] }}
                                        </p>
                                    @endif
                                </div>

                                <!-- Button Book -->
                                <button @click="selectService('{{ $service['nama'] }}', '{{ $category['id'] }}')"
                                        class="w-full text-center py-2.5 rounded-xl font-oswald text-sm uppercase tracking-wider font-semibold transition-all duration-200 {{ $btnColor }}">
                                    Pesan Ini
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- CARA PESAN SECTION -->
    <section id="cara-pesan" class="py-24 bg-black/60 relative border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="font-oswald text-4xl sm:text-5xl font-bold uppercase tracking-wider text-white">
                    Cara Mudah <span class="text-denim-red">Memesan</span>
                </h2>
                <div class="h-1.5 w-24 bg-denim-red mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 max-w-2xl mx-auto text-denim-muted">
                    Proses pemesanan sangat simpel dan teratur. Ikuti 4 langkah mudah berikut.
                </p>
            </div>

            <!-- Timeline -->
            <div class="relative">
                <!-- Line background for desktop timeline -->
                <div class="hidden lg:block absolute top-1/2 left-4 right-4 h-0.5 bg-white/10 -translate-y-1/2 z-0"></div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative z-10">
                    <!-- Step 1 -->
                    <div class="bg-denim-card border border-white/5 rounded-2xl p-8 text-center hover:border-white/10 transition-all duration-300 shadow-md">
                        <div class="w-16 h-16 bg-white/5 border border-white/10 rounded-full flex items-center justify-center font-oswald text-2xl font-bold text-denim-red mx-auto mb-6">
                            1
                        </div>
                        <h3 class="font-oswald text-xl font-bold text-white uppercase tracking-wider mb-3">Pilih Layanan</h3>
                        <p class="text-sm text-denim-muted leading-relaxed font-dmsans">
                            Tentukan jenis jasa yang kamu butuhkan dari daftar layanan harga lengkap kami di atas.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-denim-card border border-white/5 rounded-2xl p-8 text-center hover:border-white/10 transition-all duration-300 shadow-md">
                        <div class="w-16 h-16 bg-white/5 border border-white/10 rounded-full flex items-center justify-center font-oswald text-2xl font-bold text-denim-red mx-auto mb-6">
                            2
                        </div>
                        <h3 class="font-oswald text-xl font-bold text-white uppercase tracking-wider mb-3">Isi Form / Chat WA</h3>
                        <p class="text-sm text-denim-muted leading-relaxed font-dmsans">
                            Kirim detail ukuran, nama, dan alamat melalui form pemesanan di bawah atau langsung chat WA kami.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-denim-card border border-white/5 rounded-2xl p-8 text-center hover:border-white/10 transition-all duration-300 shadow-md">
                        <div class="w-16 h-16 bg-white/5 border border-white/10 rounded-full flex items-center justify-center font-oswald text-2xl font-bold text-denim-red mx-auto mb-6">
                            3
                        </div>
                        <h3 class="font-oswald text-xl font-bold text-white uppercase tracking-wider mb-3">Kirim / Kami Jemput</h3>
                        <p class="text-sm text-denim-muted leading-relaxed font-dmsans">
                            Bawa celana ke workshop kami, atau serahkan ke kurir jika memilih opsi ukur/jemput ke tempat Anda.
                        </p>
                    </div>

                    <!-- Step 4 -->
                    <div class="bg-denim-card border border-white/5 rounded-2xl p-8 text-center hover:border-white/10 transition-all duration-300 shadow-md">
                        <div class="w-16 h-16 bg-white/5 border border-white/10 rounded-full flex items-center justify-center font-oswald text-2xl font-bold text-denim-red mx-auto mb-6">
                            4
                        </div>
                        <h3 class="font-oswald text-xl font-bold text-white uppercase tracking-wider mb-3">Selesai & Ambil</h3>
                        <p class="text-sm text-denim-muted leading-relaxed font-dmsans">
                            Celana siap dikerjakan secara presisi sesuai estimasi waktu. Hasil akhir dijamin rapi dan memuaskan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERI SECTION -->
    <section id="galeri" class="py-24 bg-denim-dark relative border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="font-oswald text-4xl sm:text-5xl font-bold uppercase tracking-wider text-white">
                    Galeri Hasil <span class="text-denim-yellow">Kerja Kami</span>
                </h2>
                <div class="h-1.5 w-24 bg-denim-yellow mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 max-w-2xl mx-auto text-denim-muted font-dmsans">
                    Beberapa cuplikan hasil pengerjaan jahit custom, vermak levis, potong rapi, dan ganti resleting.
                </p>
            </div>

            <!-- Grid Galeri -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
                <!-- Foto 1 -->
                <div class="relative rounded-2xl overflow-hidden aspect-[4/3] group shadow-lg border border-white/5">
                    <img src="{{ asset('images/measuring-jeans.jpg') }}" 
                         alt="Proses Pengukuran Celana Jeans - Argenza Top Jean's" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 filter grayscale group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div>
                            <span class="bg-[#ffd60a] text-black text-[10px] font-bold px-2.5 py-1 rounded-md uppercase font-oswald">Ukur Presisi</span>
                            <h4 class="font-oswald text-lg font-bold text-white uppercase mt-2">Detail Pengukuran Pinggang</h4>
                        </div>
                    </div>
                </div>

                <!-- Foto 2 -->
                <div class="relative rounded-2xl overflow-hidden aspect-[4/3] group shadow-lg border border-white/5">
                    <img src="{{ asset('images/sewing-machine.jpg') }}" 
                         alt="Proses Jahit Denim dengan Mesin Jahit Industri" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 filter grayscale group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div>
                            <span class="bg-[#ffd60a] text-black text-[10px] font-bold px-2.5 py-1 rounded-md uppercase font-oswald">Jahit Custom</span>
                            <h4 class="font-oswald text-lg font-bold text-white uppercase mt-2">Proses Jahitan Rantai (Chainstitch)</h4>
                        </div>
                    </div>
                </div>

                <!-- Foto 3 -->
                <div class="relative rounded-2xl overflow-hidden aspect-[4/3] group shadow-lg border border-white/5">
                    <img src="{{ asset('images/jeans-product.jpg') }}" 
                         alt="Hasil Vermak Levis Rapi Pas Ukuran" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 filter grayscale group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div>
                            <span class="bg-[#ffd60a] text-black text-[10px] font-bold px-2.5 py-1 rounded-md uppercase font-oswald">Premium Levis</span>
                            <h4 class="font-oswald text-lg font-bold text-white uppercase mt-2">Lipatan Hasil Potong & Vermak</h4>
                        </div>
                    </div>
                </div>

                <!-- Foto 4 -->
                <div class="relative rounded-2xl overflow-hidden aspect-[4/3] group shadow-lg border border-white/5">
                    <img src="{{ asset('images/waistband-detail.jpg') }}" 
                         alt="Detail pinggang celana levis setelah dikecilkan" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 filter grayscale group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div>
                            <span class="bg-[#ffd60a] text-black text-[10px] font-bold px-2.5 py-1 rounded-md uppercase font-oswald">Kecilin Pinggang</span>
                            <h4 class="font-oswald text-lg font-bold text-white uppercase mt-2">Detail Belt Loop Jahit Ulang</h4>
                        </div>
                    </div>
                </div>

                <!-- Foto 5 -->
                <div class="relative rounded-2xl overflow-hidden aspect-[4/3] group shadow-lg border border-white/5">
                    <img src="{{ asset('images/cutting-denim.jpg') }}" 
                         alt="Proses Gunting Potong Bahan Levis" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 filter grayscale group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div>
                            <span class="bg-[#ffd60a] text-black text-[10px] font-bold px-2.5 py-1 rounded-md uppercase font-oswald">Potong Sambung</span>
                            <h4 class="font-oswald text-lg font-bold text-white uppercase mt-2">Pemotongan Presisi dengan Gunting Baja</h4>
                        </div>
                    </div>
                </div>

                <!-- Foto 6 -->
                <div class="relative rounded-2xl overflow-hidden aspect-[4/3] group shadow-lg border border-white/5">
                    <img src="{{ asset('images/zipper-detail.jpg') }}" 
                         alt="Ganti Resleting Jeans Rusak" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 filter grayscale group-hover:grayscale-0">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div>
                            <span class="bg-[#ffd60a] text-black text-[10px] font-bold px-2.5 py-1 rounded-md uppercase font-oswald">Ganti Resleting</span>
                            <h4 class="font-oswald text-lg font-bold text-white uppercase mt-2">Resleting Metal Kuningan Tahan Karat</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instagram Redirect Button -->
            <div class="text-center">
                <a href="https://instagram.com" 
                   target="_blank" 
                   class="inline-flex items-center space-x-2 text-white hover:text-denim-yellow font-oswald text-lg uppercase tracking-wider transition-colors duration-200">
                    <span>Lihat Semua Hasil Kerja di Instagram</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- TESTIMONI SECTION -->
    <section class="py-24 bg-black/60 relative border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="font-oswald text-4xl sm:text-5xl font-bold uppercase tracking-wider text-white">
                    Apa Kata <span class="text-denim-red">Pelanggan Kami?</span>
                </h2>
                <div class="h-1.5 w-24 bg-denim-red mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 max-w-2xl mx-auto text-denim-muted font-dmsans">
                    Ulasan tulus dari mereka yang telah mempercayakan celana favoritnya kepada kami.
                </p>
            </div>

            <!-- Grid Testimoni -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testi 1 -->
                <div class="bg-denim-card border border-white/5 rounded-2xl p-8 relative shadow-md">
                    <div class="flex text-[#ffd60a] space-x-1 mb-4 text-lg">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <p class="text-sm text-white italic leading-relaxed mb-6 font-dmsans">
                        "Vermaknya rapi banget, pinggang jadi pas banget tapi pola paha ga berubah aneh. Hasil sambungannya rapi ga keliatan kalo dipotong. Bakal balik lagi!"
                    </p>
                    <div class="flex items-center space-x-3 border-t border-white/5 pt-4">
                        <div class="w-10 h-10 rounded-full bg-denim-red flex items-center justify-center font-oswald text-white font-bold text-sm">
                            BS
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Budi S.</h4>
                            <p class="text-xs text-denim-muted">Kecilin Pinggang & Paha</p>
                        </div>
                    </div>
                </div>

                <!-- Testi 2 -->
                <div class="bg-denim-card border border-white/5 rounded-2xl p-8 relative shadow-md">
                    <div class="flex text-[#ffd60a] space-x-1 mb-4 text-lg">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <p class="text-sm text-white italic leading-relaxed mb-6 font-dmsans">
                        "Jahit custom-nya keren, beneran sesuai ukuran dan model slim straight yang aku minta. Bahan denim kaku tebel 15oz bisa dijahit rapi banget."
                    </p>
                    <div class="flex items-center space-x-3 border-t border-white/5 pt-4">
                        <div class="w-10 h-10 rounded-full bg-denim-blue flex items-center justify-center font-oswald text-white font-bold text-sm">
                            RA
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Reza A.</h4>
                            <p class="text-xs text-denim-muted">Jahit Custom Ukuran 32</p>
                        </div>
                    </div>
                </div>

                <!-- Testi 3 -->
                <div class="bg-denim-card border border-white/5 rounded-2xl p-8 relative shadow-md">
                    <div class="flex text-[#ffd60a] space-x-1 mb-4 text-lg">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <p class="text-sm text-white italic leading-relaxed mb-6 font-dmsans">
                        "Pagi antar potong lipat soum, sore udah bisa diambil. Cepet dan hasilnya bersih, ga ada sisa benang berantakan. Sangat direkomendasikan!"
                    </p>
                    <div class="flex items-center space-x-3 border-t border-white/5 pt-4">
                        <div class="w-10 h-10 rounded-full bg-[#ffd60a] text-black flex items-center justify-center font-oswald font-bold text-sm">
                            DM
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Dina M.</h4>
                            <p class="text-xs text-denim-muted">Potong Soum Celana Bahan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FORM PEMESANAN SECTION -->
    <section id="form-pemesanan" class="py-24 bg-denim-dark relative border-t border-white/5">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-denim-card border border-white/10 rounded-3xl p-8 sm:p-12 shadow-2xl relative overflow-hidden">
                <!-- Red/Yellow Glowing Accents inside Card -->
                <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-denim-red/10 filter blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 rounded-full bg-denim-yellow/10 filter blur-3xl"></div>

                <div class="relative z-10">
                    <div class="text-center mb-10">
                        <span class="text-4xl">📱</span>
                        <h2 class="font-oswald text-3xl sm:text-4xl font-bold uppercase tracking-wider text-white mt-3">
                            Form Pemesanan <span class="text-denim-red">Jasa</span>
                        </h2>
                        <p class="mt-2 text-sm text-denim-muted font-dmsans">
                            Isi detail formulir berikut untuk mengirim pesan pemesanan otomatis ke WhatsApp kami.
                        </p>
                    </div>

                    <form @submit.prevent="submitWA" class="space-y-6">
                        <!-- Pilih Layanan -->
                        <div>
                            <label for="layanan-select" class="block font-oswald text-sm tracking-wider uppercase text-white mb-2">Pilih Layanan *</label>
                            <select id="layanan-select" 
                                    x-model="selectedService"
                                    class="w-full bg-black/60 border border-white/10 rounded-xl px-4 py-3.5 text-white focus:outline-none focus:border-denim-red focus:ring-1 focus:ring-denim-red/30 transition font-dmsans">
                                <option value="" disabled selected>-- Pilih Jenis Jasa --</option>
                                @foreach($categories as $category)
                                    <optgroup label="{{ $category['nama'] }} ({{ $category['emoji'] }})">
                                        @foreach($category['layanan'] as $service)
                                            <option value="{{ $service['nama'] }}">{{ $service['nama'] }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>

                        <!-- Grid Name & Phone -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="client-name" class="block font-oswald text-sm tracking-wider uppercase text-white mb-2">Nama Lengkap *</label>
                                <input type="text" 
                                       id="client-name" 
                                       x-model="clientName"
                                       placeholder="Masukkan nama lengkap" 
                                       required
                                       class="w-full bg-black/60 border border-white/10 rounded-xl px-4 py-3.5 text-white placeholder:text-white/20 focus:outline-none focus:border-denim-red focus:ring-1 focus:ring-denim-red/30 transition font-dmsans">
                            </div>
                            <div>
                                <label for="client-phone" class="block font-oswald text-sm tracking-wider uppercase text-white mb-2">Nomor WhatsApp</label>
                                <input type="tel" 
                                       id="client-phone" 
                                       x-model="clientPhone"
                                       placeholder="Contoh: 0812XXXXXXXX" 
                                       class="w-full bg-black/60 border border-white/10 rounded-xl px-4 py-3.5 text-white placeholder:text-white/20 focus:outline-none focus:border-denim-red focus:ring-1 focus:ring-denim-red/30 transition font-dmsans">
                            </div>
                        </div>

                        <!-- Jenis Pengukuran -->
                        <div>
                            <span class="block font-oswald text-sm tracking-wider uppercase text-white mb-2">Jenis Pengukuran</span>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="flex items-center space-x-3 bg-black/40 border border-white/10 rounded-xl p-4 cursor-pointer hover:bg-black/60 transition"
                                       :class="measurementType === 'sendiri' ? 'border-denim-red/50 bg-denim-red/5' : ''">
                                    <input type="radio" 
                                           name="ukur" 
                                           value="sendiri" 
                                           x-model="measurementType"
                                           class="text-denim-red focus:ring-0 focus:ring-offset-0 bg-transparent border-white/20">
                                    <div class="text-left">
                                        <p class="font-oswald text-xs font-semibold text-white uppercase tracking-wider">Ukur Sendiri</p>
                                        <p class="text-[10px] text-denim-muted font-dmsans">Kirim detail ukuran pinggang/panjang</p>
                                    </div>
                                </label>
                                <label class="flex items-center space-x-3 bg-black/40 border border-white/10 rounded-xl p-4 cursor-pointer hover:bg-black/60 transition"
                                       :class="measurementType === 'tempat' ? 'border-denim-red/50 bg-denim-red/5' : ''">
                                    <input type="radio" 
                                           name="ukur" 
                                           value="tempat" 
                                           x-model="measurementType"
                                           class="text-denim-red focus:ring-0 focus:ring-offset-0 bg-transparent border-white/20">
                                    <div class="text-left">
                                        <p class="font-oswald text-xs font-semibold text-white uppercase tracking-wider">Ukur ke Tempat</p>
                                        <p class="text-[10px] text-denim-muted font-dmsans">Staf kami datang mengukur ke lokasi</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Conditional Field: Ukur Sendiri (Waist Size) -->
                        <div x-show="measurementType === 'sendiri'" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="space-y-2">
                            <label for="size-waist" class="block font-oswald text-sm tracking-wider uppercase text-white">Ukuran Pinggang / Catatan Ukuran (cm / size)</label>
                            <input type="text" 
                                   id="size-waist" 
                                   x-model="sizeWaist"
                                   placeholder="Contoh: Pinggang 82 cm, Panjang 100 cm" 
                                   class="w-full bg-black/60 border border-white/10 rounded-xl px-4 py-3.5 text-white placeholder:text-white/20 focus:outline-none focus:border-denim-red focus:ring-1 focus:ring-denim-red/30 transition font-dmsans">
                            <p class="text-[11px] text-denim-muted">Tulis ukuran pinggang, lingkar paha, atau panjang celana yang diinginkan jika sudah diukur sendiri.</p>
                        </div>

                        <!-- Conditional Field: Ukur ke Tempat (Address) -->
                        <div x-show="measurementType === 'tempat'" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="space-y-2"
                             style="display: none;">
                            <label for="address" class="block font-oswald text-sm tracking-wider uppercase text-white">Alamat Lengkap Penjemputan / Pengukuran *</label>
                            <textarea id="address" 
                                      rows="3" 
                                      x-model="address"
                                      placeholder="Masukkan alamat lengkap rumah/kantor Anda" 
                                      class="w-full bg-black/60 border border-white/10 rounded-xl px-4 py-3.5 text-white placeholder:text-white/20 focus:outline-none focus:border-denim-red focus:ring-1 focus:ring-denim-red/30 transition font-dmsans"></textarea>
                            <p class="text-[11px] text-denim-muted">Layanan ini berlaku untuk daerah sekitar radius workshop kami. Kami akan mengonfirmasi jadwal penjemputan via WA.</p>
                        </div>

                        <!-- Catatan Model/Model/Detail Tambahan -->
                        <div>
                            <label for="notes" class="block font-oswald text-sm tracking-wider uppercase text-white mb-2">Catatan Tambahan / Detail Model</label>
                            <textarea id="notes" 
                                      rows="3" 
                                      x-model="notes"
                                      placeholder="Contoh: Potong sambung pertahankan benang asli, kecilin kaki tipis, model slim straight, dll." 
                                      class="w-full bg-black/60 border border-white/10 rounded-xl px-4 py-3.5 text-white placeholder:text-white/20 focus:outline-none focus:border-denim-red focus:ring-1 focus:ring-denim-red/30 transition font-dmsans"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-denim-green hover:bg-[#20ba56] text-white py-4 rounded-xl font-oswald text-lg font-bold tracking-wider uppercase transition duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-denim-green/20 flex items-center justify-center space-x-3">
                            <!-- WA Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.197 1.489 4.807 1.49 5.483.003 9.948-4.459 9.951-9.94.002-2.654-1.02-5.15-2.883-7.014C16.65 1.826 14.154.803 11.5.803c-5.488 0-9.954 4.46-9.957 9.943-.001 1.77.475 3.498 1.38 5.044l-.993 3.626 3.717-.976zm11.599-7.093c-.3-.15-1.773-.875-2.043-.974-.27-.099-.467-.149-.663.15-.197.299-.76 1.002-.931 1.201-.171.2-.343.224-.643.075-.3-.15-1.267-.467-2.413-1.489-.892-.796-1.493-1.78-1.668-2.08-.175-.3-.019-.462.131-.61.135-.133.3-.349.45-.523.15-.174.2-.299.3-.499.1-.2.05-.374-.025-.524-.075-.15-.663-1.597-.909-2.193-.24-.577-.48-.499-.663-.508-.172-.007-.37-.008-.567-.008-.198 0-.52.074-.792.373-.272.299-1.04 1.016-1.04 2.479 0 1.463 1.063 2.877 1.211 3.077.149.2 2.093 3.197 5.07 4.485.708.306 1.26.489 1.691.626.712.227 1.36.195 1.871.118.571-.085 1.774-.725 2.023-1.424.249-.699.249-1.295.174-1.424-.075-.13-.272-.204-.572-.354z"/>
                            </svg>
                            <span>Kirim Pesanan via WhatsApp</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="py-24 bg-black/60 relative border-t border-white/5">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="font-oswald text-4xl sm:text-5xl font-bold uppercase tracking-wider text-white">
                    Frequently Asked <span class="text-denim-yellow">Questions</span>
                </h2>
                <div class="h-1.5 w-24 bg-denim-yellow mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 max-w-2xl mx-auto text-denim-muted font-dmsans">
                    Pertanyaan umum yang sering ditanyakan mengenai layanan vermak dan jahit custom Argenza Top Jean's.
                </p>
            </div>

            <!-- Accordion FAQ -->
            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="bg-denim-card border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                    <button @click="faqOpen[0] = !faqOpen[0]" 
                            class="w-full flex items-center justify-between p-6 focus:outline-none text-left">
                        <span class="font-oswald text-lg font-bold text-white uppercase tracking-wider">Berapa lama pengerjaan vermak?</span>
                        <svg class="h-6 w-6 text-denim-yellow transform transition-transform duration-300" 
                             :class="faqOpen[0] ? 'rotate-180' : 'rotate-0'"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="faqOpen[0]" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-40"
                         class="px-6 pb-6 text-sm text-denim-muted leading-relaxed font-dmsans border-t border-white/5 pt-4">
                        Pengerjaan tergantung jenis layanan. Potong biasa bisa selesai di hari yang sama (sehari jadi). Vermak total memerlukan waktu sekitar 1–2 hari, sedangkan jahit custom celana baru membutuhkan waktu 5–10 hari kerja.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-denim-card border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                    <button @click="faqOpen[1] = !faqOpen[1]" 
                            class="w-full flex items-center justify-between p-6 focus:outline-none text-left">
                        <span class="font-oswald text-lg font-bold text-white uppercase tracking-wider">Apakah bisa antar jemput?</span>
                        <svg class="h-6 w-6 text-denim-yellow transform transition-transform duration-300" 
                             :class="faqOpen[1] ? 'rotate-180' : 'rotate-0'"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="faqOpen[1]" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-40"
                         class="px-6 pb-6 text-sm text-denim-muted leading-relaxed font-dmsans border-t border-white/5 pt-4">
                        Ya, kami melayani jasa ukur dan antar jemput untuk area yang terjangkau dari workshop kami. Silakan hubungi kami via WhatsApp terlebih dahulu untuk mencocokkan jadwal penjemputan kurir.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-denim-card border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                    <button @click="faqOpen[2] = !faqOpen[2]" 
                            class="w-full flex items-center justify-between p-6 focus:outline-none text-left">
                        <span class="font-oswald text-lg font-bold text-white uppercase tracking-wider">Berapa DP untuk jahit custom?</span>
                        <svg class="h-6 w-6 text-denim-yellow transform transition-transform duration-300" 
                             :class="faqOpen[2] ? 'rotate-180' : 'rotate-0'"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="faqOpen[2]" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-40"
                         class="px-6 pb-6 text-sm text-denim-muted leading-relaxed font-dmsans border-t border-white/5 pt-4">
                        Untuk layanan Jahit Custom (pembuatan celana jeans baru dari nol), kami mewajibkan pembayaran Down Payment (DP) sebesar 50% di awal sebelum kain dipotong dan dijahit. Sisa pembayaran dilunasi saat celana selesai dikerjakan.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="bg-denim-card border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                    <button @click="faqOpen[3] = !faqOpen[3]" 
                            class="w-full flex items-center justify-between p-6 focus:outline-none text-left">
                        <span class="font-oswald text-lg font-bold text-white uppercase tracking-wider">Bahan jeans disediakan atau bawa sendiri?</span>
                        <svg class="h-6 w-6 text-denim-yellow transform transition-transform duration-300" 
                             :class="faqOpen[3] ? 'rotate-180' : 'rotate-0'"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="faqOpen[3]" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-40"
                         class="px-6 pb-6 text-sm text-denim-muted leading-relaxed font-dmsans border-t border-white/5 pt-4">
                        Pelanggan diharapkan membawa bahan (kain denim/canvas) sendiri dari luar. Kami hanya menyediakan jasa pola, potong, pengerjaan jahit, benang jahit premium, kancing, rivet, serta resleting standar bermutu tinggi.
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="bg-denim-card border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                    <button @click="faqOpen[4] = !faqOpen[4]" 
                            class="w-full flex items-center justify-between p-6 focus:outline-none text-left">
                        <span class="font-oswald text-lg font-bold text-white uppercase tracking-wider">Apakah ada garansi hasil?</span>
                        <svg class="h-6 w-6 text-denim-yellow transform transition-transform duration-300" 
                             :class="faqOpen[4] ? 'rotate-180' : 'rotate-0'"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="faqOpen[4]" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-40"
                         class="px-6 pb-6 text-sm text-denim-muted leading-relaxed font-dmsans border-t border-white/5 pt-4">
                        Tentu saja! Kami memberikan garansi perbaikan gratis jika hasil ukuran celana tidak pas atau tidak sesuai dengan kesepakatan awal saat pemesanan. Garansi klaim maksimal berlaku 7 hari setelah pengambilan barang.
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="bg-denim-card border border-white/10 rounded-2xl overflow-hidden transition-all duration-300">
                    <button @click="faqOpen[5] = !faqOpen[5]" 
                            class="w-full flex items-center justify-between p-6 focus:outline-none text-left">
                        <span class="font-oswald text-lg font-bold text-white uppercase tracking-wider">Apakah bisa konsultasi dulu?</span>
                        <svg class="h-6 w-6 text-denim-yellow transform transition-transform duration-300" 
                             :class="faqOpen[5] ? 'rotate-180' : 'rotate-0'"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="faqOpen[5]" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-40"
                         class="px-6 pb-6 text-sm text-denim-muted leading-relaxed font-dmsans border-t border-white/5 pt-4">
                        Sangat bisa! Anda bisa berkonsultasi mengenai model, tipe benang, jenis pemotongan (biasa/sambung), atau kisaran biaya via WhatsApp kami kapan saja secara gratis sebelum celana diserahkan ke workshop kami.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HUBUNGI KAMI / DUMMY SCROLL ID -->
    <div id="hubungi-kami"></div>
</div>
@endsection
