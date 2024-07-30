@extends('backend.layouts.app')
@section('title', 'Growers')
@section('content')

    <section class="content-main">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Growers</h2>
            </div>
            <div>
                <a href="{{ route('growers.create') }}" class="btn btn-primary btn-sm rounded">Create new</a>
            </div>
        </div>
        <div class="card card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company Name</th>
                    <th>Company Email</th>
                    <th>Contact Person</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($growers as $grower)
                    <tr>
                        <td>{{ $grower->id }}</td>
                        <td>{{ $grower->name }}</td>
                        <td>{{ $grower->user->email }}</td>
                        <td>{{ $grower->company_name }}</td>
                        <td>{{ $grower->company_email }}</td>
                        <td>{{ $grower->contact_person }}</td>
                        <td>{{ $grower->street }}</td>
                        <td>{{ $grower->city }}</td>
                        <td>{{ $grower->postal_code }}</td>
                        <td>{{ $grower->country }}</td>
                        <td>{{ $grower->phone }}</td>
                        <td>{{ $grower->website }}</td>
                        <td>
                            @if($grower->user->status == 'active')
                                <span class="badge rounded-pill alert-success">Active</span>
                            @else
                                <span class="badge rounded-pill alert-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('growers.edit', $grower->id) }}"
                               class="btn btn-sm font-sm rounded btn-brand m-1">Edit</a>
                            <form action="{{ route('growers.destroy', $grower->id) }}" method="POST"
                                  style="display:inline-block;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm font-sm btn-light rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section> <!-- content-main end// -->

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this grower?');
        }
    </script>

@endsection
