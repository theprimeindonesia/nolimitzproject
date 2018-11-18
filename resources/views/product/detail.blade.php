@extends('layouts.app')
@section('custom_styles')
<link rel="stylesheet" href="{{asset('global/vendor/select2/select2.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/bootstrap-select/bootstrap-select.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/icheck/icheck.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/switchery/switchery.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/asrange/asRange.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/ionrangeslider/ionrangeslider.min.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/asspinner/asSpinner.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/clockpicker/clockpicker.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/ascolorpicker/asColorPicker.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/bootstrap-touchspin/bootstrap-touchspin.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/jquery-labelauty/jquery-labelauty.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/bootstrap-maxlength/bootstrap-maxlength.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/timepicker/jquery-timepicker.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/jquery-strength/jquery-strength.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/multi-select/multi-select.css')}}">
<link rel="stylesheet" href="{{asset('global/vendor/typeahead-js/typeahead.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/examples/css/forms/advanced.css')}}">
<script src="{{asset('global/vendor/breakpoints/breakpoints.js')}}"></script>
<script>
    Breakpoints();
</script>
<style>
    .disabledbutton {
        pointer-events: none;
        opacity: 0.4;
    }
    .example {
        margin-top:0px !important;
    }
    h6 {
        margin-bottom:5px !important;
    }
    .card-block {
        position: relative;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 0.5rem;
    }
</style>
@endsection
@section('custom_page')
<script src="{{asset('global/js/Plugin/select2.js')}}"></script>
<script src="{{asset('global/js/Plugin/bootstrap-tokenfield.js')}}"></script>
<script src="{{asset('global/js/Plugin/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('global/js/Plugin/bootstrap-select.js')}}"></script>
<script src="{{asset('global/js/Plugin/icheck.js')}}"></script>
<script src="{{asset('global/js/Plugin/switchery.js')}}"></script>
<script src="{{asset('global/js/Plugin/asrange.js')}}"></script>
<script src="{{asset('global/js/Plugin/ionrangeslider.js')}}"></script>
<script src="{{asset('global/js/Plugin/asspinner.js')}}"></script>
<script src="{{asset('global/js/Plugin/clockpicker.js')}}"></script>
<script src="{{asset('global/js/Plugin/ascolorpicker.js')}}"></script>
<script src="{{asset('global/js/Plugin/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('global/js/Plugin/jquery-knob.js')}}"></script>
<script src="{{asset('global/js/Plugin/bootstrap-touchspin.js')}}"></script>
<script src="{{asset('global/js/Plugin/card.js')}}"></script>
<script src="{{asset('global/js/Plugin/jquery-labelauty.js')}}"></script>
<script src="{{asset('global/js/Plugin/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('global/js/Plugin/jt-timepicker.js')}}"></script>
<script src="{{asset('global/js/Plugin/datepair.js')}}"></script>
<script src="{{asset('global/js/Plugin/jquery-strength.js')}}"></script>
<script src="{{asset('global/js/Plugin/multi-select.js')}}"></script>
<script src="{{asset('global/js/Plugin/jquery-placeholder.js')}}"></script>
<script src="{{asset('admin/assets/examples/js/forms/advanced.js')}}"></script>
@endsection
@section('content')
<div class="page-header">
    <h1 class="page-title">Product Detail</h1>
    <a href="{{route('product.index')}}" class="btn btn-success"> <i class="icon wb-arrow-left" aria-hidden="true"></i> Back</a>
