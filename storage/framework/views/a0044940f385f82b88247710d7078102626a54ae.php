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
                        <h1><?php echo e(__('Edit Item')); ?> - <?php echo e($type_name->item_type_name); ?></h1>
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
                       
                          <div class="col-md-12">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                          <div class="form-group">
                                            <label for="name" class="control-label mb-1"><?php echo e(__('Files')); ?> <?php if($demo_mode == 'on'): ?><span class="require">- This is Demo version. So Maximum 1MB Allowed</span><?php endif; ?></label>
                                            <form action="<?php echo e(route('admin.fileupload')); ?>" class='dropzone' enctype="multipart/form-data">
                                            <input type="hidden" name="item_token" value="<?php echo e($edit['item']->item_token); ?>">
                                            </form>
                                            <label class="control-label mb-1"><?php echo e(__('Allowed Files')); ?> (jpeg, jpg, png, webp, zip, mp3, mp4)</label>
                                            </div>
                                          </div>
                                     </div>
                                 </div>
                             </div>
                       
                           <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                           <form action="<?php echo e(route('admin.edit-item')); ?>" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>
                          
                           
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        <?php /*?><div class="form-group">
                                                <label for="name" class="control-label mb-1">Item Type <span class="require">*</span></label>
                                               
                                                <select name="item_type" id="item_type" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                   @foreach($getWell['type'] as $value)
                                                    
                                                    <option value="{{ $value->item_type_slug }}" @if($edit['item']->item_type == $value->item_type_slug) selected="selected" @endif>{{ $value->item_type_name }}</option>
                                                   @endforeach 
                                                </select>
                                            </div><?php */?>
                                            
                                             <input type="hidden" name="item_type" value="<?php echo e($edit['item']->item_type); ?>">
                                            <input type="hidden" name="type_id" value="<?php echo e($edit['item']->item_type_id); ?>">
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Item Name')); ?><span class="require">*</span></label>
                                               <input type="text" id="item_name" name="item_name" class="form-control" value="<?php echo e($edit['item']->item_name); ?>" data-bvalidator="required,maxlen[100]"> 
                                            
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Short Description')); ?><span class="require">*</span></label>
                                                <textarea name="item_shortdesc" rows="6"  class="form-control" data-bvalidator="required"><?php echo e($edit['item']->item_shortdesc); ?></textarea>
                                            
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Description')); ?><span class="require">*</span></label>
                                                
                                            <textarea name="item_desc" id="summary-ckeditor" rows="6"  class="form-control" data-bvalidator="required"><?php echo e(html_entity_decode($edit['item']->item_desc)); ?></textarea>
                                            </div>
                                                
                                            
                                            
                                            
                                           <?php if($additional->show_tags == 1): ?>
                                           <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Tags')); ?></label>
                                                <textarea name="item_tags" id="item_tags" class="form-control"><?php echo e($edit['item']->item_tags); ?></textarea>
                                                <small>(<?php echo e(__('Maximum of 15 keywords. Keywords should all be in lowercase and separated by commas. ex: shopping, blog, forum....ect')); ?>)</small>
                                            
                                            </div> 
                                            <?php endif; ?>
                                            <?php if($additional->show_feature_update == 1): ?>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Feature Update')); ?><span class="require">*</span></label>
                                                <select name="future_update" id="future_update" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" <?php if($edit['item']->future_update == 1): ?> selected="selected" <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                    <option value="0" <?php if($edit['item']->future_update == 0): ?> selected="selected" <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                               
                                            </div>  
                                            <?php else: ?>
                                            <input type="hidden" name="future_update" value="0" />
                                            <?php endif; ?>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Select Category')); ?> <span class="require">*</span></label>
                                               <select name="item_category" id="item_category" class="form-control" data-bvalidator="required">
                                            <option value="">Select</option>
                                            <?php $__currentLoopData = $re_categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <option value="category_<?php echo e($menu->cat_id); ?>" <?php if($cat_name == 'category'): ?> <?php if($menu->cat_id == $cat_id): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($menu->category_name); ?></option>
                                                <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="subcategory_<?php echo e($sub_category->subcat_id); ?>" <?php if($cat_name == 'subcategory'): ?> <?php if($sub_category->subcat_id == $cat_id): ?> selected="selected" <?php endif; ?> <?php endif; ?>> - <?php echo e($sub_category->subcategory_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                                
                                            </div>
                                            <?php if(count($attribute['fields']) != 0): ?>
                                            <?php $__currentLoopData = $attri_field['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e($attribute_field->attr_label); ?> <span class="require">*</span></label>
                                                <?php 
                                                $field_value=explode(',',$attribute_field->attr_field_value); 
                                                $checkpackage=explode(',',$attribute_field->item_attribute_values);
                                                ?>
                                                <?php if($attribute_field->attr_field_type == 'multi-select'): ?>
                                                <select  name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" multiple="multiple" data-bvalidator="required">
                                                <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($field); ?>" <?php if(in_array($field,$checkpackage)): ?> selected="selected" <?php endif; ?>><?php echo e($field); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'single-select'): ?>
                                                <select name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" data-bvalidator="required">
                                                  <option value=""></option>
                                                  <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($field); ?>" <?php if($attribute_field->item_attribute_values == $field): ?> selected <?php endif; ?>><?php echo e($field); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'textbox'): ?>
                                                <input name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" type="text" class="form-control" data-bvalidator="required">
                                                <?php endif; ?>
                                                
                                            </div>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php else: ?>
                                          <?php $__currentLoopData = $attri_field['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e($attribute_field->attr_label); ?> <span class="require">*</span></label>
                                                <?php $field_value=explode(',',$attribute_field->attr_field_value); ?>
                                                <?php if($attribute_field->attr_field_type == 'multi-select'): ?>
                                                <select  name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" multiple="multiple" data-bvalidator="required">
                                                <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($field); ?>"><?php echo e($field); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'single-select'): ?>
                                                <select name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" data-bvalidator="required">
                                                  <option value=""></option>
                                                  <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($field); ?>"><?php echo e($field); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'textbox'): ?>
                                                <input name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" type="text" class="form-control" data-bvalidator="required">
                                                <?php endif; ?>
                                                
                                            </div>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php endif; ?>
                                          <?php if($additional->show_moneyback == 1): ?>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(__('Do you offer money back guarantee')); ?>? <span class="require">*</span></label>
                                                <select name="seller_money_back" id="seller_money_back" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['item']->seller_money_back == 1): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                 <option value="0" <?php if($edit['item']->seller_money_back == 0): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                                
                                            </div>
                                            <div id="back_money" <?php if($edit['item']->seller_money_back == 1): ?> class="form-group display-block" <?php else: ?>  class="form-group display-none" <?php endif; ?>>
                                                <label for="name" class="control-label mb-1"><?php echo e(__('How many days to money back')); ?>? </label>
                                                <input type="text" id="seller_money_back_days" name="seller_money_back_days" class="form-control" data-bvalidator="min[1]" value="<?php echo e($edit['item']->seller_money_back_days); ?>">
                                                
                                            </div>
                                            <?php else: ?>
                                            <input type="hidden" name="seller_money_back" value="0" />
                                            <?php endif; ?>
                                            <?php if($additional->show_refund_term == 1): ?> 
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Refund Terms')); ?></label>
                                                
                                            <textarea name="seller_refund_term" rows="6"  class="form-control"><?php echo e($edit['item']->seller_refund_term); ?></textarea>
                                            </div>
                                            <?php else: ?>
                                            <input type="hidden" name="seller_refund_term" value="" />
                                            <?php endif; ?>
                                            <?php if($additional->show_demo_url == 1): ?>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Demo URL')); ?></label>
                                                <input type="text" id="demo_url" name="demo_url" class="form-control" value="<?php echo e($edit['item']->demo_url); ?>" data-bvalidator="url">
                                                
                                            </div>
                                            <?php endif; ?>
                                           
                                    </div>
                                </div>

                            </div>
                            </div>
                             
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div id="display_message"></div>
                                       <div id="hide_message">
                                        <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload Thumbnail')); ?> (<?php echo e(__('Size')); ?> : 80x80px)<span class="require">*</span> </label><br/>
                                                <select name="item_thumbnail1" id="item_thumbnail1" class="form-control" <?php if($edit['item']->item_thumbnail == ''): ?> data-bvalidator="required" <?php endif; ?>>
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getdata1['first']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                        <?php if($edit['item']->item_thumbnail!=''): ?>
                                        <img class="lazy item-thumb" width="50" height="50" src="<?php echo e(Helper::Image_Path($edit['item']->item_thumbnail ,'no-image.png')); ?>"  alt="<?php echo e($edit['item']->item_name); ?>">
                                        <?php else: ?>
                                        <img class="lazy item-thumb" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($edit['item']->item_name); ?>">
                                        <?php endif; ?>
                                           
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload Preview')); ?> (<?php echo e(__('Size')); ?> : 361x230px)<span class="require">*</span> </label><br/>
                                                <select name="item_preview1" id="item_preview1" class="form-control" <?php if($edit['item']->item_preview == ''): ?> data-bvalidator="required" <?php endif; ?>>
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getdata2['second']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                
                                        <?php if($edit['item']->item_preview!=''): ?>
                                        <img class="lazy item-thumb" width="50" height="50" src="<?php echo e(Helper::Image_Path($edit['item']->item_preview ,'no-image.png')); ?>"  alt="<?php echo e($edit['item']->item_name); ?>">
                                        <?php else: ?>
                                        <img class="lazy item-thumb" width="50" height="50" src="<?php echo e(url('/')); ?>/public/img/no-image.png"  alt="<?php echo e($edit['item']->item_name); ?>">
                                        <?php endif; ?>
                                           
                                            </div>
                                            
                                            
                                            <?php if($additional->show_screenshots == 1): ?>
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload Screenshots (multiple)')); ?> (<?php echo e(__('Size')); ?> : 750x430px)</label><br/>
                                                <select id="item_screenshot1" name="item_screenshot[]" class="form-control" multiple>
                                                <?php $__currentLoopData = $getdata4['four']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__currentLoopData = $item_image['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <div class="item-img"><img class="lazy item-thumb" width="50" height="50" src="<?php echo e(Helper::Image_Path($item->item_image ,'no-image.png')); ?>"  alt="<?php echo e($item->item_image); ?>">
                                                    <a href="<?php echo e(url('/admin/edit-item')); ?>/dropimg/<?php echo e(base64_encode($item->itm_id)); ?>" onClick="return confirm('<?php echo e(__('Are you sure you want to delete')); ?>?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
                                                    </div>
                                                    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <div class="clearfix"></div>
                                            </div> 
                                            <?php endif; ?>
                                            <?php if($additional->show_video == 1): ?>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Preview Type (optional)')); ?> </label>
                                               <select name="video_preview_type1" id="video_preview_type1" class="form-control">
                                                <option value=""></option>
                                                    <option value="youtube" <?php if($edit['item']->video_preview_type == 'youtube'): ?> selected <?php endif; ?>><?php echo e(__('Youtube')); ?></option>
                                                    <option value="mp4" <?php if($edit['item']->video_preview_type == 'mp4'): ?> selected <?php endif; ?>><?php echo e(__('MP4')); ?></option>
                                                    <option value="mp3" <?php if($edit['item']->video_preview_type == 'mp3'): ?> selected <?php endif; ?>><?php echo e(__('MP3')); ?></option>
                                                </select>
                                            </div>
                                            
                                            <div id="youtube" <?php if($edit['item']->video_preview_type == 'youtube'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Youtube Video URL')); ?> <span class="require">*</span></label>
                                                
                                                <input type="text" id="video_url1" name="video_url1" class="form-control" value="<?php echo e($edit['item']->video_url); ?>" data-bvalidator="required">
                                        <small>(<?php echo e(__('example')); ?> : https://www.youtube.com/watch?v=C0DPdy98e4c)</small>
                                            </div>
                                            
                                            <div id="mp4" <?php if($edit['item']->video_preview_type == 'mp4'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload MP4 Video')); ?> <span class="require">*</span></label><br/>
                                                <select id="video_file1" name="video_file1" class="form-control" <?php if($edit['item']->video_file == ''): ?> data-bvalidator="required" <?php endif; ?>>
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getdata5['five']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <span class="require"><?php echo e($edit['item']->video_file); ?></span>
                                            </div> 
                                            <div id="mp3" <?php if($edit['item']->video_preview_type == 'mp3'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload MP3')); ?> <span class="require">*</span></label><br/>
                                                <select id="audio_file1" name="audio_file1" class="form-control" <?php if($edit['item']->audio_file == ''): ?> data-bvalidator="required" <?php endif; ?>>
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getdata6['six']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <span class="require"><?php echo e($edit['item']->audio_file); ?></span>
                                            </div> 
                                            <?php endif; ?>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload Main File Type <span class="require">*</span></label>
                                               <select name="file_type1" id="file_type1" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="file" <?php if($edit['item']->file_type == 'file'): ?> selected <?php endif; ?>>File</option>
                                                    <option value="link" <?php if($edit['item']->file_type == 'link'): ?> selected <?php endif; ?>>Link/URL</option>
                                                    <option value="serial" <?php if($edit['item']->file_type == 'serial'): ?> selected <?php endif; ?>><?php echo e(__('License Keys / Serial Numbers')); ?></option>
                                                </select>
                                            </div>
                                            
                                            <div id="main_file" <?php if($edit['item']->file_type == 'file'): ?> class="form-group display-block" <?php else: ?>  class="form-group display-none" <?php endif; ?>>
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload Main File')); ?> (<?php echo e(__('ZIP - All files')); ?>)<span class="require">*</span> </label><br/>
                                                <select name="item_file1" id="item_file1" class="form-control" <?php if($edit['item']->item_file == ''): ?> data-bvalidator="required" <?php endif; ?>>
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getdata3['third']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <span class="require"><?php echo e($edit['item']->item_file); ?></span>
                                            </div>  
                                            
                                            <div id="main_link" <?php if($edit['item']->file_type == 'link'): ?> class="form-group display-block" <?php else: ?>  class="form-group display-none" <?php endif; ?>>
                                                <label for="name" class="control-label mb-1">Main File Link/URL <span class="require">*</span></label>
                                                <input type="text" id="item_file_link1" name="item_file_link1" class="form-control" data-bvalidator="required,url" value="<?php echo e($edit['item']->item_file_link); ?>">
                                                
                                            </div>
                                       </div>
                                        
                                        
                                           <div id="main_delimiter" <?php if($edit['item']->file_type == 'serial'): ?> class="form-group display-block" <?php else: ?>  class="form-group display-none" <?php endif; ?>>
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Delimiter')); ?> <span class="require">*</span></label>
                                               <select id="item_delimiter1" name="item_delimiter"  class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="comma" <?php if($edit['item']->item_delimiter == 'comma'): ?> selected <?php endif; ?>><?php echo e(__('Comma')); ?></option>
                                                    <option value="newline" <?php if($edit['item']->item_delimiter == 'newline'): ?> selected <?php endif; ?>><?php echo e(__('New Line')); ?></option>
                                                </select>
                                            </div>
                                            
                                            <div id="main_serials" <?php if($edit['item']->file_type == 'serial'): ?> class="form-group display-block" <?php else: ?>  class="form-group display-none" <?php endif; ?>>
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Serials List')); ?> <span class="require">*</span></label>
                                                <textarea id="item_serials_list" name="item_serials_list"  rows="6"  class="form-control" data-bvalidator="required"><?php echo e($edit['item']->item_serials_list); ?></textarea>
                                            <small id="hint_line"  class="require">(<?php echo e(__('Enter available license / serials keys, one per line')); ?>)<br/></small>
                                            <small id="hint_comma" class="require">(<?php echo e(__('Enter available license / serials keys, separated by comma')); ?>)</small>
                                            </div>
                                           
                                           <?php if($additional->show_free_download == 1): ?>
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Apply For Free Download?')); ?> <span class="require">*</span></label>
                                               <select name="free_download" id="free_download" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" <?php if($edit['item']->free_download == 1): ?> selected="selected" <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                    <option value="0" <?php if($edit['item']->free_download == 0): ?> selected="selected" <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                                <small>(<?php echo e(__("if 'Yes' means all user will allowed free download this product")); ?>)</small>
                                            </div>
                                           <?php else: ?>
                                           <input type="hidden" name="free_download" value="0" />
                                           <?php endif; ?>
                                           <?php if($additional->show_item_support == 1): ?>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Item Support')); ?> <span class="require">*</span></label>
                                                <select name="item_support" id="item_support" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" <?php if($edit['item']->item_support == 1): ?> selected="selected" <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                    <option value="0" <?php if($edit['item']->item_support == 0): ?> selected="selected" <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                               
                                            </div>
                                            <?php else: ?>
                                            <input type="hidden" name="item_support" value="0" />
                                            <?php endif; ?> 
                                            <div id="pricebox_left" <?php if($edit['item']->item_support == 1): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Regular License')); ?> (<?php echo e($additional->regular_license); ?> <?php echo e(__('Support')); ?>) <span class="require">*</span></label>
                                                <input type="text" id="regular_price" name="regular_price"  class="form-control" value="<?php echo e($edit['item']->regular_price); ?>" data-bvalidator="digit,min[1],required">
                                                (<?php echo e($allsettings->site_currency); ?>)
                                            </div>  
                                            
                                            <?php if($additional->show_extended_license == 1): ?>
                                            <div id="pricebox_right" <?php if($edit['item']->item_support == 1): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Extended License')); ?> (<?php echo e($additional->extended_license); ?> <?php echo e(__('Support')); ?>) </label>
                                                
                                                <input type="text" id="extended_price" name="extended_price" class="form-control" value="<?php if($edit['item']->extended_price==0): ?> <?php else: ?> <?php echo e($edit['item']->extended_price); ?> <?php endif; ?>" data-bvalidator="digit,min[1]">
                                                (<?php echo e($allsettings->site_currency); ?>)
                                            </div>
                                            <?php else: ?>
                                            <input type="hidden" name="extended_price" value="0">
                                            <?php endif; ?> 
                                            <?php if($addition_settings->subscription_mode == 1): ?>   
                                             <div id="subscription_box" <?php if($edit['item']->item_support == 1): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(__('Subscription Item')); ?>? <span class="require">*</span></label>
                                                <select name="subscription_item" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['item']->subscription_item == 1): ?> selected="selected" <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php if($edit['item']->subscription_item == 0): ?> selected="selected" <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                                <small>(<?php echo e(__("if 'Yes' means subscription user will allowed free download this product")); ?>)</small>
                                            </div>                                                                              
                                            <?php else: ?>
                                            <input type="hidden" name="subscription_item" value="0">
                                            <?php endif; ?>
                                            <?php if($edit['item']->item_flash_request == 1): ?>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(__('Flash Sale')); ?> <span class="require">*</span></label>
                                                <select name="item_flash" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['item']->item_flash == 1): ?> selected="selected" <?php endif; ?>><?php echo e(__('Active')); ?></option>
                                                <option value="0" <?php if($edit['item']->item_flash == 0): ?> selected="selected" <?php endif; ?>><?php echo e(__('InActive')); ?></option>
                                                
                                                </select>
                                                
                                            </div> 
                                            <?php else: ?>
                                            <input type="hidden" name="item_flash" value="0">
                                            <?php endif; ?>
                                            
                                                                                                                          
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(__('Allow Seo')); ?>? <span class="require">*</span></label>
                                                <select name="item_allow_seo" id="page_allow_seo" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['item']->item_allow_seo == 1): ?> selected <?php endif; ?>><?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php if($edit['item']->item_allow_seo == 0): ?> selected <?php endif; ?>><?php echo e(__('No')); ?></option>
                                                </select>
                                             </div>
                                            
                                          <div id="ifseo" <?php if($edit['item']->item_allow_seo == 1): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                     <div class="form-group">
                                           <label for="site_keywords" class="control-label mb-1"><?php echo e(__('SEO Meta Keywords')); ?> (<?php echo e(__('max 160 chars')); ?>) <span class="require">*</span></label>
                                            <textarea name="item_seo_keyword" id="page_seo_keyword" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"><?php echo e($edit['item']->item_seo_keyword); ?></textarea>
                                       </div> 
                                       <div class="form-group">
                                           <label for="site_desc" class="control-label mb-1"><?php echo e(__('SEO Meta Description')); ?> (<?php echo e(__('max 160 chars')); ?>) <span class="require">*</span></label>
                                              <textarea name="item_seo_desc" id="page_seo_desc" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"><?php echo e($edit['item']->item_seo_desc); ?></textarea>
                                            </div>
                                          </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(__('Status')); ?> <span class="require">*</span></label>
                                                <select name="item_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['item']->item_status == 1): ?> selected="selected" <?php endif; ?>><?php echo e(__('Approved')); ?></option>
                                                <option value="0" <?php if($edit['item']->item_status == 0): ?> selected="selected" <?php endif; ?>><?php echo e(__('UnApproved')); ?></option>
                                                <option value="2" <?php if($edit['item']->item_status == 2): ?> selected="selected" <?php endif; ?>><?php echo e(__('Rejected')); ?></option>
                                                </select>
                                                
                                            </div>   
                                        <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">    
                                        <input type="hidden" name="save_file" value="<?php echo e($edit['item']->item_file); ?>">
                                        <input type="hidden" name="save_thumbnail" value="<?php echo e($edit['item']->item_thumbnail); ?>">
                                        <input type="hidden" name="save_preview" value="<?php echo e($edit['item']->item_preview); ?>">
                                        <input type="hidden" name="save_extended_price" value="<?php echo e($edit['item']->extended_price); ?>">
                                        <input type="hidden" name="item_token" value="<?php echo e($edit['item']->item_token); ?>">
                                        <input type="hidden" name="save_video_file" value="<?php echo e($edit['item']->video_file); ?>">
                                        <input type="hidden" name="save_audio_file" value="<?php echo e($edit['item']->audio_file); ?>">
                                        <input type="hidden" name="save_file_type" value="<?php echo e($edit['item']->file_type); ?>">
                                        <input type="hidden" name="save_item_delimiter" value="<?php echo e($edit['item']->item_delimiter); ?>">
                                        <input type="hidden" name="save_video_preview_type" value="<?php echo e($edit['item']->video_preview_type); ?>">
                                        <input type="hidden" name="save_video_url" value="<?php echo e($edit['item']->video_url); ?>">  
                                           
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
        </div>
        
        
        <!-- .content -->


    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->


<?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.zone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript">
	$(document).ready(function()
	{
	$('#video_preview_type1').on('change', function() {
      if ( this.value == 'youtube')
      
      {
	     $("#youtube").show();
		 $("#mp4").hide();
		 $("#mp3").hide();
	  }	
	  else if ( this.value == 'mp4')
	  {
	     $("#mp4").show();
		 $("#youtube").hide();
		 $("#mp3").hide();
	  }
	  else if ( this.value == 'mp3')
	  {
	     $("#mp3").show();
	     $("#mp4").hide();
		 $("#youtube").hide();
	  }
	  else
	  {
	      $("#mp4").hide();
		  $("#youtube").hide();
		  $("#mp3").hide();
	  }
	  
	 });
});
</script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Script\producxpartan\resources\views/admin/edit-item.blade.php ENDPATH**/ ?>