@extends('layouts.master')
@section('title') @lang('translation.batches')  @endsection
@section('css')

{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" /> --}}


@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.batches')   @endslot
@endcomponent

<div class="row justify-content-center">
    <div class="col-xxl-9">

        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#addbatches-general-info" role="tab">
                            General Info
                        </a>
                    </li>                 
                </ul>
            </div>
            
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="addbatches-general-info" role="tabpanel">
                        <form method="POST" action="{{ route('batches.store') }}" >
                            @csrf
                            
                            <livewire:batch-form /> 
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-primary">@lang('translation.create')</button>
                                    {{-- <button type="button" class="btn btn-soft-success">Cancel</button> --}}
                                </div>
                            </div>
                        <!--end col-->   
                        </form>     
                    </div>                
                            
                    <!-- end tab pane -->
                </div>
                <!-- end tab content -->
            </div>
                <!-- end card body -->
        </div>
    </div>
    <!--end col-->
</div>

@endsection
@section('script')  
    <!-- flatpickr.js -->
    <script type='text/javascript' src='{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}'></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--select2 cdn-->
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>   --}} 
    <script src="{{ URL::asset('assets/libs/prismjs/prism.js') }}"></script>    
   {{--  <script src="{{ URL::asset('assets/js/pages/select/select2.init.js') }}"></script> --}}
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection

