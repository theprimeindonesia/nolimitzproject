@extends('layouts.app')
@section('custom_styles')
<link rel="stylesheet" href="{{ asset('global/vendor/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/examples/css/tables/datatable.css') }}">
@endsection
@section('custom_fonts')
<link rel="stylesheet" href="{{ asset('global/fonts/font-awesome/font-awesome.css') }}">
@endsection
@section('custom_scripts')
<script src="{{ asset('global/vendor/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-scroller/dataTables.scroller.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-buttons/dataTables.buttons.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-buttons/buttons.html5.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-buttons/buttons.flash.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-buttons/buttons.print.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-buttons/buttons.colVis.js') }}"></script>
<script src="{{ asset('global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js') }}"></script>
<script src="{{ asset('global/vendor/asrange/jquery-asRange.min.js') }}"></script>
<script src="{{ asset('global/vendor/bootbox/bootbox.js') }}"></script>
@endsection
@section('custom_page')
<script src="{{ asset('global/js/Plugin/datatables.js') }}"></script>
<script src="{{ asset('admin/assets/examples/js/tables/datatable.js') }}"></script>
@endsection
@section('content')
<!-- Panel Basic -->
<div class="page-content">
    <div class="row">
        <!-- Start Row -->
        <div class="col-xl-4 col-md-6 info-panel">
            <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <button type="button" class="btn btn-floating btn-sm btn-warning">
                    <i class="icon wb-shopping-cart"></i>
                    </button>
                    <span class="ml-15 font-weight-400">ORDERS</span>
                    <div class="content-text text-center mb-0">
                        <span class="font-size-40 font-weight-100">{{$data->count()}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 info-panel">
            <div class="card card-shadow">
                <div class="card-block bg-white p-20">
                    <button type="button" class="btn btn-floating btn-sm btn-danger">
                    <i class="icon fa-dollar"></i>
                    </button>
                    <span class="ml-15 font-weight-400">INCOM</span>
                    <div class="content-text text-center mb-0">
                        <span class="font-size-40 font-weight-100">Rp. {{number_format($data->sum('grand_total'),0,',','.')}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 info-panel">
            <a href="{{route('orders.return')}}" style="text-decoration:none">
                <div class="card card-shadow">
                    <div class="card-block bg-white p-20">
                        <button type="button" class="btn btn-floating btn-sm btn-primary">
                        <i class="icon wb-user"></i>
                        </button>
                        <span class="ml-15 font-weight-400">RETURN</span>
                        <div class="content-text text-center mb-0">
                            <span class="font-size-40 font-weight-100">{{$retur->count()}}</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- End Third Row -->
    </div>
    <div class="panel panel-bordered">
        <div class="panel-heading">
            <h3 class="panel-title">Sales Order</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>NO PO</th>
                        <th>Tanggal</th>
                        <th>Member</th>
                        <th>Total</th>
                        <th>Discon</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO PO</th>
                        <th>Tanggal</th>
                        <th>Member</th>
                        <th>Total</th>
                        <th>Discon</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php($i = 1)
                    @foreach($data as $x)
                    <tr>
                        <td>{{$x->no_invoice}}</td>
                        <td>{{$x->created_at}}</td>
                        <td>{{$x->members->firstname}} {{$x->members->lastname}}</td>
                        <td>{{number_format($x->total,0,',','.')}}</td>
                        <td>{{number_format($x->discon,0,',','.')}}</td>
                        <td>{{number_format($x->grand_total,0,',','.')}}</td>
                        <td>
                            @if($x->status === 'ORDER')
                            <span class="badge badge-warning">PO</span>
                            @elseif($x->status === 'PAID')
                            <span class="badge badge-success">PAID</span>
                            @elseif($x->status === 'PACKAGING')
                            <span class="badge badge-danger">PACKAGING</span>
                            @elseif($x->status === 'DELIVERING')
                            <span class="badge badge-warning">DELIVERING</span>
                            @elseif($x->status === 'RECEIVED')
                            <span class="badge badge-success">RECEIVED</span>
                            @else
                            <span class="badge badge-danger">CANCELED</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('orders.detail',$x->orders_id)}}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"><i class="icon wb-eye" aria-hidden="true"></i></a>
                            <form id="remove-user" action="{{route('orders.destroy',$x->orders_id)}}" method="POST" style="display: inline-block;">
                                {{method_field('DELETE')}}
                                @csrf
                                <button onclick="return confirm('Are you sure you want to delete this ?');" type="submit" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row"><i class="icon wb-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection