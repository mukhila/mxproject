@extends('layouts.app-admin')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Users /</span> List</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div class="card-header flex-column flex-md-row">
                <div class="head-label">
                    <h5 class="card-title mb-0">Users List</h5>
                </div>
                <div class="dt-action-buttons text-end pt-3 pt-md-0">
                    <div class="dt-buttons">
                        <a href="{{ route('user.add') }}" class="dt-button create-new btn btn-primary btn-sm" >
                            <span>
                                <i class="mdi mdi-plus me-sm-1"></i> 
                                <span class="d-sm-inline-block">Add User</span>
                            </span>
</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table own_data_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Role</th>
                           
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($users as $u => $user)
                        <tr>
                            <td>{{ $u+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>
                                <span class="badge @if($user->role == 'Super Admin') bg-danger 
                                    @elseif($user->role == 'Admin') bg-warning 
                                    @else bg-info @endif
                                ">{{ $user->role }}</span>
                            </td>
                            
                            <td>

                                 @if($user->status == 'Active')
                    <button type="button" class="btn btn-primary statusid" data-bs-toggle="modal"  data-bs-target=".statusModal"  data-id="{{ $user->id }}" title="Status"><i class="fa fa-eye action_icon"></i></button>
                @else 
                <button type="button" class="btn-info btn statusid" data-bs-toggle="modal"  data-bs-target=".statusModal" data-id="{{ $user->id }}" title="Status"><i class="fa fa-eye-slash action_icon"></i></button>
                @endif

                                <a href="{{ route('user.edit', [ 'id' => $user->id ] ) }}" class="btn-warning btn  item-edit">
                                    <i class="mdi mdi-pencil-outline"></i>
                                </a>
                            

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
</div>
<!--/ Content -->
@endsection
<input type="hidden" name="redirecturl" id="redirecturl" value="{{ url('/user/') }}">  
@extends('layouts.popup')
