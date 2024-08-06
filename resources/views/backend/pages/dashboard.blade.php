@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="content-main my-5" style="height: 80vh">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-body box--shadow">
                    <h5 class="card-title">Total Growers</h5>
                    <p class="card-text">{{ $totalGrowers }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-body box--shadow">
                    <h5 class="card-title">Total Breeders</h5>
                    <p class="card-text">{{ $totalBreeders }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-body box--shadow">
                    <h5 class="card-title">Total Variety Reports</h5>
                    <p class="card-text">{{ $totalVarietyReports }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-body box--shadow">
                    <h5 class="card-title">Total Variety Samples</h5>
                    <p class="card-text">{{ $totalVarietySamples }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
