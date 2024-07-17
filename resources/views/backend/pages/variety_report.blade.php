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
                    <img src="{{ asset($varietyReport->thumbnail) }}" alt="Thumbnail"
                         style="max-width: 100%; height: auto;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label">Name</label>
                        <p>{{ $varietyReport->name }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Variety</label>
                        <p>{{ $varietyReport->variety }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Breeder Name</label>
                        <p>{{ $varietyReport->breeder->name ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Grower Name</label>
                        <p>{{ $varietyReport->grower->name ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Trial Location</label>
                        <p>{{ $varietyReport->trial_location }}</p>
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
                    <div class="mb-4">
                        <label class="form-label">Amount of Samples</label>
                        <p>{{ $varietyReport->amount_of_samples }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label">Next Sample Date</label>
                        <p>{{ $varietyReport->next_sample_date }}</p>
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
                        <label class="form-label">Cut Back</label>
                        <p>{{ $varietyReport->cut_back ? 'Yes' : 'No' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Removed Flowers</label>
                        <p>{{ $varietyReport->removed_flowers }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Caned</label>
                        <p>{{ $varietyReport->caned ? 'Yes' : 'No' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <p>{{ $varietyReport->status ? 'Active' : 'Inactive' }}</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <a href="" class="btn btn-sm btn-outline-warning me-2"><i class="fas fa-edit"></i> Edit</a>
                <form action="" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger me-2"
                            onclick="return confirm('Are you sure you want to delete this variety report?')"><i
                            class="fas fa-trash"></i> Delete
                    </button>
                </form>
                <a href="#" class="btn btn-sm btn-outline-info"><i class="fas fa-share-alt"></i> Share</a>
            </div>
        </div>

        <div class="content-header mt-5">
            <h2 class="content-title">Variety Samples</h2>
        </div>
        <div class="row">
            @foreach($varietyReport->samples as $sample)
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
                            <img src="{{ asset($sample->images[count($sample->images) - 1]) }}" alt="Sample Image">
                        </a>
                        <div class="info-wrap">

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
                        <div class="d-flex justify-content-center mb-4">
                            <a href="{{route('variety-samples.show', $sample->id)}}" class="btn btn-sm btn-outline-info me-2"><i class="fas fa-eye"></i> View</a>
                            <a href="" class="btn btn-sm btn-outline-warning me-2"><i class="fas fa-edit"></i> Edit</a>
                            <form action="" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger me-2"
                                        onclick="return confirm('Are you sure you want to delete this sample?')"><i
                                        class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                            <a href="#" class="btn btn-sm btn-outline-info"><i class="fas fa-share-alt"></i> Share</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section> <!-- content-main end// -->

@endsection
