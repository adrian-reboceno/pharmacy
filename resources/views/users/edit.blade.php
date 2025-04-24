@extends('layouts.master')
@section('title') @lang('translation.users')  @endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

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
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Personal Details
                            </a>
                        </li>                                  
                    </ul>
                </div>           
                    
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel"> 
                                <form method="POST" action="{{ route('users.update', $user->id) }}"  enctype="multipart/form-data">
                                    @csrf                         
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{$user->name}}">
                                                @error('name')                                           
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="paternal_surname" class="form-label">Paternal surname</label>
                                                <input type="text" class="form-control" id="paternal_surname" name="paternal_surname" placeholder="Enter your lastname" value="{{$user->paternal_surname}}">
                                                
                                                @error('paternal_surname')                                           
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="maternal_surname" class="form-label">Maternal surname</label>
                                                <input type="text" class="form-control" id="maternal_surname" name="maternal_surname" placeholder="Enter your lastname" value="{{$user->maternal_surname}}">
                                                @error('maternal_surname')                                           
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumbert" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" id="phonenumbert"  name="phonenumbert" placeholder="Enter your phone number" value="{{$user->phone_number}}">
                                                @error('phonenumbert')                                           
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="{{$user->email}}">
                                                @error('email')                                           
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>                                        
                                        <!--end col-->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label for="roles" class="form-label">Role</label>                                               
                                                <select class="js-example-basic-multiple" name="roles[]" multiple="multiple">                                            
                                                    @foreach ( $roles as $role)
                                                        <option value="{{ $role->name }}" {{$user->hasRole($role->name) ? 'selected' : ''}} >{{ $role->name }}</option>
                                                    @endforeach  
                                                </select>
                                                @error('roles')                                           
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label for="status_id" class="form-label">Status</label>                                               
                                                <select name="status_id" id="status_id" class="form-select mb-3" aria-label="Default select example">
                                                    @foreach ( $statuses as $status)
                                                        <option value="{{ $status->id }}" {{$status->id ==  $user->status_id ? 'selected' : ''}} >{{ $status->status_name }}</option>
                                                    @endforeach 
                                                </select>
                                                @error('status_id')                                           
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="submit" class="btn btn-primary">@lang('translation.update')</button>
                                                {{-- <button type="button" class="btn btn-soft-success">Cancel</button> --}}
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--select2 cdn-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('assets/js/pages/select/select2.init.js') }}"></script>

@endsection

