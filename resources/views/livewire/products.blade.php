<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.products.update')
    @else
        @include('livewire.products.create')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Body</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->title }}</td>
                <td>{{ $data->description }}</td>
                <td>
                <button wire:click="edit({{ $data->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $data->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
