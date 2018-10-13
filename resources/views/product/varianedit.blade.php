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
<div class="page-header">
    <h1 class="page-title">Product Detail</h1>
    <a href="{{route('product.index')}}" class="btn btn-success"> <i class="icon wb-arrow-left" aria-hidden="true"></i> Back</a>
</div>
<div class="page-content container-fluid">
    <form action="{{route('product.varian.update',$data->stock_id)}}" method="post" id="formVarian" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="arrayVarian" name="array_varian">
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
                                        <input class="form-control" placeholder="" type="text" name="price" value="{{$data['price']}}" id="price">
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
                                        <input class="form-control" placeholder="" type="text" name="primary" value="{{$data['primary']}}" id="primary">
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
                                        <input class="form-control" placeholder="" type="text" name="secondary" value="{{$data['secondary']}}" id="secondary">
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
                        @foreach($data['varians'] as $v)
                        <div class="col-md-12">
                            <h4 class="example-title">{{$v['name']}}</h4>
                            <div class="example">
                                <input type="text" value="{{$v['value']}}" data-id="{{$v['name']}}" varian-id="{{$v['varians_id']}}" id="dynVarian" class="form-control" >
                            </div>
                        </div>
                        @endforeach
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
                                                <input name="image_single" id="imageArray" type="hidden">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding:10px;">
                            <img src="" id="img" height="150">
                            @foreach($data['images'] as $x)
                                <img src="{{url('/public/images/product',$x->image)}}" class="imgVarian"  height="150" width="150" >
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h4 class="example-title">SKU <small>(Stock Keeping Unit)</small></h4>
                            <div class="example">
                                <input type="text" name="sku" class="form-control" value="{{$data['sku']}}" id="sku">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="example-title">Barcode</h4>
                            <div class="example">
                                <input type="text" name="barcode" class="form-control" value="{{$data['barcode']}}" id="barcode">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="example-title">Stock QTY</h4>
                            <div class="example">
                                <input type="text" class="form-control" name="stock" value="{{$data['stock']}}" id="stock">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="example-title">Unit Of Measure</h4>
                            <div class="example">
                                <select name="uom_id" id="uom" class="form-control">
                                    @foreach($uom as $d)
                                    <option value="{{$d['uom_id']}}" selected="{{$data['uom_id'] === $d['uom_id'] ? 'selected':'' }}">{{$d['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <h4 class="example-title">Weight</h4>
                            <div class="example">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="" type="text" name="weight" value="{{$data['weight']}}" id="weight">
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
                                        <input class="form-control" placeholder="" type="text" name="height" value="{{$data['height']}}" id="height">
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
                                        <input class="form-control" placeholder="" type="text" name="length" value="{{$data['length']}}" id="length">
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
                                        <input class="form-control" placeholder="" type="text" name="width" value="{{$data['width']}}" id="width">
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
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary" id="saveAll">Save</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
                <div class="col-md-6">
                    <form id="remove-user" action="{{ route('product.varian.delete', $data->stock_id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        <button onclick="return confirm('Are you sure you want to delete this ?');" type="submit" class="btn btn-danger btn-block"><i class="icon wb-trash" aria-hidden="true"></i> Delete </button>
                    </form>
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
            $('img.imgVarian').hide();
            }); 
            FR.readAsDataURL( this.files[0] );
        }
    }
   
    var varData = [];
    //VARIAN SUBMIT
    $('#saveAll').click(function(){
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
           var varian_id = $(this).attr('varian-id');
           var x = {
               'varians_id':varian_id,
               'name':namex,
               'value':valuex,
           }
           varians.push(x);
       })
       var data = {
           'id':"{{$data['stock_id']}}",
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
       $('#formVarian').submit();
       console.log(varData);
    });
     
    document.getElementById("inp").addEventListener("change", readFile);
</script>
@endsection