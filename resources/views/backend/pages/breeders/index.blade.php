@extends('backend.layouts.app')
@section('title', 'Breeders')
@section('content')

    <section class="content-main gb-page">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <header class="card card-body mb-4">
            <div class="row gx-3">
                <div class="col-lg-6 col-md-6 me-auto mb-2">
                    <input type="text" placeholder="Search..." class="form-control" id="search-input" value="{{ request('search') }}" onkeypress="handleSearch(event)">
                </div>
                <div class="col-lg-6 col-md-6 gb-page-buttons">
                    <a href="#" id="importButton" class="btn btn-primary btn-sm rounded float-end m-1">Import</a>
                    <a href="{{ route('breeders.exportCSV') }}" class="btn btn-primary btn-sm rounded float-end m-1">Export CSV</a>
                    <a href="{{ route('breeders.create') }}" class="btn btn-primary btn-sm rounded float-end m-1">Add Breeder</a>
                </div>
            </div>
        </header> <!-- card-header end// -->

        <div class="row">
            <div class="table-container">
                <div class="table">
                    <div class="table-row header">
                        <div class="cell">Breeder ID</div>
                        <div class="cell">Name</div>
                        <div class="cell">Email</div>
                        <div class="cell">Company</div>
                        <div class="cell">Contact</div>
                        <div class="cell">Street</div>
                        <div class="cell">City</div>
                        <div class="cell">Postal Code</div>
                        <div class="cell">Country</div>
                        <div class="cell">Phone</div>
                        <div class="cell">Website</div>
                    </div>

                    @foreach($breeders as $breeder)
                        <div class="table-row" onclick="window.location.href='{{ route('breeders.show', $breeder->id) }}';">
                            <div class="cell" data-title="Breeder ID">{{ $breeder->id }}</div>
                            <div class="cell" data-title="Name">{{ $breeder->name }}</div>
                            <div class="cell" data-title="Email">{{ $breeder->user->email }}</div>
                            <div class="cell" data-title="Company">{{ $breeder->company_name }}</div>
                            <div class="cell" data-title="Contact">{{ $breeder->contact_person }}</div>
                            <div class="cell" data-title="Street">{{ $breeder->street }}</div>
                            <div class="cell" data-title="City">{{ $breeder->city }}</div>
                            <div class="cell" data-title="Postal Code">{{ $breeder->postal_code }}</div>
                            <div class="cell" data-title="Country">{{ $breeder->country }}</div>
                            <div class="cell" data-title="Phone">{{ $breeder->phone }}</div>
                            <div class="cell" data-title="Website">{{ $breeder->website }}</div>

                        </div>
                    @endforeach
                </div> <!-- table end -->
            </div><!-- table container end -->
        </div> <!-- row end -->

        <div class="pagination-area mt-15 mb-50 d-flex justify-content-center">
            {{ $breeders->appends(['search' => request('search')])->links() }}
        </div>
    </section> <!-- content-main end// -->

    <!-- Popups HTML -->
    <div class="modal-overlay" id="modalOverlay"></div>

    <div class="modal-content p-3" id="importPopup">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Import CSV</h5>
            <button type="button" class="close" id="closeImportButton">&times;</button>
        </div>
        <input type="file" class="form-control-file" id="csvFileInput">
        <button class="btn btn-primary btn-sm rounded mt-20" id="importFileButton">Import</button>
    </div>

    <div class="modal-content p-3" id="exportPopup">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Export CSV</h5>
            <button type="button" class="close" id="closeExportButton">&times;</button>
        </div>
        <div class="form-group">
            <label for="exportOption">Export Option:</label>
            <select class="form-control" id="exportOption">
                <option value="everything">Export Everything</option>
                <option value="breeder_ids">Export Specific Breeder IDs</option>
            </select>
        </div>
        <div class="form-group" id="breederIdsContainer" style="display: none;">
            <label for="breederIds">Breeder IDs (comma separated):</label>
            <input type="text" class="form-control" id="breederIds">
        </div>
        <button class="btn btn-primary btn-sm rounded mt-20" id="exportFileButton">Export</button>
    </div>
    <!-- End Popups HTML-->

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this breeder?');
        }

        // Handle search input and submission
        function handleSearch(event) {
            if (event.key === 'Enter') {
                const query = document.getElementById('search-input').value;
                window.location.href = `?search=${encodeURIComponent(query)}`;
            }
        }

        const importButton = document.getElementById('importButton');
        const closeImportButton = document.getElementById('closeImportButton');
        const exportButton = document.getElementById('exportButton');
        const closeExportButton = document.getElementById('closeExportButton');
        const modalOverlay = document.getElementById('modalOverlay');
        const importPopup = document.getElementById('importPopup');
        const exportPopup = document.getElementById('exportPopup');
        const exportOption = document.getElementById('exportOption');
        const breederIdsContainer = document.getElementById('breederIdsContainer');

        const openPopup = (popup) => {
            modalOverlay.style.display = 'block';
            document.body.style.overflow = 'hidden'; // Prevent scrolling
            popup.classList.add('show');
        };

        const closePopup = (popup) => {
            modalOverlay.style.display = 'none';
            document.body.style.overflow = 'auto'; // Restore scrolling
            popup.classList.remove('show');
        };

        importButton.addEventListener('click', () => openPopup(importPopup));
        closeImportButton.addEventListener('click', () => closePopup(importPopup));
        exportButton.addEventListener('click', () => openPopup(exportPopup));
        closeExportButton.addEventListener('click', () => closePopup(exportPopup));
        modalOverlay.addEventListener('click', () => {
            closePopup(importPopup);
            closePopup(exportPopup);
        });

        // Prevent modal from closing when clicking inside it
        importPopup.addEventListener('click', (e) => {
            e.stopPropagation();
        });
        exportPopup.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        exportOption.addEventListener('change', (e) => {
            if (e.target.value === 'breeder_ids') {
                breederIdsContainer.style.display = 'block';
            } else {
                breederIdsContainer.style.display = 'none';
            }
        });
    </script>

@endsection
