@extends('frontend.layouts.app')
@section('title', 'Home')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="credit">
                        <img src="{{ asset('assets/frontend/imgs/avatar.png') }}" alt="">
                        <div class="user">
                            <h5>Welcome Back</h5>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <div class="notification">
                        <img src="{{ asset('assets/frontend/imgs/notification-bing.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <section class="main-section">
            <div class="container custom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-header mb-20">
                            <h1 class="font-xxl">Varieties</h1>
                        </div>
                    </div>

                    <div class="row loop-grid loop-list">
                        @foreach($varietyReports as $report)
                            <div class="col-md-6 col-sm-12">
                                <a href="{{ route('frontend.variety-reports.show', $report->id) }}">
                                    <article class="wow fadeIn animated hover-up mb-30">
                                        <div class="post-thumb">
                                            @php
                                                $samples = $report->samples;
                                                $lastSample = $samples->last();
                                                $images = $lastSample ? json_decode($lastSample->images) : [];
                                                $lastImage = $images[count($images) - 1] ;
                                            @endphp
                                            <img src="{{ asset($lastImage) }}" alt="{{ $report->variety_name }}">
                                        </div>
                                        <div class="entry-content-2">
                                            <h3 class="post-title mb-15">
                                                <a href="{{ route('frontend.variety-reports.show', $report->id) }}">{{ $report->variety_name }}</a>
                                            </h3>
                                            <p class="post-excerpt">Grower name: {{ $report->grower->name }}</p>
                                            <p class="post-excerpt">Breeder name: {{ $report->breeder->name }}</p>
                                            <p class="post-excerpt">Trial Location: {{ $report->trial_location }}</p>
                                            <p class="post-excerpt">Date of Propagation: {{ $report->date_of_propagation }}</p>
                                            <p class="post-excerpt">Date of Potting: {{ $report->date_of_potting }}</p>
                                            <p class="post-excerpt">Amount of Plants: {{ $report->amount_of_plants }}</p>
                                            <p class="post-excerpt">Amount of Samples: {{ $report->samples->count() }}</p>
                                            <p class="post-excerpt">Next Sample Date: {{ json_decode($report->samples_schedule)[0] }}</p>
                                        </div>
                                    </article>
                                </a>
                            </div>
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
