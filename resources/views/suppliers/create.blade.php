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
						<form class="form-horizontal" method="POST" action="{{ route('suppliers.store') }}" enctype="multipart/form-data"> 
						@csrf
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Name: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="name"  autocomplete="off"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Contact: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="contact"  autocomplete="off"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Sales: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="contact_sales"  autocomplete="off"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">City: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="city"  autocomplete="off"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Subdistrict : </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="subdistrict"  autocomplete="off"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Province: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="province"  autocomplete="off"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">POS CODE: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="zip"  autocomplete="off"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Detail: </label>
								<div class="col-md-9">
									<textarea class="form-control" name="detail"  autocomplete="off"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-9 offset-md-3">
									<button type="submit" value="Submit" class="btn btn-primary">Submit </button>
									<button type="reset" class="btn btn-default btn-outline">Reset</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection