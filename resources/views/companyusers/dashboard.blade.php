@extends('layouts.app-companyusers')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-4 mb-4">
        <div class="col-xl-6">
            <div class="card h-100">
                <div class="card-body text-nowrap">
                     <h4 class="card-title mb-4">Welcome {{ $tenant->company_name }} 🚀 </h4> 
                     <hr class="m-1">
                    <h5 class="d-flex gap-2 flex-wrap mb-4 mt-4">{{ auth()->user()->name }} 🎉

                    <br><br>View Your report

                    </h5>
                
                                      
                    
                    <a href="javascript:;" class="btn btn-sm btn-primary">View Sales</a>
                </div>
                <img src="../../assets/img/illustrations/trophy.png" class="position-absolute bottom-0 end-0 me-3"
                    height="140" alt="view sales" />
            </div>
        </div>
        <!--/ Congratulations card -->


        <!-- Total Expenses -->
        <div class="col-xl-2 col-md-3 col-sm-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                        <div class="avatar">
                            <div class="avatar-initial bg-label-success rounded">
                                <i class="mdi mdi-currency-usd mdi-24px"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-success me-1">+38%</p>
                            <i class="mdi mdi-chevron-up text-success"></i>
                        </div>
                    </div>
                    <div class="card-info mt-4 pt-1">
                        <h5 class="mb-2">$13.4k</h5>
                        <p>Total Sales</p>
                        <div class="badge bg-label-secondary rounded-pill">Last Six Month</div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Expenses -->

        <!-- Total Profit chart -->
        <div class="col-xl-2 col-md-3 col-sm-6">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
                        <h4 class="mb-0 me-2">$88.5k</h4>
                        <p class="mb-0 text-danger">-18%</p>
                    </div>
                    <span class="d-block mb-2 text-body">Total Profit</span>
                </div>
                <div class="card-body">
                    <div id="totalProfitChart"></div>
                </div>
            </div>
        </div>
        <!--/ Total Profit chart -->

        <!-- Total Growth chart -->
        <div class="col-xl-2 col-md-3 col-sm-6">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
                        <h4 class="mb-0 me-2">$27.9k</h4>
                        <p class="mb-0 text-success">+16%</p>
                    </div>
                    <span class="d-block mb-2 text-body">Total Growth</span>
                </div>
                <div class="card-body">
                    <div id="totalGrowthChart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection