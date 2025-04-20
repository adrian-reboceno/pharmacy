@extends('layouts.master')
@section('title') @lang('translation.users')  @endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">

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
<form method="POST" action="{{ route('users.store') }}"  enctype="multipart/form-data">
@csrf
    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">                 
                    <div class="avatar-xl mx-auto">
                        <input type="file" class="filepond filepond-input-circle" name="avatar"
                            accept="image/png, image/jpeg, image/gif" />
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
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{old('name') }}">
                                            @error('name')                                           
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="paternal_surname" class="form-label">Paternal surname</label>
                                            <input type="text" class="form-control" id="paternal_surname" name="paternal_surname" placeholder="Enter your lastname" value="{{old('paternal_surname') }}">
                                            @error('paternal_surname')                                           
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="maternal_surname" class="form-label">Maternal surname</label>
                                            <input type="text" class="form-control" id="maternal_surname" name="maternal_surname" placeholder="Enter your lastname" value="{{old('maternal_surname') }}">
                                            @error('maternal_surname')                                           
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumbert" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phonenumbert"  name="phonenumbert" placeholder="Enter your phone number" value="{{old('phonenumbert') }}">
                                            @error('phonenumbert')                                           
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="{{old('email') }}">
                                            @error('email')                                           
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col--> 
                                    <div class="row border border-dashed border-start-0 border-end-0">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your assword">
                                                @error('password')                                           
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Password confirmation</label>
                                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter your password confirmation" >
                                                @error('password_confirmation')                                           
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label for="roles" class="form-label">Role</label>                                               
                                                <select class="js-example-basic-multiple" name="roles[]" multiple="multiple">                                                 
                                                    @foreach ( $roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
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
                                                        <option value="{{ $status->id }}" >{{ $status->status_name }}</option>
                                                    @endforeach 
                                                </select>
                                                @error('status_id')                                           
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">@lang('translation.create')</button>
                                            {{-- <button type="button" class="btn btn-soft-success">Cancel</button> --}}
                                        </div>
                                    </div>
                                    <!--end col-->                                   
                                </div>
                                <!--end row-->                            
                            </div>
                            <!--end tab-pane-->                     
                        </div>
                    </div>               
            </div>
        </div>
        <!--end col-->
    </div>
</form>
<!--end row-->
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"> </script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"> </script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/users/user.init.js') }}"></script>
    
    
    <script src="{{ URL::asset('assets/js/pages/select2.init.js') }}"></script>
    
@endsection

