@extends('backend.layouts.app')
@section('title', 'View Sample')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">View Sample</h2>
        </div>
        <div class="card card-body">
            <div class="row mb-4">
                @foreach($sample->images as $image)
                    <div class="col-md-3">
                        <img src="{{ asset($image) }}" alt="Sample Image" style="max-width: 100%; height: auto;">
                    </div>

                @endforeach
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label">Sample Date</label>
                        <p>{{ $sample->date }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Leaf Color</label>
                        <p>{{ $sample->leaf_color }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Amount of Branches</label>
                        <p>{{ $sample->amount_of_branches }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Flower Buds</label>
                        <p>{{ $sample->flower_buds }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Branch Color</label>
                        <p>{{ $sample->branch_color }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Roots</label>
                        <p>{{ $sample->roots }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label class="form-label">Flower Color</label>
                        <p>{{ $sample->flower_color }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Flower Petals</label>
                        <p>{{ $sample->flower_petals }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Flowering Time</label>
                        <p>{{ $sample->flowering_time }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Length of Flowering</label>
                        <p>{{ $sample->length_of_flowering }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Seeds</label>
                        <p>{{ $sample->seeds }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Seed Color</label>
                        <p>{{ $sample->seed_color }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Amount of Seeds</label>
                        <p>{{ $sample->amount_of_seeds }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <p>{{ $sample->status ? 'Active' : 'Inactive' }}</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-4">
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
    </section> <!-- content-main end// -->

@endsection
