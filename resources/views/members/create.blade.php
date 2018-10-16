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
    <h1 class="page-title">Create Member</h1>
    <a href="{{route('members.index')}}" class="btn btn-success"> <i class="icon wb-arrow-left" aria-hidden="true"></i> Back</a>
</div>
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
<div class="page-content container-fluid">
    <form action="{{route('members.store')}}" method="post" id="formVarian" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title">Create New Member</h3>
            </div>
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-4">
                        <h4 class="example-title">First Name </h4>
                        <div class="example">
                            <input type="text" name="firstname" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4 class="example-title">Last Name </h4>
                        <div class="example">
                            <input type="text" name="lastname" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4 class="example-title">Sex </h4>
                        <div class="example">
                            <select name="sex" id="" class="form-control">
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="example-title">Birth Place</h4>
                        <div class="example">
                            <input type="text" name="tempat_lahir" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="example-title">Birth Date</h4>
                        <div class="example">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <input type="text" name="tanggal_lahir" class="form-control" id="tanggal" data-plugin="datepicker" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="example-title">Phone</h4>
                        <div class="example">
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="example-title">Email</h4>
                        <div class="example">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="example-title">Password</h4>
                        <div class="example">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="example-title">Referral Code Upline</h4>
                        <div class="example">
                            <input type="text" name="referral_code_2" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="example-title">Photo</h4>
                        <div class="example">
                            <div class="form-group">
                                <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                    <input type="text" class="form-control" readonly="">
                                    <div class="input-group-append">
                                        <span class="btn btn-success btn-file">
                                        <i class="icon wb-upload" aria-hidden="true"></i>
                                        <input type="file" name="photo" multiple="">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--div class="row">
            <div class="col-md-6">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Member Address</h3>
                    </div>
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-md-6">
                                <h4 class="example-title">First Name </h4>
                                <div class="example">
                                    <input type="text" name="city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="example-title">Last Name </h4>
                                <div class="example">
                                    <input type="text" name="subdistrict" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="example-title">Birth Place</h4>
                                <div class="example">
                                    <input type="text" name="province" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="example-title">Zip Code / POS Code</h4>
                                <div class="example">
                                    <input type="text" name="zip" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h4 class="example-title">Address Detail</h4>
                                <div class="example">
                                    <textarea name="detail" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Member Bank</h3>
                    </div>
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-md-6">
                                <h4 class="example-title">Owner </h4>
                                <div class="example">
                                    <input type="text" name="owner" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="example-title">Bank </h4>
                                <div class="example">
                                    <input type="text" name="bank" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="example-title">Branch</h4>
                                <div class="example">
                                    <input type="text" name="cabang" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="example-title">No Account / Rekening</h4>
                                <div class="example">
                                    <input type="text" name="no_account" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div-->
        <div class="panel panel-bordered">
            <div class="panel-body container-fluid">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>
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
<script>
$("#tanggal").datepicker({ dateFormat: 'yyyy-mm-dd' });
</script>
@endsection

