@extends('backend.layouts.app')
@section('title', 'Create Variety Report')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Create Variety Report</h2>
        </div>
        <div class="card card-body">
            <form action="{{ route('variety-reports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="name" class="form-label">Variety Name</label>
                            <input type="text" name="variety_name"
                                   class="form-control @error('variety_name') is-invalid @enderror" id="name"
                                   value="{{ old('variety_name') }}"
                                   placeholder="Enter variety name">
                            @error('variety_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="grower_id" class="form-label">Grower Name</label>
                            <select name="grower_id" class="form-select @error('grower_id') is-invalid @enderror"
                                    id="grower_id">
                                @foreach($growers as $user)
                                    @if($user->grower)
                                        <option value="{{ $user->id }}">{{ $user->grower->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('grower_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="breeder_id" class="form-label">Breeder Name</label>
                            <select name="breeder_id" class="form-select @error('breeder_id') is-invalid @enderror"
                                    id="breeder_id">
                                @foreach($breeders as $user)
                                    @if($user->breeder)
                                        <option value="{{ $user->id }}">{{ $user->breeder->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('breeder_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="date_of_propagation" class="form-label">Date of Propagation</label>
                            <input type="date" name="date_of_propagation"
                                   class="form-control @error('date_of_propagation') is-invalid @enderror"
                                   id="date_of_propagation"
                                   value="{{ old('date_of_propagation') }}">
                            @error('date_of_propagation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="date_of_potting" class="form-label">Date of Potting</label>
                            <input type="date" name="date_of_potting"
                                   class="form-control @error('date_of_potting') is-invalid @enderror"
                                   id="date_of_potting"
                                   value="{{ old('date_of_potting') }}">
                            @error('date_of_potting')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="amount_of_plants" class="form-label">Amount of Plants</label>
                            <input type="number" name="amount_of_plants"
                                   class="form-control @error('amount_of_plants') is-invalid @enderror"
                                   id="amount_of_plants"
                                   value="{{ old('amount_of_plants') }}"
                                   placeholder="Enter amount of plants">
                            @error('amount_of_plants')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="samples_schedule" class="form-label">Sample Schedule Dates</label>
                            <div id="samples-schedule-container">
                                <div class="input-group mb-2" id="sample-schedule-0">
                                    <input type="date" name="samples_schedule[]"
                                           class="form-control" required>
                                    <button type="button" class="btn btn-danger" onclick="removeSampleSchedule(0)">Remove</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="addSampleSchedule()">Add Date</button>
                        </div>

                        <div class="mb-4">
                            <label for="pot_size" class="form-label">Pot Size</label>
                            <input type="text" name="pot_size"
                                   class="form-control @error('pot_size') is-invalid @enderror" id="pot_size"
                                   value="{{ old('pot_size') }}" placeholder="Enter pot size">
                            @error('pot_size')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="pot_trial" class="form-label">Pot Trial</label>
                            <select name="pot_trial" class="form-select @error('pot_trial') is-invalid @enderror"
                                    id="pot_trial">
                                <option value="1" {{ old('pot_trial') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('pot_trial') == '0' ? 'selected' : '' }}>No</option>
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
                                <option value="1" {{ old('open_field_trial') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('open_field_trial') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('open_field_trial')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" id="status">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Create Variety Report</button>
                </div>
            </form>
        </div>
    </section> <!-- content-main end// -->

@endsection

@section('scripts')
    <script>
        let sampleScheduleIndex = 1;

        function addSampleSchedule() {
            const container = document.getElementById('samples-schedule-container');
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.id = 'sample-schedule-' + sampleScheduleIndex;
            div.innerHTML = `
            <input type="date" name="samples_schedule[]" class="form-control" required>
            <button type="button" class="btn btn-danger" onclick="removeSampleSchedule(${sampleScheduleIndex})">Remove</button>
        `;
            container.appendChild(div);
            sampleScheduleIndex++;
        }

        function removeSampleSchedule(index) {
            const element = document.getElementById('sample-schedule-' + index);
            if (element) {
                element.remove();
            }
        }
    </script>
@endsection
