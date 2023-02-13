<script src="<?php echo e(asset('resources/views/theme/js/vendor.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/theme/js/theme.min.js')); ?>"></script>
<?php if($message = Session::get('success')): ?>
<script type="text/javascript">
$('#cart-toast-success').toast('show')
</script>
<?php endif; ?>
<?php if($message = Session::get('error')): ?>
<script type="text/javascript">
$('#cart-toast-error').toast('show')
</script>
<?php endif; ?>
<!-- print --->
<script src="<?php echo e(asset('resources/views/theme/print/jQuery.print.js')); ?>"></script>
<script type='text/javascript'>
$(function() {
'use strict';
$("#printable").find('.print').on('click', function() {
$.print("#printable");
});
});
function myFunction() {
  'use strict'; 
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  
}
function meFunction() {
  'use strict';
  document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  "use strict";
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
$(document).ready(function(){
    $("#hint_comma").hide();
	$("#hint_line").hide();
    $('#seller_money_back').on('change', function() {
      if ( this.value == '1')
      {
        $("#back_money").show();
      }
      else
      {
        $("#back_money").hide();
      }
    });
	$('#file_type1').on('change', function() {
      if ( this.value == 'file')
      {
        $("#main_file").show();
		$("#main_link").hide();
		$("#main_delimiter").hide();
		$("#main_serials").hide();
		
      }
      else if(this.value == 'link')
      {
        $("#main_file").hide();
		$("#main_link").show();
		$("#main_delimiter").hide();
		$("#main_serials").hide();
      }
	  else if(this.value == 'serial')
	  {
	    $("#main_file").hide();
		$("#main_link").hide();
		$("#main_delimiter").show();
		$("#main_serials").show();
		$("#free_download option[value='0']").prop('selected', true); 
		$("#item_support option[value='1']").prop('selected', true);
	  }
	  else
	  {
	    $("#main_file").hide();
		$("#main_link").hide();
		$("#main_delimiter").hide();
		$("#main_serials").hide();
	  }
    });
	$('#item_delimiter1').on('change', function() {
      if ( this.value == 'comma')
      {
	     $("#hint_comma").show();
		 $("#hint_line").hide();
	  }
	  else if ( this.value == 'newline')
	  {
	     $("#hint_comma").hide();
		 $("#hint_line").show();
	  }
	  else
	  {
	     $("#hint_comma").hide();
		 $("#hint_line").hide();
	  }
	 });
	$('#free_download').on('change', function() {
      if ( this.value == '0')
      {
	    $("#item_support option[value='1']").prop('selected', true);
        $("#pricebox").show();
		$("#pricebox_left").show();
		$("#pricebox_right").show();
		$("#subscription_box").show();
      }
      else
      {
	    
		$("#item_support option[value='0']").prop('selected', true);  
        $("#pricebox").hide();
		$("#pricebox_left").hide();
		$("#pricebox_right").hide();
		$("#subscription_box").hide();
      }
    });
	$('#item_support').on('change', function() {
      if ( this.value == '1')
      {
	    $("#free_download option[value='0']").prop('selected', true); 
        $("#pricebox").show();
		$("#pricebox_left").show();
		$("#pricebox_right").show();
		$("#subscription_box").show();
      }
      else
      {
	    
		$("#free_download option[value='1']").prop('selected', true);  
        $("#pricebox").hide();
		$("#pricebox_left").hide();
		$("#pricebox_right").hide();
		$("#subscription_box").hide();
      }
    });
	
});
</script> 
<!-- print --->
<!-- pagination --->
<script src="<?php echo e(URL::to('resources/views/theme/pagination/pagination.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
	'use strict';
      $(this).cPager({
            pageSize: <?php echo e($allsettings->site_post_per_page); ?>, 
            pageid: "post-pager", 
            itemClass: "li-item",
			pageIndex: 1
 
        });
	$(this).cPager({
            pageSize: <?php echo e($allsettings->site_comment_per_page); ?>, 
            pageid: "commpager", 
            itemClass: "commli-item",
			pageIndex: 1
 
        });	
		
	$(this).cPager({
            pageSize: <?php echo e($allsettings->site_review_per_page); ?>, 
            pageid: "reviewpager", 
            itemClass: "review-item",
			pageIndex: 1
 
        });	
		
	$(this).cPager({
            pageSize: <?php echo e($allsettings->site_item_per_page); ?>, 
            pageid: "itempager", 
            itemClass: "prod-item",
			pageIndex: 1
 
        });	
});
</script>
<!--- pagination --->
<!-- share code -->
<script src="<?php echo e(asset('resources/views/theme/share/share.js')); ?>"></script> 
<script type="text/javascript">
$(document).ready(function(){
        'use strict';
		$('.share-button').simpleSocialShare();

	});
</script> 
<!-- share code -->
<!-- validation code -->
<script src="<?php echo e(URL::to('resources/views/theme/validate/jquery.bvalidator.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/validate/themes/presenters/default.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/validate/themes/red/red.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        'use strict';
		var options = {
		
		offset:              {x:5, y:-2},
		position:            {x:'left', y:'center'},
        themes: {
            'red': {
                 showClose: true
            },
		
        }
    };

    $('#login_form').bValidator(options);
	$('#contact_form').bValidator(options);
	$('#subscribe_form').bValidator(options);
	$('#footer_form').bValidator(options);
	$('#comment_form').bValidator(options);
	$('#reset_form').bValidator(options);
	$('#support_form').bValidator(options);
	$('#item_form').bValidator(options);
	$('#search_form').bValidator(options);
	$('#checkout_form').bValidator(options);
	$('#profile_form').bValidator(options);
	$('#withdrawal_form').bValidator(options);
    });
</script>
<!-- validation code -->
<!-- ckeditor -->
<script src="<?php echo e(url('vendor/tinymce/jquery.tinymce.min.js')); ?>"></script>
<script src="<?php echo e(url('vendor/tinymce/tinymce.min.js')); ?>"></script>
<script>
  tinymce.init({
    
	selector: '#summary-ckeditor', 
    
	image_class_list: [
            {title: 'Responsive', value: 'img-fluid'},
            ],
			width: '100%',
            height: 480,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: [
		'newdocument | print preview | searchreplace | undo redo | link unlink anchor image media | alignleft aligncenter alignright alignjustify | code',
		'formatselect fontselect fontsizeselect | bold italic underline strikethrough | forecolor backcolor',
		'removeformat | hr pagebreak | charmap subscript superscript insertdatetime | bullist numlist | outdent indent blockquote | table'
	    ],
            menubar : false,
            image_title: true,
            automatic_uploads: true,
            images_upload_url: "<?php echo e(url('/upload')); ?>",
            file_picker_types: 'image',
			relative_urls : false,
			remove_script_host : false,
			convert_urls : false,
			branding: false,
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
    
	
    
 
  
  });
  
  tinymce.init({
    
	selector: '#summary-ckeditor2', 
    
	image_class_list: [
            {title: 'Responsive', value: 'img-fluid'},
            ],
			width: '100%',
            height: 480,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: [
		'newdocument | print preview | searchreplace | undo redo | link unlink anchor image media | alignleft aligncenter alignright alignjustify | code',
		'formatselect fontselect fontsizeselect | bold italic underline strikethrough | forecolor backcolor',
		'removeformat | hr pagebreak | charmap subscript superscript insertdatetime | bullist numlist | outdent indent blockquote | table'
	    ],
            menubar : false,
            image_title: true,
            automatic_uploads: true,
            images_upload_url: "<?php echo e(url('/upload')); ?>",
            file_picker_types: 'image',
			relative_urls : false,
			remove_script_host : false,
			convert_urls : false,
			branding: false,
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
    
	
    
 
  
  });
  
  
