@extends('layouts.app-companyusers')
@section('content')

<!-- Content -->


<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Exchange Rate /</span> List</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Exchange Rate List</h5>

                                      <div class="card-header-elements ms-auto">
                                        <a href="{{ route('companyusers.exchange.create') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-plus me-1"></span>Add Exchange Rate
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
                          <th>Branch Name</th>  
                          <th>Denomination Code</th> 
                          <th>Currency</th>                           
                          <th>Date</th>
                          <th>Market Rate</th> 
                          <th>Buy Rate</th>    
                          <th>Sell Rate</th>                                 
                          <th class="text-lg-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                           @foreach($exchangerates as $ten)
                          <tr>
                                <td></td>
                                <td>{{  $i++ }}</td>   
                                <td>{{ $ten->branch->branchname }}</td>
                                <td>{{ $ten->tenant_denominations->denominations->denomination_code }}</td>
                                <td>{{ $ten->tenant_denominations->denominations->currency->currency_name }} </td>
                                <td> {{ $ten->date  }}</td>
                                <td> {{ $ten->market_rate  }}</td>
                                <td> {{ $ten->buy_rate  }}</td>
                                <td> {{ $ten->sell_rate  }}</td>
                               <td> <a href="{{ url('/companyusers/exchange/'.$ten->id.'/edit') }}" class="btn-warning btn" title="Edit"><i class="fa fa-pencil action_icon"></i></a>  </td>            
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
<input type="hidden" name="redirecturl" id="redirecturl" value="{{ url('/companyusers/exchange/') }}">  
@extends('layouts.popup')