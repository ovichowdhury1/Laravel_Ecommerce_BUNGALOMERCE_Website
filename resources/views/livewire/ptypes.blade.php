<div>
    <div class="row">
        <div class="col-md-9">
            <table class="table table-bordered mt-5" id="example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Catagory name</th>
                        <th>sub Catagory name</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ptypes as $key => $data)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                @foreach ($catagories as $value)
                                    @if ($data->catagory_id == $value->id)
                                        {{ $value->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($catagories as $cvalue)
                                    @foreach ($cvalue->subcatagories as $svalue)
                                        @if ($data->subcatagory_id == $svalue->id)
                                            {{ $svalue->name }}
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                            <td>
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
                @include('livewire.ptype.update')
            @else
                @include('livewire.ptype.create')
            @endif
        </div>
    </div>
</div>
