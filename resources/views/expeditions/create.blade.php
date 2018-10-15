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
			<h3 class="panel-title">Create New Expedition</h3>
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
						<form class="form-horizontal" method="POST" action="{{ route('expeditions.store') }}" enctype="multipart/form-data"> 
						@csrf
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Name: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="name" placeholder="Expedition Name" autocomplete="off"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Contact: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="contact" placeholder="" autocomplete="off"
									/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Type: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="type" placeholder="" autocomplete="off"
									/>
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