</script>
<!-- ckeditor -->
<script src="<?php echo e(asset('resources/views/admin/template/dragdrop/js/jquery.filer.min.js')); ?>" type="text/javascript"></script>
<?php /*?><script src="{{ asset('resources/views/admin/template/dragdrop/js/custom.js') }}" type="text/javascript"></script><?php */?>
<!-- countdown -->
<script type="text/javascript" src="<?php echo e(asset('resources/views/theme/countdown/jquery.countdown.js?v=1.0.0.0')); ?>"></script>
<!-- countdown -->
<!--- video code --->
<script type="text/javascript" src="<?php echo e(URL::to('resources/views/theme/video/video.js')); ?>"></script>
<script type="text/javascript">
		jQuery(function(){
		'use strict';
			jQuery("a.popupvideo").YouTubePopUp( { autoplay: 0 } ); // Disable autoplay
		});
</script>
<!--  video code --->
<!--- auto search -->
<script src="<?php echo e(URL::to('resources/views/theme/autosearch/jquery-ui.js')); ?>"></script>
<script type="text/javascript">
   $(document).ready(function() {
   'use strict';
   var src = "<?php echo e(route('searchajax')); ?>";
     $("#product_item").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    response(data);
                   
                }
            });
        },
        minLength: 1,
       
    });
});
</script>
<script type="text/javascript">
   $(document).ready(function() {
    'use strict';
    var src = "<?php echo e(route('searchajax')); ?>";
     $("#product_item_top").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    response(data);
                   
                }
            });
        },
        minLength: 1,
       
    });
});
</script>
<!--- auto search -->
<!--- common code -->
<script type="text/javascript">
$(document).ready(function() {
  'use strict';
  var $tabButtonItem = $('#tab-button li'),
      $tabSelect = $('#tab-select'),
      $tabContents = $('.tab-contents'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });

/* Reply comment area js goes here */
    var $replyForm = $('.reply-comment'),
        $replylink = $('.reply-link');

    $replyForm.hide();
    $replylink.on('click', function (e) {
        e.preventDefault();
        $(this).parents('.media').siblings('.reply-comment').toggle().find('textarea').focus();
    });

}); 


