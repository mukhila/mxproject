  @extends('layouts.app-admin')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Currency /</span> Edit</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Edit Currency</h5>

                                      <div class="card-header-elements ms-auto">
                                        <a href = "{{ route('currency.list') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-eye me-1"></span>Currency List
                                        </a>
                                      </div>
                                    </div>



                                
                                <div class="card-body text-center">

  <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-8 mt-3">



                    <form class="pt-0" method = "post" action = "{{ route('currency.update') }}">
                      <!-- Currency Name-->
                      {{ csrf_field() }}
                      {{method_field('put')}} 
                        <input type="hidden" name="id" value="{{ $currency->id }}">
                        <input type="hidden" name="_method" value="PUT">
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          class="form-control"
                          id="currency_name"
                          placeholder="Enter Currency Name"
                          name="currency_name"
                          aria-label="Currency Name" 
                          value = "{{ $currency->currency_name }}"
                          required />
                        <label for="currency_name">Currency Name</label>
                      </div>

                      @error('currency_name')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                      <!-- Currency Code-->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="currency_code"
                          class="form-control"
                          placeholder="Enter Currency Code"
                          aria-label="currency_code"
                          name="currency_code"                           
                          value = "{{ $currency->currency_code }}"
                          required />
                        <label for="currency_code">Currency Code</label>
                      </div>

                      @error('currency_code')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                       <!-- Currency Symbol-->
                       <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="currency_symbol"
                          class="form-control"
                          placeholder="Enter Currency Symbol"
                          aria-label="currency_symbol"
                          value = "{{ $currency->currency_symbol }}"
                          name="currency_symbol" 
                          required />
                        <label for="currency_symbol">Currency Symbol</label>
                      </div>
                      @error('currency_symbol')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                
                   
                      <!-- Submit and reset -->
                      <div class="mb-3">
                        <button type="submit" class="btn btn-info me-sm-3 me-1 data-submit">Update</button>
                        <button type="reset" class="btn btn-outline-info" data-bs-dismiss="offcanvas">Discard</button>
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
