@extends('backend.layouts.app')
@section('title', 'Create Variety Sample')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Create Variety Sample</h2>
        </div>
        <div class="card card-body">
            <form action="{{ route('variety-samples.store', ['variety_report_id' => $variety_report_id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="images" class="form-label">Add Images</label>
                            <div id="new-images-container"></div>
                            <button type="button" class="btn btn-primary" onclick="addImageField()">Add Image</button>
                            @error('images.*')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- Fields for creating variety sample attributes -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- First column of input fields -->
                        <div class="mb-4">
                            <label for="sample_date" class="form-label">Sample Date</label>
                            <input type="date" name="sample_date" class="form-control @error('sample_date') is-invalid @enderror" id="sample_date" value="{{ old('sample_date') }}">
                            @error('sample_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="leaf_color" class="form-label">Leaf Color</label>
                            <input type="text" name="leaf_color" class="form-control @error('leaf_color') is-invalid @enderror" id="leaf_color" value="{{ old('leaf_color') }}" placeholder="Enter leaf color">
                            @error('leaf_color')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="amount_of_branches" class="form-label">Amount of Branches</label>
                            <input type="number" name="amount_of_branches" class="form-control @error('amount_of_branches') is-invalid @enderror" id="amount_of_branches" value="{{ old('amount_of_branches') }}" placeholder="Enter amount of branches">
                            @error('amount_of_branches')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="flower_buds" class="form-label">Flower Buds</label>
                            <input type="number" name="flower_buds" class="form-control @error('flower_buds') is-invalid @enderror" id="flower_buds" value="{{ old('flower_buds') }}" placeholder="Enter flower buds count">
                            @error('flower_buds')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="branch_color" class="form-label">Branch Color</label>
                            <input type="text" name="branch_color" class="form-control @error('branch_color') is-invalid @enderror" id="branch_color" value="{{ old('branch_color') }}" placeholder="Enter branch color">
                            @error('branch_color')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Second column of input fields -->
                        <div class="mb-4">
                            <label for="roots" class="form-label">Roots</label>
                            <input type="text" name="roots" class="form-control @error('roots') is-invalid @enderror" id="roots" value="{{ old('roots') }}" placeholder="Enter roots">
                            @error('roots')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="flower_color" class="form-label">Flower Color</label>
                            <input type="text" name="flower_color" class="form-control @error('flower_color') is-invalid @enderror" id="flower_color" value="{{ old('flower_color') }}" placeholder="Enter flower color">
                            @error('flower_color')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="flower_petals" class="form-label">Flower Petals</label>
                            <input type="number" name="flower_petals" class="form-control @error('flower_petals') is-invalid @enderror" id="flower_petals" value="{{ old('flower_petals') }}" placeholder="Enter flower petals count">
                            @error('flower_petals')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="flowering_time" class="form-label">Flowering Time</label>
                            <input type="text" name="flowering_time" class="form-control @error('flowering_time') is-invalid @enderror" id="flowering_time" value="{{ old('flowering_time') }}" placeholder="Enter flowering time">
                            @error('flowering_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="length_of_flowering" class="form-label">Length of Flowering</label>
                            <input type="text" name="length_of_flowering" class="form-control @error('length_of_flowering') is-invalid @enderror" id="length_of_flowering" value="{{ old('length_of_flowering') }}" placeholder="Enter length of flowering">
                            @error('length_of_flowering')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="seeds" class="form-label">Seeds</label>
                            <input type="text" name="seeds" class="form-control @error('seeds') is-invalid @enderror" id="seeds" value="{{ old('seeds') }}" placeholder="Enter seeds count">
                            @error('seeds')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="seed_color" class="form-label">Seed Color</label>
                            <input type="text" name="seed_color" class="form-control @error('seed_color') is-invalid @enderror" id="seed_color" value="{{ old('seed_color') }}" placeholder="Enter seed color">
                            @error('seed_color')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="amount_of_seeds" class="form-label">Amount of Seeds</label>
                            <input type="number" name="amount_of_seeds" class="form-control @error('amount_of_seeds') is-invalid @enderror" id="amount_of_seeds" value="{{ old('amount_of_seeds') }}" placeholder="Enter amount of seeds">
                            @error('amount_of_seeds')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Create Variety Sample</button>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        let imageFieldIndex = 0;

        function addImageField() {
            const container = document.getElementById('new-images-container');
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.id = 'image-field-' + imageFieldIndex;
            div.innerHTML = `
        <input type="file" name="images[]" class="form-control" required>
        <button type="button" class="btn btn-danger" onclick="removeImageField(${imageFieldIndex})">Remove</button>
    `;
            container.appendChild(div);
            imageFieldIndex++;
        }

        function removeImageField(index) {
            const element = document.getElementById('image-field-' + index);
            if (element) {
                element.remove();
            }
        }
    </script>
@endsection
