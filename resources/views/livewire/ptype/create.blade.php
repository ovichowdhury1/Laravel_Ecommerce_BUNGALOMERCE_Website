<form>
    <div class="mb-5">
        <div class="form-group">
            <select class="form-control" wire:model="selectedCatagories">
                <option select="selected">choose main catagory</option>
                @foreach ($catagories as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Sub Catagory</label>
            <select class="form-control" wire:model="subcatagory_id">
                <option value="" selected>Choose Sub Catagory</option>
                @if (!is_null($selectedCatagories))
                    @foreach ($subcats as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="exampleFormControlInput2"wire:model="name"
                placeholder="Enter Name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button wire:click.prevent="store()" class="btn btn-success">Save</button>
    </div>
</form>
