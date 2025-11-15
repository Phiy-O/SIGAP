<?php if (isset($component)) { $__componentOriginal4619374cef299e94fd7263111d0abc69 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4619374cef299e94fd7263111d0abc69 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Beranda <?php $__env->endSlot(); ?>

    <!-- Hero Section - Full Viewport -->
    <section class="hero-section text-white min-h-screen flex items-center relative overflow-hidden pt-16">
        <!-- Background Image (Positioned Higher) -->
        <div class="absolute inset-0">
            <img src="<?php echo e(asset('images/bG_HERO.webp')); ?>" alt="Hero Background" class="w-full h-full object-cover object-top">
        </div>
        
        <!-- Blue Overlay (Transparent) -->
        <div class="absolute inset-0 bg-gradient-to-br from-sigap-blue/70 via-blue-800/70 to-sigap-blue/70"></div>
        
        <!-- Background Pattern (Dots Animation) -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left animate-fade-in-up">
                    <!-- Logo and Title - Sejajar Horizontal -->
                    <div class="flex items-center justify-center lg:justify-start gap-2 mb-2">
                        <img src="<?php echo e(asset('images/LOGO_SIGAP.png')); ?>" alt="SIGAP Logo" class="w-12 h-12 md:w-16 md:h-16 object-contain drop-shadow-2xl">
                        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight relative">
                            <span id="sigap-typing" class="inline-block relative z-10"></span>
                            <span id="swipe-highlight" class="absolute -bottom-3 left-0 h-2 bg-sigap-orange rounded-full opacity-0" style="width: 0%; transition: all 0.6s ease;"></span>
                        </h1>
                        <style>
                            @keyframes swipe-left-right {
                                0% {
                                    opacity: 0;
                                    transform: translateX(-50px);
                                }
                                100% {
                                    opacity: 1;
                                    transform: translateX(0);
                                }
                            }
                            
                            .animate-swipe-up {
                                animation: swipe-left-right 0.8s ease-out forwards;
                                opacity: 0;
                            }
                            
                            #sigap-typing .text-sigap-orange {
                                font-style: italic;
                                font-weight: 700;
                                letter-spacing: 0.05em;
                                transform: skewX(-5deg);
                            }
                            
                            @keyframes swipe-right {
                                0% {
                                    width: 0%;
                                    opacity: 0;
                                }
                                50% {
                                    opacity: 1;
                                }
                                100% {
                                    width: 100%;
                                    opacity: 1;
                                }
                            }
                            
                            #swipe-highlight.active {
                                animation: swipe-right 1.2s ease-out forwards;
                                opacity: 1 !important;
                            }
                        </style>
                    </div>
                    
                    <!-- Marquee Text - Container Terpisah -->
                    <div class="isolate mb-2 mt-8 overflow-hidden">
                        <div class="marquee-text-container">
                            <div class="marquee-text-content">
                                <span class="marquee-text-item">Platform Layanan On-Demand</span>
                                <span class="marquee-text-separator">-</span>
                                <span class="marquee-text-item">Mengatasi Pengangguran</span>
                                <span class="marquee-text-separator">-</span>
                                <span class="marquee-text-item">Peluang Kerja Fleksibel</span>
                                <span class="marquee-text-separator">-</span>
                                <span class="marquee-text-item">Waktu Luang = Penghasilan</span>
                                <span class="marquee-text-separator">-</span>
                                <span class="marquee-text-item">Platform Layanan On-Demand</span>
                                <span class="marquee-text-separator">-</span>
                                <span class="marquee-text-item">Mengatasi Pengangguran</span>
                                <span class="marquee-text-separator">-</span>
                                <span class="marquee-text-item">Peluang Kerja Fleksibel</span>
                                <span class="marquee-text-separator">-</span>
                                <span class="marquee-text-item">Waktu Luang = Penghasilan</span>
                            </div>
                        </div>
                        <style>
                            .marquee-text-container {
                                overflow: hidden;
                                white-space: nowrap;
                                width: 100%;
                            }
                            
                            .marquee-text-content {
                                display: inline-flex;
                                align-items: center;
                                gap: 1.5rem;
                                animation: marquee-text-scroll 40s linear infinite;
                            }
                            
                            .marquee-text-item {
                                display: inline-block;
                                color: #dbeafe;
                                font-size: 1.5rem;
                                font-weight: 500;
                                white-space: nowrap;
                            }
                            
                            .marquee-text-separator {
                                color: #93c5fd;
                                font-size: 1.5rem;
                                opacity: 0.6;
                            }
                            
                            @keyframes marquee-text-scroll {
                                0% {
                                    transform: translateX(0);
                                }
                                100% {
                                    transform: translateX(-50%);
                                }
                            }
                            
                            .marquee-text-content:hover {
                                animation-play-state: paused;
                            }
                        </style>
                    </div>
                    
                    <p class="text-lg md:text-xl mb-4 text-blue-200 max-w-xl mx-auto lg:mx-0">
                        Menghubungkan pekerja dengan peluang kerja fleksibel. Mengubah waktu luang menjadi penghasilan tambahan.
                    </p>
                    <?php if(auth()->guard()->guest()): ?>
                    <div class="flex justify-center lg:justify-start">
                        <a href="#pekerjaan" class="bg-white/10 hover:bg-white/20 text-white font-bold py-4 px-10 rounded-xl transition-all duration-300 border-2 border-white/30 hover:border-white/50 text-lg">
                            Lihat Pekerjaan
                        </a>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Right Content - Statistics -->
                <div class="animate-fade-in-up delay-200">
                    <div class="bg-white/10 rounded-2xl p-8 border border-white/20 shadow-2xl relative overflow-hidden">
                        <!-- Animated Dots Background -->
                        <div class="absolute inset-0 opacity-5">
                            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 30px 30px; animation: dots-move 20s linear infinite;"></div>
                        </div>
                        
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold mb-6 text-center text-white">Statistik Platform</h3>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="bg-white/10 rounded-xl p-6 text-center border border-white/20 hover:bg-white/20 transition-all transform hover:scale-105">
                                    <div class="text-5xl font-extrabold text-sigap-orange mb-2"><?php echo e(\App\Models\Job::where('status', 'open')->count()); ?>+</div>
                                    <div class="text-sm text-blue-100 font-medium">Pekerjaan Aktif</div>
                                </div>
                                <div class="bg-white/10 rounded-xl p-6 text-center border border-white/20 hover:bg-white/20 transition-all transform hover:scale-105">
                                    <div class="text-5xl font-extrabold text-white mb-2"><?php echo e(\App\Models\User::where('role', 'pekerja')->count()); ?>+</div>
                                    <div class="text-sm text-blue-100 font-medium">Pekerja SIGAP</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#pekerjaan" class="text-white/70 hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Jobs Section -->
    <section id="pekerjaan" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 fade-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-sigap-blue mb-4">Pekerjaan Tersedia</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Temukan pekerjaan yang sesuai dengan skill dan waktu luang Anda</p>
            </div>
            
            <!-- Urgent Jobs Section -->
            <?php if($urgentJobs->count() > 0): ?>
                <div class="mb-12">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-sigap-blue mb-2">Pekerjaan Urgent</h3>
                            <p class="text-gray-600">Pekerjaan dengan komisi besar dan deadline cepat</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php $__currentLoopData = $urgentJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-gradient-to-br from-red-50 to-orange-50 border-2 border-red-200 rounded-2xl p-6 hover:border-red-400 hover:shadow-2xl transition-all duration-300 fade-on-scroll transform hover:-translate-y-2 relative">
                                <div class="flex items-start justify-between mb-4">
                                    <span class="text-xs font-bold px-4 py-1.5 bg-sigap-blue/10 text-sigap-blue rounded-full"><?php echo e($job->category); ?></span>
                                    <span class="text-xs text-gray-500 font-medium"><?php echo e($job->created_at->diffForHumans()); ?></span>
                                </div>
                                <h3 class="text-xl font-bold text-sigap-blue mb-3 line-clamp-2 min-h-[3.5rem]">
                                    <?php echo e($job->title); ?>

                                </h3>
                                <p class="text-sm text-gray-600 mb-5 line-clamp-2 min-h-[2.5rem]"><?php echo e(Str::limit($job->description, 100)); ?></p>
                                <div class="space-y-3 mb-5">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-5 h-5 mr-2 text-sigap-orange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span class="truncate"><?php echo e($job->location); ?></span>
                                    </div>
                                    <div class="flex items-center text-base font-bold text-red-600">
                                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Rp <?php echo e(number_format($job->budget, 0, ',', '.')); ?>

                                    </div>
                                    <?php if($job->deadline): ?>
                                        <div class="flex items-center text-xs text-red-600 font-semibold">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Deadline: <?php echo e($job->deadline->format('d M Y')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->user()->isPekerja()): ?>
                                        <a href="<?php echo e(route('jobs.show', $job)); ?>" class="block w-full text-center bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                            Lamar Sekarang
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('jobs.show', $job)); ?>" class="block w-full text-center bg-sigap-blue hover:bg-blue-900 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                            Lihat Detail
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e(route('jobs.show', $job)); ?>" class="block w-full text-center bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                        Lamar Sekarang
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Latest Jobs Section -->
            <?php if($latestJobs->count() > 0): ?>
                <div class="mb-10">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-sigap-blue mb-2">Pekerjaan Terbaru</h3>
                            <p class="text-gray-600">Pekerjaan pekerjaan yang baru saja diposting</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php $__currentLoopData = $latestJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white border-2 border-gray-200 rounded-2xl p-6 hover:border-sigap-orange hover:shadow-2xl transition-all duration-300 fade-on-scroll transform hover:-translate-y-2">
                                <div class="flex items-start justify-between mb-4">
                                    <span class="text-xs font-bold px-4 py-1.5 bg-sigap-blue/10 text-sigap-blue rounded-full"><?php echo e($job->category); ?></span>
                                    <span class="text-xs text-gray-500 font-medium"><?php echo e($job->created_at->diffForHumans()); ?></span>
                                </div>
                                <h3 class="text-xl font-bold text-sigap-blue mb-3 line-clamp-2 min-h-[3.5rem]">
                                    <?php echo e($job->title); ?>

                                </h3>
                                <p class="text-sm text-gray-600 mb-5 line-clamp-2 min-h-[2.5rem]"><?php echo e(Str::limit($job->description, 100)); ?></p>
                                <div class="space-y-3 mb-5">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-5 h-5 mr-2 text-sigap-orange flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span class="truncate"><?php echo e($job->location); ?></span>
                                    </div>
                                    <div class="flex items-center text-base font-bold text-sigap-orange">
                                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Rp <?php echo e(number_format($job->budget, 0, ',', '.')); ?>

                                    </div>
                                </div>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->user()->isPekerja()): ?>
                                        <a href="<?php echo e(route('jobs.show', $job)); ?>" class="block w-full text-center bg-sigap-orange hover:bg-orange-600 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                            Lamar Sekarang
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('jobs.show', $job)); ?>" class="block w-full text-center bg-sigap-blue hover:bg-blue-900 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                            Lihat Detail
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e(route('jobs.show', $job)); ?>" class="block w-full text-center bg-sigap-orange hover:bg-orange-600 text-white font-bold py-3 px-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                        Lamar Sekarang
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- CTA to View All Jobs -->
            <div class="text-center">
                <a href="<?php echo e(route('jobs.index')); ?>" class="inline-block bg-sigap-blue hover:bg-blue-900 text-white font-bold py-4 px-10 rounded-xl transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 text-lg">
                    Lihat Semua Pekerjaan →
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-sigap-blue mb-4">Apa Kata Mereka?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Testimoni dari pengguna SIGAP yang telah merasakan manfaat platform ini
                </p>
            </div>

            <!-- Infinite Carousel -->
            <div class="relative overflow-hidden">
                <div class="testimonial-carousel flex gap-6">
                    <!-- Testimonial Items (Duplicated for seamless loop) -->
                    <?php
                        $testimonials = [
                            [
                                'name' => 'Budi Santoso',
                                'role' => 'Pekerja SIGAP',
                                'avatar' => 'B',
                                'rating' => 5,
                                'text' => 'SIGAP membantu saya mendapatkan penghasilan tambahan sambil kuliah. Fleksibel dan pembayarannya cepat!'
                            ],
                            [
                                'name' => 'Siti Nurhaliza',
                                'role' => 'User',
                                'avatar' => 'S',
                                'rating' => 5,
                                'text' => 'Sangat mudah menemukan pekerja yang tepat untuk kebutuhan saya. Platform yang sangat membantu!'
                            ],
                            [
                                'name' => 'Ahmad Fauzi',
                                'role' => 'Pekerja SIGAP',
                                'avatar' => 'A',
                                'rating' => 5,
                                'text' => 'Dari waktu luang jadi penghasilan. SIGAP benar-benar mengubah hidup saya. Terima kasih!'
                            ],
                            [
                                'name' => 'Dewi Lestari',
                                'role' => 'User',
                                'avatar' => 'D',
                                'rating' => 5,
                                'text' => 'Pekerja yang saya temukan sangat profesional dan pekerjaannya rapi. Highly recommended!'
                            ],
                            [
                                'name' => 'Rizki Pratama',
                                'role' => 'Pekerja SIGAP',
                                'avatar' => 'R',
                                'rating' => 5,
                                'text' => 'Platform yang user-friendly dan prosesnya tidak ribet. Sudah dapat beberapa pekerjaan dari sini.'
                            ],
                            [
                                'name' => 'Maya Sari',
                                'role' => 'User',
                                'avatar' => 'M',
                                'rating' => 5,
                                'text' => 'SIGAP membantu saya menemukan pekerja yang tepat untuk berbagai kebutuhan rumah tangga.'
                            ],
                        ];
                    ?>
                    
                    <!-- First Set -->
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="testimonial-item flex-shrink-0 w-full md:w-1/2 lg:w-1/3">
                            <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 h-full">
                                <div class="flex items-center mb-4">
                                    <?php for($i = 0; $i < $testimonial['rating']; $i++): ?>
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    <?php endfor; ?>
                                </div>
                                <p class="text-gray-700 mb-6 leading-relaxed italic">
                                    "<?php echo e($testimonial['text']); ?>"
                                </p>
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-br from-sigap-orange to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                        <?php echo e($testimonial['avatar']); ?>

                                    </div>
                                    <div>
                                        <p class="font-bold text-sigap-blue"><?php echo e($testimonial['name']); ?></p>
                                        <p class="text-sm text-gray-500"><?php echo e($testimonial['role']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <!-- Duplicated Set for Seamless Loop -->
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="testimonial-item flex-shrink-0 w-full md:w-1/2 lg:w-1/3">
                            <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 h-full">
                                <div class="flex items-center mb-4">
                                    <?php for($i = 0; $i < $testimonial['rating']; $i++): ?>
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    <?php endfor; ?>
                                </div>
                                <p class="text-gray-700 mb-6 leading-relaxed italic">
                                    "<?php echo e($testimonial['text']); ?>"
                                </p>
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-br from-sigap-orange to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                        <?php echo e($testimonial['avatar']); ?>

                                    </div>
                                    <div>
                                        <p class="font-bold text-sigap-blue"><?php echo e($testimonial['name']); ?></p>
                                        <p class="text-sm text-gray-500"><?php echo e($testimonial['role']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-sigap-blue mb-4">Mitra Kerja Sama</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Bekerja sama dengan berbagai perusahaan dan organisasi untuk menciptakan lebih banyak peluang kerja
                </p>
            </div>

            <!-- Partner Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12 fade-on-scroll">
                <div class="bg-gradient-to-br from-sigap-blue to-blue-900 rounded-2xl p-6 text-center text-white shadow-xl transform hover:scale-105 transition-all">
                    <div class="text-4xl font-extrabold mb-2">50+</div>
                    <div class="text-sm opacity-90">Mitra Perusahaan</div>
                </div>
                <div class="bg-gradient-to-br from-sigap-orange to-orange-600 rounded-2xl p-6 text-center text-white shadow-xl transform hover:scale-105 transition-all">
                    <div class="text-4xl font-extrabold mb-2">200+</div>
                    <div class="text-sm opacity-90">Proyek Selesai</div>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-center text-white shadow-xl transform hover:scale-105 transition-all">
                    <div class="text-4xl font-extrabold mb-2">95%</div>
                    <div class="text-sm opacity-90">Tingkat Kepuasan</div>
                </div>
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-center text-white shadow-xl transform hover:scale-105 transition-all">
                    <div class="text-4xl font-extrabold mb-2">24/7</div>
                    <div class="text-sm opacity-90">Dukungan</div>
                </div>
            </div>

            <!-- Partner Logos (Infinite Scroll) -->
            <div class="relative overflow-hidden">
                <div class="partner-carousel flex gap-8 items-center">
                    <?php
                        $partners = ['PT ABC', 'CV XYZ', 'PT Maju Jaya', 'CV Sejahtera', 'PT Harmoni', 'CV Kreatif', 'PT Nusantara', 'CV Mandiri'];
                    ?>
                    
                    <!-- First Set -->
                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="partner-item flex-shrink-0">
                            <div class="bg-gray-50 rounded-xl p-6 w-48 h-32 flex items-center justify-center border-2 border-gray-200 hover:border-sigap-orange transition-all">
                                <span class="text-xl font-bold text-sigap-blue"><?php echo e($partner); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <!-- Duplicated Set -->
                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="partner-item flex-shrink-0">
                            <div class="bg-gray-50 rounded-xl p-6 w-48 h-32 flex items-center justify-center border-2 border-gray-200 hover:border-sigap-orange transition-all">
                                <span class="text-xl font-bold text-sigap-blue"><?php echo e($partner); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Feedback & Location Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Feedback Form -->
                <div class="fade-on-scroll">
                    <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100">
                        <h2 class="text-3xl md:text-4xl font-bold text-sigap-blue mb-2">Kirim Feedback</h2>
                        <p class="text-gray-600 mb-6">
                            Saran dan masukan Anda sangat berarti untuk pengembangan SIGAP
                        </p>
                        
                        <form id="feedback-form" class="space-y-6">
                            <?php echo csrf_field(); ?>
                            <div>
                                <label for="feedback_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="feedback_name" name="name" required
                                    class="input-field <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Nama lengkap Anda">
                            </div>

                            <div>
                                <label for="feedback_email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="feedback_email" name="email" required
                                    class="input-field <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="nama@email.com">
                            </div>

                            <div>
                                <label for="feedback_subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    Subjek <span class="text-red-500">*</span>
                                </label>
                                <select id="feedback_subject" name="subject" required
                                    class="input-field">
                                    <option value="">Pilih subjek</option>
                                    <option value="saran">Saran</option>
                                    <option value="masalah">Laporkan Masalah</option>
                                    <option value="kerjasama">Kerja Sama</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div>
                                <label for="feedback_message" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pesan <span class="text-red-500">*</span>
                                </label>
                                <textarea id="feedback_message" name="message" rows="5" required
                                    class="input-field <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Tulis feedback Anda di sini..."></textarea>
                            </div>

                            <button type="submit" 
                                class="w-full bg-sigap-orange hover:bg-orange-600 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                Kirim Feedback
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Location & Contact Info -->
                <div class="fade-on-scroll">
                    <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 mb-6">
                        <h2 class="text-3xl md:text-4xl font-bold text-sigap-blue mb-6">Lokasi Kami</h2>
                        
                        <!-- Map Placeholder -->
                        <div class="bg-gradient-to-br from-sigap-blue to-blue-900 rounded-xl h-64 mb-6 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 20px 20px;"></div>
                            </div>
                            <div class="relative z-10 text-center text-white">
                                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="text-xl font-bold">Jakarta, Indonesia</p>
                                <p class="text-sm opacity-90 mt-2">Jl. Sudirman No. 123</p>
                            </div>
                        </div>

                        <!-- Office Locations -->
                        <div class="space-y-4">
                            <h3 class="text-xl font-bold text-sigap-blue mb-4">Kantor Kami</h3>
                            
                            <div class="border-l-4 border-sigap-orange pl-4 py-2">
                                <h4 class="font-bold text-sigap-blue mb-1">Kantor Pusat</h4>
                                <p class="text-sm text-gray-600">Jl. Sudirman No. 123, Jakarta Pusat</p>
                                <p class="text-xs text-gray-500 mt-1">Senin - Jumat: 09:00 - 17:00 WIB</p>
                            </div>

                            <div class="border-l-4 border-sigap-blue pl-4 py-2">
                                <h4 class="font-bold text-sigap-blue mb-1">Kantor Cabang Bandung</h4>
                                <p class="text-sm text-gray-600">Jl. Dago No. 45, Bandung</p>
                                <p class="text-xs text-gray-500 mt-1">Senin - Jumat: 09:00 - 17:00 WIB</p>
                            </div>

                            <div class="border-l-4 border-green-500 pl-4 py-2">
                                <h4 class="font-bold text-sigap-blue mb-1">Kantor Cabang Surabaya</h4>
                                <p class="text-sm text-gray-600">Jl. Pemuda No. 78, Surabaya</p>
                                <p class="text-xs text-gray-500 mt-1">Senin - Jumat: 09:00 - 17:00 WIB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Cards -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gradient-to-br from-sigap-orange to-orange-600 rounded-xl p-6 text-white text-center shadow-lg">
                            <svg class="w-8 h-8 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <p class="text-xs font-medium mb-1">Email</p>
                            <p class="text-sm font-bold">info@sigap.id</p>
                        </div>
                        <div class="bg-gradient-to-br from-sigap-blue to-blue-900 rounded-xl p-6 text-white text-center shadow-lg">
                            <svg class="w-8 h-8 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <p class="text-xs font-medium mb-1">Telepon</p>
                            <p class="text-sm font-bold">+62 812-3456-7890</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4619374cef299e94fd7263111d0abc69)): ?>
<?php $attributes = $__attributesOriginal4619374cef299e94fd7263111d0abc69; ?>
<?php unset($__attributesOriginal4619374cef299e94fd7263111d0abc69); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4619374cef299e94fd7263111d0abc69)): ?>
<?php $component = $__componentOriginal4619374cef299e94fd7263111d0abc69; ?>
<?php unset($__componentOriginal4619374cef299e94fd7263111d0abc69); ?>
<?php endif; ?>
<?php /**PATH /home/fahmyzzx/sigap/resources/views/welcome.blade.php ENDPATH**/ ?>