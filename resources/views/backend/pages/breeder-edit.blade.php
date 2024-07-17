@extends('backend.layouts.app')
@section('title', 'Create Breeder')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Create Breeder</h2>
        </div>
        <div class="card card-body">
            <form action="{{ route('breeders.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Enter password">
                        <button type="button" class="btn btn-outline-secondary" onclick="generatePassword()">Generate
                        </button>
                        <button type="button" class="btn btn-outline-secondary" id="show-hide-password"
                                onclick="togglePasswordVisibility()">Show
                        </button>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                           placeholder="Confirm password">
                </div>
                <div class="mb-4">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select" id="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Create Breeder</button>
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
                showHideButton.innerText = "Show";
            }
        }
    </script>

@endsection
