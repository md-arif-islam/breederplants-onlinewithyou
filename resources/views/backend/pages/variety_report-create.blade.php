@extends('backend.layouts.app')
@section('title', 'Edit Variety Report')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Create Variety Report</h2>
        </div>
        <div class="card card-body">
            <form action="{{route('variety-reports.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <img src="" id="thumbnail-preview" alt="Thumbnail" style="max-width: 400px; height: auto; display: none">
                        <div class="mb-4">
                            <label for="thumbnail" class="form-label">Update Thumbnail</label>
                            <input type="file" name="thumbnail"
                                   class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail"
                                   onchange="previewThumbnail(event)">
                            @error('thumbnail')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   id="name" placeholder="Enter name">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="variety" class="form-label">Variety</label>
                            <input type="text" name="variety"
                                   class="form-control @error('variety') is-invalid @enderror" id="variety"
                                   placeholder="Enter variety">
                            @error('variety')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="breeder_id" class="form-label">Breeder Name</label>
                            <select name="breeder_id" class="form-select @error('breeder_id') is-invalid @enderror"
                                    id="breeder_id">
                                @foreach($breeders as $breeder)
                                    <option value="{{ $breeder->id }}">{{ $breeder->name }}</option>
                                @endforeach
                            </select>
                            @error('breeder_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="grower_id" class="form-label">Grower Name</label>
                            <select name="grower_id" class="form-select @error('grower_id') is-invalid @enderror"
                                    id="grower_id">
                                @foreach($growers as $grower)
                                    <option value="{{ $grower->id }}">{{ $grower->name }}</option>
                                @endforeach
                            </select>
                            @error('grower_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="trial_location" class="form-label">Trial Location</label>
                            <input type="text" name="trial_location"
                                   class="form-control @error('trial_location') is-invalid @enderror"
                                   id="trial_location" placeholder="Enter trial location">
                            @error('trial_location')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="date_of_propagation" class="form-label">Date of Propagation</label>
                            <input type="date" name="date_of_propagation"
                                   class="form-control @error('date_of_propagation') is-invalid @enderror"
                                   id="date_of_propagation">
                            @error('date_of_propagation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="date_of_potting" class="form-label">Date of Potting</label>
                            <input type="date" name="date_of_potting"
                                   class="form-control @error('date_of_potting') is-invalid @enderror"
                                   id="date_of_potting">
                            @error('date_of_potting')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="amount_of_plants" class="form-label">Amount of Plants</label>
                            <input type="number" name="amount_of_plants"
                                   class="form-control @error('amount_of_plants') is-invalid @enderror"
                                   id="amount_of_plants" placeholder="Enter amount of plants">
                            @error('amount_of_plants')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="amount_of_samples" class="form-label">Amount of Samples</label>
                            <input type="number" name="amount_of_samples"
                                   class="form-control @error('amount_of_samples') is-invalid @enderror"
                                   id="amount_of_samples" placeholder="Enter amount of samples">
                            @error('amount_of_samples')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="next_sample_date" class="form-label">Next Sample Date</label>
                            <input type="date" name="next_sample_date"
                                   class="form-control @error('next_sample_date') is-invalid @enderror"
                                   id="next_sample_date">
                            @error('next_sample_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="pot_size" class="form-label">Pot Size</label>
                            <input type="text" name="pot_size"
                                   class="form-control @error('pot_size') is-invalid @enderror" id="pot_size">
                            @error('pot_size')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="pot_trial" class="form-label">Pot Trial</label>
                            <select name="pot_trial" class="form-select @error('pot_trial') is-invalid @enderror"
                                    id="pot_trial">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('pot_trial')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="open_field_trial" class="form-label">Open Field Trial</label>
                            <select name="open_field_trial"
                                    class="form-select @error('open_field_trial') is-invalid @enderror"
                                    id="open_field_trial">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('open_field_trial')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="cut_back" class="form-label">Cut Back</label>
                            <select name="cut_back" class="form-select @error('cut_back') is-invalid @enderror"
                                    id="cut_back">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('cut_back')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="removed_flowers" class="form-label">Removed Flowers</label>
                            <input type="number" name="removed_flowers"
                                   class="form-control @error('removed_flowers') is-invalid @enderror"
                                   id="removed_flowers"

                                   placeholder="Enter removed flowers count">
                            @error('removed_flowers')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="caned" class="form-label">Caned</label>
                            <select name="caned" class="form-select @error('caned') is-invalid @enderror" id="caned">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('caned')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Variety Report</button>
                </div>
            </form>
        </div>
    </section> <!-- content-main end// -->

    <script>
        function previewThumbnail(event) {
            document.getElementById('thumbnail-preview').style.display = 'block';
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('thumbnail-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection
