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
     <?php $__env->slot('title', null, []); ?> <?php echo e($job->title); ?> <?php $__env->endSlot(); ?>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-6">
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->id === $job->user_id): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="text-sigap-orange hover:underline flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke Dashboard
                    </a>
                <?php elseif(auth()->user()->isPekerja()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="text-sigap-orange hover:underline flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke Dashboard
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('jobs.index')); ?>" class="text-sigap-orange hover:underline flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke Daftar Pekerjaan
                    </a>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('jobs.index')); ?>" class="text-sigap-orange hover:underline flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Daftar Pekerjaan
                </a>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="card">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="badge badge-secondary"><?php echo e($job->category); ?></span>
                                <?php if($job->status == 'open'): ?>
                                    <span class="badge badge-primary">Aktif</span>
                                <?php elseif($job->status == 'in_progress'): ?>
                                    <span class="badge bg-blue-100 text-blue-800">Sedang Berjalan</span>
                                <?php elseif($job->status == 'completed'): ?>
                                    <span class="badge bg-green-100 text-green-800">Selesai</span>
                                <?php else: ?>
                                    <span class="badge bg-gray-100 text-gray-800">Dibatalkan</span>
                                <?php endif; ?>
                            </div>
                            <h1 class="text-3xl font-bold text-sigap-blue mb-4"><?php echo e($job->title); ?></h1>
                        </div>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->user()->id === $job->user_id): ?>
                                <div class="flex gap-2">
                                    <a href="<?php echo e(route('jobs.edit', $job)); ?>" class="btn-outline text-sm">
                                        Edit
                                    </a>
                                    <button type="button" onclick="document.getElementById('delete-modal').classList.remove('hidden')" 
                                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
                                        Hapus
                                    </button>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <div class="space-y-4 mb-6">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-sigap-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <?php echo e($job->location); ?>

                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-sigap-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Rp <?php echo e(number_format($job->budget, 0, ',', '.')); ?>

                        </div>
                        <?php if($job->deadline): ?>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-sigap-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Deadline: <?php echo e($job->deadline->format('d M Y, H:i')); ?>

                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="border-t pt-6">
                        <h2 class="text-xl font-semibold text-sigap-blue mb-3">Deskripsi Pekerjaan</h2>
                        <p class="text-gray-700 whitespace-pre-line"><?php echo e($job->description); ?></p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="card sticky top-20">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-sigap-blue mb-2">Diposting oleh</h3>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-sigap-orange rounded-full flex items-center justify-center text-white font-semibold">
                                <?php echo e(strtoupper(substr($job->user->name, 0, 1))); ?>

                            </div>
                            <div class="ml-3">
                                <p class="font-medium text-gray-900"><?php echo e($job->user->name); ?></p>
                                <p class="text-sm text-gray-500"><?php echo e($job->created_at->diffForHumans()); ?></p>
                            </div>
                        </div>
                    </div>

                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->isPekerja() && $job->status == 'open'): ?>
                            <?php if($hasApplied): ?>
                                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
                                    <p class="text-sm text-yellow-800">Anda sudah melamar pekerjaan ini</p>
                                </div>
                            <?php else: ?>
                                <form method="POST" action="<?php echo e(route('jobs.apply', $job)); ?>" class="mb-4">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-4">
                                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                            Pesan (Opsional)
                                        </label>
                                        <textarea id="message" name="message" rows="3"
                                            class="input-field"
                                            placeholder="Tulis pesan untuk menarik perhatian..."></textarea>
                                    </div>
                                    <button type="submit" class="btn-primary w-full">
                                        Lamar Pekerjaan Ini
                                    </button>
                                </form>
                            <?php endif; ?>
                        <?php elseif(auth()->user()->isPekerja() && $job->status == 'in_progress' && $myApplication && $myApplication->status == 'accepted'): ?>
                            <?php if($myApplication->proof_photo): ?>
                                <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                                    <p class="text-sm text-green-800 font-medium mb-2">✓ Pekerjaan sudah selesai</p>
                                    <p class="text-xs text-green-700 mb-3">Bukti foto sudah diunggah</p>
                                    <a href="<?php echo e(asset('storage/' . $myApplication->proof_photo)); ?>" target="_blank" class="text-sm text-green-700 hover:text-green-900 underline">
                                        Lihat Bukti Foto
                                    </a>
                                </div>
                            <?php else: ?>
                                <button type="button" onclick="document.getElementById('complete-modal').classList.remove('hidden')" 
                                    class="btn-primary w-full mb-4">
                                    Selesai & Upload Bukti Foto
                                </button>
                            <?php endif; ?>
                        <?php elseif(auth()->user()->id === $job->user_id): ?>
                            <div class="space-y-2 mb-4">
                                <p class="text-sm text-gray-600 mb-2">Total Lamaran: <strong><?php echo e($job->applications->count()); ?></strong></p>
                                <?php if($job->applications->where('status', 'pending')->count() > 0): ?>
                                    <p class="text-sm text-yellow-600 font-medium">
                                        <?php echo e($job->applications->where('status', 'pending')->count()); ?> lamaran pending
                                    </p>
                                <?php endif; ?>
                                <?php if($job->applications->where('status', 'accepted')->count() > 0): ?>
                                    <p class="text-sm text-green-600 font-medium">
                                        <?php echo e($job->applications->where('status', 'accepted')->count()); ?> lamaran diterima
                                    </p>
                                <?php endif; ?>
                            </div>
                            <?php if($job->applications->count() > 0): ?>
                                <a href="#applications" class="btn-primary w-full text-center block text-sm">
                                    Lihat Daftar Pelamar
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if($job->status == 'open'): ?>
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <p class="text-sm text-blue-800 mb-3">Login atau Daftar sebagai Pekerja SIGAP untuk melamar pekerjaan ini</p>
                                <div class="flex gap-2">
                                    <a href="<?php echo e(route('login')); ?>" class="btn-primary text-sm py-2 px-4 flex-1 text-center">
                                        Login
                                    </a>
                                    <a href="<?php echo e(route('register')); ?>" class="btn-secondary text-sm py-2 px-4 flex-1 text-center">
                                        Daftar
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Applications Section (for job owner) -->
        <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->id === $job->user_id && $job->applications->count() > 0): ?>
                <div id="applications" class="mt-8">
                    <div class="card">
                        <h2 class="text-2xl font-bold text-sigap-blue mb-6">Daftar Pelamar</h2>
                        
                        <div class="space-y-4">
                            <?php $__currentLoopData = $job->applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-3 mb-2">
                                                <div class="w-12 h-12 bg-sigap-orange rounded-full flex items-center justify-center text-white font-bold text-lg">
                                                    <?php echo e(strtoupper(substr($application->pekerja->name, 0, 1))); ?>

                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-semibold text-sigap-blue"><?php echo e($application->pekerja->name); ?></h3>
                                                    <p class="text-sm text-gray-500"><?php echo e($application->pekerja->email); ?></p>
                                                    <?php if($application->pekerja->phone): ?>
                                                        <p class="text-sm text-gray-500"><?php echo e($application->pekerja->phone); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <?php if($application->message): ?>
                                                <div class="bg-gray-50 rounded-lg p-4 mt-3">
                                                    <p class="text-sm text-gray-700"><?php echo e($application->message); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="ml-4 text-right">
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full mb-2 block <?php echo e($application->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : ($application->status == 'accepted' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800')); ?>">
                                                <?php echo e(ucfirst($application->status)); ?>

                                            </span>
                                            <?php if($application->status == 'pending' && $job->status == 'open'): ?>
                                                <form method="POST" action="<?php echo e(route('applications.accept', $application)); ?>" class="mt-2">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" 
                                                        class="bg-sigap-orange hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg text-sm transition"
                                                        onclick="return confirm('Terima pelamar ini? Status pekerjaan akan berubah menjadi sedang berjalan dan pelamar lain akan ditolak.')">
                                                        Terima
                                                    </button>
                                                </form>
                                            <?php elseif($application->status == 'accepted'): ?>
                                                <p class="text-xs text-green-600 mt-2 font-medium">✓ Diterima</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-3">
                                        Melamar pada: <?php echo e($application->created_at->format('d M Y, H:i')); ?>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Complete Job Modal -->
        <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->isPekerja() && $job->status == 'in_progress' && $myApplication && $myApplication->status == 'accepted' && !$myApplication->proof_photo): ?>
                <div id="complete-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-sigap-blue">Selesaikan Pekerjaan</h3>
                                <button type="button" onclick="document.getElementById('complete-modal').classList.add('hidden')" 
                                    class="text-gray-400 hover:text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            
                            <form method="POST" action="<?php echo e(route('jobs.complete', $job)); ?>" enctype="multipart/form-data" id="complete-form">
                                <?php echo csrf_field(); ?>
                                
                                <div class="mb-4">
                                    <label for="proof_photo" class="block text-sm font-medium text-gray-700 mb-2">
                                        Upload Bukti Foto <span class="text-red-500">*</span>
                                    </label>
                                    <input type="file" id="proof_photo" name="proof_photo" accept="image/*" required
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-sigap-orange file:text-white hover:file:bg-orange-600 <?php $__errorArgs = ['proof_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF (Max: 5MB)</p>
                                    <?php $__errorArgs = ['proof_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mb-4">
                                    <div id="photo-preview" class="hidden mt-2">
                                        <img id="preview-img" src="" alt="Preview" class="w-full h-48 object-cover rounded-lg border border-gray-200">
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <button type="submit" class="btn-primary flex-1">
                                        Submit & Selesaikan
                                    </button>
                                    <button type="button" onclick="document.getElementById('complete-modal').classList.add('hidden')" 
                                        class="btn-outline flex-1">
                                        Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('proof_photo').addEventListener('change', function(e) {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('preview-img').src = e.target.result;
                                document.getElementById('photo-preview').classList.remove('hidden');
                            }
                            reader.readAsDataURL(file);
                        } else {
                            document.getElementById('photo-preview').classList.add('hidden');
                        }
                    });
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Delete Confirmation Modal -->
        <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->id === $job->user_id): ?>
                <div id="delete-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <div class="flex items-center justify-center mx-auto flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            
                            <h3 class="text-lg font-bold text-gray-900 text-center mb-2">Hapus Pekerjaan?</h3>
                            <p class="text-sm text-gray-600 text-center mb-6">
                                Apakah Anda yakin ingin menghapus pekerjaan "<strong><?php echo e($job->title); ?></strong>"? 
                                Tindakan ini tidak dapat dibatalkan dan semua data terkait akan dihapus.
                            </p>
                            
                            <form method="POST" action="<?php echo e(route('jobs.destroy', $job)); ?>" class="flex gap-3">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                
                                <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg flex-1 transition">
                                    Ya, Hapus
                                </button>
                                <button type="button" onclick="document.getElementById('delete-modal').classList.add('hidden')" 
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg flex-1 transition">
                                    Tidak
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
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

<?php /**PATH /home/fahmyzzx/sigap/resources/views/jobs/show.blade.php ENDPATH**/ ?>