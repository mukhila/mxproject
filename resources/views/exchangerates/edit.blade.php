@extends('layouts.app-companyusers')
@section('content')

<style>
  .select2{
  text-align: left;
  }
</style>


<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Exchange Rate /</span> Update</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Update Exchange Rate</h5>

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
                        
                        <div class="col-md-8 mt-3">



                    <form class="pt-0" method = "post" action = "{{ route('companyusers.exchange.store') }}">
                      <!-- Currency Name-->
                      {{ csrf_field() }}

                      <input type ="hidden" name ="branch_id" value = "{{ $branch_id }}" /> 

                      <div class="form-floating form-floating-outline mb-4">

                         <select
                              id="tenantdenomination_id"
                              name="tenantdenomination_id"
                              class="select2 form-select" data-allow-clear="true">
                              required>
                              <option value="">Select Denomination</option>    
                              @foreach($tenant_denomination as $cur)
                               <option value="{{ $cur->id }}">{{ $cur->denominations->denomination_code }}</option> 
                              @endforeach                         
                            </select>
                            
                      </div>

                      @error('tenantdenomination_id')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror


                         <!-- Country Name-->
                      <!--div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="countryname"
                          class="form-control"                                                                 
                          value = "" disabled
                           />
                        <label for="countryname">Country Name</label>
                      </div-->



                         <!-- Currency Name-->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="currencyname"
                          class="form-control"                                                                 
                          value = "" disabled
                           />
                        <label for="currencyname">Currency Name</label>
                      </div>



                         <!-- Currency Value-->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="currencyvalue"
                          class="form-control"                                                                 
                          value = "" disabled
                           />
                        <label for="currencyvalue">Currency Value</label>
                      </div>



                          <!-- Currency Type-->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="currencytype"
                          class="form-control"                                                                 
                          value = "" disabled
                           />
                        <label for="value">Currency Type</label>
                      </div>

                           <!-- Market Rate -->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="market_rate"
                          class="form-control"
                          name = "market_rate"                                                               
                          value = "" 
                           />
                        <label for="market_rate">Market Rate</label>
                      </div>


                    <!-- Buy Rate -->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="buy_rate"
                          class="form-control"
                          name="buy_rate"                                                                 
                          value = "" 
                           />
                        <label for="buy_rate">Buy Rate</label>
                      </div>

                         <!-- Sell Rate -->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="sell_rate"
                          class="form-control"
                          name = "sell_rate"                                                            
                          value = "" 
                           />
                        <label for="sell_rate">Sell Rate</label>
                      </div>


                      <!-- Submit and reset -->
                      <div class="mb-3">
                        <button type="submit" class="btn btn-success me-sm-3 me-1 data-submit">Update</button>
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