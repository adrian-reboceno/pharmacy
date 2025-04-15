@extends('layouts.master')
@section('title') @lang('translation.categories')  @endsection
@section('css')

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.categories')   @endslot
@endcomponent

<div class="row justify-content-center">
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Create Category</h4>                
            </div><!-- end card header -->
            <div class="card-body p-4">
                <form method="POST" action="{{ route('categories.update', $category->id) }}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category name</label>
                                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter catergory name" value="{{ $category->category_name }}">
                                @error('category_name')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description">{{ $category->description}}</textarea>
                                @error('description')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Category parent</label>
                                <select name="parent_id" id="parent_id" class="form-select mb-3" aria-label="Default select example">
                                    <option value="0">Select</option>
                                    @foreach ( $categories as $data )
                                        <option value="{{ $data->id }}" {{$category->parent_id ==  $data->id ? 'selected' : ''}} >{{ $data->category_name }}</option>
                                    @endforeach 
                                </select>
                                @error('parent_id')                                           
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--end col-->
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
