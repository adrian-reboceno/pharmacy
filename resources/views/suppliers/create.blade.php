@extends('layouts.master')
@section('title') @lang('translation.suppliers')  @endsection
@section('css')

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.suppliers')   @endslot
@endcomponent

<div class="row justify-content-center">
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Create Supplier</h4>                
            </div><!-- end card header -->
            <div class="card-body p-4">
                <form method="POST" action="{{ route('suppliers.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="compnayNameinput" class="form-label">Name Suppliers</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name" id="name" value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div><!--end col-->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" value="{{ old('email') }}">  
                            </div>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div><!--end col-->   
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="phonenumber" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" placeholder="+(245) 451 45123" id="phonenumber" name="phonenumber" value="{{ old('phonenumber') }}">
                            </div>
                            @error('phonenumber')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div><!--end col--> 
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" placeholder="Address 1" id="address" name="address" value="{{ old('address') }}">
                            </div>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div><!--end col-->    
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" placeholder="City " id="city" name="city" value="{{ old('city') }}">
                            </div>
                            @error('city')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div><!--end col-->     
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="zip" class="form-label">Zip code</label>
                                <input type="text" class="form-control" placeholder="zip " id="zip" name="zip" value="{{ old('zip') }}">
                            </div>
                            @error('zip')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div><!--end col-->  
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <select id="state" name="state"  class="form-select mb-3" aria-label="Default select example">
                                    <option selected>Choose...</option>
                                    @foreach ( $states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach 
                                </select>
                            </div>
                            @error('state')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div><!--end col--> 
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="namecontact" class="form-label">Contact Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter your firstname" id="namecontact" name="namecontact" value="{{ old('namecontat') }}">
                            </div>
                            @error('namecontact')
                                <div class="text-danger">{{ $message }}</div>                                
                            @enderror
                        </div><!--end col-->                        
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="phonecontact" class="form-label">Contact Phone Number</label>
                                <input type="tel" class="form-control" placeholder="+(245) 451 45123" id="phonecontact" name="phonecontact" value="{{ old('phonecontat') }}">
                            </div>
                            @error('phonecontact')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div><!--end col-->
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="emailcontact" class="form-label">Contact Email Address</label>
                                <input type="email" class="form-control" placeholder="example@gamil.com" id="emailcontact" name="emailcontact" value="{{ old('emailcontat') }}">
                            </div>
                            @error('emailcontact')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div><!--end col-->                                        
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">Status</label>                                               
                                <select name="status_id" id="status_id" class="form-select mb-3" aria-label="Default select example">
                                    @foreach ( $statuses as $status)
                                        <option value="{{ $status->id }}" >{{ $status->status_name }}</option>
                                    @endforeach 
                                </select>                               
                            </div>
                            @error('status_id')                                           
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
