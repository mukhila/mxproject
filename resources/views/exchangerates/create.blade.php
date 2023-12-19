@extends('layouts.app-companyusers')
@section('content')

<style>
  .select2{
  text-align: left;
  }

@media (max-width: 767px) {
    .table-responsive .dropdown-menu {
        position: static !important;
    }
}
@media (min-width: 768px) {
    .table-responsive {
        overflow: inherit;
    }
}

</style>


<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Exchange Rate /</span> Add</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Add Exchange Rate</h5>

                                      <div class="card-header-elements ms-auto">
                                        <a href = "{{ route('tenantdenomination.list') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-eye me-1"></span>Exchange Rate List
                                        </a>
                                      </div>
                                    </div>



                                
                                <div class="card-body">

  <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">



                    <form class="pt-0" method = "post" action = "{{ route('companyusers.exchange.store') }}">
                      <!-- Currency Name-->
                      {{ csrf_field() }}

                      <input type ="hidden" name ="branch_id" value = "{{ $branch_id }}" /> 

                      <div class="col-md-6">
                         <label for="tenantcurrency_id">Select Currency</label>
                        <div class="form-floating form-floating-outline mb-4">
                         <select
                              id="tenantcurrency_id"
                              name="tenantcurrency_id"
                              class="select2 form-select" data-allow-clear="true">
                              required>
                              <option value="">Select Currency</option>    
                              @foreach($country as $cur)
                               <option value="{{ $cur->currency_id }}">{{ $cur->country_name }} - {{ $cur->currency->currency_name }}</option> 
                              @endforeach                         
                            </select>
                           
                      </div>

                      @error('currency_id')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                    </div>


                       <div class="card-datatable table-responsive">
                      <table class="table" id = "ratetable">
                       
                                <thead>
                                    <tr>
                                        <td>Denomination <input type="text" value="" class="form-control" disabled /></td>
                                        
                                        <td>Currency Value <input type="text" value="" class="form-control" disabled /></td>
                                        <td>Currency Type <input type="text" value="" class="form-control" disabled /></td>
                                        <td>Market Rate
                                            <input type="text" value="" class="form-control" id = "allmarket_rate" />
                                        </td>
                                        <td>Buy Rate <input type="text" value="" class="form-control" id = "allbuy_rate" /></td>
                                        <td>Sell Rate <input type="text" value="" class="form-control" id = "allsell_rate" /></td>
                                    </tr>
                                </thead>
                                <tbody id ="addrows">
                        
                        

								</tbody>
						</table>
</div>

<br><br>
                      <!-- Submit and reset -->
                      <div class="mb-3">
                        <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">Add</button>
                        <button type="reset" class="btn btn-outline-success" data-bs-dismiss="offcanvas">Discard</button>
                      </div>
                    </form>
                 
</div></div></div>
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