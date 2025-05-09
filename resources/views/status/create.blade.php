@extends('layouts.master')
@section('title') @lang('translation.status')  @endsection
@section('css')

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.status')   @endslot
@endcomponent

<div class="row justify-content-center">
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Create status</h4>                
            </div><!-- end card header -->
            <div class="card-body p-4">
                <form method="POST" action="{{ route('status.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_name" class="form-label">Status name</label>
                                <input type="text" class="form-control" name="status_name" id="status_name" placeholder="Enter status name" value="{{ old('status_name') }}">
                                @error('status_name')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description">{{old('description')}}</textarea>
                                @error('description')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="status_color" class="form-label">Color</label>
                                <select class="form-select" name="status_color" id="status_color">                                  
                                    <option value="success">Success</option>
                                    <option value="primary opacity-25" >Opacity-25</option>
                                    <option value="warning" >Warning</option>
                                    <option value="danger">Danger</option>
                                    <option value="primary bg-opacity-75" >Opacity-75 </option>                                   
                                </select>                              
                                @error('status_color')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exclusive" class="form-label">Exclusive</label>
                                <select class="form-select" name="exclusive" id="exclusive">                                  
                                    <option value="system">System</option>
                                    <option value="product" >Product</option>   
                                    <option value="batch" >Batch</option>                                                                    
                                </select>                              
                                @error('exclusive')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">@lang('translation.create')</button>
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
