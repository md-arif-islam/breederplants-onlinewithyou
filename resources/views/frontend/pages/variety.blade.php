@extends('frontend.layouts.app')
@section('title', 'Home')
@section('content')
    <main class="main">
        <section class="main-section-2">
            <div class="container custom">
                <div class="row" style="margin: 0; padding: 0;">
                    <div class="col-lg-12" style="margin: 0; padding: 0;">
                        <div class="loop-grid pr-30">
                            <div class="row">
                                <div class="col-12" style="margin: 0; padding: 0;">
                                    <article class="first-post mb-30 wow fadeIn animated hover-up">
                                        <div class="img-hover-slide position-relative overflow-hidden">
                                            <div class="top-right-icon">
                                                <a href="/">
                                                    <div class="notification shadow">
                                                        <img src="{{asset('assets/frontend/imgs/Chevron_Left.svg')}}"
                                                             alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-thumb img-hover-scale text-center">
                                                <a href="blog-post-right.html">
                                                    <img src="{{asset('assets/frontend/imgs/big.png')}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="entry-content">

                                            <div class="d-flex justify-content-between mb-20">
                                                <h2>Hydrangea</h2>
                                                <a href="" class="btn btn-fill-out hover-up"
                                                   style="padding: 10px 18px; font-size: 10px; border: none;">Edit</a>
                                            </div>


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
                                    </article>


                                </div>
                            </div>
                        </div>

                        <div class="row loop-grid loop-list ">
                            <div class="col-md-6 col-sm-12">
                                <a href="">
                                    <article class="wow fadeIn animated hover-up mb-30">
                                        <div class="post-thumb">
                                            <img src="{{asset('assets/frontend/imgs/Hydrangea.png')}}" alt="">
                                        </div>
                                        <div class="entry-content-2">
                                            <h3 class="post-title mb-15">
                                                <a href="blog-post-right.html">Hydrangea</a>
                                            </h3>
                                            <p class="post-exerpt mb-30">Lorem Ipsum is simply dummy text of the
                                                printing.
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

                            </div>
                            <div class="col-md-6 col-sm-12">
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

                            </div>
                            <div class="col-md-6 col-sm-12">
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

                            </div>
                            <div class="col-md-6 col-sm-12">
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

                            </div>
                            <div class="col-md-6 col-sm-12">
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
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <button type="submit" class="btn btn-fill-out btn-block hover-up" name="submit">Add
                                        New SAmple
                                    </button>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
