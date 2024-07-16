@extends('frontend.layouts.app')
@section('title', 'Home')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="credit">
                        <img src="{{asset('assets/frontend/imgs/avatar.png')}}" alt="">
                        <div class="user">
                            <h5>Welcome Back</h5>
                            <h2>{{Auth::user()->name}}</h2>
                        </div>
                    </div>
                    <div class="notification">
                        <img src="{{asset('assets/frontend/imgs/notification-bing.svg')}}" alt="">
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
                    <div class="row loop-grid loop-list ">
                        <div class="col-md-6 col-sm-12">
                            <a href="/growers/name">
                                <article class="wow fadeIn animated hover-up mb-30">
                                    <div class="post-thumb">
                                        <img src="{{asset('assets/frontend/imgs/Hydrangea.png')}}" alt="">
                                    </div>
                                    <div class="entry-content-2">
                                        <h3 class="post-title mb-15">
                                            <a href="blog-post-right.html">Hydrangea</a>
                                        </h3>
                                        <p class="post-exerpt mb-30">Lorem Ipsum is simply dummy text of the printing.
                                        </p>
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on"> Start Date: 25 April 2022</span>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                            </a>

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <a href="/growers/name">
                                <article class="wow fadeIn animated hover-up mb-30">
                                    <div class="post-thumb">
                                        <img src="{{asset('assets/frontend/imgs/Hydrangea.png')}}" alt="">
                                    </div>
                                    <div class="entry-content-2">
                                        <h3 class="post-title mb-15">
                                            <a href="blog-post-right.html">Hydrangea</a>
                                        </h3>
                                        <p class="post-exerpt mb-30">Lorem Ipsum is simply dummy text of the printing.
                                        </p>
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on"> Start Date: 25 April 2022</span>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <a href="/growers/name">
                                <article class="wow fadeIn animated hover-up mb-30">
                                    <div class="post-thumb">
                                        <img src="{{asset('assets/frontend/imgs/Hydrangea.png')}}" alt="">
                                    </div>
                                    <div class="entry-content-2">
                                        <h3 class="post-title mb-15">
                                            <a href="blog-post-right.html">Hydrangea</a>
                                        </h3>
                                        <p class="post-exerpt mb-30">Lorem Ipsum is simply dummy text of the printing.
                                        </p>
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on"> Start Date: 25 April 2022</span>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <a href="/growers/name">
                                <article class="wow fadeIn animated hover-up mb-30">
                                    <div class="post-thumb">
                                        <img src="{{asset('assets/frontend/imgs/Hydrangea.png')}}" alt="">
                                    </div>
                                    <div class="entry-content-2">
                                        <h3 class="post-title mb-15">
                                            <a href="blog-post-right.html">Hydrangea</a>
                                        </h3>
                                        <p class="post-exerpt mb-30">Lorem Ipsum is simply dummy text of the printing.
                                        </p>
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on"> Start Date: 25 April 2022</span>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <a href="/growers/name">
                                <article class="wow fadeIn animated hover-up mb-30">
                                    <div class="post-thumb">
                                        <img src="{{asset('assets/frontend/imgs/Hydrangea.png')}}" alt="">
                                    </div>
                                    <div class="entry-content-2">
                                        <h3 class="post-title mb-15">
                                            <a href="blog-post-right.html">Hydrangea</a>
                                        </h3>
                                        <p class="post-exerpt mb-30">Lorem Ipsum is simply dummy text of the printing.
                                        </p>
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on"> Start Date: 25 April 2022</span>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <a href="/growers/name">
                                <article class="wow fadeIn animated hover-up mb-30">
                                    <div class="post-thumb">
                                        <img src="{{asset('assets/frontend/imgs/Hydrangea.png')}}" alt="">
                                    </div>
                                    <div class="entry-content-2">
                                        <h3 class="post-title mb-15">
                                            <a href="blog-post-right.html">Hydrangea</a>
                                        </h3>
                                        <p class="post-exerpt mb-30">Lorem Ipsum is simply dummy text of the printing.
                                        </p>
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on"> Start Date: 25 April 2022</span>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
@endsection
