@extends('layouts.master')
@section('title') @lang('translation.laboratories')  @endsection
@section('css')

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.laboratories')   @endslot
@endcomponent

<div class="row">
    <div class="col-xxl-3">
        <div class="card">
            <div class="card-body p-4">
                <div>
                    {{-- <div class="flex-shrink-0 avatar-md mx-auto">
                        <div class="avatar-title bg-light rounded">
                            <img src="{{ URL::asset('build/images/companies/img-2.png') }}" alt="" height="50" />
                        </div>
                    </div> --}}
                    <div class="mt-4 text-center">
                        <span class="text-muted">Laboratory name</span>
                        <h5 class="mb-1">{{$laboratory->name}}</h5>
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <tbody>
                                <tr>
                                    <th><span class="fw-medium">Address</span></th>
                                    <td>{{$laboratory->address}}</td>
                                </tr>                               
                                <tr>
                                    <th><span class="fw-medium">Created at</span></th>
                                    <td>{{$laboratory->created_at}}</td>
                                </tr>
                                <tr>
                                    <th><span class="fw-medium">Updated at</span></th>
                                    <td>{{$laboratory->updated_at}}</td>
                                </tr>
                                <tr>
                                    <th><span class="fw-medium">Status</span></th>
                                    <td><span class="badge  bg-{{$laboratory->status ? $laboratory->status->status_color : ''}} ">{{$laboratory->status ? $laboratory->status->status_name : ''}}</span></td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-body-->                     
        </div>
        <!--end card-->
    </div>
    <!--end col-->

    <div class="col-xxl-9">
        <div class="card">
            <div class="card-header border-0 align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Details</h4>               
            </div><!-- end card header -->

            <div class="card-header  border-0 bg-light-subtle">
                details total subcategories and products
            </div><!-- end card header -->            
        </div><!-- end card -->       
        <div class="card">
            <div class="card-header border-0 align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">products</h4>               
            </div><!-- end card header -->
            <div class="card-body">
                
            </div>
        </div>

    </div>
    <!--end col-->
</div>

@endsection
@section('script')

@endsection
