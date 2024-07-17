@extends('backend.layouts.app')
@section('title', 'Breeders')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Breeders</h2>
            </div>
            <div>
                <a href="{{ route('breeders.create') }}" class="btn btn-primary btn-sm rounded">Create new</a>
            </div>
        </div>
        <div class="card card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Total Variety Reports</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach($breeders as $breeder)
                    <tr>
                        <td>@php echo $index++; @endphp</td>
                        <td>{{ $breeder->name }}</td>
                        <td>{{ $breeder->email }}</td>
                        <td>{{ $breeder->variety_reports_count }}</td>
                        <td>
                            @if($breeder->status == 'active')
                                <span class="badge rounded-pill alert-success">Active</span>
                            @else
                                <span class="badge rounded-pill alert-danger">Inactive</span>
                        @endif
                        <td>
                            <a href="{{ route('breeders.edit', $breeder->id) }}" class="btn btn-sm font-sm rounded btn-brand">Edit</a>
                            <form action="{{ route('breeders.destroy', $breeder->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
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
            return confirm('Are you sure you want to delete this breeder?');
        }
    </script>

@endsection
