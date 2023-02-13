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
    @if(in_array('items',$avilable))
    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ __('Trash Items') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/items') }}" class="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i> {{ __('Back') }}</a>
                            
                            
                            
                        </ol>
                    </div>
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
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-3 ml-auto">
                    <form action="{{ route('admin.trash-items') }}" method="post" id="setting_form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <input id="search" name="search" type="text" class="move-bars" value="{{ $search }}" placeholder="{{ __('Item Name') }}">
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Search
                    </button>
                    
                    </div>
                    </form>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ __('Trash Items') }}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export-items" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sno') }}</th>
                                            <th>{{ __('Item Image') }}</th>
                                            <th>{{ __('Item Name') }}</th>
                                            <th>{{ __('Free Item') }}?</th>
                                            <th>{{ __('Flash Request') }}?</th>
                                            <th>{{ __('Vendor') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $item)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>@if($item->item_thumbnail != '') <img class="lazy" width="50" height="50" src="{{ Helper::Image_Path($item->item_thumbnail,'no-image.png') }}"  alt="{{ $item->item_name }}"/>@else <img class="lazy" width="50" height="50" src="{{ url('/') }}/public/img/no-image.png"  alt="{{ $item->item_name }}" />  @endif</td>
                                            <td><a href="{{ url('/item') }}/{{ $item->item_slug }}" target="_blank" class="black-color">{{ mb_substr($item->item_name, 0, 50, 'UTF-8') }}</a></td>
                                            <td>@if($item->free_download == 1) <span class="badge badge-success">{{ __('Yes') }}</span> @else <span class="badge badge-danger">{{ __('No') }}</span> @endif</td>
                                            <td>@if($item->item_flash_request == 1) @if($item->item_flash == 0) <span class="badge badge-danger">{{ __('Waiting for approval') }}</span> @else <span class="badge badge-success">{{ __('Approved') }}</span> @endif @else <span>---</span> @endif</td>
                                            <td><a href="{{ url('/user') }}/{{ $item->username }}" target="_blank" class="black-color">{{ $item->username }}</a></td>
                                            <td>
                                            @if($demo_mode == 'on')
                                            <a href="demo-mode" class="btn btn-success btn-sm"><i class="fa fa-undo"></i>&nbsp;{{ __('Restore') }}</a> 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;{{ __('Delete Permanently') }}</a>
                                            
                                            @else
                                            <a href="restore-items/{{ $item->item_token }}" class="btn btn-success btn-sm"><i class="fa fa-undo"></i>&nbsp; {{ __('Restore') }}</a> 
                                            <a href="delete-items/{{ $item->item_token }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure you want to permanently delete') }}?');"><i class="fa fa-trash"></i>&nbsp;{{ __('Delete Permanently') }}</a>
                                            @endif</td>
                                        </tr>
                                        @php $no++; @endphp
                                   @endforeach     
                                        
                                    </tbody>
                                </table>
                                <div>
                                {{ $itemData['item']->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
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


</body>

</html>
