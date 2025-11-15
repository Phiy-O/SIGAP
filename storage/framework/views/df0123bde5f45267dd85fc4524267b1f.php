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
     <?php $__env->slot('title', null, []); ?> Daftar Pekerjaan <?php $__env->endSlot(); ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-sigap-blue">Daftar Pekerjaan</h1>
                    <p class="text-gray-600 mt-2">Temukan pekerjaan yang sesuai dengan dirimu</p>
                </div>
            </div>
        </div>

        <?php if($jobs->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card hover:scale-105 transition-transform duration-200 relative">
                        <?php if(isset($job->urgency_score) && $job->urgency_score > 0.5): ?>
                            <div class="absolute top-4 right-4 z-10">
                                <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">URGENT</span>
                            </div>
                        <?php endif; ?>
                        <div class="mb-4">
                            <span class="badge badge-secondary"><?php echo e($job->category); ?></span>
                            <?php if($job->status == 'open'): ?>
                                <span class="badge badge-primary ml-2">Aktif</span>
                            <?php endif; ?>
                        </div>
                        <h3 class="text-xl font-semibold text-sigap-blue mb-2">
                            <a href="<?php echo e(route('jobs.show', $job)); ?>" class="hover:text-sigap-orange transition">
                                <?php echo e($job->title); ?>

                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            <?php echo e(Str::limit($job->description, 120)); ?>

                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-sigap-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <?php echo e($job->location); ?>

                            </div>
                            <div class="flex items-center text-sm font-bold <?php echo e(isset($job->urgency_score) && $job->urgency_score > 0.5 ? 'text-red-600' : 'text-sigap-orange'); ?>">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Rp <?php echo e(number_format($job->budget, 0, ',', '.')); ?>

                            </div>
                            <?php if($job->deadline): ?>
                                <div class="flex items-center text-xs <?php echo e(isset($job->urgency_score) && $job->urgency_score > 0.5 ? 'text-red-600 font-semibold' : 'text-gray-500'); ?>">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Deadline: <?php echo e($job->deadline->format('d M Y')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <a href="<?php echo e(route('jobs.show', $job)); ?>" class="btn-primary w-full text-center">
                            Lihat Detail
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-8">
                <?php echo e($jobs->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-16">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-2xl font-semibold text-gray-700 mb-2">Belum ada pekerjaan</h3>
                <p class="text-gray-600 mb-6">Jadilah yang pertama membuat pekerjaan pekerjaan</p>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->isUser()): ?>
                        <a href="<?php echo e(route('jobs.create')); ?>" class="btn-primary">
                            Buat Pekerjaan Pertama
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?php echo e(route('register')); ?>" class="btn-primary">
                        Daftar Sekarang
                    </a>
                <?php endif; ?>
            </div>
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

<?php /**PATH /home/fahmyzzx/sigap/resources/views/jobs/index.blade.php ENDPATH**/ ?>