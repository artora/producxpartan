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
    <?php if(in_array('settings',$avilable)): ?>
    <div id="right-panel" class="right-panel">

       
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(__('Item Features')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
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


<?php if($errors->any()): ?>
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
         <?php echo e($error); ?>

      
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                           <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                           <form action="<?php echo e(route('admin.item-features')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                           
                                            <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(__('Display screenshots')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="show_screenshots" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" <?php if($additional->show_screenshots == 1): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php if($additional->show_screenshots == 0): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                              </div>
                                            
                                            <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(__('Display video')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="show_video" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" <?php if($additional->show_video == 1): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php if($additional->show_video == 0): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                              </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(__('Display moneyback')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="show_moneyback" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" <?php if($additional->show_moneyback == 1): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php if($additional->show_moneyback == 0): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                              </div>
                                              
                                              
                                              <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(__('Display Demo Url')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="show_demo_url" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" <?php if($additional->show_demo_url == 1): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php if($additional->show_demo_url == 0): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                              </div>
                                              
                                              
                                              <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(__('Extended License Display')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="show_extended_license" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" <?php if($additional->show_extended_license == 1): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php if($additional->show_extended_license == 0): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                              </div>
                                              
                                              
                                              <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(__('Display Refund Terms')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="show_refund_term" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" <?php if($additional->show_refund_term == 1): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php if($additional->show_refund_term == 0): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                              </div>
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                             
                             
                                           <?php /*?><div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1">{{ __('Display Free Download') }}<span class="require">*</span></label><br/>
                                               
                                                <select name="show_free_download" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" @if($additional->show_free_download == 1) selected @endif>{{ __('Yes') }}</option>
                                                <option value="0" @if($additional->show_free_download == 0) selected @endif>{{ __('No') }}</option>
                                                </select>
                                              </div> <?php */?> 
                                              
                                              <input type="hidden" name="show_free_download" value="1">  
                                            
                                            <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(__('Display Flash Sale')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="show_flash_sale" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" <?php if($additional->show_flash_sale == 1): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php if($additional->show_flash_sale == 0): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                              </div> 
                                              
                                              
                                              <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(__('Display Tags')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="show_tags" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" <?php if($additional->show_tags == 1): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php if($additional->show_tags == 0): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                              </div> 
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1"><?php echo e(__('Display Feature Update')); ?><span class="require">*</span></label><br/>
                                               
                                                <select name="show_feature_update" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" <?php if($additional->show_feature_update == 1): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php if($additional->show_feature_update == 0): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                              </div> 
                                              
                                              
                                              <?php /*?><div class="form-group">
                                                <label for="site_loader_display" class="control-label mb-1">{{ __('Display Item Support') }}<span class="require">*</span></label><br/>
                                               
                                                <select name="show_item_support" class="form-control" required>
                                                <option value=""></option>
                                                
                                                <option value="1" @if($additional->show_item_support == 1) selected @endif>{{ __('Yes') }}</option>
                                                <option value="0" @if($additional->show_item_support == 0) selected @endif>{{ __('No') }}</option>
                                                </select>
                                              </div><?php */?>
                                            <input type="hidden" name="show_item_support" value="1">
                                           <input type="hidden" name="sid" value="1">
                             
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
                             </div>
                             
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> <?php echo e(__('Submit')); ?></button>
                                 <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?> </button>
                             </div>
                             
                             </div>
                             
                            
                            </form>
                            
                                                    
                                                    
                                                 
                            
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
<?php /**PATH C:\xampp\htdocs\Script\producxpartan\resources\views/admin/item-features.blade.php ENDPATH**/ ?>