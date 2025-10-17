<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> - Admin CMS Karang Taruna</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-color_bg font-poppins" x-data="{ sidebarOpen: true }">
    <!-- Global Alert Component -->
    <?php echo $__env->make('admin.layouts.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="flex flex-col h-screen overflow-hidden">
        <!-- Top Navigation (Full Width) -->
        <?php echo $__env->make('admin.layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar (Toggleable) -->
            <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto bg-color_bg p-6">
                <?php if(session('success')): ?>
                    <script>
                        document.addEventListener('alpine:init', () => {
                            setTimeout(() => {
                                window.dispatchEvent(new CustomEvent('alert', {
                                    detail: { type: 'success', message: '<?php echo e(session('success')); ?>', duration: 5000 }
                                }));
                            }, 100);
                        });
                    </script>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <script>
                        document.addEventListener('alpine:init', () => {
                            setTimeout(() => {
                                window.dispatchEvent(new CustomEvent('alert', {
                                    detail: { type: 'error', message: '<?php echo e(session('error')); ?>', duration: 5000 }
                                }));
                            }, 100);
                        });
                    </script>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
<?php /**PATH D:\Magang\cms-karangtaruna\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>