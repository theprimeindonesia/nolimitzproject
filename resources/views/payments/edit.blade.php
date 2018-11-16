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
			<h3 class="panel-title">Edit Payment</h3>
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
					{!! Form::model($data, ['class' => 'form-horizontal','enctype' => 'multipart/form-data','method' => 'PATCH','route' => ['payments.update', $data->payments_id]]) !!}
                        {{method_field('PATCH')}}
						@csrf
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Name: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="name" placeholder="payment Name" autocomplete="off"
									value="{{$data['name']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Username: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="username" placeholder="" autocomplete="off"
									value="{{$data['username']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Email: </label>
								<div class="col-md-9">
									<input type="email" class="form-control" name="email" placeholder="" autocomplete="off"
									value="{{$data['email']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Password: </label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="" autocomplete="off"
								 required="true"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">No Account: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="no_account" placeholder="" autocomplete="off"
									value="{{$data['no_account']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Status: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="status" placeholder="" autocomplete="off"
									value="{{$data['status']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Type: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="type" placeholder="" autocomplete="off"
									value="{{$data['type']}}"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 form-control-label">Images: </label>
								<div class="col-md-9">
									<div class="input-group input-group-file" data-plugin="inputGroupFile">
										<input class="form-control" readonly="" name="image" type="text" value="{{$data['image']}}">
											<div class="input-group-append">
												<span class="btn btn-success btn-file">
												<i class="icon wb-upload" aria-hidden="true"></i>
												<input name="images"   type="file">
												</span>
											</div>
										</div>
										<hr/>
										<img src="{{ asset('images/payments/'. $data['image']) }}" width="100">
									</div>
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