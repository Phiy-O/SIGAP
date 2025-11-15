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
     <?php $__env->slot('title', null, []); ?> Dashboard User <?php $__env->endSlot(); ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-sigap-blue">Dashboard</h1>
            <p class="text-gray-600 mt-2">Kelola pekerjaan pekerjaan Anda</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Total Pekerjaan</p>
                        <p class="text-3xl font-bold text-sigap-blue mt-2"><?php echo e($myJobs->count()); ?></p>
                    </div>
                    <div class="w-12 h-12 bg-sigap-blue/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-sigap-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Pekerjaan Aktif</p>
                        <p class="text-3xl font-bold text-sigap-orange mt-2">
                            <?php echo e($myJobs->where('status', 'open')->count()); ?>

                        </p>
                    </div>
                    <div class="w-12 h-12 bg-sigap-orange/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-sigap-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Lamaran Pending</p>
                        <p class="text-3xl font-bold text-yellow-600 mt-2">
                            <?php echo e($pendingApplications->sum(fn($job) => $job->applications->where('status', 'pending')->count())); ?>

                        </p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Role Switch & Actions -->
        <div class="mb-6 flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
            <div>
                <?php if(auth()->user()->canSwitchRole()): ?>
                    <form method="POST" action="<?php echo e(route('role.switch')); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-600">Role saat ini: <strong><?php echo e(ucfirst(auth()->user()->role)); ?></strong></span>
                            <button type="submit" name="role" value="<?php echo e(auth()->user()->isUser() ? 'pekerja' : 'user'); ?>" 
                                class="text-sm bg-sigap-orange hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition">
                                Switch ke <?php echo e(auth()->user()->isUser() ? 'Pekerja' : 'User'); ?>

                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            <a href="<?php echo e(route('jobs.create')); ?>" class="btn-primary inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Pekerjaan Baru
            </a>
        </div>

        <!-- My Jobs -->
        <div class="card">
            <h2 class="text-2xl font-bold text-sigap-blue mb-6">Pekerjaan Saya</h2>
            <?php if($myJobs->count() > 0): ?>
                <div class="space-y-4">
                    <?php $__currentLoopData = $myJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-sigap-blue mb-2">
                                        <a href="<?php echo e(route('jobs.show', $job)); ?>" class="hover:text-sigap-orange transition">
                                            <?php echo e($job->title); ?>

                                        </a>
                                    </h3>
                                    <p class="text-gray-600 text-sm mb-2"><?php echo e(Str::limit($job->description, 100)); ?></p>
                                    <div class="flex flex-wrap gap-2 text-sm">
                                        <span class="badge badge-secondary"><?php echo e($job->category); ?></span>
                                        <span class="badge badge-primary">Rp <?php echo e(number_format($job->budget, 0, ',', '.')); ?></span>
                                        <span class="text-gray-500"><?php echo e($job->location); ?></span>
                                    </div>
                                </div>
                                <div class="ml-4 text-right">
                                    <?php if($job->status == 'open'): ?>
                                        <span class="badge badge-primary">Aktif</span>
                                    <?php elseif($job->status == 'in_progress'): ?>
                                        <span class="badge bg-blue-100 text-blue-800">Sedang Berjalan</span>
                                    <?php elseif($job->status == 'completed'): ?>
                                        <span class="badge bg-green-100 text-green-800">Selesai</span>
                                    <?php else: ?>
                                        <span class="badge bg-gray-100 text-gray-800">Dibatalkan</span>
                                    <?php endif; ?>
                                    <div class="mt-2">
                                        <a href="<?php echo e(route('jobs.show', $job)); ?>" class="text-sm text-sigap-orange hover:underline">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-600 mb-4">Belum ada pekerjaan yang dibuat</p>
                    <a href="<?php echo e(route('jobs.create')); ?>" class="btn-primary inline-block">
                        Buat Pekerjaan Pertama
                    </a>
                </div>
            <?php endif; ?>
        </div>
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

<?php /**PATH /home/fahmyzzx/sigap/resources/views/dashboard/user.blade.php ENDPATH**/ ?>