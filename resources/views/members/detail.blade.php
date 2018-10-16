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
<link rel="stylesheet" href="{{asset('admin/assets/examples/css/pages/profile.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/examples/css/dashboard/ecommerce.css')}}">


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
@section('custom_body')
page-profile
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
<script src="{{asset('admin/assets/examples/js/dashboard/ecommerce.js')}}"></script>
@endsection
@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <!-- Page Widget -->
            <div class="card card-shadow text-center">
                <div class="card-block">
                    <a class="avatar avatar-lg" href="javascript:void(0)">
                    <img src="{{url('public/images/photo',$data['photo'])}}" alt="...">
                    </a>
                    <h3 class="profile-user">{{$data['firstname']}} {{$data['lastname']}}</h3>
                    <h4>{{$data['dompet']}}</h4>
                </div>
                <div class="card-footer">
                    <div class="row no-space">
                        <div class="col-6">
                            <strong class="profile-stat-count">{{$data->referralsa->count()}}</strong>
                            <span>Referrals</span>
                        </div>
                        <div class="col-6">
                            <strong class="profile-stat-count">{{$data->orders->count()}}</strong>
                            <span>Order</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Widget -->
        </div>
        <div class="col-lg-9">
            <!-- Panel -->
            <div class="panel">
                <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
                    <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                        <li class="nav-item" role="presentation"><a class="active nav-link" data-toggle="tab" href="#order"
                            aria-controls="activities" role="tab">Orders</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#referral" aria-controls="profile"
                            role="tab">Referrals</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#bank" aria-controls="messages"
                            role="tab">Bank</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#profile" aria-controls="messages"
                            role="tab">Profile</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#address" aria-controls="messages"
                            role="tab">Addresses</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active animation-slide-left" id="order" role="tabpanel">
                            <div class="col-lg-12" id="ecommerceRecentOrder">
                                <div class="card card-shadow table-row">
                                    <div class="card-header card-header-transparent py-20 ">
                                        <div class="btn-group dropdown float-right">
                                            <a href="#" class="text-body dropdown-toggle blue-grey-700" data-toggle="dropdown">RECENT ORDER</a>
                                            <div class="dropdown-menu animate" role="menu">
                                                <a class="dropdown-item" href="#" role="menuitem">Sales</a>
                                                <a class="dropdown-item" href="#" role="menuitem">Total sales</a>
                                                <a class="dropdown-item" href="#" role="menuitem">profit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block bg-white table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Tracking Number</th>
                                                    <th>Sub Total</th>
                                                    <th>Discount</th>
                                                    <th>Grand Total</th>
                                                    <th>Status#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data['orders'] as $o)
                                                <tr>
                                                    <td>{{$o['created_at']}}</td>
                                                    <td>{{$o['resi']}}</td>
                                                    <td>Rp. {{number_format($o['total'],0,',','.')}}</td>
                                                    <td>Rp. {{number_format($o['discount'],0,',','.')}}</td>
                                                    <td>Rp. {{number_format($o['grand_total'],0,',','.')}}</td>
                                                    <td>
                                                    @if($o['status'] === 'ORDER')
                                                        <span class="badge badge-warning font-weight-100">{{$o['status']}}</span>
                                                    @elseif($o['status'] === 'PAID')
                                                        <span class="badge badge-success font-weight-100">{{$o['status']}}</span>
                                                    @elseif($o['status'] === 'PACKAGING')
                                                        <span class="badge badge-danger font-weight-100">{{$o['status']}}</span>
                                                    @elseif($o['status'] === 'SHIPPING')
                                                        <span class="badge badge-primary font-weight-100">{{$o['status']}}</span>
                                                    @elseif($o['status'] === 'DELIVERED')
                                                        <span class="badge badge-success font-weight-100">{{$o['status']}}</span>
                                                    @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animation-slide-left" id="referral" role="tabpanel">
                        <br>
                        <div class="card border border-primary col-md-8">
                                <div class="card-block">
                                    <h4 class="card-title">
                                       {{$data['referralsb']['membersb']['firstname']}} {{$data['referralsb']['membersb']['lastname']}}
                                    </h4>
                                    <p>Your Upline</p>
                                </div>
                            </div>
                            <div class="col-lg-12" id="ecommerceRecentOrder">
                                <div class="card card-shadow table-row">
                                    <div class="card-block bg-white table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Order</th>
                                                    <th>Total#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data['referralsa'] as $r)
                                                <tr>
                                                    <td><img src="{{url('public/images/photo',$r['membersb']['photo'])}}" width="100" height="100"></td>
                                                    <td>{{$r['membersb']['firstname']}} {{$r['membersb']['lastname']}}</td>
                                                    <td>{{$r->membersb->orders->count()}}</td>
                                                    <td>{{$r->membersb->orders->sum('grand_total')}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animation-slide-left" id="bank" role="tabpanel">
                            <br/>
                            <a href="{{route('members.bank',$data['members_id'])}}" class="btn btn-bordered btn-primary"> Add New Bank</a>
                            <hr/>
                            @foreach($data['memberbank'] as $b)
                            <div class="card border border-primary col-md-8">
                                <div class="card-block">
                                    <h4 class="card-title">
                                        {{$b['bank']}}
                                        <div class="float-right">
                                            <a href="{{route('members.bank.edit',$b['member_bank_id'])}}" class="btn btn-sm btn-warning"><i class="icon wb-pencil"></i> </a>
                                            <form id="remove-user" action="{{route('members.bank.destroy',$b->member_bank_id)}}" method="POST" style="display: inline-block;">
                                                @csrf
                                                <button onclick="return confirm('Are you sure you want to delete this ?');" type="submit" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row"><i class="icon wb-trash" aria-hidden="true"></i></button>
                                            </form>
                                            </div>
                                    </h4>
                                    <p class="card-text">
                                    <table class="table">
                                        <tr>
                                            <td>No Account</td>
                                            <td>:</td>
                                            <td>{{$b['no_account']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Owner</td>
                                            <td>:</td>
                                            <td>{{$b['owner']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Branch</td>
                                            <td>:</td>
                                            <td>{{$b['cabang']}}</td>
                                        </tr>
                                    </table>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="tab-pane animation-slide-left" id="profile" role="tabpanel">
                            <br/>
                                <a href="{{route('members.edit',$data['members_id'])}}" class="btn btn-bordered btn-primary"> Edit</a>
                            <hr/>
                            <div class="card p-20">
                                <div class="card-block p-0">
                                    <p data-info-type="phone" class="mb-10 text-nowrap">
                                        <i class="icon wb-bell mr-10"></i>
                                        <span class="text-break">{{$data['phone']}}
                                        <span>
                                        </span></span>
                                    </p>
                                    <p data-info-type="email" class="mb-10 text-nowrap">
                                        <i class="icon wb-envelope mr-10"></i>
                                        <span class="text-break">{{$data['email']}}
                                        <span>
                                        </span></span>
                                    </p>
                                    <p data-info-type="fb" class="mb-10 text-nowrap">
                                        <i class="icon wb-user mr-10"></i>
                                        <span class="text-break">{{$data['sex']}}
                                        <span>
                                        </span></span>
                                    </p>
                                    <p data-info-type="twitter" class="mb-10 text-nowrap">
                                        <i class="icon fa-calendar" aria-hidden="true"></i>
                                        <span class="text-break">{{$data['tempat_lahir']}}, {{$data['tanggal_lahir']}}
                                        <span>
                                        </span></span>
                                    </p>
                                    <p data-info-type="address" class="mb-10 text-nowrap">
                                        <i class="icon wb-link mr-10"></i>
                                        <span class="text-break">{{$data['referral_code']}}
                                        <span>
                                        </span></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animation-slide-left" id="address" role="tabpanel">
                            <br/>
                            <a href="{{route('members.address',$data['members_id'])}}" class="btn btn-bordered btn-primary"> Add New Address</a>
                            <hr/>
                            <div class="col-lg-12" id="ecommerceRecentOrder">
                                <div class="card card-shadow table-row">
                                    <div class="card-block bg-white table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Delivery Address</th>
                                                    <th>Delivery Area</th>
                                                    <th>Pin Point</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data['memberaddresses'] as $a)
                                                <tr>
                                                    <td>{{$a['addresses']['detail']}}</td>
                                                    <td>{{$a['addresses']['subdistrict']}}, {{$a['addresses']['city']}} - {{$a['addresses']['province']}}, {{$a['addresses']['zip']}} </td>
                                                    <td>
                                                    @if(empty($a['addresses']['lat']))
                                                        <button class="btn btn-defaul btn-sm"><i class="icon wb-map" aria-hidden="true"></i></button>
                                                    @else
                                                        <button class="btn btn-success btn-sm"><i class="icon wb-map" aria-hidden="true"></i></button>
                                                    @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('members.address.edit',$a->addresses->addresses_id)}}" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                                                        <form id="remove-user" action="{{route('members.address.destroy',$a->addresses->addresses_id)}}" method="POST" style="display: inline-block;">
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Panel -->
        </div>
    </div>
</div>
@endsection
@section('custom_scripts')
<script src="{{asset('global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
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
<script src="{{asset('global/js/Plugin/responsive-tabs.js')}}"></script>
<script src="{{asset('global/js/Plugin/tabs.js')}}"></script>
@endsection