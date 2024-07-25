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

                        @foreach($varietyReports as $report)
                            <div class="col-md-6 col-sm-12">
                                <a href="{{route('frontend.variety-reports.show', $report->id)}}">
                                    <article class="wow fadeIn animated hover-up mb-30">
                                        <div class="post-thumb">
                                            <img src="{{ asset($report->thumbnail) }}" alt="">
                                        </div>
                                        <div class="entry-content-2">
                                            <h3 class="post-title mb-15">
                                                <a href="blog-post-right.html">{{ $report->name }}</a>
                                            </h3>
                                            <p class="post-exerpt ">Date of Propagation: {{$report->date_of_propagation}}
                                            </p>

                                            <p class="post-exerpt ">Date of Potting: {{$report->date_of_potting}}
                                            </p>

                                            <p class="post-exerpt ">Next Sample Date: {{$report->next_sample_date}}
                                            </p>

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
            </div>
        </section>
    </main>
@endsection
