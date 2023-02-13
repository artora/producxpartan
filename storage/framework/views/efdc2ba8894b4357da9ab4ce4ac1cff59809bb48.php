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
    <?php if(in_array('items',$avilable)): ?>
    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(__('Items')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        
                        <ol class="breadcrumb text-right">
                            <a href="<?php echo e(url('/admin/products-import-export')); ?>" class="btn btn-primary btn-sm"><i class="fa fa-file-excel-o"></i> <?php echo e(__('Product Import / Export')); ?></a>&nbsp;
                            <a href="<?php echo e(url('/admin/trash-items')); ?>" class="btn btn-danger btn-sm"><i class="fa fa-location-arrow"></i> <?php echo e(__('Trash Items')); ?></a>
                            &nbsp;
                            <button onClick="myFunction()" class="btn btn-success btn-sm dropbtn"><i class="fa fa-plus"></i> <?php echo e(__('Add Item')); ?></button>
                            <div id="myDropdown" class="dropdown-content">
                                <?php $__currentLoopData = $viewitem['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $encrypted = $encrypter->encrypt($item_type->item_type_id); ?>
                                <a href="<?php echo e(URL::to('/admin/upload-item')); ?>/<?php echo e($encrypted); ?>"><?php echo e($item_type->item_type_name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            
                            
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
                    <div class="col-md-3 ml-auto">
                    <form action="<?php echo e(route('admin.items')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                    <input id="search" name="search" type="text" class="move-bars" value="<?php echo e($search); ?>" placeholder="<?php echo e(__('Item Name')); ?>">
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Search
                    </button>
                    
                    </div>
                    </form>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?php echo e(__('Items')); ?></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export-items" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Sno')); ?></th>
                                            <th width="50"><?php echo e(__('Item Image')); ?></th>
                                            <th width="100"><?php echo e(__('Item Name')); ?></th>
                                            <th  width="100"><?php echo e(__('Featured Item')); ?>?</th>
                                            <th  width="40"><?php echo e(__('Free Item')); ?>?</th>
                                            <th><?php echo e(__('Flash Request')); ?>?</th>
                                            <th><?php echo e(__('Subscription Item')); ?>?</th>
                                            <th><?php echo e(__('Vendor')); ?></th>
                                            <th><?php echo e(__('Status')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php if($item->item_thumbnail != ''): ?> <img class="lazy" width="50" height="50" src="<?php echo e(Helper::Image_Path($item->item_thumbnail,'no-image.png')); ?>"  alt="<?php echo e($item->item_name); ?>"/><?php else: ?> <img class="lazy" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($item->item_name); ?>" />  <?php endif; ?></td>
                                            <td><a href="<?php echo e(url('/item')); ?>/<?php echo e($item->item_slug); ?>" target="_blank" class="black-color"><?php echo e(mb_substr($item->item_name, 0, 50, 'UTF-8')); ?></a></td>
                                            <td><?php if($item->item_featured == 'no'): ?> <?php echo e(__('No')); ?> <?php else: ?> <?php echo e(__('Yes')); ?> <?php endif; ?> <a href="items/<?php echo e($item->item_featured); ?>/<?php echo e($item->item_token); ?>" style="font-size:12px; color:#0000FF; text-decoration:underline;"><?php echo e(__('Can you change')); ?></a></td>
                                            <td><?php if($item->free_download == 1): ?> <span class="badge badge-success"><?php echo e(__('Yes')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(__('No')); ?></span> <?php endif; ?></td>
                                            <td><?php if($item->item_flash_request == 1): ?> <?php if($item->item_flash == 0): ?> <span class="badge badge-danger"><?php echo e(__('Waiting for approval')); ?></span> <?php else: ?> <span class="badge badge-success"><?php echo e(__('Approved')); ?></span> <?php endif; ?> <?php else: ?> <span>---</span> <?php endif; ?></td>
                                            <td><?php if($item->subscription_item == 1): ?> <span class="badge badge-success"><?php echo e(__('Yes')); ?></span> <?php else: ?> <span class="badge badge-danger"><?php echo e(__('No')); ?></span> <?php endif; ?></td>
                                            <td><a href="<?php echo e(url('/user')); ?>/<?php echo e($item->username); ?>" target="_blank" class="black-color"><?php echo e($item->username); ?></a></td>
                                            <td><?php if($item->item_status == 1): ?> <span class="badge badge-success"><?php echo e(__('Approved')); ?></span> <?php elseif($item->item_status == 2): ?> <span class="badge badge-danger"><?php echo e(__('Rejected')); ?></span> <?php else: ?> <span class="badge badge-warning"><?php echo e(__('UnApproved')); ?></span> <?php endif; ?></td>
                                            <td><a href="edit-item/<?php echo e($item->item_token); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; <?php echo e(__('Edit')); ?></a> 
                                            <?php if($demo_mode == 'on'): ?> 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;<?php echo e(__('Trash')); ?></a>
                                            <a href="demo-mode" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp;<?php echo e(__('Download Item')); ?></a>
                                            <?php else: ?>
                                            <a href="items/<?php echo e($item->item_token); ?>" class="btn btn-danger btn-sm" onClick="return confirm('<?php echo e(__('Are you sure you want to remove')); ?>?');"><i class="fa fa-trash"></i>&nbsp;<?php echo e(__('Trash')); ?></a>
                                            <a href="download/<?php echo e($item->item_token); ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp;<?php echo e(__('Download')); ?></a>
                                            <?php endif; ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                    </tbody>
                                </table>
                                <div>
                                <?php echo e($itemData['item']->links('pagination::bootstrap-4')); ?>

                                </div>
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
<?php /**PATH C:\xampp\htdocs\Script\resources\views/admin/items.blade.php ENDPATH**/ ?>