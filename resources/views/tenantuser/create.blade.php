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
<h4 class="py-3 mb-4"><span class="text-muted fw-light">User /</span> Add</h4>

        <!-- Help Topics: Start -->
        <section class="section-py">
            <div class="container">
                
                <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-12 mt-3">
                            <div class="card border shadow-none h-100">


                                <div class="card-header header-elements">
                                    <h5 class="me-2">Add User</h5>

                                      <div class="card-header-elements ms-auto">
                                        <a href = "{{ route('tenant.tenantuser') }}" class="btn btn-primary waves-effect waves-light">
                                          <span class="tf-icon mdi mdi-eye me-1"></span>User List
                                        </a>
                                      </div>
                                    </div>



                                
                                <div class="card-body text-center">

  <div class="row">
                    <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-8 mt-3">



                    <form class="pt-0" method = "post" action = "{{ route('tenantuser.save') }}">
                      <!-- Currency Name-->
                      {{ csrf_field() }}


                       <div class="form-floating form-floating-outline mb-4">
                        <select
                              id="branch_id"
                              name="branch_id"
                              class="form-select"
                              data-allow-clear="true" required>
                              <option value="">Select branch</option>    
                              @foreach($branch as $bran)
                               <option value="{{ $bran->id }}">{{ $bran->branchname }}</option> 
                              @endforeach                         
                            </select>
                            <label for="branch_id">Select Branch Name</label>
                       </div>
                   
                      @error('branch_id')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                       <div class="form-floating form-floating-outline mb-4">
                        <select
                              id="role"
                              name="role"
                              class="form-select"
                              data-allow-clear="true" required>
                              <option value="">Select role</option>                                
                              <option value="Branch Admin">Branch Admin</option>
                              <option value="Cashier">Cashier</option>
                                                 
                            </select>
                            <label for="role">Select Role</label>
                       </div>
                   
                      @error('role')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                         <div class="form-floating form-floating-outline mb-4">
                        <input type="text" 
                        name="name"  
                        class="form-control" 
                        id="name" 
                        placeholder="Enter Full Name"  
                        aria-label="Full Name" 
                        value = "{{ old('name') }}"
                        required
                        />
                        <label for="basic-default-fullname">Full Name</label>
                      </div>
                      @error('name')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                        <div class="form-floating form-floating-outline mb-4">
                            <input type="number" name="mobile" required id="basic-default-phone" class="form-control" placeholder="9876543210" aria-label="Mobile No" value = "{{ old('mobile') }}" />
                            <label for="basic-default-phone">Mobile No</label>
                        </div>

                     @error('mobile')
                       <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      

                    <div class="form-floating form-floating-outline mb-4">
                        <input type="date" name="dob" required id="html5-date-input" class="form-control" placeholder="DOB" aria-label="DOB" value = "{{ old('dob') }}" />
                        <label for="basic-default-phone">DOB</label>
                    </div>
                     @error('dob')
                       <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      
                                
                    <div class="form-floating form-floating-outline mb-4">
                        <select id="gender" class="form-select" name="gender" required>
                            <option value="">Select</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Other">Other</option>                                        
                        </select>
                        <label for="collapsible-role">Gender</label>
                    </div>                                
                    
                    @error('gender')
                       <div class="alert alert-danger">{{ $message }}</div>
                     @enderror

                                             
                           
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" id="email" class="form-control"
                            placeholder="email" aria-label="email"
                            name="email"
                            aria-describedby="basic-default-email2" value = "{{ old('email') }}" />
                        <label for="basic-default-email">Email</label>
                    </div>
                     @error('email')
                       <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
             
                              

                    <div class="form-floating form-floating-outline mb-4">
                        <input type="password" name="password" required class="form-control" id="basic-default-password" placeholder="********" />
                        <label for="basic-default-password">Password</label>
                    </div>
                      @error('password')
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

