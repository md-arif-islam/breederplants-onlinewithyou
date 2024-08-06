@extends('backend.layouts.app')
@section('title', 'Edit Breeder')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Edit Breeder</h2>
        </div>

        <!-- Update Information Form -->
        <div class="card card-body mb-4">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('breeders.update', $breeder->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input type="text" name="company_name" class="form-control" id="company_name" value="{{ $breeder->company_name }}" placeholder="Enter company name" required>
                    @error('company_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="contact_person" class="form-label">Contact Person</label>
                    <input type="text" name="contact_person" class="form-control" id="contact_person" value="{{ $breeder->contact_person }}" placeholder="Enter contact person">
                    @error('contact_person')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" name="street" class="form-control" id="street" value="{{ $breeder->street }}" placeholder="Enter street address">
                    @error('street')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" class="form-control" id="city" value="{{ $breeder->city }}" placeholder="Enter city">
                    @error('city')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" name="postal_code" class="form-control" id="postal_code" value="{{ $breeder->postal_code }}" placeholder="Enter postal code">
                    @error('postal_code')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" id="country" value="{{ $breeder->country }}" placeholder="Enter country">
                    @error('country')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{ $breeder->phone }}" placeholder="Enter phone number">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" name="website" class="form-control" id="website" value="{{ $breeder->website }}" placeholder="Enter website URL">
                    @error('website')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <hr>

                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $breeder->name }}" placeholder="Enter name" required>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Company Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $breeder->user->email }}" placeholder="Enter company email" required>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select" id="status" required>
                        <option value="active" {{ $breeder->user->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $breeder->user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Breeder</button>
                </div>
            </form>
        </div>

        <!-- Update Password Form -->
        <div class="card card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h4>Change Password</h4>
            <form action="{{ route('breeders.updatePassword', $breeder->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="generatePassword()">Generate</button>
                        <button type="button" class="btn btn-outline-secondary" id="show-hide-password" onclick="togglePasswordVisibility()">Show</button>
                    </div>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm password" required>
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>
    </section> <!-- content-main end// -->

    <script>
        function generatePassword() {
            const length = 12;
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=";
            let password = "";
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * charset.length);
                password += charset[randomIndex];
            }
            document.getElementById("password").value = password;
            document.getElementById("password").type = "text";
            document.getElementById("password_confirmation").value = password;
            document.getElementById("password_confirmation").type = "text";
        }

        function togglePasswordVisibility() {
            const passwordField = document.getElementById("password");
            const passwordConfirmField = document.getElementById("password_confirmation");
            const showHideButton = document.getElementById("show-hide-password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordConfirmField.type = "text";
                showHideButton.innerText = "Hide";
            } else {
                passwordField.type = "password";
                passwordConfirmField.type = "password";
                showHideButton.innerText = "Show"; emai
            }
        }
    </script>

@endsection
