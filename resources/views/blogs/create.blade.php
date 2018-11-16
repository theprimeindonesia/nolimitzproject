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
			<h3 class="panel-title">Create New Blog</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-8">
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
							<form class="form-horizontal" method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data"> 
							@csrf
							<input type="text" class="form-control" id="inputPlaceholder" placeholder="Enter Title Here" name="title_ind">
							<br>
							<textarea id="summernote" data-plugin="summernote" autofocus name="article_ind"></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<h4 class="example-title">Category</h4>
					<div class="form-group">
						<select class="form-control" name="category_blogs_id">
							<option value="">(Choose)</option>
							@foreach($categoryBlogs as $cb)
							<option value="{{ $cb->category_blogs_id }}">{{ $cb->name_ind.' - '.$cb->name_en }}</option>
							@endforeach
						</select>
					</div>
					<h4 class="example-title">Featured Image</h4>
					<div class="form-group">
						<div class="input-group input-group-file" data-plugin="inputGroupFile">
							<input type="text" class="form-control" readonly="">
							<div class="input-group-append">
								<span class="btn btn-success btn-file">
									<i class="icon wb-upload" aria-hidden="true"></i>
									<input type="file" name="blogImages" multiple="">
								</span>
							</div>
						</div>
					</div>
					<button type="submit" value="Submit" class="btn btn-lg btn-primary" style="width: 100%">Publish </button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection