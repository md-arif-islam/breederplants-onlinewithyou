@extends('backend.layouts.app')
@section('title', 'View Variety Report')
@section('content')

<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">View Variety Report</h2>
    </div>
    <div class="card card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label">Variety Name</label>
                    <input type="text" class="form-control" value="{{ $varietyReport->variety_name ?? 'N/A' }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="form-label">Grower Name</label>
                    <input type="text" class="form-control" value="{{ $varietyReport->grower->company_name ?? 'N/A' }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="form-label">Breeder Name</label>
                    <input type="text" class="form-control" value="{{ $varietyReport->breeder->company_name ?? 'N/A' }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="form-label">Trial Location</label>
                    <input type="text" class="form-control" value="{{ $varietyReport->trial_location ?? 'N/A' }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="form-label">Date of Propagation</label>
                    <input type="date" class="form-control" value="{{ $varietyReport->date_of_propagation ?? 'N/A' }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="form-label">Date of Potting</label>
                    <input type="date" class="form-control" value="{{ $varietyReport->date_of_potting ?? 'N/A' }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="form-label">Amount of Plants</label>
                    <input type="number" class="form-control" value="{{ $varietyReport->amount_of_plants ?? 'N/A' }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label">Next Sample Date</label>
                    <input type="date" class="form-control" value="{{ json_decode($varietyReport->samples_schedule)[0] ?? 'N/A' }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="form-label">Amount of Samples</label>
                    <input type="number" class="form-control" value="{{ $varietyReport->samples->count() ?? 'N/A' }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="form-label">Pot Size</label>
                    <input type="text" class="form-control" value="{{ $varietyReport->pot_size ?? 'N/A' }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="form-label">Pot Trial</label>
                    <input type="text" class="form-control" value="{{ $varietyReport->pot_trial ? 'Yes' : 'No' }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="form-label">Open Field Trial</label>
                    <input type="text" class="form-control" value="{{ $varietyReport->open_field_trial ? 'Yes' : 'No' }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <input type="text" class="form-control" value="{{ $varietyReport->status ? 'Active' : 'Inactive' }}" disabled>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('variety-reports.edit', $varietyReport->id) }}" class="dashboard-icon-2"><i class="icon material-icons md-edit"></i></a>
            <form action="{{ route('variety-reports.destroy', $varietyReport->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="dashboard-icon-2 me-2" onclick="return confirm('Are you sure you want to delete this variety report?')">
                    <i class="icon material-icons md-restore_from_trash"></i>
                </button>
            </form>
        </div>
    </div>

    <br>
    <hr>
    <br>

    <div class="content-header mt-5">
        <div>
            <h2 class="content-title card-title">Variety Samples</h2>
        </div>
        <div>
            <a href="{{ route('variety-samples.create', $varietyReport->id) }}" class="btn btn-primary btn-sm rounded">Create new</a>
        </div>
    </div>
    <div class="row">
        @if($varietyReport->samples->isEmpty())
            <div class="col-12">
                <div class="alert alert-warning">No variety samples found.</div>
            </div>
        @endif
        @foreach($varietyReport->samples as $sample)
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card card-product-grid admin-variety-report-index">
                    @php
                        $images = json_decode($sample->images);
                        $lastImage = !empty($images) ? $images[count($images) - 1] : "/assets/backend/imgs/products/blank_product.png";
                    @endphp

                    <div class="admin-variety-report-img-div">
                        <a href="{{ route('variety-samples.show', $sample->id) }}">
                            <img src="{{ asset($lastImage) }}" alt="Product" class="admin-variety-report-img">
                        </a>

                        <div class="vri-icon-box d-flex justify-content-center mt-3">
                            <a href="{{ route('variety-samples.show', $sample->id) }}" class="dashboard-icon"><i class="icon material-icons md-remove_red_eye"></i></a>
                            <a href="{{ route('variety-samples.edit', $sample->id) }}" class="dashboard-icon"><i class="icon material-icons md-edit"></i></a>
                            <form action="{{ route('variety-samples.destroy', $sample->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dashboard-icon me-2" onclick="return confirm('Are you sure you want to delete this variety sample?')">
                                    <i class="icon material-icons md-restore_from_trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="info-wrap vri-contents">
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Sample Date</span>
                            <span>{{ $sample->sample_date ?? 'N/A' }}</span>
                        </div>

                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Leaf Color</span>
                            <span>{{ $sample->leaf_color ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Amount of Branches</span>
                            <span>{{ $sample->amount_of_branches ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Flower Buds</span>
                            <span>{{ $sample->flower_buds ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Branch Color</span>
                            <span>{{ $sample->branch_color ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Roots</span>
                            <span>{{ $sample->roots ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Flower Color</span>
                            <span>{{ $sample->flower_color ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Flower Petals</span>
                            <span>{{ $sample->flower_petals ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Flowering Time</span>
                            <span>{{ $sample->flowering_time ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Length of Flowering</span>
                            <span>{{ $sample->length_of_flowering ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Seeds</span>
                            <span>{{ $sample->seeds ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Seed Color</span>
                            <span>{{ $sample->seed_color ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items">
                            <span class="name">Amount of Seeds</span>
                            <span>{{ $sample->amount_of_seeds ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section> <!-- content-main end// -->

@endsection
