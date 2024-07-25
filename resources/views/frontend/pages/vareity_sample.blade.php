@extends('frontend.layouts.app')
@section('title', 'Home')
@section('head')
    <style>
        .zoomContainer {
            display: none;
        }
    </style>
@endsection

@section('content')

    <main class="main">
        <div class="page-header breadcrumb-wrap2">
            <div class="container">
                <div class="d-flex">
                    <div class="credit ">
                        <a href="" class="notification">
                            <img src="{{asset('assets/frontend/imgs/Chevron_Left.svg')}}" alt="">
                        </a>
                    </div>
                    <div class="notification text-center w-100">
                        <h2 style="color: #fff;">{{$sample->varietyReport->name}}</h2>
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
                                            @foreach($sample->images as $image)
                                                <figure class="border-radius-10">
                                                    <img src="{{ asset($image) }}"
                                                         alt="product image">
                                                </figure>
                                            @endforeach


                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            @foreach($sample->images as $image)
                                                <div><img src="{{ asset($image) }}" alt="product image"></div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">

                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Sample Date</span>
                                            <span>{{ $sample->date }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Leaf Color</span>
                                            <span>{{ $sample->leaf_color }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Amount of Branches</span>
                                            <span>{{ $sample->amount_of_branches }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Flower Buds</span>
                                            <span>{{ $sample->flower_buds }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Branch Color</span>
                                            <span>{{ $sample->branch_color }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Roots</span>
                                            <span>{{ $sample->roots }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Flower Color</span>
                                            <span>{{ $sample->flower_color }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Flower Petals</span>
                                            <span>{{ $sample->flower_petals }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Length of Flowering</span>
                                            <span>{{ $sample->length_of_flowering }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Seeds</span>
                                            <span>{{ $sample->seeds }}</span>
                                        </div>


                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Seed Color</span>
                                            <span>{{ $sample->seed_color }}</span>
                                        </div>


                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Amount of Seeds</span>
                                            <span>{{ $sample->amount_of_seeds }}</span>
                                        </div>

                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <a href="{{route('frontend.variety-samples.edit', $sample->id)}}" class="btn btn-fill-out btn-block hover-up w-100" name="submit">
                                        Edit Sample
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
    <script src="{{asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/slick.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/wow.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery.elevatezoom.js')}}"></script>
    <script src="{{asset('assets/frontend/js/shop.js?v=3.4')}}"></script>

@endsection