$(function () {
'use strict';
$("#ifstripe").hide();
$("#ifpaystack").hide();
$("#iflocalbank").hide();
$("#ifpaypal").hide();
$("#ifpayfast").hide();
$("#ifpaytm").hide();
$("#ifupi").hide();
$("#ifskrill").hide();
$("#ifcrypto").hide();
$("input[name='withdrawal']").click(function () {
		
            if ($("#withdrawal-paypal").is(":checked")) 
			{
			   $("#ifpaypal").show();
			   $("#ifpaytm").hide();
			   $("#ifupi").hide();
			   $("#ifskrill").hide();
			   $("#iflocalbank").hide();
			   $("#ifpayfast").hide();
			   $("#ifstripe").hide();
			   $("#ifpaystack").hide();
			   $("#ifcrypto").hide();
			}
			else if ($("#withdrawal-stripe").is(":checked"))
			{
			  $("#ifstripe").show();
			  $("#ifpaytm").hide();
			  $("#ifupi").hide();
			  $("#ifskrill").hide();
			  $("#iflocalbank").hide();
			  $("#ifpayfast").hide();
			  $("#ifpaypal").hide();
			  $("#ifpaystack").hide();
			  $("#ifcrypto").hide();
			}
			else if ($("#withdrawal-paystack").is(":checked"))
			{
			  $("#ifpaystack").show();
			  $("#ifpaytm").hide();
			  $("#ifupi").hide();
			  $("#ifskrill").hide();
			  $("#iflocalbank").hide();
			  $("#ifpayfast").hide();
			  $("#ifpaypal").hide();
			  $("#ifstripe").hide();
			  $("#ifcrypto").hide();
			  
			}
			else if ($("#withdrawal-localbank").is(":checked"))
			{
			   $("#iflocalbank").show();
			   $("#ifpaytm").hide();
			   $("#ifupi").hide();
			   $("#ifskrill").hide();
			   $("#ifpayfast").hide();
			   $("#ifpaypal").hide();
			   $("#ifstripe").hide();
			   $("#ifpaystack").hide();
			   $("#ifcrypto").hide();
			}
			else if ($("#withdrawal-payfast").is(":checked"))
			{
			  $("#ifpayfast").show();
			  $("#ifpaytm").hide();
			  $("#ifupi").hide();
			  $("#ifskrill").hide();
			  $("#ifpaystack").hide();
			  $("#iflocalbank").hide();
			  $("#ifpaypal").hide();
			  $("#ifstripe").hide();
			  $("#ifcrypto").hide();
			  
			}
			else if ($("#withdrawal-paytm").is(":checked"))
			{
			  $("#ifpaytm").show();
			  $("#ifupi").hide();
			  $("#ifskrill").hide();
			  $("#ifpayfast").hide();
			  $("#ifpaypal").hide();
			  $("#ifstripe").hide();
			  $("#ifpaystack").hide();
			  $("#iflocalbank").hide();
			  $("#ifcrypto").hide();
			  
			}
			else if ($("#withdrawal-UPI").is(":checked"))
			{
			  $("#ifupi").show();
			  $("#ifskrill").hide();
			  $("#ifpaytm").hide();
              $("#ifpayfast").hide();
			  $("#ifpaypal").hide();
			  $("#ifstripe").hide();
			  $("#ifpaystack").hide();
			  $("#iflocalbank").hide();
			  $("#ifcrypto").hide();
			}
			else if ($("#withdrawal-skrill").is(":checked"))
			{
			  $("#ifskrill").show();
			  $("#ifpaytm").hide();
              $("#ifupi").hide();
              $("#ifpayfast").hide();
			  $("#ifpaypal").hide();
			  $("#ifstripe").hide();
			  $("#ifpaystack").hide();
			  $("#iflocalbank").hide();
			  $("#ifcrypto").hide();
			  
			}
			else if ($("#withdrawal-crypto").is(":checked"))
			{
			  $("#ifcrypto").show();
			  $("#ifskrill").hide();
			  $("#ifpaytm").hide();
              $("#ifupi").hide();
              $("#ifpayfast").hide();
			  $("#ifpaypal").hide();
			  $("#ifstripe").hide();
			  $("#ifpaystack").hide();
			  $("#iflocalbank").hide();
			  
			}
			else
			{
			$("#ifpaypal").hide();
			$("#ifstripe").hide();
			$("#ifpaystack").hide();
			$("#iflocalbank").hide();
			$("#ifpayfast").hide();
			$("#ifpaytm").hide();
            $("#ifupi").hide();
            $("#ifskrill").hide();
			$("#ifcrypto").hide();
			}
		});
    });
</script>
<!--- common code -->
<?php if($view_name == 'confirm-subscription'): ?>
<!-- stripe code -->
<script src="https://js.stripe.com/v3/"></script>
<?php if($allsettings->stripe_type == "intents"): ?>
<script type="text/javascript">
$(function () {
'use strict';
$("#ifYes").hide();
        $("input[name='payment_method']").click(function () {
		
            if ($("#opt1-stripe").is(":checked")) {
                $("#ifYes").show();
var publishable_key = '<?php echo e($stripe_publish_key); ?>';

// Create a Stripe client.
var stripe = Stripe(publishable_key);
  
// Create an instance of Elements.
var elements = stripe.elements();
  
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
	
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};
  
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
  
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
  
// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});
  
// Handle form submission.
var form = document.getElementById('checkout_form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
  
    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
        }
    });
});
  
// Submit the form with the token ID.
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('checkout_form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
  
    // Submit the form
    form.submit();
}


} else {
                $("#ifYes").hide();
            }
        });
    });
