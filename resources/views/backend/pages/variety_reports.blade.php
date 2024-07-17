@extends('backend.layouts.app')
@section('title', 'Variety Reports')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Variety Reports</h2>
            </div>
            <div>
                <a href="#" class="btn btn-primary btn-sm rounded">Create new</a>
            </div>
        </div>
        <header class="card card-body mb-4">
            <form method="GET" action="{{ route('variety-reports.index') }}">
                <div class="row gx-3">
                    <div class="col-lg-4 col-md-6 me-auto">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                               class="form-control">
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select name="sort" class="form-select" onchange="this.form.submit()">
                            <option value="">Select sort</option>
                            <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>Grower name (A-Z)</option>
                            <option value="last-item-first" {{ request('sort') == 'last-item-first' ? 'selected' : '' }}>Last item first</option>
                            <option value="first-item-last" {{ request('sort') == 'first-item-last' ? 'selected' : '' }}>First item last</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select name="grower_id" class="form-select" onchange="this.form.submit()">
                            <option value="">Select grower</option>
                            @foreach($growers as $grower)
                                <option value="{{ $grower->id }}" {{ request('grower_id') == $grower->id ? 'selected' : '' }}>{{ $grower->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </header> <!-- card-header end// -->
        <div class="row">
            @foreach($varietyReports as $report)
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
                            <img src="{{ asset($report->thumbnail) }}" alt="Product">
                        </a>
                        <div class="info-wrap">
                            <a href="#" class="title">{{ $report->name }}</a>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Variety</span>
                                <span>{{ $report->variety }}</span>
                            </div>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Breeder name</span>
                                <span>{{ $report->breeder->name ?? 'N/A' }}</span>
                            </div>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Grower name</span>
                                <span>{{ $report->grower->name ?? 'N/A' }}</span>
                            </div>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Trial Location</span>
                                <span>{{ $report->trial_location }}</span>
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
                                <span>{{ $report->amount_of_samples }}</span>
                            </div>
                            <div class="d-flex justify-content-between sub-items">
                                <span class="name">Next sample date</span>
                                <span>{{ $report->next_sample_date }}</span>
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
