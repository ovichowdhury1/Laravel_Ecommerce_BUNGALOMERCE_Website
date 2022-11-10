<form>
    <div class="mb-5">
        <div class="form-group">
            <select class="form-control" wire:model="catagory_id">
                <option select="selected">choose main catagory</option>
                @foreach ($catagories as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
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
