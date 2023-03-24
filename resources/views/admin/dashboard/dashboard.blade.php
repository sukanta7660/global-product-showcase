@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Total Product -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Product</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($products) }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Total Product -->

                    <!-- Total Shop Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Shop</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-shop"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($shops) }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Total Shop Card -->

                    <!-- Total Location Card -->
                    <div class="col-xxl-4 col-xl-4">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Location</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-map"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($locations) }}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
