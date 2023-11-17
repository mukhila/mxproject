@extends('layouts.app-tenant')
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
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Branch /</span> Edit</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Edit Branch</h5>

                                      <div class="card-header-elements ms-auto">
                                        <a href = "{{ route('tenant.branch') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-eye me-1"></span>Branch List
                                        </a>
                                      </div>
                                    </div>



                                
                                <div class="card-body text-center">

  <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-8 mt-3">



                    <form class="pt-0" method = "post" action = "{{ route('branch.update') }}">
                      <!-- Currency Name-->
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{ $branch->id }}">
                       <input type="hidden" name="_method" value="PUT">


                       <div class="form-floating form-floating-outline mb-4">
                        <textarea
                          type="text"
                          class="form-control h-px-100"
                          id="address"
                          placeholder="Enter address"
                          name="address"
                          aria-label="Address"                        
                          required>{{ $branch->address }}</textarea>
                        <label for="address">Address</label>
                      </div>

                      @error('address')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror



                       <div class="form-floating form-floating-outline mb-4">
                        <input
                          type="text"
                          class="form-control"
                          id="branchname"
                          placeholder="Enter Branch Name"
                          name="branchname"
                          aria-label="Branch Name" 
                          value = "{{ $branch->branchname }}"
                          required />
                        <label for="branchname">Branch Name</label>
                      </div>

                      @error('branchname')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror



                      <div class="form-floating form-floating-outline mb-4">

                        <input
                          type="text"
                          class="form-control"
                          id="contactno"
                          placeholder="Enter Landline No"
                          name="contactno"
                          aria-label="Landline No" 
                          value = "{{ $branch->contactno }}"
                          required />
                        <label for="contactno">Landline No</label>
                      </div>

                      @error('contactno')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                    


                      <div class="form-floating form-floating-outline mb-4">

                        <input
                          type="text"
                          class="form-control"
                          id="mobileno"
                          placeholder="Enter Mobile No"
                          name="mobileno"
                          aria-label="Mobile No" 
                          value = "{{ $branch->mobileno }}"
                          required />
                        <label for="mobileno">Mobile No</label>
                      </div>

                      @error('mobileno')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror



                      <div class="form-floating form-floating-outline mb-4">

                        <input
                          type="text"
                          class="form-control"
                          id="emailid"
                          placeholder="Enter Email Id"
                          name="emailid"
                          aria-label="Email Id" 
                          value = "{{ $branch->emailid }}"
                          required />
                        <label for="emailid">Email Id</label>
                      </div>

                      @error('emailid')
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

