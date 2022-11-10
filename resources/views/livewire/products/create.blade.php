<form>
    <div class="mb-5">
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
            <div class="form-group col-md-3">
                <label>Brand</label>
                <select class="form-control" wire:model="brand">
                    <option select="selected">choose brand</option>
                    @foreach ($brands as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label>manufacturer</label>
                <select class="form-control" wire:model="manufacturer">
                    <option select="selected">choose manufacturer</option>
                    @foreach ($manufs as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label>suppliers</label>
                <select class="form-control" wire:model="supplier">
                    <option select="selected">choose suppliers</option>
                    @foreach ($suppliers as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label>unit of measure</label>
                <select class="form-control" wire:model="uom">
                    <option select="selected">choose unit of measure</option>
                    @foreach ($uoms as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="exampleFormControlInput1">Name:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name"
                    wire:model="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="exampleFormControlInput2">Short Description:</label>
                <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="short_description"
                    placeholder="Enter Short Description"></textarea>
                @error('short_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <button wire:click.prevent="store()" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</form>
