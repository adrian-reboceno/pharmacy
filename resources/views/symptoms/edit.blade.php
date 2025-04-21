@extends('layouts.master')
@section('title') @lang('translation.symptoms')  @endsection
@section('css')

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.symptoms')   @endslot
@endcomponent

<div class="row justify-content-center">
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Update symptom</h4>                
            </div><!-- end card header -->
            <div class="card-body p-4">
                <form method="POST" action="{{ route('symptoms.update', $symptom->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="symptom_name" class="form-label">Sale type name</label>
                                <input type="text" class="form-control" name="symptom_name" id="symptom_name" placeholder="Enter status name" value="{{ $symptom->symptom_name }}">
                                @error('symptom_name')                                           
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
