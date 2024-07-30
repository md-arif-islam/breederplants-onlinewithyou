@extends('frontend.layouts.app')
@section('title', 'Home')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="credit">
                        @php
                            function getInitials($name) {
                                $words = explode(' ', $name);
                                $initials = '';

                                foreach ($words as $word) {
                                    $initials .= strtoupper($word[0]);
                                }

                                return $initials;
                            }

                            $user = Auth::user();
                            $nameLogo = '';

                            if ($user->role == 'admin') {
                                $nameLogo = 'A';
                                $userName = 'Admin';
                            } elseif ($user->role == 'grower') {
                                $userName = $user->grower ? $user->grower->name : 'Grower name not available';
                                $nameLogo = $user->grower ? getInitials($user->grower->name) : 'GN';
                            } elseif ($user->role == 'breeder') {
                                $userName = $user->breeder ? $user->breeder->name : 'Breeder name not available';
                                $nameLogo = $user->breeder ? getInitials($user->breeder->name) : 'BN';
                            } else {
                                $userName = 'Role not specified';
                            }
                        @endphp
                        <div class="name-logo"><span>{{$nameLogo}}</span></div>
                        <div class="user">
                            <h5>Welcome Back</h5>
                            <h2>
                                {{ $userName }}
                            </h2>
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
                            <a href="{{ route('frontend.variety-reports.show', $report->id) }}"
                               class="col-md-6 col-sm-12">
                                <div class="row variety-report-item">
                                    @php
                                        $samples = $report->samples;
                                        $lastSample = $samples->last();
                                        $images = $lastSample ? json_decode($lastSample->images) : [];
                                        $lastImage = $images[count($images) - 1] ;
                                    @endphp
                                    <div class="col-5 bg-image"
                                         style="background-image: url({{ asset($lastImage) }}); background-size: cover; height: auto; min-height: 300px; background-position: center">
                                    </div>
                                    <div class="col-7 d-flex align-items-center">
                                        <div class="entry-content-2">
                                            <h3 class="post-title mb-15">
                                                {{ $report->variety_name }}
                                            </h3>
                                            <p class="post-excerpt">Date of
                                                Propagation: {{ $report->date_of_propagation }}</p>
                                            <p class="post-excerpt">Date of Potting: {{ $report->date_of_potting }}</p>
                                            <p class="post-excerpt">Next Sample
                                                Date: {{ json_decode($report->samples_schedule)[0] }}</p>
                                        </div>
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
