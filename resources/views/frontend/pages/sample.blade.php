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
    <!-- Quick view -->
    <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-2.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-1.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-3.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-4.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-5.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-6.jpg" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-7.jpg" alt="product image">
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                    <div><img src="assets/imgs/shop/thumbnail-3.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image"></div>
                                    <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image"></div>
                                </div>
                            </div>
                            <!-- End Gallery -->
                            <div class="social-icons single-share">
                                <ul class="text-grey-5 d-inline-block">
                                    <li><strong class="mr-10">Share this:</strong></li>
                                    <li class="social-facebook"><a href="#"><img
                                                src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                    <li class="social-twitter"><a href="#"><img
                                                src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                    <li class="social-instagram"><a href="#"><img
                                                src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                    <li class="social-linkedin"><a href="#"><img
                                                src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h3 class="title-detail mt-30">Colorful Pattern Shirts HD450</h3>
                                <div class="product-detail-rating">
                                    <div class="pro-details-brand">
                                        <span> Brands: <a href="shop-grid-right.html">Bootstrap</a></span>
                                    </div>
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <ins><span class="text-brand">$120.00</span></ins>
                                        <ins><span class="old-price font-md ml-15">$200.00</span></ins>
                                        <span class="save-price  font-md color3 ml-15">25% Off</span>
                                    </div>
                                </div>
                                <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                <div class="short-desc mb-30">
                                    <p class="font-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam
                                        rem officia, corrupti reiciendis minima nisi modi,!</p>
                                </div>

                                <div class="attr-detail attr-color mb-15">
                                    <strong class="mr-10">Color</strong>
                                    <ul class="list-filter color-filter">
                                        <li><a href="#" data-color="Red"><span class="product-color-red"></span></a>
                                        </li>
                                        <li><a href="#" data-color="Yellow"><span
                                                    class="product-color-yellow"></span></a></li>
                                        <li class="active"><a href="#" data-color="White"><span
                                                    class="product-color-white"></span></a></li>
                                        <li><a href="#" data-color="Orange"><span
                                                    class="product-color-orange"></span></a></li>
                                        <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a>
                                        </li>
                                        <li><a href="#" data-color="Green"><span class="product-color-green"></span></a>
                                        </li>
                                        <li><a href="#" data-color="Purple"><span
                                                    class="product-color-purple"></span></a></li>
                                    </ul>
                                </div>
                                <div class="attr-detail attr-size">
                                    <strong class="mr-10">Size</strong>
                                    <ul class="list-filter size-filter font-small">
                                        <li><a href="#">S</a></li>
                                        <li class="active"><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">XL</a></li>
                                        <li><a href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="detail-extralink">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                           href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                </div>
                                <ul class="product-meta font-xs color-grey mt-50">
                                    <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                    <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#"
                                                                                               rel="tag">Women</a>, <a
                                            href="#" rel="tag">Dress</a></li>
                                    <li>Availability:<span class="in-stock text-success ml-5">8 Items In Stock</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="main">
        <div class="page-header breadcrumb-wrap2">
            <div class="container">
                <div class="d-flex">
                    <div class="credit ">
                        <div class="notification">
                            <img src="{{asset('assets/frontend/imgs/Chevron_Left.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="notification text-center w-100">
                        <h2 style="color: #fff;">Hydrangea</h2>
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
                                            <figure class="border-radius-10">
                                                <img src="{{asset('assets/frontend/imgs/shop/product-16-2.jpg')}}" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{asset('assets/frontend/imgs/shop/product-16-1.jpg')}}" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="assets/imgs/shop/product-16-3.jpg" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="assets/imgs/shop/product-16-4.jpg" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="assets/imgs/shop/product-16-5.jpg" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="assets/imgs/shop/product-16-6.jpg" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="assets/imgs/shop/product-16-7.jpg" alt="product image">
                                            </figure>
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            <div><img src="assets/imgs/shop/thumbnail-3.jpg" alt="product image"></div>
                                            <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image"></div>
                                            <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image"></div>
                                            <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image"></div>
                                            <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image"></div>
                                            <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image"></div>
                                            <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image"></div>
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">Hydrangea</h2>


                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Variety</span>
                                            <span>12</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Breeder name</span>
                                            <span>Boot & Co</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Grower name</span>
                                            <span>Newey</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Trial Location</span>
                                            <span>Chichester, UK</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Date of propagation</span>
                                            <span>20 March 2024</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Date of potting</span>
                                            <span>28 March 2024</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Amount of plants</span>
                                            <span>250</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Amount of samples</span>
                                            <span>20</span>
                                        </div>

                                        <div class="d-flex justify-content-between sub-items">
                                            <span class="name">Next sample date</span>
                                            <span>28 Oct 2024</span>
                                        </div>


                                    </div>
                                    <!-- Detail Info -->
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

