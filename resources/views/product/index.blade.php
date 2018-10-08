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
    <div class="panel panel-bordered">
        <div class="panel-heading">
            <h3 class="panel-title">Product Merk Management</h3>
        </div>
        <div class="panel-body">
            @can('user-create')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-15">
                        <a href="{{ route('merk.create') }}" class="btn btn-outline btn-primary">
                        <i class="icon wb-plus" aria-hidden="true"></i> Add New Merk
                        </a>
                    </div>
                </div>
            </div>
            @endcan
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                <thead>
                    <tr>
                    <th>No</th>
                        <th>Images</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Images</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                @php($i = 1)
                    @foreach ($merk as $key => $data)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><img src="../images/merk/{{ $data->image }}" width='100px'></td>
                        <td>{{ $data->name }}</td>
                        <td>
                            <a href="{{ route('merk.edit', $data->merk_id) }}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"><i class="icon wb-edit" aria-hidden="true"></i></a>
                            <form id="remove-user" action="{{ route('merk.destroy', $data->merk_id) }}" method="POST" style="display: inline-block;">
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