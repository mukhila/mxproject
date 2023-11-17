@extends('layouts.app-tenant')
@section('content')

<!-- Content -->


<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Branch /</span> List</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Branch List</h5>

                                      <div class="card-header-elements ms-auto">
                                        <a href="{{ route('branch.add') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-plus me-1"></span>Add Branch
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
                          <th>Name</th>
                          <th>Branch Name</th>
                          <th>Address</th>                                                   
                          <th class="text-lg-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                          @foreach($branch as $bran)
                          <tr>
                                <td></td>
                                <td>{{  $i++ }}</td>

                                <td> {{ $bran->tenant->company_name }}</td> 
                                <td> {{ $bran->branchname  }}</td>  
                                <td> <pre>{{ $bran->address  }}</pre> <br>
                                    <pre> Landline No -  {{ $bran->contactno  }}   </pre>
                                    <pre> Mobile No -  {{ $bran->mobileno  }}   </pre>
                                    <pre> Email ID -  {{ $bran->emailid  }}   </pre>
                                </td>                                 
                               <td>  @if($bran->status == 'Active')
                    <button type="button" class="btn btn-primary statusid" data-bs-toggle="modal"  data-bs-target=".statusModal"  data-id="{{ $bran->id }}" title="Status"><i class="fa fa-eye action_icon"></i></button>
                @else 
                <button type="button" class="btn-info btn statusid" data-bs-toggle="modal"  data-bs-target=".statusModal" data-id="{{ $bran->id }}" title="Status"><i class="fa fa-eye-slash action_icon"></i></button>
                @endif
                
                <a href="{{ url('/tenant/branch/'.$bran->id.'/edit') }}" class="btn-warning btn" title="Edit"><i class="fa fa-pencil action_icon"></i>
                </a>
           
                <button type="button" class="btn-danger btn deleteid" data-bs-toggle="modal"  data-bs-target="#delModal" data-id="{{ $bran->id }}" title="Delete"  >
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
        <!-- Currency: End -->
</div>
<!--/ Content -->

@endsection
<input type="hidden" name="redirecturl" id="redirecturl" value="{{ url('/tenant/branch/') }}">  
@extends('layouts.popup')