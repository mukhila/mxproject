@extends('layouts.app-admin')
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
                                        <a href="{{ route('denomination.add') }}" class="btn btn-primary waves-effect waves-light">
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
                          <th>&nbsp;Code &nbsp;</th>
                          <th>Currency Name</th>                         
                          <th>&nbsp;Value &nbsp;</th>
                          <th>&nbsp;Currency Type &nbsp;</th>
                          <th class="text-lg-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                          @foreach($denomination as $denom)
                          <tr>
                                <td></td>
                                <td>{{  $i++ }}</td>
                                <td>{{ $denom->denomination_code  }}</td>                              
                                <td>{{ $denom->currency->currency_name }}</td>
                                <td>{{ $denom->value   }}</td>
                                <td>{{ $denom->currency_type   }}</td>

                               <td>  @if($denom->status == 'Active')
                    <button type="button" class="btn btn-primary statusid" data-bs-toggle="modal"  data-bs-target=".statusModal"  data-id="{{ $denom->id }}" title="Status"><i class="fa fa-eye action_icon"></i></button>
                @else 
                <button type="button" class="btn-info btn statusid" data-bs-toggle="modal"  data-bs-target=".statusModal" data-id="{{ $denom->id }}" title="Status"><i class="fa fa-eye-slash action_icon"></i></button>
                @endif
                
                <a href="{{ url('/denomination/'.$denom->id.'/edit') }}" class="btn-warning btn" title="Edit"><i class="fa fa-pencil action_icon"></i>
                </a>
           
                <button type="button" class="btn-danger btn deleteid" data-bs-toggle="modal"  data-bs-target="#delModal" data-id="{{ $denom->id }}" title="Delete"  >
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
<input type="hidden" name="redirecturl" id="redirecturl" value="{{ url('/denomination/') }}">  
@extends('layouts.popup')