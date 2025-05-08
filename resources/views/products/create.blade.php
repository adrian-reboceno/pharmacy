@extends('layouts.master')
{{-- @extends('layouts.layouts-horizontal') --}}
@section('title') @lang('translation.products')  @endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.products')   @endslot
@endcomponent
<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="barcode" class="form-label">Barcode</label>
                                    <input type="text" class="form-control" placeholder="Enter barcode" name="barcode" id="barcode" value="{{ old('barcode') }}">
                                </div>
                                @error('barcode')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div><!--end col-->   
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name product</label>
                                    <input type="text" class="form-control" placeholder="Enter name" name="name" id="name" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div><!--end col--> 
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="activesubstance" class="form-label">Active substance</label>
                                    <input type="text" class="form-control" placeholder="Metformina"  id="activesubstance" name="activesubstance" value="{{ old('activesubstance') }}">
                                </div>
                                @error('activesubstance')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div><!--end col-->    
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label">@lang('translation.description')</label>
                                    <input type="text" class="form-control" placeholder="" id="description" name="description" value="{{ old('description') }}" >
                                </div>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div><!--end col-->
                        </div><!--end row-->
                        
                    </div>
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                    General Info
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="stockmin" class="form-label">Stock min</label>
                                            <input type="number" class="form-control" placeholder="10" id="stockmin" name="stockmin" value="{{ old('stockmin') }}">    
                                        </div>
                                        @error('stockmin')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="stockmax" class="form-label">Stock max</label>
                                            <input type="number" class="form-control" placeholder="10" id="stockmax" name="stockmax" value="{{ old('stockmax') }}">  
                                        </div>
                                        @error('stockmax')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="expirationdate" class="form-label">Expiration date</label>                                
                                            <div class="form-check form-switch form-switch-success">
                                                <input class="form-check-input" type="checkbox" role="success" value="1" id="expirationdate" name="expirationdate">
                                                <label class="form-check-label" for="expirationdate">
                                                    Si
                                                </label>
                                            </div> 
                                        </div>                                       
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="salebypiece" class="form-label">Sale by piece</label>                               
                                            <div class="form-check form-switch form-switch-success">
                                                <input class="form-check-input" type="checkbox" role="success" value="1" id="salebypiece" name="salebypiece">
                                                <label class="form-check-label" for="salebypiece">
                                                    Si
                                                </label>
                                            </div>
                                        </div>                                       
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="unitmeasure" class="form-label">Unit of Measure</label>
                                            <select id="unitmeasure" name="unitmeasure" class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>                                                
                                                @foreach ( $unitMeasures as $unitMeasure)
                                                    <option value="{{ $unitMeasure->id }}">{{ $unitMeasure->name }} / {{ $unitMeasure->abbreviation }}</option>
                                                @endforeach                                     
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">quantity</label>
                                            <input type="number" class="form-control" placeholder="10" id="quantity" name="quantity" value="{{ old('quantity') }}">
                                        </div>
                                        @error('quantity')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="unitsblister" class="form-label">Units Blister</label>
                                            <input type="number" class="form-control" placeholder="10" step="1" id="unitsblister" name="unitsblister" value="{{ old('unitsblister') }}">
                                        </div>
                                        @error('unitsblister')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="unitsbox" class="form-label">Units Box</label>
                                            <input type="number" class="form-control" placeholder="30" step="1" id="unitsbox" name="unitsbox" value="{{ old('unitsbox') }}">
                                        </div>
                                        @error('unitsbox')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    
                                    <!-- end col -->
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="utility">utility</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="product-price-addon">%</span>
                                                <input type="number" step="0.01" class="form-control" name="utility" id="utility" placeholder="Enter price" aria-label="utility" aria-describedby="product-utility-addon"  value="{{ old('utility') }}">                                              
                                            </div>
                                        </div>
                                        @error('utility')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> 
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="sanitary_registration" class="form-label">Sanitary registration</label>
                                            <input type="text" class="form-control" placeholder="1000 SSA IV" id="sanitary_registration" name="sanitary_registration" value="{{ old('sanitary_registration') }}">                               
                                        </div>
                                        @error('sanitary_registration')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>                                  
                                </div><!-- end row -->
                            </div>
                            <!-- end tab-pane -->
                        
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">                            
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                    Meta Data
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div class="tab-content">                            

                            {{-- <div class="tab-pane" id="addproduct-metadata" role="tabpanel"> --}}
                                <div class="tab-pane active" id="addproduct-metadata" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="laboratory" class="form-label">Laboratory</label>
                                            <select id="laboratory" name="laboratory" class="js-example-basic-single">                                               
                                                @foreach ( $laboratories as $laboratory)
                                                    <option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
                                                @endforeach                                     
                                            </select>
                                        </div>
                                        @error('laboratory')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="denomination" class="form-label">Denomination</label>
                                            <select id="denomination" name="denomination" class="js-example-basic-single">                                              
                                                @foreach ( $denominations as $denomination)
                                                <option value="{{ $denomination->id }}">{{ $denomination->name }}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                        @error('denomination')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="saletype" class="form-label">Sale type</label>
                                            <select id="saletype" name="saletype" class="js-example-basic-single">
                                                
                                                @foreach ( $saleTypes as $saletype)
                                                    <option value="{{ $saletype->id }}">{{ $saletype->name }}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                        @error('saletype')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label for="pharmaceuticalforms" class="form-label">Pharmaceutical Forms</label>
                                            <select id="pharmaceuticalforms" name="pharmaceuticalforms" class="js-example-basic-single">                                                
                                                @foreach ( $pharmaceuticalForms as $pharmaceuticalForm)
                                                    <option value="{{ $pharmaceuticalForm->id }}">{{ $pharmaceuticalForm->name }}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                        @error('pharmaceuticalforms')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->                               
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Gallery</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Product Image</h5>
                            <p class="text-muted">Add Product main Image.</p>
                            <div class="col-lg-6 col-sm-6">
                                {{-- <input type="file" class="filepond filepond-input-circle" name="main_imagen" id="main_imagen"  accept="image/png, image/jpeg, image/gif" /> --}}
                                <input type="file" class="filepond filepond-input-main" name="mainimagen" id="mainimagen" accept="image/png, image/jpeg, image/gif" />
                            </div>
                        </div>
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Product Gallery</h5>
                            <p class="text-muted">AAdd Product Gallery Images.</p>
                            <div class="col-lg-6 col-sm-6">
                                <input type="file" class="filepond filepond-input-multiple" multiple name="otherimagen[]" id="otherimagen" data-allow-reorder="true" data-max-files="3">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                
                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-primary">@lang('translation.create')</button>
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>                         
                            <select id="status" name="status" class="js-example-basic-single">
                                @foreach ( $statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                            @endforeach                              
                            </select>
                        </div>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror                      
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->               

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Categories</h5>
                    </div>
                    <div class="card-body">                        
                        <select id="category" name="category" class="js-example-basic-single">
                            @foreach ( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach 
                        </select>
                        @error('category')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror   
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Symptoms</h5>
                    </div>
                    <div class="card-body">                       
                        <select class="js-example-basic-multiple" name="symptoms[]" multiple="multiple">
                            @foreach ($symptoms as $symptom)
                                <option value="{{ $symptom->id }}">{{ $symptom->symptom_name  }}</option>
                                
                            @endforeach
                        </select>              
                        @error('symptoms')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror   
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>
            <!-- end col -->
        </div>
    <!-- end row -->

</form>


@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"> </script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"> </script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/products/product.init.js') }}"></script>
    
    <script src="{{ URL::asset('assets/js/pages/select/select2.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection

