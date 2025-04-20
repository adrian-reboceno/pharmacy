@extends('layouts.master')
@section('title') @lang('translation.laboratories')  @endsection
@section('css')

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.laboratories')   @endslot
@endcomponent

<div class="row justify-content-center">
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Create Laboratory</h4>                
            </div><!-- end card header -->
            <div class="card-body p-4">
                <form method="POST" action="{{ route('laboratories.update', $laboratory->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="laboratory_name" class="form-label">Laboratory name</label>
                                <input type="text" class="form-control" name="laboratory_name" id="laboratory_name" placeholder="Enter laboratory name" value="{{ $laboratory->name }}">
                                @error('laboratory_name')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter address">{{ $laboratory->address }}</textarea>
                                @error('address')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->                       
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">Status</label>                                               
                                <select name="status_id" id="status_id" class="form-select mb-3" aria-label="Default select example">
                                    @foreach ( $statuses as $status)
                                        <option value="{{ $status->id }}" {{$status->id ==  $laboratory->status_id ? 'selected' : ''}} >{{ $status->status_name }}</option>
                                    @endforeach 
                                </select>
                                @error('status_id')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
