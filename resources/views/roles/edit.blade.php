@extends('layouts.master')
@section('title') @lang('translation.roles')  @endsection
@section('css')

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.roles')   @endslot
@endcomponent

<div class="row justify-content-center">
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Update role</h4>                
            </div><!-- end card header -->
            <div class="card-body p-4">
                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="roleName" class="form-label">Role name</label>
                                <input type="text" class="form-control" name="roleName" id="roleName" placeholder="Enter status name" value="{{ $role->name }}">
                                @error('roleName')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->                                                
                    </div>
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Permissions</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($permissions as $permission)
                                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                                        <div class="form-check form-switch form-switch-success">
                                            <input class="form-check-input" type="checkbox" role="success" value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="permission-{{ $permission->id }}" name="permissions[{{$permission->name }}]">
                                            <label class="form-check-label" for="permission-{{ $permission->name }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="row">                        
                        <div class="col-lg-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">@lang('translation.update')</button>
                            </div>                           
                        </div><!--end col-->
                    </div>
                </form>
                
            </div>                          
        </div>
    </div>
    <!--end col-->
</div>

@endsection
@section('script')

@endsection
