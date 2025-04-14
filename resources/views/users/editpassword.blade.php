@extends('layouts.master')
@section('title') @lang('translation.users')  @endsection
@section('css')


@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.users')   @endslot
@endcomponent

<div class="position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg profile-setting-img">
        <img src="{{ URL::asset('build/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">        
    </div>
</div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src=" @if($user->avatar != '') {{ asset('storage/'.$user->avatar) }} @else {{ asset('assets/images/users/user-dummy-img.jpg') }} @endif"
                                class="  rounded-circle avatar-xl img-thumbnail user-profile-image"
                                alt="user-profile-image">                            
                        </div>                    
                    </div>
                    
                </div>
            </div>
            <!--end card-->      
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">                     
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#changePassword" role="tab">
                                <i class="far fa-user"></i>
                                Change Password
                            </a>
                        </li>                
                    </ul>
                </div>           
                    
                    <div class="card-body p-4">
                        <div class="tab-content">                            
                            <!--end tab-pane-->   
                            <div class="tab-pane active" id="changePassword" role="tabpanel">
                                <form action="{{route('users.updatePassword', $user->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-2">                                        
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="password" class="form-label">New
                                                    Password*</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password">
                                            </div>
                                            @error('password')                                           
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="password_confirmation" class="form-label">Confirm  Password*</label>
                                                <input type="password" name="password_confirmation"  class="form-control" id="password_confirmation"  placeholder="Confirm password">
                                            </div>
                                        </div>
                                        <!--end col-->                                       
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success">Change Password</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>                               
                            </div>
                            <!--end tab-pane-->                  
                        </div>
                    </div>
            </div>
        </div>
        <!--end col-->
    </div>
<!--end row-->
@endsection
@section('script')

@endsection

