<?php if($additional->header_layout == 'layout_one'): ?>
<?php echo $__env->make('header-layout-one', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
<?php echo $__env->make('header-layout-two', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Script\producxpartan\resources\views/header.blade.php ENDPATH**/ ?>