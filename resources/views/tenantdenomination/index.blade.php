@extends('layouts.app-tenant')
@section('content')

<!-- Content -->


<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Denomination /</span> List</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Denomination List</h5>

                                      <div class="card-header-elements ms-auto">
                                        <a href="{{ route('tenantdenomination.add') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-plus me-1"></span>Add Denomination
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
                          <th>Denomination Name</th>  
                          <th>Currency</th> 
                          <th>Currency Value</th>
                          <th>Currency Type</th>                                      
                          <th class="text-lg-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                           @foreach($tenantdenomination as $ten)
                          <tr>
                                <td></td>
                                <td>{{  $i++ }}</td>                                
                                <td> {{ $ten->denomination->denomination_code  }}</td>
                                <td> {{ $ten->denomination->currency_id  }}</td>
                                <td> {{ $ten->denomination->value  }}</td>
                                <td> {{ $ten->denomination->currency_type  }}</td>
                               <td>  
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
        <!-- Currency: End -->
</div>
<!--/ Content -->

@endsection
<input type="hidden" name="redirecturl" id="redirecturl" value="{{ url('/tenant/tenantcurrency/') }}">  
@extends('layouts.popup')