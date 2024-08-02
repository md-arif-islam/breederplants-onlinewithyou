@extends('frontend.layouts.app')
@section('title', 'Create Variety Sample')
@section('body-class', 'body-FCFCFC')
@section('content')

    <div class="page-header breadcrumb-wrap2">
        <div class="container">
            <div class="d-flex">
                <div class="credit">
                    <a href="{{ url()->previous() }}">
                        <div class="notification">
                            <img src="{{ asset('assets/frontend/imgs/Chevron_Left.svg') }}"
                                 alt="">
                        </div>
                    </a>
                </div>
                <div class="notification text-center w-100">
                    <h2 style="color: #fff;">Add Sample</h2>
                </div>
            </div>
        </div>
    </div>

    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 m-auto">
                    <div class="contact-from-area padding-20-row-col wow FadeInUp">
                        <form class="contact-form-style text-center" id="contact-form" action="{{ route('frontend.variety-samples.store', ['variety_report_id' => $variety_report_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row vss-inputs">
                                <!-- Fields for creating variety sample attributes -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="sample_date">Sample Date</label>
                                        <input name="sample_date" placeholder="Enter Date" type="date" value="{{ old('sample_date') }}">
                                        @error('sample_date')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="leaf_color">Leaf Color</label>
                                        <input name="leaf_color" placeholder="Enter Leaf color" type="text" value="{{ old('leaf_color') }}">
                                        @error('leaf_color')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="amount_of_branches">Amount of Branches</label>
                                        <input name="amount_of_branches" placeholder="Total amount of branches" type="number" value="{{ old('amount_of_branches') }}">
                                        @error('amount_of_branches')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="flower_buds">Flower Buds</label>
                                        <input name="flower_buds" placeholder="Flower buds" type="number" value="{{ old('flower_buds') }}">
                                        @error('flower_buds')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="branch_color">Branch Color</label>
                                        <input name="branch_color" placeholder="Enter Branch color" type="text" value="{{ old('branch_color') }}">
                                        @error('branch_color')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="roots">Roots</label>
                                        <input name="roots" placeholder="Enter roots" type="text" value="{{ old('roots') }}">
                                        @error('roots')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="flower_color">Flower Color</label>
                                        <input name="flower_color" placeholder="Enter Flower color" type="text" value="{{ old('flower_color') }}">
                                        @error('flower_color')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="flower_petals">Flower Petals</label>
                                        <input name="flower_petals" placeholder="Enter flower petals count" type="number" value="{{ old('flower_petals') }}">
                                        @error('flower_petals')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="flowering_time">Flowering Time</label>
                                        <input name="flowering_time" placeholder="Enter flowering time" type="text" value="{{ old('flowering_time') }}">
                                        @error('flowering_time')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="length_of_flowering">Length of Flowering</label>
                                        <input name="length_of_flowering" placeholder="Enter length of flowering" type="text" value="{{ old('length_of_flowering') }}">
                                        @error('length_of_flowering')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="seeds">Seeds</label>
                                        <input name="seeds" placeholder="Enter seeds count" type="text" value="{{ old('seeds') }}">
                                        @error('seeds')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="seed_color">Seed Color</label>
                                        <input name="seed_color" placeholder="Enter seed color" type="text" value="{{ old('seed_color') }}">
                                        @error('seed_color')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <label for="amount_of_seeds">Amount of Seeds</label>
                                        <input name="amount_of_seeds" placeholder="Enter amount of seeds" type="number" value="{{ old('amount_of_seeds') }}">
                                        @error('amount_of_seeds')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Upload Pictures with good design -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="input-style mb-20">
                                        <label for="images">Upload Pictures</label>
                                        <div id="new-images-container"></div>
                                        <button type="button" class="btn btn-primary mb-2" onclick="addImageField()">Add Image</button>
                                        @error('images.*')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- submit button -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="input-style mb-20">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up" name="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        let imageFieldIndex = 0;

        function addImageField() {
            const container = document.getElementById('new-images-container');
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.id = 'image-field-' + imageFieldIndex;
            div.innerHTML = `
            <input type="file" name="images[]" class="form-control mb-2" required>
            <button type="button" class="btn btn-danger mb-2" onclick="removeImageField(${imageFieldIndex})">Remove</button>
        `;
            container.appendChild(div);
            imageFieldIndex++;
        }

        function removeImageField(index) {
            const element = document.getElementById('image-field-' + index);
            if (element) {
                element.remove();
            }
        }
    </script>
@endsection
