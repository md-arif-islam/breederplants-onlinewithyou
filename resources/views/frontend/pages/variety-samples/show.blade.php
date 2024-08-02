@extends('frontend.layouts.app')
@section('title', 'View Sample')
@section('body-class', 'body-FCFCFC')
@section('head')
    <style>
        .zoomContainer {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap2">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="credit ">
                        <a style="line-height: 0" href="{{ url()->previous() }}" class="notification">
                            <img src="{{ asset('assets/frontend/imgs/Chevron_Left.svg') }}" alt="">
                        </a>
                    </div>
                    <div class="notification text-center w-100">
                        <h2 class="vss-title">{{ $sample->varietyReport->variety_name }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            @foreach(json_decode($sample->images) as $image)
                                                <figure class="border-radius-10">
                                                    <a href="{{ asset($image) }}" class="popup-link">
                                                        <img src="{{ asset($image) }}" alt="Sample Image">
                                                    </a>
                                                </figure>
                                            @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            @foreach(json_decode($sample->images) as $image)
                                                <div>
                                                    <img style="cursor: pointer" src="{{ asset($image) }}"
                                                         alt="Sample Image">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <div class="d-flex justify-content-between mb-20">
                                            <h2 class="vrs-title">{{ $sample->varietyReport->variety_name}}</h2>
                                            <a href="{{ route('frontend.variety-samples.edit', $sample->id) }}" class="vss-change-btn"> <i class="far fa-pen"></i>
                                                Change</a>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Sample Date</span>
                                            <span>{{ $sample->sample_date }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Leaf Color</span>
                                            <span>{{ $sample->leaf_color }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Amount of Branches</span>
                                            <span>{{ $sample->amount_of_branches }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Flower Buds</span>
                                            <span>{{ $sample->flower_buds }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Branch Color</span>
                                            <span>{{ $sample->branch_color }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Roots</span>
                                            <span>{{ $sample->roots }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Flower Color</span>
                                            <span>{{ $sample->flower_color }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Flower Petals</span>
                                            <span>{{ $sample->flower_petals }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Flowering Time</span>
                                            <span>{{ $sample->flowering_time }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Length of Flowering</span>
                                            <span>{{ $sample->length_of_flowering }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Seeds</span>
                                            <span>{{ $sample->seeds }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Seed Color</span>
                                            <span>{{ $sample->seed_color }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Amount of Seeds</span>
                                            <span>{{ $sample->amount_of_seeds }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between ves-items">
                                            <span class="name">Status</span>
                                            <span>{{ $sample->status ? 'Active' : 'Inactive' }}</span>
                                        </div>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <a href="{{ route('frontend.variety-samples.edit', $sample->id) }}"
                                       class="btn vrs-button w-100">
                                        <i class="far fa-pen"></i>
                                        Change
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/shop.js?v=3.4') }}"></script>
    <script>
        $(document).ready(function () {
            $('.popup-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
@endsection
