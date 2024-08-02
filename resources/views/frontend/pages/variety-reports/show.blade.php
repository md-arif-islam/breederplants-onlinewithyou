@extends('frontend.layouts.app')
@section('title', 'View Variety Report')
@section('body-class', 'body-FCFCFC')
@section('content')
    <main class="main">
        <section class="main-section-2">
            <div class="container custom">
                <div class="row" style="margin: 0; padding: 0;">
                    <div class="col-lg-12" style="margin: 0; padding: 0;">
                        <div class="loop-grid pr-30">
                            <div class="row">
                                <div class="col-12" style="margin: 0; padding: 0;">
                                    <article class="vrs-article first-post mb-30 wow fadeIn animated hover-up">
                                        <div class="img-hover-slide position-relative overflow-hidden">
                                            <div class="top-right-icon">
                                                <a href="{{ url()->previous() }}">
                                                    <div class="notification shadow">
                                                        <img src="{{ asset('assets/frontend/imgs/Chevron_Left.svg') }}"
                                                             alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="variety-report-show-img-div text-center">
                                                @if($varietyReport->samples->isNotEmpty())
                                                    @php
                                                        $samples = $varietyReport->samples;
                                                        $lastSample = $samples->last();
                                                        $images = $lastSample ? json_decode($lastSample->images) : [];
                                                        if (count($images) > 0) {
                                                            $lastImage = $images[count($images) - 1] ;
                                                        } else {
                                                            $lastImage = "/assets/backend/imgs/products/blank_product.png";
                                                        }
                                                    @endphp
                                                    <img class="variety-report-show-img" src="{{ asset($lastImage) }}"
                                                         alt="{{ $varietyReport->variety_name }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="entry-content vrs-content">
                                            <div class="d-flex justify-content-between mb-20">
                                                <h2 class="vrs-title">{{ $varietyReport->variety_name }}</h2>
                                            </div>

                                            <div class="d-flex justify-content-between ves-items">
                                                <span class="name">Grower Name</span>
                                                <span>{{ $varietyReport->grower->name ?? 'N/A' }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between ves-items">
                                                <span class="name">Breeder Name</span>
                                                <span>{{ $varietyReport->breeder->name ?? 'N/A' }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between ves-items">
                                                <span class="name">Trial Location</span>
                                                <span>{{ $varietyReport->grower->name }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between ves-items">
                                                <span class="name">Date of Propagation</span>
                                                <span>{{ $varietyReport->date_of_propagation }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between ves-items">
                                                <span class="name">Date of Potting</span>
                                                <span>{{ $varietyReport->date_of_potting }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between ves-items">
                                                <span class="name">Amount of Plants</span>
                                                <span>{{ $varietyReport->amount_of_plants }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between ves-items">
                                                <span class="name">Amount of Samples</span>
                                                <span>{{ $varietyReport->samples->count() }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between ves-items">
                                                <span class="name">Next Sample Date</span>
                                                <span>{{ json_decode($varietyReport->samples_schedule)[0] }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between ves-items">
                                                <span class="name">Pot Size</span>
                                                <span>{{ $varietyReport->pot_size }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between ves-items">
                                                <span class="name">Pot Trial</span>
                                                <span>{{ $varietyReport->pot_trial ? 'Yes' : 'No' }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between ves-items">
                                                <span class="name">Open Field Trial</span>
                                                <span>{{ $varietyReport->open_field_trial ? 'Yes' : 'No' }}</span>
                                            </div>

                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>

                        <div class="row loop-grid loop-list">
                            @if($varietyReport->samples->isEmpty())
                                <div class="col-12">
                                    <div class="alert alert-warning">No variety Samples found.</div>
                                </div>
                            @endif

                            @foreach($varietyReport->samples as $sample)


                                <a href="{{ route('frontend.variety-samples.show', $sample->id) }}"
                                   class="col-md-6 col-sm-12">
                                    <div class="row variety-report-item">

                                        @php
                                            $images = json_decode($sample->images);
                                            if (count($images) > 0) {
                                            $lastImage = $images[count($images) - 1] ;
                                            } else {
                                                $lastImage = "/assets/backend/imgs/products/blank_product.png";
                                            }
                                        @endphp
                                        <div class="col-4 bg-image"
                                             style="background-image: url({{ asset($lastImage) }}); ">
                                        </div>

                                        <div class="col-8 d-flex vri-content align-items-center">
                                            <div class="entry-content-2 " style="width: 100%">

                                                <p class="vrs-excerpt">Sample Date:
                                                    <span>{{ $sample->sample_date }}</span></p>
                                                <p class="vrs-excerpt">Leaf Color:
                                                    <span>{{ $sample->leaf_color }}</span></p>
                                                <p class="vrs-excerpt">Branch Color:
                                                    <span>{{ $sample->branch_color }}</span></p>
                                            </div>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mt-20 mb-20">
                                    <a href="{{ route('frontend.variety-samples.create', $varietyReport->id) }}"
                                       class="btn vrs-button hover-up w-100" ><i class="fal fa-plus-circle fa-fw"></i> Add New
                                        Sample</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
