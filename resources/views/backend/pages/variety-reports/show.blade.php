@extends('backend.layouts.app')
@section('title', 'View Variety Report')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">View Variety Report</h2>
        </div>
        <div class="card card-body">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    @if($varietyReport->samples->isNotEmpty())
                        @php
                            $samples = $varietyReport->samples;
                            $lastSample = $samples->last();
                            $images = $lastSample ? json_decode($lastSample->images) : [];
                            $lastImage = $images[count($images) - 1] ;
                        @endphp

                        <img src="{{ asset($lastImage) }}" alt="Thumbnail"
                             style="max-width: 100%; height: auto; max-height: 500px; border-radius: 10px">
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label">Variety Name</label>
                        <p>{{ $varietyReport->variety_name }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Grower Name</label>
                        <p>{{ $varietyReport->grower->name ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Breeder Name</label>
                        <p>{{ $varietyReport->breeder->name ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Trial Location</label>
                        <p>{{ $varietyReport->grower->name  }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Date of Propagation</label>
                        <p>{{ $varietyReport->date_of_propagation }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Date of Potting</label>
                        <p>{{ $varietyReport->date_of_potting }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Amount of Plants</label>
                        <p>{{ $varietyReport->amount_of_plants }}</p>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label">Next Sample Date</label>
                        <p>{{ json_decode($varietyReport->samples_schedule)[0]}}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Amount of Samples</label>
                        <p>{{ $varietyReport->samples->count() }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Pot Size</label>
                        <p>{{ $varietyReport->pot_size }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Pot Trial</label>
                        <p>{{ $varietyReport->pot_trial ? 'Yes' : 'No' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Open Field Trial</label>
                        <p>{{ $varietyReport->open_field_trial ? 'Yes' : 'No' }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <p>{{ $varietyReport->status ? 'Active' : 'Inactive' }}</p>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">

                <a href="{{route('variety-reports.edit', $varietyReport->id)}}"
                   class="dashboard-icon"><i class="icon material-icons md-edit"></i></a>
                <form action="{{route('variety-reports.destroy', $varietyReport->id)}}" method="POST"
                      style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dashboard-icon me-2"
                            onclick="return confirm('Are you sure you want to delete this variety report?')">
                        <i class="icon material-icons md-restore_from_trash"></i>
                    </button>
                </form>
                <a href="#" class="dashboard-icon"><i class="icon material-icons md-share"></i>
                </a>
            </div>
        </div>

        <div class="content-header mt-5">
            <div>
                <h2 class="content-title card-title">Variety Samples</h2>
            </div>
            <div>
                <a href="{{route('variety-samples.create', $varietyReport->id)}}"
                   class="btn btn-primary btn-sm rounded">Create new</a>
            </div>
        </div>
        <div class="row">
            @if($varietyReport->samples->isEmpty())
                <div class="col-12">
                    <div class="alert alert-warning">No variety Samples found.</div>
                </div>
            @endif
            @foreach($varietyReport->samples as $sample)
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="card card-product-grid admin-variety-report-index">

                        <a href="{{route('variety-samples.show', $sample->id)}}">
                            @php
                                $images = json_decode($sample->images);
                                $lastImage = $images[count($images) - 1];

                            @endphp
                            <img src="{{ asset($lastImage) }}" alt="Sample Image" class="admin-variety-report-img">
                        </a>
                        <div class="info-wrap">

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Sample Date</span>
                                <span>{{ $sample->sample_date }}</span>
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
                                <span class="name">Flowering Time</span>
                                <span>{{ $sample->flowering_time }}</span>
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

                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{route('variety-samples.show', $sample->id)}}"
                               class="dashboard-icon"><i class="icon material-icons md-remove_red_eye"></i></a>
                            <a href="{{route('variety-samples.edit', $sample->id)}}"
                               class="dashboard-icon"><i class="icon material-icons md-edit"></i></a>
                            <form action="{{route('variety-samples.destroy', $sample->id)}}" method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dashboard-icon me-2"
                                        onclick="return confirm('Are you sure you want to delete this variety report?')">
                                    <i class="icon material-icons md-restore_from_trash"></i>
                                </button>
                            </form>
                            <a href="#" class="dashboard-icon"><i class="icon material-icons md-share"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section> <!-- content-main end// -->

@endsection
