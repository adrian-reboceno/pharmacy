@extends('layouts.master')
@section('title') @lang('translation.users')  @endsection
@section('css')


@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.users')   @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row gx-lg-5">
                    <div class="col-xl-4 col-md-8 mx-auto">
                        <!-- figures Images -->                       
                        <figure class="figure mb-0">
                            <img src="{{asset('storage/'.$user->avatar) }}" class="figure-img img-fluid rounded" alt="...">                            
                        </figure>
                        <!-- end figure --> 
                    </div>
                    <!-- end col -->
                    <div class="col-xl-8">
                        <div class="mt-xl-0 mt-5">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h4>{{$user->name}} {{$user->paternal_surname}} {{$user->maternal_surname}}</h4>
                                    <div class="hstack gap-3 flex-wrap">
                                        
                                        <div class="text-muted">Job name: <span
                                                class="text-body fw-medium">-</span>
                                        </div>
                                        <div class="vr"></div>
                                        <div class="text-muted">Created at : <span
                                                class="text-body fw-medium">{{$user->created_at}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div>
                                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                    </div>
                                </div>
                            </div>

                           

                            <div class="row mt-4">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div
                                                    class="avatar-title rounded bg-transparent text-success fs-24">
                                                    <i class="ri-admin-line"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Role :</p>
                                                <h5 class="mb-0">Admin</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-2 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div
                                                    class="avatar-title rounded bg-transparent text-success fs-24">
                                                    <i class="ri-file-copy-2-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Status :</p>
                                                {{-- <h5 class="mb-0">2,234</h5> --}}
                                                <span class="badge  bg-{{$user->status ? $user->status->status_color : ''}} ">{{$user->status ? $user->status->status_name : ''}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div
                                                    class="avatar-title rounded bg-transparent text-success fs-24">
                                                    <i class="ri-calendar-todo-fill "></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">created at :</p>
                                                <h5 class="mb-0">{{$user->created_at}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-3 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div
                                                    class="avatar-title rounded bg-transparent text-success fs-24">
                                                    <i class="ri-calendar-todo-fill "></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Updated at :</p>
                                                <h5 class="mb-0">{{$user->updated_at}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>

                            <!-- end row -->

                            <div class="mt-4 text-muted">
                                <h5 class="fs-14">Description :</h5>
                                <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton.
                                    Material composition is 100% organic cotton. This is one of the
                                    world’s leading designer lifestyle brands and is internationally
                                    recognized for celebrating the essence of classic American cool
                                    style, featuring preppy with a twist designs.</p>
                            </div>     
                            <!-- end description -->                                                                              
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>

@endsection
@section('script')

@endsection