</script>
<?php else: ?>
<script type="text/javascript">
$(function () {
'use strict';
$("#ifYes").hide();
        $("input[name='payment_method']").click(function () {
		
            if ($("#opt1-stripe").is(":checked")) {
                $("#ifYes").show();
				
				/* stripe code */
				
				var stripe = Stripe('<?php echo e($stripe_publish_key); ?>');
   
				var elements = stripe.elements();
					
				var style = {
				base: {
					color: '#32325d',
					lineHeight: '18px',
					fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
					fontSmoothing: 'antialiased',
					fontSize: '14px',
					'::placeholder': {
					color: '#aab7c4'
					}
				},
				invalid: {
					color: '#fa755a',
					iconColor: '#fa755a'
				}
				};
			 
				
				var card = elements.create('card', {style: style, hidePostalCode: true});
			 
				
				card.mount('#card-element');
			 
			   
				card.addEventListener('change', function(event) {
					var displayError = document.getElementById('card-errors');
					if (event.error) {
						displayError.textContent = event.error.message;
					} else {
						displayError.textContent = '';
					}
				});
			 
				
				var form = document.getElementById('checkout_form');
				form.addEventListener('submit', function(event) {
					/*event.preventDefault();*/
			        if ($("#opt1-stripe").is(":checked")) { event.preventDefault(); }
					stripe.createToken(card).then(function(result) {
					
						if (result.error) {
						
						var errorElement = document.getElementById('card-errors');
						errorElement.textContent = result.error.message;
						
						
						} else {
							
							document.querySelector('.token').value = result.token.id;
							 
							document.getElementById('checkout_form').submit();
						}
						/*document.querySelector('.token').value = result.token.id;
							 
							document.getElementById('checkout_form').submit();*/
						
					});
				});
							
						
			/* stripe code */	
				
				
				
            } else {
                $("#ifYes").hide();
            }
        });
    });
	

</script>
<?php endif; ?>
<!-- stripe code -->
<?php endif; ?>
<!-- cookie -->
<script type="text/javascript" src="<?php echo e(asset('resources/views/theme/cookie/cookiealert.js')); ?>"></script>
<!-- cookie -->
<!-- loading gif code -->
<?php if($allsettings->site_loader_display == 1): ?>
<script type='text/javascript' src="<?php echo e(URL::to('resources/views/theme/loader/jquery.LoadingBox.js')); ?>"></script>
<script>
    $(function(){
	'use strict';
        var lb = new $.LoadingBox({loadingImageSrc: "<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_loader_image); ?>",});

        setTimeout(function(){
            lb.close();
        }, 1000);
    });
</script>
<?php endif; ?>
<!-- loading gif code -->
<!-- animation code -->
<script src="<?php echo e(URL::to('resources/views/theme/animate/aos.js')); ?>"></script>
<script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
</script>
<!-- animation code -->
<script type="text/javascript" src="<?php echo e(URL::to('resources/views/admin/template/datepicker/picker.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
'use strict';
$("#coupon_start_date").datepicker({
     minDate: 0, dateFormat: 'yy-mm-dd',
    onSelect: function (selected) {
      var dt = new Date(selected);
      dt.setDate(dt.getDate() + 1);
 $("#coupon_end_date").datepicker("option", "minDate", dt);
}                                 
});
  $("#coupon_end_date").datepicker({
    minDate: 0, dateFormat: 'yy-mm-dd',
    onSelect: function (selected) {
      var dt1 = new Date(selected);
      dt1.setDate(dt1.getDate() - 1);
      $("#coupon_start_date").datepicker("option", "maxDate", dt1);
    }
  });
});
</script>
<?php if($additional->site_tawk_chat != ""): ?>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='<?php echo e($additional->site_tawk_chat); ?>';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<?php endif; ?>
<script src="<?php echo e(URL::to('resources/views/admin/template/dropzone/min/dropzone.min.js')); ?>" type="text/javascript"></script>
<!-- google analytics -->
<?php if($allsettings->google_analytics!= ""): ?>
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', '<?php echo e($allsettings->google_analytics); ?>', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
<?php endif; ?>
<!-- google analytics -->
<script type="text/javascript">
	$(document).ready(function(){
	'use strict';		
     $("#page_allow_seo").change(function () {
            if ($(this).val() == "1") {
                $("#ifseo1").show();
				$("#ifseo2").show();
            } else {
                $("#ifseo1").hide();
				$("#ifseo2").hide();
            }
        });
		
		
});
</script>
<script src="<?php echo e(URL::to('resources/views/theme/mp3/mediastyler.js')); ?>"></script>
<script type="text/javascript">
    $(function () {
      $('audio, video').stylise();
    });
