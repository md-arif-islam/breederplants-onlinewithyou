@extends('backend.layouts.app')
@section('title', 'Variety Reports')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Variety Reports</h2>
            </div>
            <div>
                <a href="{{route('variety-reports.create')}}" class="btn btn-primary btn-sm rounded">Create new</a>
            </div>
        </div>
        <header class="card card-body mb-4">

            <form method="GET" action="{{ route('variety-reports.index') }}">
                <div class="row gx-3">
                    <div class="col-lg-4 col-md-6 me-auto search-input">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                               class="form-control">
                    </div>
                    <div class="col-lg-2 col-12 col-md-4">
                        <select name="sort" class="form-select search-input" onchange="this.form.submit()">
                            <option value="">Select sort</option>
                            <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>Grower name (A-Z)
                            </option>
                            <option
                                value="last-item-first" {{ request('sort') == 'last-item-first' ? 'selected' : '' }}>
                                Last item first
                            </option>
                            <option
                                value="first-item-last" {{ request('sort') == 'first-item-last' ? 'selected' : '' }}>
                                First item last
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-12 col-md-4">

                        <select name="grower_id" class="form-select search-input" onchange="this.form.submit()">
                            <option value="">Select grower</option>
                            @foreach($growers as $user)
                                @if($user->grower)
                                    <option
                                        value="{{ $user->id }}" {{ request('grower_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->grower->company_name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </header> <!-- card-header end// -->
        <div class="row">
            @if($varietyReports->isEmpty())
                <div class="col-12">
                    <div class="alert alert-warning">No variety reports found.</div>
                </div>
            @endif
            @foreach($varietyReports as $report)
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="card card-product-grid admin-variety-report-index">
                        @if($report->samples->isNotEmpty())
                            @php
                                $samples = $report->samples;
                                $lastSample = $samples->last();
                                $images = $lastSample ? json_decode($lastSample->images) : [];
                                if (count($images) > 0) {
                                     $lastImage = $images[count($images) - 1] ;
                                } else {
                                    $lastImage = "/assets/backend/imgs/products/blank_product.png";
                                }
                            @endphp

                            <a href="{{ route('variety-reports.show', $report->id) }}">
                                <img src="{{ asset($lastImage) }}" alt="Product" class="admin-variety-report-img">
                            </a>

                        @endif
                        <div class="info-wrap">
                            <a href="{{route('variety-reports.show', $report->id)}}"
                               class="title">{{ $report->variety_name }}</a>

                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Grower name</span>
                                <span>{{ $report->grower->company_name  }}</span>
                            </div>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Breeder name</span>
                                <span>{{ $report->breeder->company_name }}</span>
                            </div>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Trial Location</span>
                                <span>{{ $report->grower->company_name  }}</span>
                            </div>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of propagation</span>
                                <span>{{ $report->date_of_propagation }}</span>
                            </div>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Date of potting</span>
                                <span>{{ $report->date_of_potting }}</span>
                            </div>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of plants</span>
                                <span>{{ $report->amount_of_plants }}</span>
                            </div>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Amount of samples</span>
                                <span>{{ $report->samples->count() }}</span>
                            </div>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Next sample date</span>
                                <span>{{ json_decode($report->samples_schedule)[0]}}</span>
                            </div>

                            <div class="d-flex justify-content-center mt-3">
                                <a href="{{route('variety-reports.show',$report->id)}}"
                                   class="dashboard-icon"><i class="icon material-icons md-remove_red_eye"></i></a>
                                <a href="{{route('variety-reports.edit', $report->id)}}"
                                   class="dashboard-icon"><i class="icon material-icons md-edit"></i></a>
                                <form action="{{route('variety-reports.destroy', $report->id)}}" method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dashboard-icon me-2"
                                            onclick="return confirm('Are you sure you want to delete this variety report?')">
                                        <i class="icon material-icons md-restore_from_trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination-area mt-15 mb-50 d-flex justify-content-center">
            {{ $varietyReports->links('vendor.pagination.bootstrap-4') }}
        </div>
    </section> <!-- content-main end// -->

@endsection
