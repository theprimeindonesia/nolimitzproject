@extends('layouts.app')
@section('custom_styles')
<link rel="stylesheet" href="{{ asset('admin/assets/examples/css/forms/layouts.css') }}">
@endsection
@section('custom_scripts')
<script src="{{ asset('global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
@endsection
@section('custom_page')
<script src="{{ asset('global/js/Plugin/input-group-file.js') }}"></script>
<script src="{{ asset('global/js/Plugin/jquery-placeholder.js') }}"></script>
<script>
	(function(document, window, $){
		'use strict';

		var Site = window.Site;
		$(document).ready(function(){
			Site.run();
		});
	})(document, window, jQuery);
</script>
@endsection
@section('content')
<!-- Panel Basic -->
<div class="page-content">
	<div class="panel panel-bordered">
		<div class="panel-heading">
			<h3 class="panel-title">Create New Suplliers</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-12 col-lg-12">
				<div class="example-wrap">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
						</ul>
					</div>
					@endif
					<div class="example">
						{!! Form::model($data, ['class' => 'form-horizontal','enctype' => 'multipart/form-data','method' => 'PATCH','route' => ['suppliers.update', $data->suppliers_id]]) !!}
                        {{method_field('PATCH')}}
						@csrf
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Name: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="name"  autocomplete="off" value="{{$data['name']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Contact: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="contact"  autocomplete="off" value="{{$data['contact']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Sales: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="contact_sales"  autocomplete="off" value="{{$data['contact_sales']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">City: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="city"  autocomplete="off" value="{{$data['addresses']['city']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Subdistrict : </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="subdistrict"  autocomplete="off" value="{{$data['addresses']['subdistrict']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Province: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="province"  autocomplete="off" value="{{$data['addresses']['province']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">POS Code: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="zip"  autocomplete="off" value="{{$data['addresses']['zip']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Detail: </label>
								<div class="col-md-9">
									<textarea class="form-control" name="detail"  autocomplete="off">{{$data['addresses']['detail']}}</textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-9 offset-md-3">
									<button type="submit" value="Submit" class="btn btn-primary">Submit </button>
									<button type="reset" class="btn btn-default btn-outline">Reset</button>
								</div>
							</div>
							{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection