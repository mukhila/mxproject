 @extends('layouts.app-admin')
@section('content')

<!-- Content -->

<style type="text/css">
    
    
        .imageOutput img
            {
                width:200px;
                height:auto;
            }

</style>

<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Country /</span> Add</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Add Country</h5>

                                      <div class="card-header-elements ms-auto">
                                        <a href = "{{ route('country') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-eye me-1"></span>Country List
                                        </a>
                                      </div>
                                    </div>



                                
                                <div class="card-body text-center">

  <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-8 mt-3">



                    <form class="pt-0" method = "post" action = "{{ route('country.store') }}" enctype="multipart/form-data">
                      <!-- Currency Name-->
                      {{ csrf_field() }}
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          class="form-control"
                          id="country_name"
                          placeholder="Enter Country Name"
                          name="country_name"
                          aria-label="Currency Name" 
                          value = "{{ old('country_name') }}"
                          required />
                        <label for="country_name">Country Name</label>
                      </div>

                      @error('country_name')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                      <!-- Country Code-->
                      <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="country_code"
                          class="form-control"
                          placeholder="Enter Country Code"
                          aria-label="country_code"
                          name="country_code"                           
                          value = "{{ old('country_code') }}"
                          required />
                        <label for="country_code">Country Code</label>
                      </div>

                      @error('country_code')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                       <!-- Calling Code-->
                       <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          id="calling_code"
                          class="form-control"
                          placeholder="Enter Calling Code"
                          aria-label="calling_code"
                          value = "{{ old('calling_code') }}"
                          name="calling_code" 
                          required />
                        <label for="calling_code">Calling Code</label>
                      </div>
                      @error('calling_code')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                
                      <div class="form-floating form-floating-outline mb-4">
                          <input type="file" 
                          class="form-control imageUpload" 
                          id="country_flag" 
                          name="country_flag"
                           />
                          <label for="country_flag">Country flag</label>
                       </div>

                       <div id = "categoryiconimage" class="imageOutput"></div>

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

