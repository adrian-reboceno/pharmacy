@extends('layouts.master')
@section('title') @lang('translation.pharmaceuticalforms')  @endsection
@section('css')

<link href="{{ URL::asset('https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.pharmaceuticalforms')   @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            {{-- <div class="card-header">
                <h5 class="card-title mb-0">@lang('translation.lists')</h5>
            </div> --}}
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.lists')</h5>
                    <div class="flex-shrink-0">                       
                        <div class="d-flex gap-2 flex-wrap">    
                            @can('pharmaceuticalform-create')                        
                                <a href="{{route('pharmaceuticalforms.create')}}" class="btn btn-primary"><i class="ri-add-line align-bottom me-1"></i> @lang('translation.pharmaceuticalform')</a>
                            @endcan
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card-body  border border-dashed border-start-0 border-end-0">
                <table id="datatables" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            
                            <th>ID</th>                           
                            <th>Pharmaceutical form</th>
                            <th>description</th>                           
                            <th>Create Date</th>   
                            <th>Update Date</th>                                                                  
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pharmaceuticalForms as $pharmaceuticalform )                                                   
                        <tr>
                            <td>{{$pharmaceuticalform->id}}</td>                                                   
                            <td>{{$pharmaceuticalform->name}}</td> 
                            <td>{{$pharmaceuticalform->description}}</td>                                                       
                            <td>{{$pharmaceuticalform->created_at}}</td>   
                            <td>{{$pharmaceuticalform->updated_at}}</td>                                                                             
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can('pharmaceuticalform-show') 
                                            <li><a href="{{ route('pharmaceuticalforms.show', $pharmaceuticalform->id)}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        @endcan
                                        @can('pharmaceuticalform-edit') 
                                        <li><a href="{{ route('pharmaceuticalforms.edit', $pharmaceuticalform->id)}}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        @endcan
                                        @can('pharmaceuticalform-delete') 
                                            <li>                                               
                                                <form action="{{ route('pharmaceuticalforms.destroy', $pharmaceuticalform->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger"><i class="ri-delete-bin-6-fill align-bottom me-2 text-muted"></i> Delete</button>
                                                </form>    
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </td>
                        </tr>    
                        @endforeach                                           
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ URL::asset('https://code.jquery.com/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ URL::asset('https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/pages/datatables/basic.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
