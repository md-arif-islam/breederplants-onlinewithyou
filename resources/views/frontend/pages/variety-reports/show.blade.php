@extends('frontend.layouts.app')
@section('title', 'View Variety Report')
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
                                                        <img src="{{ asset('assets/frontend/imgs/Chevron_Left.svg') }}" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-thumb img-hover-scale text-center">
                                                @php
                                                    $samples = $varietyReport->samples;
                                                    $lastSample = $samples->last();
                                                    $images = $lastSample ? json_decode($lastSample->images) : [];
                                                    $lastImage = $images[count($images) - 1];
                                                @endphp
                                                <img src="{{ asset($lastImage) }}" alt="{{ $varietyReport->variety_name }}">
                                            </div>
                                        </div>
                                        <div class="entry-content">
                                            <div class="d-flex justify-content-between mb-20">
                                                <h2>{{ $varietyReport->variety_name }}</h2>
                                                <a href="{{ route('frontend.variety-reports.edit', $varietyReport->id) }}" class="btn btn-fill-out hover-up" style="padding: 10px 18px; font-size: 10px; border: none;">Edit</a>
                                            </div>


                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Grower Name</span>
                                                <span>{{ $varietyReport->grower->name ?? 'N/A' }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Breeder Name</span>
                                                <span>{{ $varietyReport->breeder->name ?? 'N/A' }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Trial Location</span>
                                                <span>{{ $varietyReport->grower->name }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Date of Propagation</span>
                                                <span>{{ $varietyReport->date_of_propagation }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Date of Potting</span>
                                                <span>{{ $varietyReport->date_of_potting }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Amount of Plants</span>
                                                <span>{{ $varietyReport->amount_of_plants }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Amount of Samples</span>
                                                <span>{{ $varietyReport->samples->count() }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between sub-items">
                                                <span class="name">Next Sample Date</span>
                                                <span>{{ json_decode($varietyReport->samples_schedule)[0] }}</span>
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

                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>

                        <div class="row loop-grid loop-list">
                            @foreach($varietyReport->samples as $sample)
                                <div class="col-md-6 col-sm-12">
                                    <a href="{{ route('frontend.variety-samples.show', $sample->id) }}">
                                        <article class="wow fadeIn animated hover-up mb-30">
                                            <div class="post-thumb">
                                                @php
                                                    $images = json_decode($sample->images);
                                                    $lastImage = $images[count($images) - 1];
                                                @endphp
                                                <img src="{{ asset($lastImage) }}" alt="{{ $sample->sample_date }}">
                                            </div>
                                            <div class="entry-content-2">
                                                <p class="post-excerpt">Sample Date: {{ $sample->sample_date }}</p>
                                                <p class="post-excerpt">Leaf Color: {{ $sample->leaf_color }}</p>
                                                <p class="post-excerpt">Amount of Branches: {{ $sample->amount_of_branches }}</p>
                                                <p class="post-excerpt">Flower Buds: {{ $sample->flower_buds }}</p>
                                                <p class="post-excerpt">Branch Color: {{ $sample->branch_color }}</p>
                                                <p class="post-excerpt">Roots: {{ $sample->roots }}</p>
                                                <p class="post-excerpt">Flower Color: {{ $sample->flower_color }}</p>
                                                <p class="post-excerpt">Flower Petals: {{ $sample->flower_petals }}</p>
                                                <p class="post-excerpt">Flowering Time: {{ $sample->flowering_time }}</p>
                                                <p class="post-excerpt">Length of Flowering: {{ $sample->length_of_flowering }}</p>
                                                <p class="post-excerpt">Seeds: {{ $sample->seeds }}</p>
                                                <p class="post-excerpt">Seed Color: {{ $sample->seed_color }}</p>
                                                <p class="post-excerpt">Amount of Seeds: {{ $sample->amount_of_seeds }}</p>
                                            </div>
                                        </article>
                                    </a>
                                </div>
                            @endforeach

                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <a href="{{ route('frontend.variety-samples.create', $varietyReport->id) }}" class="btn btn-fill-out btn-block hover-up w-100" name="submit">Add New Sample</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
