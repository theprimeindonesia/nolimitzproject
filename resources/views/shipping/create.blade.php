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
    <form action="{{route('purchase.store')}}" method="post" id="formVarian" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="arrayStock" name="array_stock">
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title">Create New Purchase Order</h3>
            </div>
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-6">
                        <h4 class="example-title">NO PO</h4>
                        <div class="example">
                            <input type="text" name="no_po" class="form-control" id="noPo" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="example-title">Supplier</h4>
                        <div class="example">
                            <select class="form-control" name="suppliers_id">
                                @foreach($suppliers as $s)
                                    <option value="{{$s['suppliers_id']}}">{{$s['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="total" value="0" name="total">
        <input type="hidden" id="grandTotal" value="0" name="grand_total">
        <input type="hidden"  value="PO" name="status">
    </form>
    <div id="varians" class="row">
        <div class="col-md-6">
            <div class="panel panel-bordered ">
                <div class="panel-heading">
                    <h3 class="panel-title">Product</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div id="varianFeature" class="col-md-12 row varianFeature">
                        </div>
                        <div class="col-md-12">
                            <h4 class="example-title">Product</h4>
                            <div class="example">
                                <select class="form-control" data-plugin="select2" data-minimum-input-length="2" id="stock">
                                <option value=""> - Search Product By Name, Barcode, Sku  - </option>
                                    @foreach($stock as $x)
                                    <option value="{{$x['stock_id']}}"  data-id="{{$x['barcode']}} - {{$x['products']['name']}} @foreach($x['varians'] as $v) {{$v['value']}},  @endforeach">
                                     {{$x['barcode']}} -  {{$x['products']['name']}} - 
                                        @foreach($x['varians'] as $v) {{$v['value']}},  @endforeach
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="example-title">QTY</h4>
                            <div class="example">
                                <input type="text"  class="form-control varianClass" id="qty">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="example-title">Buy Price</h4>
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
                    </div>
                    <div class="col-md-6">
                        <button id="btnVarian" class="btn btn-success pull-right"> <i class="icon wb-plus" aria-hidden="true"></i> Add Product</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-bordered ">
                <div class="panel-heading">
                    <h3 class="panel-title">Product List</h3>
                </div>
                <div class="panel-body container-fluid" id="variansList">
                </div>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-md-8">
                    <p>Total</p>
                  
                    <h2 id="totalPo"></h2>
                </div>
                <div class="col-md-4">
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
    var total = "";
    var varData = [];
    function guid() {
       function s4() {
           return Math.floor((1 + Math.random()) * 0x10000)
           .toString(16)
           .substring(1);
       }
       return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
    }
    function no_po() {
       function s4() {
           return Math.floor((1 + Math.random()) * 0x10000)
           .toString(16)
           .substring(1);
       }
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear()  +
    ((''+month).length<2 ? '0' : '') + month +
    ((''+day).length<2 ? '0' : '') + day;
       return  "PO."+ output +"."+s4() + s4();
    }
    $(document).ready(function()  {
        var nopo = no_po();
        $('#noPo').val(nopo.toUpperCase());
    });
    function comma(val){
       while (/(\d+)(\d{3})/.test(val.toString())){
       val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
       }
       return val;
    }
    //VARIAN SUBMIT
    $('#btnVarian').click(function(){
       var price = $('#price').val();
       var stock = $('#stock').val();
       var qty = $('#qty').val();
       var attr = $('#stock option:selected').data('id');
       var id = guid();
       var data = {
           'id':id,
           'price':price,
           'stock':stock,
           'qty':qty,
           'attr':attr,
       };
       total = +price * +qty;
       var totalx = $('#total').val();
       var total3 = +total + +totalx;
       var total2 = "Rp. "+comma(total3);

       $('#total').val(total3);
       $('#totalPo').html(total2);
       varData.push(data);
       $('#arrayStock').val(JSON.stringify(varData));
       $('input.varianClass').val('');
       var list = "<div class='card border border-primary'><div class='card-block'><h4 class='card-title'>"+attr+"<span style='float:right;'><a href='javascript:;' id='btnHapus' data-id='"+id+"' class='btn btn-danger btn-sm btn-hapus' ><i class='icon wb-close' aria-hidden='true'></i></a></span></h4><p class='card-text'>Rp. "+comma(price)+" | Qty "+qty+" </p></div></div>";
       $('#variansList').append(list);
       console.log(varData);
    });
    const filterInPlace = (array, predicate) => {
        let end = 0;
        for (let i = 0; i < array.length; i++) {
            const obj = array[i];
            if (predicate(obj)) {
                array[end++] = obj;
            }
        }
        array.length = end;
    };

    $('body').on('click', 'a.btn-hapus', function(e) {
        e.preventDefault();
        var x = $(this).data('id');
        var result = varData.find(obj => {
            return obj.id === x
        })
        var total = +result.price * +result.qty;
        var totalx = $('#total').val();
        var total3 =  +totalx - +total;
        var total2 = "Rp. "+comma(total3);

        $('#total').val(total3);
        $('#grandTotal').val(total3);
        $('#totalPo').html(total2);
        console.log(result);
        const toDelete = new Set([x]);
        filterInPlace(varData, obj => !toDelete.has(obj.id));
        console.log(varData);
        $('#arrayStock').val(JSON.stringify(varData));
        $(this).parent().parent().parent().parent().remove();
    });
    $('#saveAll').click(function(){
       $('#formVarian').submit();
    });
</script>
@endsection