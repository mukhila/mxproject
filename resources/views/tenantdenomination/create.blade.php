@extends('layouts.app-tenant')
@section('content')

<style>
  .select2{
  text-align: left;
  }
</style>


<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Denomination /</span> Add</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Add Denomination</h5>

                                      <div class="card-header-elements ms-auto">
                                        <a href = "{{ route('tenantcurrency.list') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-eye me-1"></span>Denomination List
                                        </a>
                                      </div>
                                    </div>



                                
                                <div class="card-body">

  <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-8 mt-3">



                    <form class="pt-0" method = "post" action = "{{ route('tenantdenomination.store') }}">
                      <!-- Currency Name-->
                      {{ csrf_field() }}


                      <div class="form-floating form-floating-outline mb-4">
                         <select
                              id="currency_id"
                              name="currency_id"
                              class="select2 form-select form-select-lg" data-allow-clear="true">
                              required>
                              <option value="">Select Currency</option>    
                              @foreach($country as $cur)
                               <option value="{{ $cur->currency_id }}">{{ $cur->country_name }} - {{ $cur->currency->currency_name }}</option> 
                              @endforeach                         
                            </select>
                            <label for="currency_id">Currency</label>
                      </div>

                      @error('currency_id')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror




                      <div class="form-floating form-floating-outline mb-4">
                         <select
                              id="denomination_id"
                              name="denomination_id"
                              class="select2 form-select form-select-lg"
                              data-allow-clear="true" required>
                              <option value="">Select</option> 
                            </select>
                            <label for="denomination_id">Denomination Code</label>
                      </div>

                      @error('denomination_id')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                   
                    

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