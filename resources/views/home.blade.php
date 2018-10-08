@extends('layouts.app')
@section('custom_styles')
<link rel="stylesheet" href="{{ asset('global/vendor/chartist/chartist.css') }}">
<link rel="stylesheet" href="{{ asset('global/vendor/jvectormap/jquery-jvectormap.css') }}">
<link rel="stylesheet" href="{{ asset('global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/examples/css/dashboard/v1.css') }}">
@endsection
@section('custom_fonts')
<link rel="stylesheet" href="{{ asset('global/fonts/weather-icons/weather-icons.css') }}">
@endsection
@section('custom_scripts')
<script src="{{ asset('global/vendor/skycons/skycons.js') }}"></script>
<script src="{{ asset('global/vendor/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js') }}"></script>
<script src="{{ asset('global/vendor/aspieprogress/jquery-asPieProgress.min.js') }}"></script>
<script src="{{ asset('global/vendor/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('global/vendor/jvectormap/maps/jquery-jvectormap-au-mill-en.js') }}"></script>
<script src="{{ asset('global/vendor/matchheight/jquery.matchHeight-min.js') }}"></script>
@endsection
@section('custom_page')
<script src="{{ asset('global/js/Plugin/matchheight.js') }}"></script>
<script src="{{ asset('global/js/Plugin/jvectormap.js') }}"></script>

<script src="{{ asset('admin/assets/examples/js/dashboard/v1.js') }}"></script>
@endsection
@section('content')
  
@endsection
