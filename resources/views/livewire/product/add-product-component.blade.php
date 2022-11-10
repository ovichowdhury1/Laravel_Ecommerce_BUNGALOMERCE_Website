<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">Add New Product</h5>
                        <a href="{{ route('allProducts') }}" class="btn btn-sm btn-primary" style="float: right;">All
                            Products</a>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <form wire:submit.prevent="storeProduct">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Catagory</label>
                                    <select class="form-control" wire:model="selectedCatagories">
                                        <option select="selected">choose main catagory</option>
                                        @foreach ($catagories as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Sub Catagory</label>
                                    <select class="form-control" wire:model="selectedSubcatagories">>
                                        <option value="" selected>Choose Sub Catagory</option>
                                        @if (!is_null($selectedCatagories))
                                            @foreach ($subcatagories as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Product Type</label>
                                    <select class="form-control" wire:model="ptype_id">>
                                        <option value="" selected>Choose Product Type</option>
                                        @if (!is_null($selectedSubcatagories))
                                            @foreach ($ptypes as $datap)
                                                <option value="{{ $datap->id }}">{{ $datap->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" placeholder="Enter title"
                                    wire:model="title" />
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Images</label>
                                <input type="file" class="form-control" style="padding: 3px; font-size: 12px;" wire:model="images" multiple />
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Short Description</label>

                                <div wire:ignore>
                                    <textarea class="form-control" id='short_description' wire:model='short_description'></textarea>
                                </div>
                                @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>

                                <div wire:ignore>
                                    <textarea class="form-control" id='description' wire:model='description'></textarea>
                                </div>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#short_description').summernote({
            placeholder: 'Enter short description',
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('short_description', contents);
                }
            }
        });
        $('#description').summernote({
            placeholder: 'Enter description',
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('description', contents);
                }
            }
        });
    </script>
@endpush
