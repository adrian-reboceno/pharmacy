@extends('layouts.master')
@section('title') @lang('translation.users')  @endsection
@section('css')

<link href="{{ URL::asset('https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('translation.dashboards') @endslot
@slot('title') @lang('translation.users')   @endslot
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
                            @can('user-create')                            
                                <a href="{{route('users.create')}}" class="btn btn-primary"><i class="ri-add-line align-bottom me-1"></i> @lang('translation.users')</a>
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
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Paternal surname </th>
                            <th>Maternal surname</th>
                            <th>Email</th>                            
                            <th>Create Date</th>
                            <th>Role</th>
                            <th>Status</th>                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($users as $user )                                                                          
                        <tr>
                            <td>{{$user->id}}</td>   
                            <td> 
                                <div class="avatar-group">
                                    <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-3.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                        <img src=" @if($user->avatar != '') {{ asset('storage/'.$user->avatar) }} @else {{ asset('assets/images/users/user-dummy-img.jpg') }} @endif" alt="" class="rounded-circle avatar-xxs">
                                    </a>
                                </div>
                            </td>                         
                            <td>{{$user->name}}</td>
                            <td>{{$user->paternal_surname}}</td>
                            <td>{{$user->maternal_surname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>   
                            <td>                               
                                @foreach ($user->roles as $role)                                       
                                    <span class="badge bg-success">{{ $role->name }}</span>
                                @endforeach                            
                            </td>
                            {{-- badge badge-label bg-secondary --}}                         
                            <td><span class="badge  bg-{{$user->status ? $user->status->status_color : ''}} ">{{$user->status ? $user->status->status_name : ''}}</span> </td>                           
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="{{ route('users.show', $user->id)}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li><a href="{{ route('users.edit', $user->id)}}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li><a href="{{ route('users.editpassword', $user->id)}}" class="dropdown-item edit-item-btn"><i class="ri-lock-password-line align-bottom me-2 text-muted"></i> Edit password</a></li>
                                        @can('user-delete') 
                                            <li>
                                                {{-- <a class="dropdown-item remove-item-btn">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                </a> --}}
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
<!--end row-->

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

<script src="{{ URL::asset('assets/js/pages/users/datatables.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
