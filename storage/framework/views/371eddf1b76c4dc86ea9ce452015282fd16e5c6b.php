<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo e($allsettings->site_title); ?> - <?php echo e(__('Free Items')); ?></title>
<?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="bg-position-center-top" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(__('Home')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(__('Free Items')); ?></li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white"><?php echo e(__('Free Items')); ?></h1>
        </div>
      </div>
      </div>
    </section>
<?php /*?><section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
      <div class="container d-flex flex-column">
        <div class="row mt-auto">
        <div class="col-lg-8 col-sm-12 text-center mx-auto">
        <h2 class="mb-4 pt-5 title-page text-white">{{ __('Free Items') }}</h2>
        <h3 class="lead mb-5 text-white">{{ __('Download these files before they are gone') }}</h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-7 col-md-7 col-sm-12 mx-auto text-center mb-3 pb-3">
        <div class="countdown-timer">
                        <ul id="example">
                                <li class="pt-2 pb-1 mb-2"><span class="days">00</span><div>{{ __('days') }}</div></li>
                                <li class="pt-2 pb-1 mb-2"><span class="hours">00</span><div>{{ __('hours') }}</div></li>
                                <li class="pt-2 pb-1 mb-2"><span class="minutes">00</span><div>{{ __('minutes') }}</div></li>
		                        <li class="pt-2 pb-1 mb-2"><span class="seconds">00</span><div>{{ __('seconds') }}</div></li>
                           </ul>
               </div>
        </div>
    </div> 
</div>
</section><?php */?>
<div class="container py-5 mt-md-2 mb-2 flash-sale">
      <?php if(in_array('free-items',$top_ads)): ?>
      <div class="row">
          <div class="col-lg-12 mb-4" align="center">
             <?php echo html_entity_decode($addition_settings->top_ads); ?>
          </div>
       </div>   
       <?php endif; ?>
      <div class="row pt-2 mx-n2"  id="post-data">
        <?php echo $__env->make('free-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       </div>
       <div class="ajax-load text-center" style="display:none">
	   <p><img class="lazy" width="24" height="24" src="<?php echo e(url('/')); ?>/resources/views/theme/img/loader.gif"> <?php echo e(__('Loading More Items')); ?></p>
      </div>
      <?php if(in_array('free-items',$bottom_ads)): ?>
      <div class="row">
          <div class="col-lg-12 mb-4" align="center">
             <?php echo html_entity_decode($addition_settings->bottom_ads); ?>
          </div>
       </div>   
       <?php endif; ?>
    </div>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(!empty($allsettings->site_free_end_date)): ?>
	<script type="text/javascript">
            $('#example').countdown({
                date: '<?php echo e(date("m/d/Y H:i:s", strtotime($allsettings->site_free_end_date))); ?>',
                offset: -8,
                day: '<?php echo e(__('Day')); ?>',
                days: '<?php echo e(__('days')); ?>'
            }, function () {
              'use strict';
            });
    </script>
    <?php endif; ?>
</body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Script\resources\views/free-items.blade.php ENDPATH**/ ?>