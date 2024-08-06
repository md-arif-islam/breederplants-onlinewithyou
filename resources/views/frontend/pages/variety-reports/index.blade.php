@extends('frontend.layouts.app')
@section('title', 'Home')
@section('body-class', 'body-FCFCFC')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="credit">
                    @include('frontend.layouts.partials.credit')
                </div>
                <div class="d-flex justify-content-between">
                    <div class="notification mx-1">
                        <img src="{{ asset('assets/frontend/imgs/notification-bing.svg') }}" alt="">
                    </div>
                    <a href="{{ route('logout') }}" class="notification mx-1">
                        <img src="{{ asset('assets/frontend/imgs/Log_Out.svg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="main-section body-FCFCFC">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-header mb-20">
                        <h1 class="vri-head">Varieties</h1>
                    </div>
                </div>

                <div class="row loop-grid loop-list" style="margin: 0; padding: 0">
                    @if($varietyReports->isEmpty())
                        <div class="col-12">
                            <div class="alert alert-warning">No variety reports found.</div>
                        </div>
                    @endif
                    @foreach($varietyReports as $report)
                        <a href="{{ route('frontend.variety-reports.show', $report->id) }}" class="col-md-6 col-sm-12">
                            <div class="row variety-report-item">

                                @php
                                    $lastImage = "/assets/backend/imgs/products/blank_product.png";
                                    if ($report->samples->isNotEmpty()) {
                                        $samples = $report->samples;
                                        $lastSample = $samples->last();
                                        $images = $lastSample ? json_decode($lastSample->images, true) : [];
                                        if (!empty($images)) {
                                            $lastImage = end($images);
                                        }
                                    }
                                @endphp

                                <div class="col-4 bg-image" style="background-image: url({{ asset($lastImage) }});">
                                </div>

                                <div class="col-8 d-flex vri-content align-items-center">
                                    <div class="entry-content-2" style="width: 100%">
                                        <h3 class="vri-title mb-15">
                                            {{ $report->variety_name ?? 'N/A' }}
                                        </h3>
                                        <p class="vri-excerpt">Next Sample Date: <span>{{ json_decode($report->samples_schedule)[0] ?? 'N/A' }}</span></p>
                                    </div>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>

                <div class="pagination-area mt-15 mb-50 d-flex justify-content-center">
                    {{ $varietyReports->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
