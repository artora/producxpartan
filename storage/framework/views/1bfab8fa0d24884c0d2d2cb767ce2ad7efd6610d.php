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
                        <h1><?php echo e(__('Upload Item')); ?> - <?php echo e($type_name->item_type_name); ?></h1>
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
                                            <form action="<?php echo e(route('admin.fileupload')); ?>" class='dropzone' method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="item_token" value="">
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
                        <form action="<?php echo e(route('admin.upload-item')); ?>" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
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
                                                   @foreach($itemWell['type'] as $value) 
                                                    <option value="{{ $value->item_type_slug }}">{{ $value->item_type_name }}</option>
                                                   @endforeach  
                                                </select>
                                            </div><?php */?>
                                            
                                            <input type="hidden" name="item_type" value="<?php echo e($type_name->item_type_slug); ?>">
                                            <input type="hidden" name="type_id" value="<?php echo e($type_id); ?>">
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Item Name')); ?><span class="require">*</span> </label>
                                               <input type="text" id="item_name" name="item_name" class="form-control" data-bvalidator="required,maxlen[100]"> 
                                            
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Short Description')); ?><span class="require">*</span></label>
                                                <textarea name="item_shortdesc" rows="6"  class="form-control" data-bvalidator="required"></textarea>
                                            
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Description')); ?><span class="require">*</span></label>
                                                
                                            <textarea name="item_desc" id="summary-ckeditor" rows="6"  class="form-control" data-bvalidator="required"></textarea>
                                            </div>
                                            
                                           <?php if($additional->show_tags == 1): ?>
                                           <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Tags')); ?></label>
                                                <textarea name="item_tags" id="item_tags" class="form-control"></textarea>
                                                <small>(<?php echo e(__('Maximum of 15 keywords. Keywords should all be in lowercase and separated by commas. ex: shopping, blog, forum....ect')); ?>)</small>
                                            
                                            </div> 
                                            <?php endif; ?>
                                            <?php if($additional->show_feature_update == 1): ?>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Feature Update')); ?><span class="require">*</span></label>
                                                <select name="future_update" id="future_update" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1"><?php echo e(__('Yes')); ?></option>
                                                    <option value="0"><?php echo e(__('No')); ?></option>
                                                </select>
                                               
                                            </div>  
                                            <?php else: ?>
                                            <input type="hidden" name="future_update" value="0" />
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Select Category')); ?> <span class="require">*</span></label>
                                               <select name="item_category" id="item_category" class="form-control" data-bvalidator="required">
                                            <option value=""><?php echo e(__('Select')); ?></option>
                                            <?php $__currentLoopData = $re_categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="category_<?php echo e($menu->cat_id); ?>"><?php echo e($menu->category_name); ?></option>
                                                <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="subcategory_<?php echo e($sub_category->subcat_id); ?>"> - <?php echo e($sub_category->subcategory_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                                
                                            </div>
                                            
                                            <?php $__currentLoopData = $attribute['fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                           <?php if($additional->show_moneyback == 1): ?>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(__('Do you offer money back guarantee')); ?>? <span class="require">*</span></label>
                                                <select name="seller_money_back" id="seller_money_back" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1"><?php echo e(__('Yes')); ?></option>
                                                 <option value="0"><?php echo e(__('No')); ?></option>
                                                </select>
                                                
                                            </div>
                                            <div class="form-group" id="back_money">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('How many days to money back')); ?>? </label>
                                                <input type="text" id="seller_money_back_days" name="seller_money_back_days" class="form-control" data-bvalidator="min[1]">
                                                
                                            </div>
                                            <?php else: ?>
                                            <input type="hidden" name="seller_money_back" value="0" />
                                            <?php endif; ?>
                                            <?php if($additional->show_refund_term == 1): ?>
                                           <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Refund Terms')); ?></label>
                                                
                                            <textarea name="seller_refund_term" rows="6"  class="form-control"></textarea>
                                            </div>
                                            <?php else: ?>
                                            <input type="hidden" name="seller_refund_term" value="" />
                                            <?php endif; ?>
                                            <?php if($additional->show_demo_url == 1): ?>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Demo URL')); ?> </label>
                                                <input type="text" id="demo_url" name="demo_url" class="form-control" data-bvalidator="url">
                                                
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
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload Thumbnail')); ?> (<?php echo e(__('Size')); ?> : 80x80px) <span class="require">*</span> </label><br/>
                                           <select name="item_thumbnail1" id="item_thumbnail1" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getdata1['first']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                                
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload Preview')); ?> (<?php echo e(__('Size')); ?> : 361x230px) <span class="require">*</span> </label><br/>
                                               <select name="item_preview1" id="item_preview1" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getdata2['second']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                           
                                            </div>
                                            
                                            
                                            <?php if($additional->show_screenshots == 1): ?>
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload Screenshots (multiple)')); ?> (<?php echo e(__('Size')); ?> : 750x430px) </label><br/>
                                                <select id="item_screenshot1" name="item_screenshot[]" class="form-control" multiple>
                                                <?php $__currentLoopData = $getdata4['four']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                
                                           
                                            </div>
                                            <?php endif; ?>
                                            <?php if($additional->show_video == 1): ?>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Preview Type (optional)')); ?> </label>
                                               <select name="video_preview_type1" id="video_preview_type1" class="form-control">
                                                <option value=""></option>
                                                    <option value="youtube"><?php echo e(__('Youtube')); ?></option>
                                                    <option value="mp4"><?php echo e(__('MP4')); ?></option>
                                                    <option value="mp3"><?php echo e(__('MP3')); ?></option>
                                                </select>
                                            </div>
                                            
                                            
                                            <div class="form-group" id="youtube">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Youtube Video URL')); ?> <span class="require">*</span></label>
                                                
                                                <input type="text" id="video_url1" name="video_url1" class="form-control" data-bvalidator="required">
                                                 <small>(<?php echo e(__('example')); ?> : https://www.youtube.com/watch?v=C0DPdy98e4c)</small>
                                            </div>
                                            
                                            <div class="form-group" id="mp4">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload MP4 Video')); ?> <span class="require">*</span></label><br/>
                                                <select id="video_file1" name="video_file1" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getdata5['five']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div> 
                                            
                                            <div class="form-group" id="mp3">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload MP3')); ?> <span class="require">*</span></label><br/>
                                                <select id="audio_file1" name="audio_file1" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getdata6['six']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>  
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Upload Main File Type')); ?> <span class="require">*</span></label>
                                               <select name="file_type1" id="file_type1" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="file"><?php echo e(__('File')); ?></option>
                                                    <option value="link"><?php echo e(__('Link / URL')); ?></option>
                                                    <option value="serial"><?php echo e(__('License Keys / Serial Numbers')); ?></option>
                                                </select>
                                            </div>
                                            
                                            
                                            
                                            <div class="form-group" id="main_file">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Upload Main File')); ?>  (<?php echo e(__('ZIP - All files')); ?>)<span class="require">*</span> </label><br/>
                                                <select name="item_file1" id="item_file1" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getdata3['third']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($get->item_file_name); ?>"><?php echo e($get->original_file_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                
                                           
                                            </div>  
                                            
                                            <div class="form-group" id="main_link">
                                                <label for="name" class="control-label mb-1">Main File Link/URL <span class="require">*</span></label>
                                                <input type="text" id="item_file_link1" name="item_file_link1" class="form-control" data-bvalidator="required,url">
                                                
                                            </div>
                                            
                                            
                                           </div>
                                           
                                           <div class="form-group" id="main_delimiter">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Delimiter')); ?> <span class="require">*</span></label>
                                               <select name="item_delimiter" id="item_delimiter1" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="comma"><?php echo e(__('Comma')); ?></option>
                                                    <option value="newline"><?php echo e(__('New Line')); ?></option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group" id="main_serials">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Serials List')); ?> <span class="require">*</span></label>
                                                <textarea name="item_serials_list" id="item_serials_list" rows="6"  class="form-control" data-bvalidator="required"></textarea>
                                            <small id="hint_line" class="require">(<?php echo e(__('Enter available license / serials keys, one per line')); ?>)<br/></small>
                                            <small id="hint_comma" class="require">(<?php echo e(__('Enter available license / serials keys, separated by comma')); ?>)</small>
                                            </div>
                                           <?php if($additional->show_free_download == 1): ?>
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Apply For Free Download?')); ?> <span class="require">*</span></label>
                                               <select name="free_download" id="free_download" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1"><?php echo e(__('Yes')); ?></option>
                                                    <option value="0"><?php echo e(__('No')); ?></option>
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
                                                    <option value="1"><?php echo e(__('Yes')); ?></option>
                                                    <option value="0"><?php echo e(__('No')); ?></option>
                                                </select>
                                               
                                            </div> 
                                            <?php else: ?>
                                            <input type="hidden" name="item_support" value="0" />
                                            <?php endif; ?>
                                            <div class="form-group" id="pricebox_left">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Regular License')); ?> (<?php echo e($additional->regular_license); ?> <?php echo e(__('Support')); ?>) <span class="require">*</span></label>
                                                <input type="text" id="regular_price" name="regular_price"  class="form-control" data-bvalidator="digit,min[1],required">
                                                (<?php echo e($allsettings->site_currency); ?>)
                                            </div>  
                                            
                                            <?php if($additional->show_extended_license == 1): ?>
                                            <div class="form-group" id="pricebox_right">
                                                <label for="name" class="control-label mb-1"><?php echo e(__('Extended License')); ?> (<?php echo e($additional->extended_license); ?> <?php echo e(__('Support')); ?>)</label>
                                                
                                                <input type="text" id="extended_price" name="extended_price" class="form-control" data-bvalidator="digit,min[1]">
                                                (<?php echo e($allsettings->site_currency); ?>)
                                            </div>
                                            <?php else: ?>
                                            <input type="hidden" name="extended_price" value="0">
                                            <?php endif; ?>
                                             
                                            <?php if($addition_settings->subscription_mode == 1): ?>   
                                             <div class="form-group" id="subscription_box">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(__('Subscription Item')); ?>? <span class="require">*</span></label>
                                                <select name="subscription_item" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1"><?php echo e(__('Yes')); ?></option>
                                                <option value="0"><?php echo e(__('No')); ?></option>
                                                </select>
                                                <small>(<?php echo e(__("if 'Yes' means subscription user will allowed free download this product")); ?>)</small>
                                            </div>                                                                              
                                            <?php else: ?>
                                            <input type="hidden" name="subscription_item" value="0">
                                            <?php endif; ?>
                                            
                                            
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(__('Vendor')); ?> <span class="require">*</span></label>
                                                <select name="user_id" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $getvendor['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->username); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                
                                            </div> 
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(__('Allow Seo')); ?>? <span class="require">*</span></label>
                                                <select name="item_allow_seo" id="page_allow_seo" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1"><?php echo e(__('Yes')); ?></option>
                                                <option value="0"><?php echo e(__('No')); ?></option>
                                                </select>
                                             </div>
                                            
                                          <div id="ifseo">
                                     <div class="form-group">
                                           <label for="site_keywords" class="control-label mb-1"><?php echo e(__('SEO Meta Keywords')); ?> (<?php echo e(__('max 160 chars')); ?>) <span class="require">*</span></label>
                                            <textarea name="item_seo_keyword" id="page_seo_keyword" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"></textarea>
                                       </div> 
                                       <div class="form-group">
                                           <label for="site_desc" class="control-label mb-1"><?php echo e(__('SEO Meta Description')); ?> (<?php echo e(__('max 160 chars')); ?>) <span class="require">*</span></label>
                                              <textarea name="item_seo_desc" id="page_seo_desc" rows="4" class="form-control noscroll_textarea" data-bvalidator="required,maxlen[160]"></textarea>
                                            </div>
                                          </div>
                                                
                                             
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> <?php echo e(__('Status')); ?> <span class="require">*</span></label>
                                                <select name="item_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1"><?php echo e(__('Approved')); ?></option>
                                                <option value="0"><?php echo e(__('UnApproved')); ?></option>
                                                </select>
                                                
                                            </div>   
                                            
                                            
                                           
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
	$(document).ready(function(){
	'use strict';
	$("#mp4").hide();
	$("#youtube").hide();
	$("#mp3").hide();	
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
<?php /**PATH C:\xampp\htdocs\Script\producxpartan\resources\views/admin/upload-item.blade.php ENDPATH**/ ?>