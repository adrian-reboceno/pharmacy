@extends('layouts.master')
{{-- @extends('layouts.layouts-horizontal') --}}
@section('title') @lang('translation.products')  @endsection
@section('css')

<link href="{{ URL::asset('assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.products')   @endslot
@endcomponent
{{-- {{ asset('storage/'.$user->avatar) }} --}}
{{-- {{dd($product)}} --}}



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row gx-lg-5">
                    <div class="col-xl-4 col-md-8 mx-auto">
                        <div class="product-img-slider sticky-side-div">
                            <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                <div class="swiper-wrapper">
                                    @foreach ($productImages as $imagen)
                                        <div class="swiper-slide">
                                            <img src=" {{ asset('storage/'.$imagen->image_path) }}  " alt=""
                                                class="img-fluid d-block" />
                                        </div>
                                    @endforeach                                 
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <!-- end swiper thumbnail slide -->
                            <div class="swiper product-nav-slider mt-2">
                                <div class="swiper-wrapper">
                                    @foreach ($productImages as $imagen)
                                        <div class="swiper-slide">
                                            <div class="nav-slide-item">
                                                <img src=" {{ asset('storage/'.$imagen->image_path) }}  " alt=""
                                                    class="img-fluid d-block" />
                                            </div>
                                        </div>
                                    @endforeach                                   
                                </div>
                            </div>
                            <!-- end swiper nav slide -->
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-8">
                        <div class="mt-xl-0 mt-5">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h4>{{$product->name}}</h4>
                                    <div class="hstack gap-3 flex-wrap">
                                        <div><span class="text-primary d-block">{{$product->category->category_name}}</span></div>
                                        <div class="vr"></div>
                                        <div class="text-muted">barcode <span class="text-body fw-medium">{{$product->barcode}}</span></div>
                                        
                                        <div class="vr"></div>
                                        <div class="text-muted">
                                            Labodatory : 
                                            <span class="text-body fw-medium">{{$product->laboratory->name}}</span>
                                        </div>
                                        <div class="vr"></div>
                                        <div class="text-muted">
                                            Status : 
                                            <span class="badge  bg-{{$product->status ? $product->status->status_color : ''}} ">{{$product->status ? $product->status->status_name : ''}}</span>
                                        </div>
                                        <div class="vr"></div>
                                        {{-- <div class="text-muted">
                                            Published : 
                                            <span class="text-body fw-medium">{{$product->created_at}}</span>
                                        </div> --}}
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
                                                    <i class="ri-money-dollar-circle-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Price x box:</p>
                                                <h5 class="mb-0">$77.00</h5>
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
                                                    <i class="ri-money-dollar-circle-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Price x blister :</p>
                                                <h5 class="mb-0">$38.50</h5>
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
                                                    <i class="ri-stack-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Price x piece :</p>
                                                <h5 class="mb-0">$3.85</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>

                            {{-- <div class="row">
                                <div class="col-xl-6">
                                    <div class=" mt-4">
                                        <h5 class="fs-14">Sizes :</h5>
                                        <div class="d-flex flex-wrap gap-2">
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Out of Stock">
                                                <input type="radio" class="btn-check"
                                                    name="productsize-radio" id="productsize-radio1"
                                                    disabled>
                                                <label
                                                    class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center"
                                                    for="productsize-radio1">S</label>
                                            </div>

                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="04 Items Available">
                                                <input type="radio" class="btn-check"
                                                    name="productsize-radio"
                                                    id="productsize-radio2">
                                                <label
                                                    class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center"
                                                    for="productsize-radio2">M</label>
                                            </div>
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="06 Items Available">
                                                <input type="radio" class="btn-check"
                                                    name="productsize-radio"
                                                    id="productsize-radio3">
                                                <label
                                                    class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center"
                                                    for="productsize-radio3">L</label>
                                            </div>

                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Out of Stock">
                                                <input type="radio" class="btn-check"
                                                    name="productsize-radio" id="productsize-radio4"
                                                    disabled>
                                                <label
                                                    class="btn btn-soft-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center"
                                                    for="productsize-radio4">XL</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-xl-6">
                                    <div class=" mt-4">
                                        <h5 class="fs-14">Colors :</h5>
                                        <div class="d-flex flex-wrap gap-2">
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="Out of Stock">
                                                <button type="button"
                                                    class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-primary"
                                                    disabled>
                                                    <i class="ri-checkbox-blank-circle-fill"></i>
                                                </button>
                                            </div>
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="03 Items Available">
                                                <button type="button"
                                                    class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-secondary">
                                                    <i class="ri-checkbox-blank-circle-fill"></i>
                                                </button>
                                            </div>
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="03 Items Available">
                                                <button type="button"
                                                    class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-success">
                                                    <i class="ri-checkbox-blank-circle-fill"></i>
                                                </button>
                                            </div>
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="02 Items Available">
                                                <button type="button"
                                                    class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-info">
                                                    <i class="ri-checkbox-blank-circle-fill"></i>
                                                </button>
                                            </div>
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="01 Items Available">
                                                <button type="button"
                                                    class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-warning">
                                                    <i class="ri-checkbox-blank-circle-fill"></i>
                                                </button>
                                            </div>
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="04 Items Available">
                                                <button type="button"
                                                    class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-danger">
                                                    <i class="ri-checkbox-blank-circle-fill"></i>
                                                </button>
                                            </div>
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="03 Items Available">
                                                <button type="button"
                                                    class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-light">
                                                    <i class="ri-checkbox-blank-circle-fill"></i>
                                                </button>
                                            </div>
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-placement="top" title="04 Items Available">
                                                <button type="button"
                                                    class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-body">
                                                    <i class="ri-checkbox-blank-circle-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div> --}}
                            <!-- end row -->

                            <div class="mt-4 text-muted">
                                <h5 class="fs-14">Description :</h5>
                                <p>{{$product->description}}</p>
                            </div>
                            <div class="mt-4 text-muted">
                                <h5 class="fs-14">Active substance:</h5>
                                <p>{{$product->active_principle}}</p>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mt-3">
                                        <h5 class="fs-14">Symptoms :</h5>
                                        <ul class="list-unstyled">                                          
                                            @foreach ( $productSymptoms as $symptom)
                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> {{$symptom->symptom->symptom_name }}</li>
                                                
                                            @endforeach                                            
                                        </ul>
                                    </div>
                                </div>                               
                            </div>


                            <div class="product-content mt-5">
                                <h5 class="fs-14 mb-3">Product Description :</h5>
                                <nav>
                                    <ul class="nav nav-tabs nav-tabs-custom nav-success"
                                        id="nav-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="nav-speci-tab"
                                                data-bs-toggle="tab" href="#nav-speci" role="tab"
                                                aria-controls="nav-speci"
                                                aria-selected="true">Specification</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="nav-detail-tab"
                                                data-bs-toggle="tab" href="#nav-detail" role="tab"
                                                aria-controls="nav-detail"
                                                aria-selected="false">Details</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="tab-content border border-top-0 p-4"
                                    id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-speci"
                                        role="tabpanel" aria-labelledby="nav-speci-tab">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="width: 200px;"> Product name</th>
                                                        <td>{{$product->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" style="width: 200px;"> Category</th>
                                                        <td>{{$product->category->category_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Active substance</th>
                                                        <td>{{$product->active_principle}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Quantity</th>
                                                        <td>{{$product->quantity}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Unit of Measure</th>
                                                        <td>{{$product->UnitMeasure->name}} ({{$product->UnitMeasure->abbreviation}}) </td>                                                 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-detail" role="tabpanel"
                                        aria-labelledby="nav-detail-tab">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="width: 200px;">Denomination </th>
                                                        <td>{{$product->denomination->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" style="width: 200px;">Sale type</th>
                                                        <td>{{$product->saleType->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pharmaceutical form</th>
                                                        <td>{{$product->pharmaceuticalForm->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Laboratory</th>
                                                        <td>{{$product->laboratory->name}}</td>
                                                    </tr>                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product-content -->                           
                            <!-- end card body -->
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
<script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-details.init.js') }}"></script> 
@endsection