</div>
<div class="page-content container-fluid">
    <div id="varians" class="row">
        <div class="col-md-6">
            <div class="panel panel-bordered ">
                <div class="panel-heading">
                    <h4 class="panel-title">Product Profile</h4>
                    <div class="panel-actions">
                        <div class="dropdown">
                            <a class="panel-action" data-toggle="dropdown" href="#" aria-expanded="false"><i class="icon wb-settings" aria-hidden="true"></i></a>
                            <div class="dropdown-menu dropdown-menu-bullet" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px;">
                            <a class="dropdown-item" href="{{route('product.edit',$data->products_id)}}" role="menuitem"><i class="icon wb-pencil" aria-hidden="true"></i> Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i> Product Link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <h6 class="example-title">Product Name</h6>
                            <div class="example">
                                <h4>{{$data['name']}}</h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6 class="example-title">Categories</h6>
                            <div class="example">
                                <h4>{{$data['categories']['name_ind']}} - {{$data['categories']['name_en']}} </h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6 class="example-title">Brand/Merk</h6>
                            <div class="example">
                                <h4>{{$data['merk']['name']}}</h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6 class="example-title">Motor Brand</h6>
                            <div class="example">
                                <h4>
                                    @foreach($data['productsmotor'] as $m)
                                        {{$m['motor']['name']}},
                                    @endforeach
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6 class="example-title">Motor Type</h6>
                            <div class="example">
                                <h4>
                                @foreach($data['productstype'] as $t)
                                    {{$t['type']['name']}},
                                @endforeach
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6 class="example-title">Product Feature</h6>
                            <div class="example">
                                <h4>
                                @foreach($data['productsfeature'] as $f)
                                    {{$f['value']}}<br/>
                                @endforeach
                                </h4>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-bordered ">
                <div class="panel-heading">
                    <div class="panel-actions">
                        <div class="dropdown">
                            <a class="panel-action" data-toggle="dropdown" href="#" aria-expanded="false"><i class="icon wb-settings" aria-hidden="true"></i></a>
                            <div class="dropdown-menu dropdown-menu-bullet" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px;">
                            <a class="dropdown-item" href="{{route('product.varian.add', $data['products_id'])}}" role="menuitem"><i class="icon wb-plus" aria-hidden="true"></i> Add Varian</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="panel-title">Product Varian List</h4>
                </div>
                
                <div class="panel-body container-fluid" id="variansList">
                        
                        @if($stock->varians->count()==0)
                        <div class="text-center">
                            <h2>This Product Doesn't have varians</h2>
                            <a href="javascript:;" data-target="#exampleFormModal" data-toggle="modal" class="btn btn-primary"><i class="icon wb-plus"></i> Add Varian</a>
                        </div>
                        @endif
                        @foreach($data['stock'] as $x)
                        <a href="{{route('product.varian.edit',$x->stock_id)}}" style="text-decoration:none">
                            <div class='card border border-primary'>
                                <div class='card-block'>
                                    <h4 class='card-title'>
                                        @foreach($x['varians'] as $v)
                                            {{$v['value']}}
                                        @endforeach
                                    <span style='float:right;'><button class='btn btn-primary btn-sm ' ><i class='icon wb-pencil' aria-hidden='true'></i></button></span></h4>
                                    <p class='card-text'>Rp. {{number_format($x['price'],0,",",".")}} | Stock {{$x['stock']}} </p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple">
    <form class="modal-content" action="{{route('product.addvarian',$data['products_id'])}}" method="post">
    @csrf
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="exampleFormModalLabel">Set The Varians</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12 form-group">
                <p>Product Varians, example : Warna, Komposisi.<code>use "Enter" to each product feature</code></p>
                <div class="example">
                    <input type="text" name="varian" class="form-control" data-plugin="tokenfield" value=""/>
                </div>
            </div>
            <div class="col-md-12 float-right">
            <button class="btn btn-primary btn-outline"  type="submit">Add Varian</button>
            </div>
        </div>
        </div>
    </form>
    </div>
</div>
<!-- End Modal -->
@endsection
@section('custom_scripts')
<script src="{{ asset('global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
<script src="{{asset('global/vendor/select2/select2.full.min.js')}}"></script>
<script src="{{asset('global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.min.js')}}"></script>
<script src="{{asset('global/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('global/vendor/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('global/vendor/icheck/icheck.min.js')}}"></script>
<script src="{{asset('global/vendor/switchery/switchery.js')}}"></script>
<script src="{{asset('global/vendor/asrange/jquery-asRange.min.js')}}"></script>
<script src="{{asset('global/vendor/ionrangeslider/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('global/vendor/asspinner/jquery-asSpinner.min.js')}}"></script>
<script src="{{asset('global/vendor/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{asset('global/vendor/ascolor/jquery-asColor.min.js')}}"></script>
<script src="{{asset('global/vendor/asgradient/jquery-asGradient.min.js')}}"></script>
<script src="{{asset('global/vendor/ascolorpicker/jquery-asColorPicker.min.js')}}"></script>
<script src="{{asset('global/vendor/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('global/vendor/jquery-knob/jquery.knob.js')}}"></script>
<script src="{{asset('global/vendor/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('global/vendor/jquery-labelauty/jquery-labelauty.js')}}"></script>
<script src="{{asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('global/vendor/timepicker/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('global/vendor/datepair/datepair.min.js')}}"></script>
<script src="{{asset('global/vendor/datepair/jquery.datepair.min.js')}}"></script>
<script src="{{asset('global/vendor/jquery-strength/password_strength.js')}}"></script>
<script src="{{asset('global/vendor/jquery-strength/jquery-strength.min.js')}}"></script>
<script src="{{asset('global/vendor/multi-select/jquery.multi-select.js')}}"></script>
<script src="{{asset('global/vendor/typeahead-js/bloodhound.min.js')}}"></script>
<script src="{{asset('global/vendor/typeahead-js/typeahead.jquery.min.js')}}"></script>
<script src="{{asset('global/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
@endsection