@extends('layouts.master')
@section('title') @lang('translation.saletypes')  @endsection
@section('css')


@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.saletypes')   @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card mt-n4 mx-n4">
            <div class="bg-warning-subtle">
                <div class="card-body pb-0 px-4">
                    <div class="row mb-3">
                        <div class="col-md">
                            <div class="row align-items-center g-3">
                                <div class="col-md-auto">
                                    {{-- <div class="avatar-md">
                                        <div class="avatar-title bg-white rounded-circle">
                                            <img src="{{ URL::asset('build/images/brands/slack.png') }}" alt="" class="avatar-xs">
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-md">
                                    <div>
                                        <h4 class="fw-bold">{{$saleType->name}}</h4>
                                        <div class="hstack gap-3 flex-wrap">                                          
                                            <div class="vr"></div>
                                            <div>Create Date : <span class="fw-medium">{{$saleType->created_at}}</span></div>
                                            <div class="vr"></div>
                                            <div>Due Date : <span class="fw-medium">{{$saleType->updated_at}}</span></div>
                                            <div class="vr"></div>                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>

                    <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview"
                                role="tab">
                                Overview
                            </a>
                        </li>                       
                    </ul>
                </div>
                <!-- end card body -->
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="tab-content text-muted">
            <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                <div class="row">
                    <div class="col-xl-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-muted">
                                    <h6 class="mb-3 fw-semibold text-uppercase">Summary</h6>
                                    <p>{{$saleType->description}}</p>                                  
                                    <div class="pt-3 border-top border-top-dashed mt-4">
                                        <div class="row apps-pro-ov">
                                            <div class="col-lg-3 col-sm-6">
                                                <div>
                                                    <p class="mb-2 text-uppercase fw-medium">Create Date :</p>
                                                    <h5 class="fs-15 mb-0">{{$saleType->created_at}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div>
                                                    <p class="mb-2 text-uppercase fw-medium">Due Date :</p>
                                                    <h5 class="fs-15 mb-0">{{$saleType->updated_at}}</h5>
                                                </div>
                                            </div>                                           
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->                   
                </div>
                <!-- end row -->
            </div>
            <!-- end tab pane -->           
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->


@endsection
@section('script')

@endsection
