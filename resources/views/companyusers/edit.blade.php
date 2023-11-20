@extends('layouts.app-companyusers')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Profile /</span> Edit</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Profile Edit</h5>

                </div>
                 <div class="dt-action-buttons text-end pt-3 pt-md-0">
                    <div class="dt-buttons">
                        <a href="{{ route('companyusers.profile') }}" class="dt-button create-new btn btn-primary btn-sm" >
                            <span class="tf-icon mdi mdi-eye me-1"></span>Profile View</a>
                    </div>
                </div>
                <div class="card-body">
				
				  <div class="row">
				  <div class="row gy-4 gy-md-0">
                        <!-- list topic -->
                        
                        <div class="col-md-8 mt-3">
				
                    <form method="POST" action="{{ route('companyusers.profile.update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
						
						
						
						<div class="form-floating form-floating-outline mb-4">
                                    <input type="text" 
                                    name="name"  
                                    class="form-control" 
                                    id="name" 
                                    placeholder="Enter Full Name"  
                                    aria-label="Full Name" 
                                    value = "{{ $user->name }}"
                                    required
                                    />
                                    <label for="basic-default-fullname">Full Name</label>
                                </div>

                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="number" name="mobile" required id="basic-default-phone" class="form-control" placeholder="9876543210" aria-label="Mobile No" value = "{{ $user->mobile }}" />
                                    <label for="basic-default-phone">Mobile No</label>
                                </div>

								<div class="form-floating form-floating-outline mb-4">
                                    <input type="calendar" name="dob" required id="basic-default-dob" class="form-control" placeholder="DOB" aria-label="DOB" value = "{{ $user->dob }}" />
                                    <label for="basic-default-phone">DOB</label>
                                </div>
					
								
                                <div class="form-floating form-floating-outline mb-4">
                                    <select id="gender" class="select2 form-select" name="gender" required>
                                        <option value=""></option>
                                        <option value="Female" @if($user->gender == 'Female') selected @endif>Female</option>
                                        <option value="Male" @if($user->gender == 'Male') selected @endif>Male</option>
                                        <option value="Other" @if($user->gender == 'Other') selected @endif>Other</option>                                        
                                    </select>
                                    <label for="collapsible-role">Gender</label>
                                </div>                               
                           
                             
                   
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" id="email" class="form-control"
                                        placeholder="email" aria-label="email"
                                        name="email"
                                        aria-describedby="basic-default-email2" value = "{{ $user->email }}" />
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
					</div>
					</div>
					</div>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
