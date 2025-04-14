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
                <form method="POST" action="{{ route('status.update', $status->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status_name" class="form-label">Status name</label>
                                <input type="text" class="form-control" name="status_name" id="status_name" placeholder="Enter status name" value="{{ $status->status_name }}">
                                @error('status_name')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description">{{$status->description}}</textarea>
                                @error('description')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="status_color" class="form-label">Color</label>
                                <select class="form-select" name="status_color" id="status_color">                                  
                                    <option value="success" @if($status->status_color == 'success') selected @endif>Success</option>
                                    <option value="primary opacity-25" @if($status->status_color == 'primary opacity-25') selected @endif>Opacity-25</option>
                                    <option value="warning" @if($status->status_color == 'warning') selected @endif>Warning</option>
                                    <option value="danger" @if($status->status_color == 'danger') selected @endif>Danger</option>
                                    <option value="primary bg-opacity-75" @if($status->status_color == 'primary bg-opacity-75') selected @endif>Opacity-75 </option>                                   
                                </select>                              
                                @error('status_color')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->
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