</script>
<script type="text/javascript">
	var page = 1;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});

	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#post-data").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
</script>
<script src="<?php echo e(URL::to('resources/views/theme/lazy/jquery.lazyload.js?v=1.9.1')); ?>"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
     'use strict';
     $("img.lazy").lazyload();
     
  });
</script>
<?php if($additional->shop_search_type == 'ajax'): ?>
<script src="<?php echo e(asset('resources/views/theme/filter/jplist.core.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/theme/filter/jplist.sort-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/theme/filter/jplist.sort-buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/theme/filter/jplist.textbox-filter.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/theme/filter/jplist.filter-toggle-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/theme/filter/jplist.pagination-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/theme/filter/jplist.filter-dropdown-bundle.min.js')); ?>"></script>
<script type="text/javascript">
        $('document').ready(function(){

            $('#demo').jplist({
                itemsBox: '.list'
                ,itemPath: '.list-item'
                ,panelPath: '.jplist-panel'

            });
        });
</script>
<?php if(!empty($minprice_count) && !empty($maxprice_count)): ?> 
<script type="text/javascript">
  function showProducts(minPrice, maxPrice) 
  {
    $(".items .list-item").hide().filter(function() 
	{
        var price = parseInt($(this).data("price"), 10);
        return price >= minPrice && price <= maxPrice;
    }).show();
  }

$(function() 
{
    var options = 
	{
        range: true,
        min: <?php echo e($allsettings->site_range_min_price); ?>,
        max: <?php echo e($allsettings->site_range_max_price); ?>,
        values: [<?php echo e($allsettings->site_range_min_price); ?>, <?php echo e($allsettings->site_range_max_price); ?>],
        slide: function(event, ui) {
            var min = ui.values[0],
                max = ui.values[1];

            $("#amount").val("<?php echo e($allsettings->site_currency); ?> " + min + " - <?php echo e($allsettings->site_currency); ?> " + max);
            showProducts(min, max);
       }
    }, min, max;

    $("#slider-range").slider(options);

    min = $("#slider-range").slider("values", 0);
    max = $("#slider-range").slider("values", 1);

    $("#amount").val("<?php echo e($allsettings->site_currency); ?> " + min + " - <?php echo e($allsettings->site_currency); ?> " + max);

    showProducts(min, max);
});
</script>
<?php endif; ?>
<?php endif; ?>
<?php if($additional->header_layout == 'layout_two'): ?>
<?php if($current_locale == 'ar'): ?>
<script src="<?php echo e(asset('resources/views/theme/menu/rtl_main.js')); ?>"></script>
<?php else: ?>
<script src="<?php echo e(asset('resources/views/theme/menu/main.js')); ?>"></script>
<?php endif; ?>
<?php endif; ?>
<?php if($additional->disable_view_source == 1): ?>
<script type="text/javascript">
$(document).ready(function(){
     $(document).bind("contextmenu",function(e){
        return false;
    });
	
});
document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
			 e.keyCode === 73 ||
             e.keyCode === 117)) {
            return false;
        }
		else if(e.keyCode == 123) {
            return false;
        }
		else {
            return true;
        }
};
$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});
</script>
<?php endif; ?>
<?php if($additional->site_custom_js != ""): ?>
<script type="text/javascript">
$(document).ready(function () 
{
<?php echo $additional->site_custom_js; ?>

});
</script>
<?php endif; ?> <?php /**PATH D:\xampp\htdocs\fickrr\resources\views/script.blade.php ENDPATH**/ ?>