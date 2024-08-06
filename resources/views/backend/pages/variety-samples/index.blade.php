@extends('backend.layouts.app')
@section('title', 'View Sample')
@section('content')

<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">View Sample</h2>
    </div>
    <div class="card card-body">
        <div class="row mb-4">
            @forelse(json_decode($sample->images, true) as $image)
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm">
                        <a href="{{ asset($image) }}" class="vsi-image">
                            <img src="{{ asset($image) }}" alt="Sample Image" class="card-img-top">
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">No images available for this sample.</div>
                </div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label">Sample Date</label>
                    <input type="text" class="form-control" value="{{ $sample->sample_date ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Leaf Color</label>
                    <input type="text" class="form-control" value="{{ $sample->leaf_color ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Amount of Branches</label>
                    <input type="number" class="form-control" value="{{ $sample->amount_of_branches ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Flower Buds</label>
                    <input type="text" class="form-control" value="{{ $sample->flower_buds ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Branch Color</label>
                    <input type="text" class="form-control" value="{{ $sample->branch_color ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Roots</label>
                    <input type="text" class="form-control" value="{{ $sample->roots ?? 'N/A' }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <label class="form-label">Flower Color</label>
                    <input type="text" class="form-control" value="{{ $sample->flower_color ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Flower Petals</label>
                    <input type="number" class="form-control" value="{{ $sample->flower_petals ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Flowering Time</label>
                    <input type="text" class="form-control" value="{{ $sample->flowering_time ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Length of Flowering</label>
                    <input type="text" class="form-control" value="{{ $sample->length_of_flowering ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Seeds</label>
                    <input type="text" class="form-control" value="{{ $sample->seeds ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Seed Color</label>
                    <input type="text" class="form-control" value="{{ $sample->seed_color ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Amount of Seeds</label>
                    <input type="number" class="form-control" value="{{ $sample->amount_of_seeds ?? 'N/A' }}" disabled>
                </div>
                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <input type="text" class="form-control" value="{{ $sample->status ? 'Active' : 'Inactive' }}" disabled>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('variety-samples.edit', $sample->id) }}" class="dashboard-icon-2"><i class="icon material-icons md-edit"></i></a>
            <form action="{{ route('variety-samples.destroy', $sample->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="dashboard-icon-2 me-2" onclick="return confirm('Are you sure you want to delete this sample?')">
                    <i class="icon material-icons md-restore_from_trash"></i>
                </button>
            </form>
        </div>
    </div>
</section> <!-- content-main end// -->

@endsection

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.vsi-image').magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
@endsection
