<form>
    <div class="form-group">
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Brand Name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
