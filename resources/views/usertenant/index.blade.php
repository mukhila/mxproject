@extends('layouts.app-admin')
@section('content')

<!-- Content -->


<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Company /</span> List</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Company List</h5>

                                      <div class="card-header-elements ms-auto">
                                        <a href="{{ route('admin.tenant.create') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-plus me-1"></span>Add Company
                                        </a>
                                      </div>
                                    </div>



                                
                                <div class="card-body text-center">

                                     <div class="card-datatable table-responsive">
                    <table class="datatables-category-list table own_data_table">
                      <thead class="table-light">
                        <tr>
                          <th></th>
                          <th>S.No</th>
                          <th>Company Name</th>
                          <th>Name</th>  
                          <th>Email</th>
                          <th>Mobile</th>                      
                          <th class="text-lg-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                          @foreach($tenant as $ten)
                          <tr>
                                <td></td>
                                <td>{{  $i++ }}</td>
                                <td>{{ $ten->tenant->company_name  }}</td>
                                <td>{{ $ten->name }}</td>
                                <td>{{ $ten->email }}</td>
                                <td>{{ $ten->mobile }}</td>                              
                                <td>  @if($ten->status == 'Active')
                    <button type="button" class="btn btn-primary statusid" data-bs-toggle="modal"  data-bs-target=".statusModal"  data-id="{{ $ten->id }}" title="Status"><i class="fa fa-eye action_icon"></i></button>
                @else 
                <button type="button" class="btn-info btn statusid" data-bs-toggle="modal"  data-bs-target=".statusModal" data-id="{{ $ten->id }}" title="Status"><i class="fa fa-eye-slash action_icon"></i></button>
                @endif
                
                <a href="{{ url('admin/tenant/'.$ten->id.'/edit') }}" class="btn-warning btn" title="Edit"><i class="fa fa-pencil action_icon"></i>
                </a>
           
                <button type="button" class="btn-danger btn deleteid" data-bs-toggle="modal"  data-bs-target="#delModal" data-id="{{ $ten->id }}" title="Delete"  >
                    <i class="fa fa-trash action_icon"></i>
                </button>
                    </td>            
                          </tr>
                           @endforeach
                      </tbody>
                    </table>
                  </div>

                                </div>
                            </div>
                        </div>
                       
                        <!-- list topic -->


                    </div>
                </div>
            </div>
        </section>
        <!-- Tenant: End -->
</div>
<!--/ Content -->

@endsection
<input type="hidden" name="redirecturl" id="redirecturl" value="{{ url('/admin/tenant/') }}">  
@extends('layouts.popup')