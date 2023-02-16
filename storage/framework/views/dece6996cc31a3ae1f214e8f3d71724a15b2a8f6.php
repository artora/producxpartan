<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    
    <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->
    <?php if(Auth::user()->id == 1): ?>
    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(__('Vendors')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/add-vendor')); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> <?php echo e(__('Add Vendor')); ?></a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
         <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?php echo e(__('Vendors')); ?></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Sno')); ?></th>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <?php if($addition_settings->subscription_mode == 0): ?>
                                            <th><?php echo e(__('Email')); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo e(__('Photo')); ?></th>
                                            <?php if($addition_settings->subscription_mode == 1): ?>
                                            <th><?php echo e(__('Membership')); ?></th>
                                            <?php /*?><th>{{ __('Subscription Id') }}<br/><small>({{ __('localbank only') }})</small></th>
                                            <th>{{ __('Payment Approval') }}?<br/><small>({{ __('localbank only') }})</small></th><?php */?>
                                            <th><?php echo e(__('Account Verification')); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo e(__('Email Verified')); ?></th>
                                            <th><?php echo e(__('User Type')); ?></th>
                                            <th><?php echo e(__('Earnings')); ?></th>
                                            <?php if($addition_settings->subscription_mode == 1): ?>
                                            <th><?php echo e(__('Subscription Details')); ?></th> 
                                            <th><?php echo e(__('Payment Status')); ?></th>
                                            <?php endif; ?>
                                            <?php if($additional->conversation_mode == 1): ?>
                                            <th><?php echo e(__('Conversation')); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $no = 1; ?>
                                    <?php $__currentLoopData = $userData['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($user->username); ?></td>
                                            <?php if($addition_settings->subscription_mode == 0): ?>
                                            <td><?php echo e($user->email); ?></td>
                                            <?php endif; ?>
                                            <td><?php if($user->user_photo != ''): ?> <img class="lazy userphoto" width="50" height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user->user_photo); ?>"  alt="<?php echo e($user->name); ?>" /><?php else: ?> <img class="lazy userphoto" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  alt="<?php echo e($user->name); ?>" />  <?php endif; ?></td>
                                            <?php if($addition_settings->subscription_mode == 1): ?>
                                            <td><?php echo e($user->user_subscr_type); ?> <?php if($user->user_subscr_date < date('Y-m-d')): ?><span class="badge badge-danger"><?php echo e(__('expired')); ?></span><?php endif; ?></td>
                                            <?php /*?><td>@if($user->user_purchase_token != '') {{ $user->user_purchase_token }} @else <span>---</span> @endif</td>
                                            <td>@if($user->user_purchase_token != '') <a href="{{ URL::to('/admin/customer') }}/{{ $user->user_token }}/{{ $user->user_subscr_id }}" class="btn btn-success btn-sm" onClick="return confirm('{{ __('Are you sure you want to complete subscription payment') }}?');"><i class="fa fa-money"></i>&nbsp; {{ __('Waiting for approval') }}</a> @else <span>---</span> @endif</td><?php */?>
                                            <td><?php if($user->user_document_verified == 1): ?> <span class="badge badge-success"><?php echo e(__('verified')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(__('unverified')); ?></span> <?php endif; ?></td>
                                            <?php endif; ?>
                                            <td><?php if($user->verified == 1): ?> <span class="badge badge-success"><?php echo e(__('verified')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(__('unverified')); ?></span> <?php endif; ?></td>
                                            <td><?php if($user->exclusive_author == 1): ?> <span class="badge badge-success"><?php echo e(__('Exclusive User')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(__('Non Exclusive User')); ?></span> <?php endif; ?></td>
                                            
                                            <td><?php echo e(Helper::price_format($allsettings->site_currency_position,$user->earnings,"symbol")); ?></td>
                                            <?php if($addition_settings->subscription_mode == 1): ?>
                                            <td><a href="subscription-payment-details/<?php echo e($user->user_token); ?>" class="btn btn-info btn-sm"><i class="fa fa-id-card"></i> <?php echo e(__('view')); ?></a></td>
                                            <td><?php if($user->user_subscr_payment_status == 'completed'): ?> <span class="badge badge-success"><?php echo e(__('Completed')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(__('Pending')); ?></span> <?php endif; ?></td>
                                            <?php endif; ?>
                                            <?php if($additional->conversation_mode == 1): ?>
                                            <td><a href="conversation/<?php echo e($user->username); ?>" class="btn btn-primary btn-sm"><i class="fa fa-comments-o"></i> <?php echo e(__('Conversation')); ?></a></td>
                                            <?php endif; ?>
                                            <td><a href="edit-vendor/<?php echo e($user->user_token); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; <?php echo e(__('Edit')); ?></a>
                                            <?php if($demo_mode == 'on'): ?> 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;<?php echo e(__('Delete')); ?></a>
                                            <?php else: ?> 
                                            <a href="vendor/<?php echo e($user->user_token); ?>" class="btn btn-danger btn-sm" onClick="return confirm('<?php echo e(__('Are you sure you want to delete')); ?>?');"><i class="fa fa-trash"></i>&nbsp;<?php echo e(__('Delete')); ?></a><?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?> 
    <!-- Right Panel -->


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\Script\producxpartan\resources\views/admin/vendor.blade.php ENDPATH**/ ?>