<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e($allsettings->site_title); ?> - <?php echo e(__('Subscription')); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/theme/css/tailwind.min.css')); ?>" />
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($addition_settings->subscription_mode == 1): ?>
<section class="bg-position-center-top" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(__('Home')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(__('Subscription')); ?></li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white"><?php echo e(__('Subscription')); ?></h1>
        </div>
      </div>
      </div>
    </section>
<div class="faq-section section-padding">
		<div class="container py-5 mt-md-2 mb-2">
            <?php if(in_array('subscription',$top_ads)): ?>
              <div class="row">
                  <div class="col-lg-12 mt-4" align="center">
                     <?php echo html_entity_decode($addition_settings->top_ads); ?>
                  </div>
               </div>   
               <?php endif; ?>
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                  <?php if($addition_settings->subscription_title != ""): ?>
                  <h1><?php echo e($addition_settings->subscription_title); ?></h1>
                  <?php endif; ?>
                  <?php if($addition_settings->subscription_desc != ""): ?>
                  <div class="font-size-md"><?php echo html_entity_decode($addition_settings->subscription_desc); ?></div>
                  <?php endif; ?>
                 </div>
              </div>
			<div class="row">
                <div class="py-20 radius-for-skewed">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap -mx-4">
                    <?php $__currentLoopData = $subscription['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8 lg:mb-10" data-aos="fade-up" data-aos-delay="200">
                        <div <?php if($subscription->highlight_pack == 0): ?> class="p-8 bg-white shadow rounded border-0 hover:border-2 cursor-pointer" <?php else: ?> class="p-8 shadow rounded border-0 hover:border-2 cursor-pointer" style="background: <?php echo e($subscription->highlight_bg_color); ?>; color: <?php echo e($subscription->highlight_text_color); ?>;" <?php endif; ?>>
                            <h4 class="mb-2 text-2xl font-bold font-heading" data-config-id="03_title" <?php if($subscription->highlight_pack == 1): ?> style="color: <?php echo e($subscription->highlight_text_color); ?>;" <?php endif; ?>><?php echo e($subscription->subscr_name); ?></h4> <span class="text-6xl font-bold" data-config-id="03_price" <?php if($subscription->highlight_pack == 0): ?> style="color:#000000;" <?php endif; ?>><?php echo e(Helper::price_format($allsettings->site_currency_position,$subscription->subscr_price,"symbol")); ?></span> <span <?php if($subscription->highlight_pack == 0): ?> class="text-gray-400 text-xs" <?php else: ?> class="text-xs" <?php endif; ?> data-config-id="03_note">/<?php echo e($subscription->subscr_duration); ?></span>
                            <?php if($subscription->extra_info != ""): ?>
                            <p <?php if($subscription->highlight_pack == 0): ?> class="mt-3 mb-6 text-gray-500 leading-loose" <?php else: ?> class="mt-3 mb-6 leading-loose" <?php endif; ?>><?php echo e($subscription->extra_info); ?></p>
                            <?php endif; ?>
                            
                            <div class="price-list">
 							<ul>
                                <?php if($subscription->subscr_item_level == 'limited'): ?>
 								<li><i class="fa fa-check-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i> <?php echo e($subscription->subscr_item); ?> <?php echo e(__('Upload')); ?> <?php echo e(__('Items')); ?></li>
                                <?php else: ?>
                                <li><i class="fa fa-check-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i> <?php echo e(__('Unlimited Upload Items')); ?></li>
                                <?php endif; ?>
                                <?php if($subscription->subscr_download_item != 0): ?>
                                <li><i class="fa fa-check-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i> <?php echo e($subscription->subscr_download_item); ?> <?php echo e(__('Download items per day')); ?></li>
                                <?php endif; ?>
                                <?php if($subscription->subscr_space_level == 'limited'): ?>
 								<li><i class="fa fa-check-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i> <?php echo e($subscription->subscr_space); ?><?php echo e($subscription->subscr_space_type); ?> <?php echo e(__('Space Available')); ?></li>
                                <?php else: ?>
                                <li><i class="fa fa-check-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i> <?php echo e(__('Unlimited Space Available')); ?></li>
                                <?php endif; ?>
								<li><?php if($subscription->subscr_email_support == 1): ?><i class="fa fa-check-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i><?php else: ?><i class="fa fa-times-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i><?php endif; ?> <?php echo e(__('Email Support')); ?></li>										
								<li><?php if($subscription->subscr_payment_mode == 1): ?><i class="fa fa-check-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i><?php else: ?><i class="fa fa-times-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i><?php endif; ?> <?php echo e(__('Direct Transfer Payment')); ?></li>
								<li><?php if($subscription->subscr_payment_mode == 1): ?><i class="fa fa-check-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i> <?php echo e(__('Without Commission Payment')); ?><?php else: ?><i class="fa fa-times-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i> <?php echo e(__('Without Commission Payment')); ?><?php endif; ?></li>
								<li><i class="fa fa-check-circle" aria-hidden="true" style="color: <?php echo e($subscription->icon_color); ?>;"></i> <?php echo e(__('Support 24 x 7')); ?></li>
 							</ul>
 						</div>
                        <?php if(Auth::guest()): ?>
                      <a class="inline-block text-center py-2 px-4 w-full rounded-l-xl rounded-t-xl font-bold leading-loose transition duration-200" href="<?php echo e(URL::to('/login')); ?>" style="background: <?php echo e($subscription->button_bg_color); ?>; color:<?php echo e($subscription->button_text_color); ?>;"><?php echo e(__('Upgrade')); ?></a>
                        <?php else: ?>
                        <?php if(Auth::user()->id != 1): ?>
                        
                        <?php if(Auth::user()->user_subscr_type == $subscription->subscr_name): ?>
                        <a class="inline-block text-center py-2 px-4 w-full rounded-l-xl rounded-t-xl font-bold leading-loose transition duration-200" href="javascript:void(0)" style="background: <?php echo e($subscription->button_bg_color); ?>; color:<?php echo e($subscription->button_text_color); ?>;"><?php echo e(__('Upgrade')); ?></a>
                        <?php else: ?>
                        <a class="inline-block text-center py-2 px-4 w-full rounded-l-xl rounded-t-xl font-bold leading-loose transition duration-200" href="<?php echo e(URL::to('/confirm-subscription')); ?>/<?php echo e(base64_encode($subscription->subscr_id)); ?>" style="background: <?php echo e($subscription->button_bg_color); ?>; color:<?php echo e($subscription->button_text_color); ?>;"><?php echo e(__('Upgrade')); ?></a>
                        <?php endif; ?>
                        
                        <?php endif; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                </div>
            </div>
        </div>
        </div>
		</div>
        <?php if(in_array('subscription',$bottom_ads)): ?>
        <div class="row">
          <div class="col-lg-12 mt-2 mb-2" align="center">
             <?php echo html_entity_decode($addition_settings->bottom_ads); ?>
          </div>
       </div>   
       <?php endif; ?>
	</div>
    <?php else: ?>
    <?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Script\resources\views/subscription.blade.php ENDPATH**/ ?>