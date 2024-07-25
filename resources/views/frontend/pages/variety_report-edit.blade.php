@extends('frontend.layouts.app')
@section('title', 'Home')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="credit">
                        <img src="{{asset('assets/frontend/imgs/avatar.png')}}" alt="">
                        <div class="user">
                            <h5>Welcome Back</h5>
                            <h2>{{Auth::user()->name}}</h2>
                        </div>
                    </div>
                    <div class="notification">
                        <img src="{{asset('assets/frontend/imgs/notification-bing.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <section class="main-section">
            <div class="container custom">
                <div class="row" style="margin: 0; padding: 0;">
                    <section class="content-main">
                        <div class="content-header">
                            <h2 class="content-title mb-30">Edit Variety Report</h2>
                        </div>
                        <div class="card card-body">
                            <form action="{{route('frontend.variety-reports.update', $varietyReport->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-4">
                                    <div class="col-12 text-center">
                                        <img src="{{ asset($varietyReport->thumbnail) }}" id="thumbnail-preview" alt="Thumbnail" style="max-width: 400px; height: auto;">
                                        <div class="mb-4">
                                            <label for="thumbnail" class="form-label">Update Thumbnail</label>
                                            <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" onchange="previewThumbnail(event)">
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
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $varietyReport->name) }}" placeholder="Enter name">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="variety" class="form-label">Variety</label>
                                            <input type="text" name="variety" class="form-control @error('variety') is-invalid @enderror" id="variety" value="{{ old('variety', $varietyReport->variety) }}" placeholder="Enter variety">
                                            @error('variety')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="breeder_id" class="form-label">Breeder Name</label>
                                            <select name="breeder_id" class="form-select @error('breeder_id') is-invalid @enderror" id="breeder_id">
                                                @foreach($breeders as $breeder)
                                                    <option value="{{ $breeder->id }}" {{ $varietyReport->breeder_id == $breeder->id ? 'selected' : '' }}>{{ $breeder->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('breeder_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="grower_id" class="form-label">Grower Name</label>
                                            <select name="grower_id" class="form-select @error('grower_id') is-invalid @enderror" id="grower_id">
                                                @foreach($growers as $grower)
                                                    <option value="{{ $grower->id }}" {{ $varietyReport->grower_id == $grower->id ? 'selected' : '' }}>{{ $grower->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('grower_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="trial_location" class="form-label">Trial Location</label>
                                            <input type="text" name="trial_location" class="form-control @error('trial_location') is-invalid @enderror" id="trial_location" value="{{ old('trial_location', $varietyReport->trial_location) }}" placeholder="Enter trial location">
                                            @error('trial_location')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="date_of_propagation" class="form-label">Date of Propagation</label>
                                            <input type="date" name="date_of_propagation" class="form-control @error('date_of_propagation') is-invalid @enderror" id="date_of_propagation" value="{{ old('date_of_propagation', $varietyReport->date_of_propagation) }}">
                                            @error('date_of_propagation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="date_of_potting" class="form-label">Date of Potting</label>
                                            <input type="date" name="date_of_potting" class="form-control @error('date_of_potting') is-invalid @enderror" id="date_of_potting" value="{{ old('date_of_potting', $varietyReport->date_of_potting) }}">
                                            @error('date_of_potting')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="amount_of_plants" class="form-label">Amount of Plants</label>
                                            <input type="number" name="amount_of_plants" class="form-control @error('amount_of_plants') is-invalid @enderror" id="amount_of_plants" value="{{ old('amount_of_plants', $varietyReport->amount_of_plants) }}" placeholder="Enter amount of plants">
                                            @error('amount_of_plants')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="amount_of_samples" class="form-label">Amount of Samples</label>
                                            <input type="number" name="amount_of_samples" class="form-control @error('amount_of_samples') is-invalid @enderror" id="amount_of_samples" value="{{ old('amount_of_samples', $varietyReport->amount_of_samples) }}" placeholder="Enter amount of samples">
                                            @error('amount_of_samples')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="next_sample_date" class="form-label">Next Sample Date</label>
                                            <input type="date" name="next_sample_date" class="form-control @error('next_sample_date') is-invalid @enderror" id="next_sample_date" value="{{ old('next_sample_date', $varietyReport->next_sample_date) }}">
                                            @error('next_sample_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="pot_size" class="form-label">Pot Size</label>
                                            <input type="text" name="pot_size" class="form-control @error('pot_size') is-invalid @enderror" id="pot_size" value="{{ old('pot_size', $varietyReport->pot_size) }}" placeholder="Enter pot size">
                                            @error('pot_size')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="pot_trial" class="form-label">Pot Trial</label>
                                            <select name="pot_trial" class="form-select @error('pot_trial') is-invalid @enderror" id="pot_trial">
                                                <option value="1" {{ $varietyReport->pot_trial ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ !$varietyReport->pot_trial ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('pot_trial')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="open_field_trial" class="form-label">Open Field Trial</label>
                                            <select name="open_field_trial" class="form-select @error('open_field_trial') is-invalid @enderror" id="open_field_trial">
                                                <option value="1" {{ $varietyReport->open_field_trial ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ !$varietyReport->open_field_trial ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('open_field_trial')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="cut_back" class="form-label">Cut Back</label>
                                            <select name="cut_back" class="form-select @error('cut_back') is-invalid @enderror" id="cut_back">
                                                <option value="1" {{ $varietyReport->cut_back ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ !$varietyReport->cut_back ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('cut_back')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="removed_flowers" class="form-label">Removed Flowers</label>
                                            <input type="number" name="removed_flowers" class="form-control @error('removed_flowers') is-invalid @enderror" id="removed_flowers" value="{{ old('removed_flowers', $varietyReport->removed_flowers) }}" placeholder="Enter removed flowers count">
                                            @error('removed_flowers')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="caned" class="form-label">Caned</label>
                                            <select name="caned" class="form-select @error('caned') is-invalid @enderror" id="caned">
                                                <option value="1" {{ $varietyReport->caned ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ !$varietyReport->caned ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('caned')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" class="form-select @error('status') is-invalid @enderror" id="status">
                                                <option value="1" {{ $varietyReport->status ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ !$varietyReport->status ? 'selected' : '' }}>Inactive</option>
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
                    </section>

                </div>
            </div>
        </section>
    </main>
@endsection
