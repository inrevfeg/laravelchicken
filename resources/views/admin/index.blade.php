@extends('admin.admin_master')
@section('admin')
@section('title')
Admin | Nithitex India's No 1 Online Saree Shop
@endsection


  <!-- Content Header (Page header) -->
  
        <div class="page-content">
  
          <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
              <h3 class="mb-3 mb-md-0">Dashboard</h3>
            </div>
            {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
              <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
                <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
                <input type="text" class="form-control">
              </div>
            </div> --}}
          </div>

          <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
              <h4 class="mb-3 mb-md-0">Customers</h4>
            </div>
          </div>
  
          <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">New Customers</h6>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                          <h3 class="mb-2">3,897</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">All Orders</h6>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                          <h3 class="mb-2">4,506</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Pending Orders</h6>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                          <h3 class="mb-2">1,067</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Returned Orders</h6>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                          <h3 class="mb-2">172</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- row -->

          <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
              <h4 class="mb-3 mb-md-0">Resellers</h4>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">All Resellers</h6>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                          <h3 class="mb-2">3,503</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Pending Requests</h6>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                          <h3 class="mb-2">1,075</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">All Orders</h6>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                          <h3 class="mb-2">1,865</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Pending Orders</h6>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                          <h3 class="mb-2">268</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- row -->

          <div class="row">
            <div class="col-lg-12 col-xl-12 stretch-card">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order List</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice</th>
                                        <th>Customer Type</th>
                                        <th>Customer Name</th>
                                        <th>Total Price</th>
                                        <th>Delivery Status</th>
                                        <th>Payment Status</th>
                                        <th>Payment Method</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
          </div> 
        </div>
@endsection