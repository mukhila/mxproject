  @extends('layouts.app-admin')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="py-3 mb-4"><span class="text-muted fw-light">State /</span> Edit</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Edit State</h5>

                                      <div class="card-header-elements ms-auto">
                                        <a href = "{{ route('state.list') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-eye me-1"></span>State List
                                        </a>
                                      </div>
                                    </div>



                                
                                <div class="card-body text-center">

  <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-8 mt-3">



                    <form class="pt-0" method = "post" action = "{{ route('state.update') }}">
                      <!-- Currency Name-->
                      {{ csrf_field() }}
                      {{method_field('put')}} 
                        <input type="hidden" name="id" value="{{ $state->id }}">
                        <input type="hidden" name="_method" value="PUT">
                     
                     

                      <div class="form-floating form-floating-outline mb-4">
                        <select
                              id="country_id"
                              name="country_id"
                              class="form-select"
                              data-allow-clear="true" required>
                              <option value="">Select</option>    
                              @foreach($country as $cur)
                              @php 

                                $value =  ($state->country_id == $cur->id) ? 'Selected' : '';  

                              @endphp
                               <option value="{{ $cur->id }}" {{ $value }} >{{ $cur->country_name }}</option> 
                              @endforeach                         
                            </select>
                            <label for="country_id">Country</label>
                       </div>
                      @error('country_id')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                       <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          class="form-control"
                          id="state_name"
                          placeholder="Enter State Name"
                          name="state_name"
                          aria-label="State Name" 
                          value = "{{ $state->state_name }}"
                          required />
                        <label for="state_name">State Name</label>
                      </div>

                      @error('state_name')
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
