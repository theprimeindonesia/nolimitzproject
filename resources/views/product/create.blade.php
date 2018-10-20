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
<div class="page-content container-fluid">
    <form action="{{route('product.store')}}" method="post" id="formVarian" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="arrayVarian" name="array_varian">
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title">Create New Product</h3>
            </div>
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-6">
                        <h4 class="example-title">Name</h4>
                        <div class="example">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="example-title">Product Category</h4>
                        <div class="example">
                            <select class="form-control" name="categories_id">
                                @foreach($category as $c)
                                <option value="{{$c['categories_id']}}">{{$c['name_ind']}} - {{$c['name_en']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <h4 class="example-title">Brand / Merk</h4>
                        <div class="example">
                            <select class="form-control" name="merk_id">
                                @foreach($merk as $a)
                                <option value="{{$a['merk_id']}}">{{$a['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <h4 class="example-title">Motor Brand</h4>
                        <div class="example">
                            <select class="form-control" multiple data-plugin="select2" name="motor_id[]">
                                @foreach($motor as $b)
                                <option value="{{$b['motor_id']}}">{{$b['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <h4 class="example-title">Motor Type</h4>
                        <div class="example">
                            <select class="form-control" multiple data-plugin="select2" name="type_id[]">
                                @foreach($type as $e)
                                <option value="{{$e['type_id']}}">{{$e['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="example-title"> Description in Indonesia </h4>
                        <div class="example">
                            <textarea name="description_ind" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="example-title"> Description in English </h4>
                        <div class="example">
                            <textarea name="description_en" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4 class="example-title"> Product Feature </h4>
                        <p>Product feature, example : Tahan pecah, Terbuat dari 100% plastik. (Bukan Fiber). <code>use "Enter" to each product feature</code></p>
                        <div class="example">
                            <input type="text" name="feature" class="form-control" data-plugin="tokenfield" value="feature 1,feature 2"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Does this product have a variant?</h3>
            </div>
            <div class="panel-body container-fluid row">
                <div class="col-md-3">
                    <input type="checkbox" id="switch" name="switch" value="Y" class="js-switch-large" data-plugin="switchery" data-size="large" />
                </div>
                <div class="col-md-6" id="varianValue">
                    <h4 class="example-title"> Varian </h4>
                    <p>Product Varian, example : warna, Komposisi. <code>use "Enter" to each product varian</code></p>
                    <div class="example">
                        <input type="text" id="variansValue" name="variansvalue" class="form-control" data-plugin="tokenfield" value=""/>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-block btn-success" id="btnAddVarian">Add Varian</a>
                </div>
                <div class="col-md-3" id="resetVarian">
                    <a href="javascript:void(0)" class="btn btn-block btn-danger" id="btnResetVarian">Reset Varian</a>
                </div>
            </div>
        </div>
        <div id="single">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">Price Management</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-6 col-xl-4">
                            <h4 class="example-title">Sell Price</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp. </span>
                                        </div>
                                        <input class="form-control" placeholder="" type="text" name="price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <h4 class="example-title">Primary Commision</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">% </span>
                                        </div>
                                        <input class="form-control" placeholder="" type="text" name="primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <h4 class="example-title">Secondary Commision</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">% </span>
                                        </div>
                                        <input class="form-control" placeholder="" type="text" name="secondary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">Inventory</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-6">
                            <h4 class="example-title">Image</h4>
                            <div class="example">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                            <input class="form-control" readonly="" type="text">
                                            <div class="input-group-append">
                                                <span class="btn btn-success btn-file">
                                                <i class="icon wb-upload" aria-hidden="true"></i>
                                                <input name="images" id="inp" type="file">
                                                <input name="image_single" id="imageSingle" type="hidden">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding:10px;">
                            <img src="" id="img" height="150">
                        </div>
                        <div class="col-md-6">
                            <h4 class="example-title">SKU <small>(Stock Keeping Unit)</small></h4>
                            <div class="example">
                                <input type="text" name="sku" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="example-title">Barcode</h4>
                            <div class="example">
                                <input type="text" name="barcode" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="example-title">Stock QTY</h4>
                            <div class="example">
                                <input type="text" class="form-control" name="stock">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="example-title">Unit Of Measure</h4>
                            <div class="example">
                                <select name="uom_id" id="" class="form-control">
                                    @foreach($uom as $d)
                                    <option value="{{$d['uom_id']}}">{{$d['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <h4 class="example-title">Weight</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="" type="text" name="weight">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Gr </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <h4 class="example-title">Height</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="" type="text" name="height">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Cm </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <h4 class="example-title">Length</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="" type="text" name="length">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Cm </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <h4 class="example-title">Width</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="" type="text" name="width">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Cm </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="varians" class="row">
        <div class="col-md-6">
            <div class="panel panel-bordered ">
                <div class="panel-heading">
                    <h3 class="panel-title">Product Varian</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div id="varianFeature" class="col-md-12 row">
                        </div>
                        <div class="col-md-12">
                            <h4 class="example-title">SKU <small>(Stock Keeping Unit)</small></h4>
                            <div class="example">
                                <input type="text" name="sku" class="form-control varianClass" id="sku">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="example-title">Barcode</h4>
                            <div class="example">
                                <input type="text" name="barcode " class="form-control varianClass" id="barcode">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="example-title">Sell Price</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp. </span>
                                        </div>
                                        <input class="form-control varianClass" placeholder="" type="text" id="price" name="price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="example-title">Primary Commision</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">% </span>
                                        </div>
                                        <input class="form-control varianClass" placeholder="" id="primary" type="text" name="primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="example-title">Secondary Commision</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">% </span>
                                        </div>
                                        <input class="form-control varianClass" placeholder="" id="secondary" type="text" name="secondary">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <h4 class="example-title">Image</h4>
                                <div class="example">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                                <input class="form-control" readonly="" type="text">
                                                <div class="input-group-append">
                                                    <span class="btn btn-success btn-file">
                                                    <i class="icon wb-upload" aria-hidden="true"></i>
                                                    <input name="images" id="inp2" type="file">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding:10px;">
                                <img src="" id="img2" height="150">
                            </div>
                        </div>
                    </div>
                    <div class="row row-lg">
                        <div class="col-md-6">
                            <h4 class="example-title">Stock QTY</h4>
                            <div class="example">
                                <input type="text" class="form-control varianClass" name="stock" id="stock">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="example-title">Unit Of Measure</h4>
                            <div class="example">
                                <select name="uom_id" class="form-control" id="uom">
                                    @foreach($uom as $d)
                                    <option value="{{$d['uom_id']}}">{{$d['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="example-title">Weight</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control varianClass" placeholder="" type="text" name="weight" id="weight">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Gr </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="example-title">Height</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control varianClass" placeholder="" type="text" name="height" id="height">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Cm </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <h4 class="example-title">Length</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control varianClass" placeholder="" type="text" name="length" id="length">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Cm </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <h4 class="example-title">Width</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control varianClass" placeholder="" type="text" name="width" id="width">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Cm </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="imageArray">
                    <div class="col-md-6">
                        <button id="btnVarian" class="btn btn-success pull-right"> <i class="icon wb-plus" aria-hidden="true"></i> Save Product Varian</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-bordered ">
                <div class="panel-heading">
                    <h3 class="panel-title">Product Varian List</h3>
                </div>
                <div class="panel-body container-fluid" id="variansList">
                </div>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="saveAll">Save</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script>
    function readFile() {
        if (this.files && this.files[0]) {
            var FR= new FileReader();
            FR.addEventListener("load", function(e) {
            document.getElementById("img").src       = e.target.result;
            document.getElementById("imageSingle").value = e.target.result;
            }); 
            FR.readAsDataURL( this.files[0] );
        }
    }
    function readFile2() {
        if (this.files && this.files[0]) {
            var FR= new FileReader();
            FR.addEventListener("load", function(e) {
            document.getElementById("img2").src       = e.target.result;
            document.getElementById("imageArray").value = e.target.result;
            }); 
            FR.readAsDataURL( this.files[0] );
        }
    }
    
    var varData = [];
    function guid() {
       function s4() {
           return Math.floor((1 + Math.random()) * 0x10000)
           .toString(16)
           .substring(1);
       }
       return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
    }
    function comma(val){
       while (/(\d+)(\d{3})/.test(val.toString())){
       val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
       }
       return val;
    }
    $( document ).ready(function() {
       $('#varians').hide();
       $('#varianValue').hide();
       $('#resetVarian').hide();
    
    });
    $('#switch').change(function(){
       if ($('#switch').is(':checked')) {
           $('#single').hide();
           $('#varians').show();
           $('#varianValue').show();
           $('#resetVarian').show();
       }else{
           $('#single').show();
           $('#varians').hide();
           $('#varianValue').hide();
           $('#resetVarian').hide();
    
       };
    
    });
    
    //VARIAN FEATURE
    $('#btnAddVarian').click(function(){
       var x = $('#variansValue').val();
       var varianArray = x.split(',');
       var field = "";
       for (var i = 0, len = varianArray.length; i < len; i++) {
           field += "<div class='col-md-12'><h4 class='example-title'>"+varianArray[i]+"</small></h4><div class='example'><input type='text' data-id='"+varianArray[i]+"' name='value[]' id='dynVarians' class='form-control varianClass'></div></div>";
       }
       $('#varianFeature').append(field);
       $('#varianValue').addClass("disabledbutton");
    });
    $('#btnResetVarian').click(function(){
        if(varData.length === 0 ){
            $('#varianValue').removeClass("disabledbutton");
        }else{
            alert('PLEASE REMOVE PRODUCT VARIAN TO RESET VARIAN');
        }
    });
    //VARIAN SUBMIT
    $('#btnVarian').click(function(){
       var price = $('#price').val();
       var primary = $('#primary').val();
       var secondary = $('#secondary').val();
       var stock = $('#stock').val();
       var uom = $('#uom').val();
       var weight = $('#weight').val();
       var height = $('#height').val();
       var width = $('#width').val();
       var length = $('#length').val();
       var sku = $('#sku').val();
       var barcode = $('#barcode').val();
       var image = $('#imageArray').val();
       var varians = [];
       $('input[id^="dynVarian"]').each(function(input){
           var valuex = $(this).val();
           var namex = $(this).attr('data-id');
           var x = {
               'name':namex,
               'value':valuex,
           }
           varians.push(x);
       })
       var data = {
           'id':guid(),
           'price':price,
           'primary':primary,
           'secondary':secondary,
           'stock':stock,
           'uom':uom,
           'weight':weight,
           'height':height,
           'length':length,
           'width':width,
           'sku':sku,
           'barcode':barcode,
           'image':image,
           'varians':varians
       };
       varData.push(data);
       $('#arrayVarian').val(JSON.stringify(varData));
       $('input.varianClass').val('');
       var varianText = "";
       $.each(varians, function (index, value) {
           varianText += value['value'] + " ";
       });
       var list = "<div class='card border border-primary'><div class='card-block'><h4 class='card-title'>"+varianText+" - "+sku+"<span style='float:right;'><button class='btn btn-danger btn-sm ' ><i class='icon wb-close' aria-hidden='true'></i></button></span></h4><p class='card-text'>Rp. "+comma(price)+" | Stock "+stock+" </p></div></div>";
       $('#variansList').append(list);
       console.log(varData);
    });
    $('#saveAll').click(function(){
       $('#formVarian').submit();
    });
    document.getElementById("inp").addEventListener("change", readFile);
    document.getElementById("inp2").addEventListener("change", readFile2);
</script>
@endsection