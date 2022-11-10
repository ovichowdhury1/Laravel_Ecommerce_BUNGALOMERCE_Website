<div>
    <div class="row">
        <div class="col-md-9">
            <table class="table table-bordered mt-5" id="example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catagories as $key => $data)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                <button wire:click="edit({{ $data->id }})"
                                    class="btn btn-primary btn-sm">Edit</button>
                                <button wire:click="delete({{ $data->id }})"
                                    class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3 text-center">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @if ($updateMode)
                @include('livewire.cat.update')
            @else
                @include('livewire.cat.create')
            @endif
        </div>
    </div>
</div>
