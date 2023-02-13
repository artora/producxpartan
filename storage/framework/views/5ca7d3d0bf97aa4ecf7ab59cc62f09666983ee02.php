<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e($allsettings->site_title); ?> - <?php echo e(__('Profile')); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo NoCaptcha::renderJs(); ?>

</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('user-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row">
          <!-- Sidebar-->
          <?php echo $__env->make('user-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!-- Content-->
          <section class="col-lg-8 pt-lg-4 pb-md-4">
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
            <div class="profile-banner" data-aos="fade-up" data-aos-delay="200">
            <?php if($user['user']->user_banner != ''): ?>
            <img class="lazy" width="762" height="313" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user['user']->user_banner); ?>"  alt="<?php echo e($user['user']->username); ?>">
            <?php else: ?>
            <img class="lazy" width="762" height="313" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg"  alt="<?php echo e($user['user']->username); ?>">
            <?php endif; ?>
            </div>
            <?php if($user['user']->user_type == 'vendor'): ?>
              <h2 class="h3 pt-2 pb-4 mb-4 text-center text-sm-left border-bottom"><?php echo e(__('Product Items')); ?><span class="badge badge-secondary font-size-sm text-body align-middle ml-2"><?php echo e(count($itemData['item'])); ?></span></h2>
              <div class="row pt-2 mx-n2 flash-sale" id="post-data">
                <?php echo $__env->make('user-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               </div>
               <div class="ajax-load text-center" style="display:none">
               <p><img class="lazy" width="24" height="24" src="<?php echo e(url('/')); ?>/resources/views/theme/img/loader.gif"> <?php echo e(__('Loading More Items')); ?></p>
              </div>
           <?php endif; ?>
        </div>
        </section>
        </div>
      </div>
    </div>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Script\resources\views/user.blade.php ENDPATH**/ ?>