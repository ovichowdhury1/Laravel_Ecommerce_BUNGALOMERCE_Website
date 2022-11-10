<form>
    <input type="hidden" wire:model="subcatagory_id">
    <div class="mb-5">
        <div class="form-group">
            <select class="form-control" wire:model="catagory_id">
                <option selected>choose main catagory</option>
                @foreach ($catagories as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="exampleFormControlInpu2" wire:model="name"
                placeholder="Enter Name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    </div>
</form>
