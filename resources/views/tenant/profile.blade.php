@extends('layouts.app-tenant')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="/assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top" />
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="/assets/img/avatars/1.png" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $users->name }}</h4>
                                
                            </div>                            
                        </div>
                    </div>

                </div>

                     <div class="dt-action-buttons text-end pt-3 pt-md-0 mb-4">
                    <div class="dt-buttons">
                        <a href="{{ route('tenant.profile.edit', [ 'id' => $users->id ] ) }}" class="dt-button create-new btn btn-primary btn-sm" >
                           <span class="tf-icon mdi mdi-pencil me-1 "></span>Edit</span>
</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <div class="row">
        <!-- Basic Info -->
        <div class="col-xl-4 col-lg-4 col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-text text-primary text-uppercase">Basic Info</h6>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-3">
                            <i class="mdi mdi-account-outline mdi-24px"></i><span class="fw-medium mx-2">Full
                                Name:</span> <span>{{ $users->name }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="mdi mdi-badge-account mdi-24px"></i><span class="fw-medium mx-2">Role:</span>
                            <span>{{ $users->role }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="mdi mdi-clipboard-text-clock-outline mdi-24px"></i><span class="fw-medium mx-2">DOB:</span>
                            <span>{{ $users->dob }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="mdi mdi-gender-male-female mdi-24px"></i><span class="fw-medium mx-2">Gender:</span>
                            <span>{{ $users->gender }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="mdi mdi-cellphone mdi-24px"></i><span class="fw-medium mx-2">Mobile:</span>
                            <span>{{ $users->mobile }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="mdi mdi-email-outline mdi-24px"></i><span class="fw-medium mx-2">Email:</span>
                            <span>{{ $users->email }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="mdi mdi-list-status mdi-24px"></i><span class="fw-medium mx-2">Status:</span>
                            <span>{{ $users->status }}</span>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!-- Business info -->
      
        <div class="col-xl-8 col-lg-8 col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-text text-primary text-uppercase">Tenant Company</h6>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-3">
                            <i class="mdi mdi-domain mdi-24px"></i><span class="fw-medium mx-2">Name : {{ $tenant->company_name }}</span>
                            <span></span>
                        </li>                        
                    </ul>
                </div>
            </div>
        </div>
   
    </div>

</div>
<!-- / Content -->
@endsection