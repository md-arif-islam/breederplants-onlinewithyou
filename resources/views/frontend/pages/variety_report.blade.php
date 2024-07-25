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
                                                    <img src="{{ asset($varietyReport->thumbnail) }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="entry-content">

                                            <div class="d-flex justify-content-between mb-20">
                                                <h2>{{ $varietyReport->name }}</h2>
                                                <a href="{{route('frontend.variety-reports.edit', $varietyReport->id)}}" class="btn btn-fill-out hover-up"
                                                   style="padding: 10px 18px; font-size: 10px; border: none;">Edit</a>
                                            </div>


                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Variety</span>
                                                <span>{{ $varietyReport->variety }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Breeder name</span>
                                                <span>{{ $varietyReport->breeder->name ?? 'N/A' }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Grower name</span>
                                                <span>{{ $varietyReport->grower->name ?? 'N/A' }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Trial Location</span>
                                                <span>{{ $varietyReport->trial_location }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Date of propagation</span>
                                                <span>{{ $varietyReport->date_of_propagation }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Date of potting</span>
                                                <span>{{ $varietyReport->date_of_potting }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Amount of plants</span>
                                                <span>{{ $varietyReport->amount_of_plants }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Amount of samples</span>
                                                <span>{{ $varietyReport->amount_of_samples }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Next sample date</span>
                                                <span>{{ $varietyReport->next_sample_date }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Pot Size</span>
                                                <span>{{ $varietyReport->pot_size }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Pot Trial</span>
                                                <span>{{ $varietyReport->pot_trial ? 'Yes' : 'No' }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Open Field Trial</span>
                                                <span>{{ $varietyReport->open_field_trial ? 'Yes' : 'No' }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Cut Back</span>
                                                <span>{{ $varietyReport->cut_back ? 'Yes' : 'No' }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Removed Flowers</span>
                                                <span>{{ $varietyReport->removed_flowers }}</span>
                                            </div>

                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Caned</span>
                                                <span>{{ $varietyReport->caned ? 'Yes' : 'No' }}</span>
                                            </div>
                                        </div>
                                    </article>


                                </div>
                            </div>
                        </div>

                        <div class="row loop-grid loop-list ">
                            @foreach($varietyReport->samples as $sample)
                                <div class="col-md-6 col-sm-12">
                                    <a href="{{route('frontend.variety-samples.show', $sample->id)}}">
                                        <article class="wow fadeIn animated hover-up mb-30">
                                            <div class="post-thumb">
                                                <img src="{{ asset($sample->images[count($sample->images) - 1]) }}" alt="">
                                            </div>
                                            <div class="entry-content-2">

                                                <p class="post-exerpt">Sample Date: {{ $sample->date }}</p>
                                                <p class="post-exerpt">Leaf Color: {{ $sample->leaf_color }}</p>
                                                <p class="post-exerpt">Amount of Branches: {{ $sample->amount_of_branches }}</p>
                                                <p class="post-exerpt">Flower Buds: {{ $sample->flower_buds }}</p>
                                                <p class="post-exerpt">Branch Color: {{ $sample->branch_color }}</p>

                                            </div>
                                        </article>
                                    </a>

                                </div>
                            @endforeach
                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <a href="{{route('frontend.variety-samples.create')}}" class="btn btn-fill-out btn-block hover-up w-100" name="submit">Add
                                        New SAmple
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
