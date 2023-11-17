  @extends('layouts.app-admin')
@section('content')

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
                                        <a href = "{{ route('denomination.list') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-eye me-1"></span>Denomination List
                                        </a>
                                      </div>
                                    </div>



                                
                                <div class="card-body text-center">

  <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-8 mt-3">



                    <form class="pt-0" method = "post" action = "{{ route('denomination.save') }}">
                      <!-- Denomination Code-->
                      {{ csrf_field() }}



                       <!-- Currency Id-->
                       <div class="form-floating form-floating-outline mb-4">
                        <select
                              id="currency_id"
                              name="currency_id"
                              class="form-select"
                              data-allow-clear="true" required>
                              <option value="">Select</option>    
                              @foreach($currency as $cur)
                               <option value="{{ $cur->id }}">{{ $cur->currency_name }}</option> 
                              @endforeach                         
                            </select>
                            <label for="currency_id">Currency</label>
                       </div>
                   
                     @error('currency_id')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror



                      
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          class="form-control"
                          id="denomination_code"
                          placeholder="Enter Denomination Code"
                          name="denomination_code"
                          aria-label="Denomination Code" 
                          value = "{{ old('denomination_code') }}"
                          required />
                        <label for="denomination_code">Denomination Code</label>
                      </div>

                      @error('denomination_code')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror


                     

                      <!-- Currency value-->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="value"
                          class="form-control"
                          placeholder="Enter value"
                          aria-label="value"
                          name="value"                           
                          value = "{{ old('value') }}"
                          required />
                        <label for="value">Value</label>
                      </div>

                      @error('value')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                       <!-- Description-->
                       <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="description"
                          class="form-control"
                          placeholder="Enter description"
                          aria-label="description"
                          value = "{{ old('description') }}"
                          name="description" 
                          required />
                        <label for="description">Description</label>
                      </div>
                      @error('description')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                          <!-- Currency Type-->
                       <div class="form-floating form-floating-outline mb-4">
                        <select
                              id="currency_type"
                              name="currency_type"
                              class="form-select"
                              data-allow-clear="true" required>
                              <option value="">Select</option>                                 
                              <option value="Coin">Coin</option>
                              <option value="Note">Note</option>                   
                        </select>
                        <label for="currency_type">Currency Type</label>
                       </div>
                   
                     @error('currency_type')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror


                
                   
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
