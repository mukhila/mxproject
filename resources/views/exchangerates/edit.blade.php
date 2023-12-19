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
                                        <a href = "{{ route('companyusers.exchange') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-eye me-1"></span>Exchange Rate List
                                        </a>
                                      </div>
                                    </div>



                                
                                <div class="card-body">

  <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-8 mt-3">



                    <form class="pt-0" method = "post" action = "{{ route('companyusers.exchange.update') }}">
                      <!-- Currency Name-->
                      {{ csrf_field() }}

                      <input type="hidden" name="id" value="{{ $exchange_Rate->id }}">
                      <input type="hidden" name="_method" value="PUT">
                     
                         <!-- Currency Name-->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="denomination_code"
                          class="form-control"                                                                 
                          value = "{{ $denomination->denomination_code }}" disabled
                           />
                        <label for="denomination_code">Denomination Code</label>
                      </div>



                         <!-- Currency Name-->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="currencyname"
                          class="form-control"                                                                 
                          value = "{{ $denomination->currency_name }}" disabled
                           />
                        <label for="currencyname">Currency Name</label>
                      </div>



                         <!-- Currency Value-->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="currencyvalue"
                          class="form-control"                                                                 
                          value = "{{ $denomination->value }}" disabled
                           />
                        <label for="currencyvalue">Currency Value</label>
                      </div>



                          <!-- Currency Type-->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="currencytype"
                          class="form-control"                                                                 
                          value = "{{ $denomination->currency_type }}" disabled
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
                          value = "{{ $exchange_Rate->market_rate }}" 
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
                          value = "{{ $exchange_Rate->buy_rate }}" 
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
                          value = "{{ $exchange_Rate->sell_rate }}" 
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