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

@section('content')
<!-- Panel Basic -->
<div class="page-content">
    <div class="panel panel-bordered">
        <div class="panel-heading">
            <h3 class="panel-title">Shipping Order</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>NO PO</th>
                        <th>Tanggal</th>
                        <th>Tracking Number</th>
                        <th>Member</th>
                        <th>Status</th>
                        <th>Label/Resi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO PO</th>
                        <th>Tanggal</th>
                        <th>Tracking Number</th>
                        <th>Member</th>
                        <th>Status</th>
                        <th>Label/Resi</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php($i = 1)
                    @foreach($data as $x)
                    <tr>
                        <td>{{$x->no_invoice}}</td>
                        <td>{{$x->created_at}}</td>
                        <td>{{$x->resi}}</td>
                        <td>{{$x->members->firstname}} {{$x->members->lastname}}</td>
                        <td>
                            @if($x->status === 'ORDER')
                            <span class="badge badge-warning">PO</span>
                            @elseif($x->status === 'PAID')
                            <span class="badge badge-success">PAID</span>
                            @elseif($x->status === 'DELIVERING')
                            <span class="badge badge-warning">DELIVERING</span>
                            @elseif($x->status === 'RECEIVED')
                            <span class="badge badge-success">RECEIVED</span>
                            @else
                            <span class="badge badge-danger">CANCELED</span>
                            @endif
                        </td>
                        <td>
                            @if($x->status === 'PAID')
                            <a href="{{route('shipping.label',$x->orders_id)}}"  target="_blank" class="btn btn-primary btn-sm">PRINT LABEL</a>
                            @elseif($x->status === 'DELIVERING' and empty($x['resi']))
                            <button class="btn btn-warning" type="button" id="btnResi" data-id="{{$x['orders_id']}}">INPUT TRACKING NUMBER</button>
                            @elseif($x->status === 'DELIVERING' and !empty($x['resi']))
                            <button class="btn btn-success" type="button">DELIVERING TO CUSTOMER</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('shipping.detail',$x->orders_id)}}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"><i class="icon wb-eye" aria-hidden="true"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple">
        <form class="modal-content" action="{{route('shipping.resi')}}" method="post">
            @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="exampleFormModalLabel">Set Expedition</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-6 form-group">
                        <select name="expeditions_id" id="" class="form-control">
                            @foreach($expeditions as $e)
                                <option value="{{$e['expeditions_id']}}">{{$e['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-6 form-group">
                        <input type="text" class="form-control" name="resi" placeholder="Tracking Number (Resi)" required="true">
                        <input type="hidden" class="form-control" name="orders_id" id="orderId">
                    </div>
                    <div class="col-md-12 float-right">
                        <button class="btn btn-primary btn-outline" type="submit">Set Expedition</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal -->
@endsection
@section('custom_page')
<script src="{{ asset('global/js/Plugin/datatables.js') }}"></script>
<script src="{{ asset('admin/assets/examples/js/tables/datatable.js') }}"></script>
<script>
    $('#btnResi').click(function(){
        var id = $(this).data('id');
        $('#orderId').val(id);
        $('#exampleFormModal').modal('show');
    });
</script>
@endsection

