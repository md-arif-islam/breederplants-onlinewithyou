@extends('backend.layouts.app')
@section('title', 'Show Grower')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Grower Details</h2>
        </div>

        <div class="card card-body mb-4">

            <div class="mb-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $grower->name }}" disabled>
            </div>

            <div class="mb-4">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" value="{{ $grower->company_name }}" disabled>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">Company Email</label>
                <input type="email" class="form-control" id="email" value="{{ $grower->user->email }}" disabled>
            </div>

            <div class="mb-4">
                <label for="contact_person" class="form-label">Contact Person</label>
                <input type="text" class="form-control" id="contact_person" value="{{ $grower->contact_person }}" disabled>
            </div>

            <div class="mb-4">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" value="{{ $grower->street }}" disabled>
            </div>

            <div class="mb-4">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" value="{{ $grower->city }}" disabled>
            </div>

            <div class="mb-4">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="text" class="form-control" id="postal_code" value="{{ $grower->postal_code }}" disabled>
            </div>

            <div class="mb-4">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" value="{{ $grower->country }}" disabled>
            </div>

            <div class="mb-4">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" value="{{ $grower->phone }}" disabled>
            </div>

            <div class="mb-4">
                <label for="website" class="form-label">Website</label>
                <input type="text" class="form-control" id="website" value="{{ $grower->website }}" disabled>
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" value="{{ $grower->user->status == 'active' ? 'Active' : 'Inactive' }}" disabled>
            </div>

            <div class="row">
                <div class="col">
                    <a href="{{ route('growers.edit', $grower->id) }}" class="btn btn-primary">Edit Grower</a>
                </div>
                <div class="col text-end">
                    <form action="{{ route('growers.destroy', $grower->id) }}" method="POST" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Grower</button>
                    </form>
                </div>
            </div>
        </div>

    </section> <!-- content-main end// -->

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this grower? This action cannot be undone.');
        }
    </script>

@endsection
