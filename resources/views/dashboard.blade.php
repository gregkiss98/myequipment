@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">carpenter</i>
                            </div>
                            <h3 class="card-title">Tool</h3>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-outline-warning" href="{{ route('tools.index') }}" role="button">Tool list</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">event</i>
                            </div>
                            <h3 class="card-title">Event</h3>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-outline-success" href="#" role="button">Event list</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">bubble_chart</i>
                            </div>
                            <h3 class="card-title">About</h3>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-outline-danger" href="#" role="button">About US</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">manage_accounts</i>
                            </div>
                            <h3 class="card-title">My Account</h3>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-outline-primary" href="#" role="button">My Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">favorites</i>
                            </div>
                            <h3 class="card-title">Support</h3>
                        </div>
                        <div class="card-footer">
                            <div>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-outline-info" href="#" role="button">Support US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush
