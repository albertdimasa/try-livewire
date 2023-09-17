<div>
    <div class="row">
        <div class="col-md-5">
            @livewire('note.create')
        </div>

        <div class="col-md-7">
            <h5 class="card-title">Notes</h5>
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">Text</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($notes as $item)
                        <tr>
                            <td>{{ $item->text }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-warning"
                                        wire:click='edit({{ $item->id }})'>Edit</button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click='delete({{ $item->id }})'>Delete</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
