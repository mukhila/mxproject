@extends('layouts.app-admin')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">User /</span> Add</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">User Add</h5>

                </div>
                 <div class="dt-action-buttons text-end pt-3 pt-md-0">
                    <div class="dt-buttons">
                        <a href="{{ route('user.list') }}" class="dt-button create-new btn btn-primary btn-sm" >
                           <span class="tf-icon mdi mdi-eye me-1"></span>User List</span>
</a>
                    </div>
                </div>
                <div class="card-body">
				  <div class="row">
				  <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-8 mt-3">
				
                    <form method="POST" action="{{ route('user.create') }}">
                        @csrf
                      
                          
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

                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="number" name="mobile" required id="basic-default-phone" class="form-control" placeholder="9876543210" aria-label="Mobile No" value = "{{ old('mobile') }}" />
                                    <label for="basic-default-phone">Mobile No</label>
                                </div>

								<div class="form-floating form-floating-outline mb-4">
                                    <input type="date" name="dob" required id="html5-date-input" class="form-control" placeholder="DOB" aria-label="DOB" value = "{{ old('dob') }}" />
                                    <label for="basic-default-phone">DOB</label>
                                </div>
					
								
                                <div class="form-floating form-floating-outline mb-4">
                                    <select id="gender" class="select2 form-select" name="gender" required>
                                        <option value=""></option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                        <option value="Other">Other</option>                                        
                                    </select>
                                    <label for="collapsible-role">Gender</label>
                                </div>                                
                           

                                <div class="form-floating form-floating-outline mb-4">
                                    <select id="collapsible-role" class="select2 form-select" name="role" required>
                                        <option value=""></option>
                                        <option value="Super Admin">Super Admin</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Executive">Executive</option>
                                    </select>
                                    <label for="collapsible-role">Role</label>
                                </div>                                
                           
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" id="email" class="form-control"
                                                placeholder="email" aria-label="email"
                                                name="email"
                                                aria-describedby="basic-default-email2" value = "{{ old('email') }}" />
                                            <label for="basic-default-email">Email</label>
                                        </div>
                                 
                              

                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="password" name="password" required class="form-control" id="basic-default-password" placeholder="********" />
                                    <label for="basic-default-password">Password</label>
                                </div>

						
                          
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div style="color:red;">{{ $error }}</div>
                            @endforeach
                        @endif
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
					</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
