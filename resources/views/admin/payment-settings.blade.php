<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    @include('admin.stylesheet')
</head>

<body>
    
    @include('admin.navigation')

    <!-- Right Panel -->
    @if(in_array('settings',$avilable))
    <div id="right-panel" class="right-panel">

       
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ __('Payment Settings') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
        @if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif


@if ($errors->any())
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     @foreach ($errors->all() as $error)
      
         {{$error}}
      
     @endforeach
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
     </div>
    </div>   
 @endif

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       
                        
                        
                      
                        <div class="card">
                           @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                           <form action="{{ route('admin.payment-settings') }}" method="post" id="setting_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                          @endif
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Exclusive Author Commission') }} ({{ __('Percentage') }} %) <span class="require">*</span></label>
                                                <input id="site_exclusive_commission" name="site_exclusive_commission" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_exclusive_commission }}" required><small>({{ __('if admin set 10% so vendor get 90% of earning amount') }})</small>
                                            </div>
                                            
                                           
                                          <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Non Exclusive Author Commission') }} ({{ __('Percentage') }} %) <span class="require">*</span></label>
                                                <input id="site_non_exclusive_commission" name="site_non_exclusive_commission" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_non_exclusive_commission }}" required><small>({{ __('if admin set 10% so vendor get 90% of earning amount') }})</small>
                                            </div> 
                                           
                                            
                                            
                                         <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Minium withdrawal amount') }} ({{ $setting['setting']->site_currency }})<span class="require">*</span></label>
                                                <input id="site_minimum_withdrawal" name="site_minimum_withdrawal" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_minimum_withdrawal }}" required>
                                            </div>    
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Per Sale Referral Commission') }} {{ __('Type') }}<span class="require">*</span></label>
                                                <select name="per_sale_referral_commission_type" id="per_sale_referral_commission_type" class="form-control" required>
                                                <option value=""></option>
                                                <option value="fixed" @if($additional['setting']->per_sale_referral_commission_type == 'fixed') selected @endif>{{ __('Fixed') }}</option>
                                                <option value="percentage" @if($additional['setting']->per_sale_referral_commission_type == 'percentage') selected @endif>{{ __('Percentage') }}</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Per Sale Referral Commission') }} <span id="nfixed" @if($additional['setting']->per_sale_referral_commission_type == 'fixed') class="inline-block" @else  class="display-none" @endif>({{ $setting['setting']->site_currency }})</span><span id="npercentage" @if($additional['setting']->per_sale_referral_commission_type == 'percentage') class="inline-block" @else  class="display-none" @endif>(%)</span><span class="require">*</span></label>
                                                <input id="per_sale_referral_commission" name="per_sale_referral_commission" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->per_sale_referral_commission }}"  required>
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
                                    
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Processing Fee') }} ({{ __('extra fee') }}) {{ __('Type') }}<span class="require">*</span></label>
                                                <select name="site_extra_fee_type" id="site_extra_fee_type" class="form-control" required>
                                                <option value=""></option>
                                                <option value="fixed" @if($additional['setting']->site_extra_fee_type == 'fixed') selected @endif>{{ __('Fixed') }}</option>
                                                <option value="percentage" @if($additional['setting']->site_extra_fee_type == 'percentage') selected @endif>{{ __('Percentage') }}</option>
                                                </select>
                                            </div>
                             
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Processing Fee') }} ({{ __('extra fee') }}) <span id="iffixed" @if($additional['setting']->site_extra_fee_type == 'fixed') class="inline-block" @else  class="display-none" @endif>({{ $setting['setting']->site_currency }})</span><span id="ifpercentage" @if($additional['setting']->site_extra_fee_type == 'percentage') class="inline-block" @else  class="display-none" @endif>(%)</span><span class="require">*</span></label>
                                                <input id="site_extra_fee" name="site_extra_fee" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_extra_fee }}" required><small>({{ __('if you will set "0" processing fee is OFF') }})</small>
                                            </div>
                                            
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Sign Up') }} {{ __('Referral Commission') }} <span class="require">*</span></label>
                                                <input id="site_referral_commission" name="site_referral_commission" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_referral_commission }}"  required>
                                            </div>
                                            
                                            
                                            
                              
                                                
                                                
                                                <input type="hidden" name="sid" value="1">
                             
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
                             </div>
                             
                             
                             
                             <div style="clear:both;"></div>
                             
                             
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Admin Payment Methods') }} </label><br/>
                                                @foreach($payment_option as $payment)
                                                <input id="payment_option" name="payment_option[]" type="checkbox" @if(in_array($payment,$get_payment)) checked @endif class="noscroll_textarea" value="{{ $payment }}"> {{ $payment }} <br/>
                                                @endforeach
                                             </div>
                                            
                                      
                                        
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Vendor Payment Methods') }} </label><br/>
                                                @foreach($vendor_payment_option as $payment)
                                                <input id="vendor_payment_option" name="vendor_payment_option[]" type="checkbox" @if(in_array($payment,$get_vendor_payment)) checked @endif class="noscroll_textarea" value="{{ $payment }}"> {{ $payment }} <br/>
                                                @endforeach
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
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Withdraw Methods') }} </label><br/>
                                                @foreach($withdraw_option as $withdraw)
                                                <input id="withdraw_option" name="withdraw_option[]" type="checkbox" @if(in_array($withdraw->withdrawal_key,$get_withdraw)) checked @endif class="noscroll_textarea" value="{{ $withdraw->withdrawal_key }}"> {{ $withdraw->withdrawal_name }}<br/>
                                                @endforeach
                                             </div>
                                            
                                          
                                                
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                             
                             
                             <div class="col-md-12"><div class="card-body"><h4>{{ __('Paypal Settings') }}</h4></div></div>
                             
                             
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Paypal Email ID') }} </label><br/>
                                               <input id="paypal_email" name="paypal_email" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->paypal_email }}" required>
                                                
                                                
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
                                       
                                        
                                            
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Paypal Mode') }} </label><br/>
                                               
                                                <select name="paypal_mode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->paypal_mode == 1) selected @endif>{{ __('Live') }}</option>
                                                <option value="0" @if($setting['setting']->paypal_mode == 0) selected @endif>{{ __('Demo') }}</option>
                                                </select>
                                                
                                             </div>
                                            
                                          
                                                
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                             
                             
                             
                            <?php /*?><input type="hidden" name="two_checkout_mode" value="{{ $setting['setting']->two_checkout_mode }}">
                            <input type="hidden" name="two_checkout_account" value="{{ $setting['setting']->two_checkout_account }}">
                            <input type="hidden" name="two_checkout_publishable" value="{{ $setting['setting']->two_checkout_publishable }}">
                            <input type="hidden" name="two_checkout_private" value="{{ $setting['setting']->two_checkout_private }}"><?php */?>
                             <div class="col-md-12"><div class="card-body"><h4>{{ __('2checkout Settings') }}</h4>
                             
                             </div></div>
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('2checkout Mode') }} <span class="require">*</span></label><br/>
                                               
                                                <select name="two_checkout_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="true" @if($setting['setting']->two_checkout_mode == 'true') selected @endif>{{ __('Live') }}</option>
                                                <option value="false" @if($setting['setting']->two_checkout_mode == 'false') selected @endif>{{ __('Demo') }}</option>
                                                </select>
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('2Checkout Account Number') }} <span class="require">*</span></label><br/>
                                               <input id="two_checkout_account" name="two_checkout_account" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->two_checkout_account }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                             
                                             <br/>
                                             <p>{{ __('2checkout callback url') }} : <code>{{ url('/') }}/2checkout-success</code> <br/> <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" class="blue-color">{{ __('How to configure callback url') }}?</a></p>
                                            
                                      
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            


                            
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('2Checkout Publishable Key') }} <span class="require">*</span></label><br/>
                                               <input id="two_checkout_publishable" name="two_checkout_publishable" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->two_checkout_publishable }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('2Checkout Private Key') }} <span class="require">*</span></label><br/>
                                               <input id="two_checkout_private" name="two_checkout_private" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->two_checkout_private }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                             
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                             <div class="col-md-12"><div class="card-body"><h4>{{ __('Paystack Settings') }}</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Paystack Public Key') }} <span class="require">*</span></label><br/>
                                               <input id="paystack_public_key" name="paystack_public_key" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->paystack_public_key }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Paystack Secret Key') }} <span class="require">*</span></label><br/>
                                               <input id="paystack_secret_key" name="paystack_secret_key" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->paystack_secret_key }}" data-bvalidator="required">
                                                
                                                
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
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Paystack Merchant Email') }}  <span class="require">*</span></label><br/>
                                               <input id="paystack_merchant_email" name="paystack_merchant_email" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->paystack_merchant_email }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4>{{ __('Bank Settings') }}</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    
                                    <div class="form-group">
                                              <div style="height:0px;"></div>
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Local Bank Details') }} <span class="require">*</span></label><br/>
                                               <textarea name="local_bank_details" class="form-control noscroll_textarea" data-bvalidator="required" rows="5" cols="20">{{ $setting['setting']->local_bank_details }}</textarea>
                                                
                                                
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
                                    
                                    
                                    
                                    <div class="form-group">
                                              <div style="height:0px;"></div>
                                                
                                             </div>
                                             <div class="form-group">
                                               <strong>{{ __('example') }}:<br/><br/>

                                                {{ __('Bank Name') }} : Test Bank<br/>
                                                {{ __('Branch Name') }} : Test Branch<br/>
                                                {{ __('Branch Code') }} : 00000<br/>
                                                {{ __('IFSC Code') }} : 63632EF</strong>
                                              </div>
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                             
                             <div class="col-md-12"><div class="card-body"><h4>Razorpay Settings</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Razorpay Key Id <span class="require">*</span></label><br/>
                                               <input id="razorpay_key" name="razorpay_key" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->razorpay_key }}" data-bvalidator="required">
                                                
                                                
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
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Razorpay Secret Key <span class="require">*</span></label><br/>
                                               <input id="razorpay_secret" name="razorpay_secret" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->razorpay_secret }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                             <div class="col-md-12"><div class="card-body"><h4>Payhere Settings</h4></div></div>
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Payhere Mode </label><br/>
                                               
                                                <select name="payhere_mode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" @if($additional['setting']->payhere_mode == 1) selected @endif>{{ __('Live') }}</option>
                                                <option value="0" @if($additional['setting']->payhere_mode == 0) selected @endif>{{ __('Demo') }}</option>
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
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Payhere Merchant Id <span class="require">*</span></label><br/>
                                               <input id="payhere_merchant_id" name="payhere_merchant_id" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->payhere_merchant_id }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4>Payumoney Settings</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Payumoney Mode </label><br/>
                                               
                                                <select name="payumoney_mode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" @if($additional['setting']->payumoney_mode == 1) selected @endif>{{ __('Live') }}</option>
                                                <option value="0" @if($additional['setting']->payumoney_mode == 0) selected @endif>{{ __('Demo') }}</option>
                                                </select>
                                                
                                             </div>
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Payumoney Merchant Key <span class="require">*</span></label><br/>
                                               <input id="payu_merchant_key" name="payu_merchant_key" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->payu_merchant_key }}" data-bvalidator="required">
                                                
                                                
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
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Payumoney Salt Key <span class="require">*</span></label><br/>
                                               <input id="payu_salt_key" name="payu_salt_key" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->payu_salt_key }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4>Iyzico Settings</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Iyzico Mode </label><br/>
                                               
                                                <select name="iyzico_mode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" @if($additional['setting']->iyzico_mode == 1) selected @endif>{{ __('Live') }}</option>
                                                <option value="0" @if($additional['setting']->iyzico_mode == 0) selected @endif>{{ __('Demo') }}</option>
                                                </select>
                                                
                                             </div>
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Iyzico API Key <span class="require">*</span></label><br/>
                                               <input id="iyzico_api_key" name="iyzico_api_key" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->iyzico_api_key }}" data-bvalidator="required">
                                                
                                                
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
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Iyzico Secret Key <span class="require">*</span></label><br/>
                                               <input id="iyzico_secret_key" name="iyzico_secret_key" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->iyzico_secret_key }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4>Flutterwave Settings</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Flutterwave Public Key <span class="require">*</span></label><br/>
                                               <input id="flutterwave_public_key" name="flutterwave_public_key" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->flutterwave_public_key }}" data-bvalidator="required">
                                                
                                                
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
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Flutterwave Secret Key <span class="require">*</span></label><br/>
                                               <input id="flutterwave_secret_key" name="flutterwave_secret_key" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->flutterwave_secret_key }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4>Coingate Settings</h4></div></div>
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Coingate Mode <span class="require">*</span></label><br/>
                                               
                                                <select name="coingate_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($additional['setting']->coingate_mode == 1) selected @endif>Live</option>
                                                <option value="0" @if($additional['setting']->coingate_mode == 0) selected @endif>Demo</option>
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
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Coingate Auth Token <span class="require">*</span></label><br/>
                                               <input id="coingate_auth_token" name="coingate_auth_token" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->coingate_auth_token }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <div class="col-md-12"><div class="card-body"><h4>iPay Settings</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">iPay Mode <span class="require">*</span></label><br/>
                                               
                                                <select name="ipay_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($additional['setting']->ipay_mode == 1) selected @endif>Live</option>
                                                <option value="0" @if($additional['setting']->ipay_mode == 0) selected @endif>Demo</option>
                                                </select>
                                                
                                             </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">iPay Vendor ID  <span class="require">*</span></label><br/>
                                               <input id="ipay_vendor_id" name="ipay_vendor_id" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->ipay_vendor_id }}" data-bvalidator="required">
                                                
                                                
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
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">iPay API / Hash Key  <span class="require">*</span></label><br/>
                                               <input id="ipay_hash_key" name="ipay_hash_key" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->ipay_hash_key }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            <div class="col-md-12"><div class="card-body"><h4>{{ __('PayFast Settings') }}</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('PayFast Merchant Id') }} <span class="require">*</span></label><br/>
                                               <input id="payfast_merchant_id" name="payfast_merchant_id" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->payfast_merchant_id }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('PayFast Merchant Key') }} <span class="require">*</span></label><br/>
                                               <input id="payfast_merchant_key" name="payfast_merchant_key" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->payfast_merchant_key }}" data-bvalidator="required">
                                                
                                                
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
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('PayFast Mode') }} <span class="require">*</span></label><br/>
                                               
                                                <select name="payfast_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($additional['setting']->payfast_mode == 1) selected @endif>{{ __('Live') }}</option>
                                                <option value="0" @if($additional['setting']->payfast_mode == 0) selected @endif>{{ __('Demo') }}</option>
                                                </select>
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                            <div class="col-md-12"><div class="card-body"><h4>{{ __('CoinPayments') }}</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('CoinPayments Merchant ID') }} <span class="require">*</span></label><br/>
                                               <input id="coinpayments_merchant_id" name="coinpayments_merchant_id" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->coinpayments_merchant_id }}" data-bvalidator="required">
                                                
                                                
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
                                    
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            <div class="col-md-12"><div class="card-body"><h4>{{ __('SSLCommerz Settings') }}</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('SSLCommerz Store Id') }} <span class="require">*</span></label><br/>
                                               <input id="sslcommerz_store_id" name="sslcommerz_store_id" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->sslcommerz_store_id }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('SSLCommerz Store Password') }} <span class="require">*</span></label><br/>
                                               <input id="sslcommerz_store_password" name="sslcommerz_store_password" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->sslcommerz_store_password }}" data-bvalidator="required">
                                                
                                                
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
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('SSLCommerz Mode') }} <span class="require">*</span></label><br/>
                                               
                                                <select name="sslcommerz_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="FALSE" @if($additional['setting']->sslcommerz_mode == 'FALSE') selected @endif>{{ __('Live') }}</option>
                                                <option value="TRUE" @if($additional['setting']->sslcommerz_mode == 'TRUE') selected @endif>{{ __('Demo') }}</option>
                                                </select>
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            <div class="col-md-12"><div class="card-body"><h4>{{ __('Instamojo Settings') }}</h4></div></div>
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Instamojo API Key') }} <span class="require">*</span></label><br/>
                                               <input id="instamojo_api_key" name="instamojo_api_key" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->instamojo_api_key }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Instamojo Auth Token') }} <span class="require">*</span></label><br/>
                                               <input id="instamojo_auth_token" name="instamojo_auth_token" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->instamojo_auth_token }}" data-bvalidator="required">
                                                
                                                
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
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Instamojo Mode') }} <span class="require">*</span></label><br/>
                                               
                                                <select name="instamojo_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($additional['setting']->instamojo_mode == 1) selected @endif>{{ __('Live') }}</option>
                                                <option value="0" @if($additional['setting']->instamojo_mode == 0) selected @endif>{{ __('Demo') }}</option>
                                                </select>
                                                
                                             </div>
                                         
                                    </div>
                                </div>

                            </div>
                            </div>
                            <?php /*?><div class="col-md-12"><div class="card-body"><h4>{{ __('Mercadopago Settings') }}</h4></div></div>
                             
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Client Id') }} <span class="require">*</span></label><br/>
                                               <input id="mercadopago_client_id" name="mercadopago_client_id" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->mercadopago_client_id }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                            
                                          
                                          <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Client Secret') }} <span class="require">*</span></label><br/>
                                               <input id="mercadopago_client_secret" name="mercadopago_client_secret" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->mercadopago_client_secret }}" data-bvalidator="required">
                                                
                                                
                                             </div>
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                            
                            <div class="col-md-6">
                           
                            <div class="card-body">
                                
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Mercadopago Mode') }}<span class="require">*</span></label><br/>
                                               
                                                <select name="mercadopago_mode" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($additional['setting']->mercadopago_mode == 1) selected @endif>{{ __('Live') }}</option>
                                                <option value="0" @if($additional['setting']->mercadopago_mode == 0) selected @endif>{{ __('Demo') }}</option>
                                                </select>
                                                
                                             </div>
                                            
                                          
                                                
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            <?php */?> 
                            
                            <div class="col-md-12"><div class="card-body"><h4>{{ __('Aamarpay Settings') }}</h4></div></div>
                             
                             <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Aamarpay Mode') }} </label><br/>
                                               
                                                <select name="aamarpay_mode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" @if($additional['setting']->aamarpay_mode == 1) selected @endif>{{ __('Live') }}</option>
                                                <option value="0" @if($additional['setting']->aamarpay_mode == 0) selected @endif>{{ __('Demo') }}</option>
                                                </select>
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Store ID') }} </label><br/>
                                               <input id="aamarpay_store_id" name="aamarpay_store_id" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->aamarpay_store_id }}" required>
                                                
                                                
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
                                    
                                    
                                    
                                    <div class="form-group">
                                              <div style="height:65px;"></div>
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Signature Key') }} </label><br/>
                                               <input id="aamarpay_signature_key" name="aamarpay_signature_key" type="text" class="form-control noscroll_textarea" value="{{ $additional['setting']->aamarpay_signature_key }}" required>
                                                
                                                
                                             </div>
                                           
                                           
                                            
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            <div class="col-md-12"><div class="card-body"><h4>{{ __('Stripe Settings') }}</h4></div></div>
                             
                             
                              <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Stripe Mode') }} </label><br/>
                                               
                                                <select name="stripe_mode" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->stripe_mode == 1) selected @endif>{{ __('Live') }}</option>
                                                <option value="0" @if($setting['setting']->stripe_mode == 0) selected @endif>{{ __('Demo') }}</option>
                                                </select>
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Test Publishable Key') }} </label><br/>
                                               <input id="test_publish_key" name="test_publish_key" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->test_publish_key }}" required>
                                                
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Live Publishable Key') }} </label><br/>
                                               <input id="live_publish_key" name="live_publish_key" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->live_publish_key }}" required>
                                                
                                                
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
                                    
                                    
                                    
                                    <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Stripe Payment Type') }} </label><br/>
                                               
                                                <select name="stripe_type" class="form-control" required>
                                                <option value=""></option>
                                                <option value="charges" @if($setting['setting']->stripe_type == 'charges') selected @endif>{{ __('Charges API') }}</option>
                                                <option value="intents" @if($setting['setting']->stripe_type == 'intents') selected @endif>{{ __('Intents API') }}</option>
                                                </select>
                                                
                                             </div>
                                             
                                             
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Test Secret Key') }} </label><br/>
                                               <input id="test_secret_key" name="test_secret_key" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->test_secret_key }}" required>
                                                
                                                
                                             </div>
                                           
                                           
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">{{ __('Live Secret Key') }} </label><br/>
                                               <input id="live_secret_key" name="live_secret_key" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->live_secret_key }}" required>
                                                
                                                
                                             </div>
                                         
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> {{ __('Submit') }}
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> {{ __('Reset') }}
                                                        </button>
                                                    </div>
                             
                             </div>
                             
                            
                            </form>
                            
                                                    
                                                    
                                                 
                            
                        </div> 

                     
                    
                    
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->


   @include('admin.javascript')
<div id="myModal" class="modal fade 2checkout" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <img class="lazy" width="1223" height="678" src="{{ url('/') }}/public/img/2checkout_info.png"  class="img-responsive">
        </div>
    </div>
  </div>
</div>

</body>

</html>
