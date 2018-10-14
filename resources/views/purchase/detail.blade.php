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
    <h1 class="page-title">Purchase Order</h1>
</div>
<div class="page-content">
    <!-- Panel -->
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h3>
                        {{$data['suppliers']['name']}}
                    </h3>
                    <address>
                    {{$data['suppliers']['addresses']['subdistrict']}}
                        <br> {{$data['suppliers']['addresses']['city']}}, {{$data['suppliers']['addresses']['province']}}, {{$data['suppliers']['addresses']['zip']}}
                        <br>
                        <abbr title="Phone">P:</abbr>&nbsp;&nbsp;{{$data['suppliers']['contact']}} - {{$data['suppliers']['contact_sales']}}
                        <br>
                    </address>
                </div>
                <div class="col-lg-3 offset-lg-6 text-right">
                    <h4>Purchase Order Info</h4>
                    <p>
                        <a class="font-size-20" href="javascript:void(0)">{{$data['no_po']}} </a>
                        - 
                        @if($data['status'] === 'PO')
                          <span class="badge badge-lg badge-warning">PO</span>
                        @else
                          <span class="badge badge-lg badge-success">RECEIVED</span>
                        @endif
                    </p>
                    <span>Purchase Date: {{$data['created_at']}}</span>
                </div>
            </div>
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
                            <td>Rp. {{number_format($x['price'],0,',','.')}}</td>
                            <td class="text-left">{{$x['qty']}} {{$x['stock']['uom']['name']}} </td>
                            <td>Rp. {{number_format($x['total'],0,',','.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
            <div class="text-right clearfix">
                <div class="float-right">
                    <p>Sub - Total amount:
                        <span>Rp. {{number_format($data['total'],0,',','.')}}</span>
                    </p>
                    <p>Discount:
                        <span>Rp. {{number_format($data['discount'],0,',','.')}}</span>
                    </p>
                    <p class="page-invoice-amount">Grand Total:
                        <span>Rp. Rp. {{number_format($data['grand_total'],0,',','.')}}</span>
                    </p>
                </div>
            </div>
            <div class="text-right">
                   @if($data['status'] === 'PO')
                    <a href="{{route('purchase.received',$data['po_id'])}}" class="btn btn-animate btn-animate-side btn-primary">
                      <span><i class="icon wb-shopping-cart" aria-hidden="true"></i> PROCESS TO RECEIVED</span>
                    </a>
                  @else
                    <a href="{{route('purchase.return',$data['po_id'])}}" class="btn btn-animate btn-animate-side btn-danger">
                      <span><i class="icon wb-shopping-cart" aria-hidden="true"></i> RETURN PURCHASED ORDER</span>
                    </a>
                  @endif
               
                <button type="button" class="btn btn-animate btn-animate-side btn-warning btn-outline"
                    onclick="javascript:window.print();">
                <span><i class="icon wb-print" aria-hidden="true"></i> Print</span>
                </button>
            </div>
            <hr/>
            <h3>
                Return Purchase Order
            </h3>
            <div class="page-invoice-table table-responsive">
                <table class="table table-hover text-right">
                    <thead>
                        <tr>
                            <th class="text-left">Date</th>
                            <th class="text-left">Products</th>
                            <th class="text-right">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['returpo'] as $a)
                              @foreach($a['returpodetails'] as $b)
                              <tr>
                                <td class="text-left" >{{$b['created_at']}}</td>
                                <td class="text-left">
                                  {{$b['stock']['products']['name']}} - 
                                  @foreach($x['stock']['varians'] as $c)
                                    {{$c['value']}}
                                  @endforeach 
                                </td>
                                <td>{{$b['qty']}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Panel -->
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
@endsection