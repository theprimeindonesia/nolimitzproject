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
    <form action="{{route('purchase.update',$data['po_id'])}}" method="post" id="formVarian" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Purchase Order</h3>
            </div>
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-4">
                        <h4 class="example-title">NO PO</h4>
                        <div class="example">
                            <input type="text" name="no_po" class="form-control" value="{{$data['no_po']}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4 class="example-title">Supplier</h4>
                        <div class="example">
                            <select class="form-control" name="suppliers_id">
                                @foreach($suppliers as $s)
                                <option value="{{$s['suppliers_id']}}">{{$s['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4 class="example-title">Discount</h4>
                        <div class="example">
                            <input type="text" name="discon" class="form-control" id="discon" value="{{$data['discount']}}">
                            <hr/>
                            <a href="javascript:;" class="btn btn-primary" id="btnDiscon">Apply Discon</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="varians" class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Product List</h3>
                        <div class="col-md-6">
                            <div class="mb-15">
                                <button class="btn btn-primary" data-target="#exampleFormModal" data-toggle="modal" type="button"><i class="icon wb-plus" aria-hidden="true"></i> Add Other Product</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body container-fluid" id="variansList">
                        <div class="page-invoice-table table-responsive">
                            <table class="table table-hover text-right">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-left">Product</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($no = 1)
                                    @foreach($data['podetails'] as $x)
                                    <tr>
                                        <td class="text-center">{{$no++}}</td>
                                        <td class="text-left">
                                            {{$x['stock']['products']['name']}} - 
                                            @foreach($x['stock']['varians'] as $v)
                                            {{$v['value']}}
                                            @endforeach 
                                        </td>
                                        <td>
                                            
                                            <input type="text" class="form-control dyn" name="data[price][]" value="{{$x['price']}}">
                                        </td>
                                        <td class="text-left"><input type="text" class="form-control dyn" name="data[qty][]" value="{{$x['qty']}}"></td>
                                        <td>Rp. <span class="amount">{{$x['total']}}</span> </td>
                                    </tr>
                                    <input type="hidden" class="form-control dyn" name="data[po_details_id][]" value="{{$x['po_details_id']}}">
                                    <input type="hidden" class="form-control dyn" name="data[stock_id][]" value="{{$x['stock_id']}}">
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="total"  name="total" value="{{$data['total']}}">
        <input type="hidden" id="grandTotal" value="{{$data['grand_total']}}" name="grand_total">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-4">
                        <p>Total</p>
                        <h2 id="totalPo">Rp. {{number_format($data['total'],0,',',',')}}</h2>
                    </div>
                    <div class="col-md-4">
                        <p>Grand Total</p>
                        <h2 id="grandTotalPo">Rp. {{number_format($data['grand_total'],0,',',',')}}</h2>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success" id="saveReceived">Save to Receive</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!---MODAL-->
<div class="modal fade" id="exampleFormModal" aria-labelledby="exampleFormModalLabel" role="dialog">
    <div class="modal-dialog modal-simple">
    <form class="modal-content" action="{{route('purchase.podet',$data['po_id'])}}" method="post">
        @csrf
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="exampleFormModalLabel">Add Other Product</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-xl-12 form-group">
                <select class="form-control" data-plugin="select2" name="stock_id">
                    <option value=""> - Search Product By Name, Barcode, Sku  - </option>
                    @foreach($stock as $x)
                    <option value="{{$x['stock_id']}}"  data-id="{{$x['barcode']}} - {{$x['products']['name']}} @foreach($x['varians'] as $v) {{$v['value']}},  @endforeach">
                        {{$x['barcode']}} -  {{$x['products']['name']}} - 
                        @foreach($x['varians'] as $v) {{$v['value']}},  @endforeach
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-6 form-group">
                <input class="form-control" name="qty"  type="text" placeholder="Quantity">
            </div>
            <div class="col-xl-6 form-group">
                <input class="form-control" name="price" type="text" placeholder="Price, example : 100000">
            </div>
            <div class="col-md-12 float-right">
                <button type="submit" class="btn btn-primary btn-outline" type="button">Add Product</button>
            </div>
        </div>
        </div>
    </form>
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
    function comma(val){
       while (/(\d+)(\d{3})/.test(val.toString())){
       val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
       }
       return val;
    }
    $('input.dyn').keyup(function(){
      doCalc();
    });
    function doCalc() {
        var total = 0;
        $('tr').each(function() {
            $(this).find('span.amount').html($('input:eq(0)', this).val() * $('input:eq(1)', this).val());
        });
        $('.amount').each(function() {
            total += parseInt($(this).text(),10);
        });
        var totalx = "Rp. " + comma(total);
        $('#totalPo').html(totalx);
        var dis = $('#discon').val();
        var grand = total -  dis
        $('#grandTotalPo').html("Rp. " + comma(grand));
        $('#total').val(total);
        $('#grandTotal').val(grand);
    }

    $btnDiscount = $('#btnDiscon');
    $discount    = $('#discon');
    $total       = $('#total');
    $grandTotal  = $('#grandTotal');
    $grandTotalPo= $('#grandTotalPo');

    $btnDiscount.on('click', function(){
        var discount  = $discount.val();
        var total     = $total.val();

        var gt = total - discount ;
        $grandTotal.val(gt);
        $grandTotalPo.html("Rp. "+ comma(gt));
    }); 

    // $('#btnDiscon').click(function(){
    //     var discon  = $('#discon').val();
    //     console.log('discon', discon);
    //     var grandtotal = $('#grandTotal').val();
    //     console.log('grandtotal', grandtotal);
    //     var xx = grandtotal - discon;
    //     // alert(discon);
    //     // alert(grandtotal);
    //     // alert(xx);
    //     $('#grandTotal').val(xx);
    //     $('#grandTotalPo').html("Rp. " + comma(xx));
    // });

</script>
@endsection